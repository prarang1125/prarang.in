<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\YellowPages\app\Http\Requests\StoreListingRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use Modules\YellowPages\Http\Requests\BusinessListingRequest;
use App\Models\BusinessListing;
use App\Models\User;
use App\Models\Address;
use App\Models\BusinessSocialMedia;
use App\Models\BusinessFaq;
use App\Models\Visits;
use App\Models\UserPurchasePlan;
use App\Models\BusinessHour;
use App\Models\Savelisting;
use App\Models\CompanyLegalType;
use App\Models\Portal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class ListingController extends Controller
{

    ##------------------------- Show Category---------------------##

    public function showByCategory($category_name)
    {
        try {
            // Get all active categories and cities
            $categories = Category::where('is_active', 1)->get();
            $cities = City::where('is_active', 1)->get();

            // Find the requested category by its slug, or fail with a 404 error if not found
            $category = Category::where('slug', $category_name)->firstOrFail();

            // Get active listings associated with the specific category
            $listings = BusinessListing::with(['category', 'hours', 'reviews'])
                ->where('is_active', 1)
                ->whereHas('category', fn($q) => $q->where('slug', $category->slug))
                ->get();

            // Define the timezone
            $timezone = 'Asia/Kolkata';
            $currentDateTime = Carbon::now($timezone);
            $currentTime = $currentDateTime->format('H:i:s');
            $currentDay = strtolower($currentDateTime->format('l'));

            // Process listings to determine open status
            $listings->each(function ($listing) use ($timezone, $currentTime, $currentDay) {
                $listing->is_open = false;

                if ($listing->hours) {
                    foreach ($listing->hours as $hours) {
                        if ($hours->is_24_hours) {
                            $listing->is_open = true;
                            break;
                        }

                        if (strtolower($hours->day) === $currentDay) {
                            $openTime1 = $hours->open_time ? Carbon::parse($hours->open_time, $timezone) : null;
                            $closeTime1 = $hours->close_time ? Carbon::parse($hours->close_time, $timezone) : null;

                            $isOpen1 = $openTime1 && $closeTime1 && $currentTime >= $openTime1->format('H:i:s') && $currentTime <= $closeTime1->format('H:i:s');

                            $isOpen2 = false;
                            if ($hours->open_time2 && $hours->close_time2) {
                                $openTime2 = Carbon::parse($hours->open_time2, $timezone);
                                $closeTime2 = Carbon::parse($hours->close_time2, $timezone);
                                $isOpen2 = $currentTime >= $openTime2->format('H:i:s') && $currentTime <= $closeTime2->format('H:i:s');
                            }

                            if ($isOpen1 || $isOpen2) {
                                $listing->is_open = true;
                                break;
                            }
                        }
                    }
                }
            });

            // Get portal details
            $portal = Portal::first();

            // Return the view with required data
            return view('yellowpages::home.categories', compact('listings', 'categories', 'cities', 'category_name', 'portal'));
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error in showByCategory: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => __('yp.category_listings_error')]);
        }
    }

    public function showByCity($city_name)
    {




        try {

            $categories = Category::where('is_active', 1)->get();
            $cities     = City::where('is_active', 1)->get();

            // Find city
            $city = DB::connection('yp')
                ->table('cities')
                ->where(function ($query) use ($city_name) {
                    $query->where('slug', $city_name)
                        ->orWhere('name', 'LIKE', "%{$city_name}%");
                })
                ->first();


            // Final guard
            if (!$city) {
                $back = 'https://prarang.in/' . request()->query('p') ?? '/';
                return redirect()->to($back)->with('back_error', 'Yellow Pages - Coming Soon');
            }

            // Set locale
            if ($city->locale_code) {
                Session::put('locale', $city->locale_code);
                app()->setLocale($city->locale_code);
            }

            // Cookie
            setcookie('register_city', $city->id, time() + 3600, '/');

            $city_name = $city->name;
            $portal    = Portal::find($city->portal_id);

            // Listings
            $listings = BusinessListing::with(['category', 'hours', 'city', 'address', 'user'])
                ->where('is_active', 1)
                ->whereHas('city', fn($q) => $q->where('id', $city->id))
                ->get();


            $now        = Carbon::now();
            $currentDay = strtolower($now->format('l'));
            $currentTime = $now->format('H:i:s');

            $listings->each(function ($listing) use ($currentDay, $currentTime) {
                $listing->is_open = false;

                if (!$listing->hours) {
                    return;
                }

                foreach ($listing->hours as $hours) {

                    if ($hours->is_24_hours) {
                        $listing->is_open = true;
                        break;
                    }

                    if (strtolower($hours->day) !== $currentDay) {
                        continue;
                    }

                    $isOpen1 = $hours->open_time && $hours->close_time &&
                        $currentTime >= $hours->open_time &&
                        $currentTime <= $hours->close_time;

                    $isOpen2 = $hours->open_time2 && $hours->close_time2 &&
                        $currentTime >= $hours->open_time2 &&
                        $currentTime <= $hours->close_time2;

                    if ($isOpen1 || $isOpen2) {
                        $listing->is_open = true;
                        break;
                    }
                }
            });

            return view(
                'yellowpages::home.categories',
                compact('listings', 'categories', 'cities', 'city', 'city_name', 'portal')
            );
        } catch (\Throwable $e) {

            // Log::error('Yellowpages fetch failed', [
            //     'error' => $e->getMessage(),
            //     'trace' => $e->getTraceAsString()
            // ]);

            return redirect()->back()->withErrors([
                'error' => __('yp.fetch_data_error')
            ]);
        }
    }
    ##------------------------- END---------------------##

    ##------------------------- Seaching Listing---------------------##
    public function index(Request $request, $category, $city)
    {
        try {
            $categories = Category::where('is_active', 1)->get();
            $city_name = City::where('is_active', 1)->get();
            $sz = City::where('name', $city)->first();
            $query = BusinessListing::where('is_active', 1);

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
            $portal = Portal::where('id', $sz->portal_id)->first();
            $listings = $query->with(['category', 'hours', 'city'])->get()->map(function ($listing) {
                $currentTime = Carbon::now();

                // Ensure that 'hours' is a single instance (not a collection)
                $hour = $listing->hours->first();  // Get the first related 'hours' entry

                if ($hour) {
                    $openTime = Carbon::parse($hour->open_time);
                    $closeTime = Carbon::parse($hour->close_time);
                    $listing->is_open = $currentTime->between($openTime, $closeTime);
                } else {
                    $listing->is_open = false;
                }

                return $listing;
            });

            return view('yellowpages::home.categories', compact('listings', 'categories', 'city', 'portal'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('yp.fetch_data_error')]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Submit Listing  ---------------------##
    public function submit_listing()
    {
        return view("yellowpages::home.submit_listing");
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

            return view('yellowpages::home.add_listing', compact(
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
            return redirect()->back()->withErrors(['error' => __('yp.listing_submitted_title')]);
        }
    }
    ##------------------------- END---------------------##

    ##------------------------- Add Listing ---------------------##
    public function store(BusinessListingRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('yellowpages/business', 's3');
        } else {
            $validated['image'] = null;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('yellowpages/logos', 's3');
        } else {
            $validated['logo'] = null;
        }

        // Use location if city_id is not provided
        $cityId = $validated['city_id'] ?? $validated['location'];
        $cityName = City::find($cityId)->name ?? '';

        $businessAddress = $validated['business_address'] ?? implode(', ', array_filter([
            $validated['house_number'] ?? '',
            $validated['street'] ?? '',
            $validated['area_name'] ?? '',
            $cityName,
            $validated['postal_code'] ?? '',
        ]));

        $data = [
            'user_id' => Auth::id(),
            'city_id' => $cityId,
            'listing_title' => $validated['listingTitle'] ?? '',
            'tagline' => $validated['tagline'] ?? '',
            'business_name' => $validated['businessName'] ?? '',
            'legal_type_id' => $validated['businessType'] ?? null,
            'employee_range_id' => $validated['employees'] ?? null,
            'turnover_id' => $validated['turnover'] ?? null,
            'advertising_medium_id' => $validated['advertising'] ?? null,
            'advertising_price_id' => $validated['advertising_price'] ?? null,
            'category_id' => $validated['category'] ?? null,
            'website' => $validated['website'] ?? null,
            'description' => $validated['description'] ?? null,
            'business_address' => $businessAddress,
            'business_img' => $validated['image'],
            'logo' => $validated['logo'],
            'agree' => 1, // Validation ensures it's accepted
        ];

        try {
            DB::beginTransaction();

            $listing = BusinessListing::create($data);

            User::where('id', Auth::id())->update([
                'email' => $validated['primaryEmail'] ?? null,
                'phone' => $validated['primaryPhone'] ?? null,
                'name' => $validated['primaryContact'] ?? null,
            ]);

            if (!empty($validated['socialId'])) {
                foreach ($validated['socialId'] as $index => $socialId) {
                    if (!empty($socialId)) {
                        BusinessSocialMedia::create([
                            'listing_id' => $listing->id,
                            'social_id' => $socialId,
                            'description' => $validated['socialDescription'][$index] ?? null,
                        ]);
                    }
                }
            }

            if (!empty($validated['day'])) {
                foreach ($validated['day'] as $index => $day) {
                    if (!empty($day)) {
                        BusinessHour::create([
                            'business_id' => $listing->id,
                            'day' => $day,
                            'open_time' => $validated['open_time'][$index] ?? null,
                            'close_time' => $validated['close_time'][$index] ?? null,
                            'open_time_2' => $validated['open_time_2'][$index] ?? null,
                            'close_time_2' => $validated['close_time_2'][$index] ?? null,
                            'is_24_hours' => isset($validated['is_24_hours'][$index]) ? 1 : 0,
                            'add_2nd_time_slot' => isset($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('yp.listing.submit')->with('success', __('yp.listing_created_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Business Listing Store Error: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => __('yp.generic_error')]);
        }
    }

    ##------------------------- END---------------------##

    ##------------------------- Listing Details---------------------##
    public function listing($city_slug, $listing_title, $listingId)
    {
        try {
            // Fetch the listing or fail with a 404
            $listing = BusinessListing::with(['address', 'products'])->findOrFail($listingId);
            $listingHours = BusinessHour::where('business_id', $listing->id)->get();

            // Check if the user is not the owner of this specific listing
            if ($listing->user_id != Auth::id()) {
                $ipAddress = request()->ip();

                // Check if the visit already exists
                $visitExists = Visits::where('business_id', $listing->id)
                    ->where('ip_address', $ipAddress)
                    ->exists();

                if (!$visitExists) {
                    // Log the visit
                    Visits::insert([
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

            $timezone = 'Asia/Kolkata';
            $currentDateTime = Carbon::now($timezone);
            $currentTime = $currentDateTime->format('H:i:s');
            $currentDay = $currentDateTime->format('l');

            $listing->is_open = false;

            foreach ($listingHours as $hours) {
                // Check if the business operates 24/7
                if ($hours->is_24_hours) {
                    $listing->is_open = true;
                    break;
                }

                // Ensure day comparison is consistent
                if (strtolower($hours->day) === strtolower($currentDay)) {
                    // Check the first time slot
                    $openTime1 = $hours->open_time ? Carbon::createFromFormat('H:i:s', $hours->open_time, $timezone) : null;
                    $closeTime1 = $hours->close_time ? Carbon::createFromFormat('H:i:s', $hours->close_time, $timezone) : null;

                    $isOpen1 = $openTime1 && $closeTime1 && $currentTime >= $openTime1->format('H:i:s') && $currentTime <= $closeTime1->format('H:i:s');

                    // Check the second time slot, if present
                    $isOpen2 = false;
                    if ($hours->open_time2 && $hours->close_time2) {
                        $openTime2 = Carbon::createFromFormat('H:i:s', $hours->open_time2, $timezone);
                        $closeTime2 = Carbon::createFromFormat('H:i:s', $hours->close_time2, $timezone);
                        $isOpen2 = $currentTime >= $openTime2->format('H:i:s') && $currentTime <= $closeTime2->format('H:i:s');
                    }

                    // Determine if the business is open
                    if ($isOpen1 || $isOpen2) {
                        $listing->is_open = true;
                        break;
                    }
                }
            }
            return view('yellowpages::home.listing', compact('listing', 'listingHours'))->with('isOpen', $listing->is_open);


            // return view('yellowpages::home.listing', compact('listing', 'listingHours'));

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', __('yp.listing_not_found'));
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
                return redirect()->back()->with('error', __('yp.business_already_saved'));
            }

            Savelisting::create([
                'user_id' => $userId,
                'business_id' => $id,
            ]);

            return redirect()->back()->with('success', __('yp.saved_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => __('yp.fetch_data_error')]);
        }
    }
    ##------------------------- Save Listing ---------------------##

}
