<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VCard;
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
            $userId = Auth::id();

            // Fetch Payment History
            $purchasePlan = UserPurchasePlan::where('user_id', $userId)
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->first();  

            // Fetch Plan Details
            $planDetails = Plan::where('id', $purchasePlan->plan_id)->first();

            // Fetch Payment History
            $planHistory = PaymentHistory::where('plan_id', $purchasePlan->plan_id)->first();

            return view('yellowpages::Vcard.plan', compact('purchasePlan','planHistory', 'planDetails'));
        } catch (\Exception $e) {
            Log::error('Error fetching plan details: ' );
            return redirect()->back()->with('error', 'Unable to fetch plan details.');
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Plan Details---------------------##
    public function planDetails()
    {
        try {
            // Get all available plans
            $plans = Plan::all();
    
            // Get all active purchase plans for the authenticated user
            $purchasePlans = UserPurchasePlan::where('user_id', Auth::id())
                                             ->where('is_active', 1)  // Ensure the plan is active
                                             ->orderBy('created_at', 'desc')  // Order by most recent
                                             ->get(); // Fetch all active plans
    
            return view("yellowpages::Vcard.planDetails", compact('plans', 'purchasePlans'));
        } catch (\Exception $e) {
            Log::error('Error fetching plan details: ' );
            return redirect()->back()->with('error', 'Unable to fetch plan details.');
        }
    }
    
    ##------------------------- END ---------------------##

    ##------------------------- Payment  ---------------------##
    public function stripeCheckout(Request $request)
    {
        $plan = Plan::findOrFail($request->plan_id);
        $expiresAt = now()->addDays($plan->duration);
        if ($plan->price <=0) {
            // Save user purchase plan details
            UserPurchasePlan::create([
                'user_id' => Auth::id(),
                'plan_id' => $request->plan_id,
                'purchased_at' => now(),
                'expires_at' => $expiresAt,
                'amount' => 0.00,
                'payment_status' => 'Purchased',
                'transaction_id' => 'free_payment'
            ]);

            // Update user's active plan
            User::where('id', Auth::id())->update([
                'plan_id' => $request->plan_id,
            ]);

            return redirect()->route('vCard.planDetails')->with('success', 'Free Plan successful  activated!');
        }
        try {


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
                'success_url' => url('yellow-pages/plan/payment-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url('yellow-pages/plan/payment-cancel'),
                'metadata' => [
                    'plan_id' => $plan->id,
                ],
            ]);

            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            Log::error('Error during Stripe Checkout: ' );
            return redirect()->back()->with('error', 'Unable to initiate payment. Please try again.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment Success ---------------------##

    public function paymentSuccess(Request $request)
    {

        // try {
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
            $plann=PaymentHistory::create([
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
        // } catch (\Exception $e) {
        //     Log::error('Error in payment success: ' );
        //     return redirect()->back()->with('error', 'Unable to process payment. Please contact support.');
        // }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment Cancel ---------------------##

    public function paymentCancel()
    {
        try {
            return redirect()->route('vCard.planDetails')->with('error', 'Payment was canceled.');
        } catch (\Exception $e) {
            Log::error('Error handling payment cancellation: ' );
            return redirect()->back()->with('error', 'Unable to handle payment cancellation.');
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Payment History ---------------------##
    public function paymentHistory()
    {
        try {
            $userId = Auth::id();
            $paymentHistories = PaymentHistory::with('plan')->where('user_id', $userId)->get();            // Assuming 'plan' relationship exists
            return view('yellowpages::Vcard.payment_history', compact('paymentHistories'));
        } catch (\Exception $e) {
            Log::error('Error fetching payment history: ' );
            return redirect()->back()->with('error', 'Unable to fetch payment history.');
        }
    }

    ##------------------------- END ---------------------##

}
