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
    ##------------------------- categoriesListing function ---------------------##
    public function categoriesListing(Request $request) {
        try {
            $categories = Category::all();
            return view('yellowpages::admin.categories-listing', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'An error occurred while fetching categories: ' ]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- categoriesEdit function ---------------------##
    public function categoriesEdit($id){
        try {
            $category = Category::findOrFail($id);
            return view('yellowpages::admin.categories-edit', compact('category'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.categories-listing')->withErrors(['error' => 'Category not found.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.categories-listing')->withErrors(['error' => 'An error occurred: ' ]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- categoriesUpdate function ---------------------##
    public function categoriesUpdate(Request $request, $id)
{
    // try {
        // Find the category or handle if not found
        $category = Category::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image upload
        ]);

        if ($request->hasFile('image')) {
     
            if ($category->categories_url && Storage::exists($category->categories_url)) {

                Storage::delete($category->categories_url);
            }

            $directory = 'yellowpages/categories';
            $imagePath = $request->file('image')->store($directory);
        } else {
            // Keep the existing image URL if no new image is uploaded
            $imagePath = $category->categories_url;
        }
       
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'categories_url' => $imagePath, // Updated image path
            'updated_at' => Carbon::now(),
        ]);

        // Return success message
        return redirect()->route('admin.categories-listing')->with('success', 'Category updated successfully.');
    // } catch (ModelNotFoundException $e) {
    //     // Handle case where the category is not found
    //     return redirect()->back()->withErrors(['error' => 'Category not found.']);
    // } catch (\Exception $e) {
    //     // Handle any other exceptions
    //     return redirect()->back()->withErrors(['error' => 'An error occurred: ' ]);
    // }
}
    
    ##------------------------- END ---------------------##

    ##------------------------- categoriesDelete function ---------------------##
    public function categoriesDelete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.categories-listing')->with('success', 'Category deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.categories-listing')->withErrors(['error' => 'Category not found.']);
        } catch (\Exception $e) {
            return redirect()->route('admin.categories-listing')->withErrors(['error' => 'An error occurred while trying to delete the category: ' ]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- categoriesRegister function ---------------------##
    public function categoriesRegister()
    {
        return view('yellowpages::admin.categories-register');
    }
    ##------------------------- END ---------------------##

    ##------------------------- categoriesStore function ---------------------##
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
                    $imagePath = $request->file('image')->store('yellowpages/categories');
                }

                // Create a new category record
                Category::create([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'categories_url' => $imagePath, // Store the image path
                    'created_at' => $currentDateTime,
                ]);

                return redirect()->route('admin.categories-listing')->with('success', 'Category created successfully.');

            } catch (\Exception $e) {
                // Handle errors in category creation
                return back()->with('error', 'There was an issue with category creation: ' );
            }
        } else {
            // Validation failed, return back with errors
            return redirect()->route('admin.categories-register')
                ->withInput()
                ->withErrors($validator);
        }
    }
    ##------------------------- END ---------------------##
}
