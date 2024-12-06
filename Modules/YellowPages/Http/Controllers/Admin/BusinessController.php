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

    public function listingUpdate(Request $request, $id)
    {
        try {
            
            // Find the city or handle if not found
            $listing = BusinessListing::findOrFail($id);
    
            // Validate the request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image upload
            ]);
    
            // Handle the file upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($listing->categories_url && Storage::disk('public')->exists($categories->categories_url)) {
                    Storage::disk('public')->delete($categories->categories_url);
                }
    
                // Store the new image
                $imagePath = $request->file('image')->store('categories', 'public');
            } else {
                // Keep the existing image URL if no new image is uploaded
                $imagePath = $categories->categories_url;
            }
    
            // Update city details
            $categories->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'categories_url' => $imagePath,
                'updated_at' => Carbon::now(),
            ]);
    
            return redirect()->route('admin.categories-listing')->with('success', 'Category updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'City not found.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
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
