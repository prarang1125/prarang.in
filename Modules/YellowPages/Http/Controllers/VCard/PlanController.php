<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\Plan;
use App\Models\User;
use Stripe\StripeClient;
use App\Models\PaymentHistory;
use App\Models\UserPurchasePlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{

    ##------------------------- Subcription Plan ---------------------##

    public function plan()
    {
        try {
            $userPlanId = Auth::user()->plan_id;

            // Fetch Payment History
            $planHistory = PaymentHistory::where('plan_id', $userPlanId)->first();

            // Fetch Plan Details
            $planDetails = Plan::where('id', $userPlanId)->first();

            return view('yellowpages::Vcard.plan', compact('planHistory', 'planDetails'));
        } catch (\Exception $e) {
            Log::error('Error fetching plan details: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch plan details.');
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Plan Details---------------------##
    public function planDetails()
    {
        try {
            $plans = Plan::all();
            $userPlanId = Auth::user()->plan_id;

            return view("yellowpages::Vcard.planDetails", compact('plans', 'userPlanId'));
        } catch (\Exception $e) {
            Log::error('Error fetching plan details: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch plan details.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment  ---------------------##
    public function stripeCheckout(Request $request)
    {
        try {
            $plan = Plan::findOrFail($request->plan_id);

            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

            $checkoutSession = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'INR',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $plan->price * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('yellow-pages/vCard/payment-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url('yellow-pages/vCard/payment-cancel'),
                'metadata' => [
                    'plan_id' => $plan->id,
                ],
            ]);

            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            Log::error('Error during Stripe Checkout: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to initiate payment. Please try again.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment Success ---------------------##

    public function paymentSuccess(Request $request)
    {
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

            // Retrieve the session details from Stripe
            $session = $stripe->checkout->sessions->retrieve($request->session_id);

            if (!$session) {
                return redirect()->back()->with('error', 'Invalid session ID.');
            }

            // Access the plan_id from the metadata
            $plan_id = $session->metadata->plan_id ?? null;

            // Ensure the plan exists
            $plan = Plan::find($plan_id);
            if (!$plan) {
                return redirect()->back()->with('error', 'Invalid plan ID.');
            }

            // Calculate expiration date
            $expiresAt = now()->addDays($plan->duration);

            // Save payment history
            PaymentHistory::create([
                'user_id' => Auth::id(),
                'plan_id' => $plan_id,
                'transaction_id' => $session->payment_intent,
                'amount' => $session->amount_total / 100, // Stripe amount is in cents
                'currency' => $session->currency,
                'status' => $session->payment_status,
            ]);

            // Save user purchase plan details
            UserPurchasePlan::create([
                'user_id' => Auth::id(),
                'plan_id' => $plan_id,
                'purchased_at' => now(),
                'expires_at' => $expiresAt,
                'amount' => $session->amount_total / 100,
                'payment_status' => $session->payment_status,
                'transaction_id' => $session->payment_intent,
            ]);

            // Update user's active plan
            User::where('id', Auth::id())->update([
                'plan_id' => $plan_id,
            ]);

            return redirect()->route('vCard.planDetails')->with('success', 'Payment successful and plan activated!');
        } catch (\Exception $e) {
            Log::error('Error in payment success: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to process payment. Please contact support.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment Cancel ---------------------##

    public function paymentCancel()
    {
        try {
            return redirect()->route('vCard.planDetails')->with('error', 'Payment was canceled.');
        } catch (\Exception $e) {
            Log::error('Error handling payment cancellation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to handle payment cancellation.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment History ---------------------##
    public function paymentHistory()
    {
        try {
            $paymentHistories = PaymentHistory::with('plan')->get(); // Assuming 'plan' relationship exists
            return view('yellowpages::Vcard.payment_history', compact('paymentHistories'));
        } catch (\Exception $e) {
            Log::error('Error fetching payment history: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch payment history.');
        }
    }
    
    ##------------------------- END ---------------------##

}
