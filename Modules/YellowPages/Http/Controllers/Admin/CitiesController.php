<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use App\Models\BusinessListing;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\CompanyLegalType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CitiesController extends Controller
{
    public function citiesListing(Request $request) {
        $cities = City::all();
    return view('yellowpages::Admin.cities-listing', compact('cities'));
    }
    public function citiesEdit($id){
        $cities = City::findOrFail($id);

        return view('yellowpages::Admin.cities-edit', compact('cities'));
    }

    public function citiesUpdate(Request $request, $id)
{
    try {
        // Find the city or handle if not found
        $city = City::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Optional image upload
        ]);

        // Handle the file upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($city->cities_url && Storage::disk('public')->exists($city->cities_url)) {
                Storage::disk('public')->delete($city->cities_url);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('cities', 'public');
        } else {
            // Keep the existing image URL if no new image is uploaded
            $imagePath = $city->cities_url;
        }

        // Update city details
        $city->update([
            'name' => $request->name,
            'cities_url' => $imagePath,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.cities-listing')->with('success', 'City updated successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->withErrors(['error' => 'City not found.']);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}

    public function citiesDelete($id)
{
    try {
        $ciies = City::findOrFail($id);
        $ciies->delete();
        return redirect()->route('admin.cities-listing')->with('success', 'Category deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('admin.cities-listing')->withErrors(['error' => 'Category not found.']);
    } catch (\Exception $e) {
        return redirect()->route('admin.cities-listing')->withErrors(['error' => 'An error occurred while trying to delete the user.']);
    }
}

public function citiesRegister()
{
    return view('yellowpages::Admin.cities-register');
}

public function citiesStore(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'image' => 'required|image',  // Image validation with file type restrictions
    ]);

    // Proceed if validation passes
    if ($validator->passes()) {
        $currentDateTime = Carbon::now();

        try {
            // Handle the file upload
            if ($request->hasFile('image')) {
                // Store the image and get the path
                $imagePath = $request->file('image')->store('cities', 'public');
            }

            // Create a new city record (assuming you have a City model)
             City::create([
                'name' => $request->name,
                'cities_url' => $imagePath, // Store the image path
                'timezone' => 'Asia/Kolkata',
                'created_at' => $currentDateTime,
            ]);

            return redirect()->route('admin.cities-listing')->with('success', 'City created successfully.');

        } catch (\Exception $e) {
            // Handle errors in city creation
            return back()->with('error', 'There was an issue with city creation: ' . $e->getMessage());
        }
    } else {
        // Validation failed, return back with errors
        return redirect()->route('admin.cities-register')
            ->withInput()
            ->withErrors($validator);
    }
}

}
