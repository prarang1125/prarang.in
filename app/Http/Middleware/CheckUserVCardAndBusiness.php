<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\VCard;
use App\Models\BusinessListing;
use Illuminate\Support\Facades\Session;


class CheckUserVCardAndBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userId = Auth::id();

            // Check if user has a vCard
            $hasVCard = VCard::where('user_id', $userId)->exists();

            // Check if user has a business listing
            $hasBusinessListing = BusinessListing::where('user_id', $userId)->exists();

            // Store the results in session
            Session::put('has_vcard', $hasVCard);
            Session::put('has_business_listing', $hasBusinessListing);
        }

        return $next($request);
    }
    
}
