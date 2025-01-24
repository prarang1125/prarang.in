<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\StripeClient;
use App\Models\Vcard;
use App\Models\DynamicFeild;
use App\Models\UserPurchasePlan;
use App\Models\Plan;
use App\Models\Visits;
use App\Models\User;
use App\Models\BusinessListing;
use App\Models\DynamicVcard;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class VCardController extends Controller
{
    ##------------------------- Vcard Page Show ---------------------##
    public function index()
    {
        try {
            return view("yellowpages::Home.vcard");
        } catch (\Exception $e) {
            Log::error('Error in index method: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to load the VCard page.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Vcard/User Dashboard ---------------------##
    public function dashboard()
    {
        try {
            $userId = Auth::id();
            // Retrieve the Vcard record for the authenticated user or default to null
            $totalscan = Vcard::where('user_id', $userId)->first();
    
            // Retrieve the most recent active purchase plan (is_active = 1) for the user
            $purchasePlan = UserPurchasePlan::where('user_id', $userId)
                                            ->where('is_active', 1)
                                            ->orderBy('created_at', 'desc')
                                            ->first();  // First active plan, most recent
    
            $plan = $purchasePlan ? Plan::find($purchasePlan->plan_id) : null;  // Get the plan by plan_id
    
            // Get the first business listing for the user
            $listing = BusinessListing::where('user_id', $userId)->first();
    
            // Calculate the view count for the business listing
            $viewcount = $listing 
                ? Visits::where('business_id', $listing->id)->count('business_id')  // Count visits for the business
                : 0;
    
            // Pass the data to the view
            return view('yellowpages::Vcard.dashboard', compact('totalscan', 'plan', 'viewcount'));
        } catch (\Exception $e) {
            Log::error('Error in dashboard method: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to load the dashboard.']);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Create Card ---------------------##
    public function createCard(Request $request)
    {
        try {
            $dynamicFields = DynamicFeild::where('is_active', 1)->get();
            return view('yellowpages::Vcard.Card', compact('dynamicFields'));
        } catch (\Exception $e) {
            Log::error('Error in createCard method: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to load the Create Card page.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- logut ---------------------##
    public function logout()
    {
        try {
            Auth::guard('web')->logout(); // Use the default Laravel authentication guard
            return redirect()->route('yp.login'); // Redirect to login page
        } catch (\Exception $e) {
            Log::error('Error in logout method: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to logout.']);
        }
    }

    ##------------------------- END ---------------------##

}
