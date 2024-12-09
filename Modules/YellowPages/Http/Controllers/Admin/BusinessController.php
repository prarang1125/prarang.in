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
         $cities = City::all();
         $categories = Category::all();
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
         ));
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
