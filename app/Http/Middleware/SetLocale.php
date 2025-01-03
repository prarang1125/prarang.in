<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
    $locale = $request->query('lang', session('locale', config('app.locale')));
     App::setLocale($locale);

    // Optionally store the locale in session
    session(['locale' => $locale]);
    return $next($request);
}

}
