<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\City;
use App\Models\BusinessListing;
use App\Models\plan;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Fetch categories and cities
            $categories = Category::where('is_active', 1)->get();
            $cities = City::where('is_active', 1)->get();

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
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching data: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Listing Plan ---------------------##
    public function listing_plan()
    {
        try {
            return view("yellowpages::Home.listing_plan");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the listing plan page: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Bazaar Plan ---------------------##
    public function bazzar_plan()
    {
        try {
            return view("yellowpages::Home.bazzar_plan");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the bazaar plan page: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Add Listing ---------------------##
    public function add_listing()
    {
        try {
            return view('yellowpages::Home.add_listing');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the add listing page: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Search Category ---------------------##
    public function showSearchcategory()
    {
        try {
            // Fetch all categories
            $categories = Category::all();

            return view('Home.homapage', compact('categories'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching categories: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Listing Dropdown ---------------------##
    public function listingDopDown()
    {
        try {
            // Fetch all categories and cities
            $categories = Category::all();
            $cities = City::all();

            return view('yellowpages::Home.home', compact('categories', 'cities'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching dropdown data: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##
    #------------------------- Plan -----------------##
    
    public function plan()
    {
        try {
            $plans= plan::all();

            return view('yellowpages::Home.plan', compact('plans'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching dropdown data: ' . $e->getMessage()]);
        }
    }

    ##------------------------- END ---------------------##




    
}
