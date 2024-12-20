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

 // Method to store business hours
 public function store(Request $request)
 {
     // Validate the inputs
     $request->validate([
         'day' => 'required|array|min:1', // At least one day must be selected
         'day.*' => 'required|string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
         'open_time' => 'required|array|min:1',
         'open_time.*' => 'nullable|required_without:is_24_hours.*|date_format:H:i',
         'close_time' => 'required|array|min:1',
         'close_time.*' => 'nullable|required_without:is_24_hours.*|date_format:H:i',
         'is_24_hours' => 'nullable|array',
         'is_24_hours.*' => 'nullable|boolean',
         'add_2nd_slot' => 'nullable|array',
         'open_time_2' => 'nullable|array',
         'open_time_2.*' => 'nullable|date_format:H:i',
         'close_time_2' => 'nullable|array',
         'close_time_2.*' => 'nullable|date_format:H:i',
     ]);
 
     // Collect responses
     $businessHours = [];
 
     foreach ($request->day as $index => $day) {
         if (empty($day)) {
             continue; // Skip empty or invalid rows
         }
 
         // Create a new array for the current day's data
         $businessHour = [
             'business_id' => 2, // Example; adjust as needed
             'day' => $day,
             'is_24_hours' => isset($request->is_24_hours[$index]) && $request->is_24_hours[$index],
             'open_time' => null,
             'close_time' => null,
             'open_time_2' => null,
             'close_time_2' => null,
         ];
 
         if (!$businessHour['is_24_hours']) {
             $businessHour['open_time'] = $request->open_time[$index] ?? null;
             $businessHour['close_time'] = $request->close_time[$index] ?? null;
         }
 
         if (isset($request->add_2nd_slot[$index]) && $request->add_2nd_slot[$index]) {
             $businessHour['open_time_2'] = $request->open_time_2[$index] ?? null;
             $businessHour['close_time_2'] = $request->close_time_2[$index] ?? null;
         }
 
         // Append to the collection
         $businessHours[] = $businessHour;
     }
 
     // Debugging output (to match your desired response)
 
     // Uncomment this part to save the data to the database
     // foreach ($businessHours as $hour) {
     //     BusinessHour::create($hour);
     // }
 
     // Redirect with success message
     return redirect()->back()->with('success', 'Business hours saved successfully!');
 }
 
 
 
 
 

// public function store(Request $request)
// {
//     // Validation rules
//     $validated = $request->validate([
//         // Basic fields
//         // 'location' => 'required|exists:yp.cities,id',
//         // 'tagline' => 'nullable|string',
//         // 'listingTitle' => 'required|string|max:255',
//         // 'businessName' => 'required|string|max:255',
//         // 'businessAddress' => 'required|string',
//         // 'primaryPhone' => 'required|string',
//         // 'secondary_phone' => 'nullable|string',
//         // 'primaryContact' => 'required|string',
//         // 'primaryEmail' => 'required|email',
//         // 'primary_contact_email' => 'nullable|string|email',
//         // 'secondaryContactName' => 'nullable|string',
//         // 'secondaryEmail' => 'nullable|string|email',
//         // 'pincode' => 'nullable|string',
//         // 'businessType' => 'required',
//         // 'employees' => 'required',
//         // 'turnover' => 'required',
//         // 'category' => 'required',
//         // 'description' => 'required',
//         // 'advertising' => 'required',
//         // 'advertising_price' => 'required',
//         // 'social_media' => 'nullable|string',
//         // 'tags_keywords' => 'nullable|string',
//         // 'fullAddress' => 'nullable|string',
//         // 'website' => 'nullable|url',
//         // 'phone' => 'nullable|string',
//         // 'whatsapp' => 'nullable|string',
//         // 'socialId' => 'nullable|string',
//         // 'socialDescription' => 'nullable|string',
//         // 'notificationEmail' => 'nullable|email',
//         // 'userName' => 'nullable|string',
//         // 'faq' => 'nullable|string',
//         // 'answer' => 'nullable|string',
//         // 'email' => 'nullable|email',
//         // 'password' => 'nullable|string|min:8', // Password should be at least 8 characters
//         // 'agree' => 'nullable|accepted', // Ensure user agreement with checkbox

