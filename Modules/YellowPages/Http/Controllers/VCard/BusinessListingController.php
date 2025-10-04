<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessHour;
use App\Models\DynamicFeild;
use Modules\YellowPages\Http\Requests\BusinessListingRequest;
use App\Models\DynamicVCard;
use App\Models\CompanyLegalType;
use App\Models\EmployeeRange;
use App\Models\Savelisting;
use App\Models\MonthlyTurnover;
use App\Models\AdvertisingMedium;
use App\Models\AdvertisingPrice;
use App\Models\SocialMedia;
use App\Models\User;
use App\Models\BusinessSocialMedia;
use App\Models\Address;
use App\Models\VCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusinessListingController extends Controller
{

    ##------------------------- Business Listing ---------------------##
    public function businessListing(Request $request) {
        try {
            $business_listing = BusinessListing::where('user_id', Auth::id())->get();
            $user = User::find(Auth::id());
            return view('yellowpages::Vcard.business-listing', compact('business_listing','user'));
        } catch (Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with('error', 'Error fetching business listings: ' );
        }
    }
    ##------------------------- END ---------------------##
    ##------------------------- Business Listing Register ---------------------##
    public function businessRegister(Request $request)
    {
        // try {
            
            $user = User::find(Auth::id()); 
            $address = Address::where('user_id', Auth::id())->first();
            $vcard = VCard::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
            $cities = City::on('yp')->get();
            $company_legal_type = DB::connection('yp')->table('company_legal_types')->get();
            $number_of_employees = DB::connection('yp')->table('number_of_employees')->get();
            $monthly_turnovers = DB::connection('yp')->table('monthly_turnovers')->get();
            $monthly_advertising_mediums = DB::connection('yp')->table('monthly_advertising_mediums')->get();
            $monthly_advertising_prices = DB::connection('yp')->table('monthly_advertising_prices')->get();
            $social_media = DynamicFeild::on('yp')->get();  
            $categories = Category::on('yp')->get();


            return view('yellowpages::Vcard.business-listing-register', compact(
                'cities',
                'company_legal_type',
                'number_of_employees',
                'monthly_turnovers',
                'monthly_advertising_mediums',
                'monthly_advertising_prices',
                'categories',
                'social_media',
                'user',
                'address',
                'vcard'
            ));
    
        // } catch (Exception $e) {
        //     return redirect()->back()->withErrors(['error' => 'An error occurred, please try again later.']);
        // }
        
    }
    
    ##------------------------- END ---------------------##
    ##------------------------- Save Business ---------------------##
    public function saveBusiness(Request $request)
    {
        try {
            // Retrieve saved listings for the authenticated user
            $save_listing = Savelisting::where('user_id', Auth::id())->get();
    
            $business_listing = collect(); 
            
            if ($save_listing->isNotEmpty()) {
                // Get the business IDs from the saved listings
                $business_ids = $save_listing->pluck('business_id');
                
                // Retrieve the associated business listings
                $business_listing = BusinessListing::whereIn('id', $business_ids)->get();
            }
    
            // Pass the data to the view
            return view('yellowpages::Vcard.Save-listing', compact('business_listing', 'save_listing'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error retrieving business listing: ' );
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Business Listing Edit---------------------##
    public function listingEdit($id) {

         try {
            $listing = BusinessListing::findOrFail($id);
            $user = User::where('id', $listing->user_id)->first();
            $listinghours = BusinessHour::where('business_id', $listing->id)->get();
            $address = Address::where('id', $listing->address_id)->first();
            $categories = Category::where('is_active', 1)->get();
            $cities = City::where('is_active', 1)->get();
            $company_legal_type = CompanyLegalType::all();
            $number_of_employees = EmployeeRange::all();
            $monthly_turnovers = MonthlyTurnover::all();
            $monthly_advertising_mediums = AdvertisingMedium::all();
            $monthly_advertising_prices = AdvertisingPrice::all();
            $social_media = DynamicFeild::on('yp')->get();  
            $social_media_data = BusinessSocialMedia::where('listing_id', $listing->id)
            ->whereIn('social_id', $social_media->pluck('id'))
            ->get();
                  
            return view('yellowpages::Vcard.business-listing-edit', compact(
                'listing',
                'cities',
                'categories',
                'company_legal_type',
                'number_of_employees',
                'monthly_turnovers',
                'monthly_advertising_mediums',
                'monthly_advertising_prices',
                'social_media',
                'social_media_data',
                'listinghours',
                'user',
                'address'
            ));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching business data: ' );
        }
    }

    ##------------------------- END ---------------------##
    ##------------------------- Business Listing Upadte ---------------------##

    public function listingUpdate(BusinessListingRequest $request, $id)
    {
        $validated = $request->validated();     
        // Get listing
        $listing = BusinessListing::where('id', $id)->first();
    
        // Handle image upload
        $imagePath = $listing ? $listing->business_img : null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('yellowpages/business');
        }
    
        $data = [
            'user_id' => Auth::id(),
            'city_id' => $validated['location'],
            'listing_title' => $validated['listingTitle'],
            'tagline' => $validated['tagline'],
            'business_name' => $validated['businessName'],
            'legal_type_id' => $validated['businessType'],
            'employee_range_id' => $validated['employees'],
            'turnover_id' => $validated['turnover'],
            'advertising_medium_id' => $validated['advertising'],
            'advertising_price_id' => $validated['advertising_price'],
            'category_id' => $validated['category'],
            'website' => $validated['website'],
            'description' => $validated['description'] ?? null,
            'business_img' => $imagePath,
            'business_address' => $validated['business_address'],
        ];
    
        // Update or create listing
        if ($listing) {
            $listing->update($data);
        } else {
            $listing = BusinessListing::create($data);
        }
    
        if ($listing) {
            User::where('id', Auth::id())->update([
                'email' => $validated['primaryEmail'],
                'phone' => $validated['primaryPhone'],
                'name' => $validated['primaryContact'],
            ]);
        }
    
        // Handle social media
        if (!empty($validated['socialId'])) {
            foreach ($validated['socialId'] as $index => $socialId) {
                BusinessSocialMedia::updateOrCreate(
                    [
                        'listing_id' => $listing->id,
                        'social_id' => $socialId,
                    ],
                    [
                        'description' => $validated['socialDescription'][$index] ?? null,
                    ]
                );
            }
        }
    
        // Handle business hours (only if day[] exists)
        if (!empty($validated['day'])) {
            BusinessHour::where('business_id', $listing->id)
            ->whereNotIn('day', $validated['day'])
            ->delete();
            foreach ($validated['day'] as $index => $day) {
                BusinessHour::updateOrCreate(
                    [
                        'business_id' => $listing->id,
                        'day' => $day,
                    ],
                    [
                        'open_time' => $validated['open_time'][$index] ?? null,
                        'close_time' => $validated['close_time'][$index] ?? null,
                        'open_time_2' => $validated['open_time_2'][$index] ?? null,
                        'close_time_2' => $validated['close_time_2'][$index] ?? null,
                        'is_24_hours' => isset($validated['is_24_hours'][$index]) ? 1 : 0,
                        'add_2nd_time_slot' => isset($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
                    ]
                );
            }
        }
    
        return redirect()->route('vCard.business-listing')->with('success', 'सूची सफलतापूर्वक अद्यतन की गई!');
    }
    
    ##------------------------- END ---------------------##

    ##------------------------- Business Listing Delete ---------------------##
    public function ListingDelete($id)
    {
        try {
            $categories = BusinessListing::findOrFail($id);
            $categories->delete();
            return redirect()->route('vCard.business-listing')->with('success', 'Listing deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vCard.business-listing')->withErrors(['error' => 'Listing not found.']);
        } catch (\Exception $e) {
            return redirect()->route('vCard.business-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Save Listing Delete ---------------------##
    public function SavelistingDelete($id)
    {

        try {
            $categories = Savelisting::findOrFail($id);
            $categories->delete();
            return redirect()->route('vCard.business-save')->with('success', 'सूची सफलतापूर्वक अनसेव की गई.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vCard.business-save')->withErrors(['error' => 'सूची नहीं मिली.']);
        } catch (Exception $e) {
            return redirect()->route('vCard.business-save')->withErrors(['error' => 'उपयोगकर्ता को हटाने का प्रयास करते समय एक त्रुटि हुई.']);
        }
    }
    ##------------------------- END ---------------------##

}
