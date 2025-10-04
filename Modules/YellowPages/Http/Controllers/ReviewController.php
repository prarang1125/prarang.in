<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    ##------------------------- Review Listing store ---------------------##

    public function store(Request $request, $listingId)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'cleanliness' => 'required|numeric|min:1|max:5',
                'service' => 'required|numeric|min:1|max:5',
                'ambience' => 'required|numeric|min:1|max:5',
                'price' => 'required|numeric|min:1|max:5',
                'title' => 'required|string|max:255',
                'review' => 'nullable|string|max:1000',
                'image' => 'nullable|array|max:5',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Find the listing
            $listing = BusinessListing::findOrFail($listingId);

            // Handle image uploads
            $imagePaths = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imagePaths[] = $image->store('yellowpages/reviews');
                }
            }

            // Create the review
            Review::create([
                // 'user_id' => Auth::id(),
                'listing_id' => $listingId,
                'cleanliness' => $request->cleanliness,
                'service' => $request->service,
                'ambience' => $request->ambience,
                'price' => $request->price,
                'title' => $request->title,
                'review' => $request->review,
                'image' => json_encode($imagePaths),
            ]);

            // Redirect with success message
            return redirect()->route('review.submit')->with('success', 'Review submitted successfully!');
        } catch (\Exception $e) {
            // Handle errors and redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' ]);
        }
    }

    ##------------------------- END ---------------------##

    ##------------------------- Thank you for Submit Page ---------------------##
    public function submit_review()
    {
        return view("yellowpages::home.review-submit");
    }
    ##------------------------- END ---------------------##

}
