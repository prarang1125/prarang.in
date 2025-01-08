<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session; // Import the Session facade
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get the locale from the session, defaulting to 'hi' (Hindi) if not set
        $locale = Session::get('locale', 'hi'); // Default to Hindi if not set

        // If the locale is invalid, set to 'hi'
        if (!in_array($locale, ['en', 'hi'])) {
            $locale = 'hi'; // Default to Hindi if the locale is not valid
        }

        // Set the application's locale
        App::setLocale($locale);

        return $next($request);
    }
}
