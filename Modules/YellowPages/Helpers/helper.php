<?php

// Import the Category model from App\Models
use App\Models\City;

if (!function_exists('get_cities')) {
    function get_cities()
    {
        // Fetch active categories
        $categories = City::where('is_active', 1)->get();
        return $categories;
    }
}
