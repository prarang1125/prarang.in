<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Review;

class ReviewController extends Controller
{
public function Review()
{
    try {
        $reviews = Review::paginate(10); 
        return view('yellowpages::Admin.review', compact('reviews'));
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->back()->with('error', 'Unable to fetch reviews. Please try again later.');
    }
}

}
