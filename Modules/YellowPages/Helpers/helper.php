<?php

// Import the Category model from App\Models
use App\Models\Category;

if (!function_exists('get_categories')) {
    function get_categories()
    {
        // Fetch active categories
        $categories = Category::where('is_active', 1)->get();
        return $categories;
    }
}
