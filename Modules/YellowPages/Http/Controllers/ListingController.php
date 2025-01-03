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
use Illuminate\Support\Facades\Auth;


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
 
public function store(Request $request)
{
    // Authentication check
    // if (!Auth::id()) {
    //  return redirect()->route('vCard.login')->with('failed', 'You are not logged in.');
    // }

    // Validation rules
    $validated = $request->validate([
        'location' => 'required',
        'tagline' => 'nullable|string',
        'listingTitle' => 'required|string|max:255',
        'businessName' => 'required|string|max:255',
        'businessAddress' => 'required|string',
        'primaryPhone' => 'required|string',
        'secondary_phone' => 'nullable|string',
        'primaryContact' => 'required|string',
        'primaryEmail' => 'required|email',
        'primary_contact_email' => 'nullable|string|email',
        'secondaryContactName' => 'nullable|string',
        'secondaryEmail' => 'nullable|string|email',
        'pincode' => 'nullable|string',
        'businessType' => 'required',
        'employees' => 'required',
        'turnover' => 'required',
        'category' => 'required',
        'description' => 'required',
        'advertising' => 'required',
        'advertising_price' => 'required',
        'social_media' => 'nullable|string',
        'tags_keywords' => 'nullable|string',
        'fullAddress' => 'nullable|string',
        'website' => 'nullable|url',
        'phone' => 'nullable|string',
        'whatsapp' => 'nullable|string',
        'socialId' => 'nullable|string',
        'socialDescription' => 'nullable|string',
        'notificationEmail' => 'nullable|email',
        'userName' => 'nullable|string',
        'faq' => 'nullable|string',
        'answer' => 'nullable|string',
        'email' => 'nullable|email',
        'password' => 'nullable|string|min:8',
        'agree' => 'nullable|accepted',
        'day' => 'required|array',
        'day.*' => 'required|string',
        'open_time' => 'required|array',
        'open_time.*' => 'required|string',
        'close_time' => 'required|array',
        'close_time.*' => 'required|string',
        'is_24_hours' => 'nullable|array',
        'is_24_hours.*' => 'nullable|boolean',
        'add_2nd_time_slot' => 'nullable|array',
        'add_2nd_time_slot.*' => 'nullable|boolean',
        'open_time_2' => 'nullable|array',
        'open_time_2.*' => 'nullable|string',
        'close_time_2' => 'nullable|array',
        'close_time_2.*' => 'nullable|string',
    ]);

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

    // Prepare data for insertion
    $data = [
        'city_id' => $validated['location'],
        'listing_title' => $validated['listingTitle'],
        'tagline' => $validated['tagline'],
        'business_name' => $validated['businessName'],
        'business_address' => $validated['businessAddress'],
        'primary_phone' => $validated['primaryPhone'],
        'secondary_phone' => $validated['secondary_phone'],
        'primary_contact_name' => $validated['primaryContact'],
        'primary_contact_email' => $validated['primaryEmail'],
        'secondary_contact_name' => $validated['secondaryContactName'],
        'secondary_contact_email' => $validated['secondaryEmail'],
        'legal_type_id' => $validated['businessType'],
        'employee_range_id' => $validated['employees'],
        'turnover_id' => $validated['turnover'],
        'advertising_medium_id' => $validated['advertising'],
        'advertising_price_id' => $validated['advertising_price'],
        'category_id' => $validated['category'],
        'full_address' => $validated['fullAddress'],
        'website' => $validated['website'],
        'phone' => $validated['phone'],
        'whatsapp' => $validated['whatsapp'],
        'notification_email' => $validated['notificationEmail'],
        'user_name' => $validated['userName'],
        'faq' => $validated['faq'],
        'answer' => $validated['answer'],
        'description' => is_array($validated['description']) ? implode(',', $validated['description']) : $validated['description'],
        'tags_keywords' => $validated['tags_keywords'],
        'social_id' => $validated['socialId'],
        'social_media_description' => $validated['socialDescription'],
        'pincode' => $validated['pincode'],
        'logo' => $businessLogoPath,
        'feature_img' => $featureImagePath,
        'business_img' => $imagePath,
        'email' => $validated['email'],
        'password' => isset($validated['password']) ? bcrypt($validated['password']) : null,
        'agree' => isset($validated['agree']) ? 1 : 0,
    ];

    // Create the business listing
    $listing = BusinessListing::create($data);
    if (!$listing) {
        return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
    }

    // Process business hours
    foreach ($validated['day'] as $index => $day) {
        BusinessHour::create([
            'business_id' => $listing->id,
            'day' => $day,
            'open_time' => $validated['open_time'][$index],
            'close_time' => $validated['close_time'][$index],
            'open_time_2' => $validated['open_time_2'][$index] ?? null,
            'close_time_2' => $validated['close_time_2'][$index] ?? null,
            'is_24_hours' => !empty($validated['is_24_hours'][$index]) ? 1 : 0,
            'add_2nd_time_slot' => !empty($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
        ]);
    }

    return redirect()->route('yp.listing.submit')->with('success', 'Listing created successfully!');
}


public function listing($listingId)
{
    $listing = BusinessListing::with(['hours'])->find($listingId);
    if ($listing) {
        $currentTime = Carbon::now();
        if ($listing->hours) {
            $openTime = Carbon::parse($listing->hours->open_time);
            $closeTime = Carbon::parse($listing->hours->close_time);
            $listing->is_open = $currentTime->between($openTime, $closeTime);
        } else {
            $listing->is_open = false;
        }
        return view('yellowpages::Home.listing', compact('listing'));
    } else {
        return redirect()->back()->with('error', 'Listing not found.');
    }
}

}