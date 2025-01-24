<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessHour;
use App\Models\CompanyLegalType;
use App\Models\EmployeeRange;
use App\Models\Savelisting;
use App\Models\MonthlyTurnover;
use App\Models\AdvertisingMedium;
use App\Models\AdvertisingPrice;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusinessListingController extends Controller
{

    ##------------------------- Business Listing ---------------------##
    public function businessListing(Request $request) {
        try {
            $business_listing = BusinessListing::where('user_id', Auth::id())->get();
            return view('yellowpages::Vcard.business-listing', compact('business_listing'));
        } catch (Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with('error', 'Error fetching business listings: ' );
        }
    }
    ##------------------------- END ---------------------##
    ##------------------------- Business Listing Register ---------------------##
    public function businessRegister(Request $request) {
        try {
            $cities = City::on('yp')->get();
            $company_legal_type = DB::connection('yp')->select('SELECT * FROM company_legal_types');
            $number_of_employees = DB::connection('yp')->select('SELECT * FROM number_of_employees');
            $monthly_turnovers = DB::connection('yp')->select('SELECT * FROM monthly_turnovers');
            $monthly_advertising_mediums = DB::connection('yp')->select('SELECT * FROM monthly_advertising_mediums');
            $monthly_advertising_prices = DB::connection('yp')->select('SELECT * FROM monthly_advertising_prices');
            $social_media = DB::connection('yp')->select('SELECT * FROM social_media_platforms');
            $Category = Category::on('yp')->get();

            return view('yellowpages::Vcard.business-listing-register', compact(
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
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' ]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Save Business ---------------------##
    public function saveBusiness(Request $request)
    {
        try {
            // Retrieve saved listings for the authenticated user
            $save_listing = Savelisting::where('user_id', Auth::id())->get();
    
            $business_listing = collect(); // Initialize as empty collection
            
            // Check if any listings exist for the user
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
            $listinghours = BusinessHour::where('business_id', $listing->id)->get();
            $categories = Category::where('is_active', 1)->get();
            $cities = City::where('is_active', 1)->get();
            $company_legal_types = CompanyLegalType::all();
            $number_of_employees = EmployeeRange::all();
            $monthly_turnovers = MonthlyTurnover::all();
            $monthly_advertising_mediums = AdvertisingMedium::all();
            $monthly_advertising_prices = AdvertisingPrice::all();
            $social_media =  SocialMedia::all();

            return view('yellowpages::Vcard.business-listing-edit', compact(
                'listing',
                'cities',
                'categories',
                'company_legal_types',
                'number_of_employees',
                'monthly_turnovers',
                'monthly_advertising_mediums',
                'monthly_advertising_prices',
                'social_media',
                'listinghours'
            ));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching business data: ' );
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Business Listing Upadte ---------------------##
    public function listingUpdate(Request $request) {
        try {
            $validated = $request->validate([
                'location' => 'required',
                'listingTitle' => 'required|string|max:255',
                'businessName' => 'required|string|max:255',
                'businessAddress' => 'required|string',
                'primaryPhone' => 'required|string',
                'primaryContact' => 'required|string',
                'primaryEmail' => 'required|email',
                'businessType' => 'required',
                'employees' => 'required',
                'turnover' => 'required',
                'category' => 'required',
                'description' => 'nullable',
                'advertising' => 'required',
                'advertising_price' => 'required',
                'social_media' => 'nullable|string',
                'tags_keywords' => 'nullable',
                'fullAddress' => 'nullable|string',
                'website' => 'nullable|url',
                'phone' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'pincode' => 'nullable|string',
                'faq' => 'nullable|string',
                'answer' => 'nullable|string',

                // Business hours validation
                'day' => 'nullable|array',
                'open_time' => 'nullable|array',
                'close_time' => 'nullable|array',
                'is_24_hours' => 'nullable|array',
                'add_2nd_time_slot' => 'nullable|array',
                'open_time_2' => 'nullable|array',
                'close_time_2' => 'nullable|array',
            ]);

            // Locate the business listing
            $listing = BusinessListing::where('user_id', Auth::id())->first();

            if (!$listing) {
                return redirect()->back()->withErrors(['error' => 'Listing not found']);
            }

            // File upload handling
            $imagePath = $listing->business_img; // Retain current value if no new upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('yellowpages/business');
            }

            $featureImagePath = $listing->feature_img; // Retain current value if no new upload
            if ($request->hasFile('coverImage')) {
                $featureImagePath = $request->file('coverImage')->store('yellowpages/feature');
            }

            $businessLogoPath = $listing->logo; // Retain current value if no new upload
            if ($request->hasFile('logo')) {
                $businessLogoPath = $request->file('logo')->store('yellowpages/logo');
            }

            // Prepare data for update
            $data = [
                'city_id' => $validated['location'],
                'listing_title' => $validated['listingTitle'],
                'business_name' => $validated['businessName'],
                'business_address' => $validated['businessAddress'],
                'primary_phone' => $validated['primaryPhone'],
                'primary_contact_name' => $validated['primaryContact'],
                'primary_contact_email' => $validated['primaryEmail'],
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
                'description' => $validated['description'],
                'tags_keywords' => $validated['tags_keywords'],
                'pincode' => $validated['pincode'],
                'logo' => $businessLogoPath,
                'feature_img' => $featureImagePath,
                'business_img' => $imagePath,

            ];

            // Update the business listing
            $listing->update($data);

            // Process business hours if present
            if (!empty($validated['day'])) {
                foreach ($validated['day'] as $index => $day) {
                    if (!empty($validated['open_time'][$index]) && !empty($validated['close_time'][$index])) {
                        BusinessHour::updateOrCreate(
                            ['business_id' => $listing->id, 'day' => $day],
                            [
                                'open_time' => $validated['open_time'][$index],
                                'close_time' => $validated['close_time'][$index],
                                'open_time_2' => $validated['open_time_2'][$index] ?? null,
                                'close_time_2' => $validated['close_time_2'][$index] ?? null,
                                'is_24_hours' => isset($validated['is_24_hours'][$index]) ? 1 : 0,
                                'add_2nd_time_slot' => isset($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
                            ]
                        );
                    }
                }
            }

            return redirect()->route('vCard.business-listing')->with('success', 'Listing updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error updating business listing: ' );
        }
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
        } catch (\Exception $e) {
            return redirect()->route('vCard.business-save')->withErrors(['error' => 'उपयोगकर्ता को हटाने का प्रयास करते समय एक त्रुटि हुई.']);
        }
    }

    ##------------------------- END ---------------------##

}
