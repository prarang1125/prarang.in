<?php
namespace Modules\YellowPages\app\Http\Controllers\Main;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\City;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{

    public function index()
    {
        // Fetch categories and cities
        $categories = Category::all();
        $cities = City::all();
    
        $listings = BusinessListing::with(['category', 'hours'])->get()->map(function ($listing) {
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
    
        // Return the view with data
        return view('yellowpages::Home.home', compact('categories', 'cities', 'listings'));
    }
    
    public function listing_plan(){
        return view("yellowpages::Home.listing_plan");
    }

    public function add_listing(){
        return view('yellowpages::Home.add_listing');
    }

    public function showSearchcategory()
    {
        $categories = Category::all();  // Fetch all categories
        return view('Home.homapage', compact('categories'));
    }

    public function listingDopDown()
    {
        // Fetch all categories and cities from the database
        $categories = Category::all();
        $cities = City::all();

        return view('yellowpages::Home.home', compact('categories', 'cities'));

        // Pass categories and cities to the view
        // return view('Home.home', compact('categories', var_names: 'cities'));
    }
}
