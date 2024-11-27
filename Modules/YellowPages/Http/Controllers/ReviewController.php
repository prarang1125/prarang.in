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
            'cleanliness' => 'required|numeric|min:0|max:5',
            'service' => 'required|numeric|min:0|max:5',
            'ambience' => 'required|numeric|min:0|max:5',
            'price' => 'required|numeric|min:0|max:5',
            'title' => 'nullable|string|max:255',
            'review' => 'nullable|string|max:1000',
            'image' => 'nullable|array|max:5',  // Allow multiple images with a maximum of 5
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate each image
        ]);
    
        // Find the business listing to ensure it's valid
        $listing = BusinessListing::findOrFail($listingId);
    
        // Handle image upload (multiple images)
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->store('reviews', 'public');
            }
        }
    
        // Store the review data in the database
        Review::create([
            'user_id' => Auth::id(),
            'listing_id' => $listingId,
            'cleanliness' => $request->cleanliness,
            'service' => $request->service,
            'ambience' => $request->ambience,
            'price' => $request->price,
            'title' => $request->title,
            'review' => $request->review,
            'image' => json_encode($imagePaths),  // Store image paths as JSON
        ]);
    
        // Redirect to the listing page with a success message
        return redirect()->route('listing.show', $listingId)->with('success', 'Review submitted successfully!');
    }
    


   
}
