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
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('l')) {
            $locale = $request->query('l');

            // // Optional safety check
            if (in_array($locale, ['en', 'hi', 'cz', 'de', 'fr', 'mr'])) {
                Session::put('locale', $locale);
            }

            // Redirect to same URL WITHOUT `l`
            App::setLocale(Session::get('locale', 'hi'));
            // return redirect()->to(
            //     $request->url() . '?' . http_build_query(
            //         $request->except('l')
            //     )
            // );
        }

        // Apply locale
        App::setLocale(Session::get('locale', 'hi'));

        return $next($request);
    }
}