//         // Business hours
//         'day' => 'required',
//         'day.*' => 'required',
//         'open_time' => 'required',
//         'open_time.*' => 'required',
//         'close_time' => 'required',
//         'close_time.*' => 'required',
//         'is_24_hours' => 'nullable',
//         'is_24_hours.*' => 'nullable',
//         'add_2nd_time_slot' => 'nullable',
//         'add_2nd_time_slot.*' => 'nullable',
//         'open_time_2' => 'nullable',
//         'open_time_2.*' => 'nullable',
//         'close_time_2' => 'nullable',
//         'close_time_2.*' => 'nullable',

//         // // Image validation
//         // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         // 'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//     ]);

//     // File upload handling
//     $imagePath = $request->hasFile('image') 
//                  ? $request->file('image')->store('images/business', 'public') 
//                  : null;

//     $featureImagePath = $request->hasFile('coverImage') 
//                         ? $request->file('coverImage')->store('images/feature', 'public') 
//                         : null;

//     $businessLogoPath = $request->hasFile('logo') 
//                         ? $request->file('logo')->store('images/logo', 'public') 
//                         : null;


//     // Prepare data for insertion
//     $data = [
//         'city_id' => $validated['location'],
//         'listing_title' => $validated['listingTitle'],
//         'tagline' => $validated['tagline'],
//         'business_name' => $validated['businessName'],
//         'business_address' => $validated['businessAddress'],
//         'primary_phone' => $validated['primaryPhone'],
//         'secondary_phone' => $validated['secondary_phone'],
//         'primary_contact_name' => $validated['primaryContact'],
//         'primary_contact_email' => $validated['primaryEmail'],
//         'secondary_contact_name' => $validated['secondaryContactName'],
//         'secondary_contact_email' => $validated['secondaryEmail'],
//         'legal_type_id' => $validated['businessType'],
//         'employee_range_id' => $validated['employees'],
//         'turnover_id' => $validated['turnover'],
//         'advertising_medium_id' => $validated['advertising'],
//         'advertising_price_id' => $validated['advertising_price'],
//         'category_id' => $validated['category'],
//         'full_address' => $validated['fullAddress'],
//         'website' => $validated['website'],
//         'phone' => $validated['phone'],
//         'whatsapp' => $validated['whatsapp'],
//         'notification_email' => $validated['notificationEmail'],
//         'user_name' => $validated['userName'],
//         'faq' => $validated['faq'],
//         'answer' => $validated['answer'],
//         'description' => is_array($validated['description']) ? implode(',', $validated['description']) : $validated['description'],
//         'tags_keywords' => $validated['tags_keywords'],
//         'social_id' => $validated['socialId'],
//         'social_media_description' => $validated['socialDescription'],
//         'pincode' => $validated['pincode'],
//         'logo' =>  $businessLogoPath,
//         'feature_img' => $featureImagePath,
//         'business_img' => $imagePath,
//         'email' => $validated['email'],
//         'password' => isset($validated['password']) ? bcrypt($validated['password']) : null,
//         'agree' => isset($validated['agree']) && $validated['agree'] === 'on' ? 1 : 0, // Explicitly handle 'on' as 1
//     ];

//     // Create the business listing
//     $listing = BusinessListing::create($data);
//     if (!$listing) {
//         return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
//     }

//     // Process business hours if present
//     if (!empty($validated['day'])) {
//         foreach ($validated['day'] as $index => $day) {
//             if (!empty($validated['open_time'][$index]) && !empty($validated['close_time'][$index])) {
//                 BusinessHour::create([
//                     'business_id' => $listing->id, // Use actual business ID
//                     'day' => $day,
//                     'open_time' => $validated['open_time'][$index],
//                     'close_time' => $validated['close_time'][$index],
//                     'open_time_2' => $validated['open_time_2'][$index] ?? null,
//                     'close_time_2' => $validated['close_time_2'][$index] ?? null,
//                     'is_24_hours' => !empty($validated['is_24_hours'][$index]) ? 1 : 0,
//                     'add_2nd_time_slot' => !empty($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
//                 ]);
//             }
//         }
//     }

//     return redirect()->route('yp.listing.submit')->with('success', 'Listing created successfully!');
// }


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