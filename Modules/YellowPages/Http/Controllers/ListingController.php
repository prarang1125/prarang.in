<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\YellowPages\Http\Requests\StoreListingRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\BusinessListing;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;


class ListingController extends Controller

{
    public function getLocationData()
    {
        $cities = City::all(); 
        $company_legal_type = DB::connection('yp')->select('SELECT * FROM company_legal_types');
        $number_of_employees = DB::connection('yp')->select('SELECT * FROM number_of_employees');
        $monthly_turnovers = DB::connection('yp')->select('SELECT * FROM monthly_turnovers');
        $monthly_advertising_mediums = DB::connection('yp')->select('SELECT * FROM monthly_advertising_mediums');
        $monthly_advertising_prices = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
        $Category = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
        $Category = Category::all(); 
        return view('yellowpages::Home.add_listing', compact('cities','company_legal_type','number_of_employees','monthly_turnovers','monthly_advertising_mediums','monthly_advertising_prices','Category'));
    }




    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'location' => 'required|exists:cities,id', // Example validation
            'listingTitle' => 'required|string|max:255',
            'businessName' => 'required|string|max:255',
            'businessAddress' => 'required|string',
            'primaryPhone' => 'required|string',
            'primaryContact' => 'required|string',
            'primaryEmail' => 'required|email',
            'businessType' => 'required|exists:company_legal_types,id',
            'employees' => 'required|exists:employee_ranges,id',
            'turnover' => 'required|exists:monthly_turnovers,id',
            'category' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'social_media' => 'nullable|array',
            'social_media.*' => 'nullable|string',
        ]);

        // Create a new listing
        $listing = BusinessListing::create([
            'location_id' => $validated['location'],
            'listing_title' => $validated['listingTitle'],
            'business_name' => $validated['businessName'],
            'business_address' => $validated['businessAddress'],
            'primary_phone' => $validated['primaryPhone'],
            'primary_contact_name' => $validated['primaryContact'],
            'primary_email' => $validated['primaryEmail'],
            'company_legal_type_id' => $validated['businessType'],
            'employee_range_id' => $validated['employees'],
            'monthly_turnover_id' => $validated['turnover'],
            'category_id' => $validated['category'],
            'description' => $validated['description'],
        ]);

        // Handle social media links
        if($request->has('social_media')) {
            foreach ($request->social_media as $socialLink) {
                SocialMediaLink::create([
                    'listing_id' => $listing->id,
                    'platform' => $socialLink,
                ]);
            }
        }

        // Store additional data like business hours, FAQ, and media if needed

        return redirect()->back()->with('success', 'Listing created successfully');
    }
}
