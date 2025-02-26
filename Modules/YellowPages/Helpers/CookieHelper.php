<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;

class CookieHelper
{
    // Store cities in a cookie
    public static function setCitiesCookie()
    {
        $cities = ['rampur', 'jaunpur', 'meerut', 'Lucknow'];
        $jsonCities = json_encode($cities);
        Cookie::queue('cities', $jsonCities); 
    }

    // Retrieve stored cities from cookie
    public static function getCitiesFromCookie()
    {
        $jsonCities = Cookie::get('cities');
        return $jsonCities ? json_decode($jsonCities, true) : [];
    }

    // Check if a specific city exists in the cookie
    public static function checkCity($city)
    {
        $cities = self::getCitiesFromCookie();
        return in_array($city, $cities);
    }

    // Delete the cookie
    public static function deleteCitiesCookie()
    {
        Cookie::queue(Cookie::forget('cities'));
    }
}
