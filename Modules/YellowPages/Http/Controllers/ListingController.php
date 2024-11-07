<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\YellowPages\app\Http\Requests\StoreListingRequest;
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
        $cities =  City::on('yp')->get();
        $company_legal_type = DB::connection('yp')->select('SELECT * FROM company_legal_types');
        $number_of_employees = DB::connection('yp')->select('SELECT * FROM number_of_employees');
        $monthly_turnovers = DB::connection('yp')->select('SELECT * FROM monthly_turnovers');
        $monthly_advertising_mediums = DB::connection('yp')->select('SELECT * FROM monthly_advertising_mediums');
        $monthly_advertising_prices = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
        $Category = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
        $Category =  Category::on('yp')->get();
        return view('yellowpages::Home.add_listing', compact('cities','company_legal_type','number_of_employees','monthly_turnovers','monthly_advertising_mediums','monthly_advertising_prices','Category'));
    }




    public function store(StoreListingRequest $request)
    {
        // Step 1: The data is automatically validated here
        $validated = $request->validated(); 

        // Step 2: Handle the image uploads
        $imagePath = null;
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('images/business', 'public');
        }

        $featureImagePath = null;
        if ($request->hasFile('feature_image')) {
            $featureImagePath = $request->file('feature_image')->store('images/feature', 'public');
        }

        $businessLogoPath = null;
        if ($request->hasFile('business_logo')) {
            $businessLogoPath = $request->file('business_logo')->store('images/logos', 'public');
        }

        // Step 3: Store the validated data in the database
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
            'tags_keywords' => $validated['tags_keywords'],
            'day' => json_encode($validated['day']),
            'open_time' => $validated['open_time'],
            'close_time' => $validated['close_time'],
            'is_24_hours' => $validated['is_24_hours'],
            'add_2nd_time_slot' => $validated['add_2nd_time_slot'],
            'social_id' => json_encode($validated['social_id']),
            'Image' => $imagePath,
            'feature_image' => $featureImagePath,
            'business_logo' => $businessLogoPath,
            'listing_approval' => $validated['listing_approval'],
            'Email' => $validated['Email'],
            'Password' => bcrypt($validated['Password']),
            'agree' => $validated['agree'],
        ]);

        // Step 4: Return success response
        return redirect()->route('yellowpages::listing.store')->with('success', 'Listing created successfully!');
    }
}
