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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusinessListingController extends Controller
{
    public function businessListing(Request $request) {
        $business_listing = BusinessListing::where('user_id', Auth::id())->get();
        return view('yellowpages::VCard.business-listing', compact('business_listing'));
    }

    public function saveBusiness(Request $request) {
        $save_listing = Savelisting::where('user_id', Auth::id())->first();
    
        if (!$save_listing) {
            return redirect()->back()->with('error', 'कोई व्यवसाय सूची नहीं मिली।');
        }
    
        $business_listing = BusinessListing::where('id', $save_listing->business_id)->get();
    
        return view('yellowpages::VCard.Save-listing', compact('business_listing','save_listing'));
    }
    
    public function listingEdit($id)
    {
         // Retrieve data for the form
         $listing = BusinessListing::findOrFail($id);
         $listinghours = BusinessHour::where('business_id', $listing->id)->get();
         $cities = City::all();
         $categories = Category::all();
         $company_legal_types = CompanyLegalType::all();
         $number_of_employees = EmployeeRange::all();
         $monthly_turnovers = MonthlyTurnover::all();
         $monthly_advertising_mediums = AdvertisingMedium::all();
         $monthly_advertising_prices = AdvertisingPrice::all();
         $social_media =  SocialMedia::all();

        return view('yellowpages::VCard.business-listing-edit', compact(
             'listing',
             'cities',
             'categories',
             'company_legal_types',
             'number_of_employees',
             'monthly_turnovers',
             'monthly_advertising_mediums',
             'monthly_advertising_prices',
             'social_media',
             'listinghours',
         ));
    }

    public function listingUpdate(Request $request)
    {
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
            'description' => 'nullable|string',
            'advertising' => 'required',
            'advertising_price' => 'required',
            'social_media' => 'nullable|string',
            'tags_keywords' => 'nullable|string',
            'fullAddress' => 'nullable|string',
            'website' => 'nullable|url',
            'phone' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'pincode' => 'nullable|string',
            'notificationEmail' => 'nullable|email',
            'userName' => 'nullable|string',
            'faq' => 'nullable|string',
            'answer' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|string|min:8',
    
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
            $imagePath = $request->file('image')->store('images/business', 'public');
        }
    
        $featureImagePath = $listing->feature_img; // Retain current value if no new upload
        if ($request->hasFile('coverImage')) {
            $featureImagePath = $request->file('coverImage')->store('images/feature', 'public');
        }
    
        $businessLogoPath = $listing->logo; // Retain current value if no new upload
        if ($request->hasFile('logo')) {
            $businessLogoPath = $request->file('logo')->store('images/logo', 'public');
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
            'notification_email' => $validated['notificationEmail'],
            'user_name' => $validated['userName'],
            'faq' => $validated['faq'],
            'answer' => $validated['answer'],
            'description' => $validated['description'],
            'tags_keywords' => $validated['tags_keywords'],
            'pincode' => $validated['pincode'],
            'logo' => $businessLogoPath,
            'feature_img' => $featureImagePath,
            'business_img' => $imagePath,
            'email' => $validated['email'],
            'password' => isset($validated['password']) ? bcrypt($validated['password']) : $listing->password,
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
    }
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
}
