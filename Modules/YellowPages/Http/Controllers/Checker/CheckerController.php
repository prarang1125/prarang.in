<?php

namespace Modules\YellowPages\Http\Controllers\Checker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use Carbon\Carbon;
use App\Models\Visits;
use App\Models\UserPurchasePlan;
use App\Models\BusinessHour;
use App\Models\Category;
use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\Vcard;
use App\Models\Address;
use App\Models\CompanyLegalType;
use App\Models\EmployeeRange;
use App\Models\MonthlyTurnover;
use App\Models\AdvertisingMedium;
use App\Models\AdvertisingPrice;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CheckerController extends Controller
{
    public function CheckListing(Request $request) {
        try {
            $business_listing = BusinessListing::all();
            return view('yellowpages::admin.checker-listing', compact('business_listing'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'An error occurred while fetching the business listings: ' ]);
        }
    }

    public function approveListing($id)
    {
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
            $social_media = SocialMedia::all();
    
            // Check and get the correct image URL
            $listing->logo_url = $listing->logo ? Storage::url($listing->logo) : null;
            $listing->feature_img_url = $listing->feature_img ? Storage::url($listing->feature_img) : null;
            $listing->business_img_url = $listing->business_img ? Storage::url($listing->business_img) : null;
    
            return view('yellowpages::admin.checker-listing-approve', compact(
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
    
        } catch (ModelNotFoundException $e) {
            return redirect()->route('checker.listing')->withErrors(['error' => 'Listing not found.']);
        } catch (Exception $e) {
            return redirect()->route('checker.listing')->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    
    public function approveListingStatus($id)
    {
        $listing = BusinessListing::findOrFail($id);
        $listing->is_active = 1;
        $listing->save();
    
        return redirect()->route('checker.listing')->with('success', 'सूचीकरण सफलतापूर्वक स्वीकृत हुआ।');
    }

    public function CheckCard(Request $request) {
        try {
            $Vcard_list = Vcard::all();
            $users = User::whereIn('name', $Vcard_list->pluck('slug'))->get(); // Get all matching users
            return view('yellowpages::admin.checker-card-list', compact('Vcard_list', 'users'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' . $e->getMessage());
        }
    }
    public function approveCard($slug)
    {
        $user = User::where('name', $slug)->first();
        $address = Address::where('user_id', $user->id)->first() ?? new Address();
    
        // Fetch vCard data
        $vcard = Vcard::where('slug', $slug)
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->with('dynamicFields')
            ->first();
    
        // If vCard is missing, set a message
        if (!$vcard) {
            $message = 'आपका कार्ड स्वीकृति की प्रक्रिया में है।';
            return view('yellowpages::admin.checker-card-approval', compact('user', 'address', 'message'));
        }
    
        // Fetch category name safely
        $category = optional(Category::find($vcard->category_id))->name ?? 'Not Available';
    
        return view('yellowpages::admin.checker-card-approval', compact('vcard', 'user', 'address', 'category'));
    }
    
    
    


}
 