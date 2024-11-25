<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\YellowPages\app\Http\Requests\StoreListingRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;


class ListingController extends Controller

{

    // public function index()
    // {
    //     $categories = Category::all();
    //     // Fetch business listings with related category and business hours
    //     $listings = BusinessListing::with(['hours'])->get()->map(function ($listing) {
    //         $currentTime = Carbon::now();
        
    //         if ($listing->hours) {
    //             // Parse the opening and closing times
    //             $openTime = Carbon::parse($listing->hours->open_time);
    //             $closeTime = Carbon::parse($listing->hours->close_time);
        
    //             // Determine if the current time falls within the open and close times
    //             $listing->is_open = $currentTime->between($openTime, $closeTime);

    //         } else {
    //             // If no hours are defined, default to closed
    //             $listing->is_open = false;
    //         }
        
    //         return $listing;
      
    //     });
    
    //     // Return the view with data
    //     return view('yellowpages::Home.categories', compact( 'listings', 'categories'));
    // }


    public function index(Request $request)
{
    // Fetch all categories and cities for dropdowns
    $categories = Category::all();
    $cities = City::all();

    // Start building the query for business listings
    $query = BusinessListing::query();

    // Apply category filter if selected
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // Apply city filter if selected
    if ($request->filled('city')) {
        $query->where('city_id', $request->city);
    }

    // Fetch business listings with related category and business hours
    $listings = $query->with(['category', 'hours'])->get()->map(function ($listing) {
        $currentTime = Carbon::now();

        // Check if business hours exist
        if ($listing->hours) {
            $openTime = Carbon::parse($listing->hours->open_time);
            $closeTime = Carbon::parse($listing->hours->close_time);
            $listing->is_open = $currentTime->between($openTime, $closeTime); // Determine if open
        } else {
            // If no hours, consider it closed
            $listing->is_open = false;
        }

        return $listing;
    });

    // Return the view with filtered data
    return view('yellowpages::Home.categories', compact('listings', 'categories', 'cities'));
}

    public function submit_listing(){
        return view("yellowpages::Home.submit_listing");
    }

   public function getLocationData()
{
    $cities = City::on('yp')->get();
    $company_legal_type = DB::connection('yp')->select('SELECT * FROM company_legal_types');
    $number_of_employees = DB::connection('yp')->select('SELECT * FROM number_of_employees');
    $monthly_turnovers = DB::connection('yp')->select('SELECT * FROM monthly_turnovers');
    $monthly_advertising_mediums = DB::connection('yp')->select('SELECT * FROM monthly_advertising_mediums');
    $monthly_advertising_prices = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
    $social_media = DB::connection('yp')->select('SELECT * FROM social_media_platforms');
    $Category = Category::on('yp')->get(); // Double check this line to ensure Category model uses 'yp'

    return view('yellowpages::Home.add_listing', compact(
        'cities',
        'company_legal_type',
        'number_of_employees',
        'monthly_turnovers',
        'monthly_advertising_mediums',
        'monthly_advertising_prices',
        'Category',
        'social_media'
    ));

}


public function store(StoreListingRequest $request)
{
    // Validate only necessary fields
    $validated = $request->validated(); 
    // File upload handling
    $imagePath = $request->hasFile('image') 
                 ? $request->file('image')->store('images/business', 'public') 
                : null;


    $featureImagePath = $request->hasFile('coverImage') 
                        ? $request->file('coverImage')->store('images/feature', 'public') 
                        : null;

    $businessLogoPath = $request->hasFile('logo') 
                        ? $request->file('logo')->store('images/logo', 'public') 
                        : null;

    // Assign data with default values for optional fields
    $data = [
        'city_id' => $validated['location'] ?? null,
        'listing_title' => $validated['listingTitle'] ?? null,
        'tagline' => $validated['tagline'],
        'business_name' => $validated['businessName'] ?? null,
        'business_address' => $validated['businessAddress'] ?? null,
        'primary_phone' => $validated['primaryPhone'] ?? null,
        'secondary_phone' => $validated['secondary_phone'] ?? null,
        'primary_contact_name' => $validated['primaryContact'] ?? null,
        'primary_contact_email' => $validated['primaryEmail'] ?? null,
        'secondary_contact_name' => $validated['secondaryContactName'] ?? null,
        'secondary_contact_email' => $validated['secondaryEmail'] ?? null,
        'legal_type_id' => $validated['businessType'] ?? null,
        'employee_range_id' => $validated['employees'] ?? null,
        'turnover_id' => $validated['turnover'] ?? null,
        'advertising_medium_id' => $validated['advertising'] ?? null,
        'advertising_price_id' => $validated['advertising_price'] ?? null,
        'category_id' => $validated['category'] ?? null,
        'full_address' => $validated['fullAddress'] ?? null,
        'website' => $validated['website'] ?? null,
        'phone' => $validated['phone'] ?? null,
        'whatsapp' => $validated['whatsapp'] ?? null,
        'notification_email' => $validated['notificationEmail'] ?? null,
        'user_name' => $validated['userName'] ?? null,
        'faq' => $validated['faq'] ?? null,
        'answer' => $validated['answer'] ?? null,
        'description' => is_array($validated['description']) ? implode(',', $validated['description']) : $validated['description'] ?? null,
        'tags_keywords' => $validated['tags_keywords'] ?? null,
        'social_id' => $validated['socialId'] ?? null,
        'social_media_description' => $validated['socialDescription'] ?? null,
        'pincode' => $validated['pincode'] ?? null,
        'logo' =>  $businessLogoPath,
        'feature_img' => $featureImagePath,
        'business_img' =>$imagePath,
        'email' => $validated['email'] ?? null,
        'password' => isset($validated['password']) ? bcrypt($validated['password']) : null,
        'agree' => isset($validated['agree']) && $validated['agree'] === 'on' ? 1 : 0, // Explicitly handle 'on' as 1

    ];

     // Create the business listing
        //  $listing = BusinessListing::create($data);
        //  if (!$listing) {
        //     return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
        // }
    // Insert business hours data
    if (!empty($validated['day'])) {
        foreach ($validated['day'] as $index => $day) {
            if (isset($validated['open_time'][$index]) && isset($validated['close_time'][$index])) {
                $hoursData = [
                    'business_id' => 1,
                    'day' => $day,
                    'open_time' => $validated['open_time'][$index],
                    'close_time' => $validated['close_time'][$index],
                    'open_time_2' => $validated['open_time_2'][$index] ?? null,
                    'close_time_2' => $validated['close_time_2'][$index] ?? null,
                    'is_24_hours' => !empty($validated['is_24_hours'][$index]) ? 1 : 0,
                    'add_2nd_time_slot' => !empty($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
                ];

                BusinessHour::create($hoursData);
            }
        }
    }

    return redirect()->route('yp.listing.submit')->with('success', 'Listing created successfully!');
}


public function listing()
{
    return view('yellowpages::Home.listing');
}
}