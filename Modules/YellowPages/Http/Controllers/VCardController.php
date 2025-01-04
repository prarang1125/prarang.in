<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\StripeClient;
use App\Models\Vcard;
use App\Models\Plan;
use App\Models\Visits;
use App\Models\user;
use App\Models\BusinessListing;
use App\Models\DynamicVcard;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\log;
use Illuminate\Http\Request;

class VCardController extends Controller
{
    public function index()
    {
        return view("yellowpages::Home.vcard");
    }
    public function dashboard()
    {
        $userId = Auth::id();
    
        // Retrieve the Vcard record for the authenticated user or default to null
        $totalscan = Vcard::where('user_id', $userId)->first();
        $plan = Plan::find(Auth::user()->plan_id) ?? 'Not Active Any';
    
        // Get business listings for the authenticated user
        $listing = BusinessListing::where('user_id', Auth::id());
    
        // If listings exist, calculate the view count
        if ($listing->exists()) {
            $viewcount = Visits::where('business_id', $listing->first()->id)->count('business_id');
        } else {
            $viewcount = 0; // Default to 0 if no listings exist
        }
    
        return view('yellowpages::Vcard.dashboard', compact('totalscan', 'plan', 'viewcount'));
    }
    

    public function vCardPayment(Request $request)
    {
        $amount = 100; // Amount in cents
    
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Standard Plan',
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);
    
            return redirect($session->url);
    
        } catch (\Exception $e) {
            // Log the error
            Log::error('Stripe payment error: ' . $e->getMessage());
            
            return redirect()->route('payment.error')->with('error', 'Something went wrong, please try again later.');
            
        }

    }
    
    public function createCard(Request $request)
    {
        return view("yellowpages::Vcard.Card");
    }
    public function logout()
{
    Auth::guard('web')->logout(); // Use the default Laravel authentication guard
    return redirect()->route('vCard.login'); // Redirect to login page
}
    
}
