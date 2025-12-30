<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\City;
use App\Models\BusinessListing;
use App\Models\Plan;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $timezone = 'Asia/Kolkata';

            $categories = Category::where('is_active', 1)->get();
            $cities = City::where('is_active', 1)->get();

            $listings = BusinessListing::with(['category', 'hours', 'reviews'])->where('is_active', 1)->get();

            $listings->each(function ($listing) use ($timezone) {
                $listing->load('hours'); // Ensure hours are loaded

                $currentDateTime = Carbon::now($timezone);
                $currentTime = $currentDateTime->format('H:i:s');
                $currentDay = $currentDateTime->format('l');

                $listing->is_open = false;

                if ($listing->hours) {
                    foreach ($listing->hours as $hours) {
                        if ($hours->is_24_hours) {
                            $listing->is_open = true;
                            break;
                        }

                        if (strtolower($hours->day) === strtolower($currentDay)) {
                            $openTime1 = $hours->open_time ? Carbon::createFromFormat('H:i:s', $hours->open_time, $timezone) : null;
                            $closeTime1 = $hours->close_time ? Carbon::createFromFormat('H:i:s', $hours->close_time, $timezone) : null;

                            $isOpen1 = $openTime1 && $closeTime1 && $currentTime >= $openTime1->format('H:i:s') && $currentTime <= $closeTime1->format('H:i:s');

                            $isOpen2 = false;
                            if ($hours->open_time2 && $hours->close_time2) {
                                $openTime2 = Carbon::createFromFormat('H:i:s', $hours->open_time2, $timezone);
                                $closeTime2 = Carbon::createFromFormat('H:i:s', $hours->close_time2, $timezone);
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

            $topRatedListings = $listings->sortByDesc(function ($listing) {
                if ($listing->ratings && $listing->ratings->count() > 0) {
                    $averageRating = $listing->ratings->avg(function ($rating) {
                        return ($rating->cleaners + $rating->services + $rating->price + $rating->ambience) / 4;
                    });
                    return $averageRating;
                }
                return 0;
            })->take(5);


            return view('yellowpages::home.home', compact('categories', 'cities', 'topRatedListings'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching data: ']);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Listing Plan ---------------------##
    public function listing_plan()
    {
        try {
            return view("yellowpages::home.listing_plan");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the listing plan page: ']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Bazaar Plan ---------------------##
    public function bazzar_plan()
    {
        try {
            return view("yellowpages::home.bazzar_plan");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the bazaar plan page: ']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- Add Listing ---------------------##
    public function add_listing()
    {
        try {
            return view('yellowpages::home.add_listing');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the add listing page: ']);
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
            return back()->withErrors(['error' => 'An error occurred while fetching categories: ']);
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

            return view('yellowpages::home.home', compact('categories', 'cities'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching dropdown data: ']);
        }
    }
    ##------------------------- END ---------------------##
    #------------------------- Plan -----------------##

    public function plan()
    {
        try {
            $plans = Plan::all();

            return view('yellowpages::home.plan', compact('plans'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while fetching dropdown data: ']);
        }
    }

    ##------------------------- END ---------------------##


    public function privacyPolicy()
    {
        // try {
        return view('yellowpages::home.privacyPolicy');
        // } catch (\Exception $e) {
        //     return back()->withErrors(['error' => 'An error occurred while fetching dropdown data' ]);
        // }
    }
}
