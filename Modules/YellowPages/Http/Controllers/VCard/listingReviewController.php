<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use App\Models\Review;
use Illuminate\Support\Facades\LOG;
use Illuminate\Support\Facades\Auth;

class listingReviewController extends Controller
{
    public function Rating()
    {
        try {
            // Fetch listings for the user
            $listings = BusinessListing::where('user_id', Auth::id())->get();  // Use get() to fetch all listings

            // If no listings exist for the user, show an error message and pass an empty reviews collection
            if ($listings->isEmpty()) {
                return view('yellowpages::Vcard.review', [
                    'reviews' => collect(),  // Pass an empty collection for reviews
                    'business_listings' => collect(),  // Empty business listings as well
                ]);
            }

            // Fetch reviews for the listings
            $reviews = Review::whereIn('listing_id', $listings->pluck('id'))->paginate(10);  // Use whereIn for multiple listings

            // Get the business IDs from the reviews
            $listing_ids = $reviews->pluck('business_id');

            // Retrieve the associated business listings if any business IDs exist
            $business_listings = $listing_ids->isNotEmpty()
                ? BusinessListing::whereIn('id', $listing_ids)->get()
                : collect(); // Empty collection if no listings found

            return view('yellowpages::Vcard.review', compact('reviews', 'business_listings'));
        } catch (\Exception $e) {
            Log::error('Error fetching reviews: ');
            return redirect()->route('vCard.Rating')->with('error', __('yp.review_fetch_error'));
        }
    }
}
