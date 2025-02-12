<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\City;
use App\Models\Category;
use App\Models\DynamicVcard;
use App\Models\User;
use App\Models\DynamicFeild;
use App\Models\Address;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class CardController extends Controller
{
    public function VcardList(Request $request)
    {
        try {
            $query = Vcard::query();
    
            // Check if there's a search query
            if ($request->filled('search')) {
                $searchTerm = $request->search;
                
                // Join with the users table to search by user's name
                $query->whereHas('user', function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
            }
    
            $vcardList = $query->get(); // Correct variable name
    
            // Fetch cities and categories if there are VCards
            $cities = $vcardList->isNotEmpty() 
                ? City::whereIn('id', $vcardList->pluck('city_id'))->get()->keyBy('id') 
                : collect();
    
            $categories = $vcardList->isNotEmpty() 
                ? Category::whereIn('id', $vcardList->pluck('category_id'))->get()->keyBy('id') 
                : collect();
    
            return view('yellowpages::admin.vcard_list', compact('vcardList', 'cities', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' . $e->getMessage());
        }
    }

    public function vCardEdit($id)
    {
        try {
            $vcard = Vcard::findOrFail($id);
            $vcardInfo = DynamicVcard::where('vcard_id', $vcard->id)->get();
            $dynamicFields = DynamicFeild::where('is_active', 1)->get();
            $cities = City::all();
            $categories = Category::all();
            $address = Address::where('user_id', Auth::id())->first();
            $user = User::find($vcard->user_id); // Correct way to get user
    
            return view('yellowpages::admin.vcard-edit', compact(
                'vcard', 'vcardInfo', 'categories', 'cities', 'dynamicFields', 'address', 'user'
            ));
        } catch (Exception $e) {
            Log::error('Error editing VCard: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to fetch VCard details for editing.']);
        }
    }
    

    ##------------------------- END ---------------------##

    ##------------------------- vCardUpdate ---------------------##
    public function vCardUpdate(Request $request, $id)
    {
        // try {
            // Validate incoming data
            $validatedData = $request->validate([
                'color_code' => 'nullable|string',
                'category_id' => 'nullable|exists:yp.categories,id',
                'city_id' => 'nullable|exists:yp.cities,id',
                'name' => 'nullable|string',
                'surname' => 'nullable|string',
                'house_number' => 'nullable|string',
                'street' => 'nullable|string',
                'area_name' => 'nullable|string',
                'postal_code' => 'nullable|string',
                'dob' => 'nullable|date',
                'email' => 'nullable|email',
                'aadhar' => 'nullable|string',
                'profile' => 'nullable|image|max:2048',
                'aadhar_front' => 'nullable|image|max:2048',
                'aadhar_back' => 'nullable|image|max:2048',
                'data' => 'nullable|array', // Dynamic fields data
            ]);
    
            // Handle file uploads
            if ($request->hasFile('profile')) {
                $validatedData['profile'] = $request->file('profile')->store('yellowpages/profiles');
            }
    
            if ($request->hasFile('aadhar_front')) {
                $validatedData['aadhar_front'] = $request->file('aadhar_front')->store('yellowpages/aadhar');
            }
    
            if ($request->hasFile('aadhar_back')) {
                $validatedData['aadhar_back'] = $request->file('aadhar_back')->store('yellowpages/aadhar');
            }
    
            // Retrieve the vCard
            $vcard = Vcard::findOrFail($id);
    
            // Update the user table (assuming vCard has a relationship with User)
            $user = $vcard->user;
            $user->update([
                'name' => $validatedData['name'] ?? $user->name,
                'surname' => $validatedData['surname'] ?? $user->surname,
                'dob' => $validatedData['dob'] ?? $user->dob,
                'email' => $validatedData['email'] ?? $user->email,
                'aadhar' => $validatedData['aadhar'] ?? $user->aadhar,
                'profile' => $validatedData['profile'] ?? $user->profile,
            ]);
    
            // Update the address table (assuming the user has an address relationship)
            $address = $user->address;
            $address->update([
                'house_number' => $validatedData['house_number'] ?? $address->house_number,
                'street' => $validatedData['street'] ?? $address->street,
                'area_name' => $validatedData['area_name'] ?? $address->area_name,
                'postal_code' => $validatedData['postal_code'] ?? $address->postal_code,
                'city_id' => $validatedData['city_id'] ?? $address->city_id,
            ]);
    
            // Handle dynamic fields (only if 'data' is provided and valid)
            if (!empty($validatedData['data']) && is_array($validatedData['data'])) {
                foreach ($validatedData['data'] as $dynamicName => $dataValue) {
                    // Save or update dynamic fields
                    DynamicVcard::updateOrCreate(
                        ['vcard_id' => $id, 'title' => $dynamicName],
                        ['data' => $dataValue]
                    );
                }
            }
    
            return redirect()->route('admin.Vcardlist')->with('success', 'VCard updated successfully.');
    
        // } catch (Exception $e) {
        //     Log::error('Error updating VCard: ' . $e->getMessage());
        //     return redirect()->back()->withErrors(['error' => 'An error occurred while updating the VCard.']);
        // }
    }

    public function vcarddelete($id)
    {
        try {
            $vcard = Vcard::findOrFail($id);
            $vcard->delete();
            return redirect()->route('admin.Vcardlist')->with('success', 'Vcard deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.Vcardlist')->withErrors(['error' => 'vcard not found.']);
        } catch (Exception $e) {
            return redirect()->route('admin.Vcardlist')->withErrors(['error' => 'An error occurred while trying to delete the Vcard: ' ]);
        }
    }
    
}
