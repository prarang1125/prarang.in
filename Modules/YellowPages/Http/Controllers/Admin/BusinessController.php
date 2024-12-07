<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessListing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function businessListing(Request $request) {
        $business_listing = BusinessListing::all();
    return view('yellowpages::Admin.business-listing', compact('business_listing'));
    }

    public function listingEdit($id){
        $business_listing = BusinessListing::findOrFail($id);

        return view('yellowpages::Admin.business-listing-edit', compact('business_listing'));
    }
    
        public function ListingDelete($id)
    {
        try {
            $categories = BusinessListing::findOrFail($id);
            $categories->delete();
            return redirect()->route('admin.business-listing')->with('success', 'Listing deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.business-listing')->withErrors(['error' => 'Listing not found.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.business-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
        }
    }
    

    
}
