<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\StripeClient;
use App\Models\Vcard;
use App\Models\DynamicFeild;
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
            Log::error('Error in index method: ' . $e->getMessage());
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
            $plan = Plan::find(Auth::user()->plan_id) ?? 'Not Active Any';

            // Get business listings for the authenticated user
            $listing = BusinessListing::where('user_id', $userId);

            // Calculate the view count
            $viewcount = $listing->exists() 
                ? Visits::where('business_id', $listing->first()->id)->count('business_id') 
                : 0;

            return view('yellowpages::Vcard.dashboard', compact('totalscan', 'plan', 'viewcount'));
        } catch (\Exception $e) {
            Log::error('Error in dashboard method: ' . $e->getMessage());
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
            Log::error('Error in createCard method: ' . $e->getMessage());
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
            Log::error('Error in logout method: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to logout.']);
        }
    }

    ##------------------------- END ---------------------##

}
