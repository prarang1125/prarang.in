<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;


class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function businessListing(Request $request) {
        $business_listing = BusinessListing::all();
    return view('yellowpages::Admin.business-listing', compact('business_listing'));
    }

    
}
