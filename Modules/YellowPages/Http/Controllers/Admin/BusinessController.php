<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessHour;
use App\Models\CompanyLegalType;
use App\Models\EmployeeRange;
use App\Models\MonthlyTurnover;
use App\Models\AdvertisingMedium;
use App\Models\AdvertisingPrice;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function businessListing(Request $request) {
        $business_listing = BusinessListing::all();
    return view('yellowpages::Admin.business-listing', compact('business_listing'));
    }

    public function listingEdit($id)
    {
         // Retrieve data for the form
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

        return view('yellowpages::Admin.business-listing-edit', compact(
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
            // Basic fields
            'location' => 'required|exists:yp.cities,id',
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
            'description' => 'required|string',
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
            'day' => 'required|array',
            'open_time' => 'required|array',
            'close_time' => 'required|array',
            'is_24_hours' => 'nullable|array',
            'add_2nd_time_slot' => 'nullable|array',
            'open_time_2' => 'nullable|array',
            'close_time_2' => 'nullable|array',
        ]);
    
        // File upload handling
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/business', 'public');
        }
    
        $featureImagePath = null;
        if ($request->hasFile('coverImage')) {
            $featureImagePath = $request->file('coverImage')->store('images/feature', 'public');
        }
    
        $businessLogoPath = null;
        if ($request->hasFile('logo')) {
            $businessLogoPath = $request->file('logo')->store('images/logo', 'public');
        }
    
        // Prepare data for insertion
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
            'social_id' => $validated['socialId'] ?? null,
            'social_media_description' => $validated['socialDescription'] ?? null,
            'pincode' => $validated['pincode'],
            'logo' => $businessLogoPath,
            'feature_img' => $featureImagePath,
            'business_img' => $imagePath,
            'email' => $validated['email'],
            'password' => isset($validated['password']) ? bcrypt($validated['password']) : null,
        ];
    
        // Create the business listing
        $listing = BusinessListing::create($data);
        if (!$listing) {
            return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
        }
    
        // Process business hours if present
        if (!empty($validated['day'])) {
            foreach ($validated['day'] as $index => $day) {
                if (!empty($validated['open_time'][$index]) && !empty($validated['close_time'][$index])) {
                    BusinessHour::create([
                        'business_id' => $listing->id,
                        'day' => $day,
                        'open_time' => $validated['open_time'][$index],
                        'close_time' => $validated['close_time'][$index],
                        'open_time_2' => $validated['open_time_2'][$index] ?? null,
                        'close_time_2' => $validated['close_time_2'][$index] ?? null,
                        'is_24_hours' => isset($validated['is_24_hours'][$index]) ? 1 : 0,
                        'add_2nd_time_slot' => isset($validated['add_2nd_time_slot'][$index]) ? 1 : 0,
                    ]);
                }
            }
        }
    
        return redirect()->route('yp.listing.submit')->with('success', 'Listing created successfully!');
    }
    
    
        public function ListingDelete($id)
    {
        try {
            $categories = BusinessListing::findOrFail($id);
            $categories->delete();
            return redirect()->route('admin.business-listing')->with('success', 'Listing deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.business-listing')->withErrors(['error' => 'Listing not found.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.business-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
        }
    }
    

    
}
