<?php

namespace Modules\YellowPages\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\YellowPages\app\Http\Requests\StoreListingRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\Visits;
use App\Models\UserPurchasePlan;
use App\Models\BusinessHour;
use App\Models\Savelisting;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{

    ##------------------------- Show Category---------------------##

    public function showByCategory($category_name)
        {
            try {
                $categories = Category::where('is_active', 1)->get();
                $cities = City::where('is_active', 1)->get();

                $category = Category::where('slug', $category_name)->firstOrFail();
                $listings = BusinessListing::with(['category', 'hours'])
                    ->whereHas('category', fn($q) => $q->where('slug', $category->slug))
                    ->get();

                return view('yellowpages::Home.categories', compact('listings', 'categories', 'cities', 'category_name'));
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
            }
        }

    ##------------------------- END---------------------##

    ##------------------------- Show City---------------------##
        public function showByCity($city_name)
        {
            try {
                $categories = Category::where('is_active', 1)->get();
                $cities = City::where('is_active', 1)->get();

                $city = City::where('name', $city_name)->firstOrFail();
                $listings = BusinessListing::with(['category', 'hours', 'city'])
                    ->whereHas('city', fn($q) => $q->where('city_id', $city->id))
                    ->get();

                return view('yellowpages::Home.categories', compact('listings', 'categories', 'cities', 'city_name'));
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
            }
        }
    ##------------------------- END---------------------##

    ##------------------------- Seaching Listing---------------------##
        public function index(Request $request, $category, $city)
        {
            try {
                $categories = Category::where('is_active', 1)->get();
                $cities = City::where('is_active', 1)->get();

                $query = BusinessListing::query();

                if ($category) {
                    $categoryId = Category::where('name', 'like', '%' . $category . '%')
                        ->where('is_active', true)
                        ->pluck('id')->first();

                    if ($categoryId) {
                        $query->where('category_id', $categoryId);
                    }
                }

                if ($city) {
                    $cityId = City::where('name', 'like', '%' . $city . '%')
                        ->where('is_active', true)
                        ->pluck('id')->first();

                    if ($cityId) {
                        $query->where('city_id', $cityId);
                    }
                }

                $listings = $query->with(['category', 'hours', 'city'])->get()->map(function ($listing) {
                    $currentTime = Carbon::now();

                    if ($listing->hours) {
                        $openTime = Carbon::parse($listing->hours->open_time);
                        $closeTime = Carbon::parse($listing->hours->close_time);
                        $listing->is_open = $currentTime->between($openTime, $closeTime);
                    } else {
                        $listing->is_open = false;
                    }

                    return $listing;
                });

                return view('yellowpages::Home.categories', compact('listings', 'categories', 'cities'));
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
            }
        }
    ##------------------------- END---------------------##

    ##------------------------- Submit Listing---------------------##
    public function submit_listing(){
        return view("yellowpages::Home.submit_listing");
    }
    ##------------------------- END---------------------##

    ##------------------------- Show Listing Form ---------------------##
    public function getLocationData()
    {
        try {
            $cities = City::on('yp')->get();
            $company_legal_type = DB::connection('yp')->select('SELECT * FROM company_legal_types');
            $number_of_employees = DB::connection('yp')->select('SELECT * FROM number_of_employees');
            $monthly_turnovers = DB::connection('yp')->select('SELECT * FROM monthly_turnovers');
            $monthly_advertising_mediums = DB::connection('yp')->select('SELECT * FROM monthly_advertising_mediums');
            $monthly_advertising_prices = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
            $social_media = DB::connection('yp')->select('SELECT * FROM social_media_platforms');
            $Category = Category::on('yp')->get();

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
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END---------------------##

    ##------------------------- Add Listing ---------------------##
    public function store(Request $request)
    {
    try {
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
            'email' => 'nullable',
            'password' => 'nullable',
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
                     ? $request->file('image')->store('yellowpages/business')
                     : null;

        $featureImagePath = $request->hasFile('coverImage')
                            ? $request->file('coverImage')->store('yellowpages/feature')
                            : null;

        $businessLogoPath = $request->hasFile('logo')
                            ? $request->file('logo')->store('yellowpages/logo')
                            : null;

        // Prepare data for insertion
        $data = [
            'user_id'=>Auth::id(),
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

        // Redirect to the success page
        return redirect()->route('yp.listing.submit')->with('success', 'Listing created successfully!');

    } catch (\Exception $e) {
        // Catch any exceptions and return error message
        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
    }
    ##------------------------- END---------------------##

    ##------------------------- Listing Details---------------------##
    public function listing($city_slug, $listingId, $listing_title)
    {
        try {
            // Fetch the listing or fail with a 404
            $listing = BusinessListing::findOrFail($listingId);
            $listingHours = BusinessHour::where('business_id', $listing->id)->get();

            // Check if the user is not the owner
            $checkCreator = BusinessListing::where('user_id', '!=', Auth::id())->first();

            if ($checkCreator) {
                $ipAddress = request()->ip();

                // Check if the visit already exists
                $visitExists = Visits::where('business_id', $listing->id)
                    ->where('ip_address', $ipAddress)
                    ->first();

                if (!$visitExists) {
                    // Log the visit
            $vistCount=Visits::insert([
                        'business_id' => $listingId,
                        'ip_address' => $ipAddress,
                        'user_type' => Auth::check() ? 'user' : 'guest',
                        'username' => Auth::check() ? Auth::user()->name : 'Guest',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    UserPurchasePlan::where('user_id', $listing->user_id)
                    ->increment('current_visits', 1);

                }
            }

            $currentDay = Carbon::now()->format('l');
            $currentTime = Carbon::now();
            $isOpen = false;

            foreach ($listingHours as $hour) {
                if (strtolower($hour->day) === strtolower($currentDay)) {
                    $openTime = Carbon::parse($hour->open_time);
                    $closeTime = Carbon::parse($hour->close_time);

                    if ($currentTime->between($openTime, $closeTime)) {
                        $isOpen = true;
                        break;
                    }
                }
            }

            return view('yellowpages::Home.listing', compact('listing', 'listingHours', 'isOpen'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Listing not found.');
        }
    }

    ##-------------------------END ---------------------##


    ##------------------------- Save Listing  ---------------------##
    public function save_listing($id)
    {
        try {
            $userId = Auth::id();

            $exists = Savelisting::where('user_id', $userId)
                ->where('business_id', $id)
                ->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'This business is already saved!');
            }

            Savelisting::create([
                'user_id' => $userId,
                'business_id' => $id,
            ]);

            return redirect()->back()->with('success', 'Saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    ##------------------------- Save Listing ---------------------##

}
