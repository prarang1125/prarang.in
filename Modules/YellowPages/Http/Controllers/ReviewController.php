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
    public function store(Request $request, $listingId)
    {
        // Validate the incoming request
        $request->validate([
            'cleanliness' => 'required|numeric|min:1|max:5',
            'service' => 'required|numeric|min:1|max:5',
            'ambience' => 'required|numeric|min:1|max:5',
            'price' => 'required|numeric|min:1|max:5',
            'title' => 'nullable|string|max:255',
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
                $imagePaths[] = $image->store('reviews', 'public');
            }
        }

        Review::create([
            'user_id' => Auth::user(),
            'listing_id' => $listingId,
            'cleanliness' => $request->cleanliness,
            'service' => $request->service,
            'ambience' => $request->ambience,
            'price' => $request->price,
            'title' => $request->title,
            'review' => $request->review,
            'image' => json_encode($imagePaths),
        ]);

        // Redirect
        return redirect()->route('review.submit')->with('success', 'Review submitted successfully!');
    }
    
    public function submit_review(){
        return view("yellowpages::Home.review-submit");
    }

}
