<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class CategoriesController extends Controller
{
    public function categoriesListing(Request $request) {
        $categories = Category::all();
    return view('yellowpages::Admin.categories-listing', compact('categories'));
    }
    public function categoriesEdit($id){
        $category = Category::findOrFail($id);

        return view('yellowpages::Admin.categories-edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, $id)
{
    try {
        // Find the city or handle if not found
        $categories = Category::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image upload
        ]);

        // Handle the file upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($categories->categories_url && Storage::disk('public')->exists($categories->categories_url)) {
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

    public function categoriesDelete($id)
{
    try {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.categories-listing')->with('success', 'Category deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('admin.categories-listing')->withErrors(['error' => 'category not found.']);
    } catch (\Exception $e) {
        return redirect()->route('admin.categories-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
    }
}

public function categoriesRegister()
{
    return view('yellowpages::Admin.categories-register');
}

public function categoriesStore(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'slug' => 'required',
        'image' => 'required|image',  // Image validation with file type restrictions
    ]);

    // Proceed if validation passes
    if ($validator->passes()) {

        $currentDateTime = Carbon::now();

        try {
            // Handle the file upload
            if ($request->hasFile('image')) {
                // Store the image and get the path
                $imagePath = $request->file('image')->store('categories', 'public');

            }
            // Create a new city record (assuming you have a City model)
            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'categories_url' => $imagePath, // Store the image path
                'created_at' => $currentDateTime,
            ]);

            return redirect()->route('admin.categories-listing')->with('success', 'City created successfully.');

        } catch (\Exception $e) {
            // Handle errors in city creation
            return back()->with('error', 'There was an issue with city creation: ' . $e->getMessage());
        }
    } else {
        // Validation failed, return back with errors
        return redirect()->route('admin.categories-register')
            ->withInput()
            ->withErrors($validator);
    }
}

}
