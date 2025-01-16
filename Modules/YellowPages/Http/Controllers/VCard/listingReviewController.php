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
            $listing = BusinessListing::where('user_id', Auth::id())->first();

            if (!$listing) {
                return redirect()->back()->with('error', 'No business listing found for the user.');
            }
            $reviews = Review::where('listing_id', $listing->id)->paginate(10);

            return view('yellowpages::Vcard.review', compact('reviews'));
        } catch (\Exception $e) {

            Log::error('Error fetching reviews: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch reviews. Please try again later.');
        }
    }
}
