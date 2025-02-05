<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use Exception;
use App\Models\DynamicVcard;
use App\Models\City;
use App\Models\User;
use App\Models\Category;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class CreateVCardController extends Controller
{
    ##------------------------- store ---------------------##
    public function store(Request $request)
    {
        try {
            // Get the authenticated user's ID
            $userId = Auth::id();
            $user = User::find($userId);
          
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }
    
            // Validate incoming data
            $validatedData = $request->validate([
                'color_code'   => 'nullable|string',
                'profile'      => 'required|image|max:2048',
                'category_id'  => 'required|exists:yp.categories,id',
                'city_id'      => 'required|exists:yp.cities,id',
                'name'         => 'required|string',
                'surname'      => 'required|string',
                'house_number' => 'required|string',
                'road_street'  => 'required|string',
                'area_name'    => 'required|string',
                'pincode'      => 'nullable|string',
                'dob'          => 'nullable|date',
                'email'        => 'nullable|email',
                'aadhar_front' => 'nullable|image|max:2048', 
                'aadhar_back'  => 'nullable|image|max:2048', 
            ]);
          

    
            // Store images in S3 or local storage
            if ($request->hasFile('profile')) {
                $validatedData['profile'] = $request->file('profile')->store('yellowpages/profile'); // Change to 'public' if using local
            }
    
            if ($request->hasFile('aadhar_front')) {
                $validatedData['aadhar_front'] = $request->file('aadhar_front')->store('yellowpages/aadhar');
            }
    
            if ($request->hasFile('aadhar_back')) {
                $validatedData['aadhar_back'] = $request->file('aadhar_back')->store('yellowpages/aadhar');
            }
    
            // Assign user ID to validated data
            $validatedData['user_id'] = $userId;
    
            // Update user details if different from existing values
            if (!empty($validatedData['name']) && $validatedData['name'] !== $user->name) {
                $user->name = $validatedData['name'];
            }
    
            if (!empty($validatedData['surname']) && $validatedData['surname'] !== $user->surname) {
                $user->surname = $validatedData['surname'];
            }
    
            if (!empty($validatedData['email']) && $validatedData['email'] !== $user->email) {
                $user->email = $validatedData['email'];
            }
    
            if (!empty($validatedData['dob']) && $validatedData['dob'] !== $user->dob) {
                $user->dob = $validatedData['dob'];
            }
            if (!empty($validatedData['profile']) && $validatedData['profile'] !== $user->profile) {
                $user->profile = $validatedData['profile'];
            }
    
            $user->save();
    
            // Save address in `addresses` table
            $address = Address::create([
                'user_id'     => $userId,
                'house_number'=> $validatedData['house_number'],
                'street'      => $validatedData['road_street'],
                'area_name'   => $validatedData['area_name'],
                'city_id'     => $validatedData['city_id'], // Using city_id instead of city_name
                'postal_code' => $validatedData['pincode'] ?? null, // Optional field handling
            ]);
    
            if (!$address) {
                throw new Exception('Failed to save address.');
            }
    
            // Assign address ID to validated data
            $validatedData['address_id'] = $address->id;
    
            // Save Vcard details
            $card = Vcard::create([
                'user_id'      => $validatedData['user_id'],
                'category_id'  => $validatedData['category_id'],
                'city_id'  => $validatedData['city_id'],
                'color_code'   => $validatedData['color_code'],
                'aadhar_front' => $validatedData['aadhar_front'] ?? null,
                'aadhar_back'  => $validatedData['aadhar_back'] ?? null,
                'address_id'   => $validatedData['address_id'],
            ]);
    
            if (!$card) {
                throw new Exception('Failed to create VCard.');
            }
    
            // Redirect to the VCard view page with success message
            return redirect()->route('vCard.view', ['id' => $card->id, 'name' => $validatedData['name']])
                             ->with('success', 'Card saved successfully.');
    
        } catch (Exception $e) {
            // Log error and return with failure message
            Log::error('Error in store method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- vCardEdit ---------------------##
    public function vCardEdit($id)
    {
        try {
            $vcard = Vcard::findOrFail($id);
            $vcardInfo = DynamicVcard::where('vcard_id', $vcard->id)->get();

            return view('yellowpages::Vcard.vcardEdit', compact('vcard', 'vcardInfo'));
        } catch (\Exception $e) {
            Log::error('Error editing VCard: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to fetch VCard details for editing.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- vCardUpdate ---------------------##
    public function vCardUpdate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'color_code' => 'nullable|string',
                'slug' => 'required|string',
                'banner_img' => 'nullable|image|max:2048',
                'logo' => 'nullable|image|max:2048',
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'description' => 'nullable|string',
                'name' => 'nullable|array',
                'data' => 'nullable|array',
            ]);

            // Handle file uploads
            if ($request->hasFile('banner_img')) {
                $validatedData['banner_img'] = $request->file('banner_img')->store('yellowpages/banners');
            }
            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('yellowpages/logos');
            }

            $userId = Auth::id();
            $validatedData['user_id'] = $userId;

            // Update card
            $card = Vcard::find($id)->update($validatedData);
            if (!$card) {
                return redirect()->back()->withErrors(['error' => 'Failed to update listing']);
            }

            // Save dynamic fields
            if (!empty($validatedData['name'])) {
                foreach ($validatedData['name'] as $index => $name) {
                    if (!empty($name) && !empty($validatedData['data'][$index])) {
                        DynamicVcard::updateOrCreate(
                            ['vcard_id' => $id, 'title' => $name],
                            ['data' => $validatedData['data'][$index]]
                        );
                    }
                }
            }

            return redirect()->route('vCard.list', $id)->with('success', 'Card updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating VCard: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to update VCard.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- VCard view ---------------------##
    public function view($id, $name)
    {
        $userId = Auth::id();
    
        // Fetch user details
        $user = User::find($userId);
    
        // Fetch address (ensure user_id matches)
        $address = Address::where('user_id', $userId)->first();
    
        // Fetch VCard with category name
        $vcard = Vcard::where('id', $id)->with('dynamicFields')->firstOrFail();
        $category = Category::where('id', $vcard->category_id)->value('name');
    
        return view('yellowpages::Vcard.CardView', compact('vcard', 'user', 'address', 'category'));
    }
    ##------------------------- END ---------------------##
    ##------------------------- VCard list ---------------------##
    public function VcardList(Request $request) {
         try {
            $Vcard_list = Vcard::where('user_id', Auth::id())->get();
            return view('yellowpages::Vcard.vcard-list', compact('Vcard_list'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' );
        }
    }
    ##------------------------- END ---------------------##
    ##------------------------- VCard Delete ---------------------##
    public function vcarddelete($id)
    {
        try {
            $city = Vcard::findOrFail($id);
            $city->delete();
            return redirect()->route('vCard.list')->with('success', 'Vcard deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'vcard not found.']);
        } catch (\Exception $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'An error occurred while trying to delete the Vcard: ' ]);
        }
    }
    ##------------------------- END ---------------------##

}
