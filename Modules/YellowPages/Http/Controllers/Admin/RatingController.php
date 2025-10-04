<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\BusinessHour;
use App\Models\Review;
use App\Models\Report;
use Illuminate\Support\Facades\LOG;


class RatingController extends Controller
{

    ##------------------------------------------ Rating -----------------------------------##
    public function Rating()
    {
        try {
            $reviews = Review::paginate(10); 
            return view('yellowpages::admin.review', compact('reviews'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to fetch reviews. Please try again later.');
        }
    }
    ##------------------------------------------ END -----------------------------------##

 

}
