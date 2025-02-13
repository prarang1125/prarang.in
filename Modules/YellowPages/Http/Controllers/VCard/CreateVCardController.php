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
use App\Models\DynamicFeild;
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
        // Validate incoming data
        $validatedData = $request->validate([
            'color_code'       => 'nullable|string',
            'profile'          => 'required|image|max:2048',
            'category_id'      => 'required|exists:yp.categories,id',
            'city_id'          => 'required|exists:yp.cities,id',
            'name'             => 'required|string',
            'surname'          => 'required|string',
            'house_number'     => 'required|string',
            'road_street'      => 'required|string',
            'area_name'        => 'required|string',
            'pincode'          => 'nullable|string',
            'aadhar'          => 'nullable|string',
            'dob'              => 'nullable|date',
            'email'            => 'nullable|email',
            'aadhar_front'     => 'nullable|image|max:2048',
            'aadhar_back'      => 'nullable|image|max:2048',
            'dynamic_name'     => 'nullable|array',
            'dynamic_name.*'   => 'nullable|string',
            'dynamic_data'     => 'nullable|array',
            'dynamic_data.*'   => 'nullable|string',
        ]);
    
        // DB::beginTransaction();
    
        // try {
            // Handle file uploads to S3
            if ($request->hasFile('profile')) {
                $validatedData['profile'] = $request->file('profile')->store('yellowpages/profile');
            }
    
            if ($request->hasFile('aadhar_front')) {
                $validatedData['aadhar_front'] = $request->file('aadhar_front')->store('yellowpages/aadhar');
            }
    
            if ($request->hasFile('aadhar_back')) {
                $validatedData['aadhar_back'] = $request->file('aadhar_back')->store('yellowpages/aadhar');
            }
    
            // Get authenticated user
            $userId = Auth::id();
            $user = User::find($userId);
    
            // Assign user ID to validated data
            $validatedData['user_id'] = $userId;
    
            if ($user) {
                $user->update([
                    'name'    => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                    'aadhar' => $validatedData['aadhar'],
                    'email'   => $validatedData['email'] ?? $user->email,
                    'dob'     => $validatedData['dob'] ?? $user->dob,
                    'profile' => $validatedData['profile'] ?? $user->profile,
                ]);
            }
    
            // Save address in `addresses` table
            $address = Address::create([
                'user_id'      => $userId,
                'house_number' => $validatedData['house_number'],
                'street'       => $validatedData['road_street'],
                'area_name'    => $validatedData['area_name'],
                'city_id'      => $validatedData['city_id'],
                'postal_code'  => $validatedData['pincode'] ?? null,
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
                'slug'         => $validatedData['name'], 
                'city_id'      => $validatedData['city_id'],
                'color_code'   => $validatedData['color_code'],
                'aadhar_front' => $validatedData['aadhar_front'] ?? null,
                'aadhar_back'  => $validatedData['aadhar_back'] ?? null,
                'address_id'   => $validatedData['address_id'],
            ]);
    
            if (!$card) {
                throw new Exception('Failed to create VCard.');
            }
    
            // Save dynamic fields if provided
            if (!empty($validatedData['dynamic_name']) && !empty($validatedData['dynamic_data'])) {
                foreach ($validatedData['dynamic_name'] as $index => $fieldName) {
                    if (!isset($validatedData['dynamic_data'][$index])) {
                        continue; // Skip if there is no corresponding data
                    }
    
                    DynamicVcard::create([
                        'vcard_id' => $card->id,
                        'title'    => $fieldName,
                        'data'     => $validatedData['dynamic_data'][$index],
                    ]);
                }
            }
    
            // DB::commit();
    
            return redirect()->route('vCard.view', ['slug' => $validatedData['name']])
                             ->with('success', 'Card saved successfully.');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        // }
    }
    
    ##------------------------- END ---------------------##

    ##------------------------- vCardEdit ---------------------##public function vCardEdit($id)
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
    
            return view('yellowpages::Vcard.vcardEdit', compact(
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
        try {
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
    
            return redirect()->route('vCard.list')->with('success', 'VCard updated successfully.');
    
        } catch (Exception $e) {
            Log::error('Error updating VCard: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the VCard.']);
        }
    }
    
    
    ##------------------------- END ---------------------##

    ##------------------------- VCard view ---------------------##
    public function view($slug)
    {
        $userId = Auth::id();
        $user = User::with('address')->find($userId);
        $dynamicFields = DynamicFeild::where('is_active', 1)->get();
    
        // Fetch VCard data
        $vcard = Vcard::where('slug', $slug)
            ->orderBy('id', 'desc')
            ->with(relations: 'dynamicFields')
            ->first();
        $category = Category::where('id', $vcard->category_id)->first();
        // Check if VCard exists and is approved
        if (!$vcard) {
            $message = 'VCard not found.';
            return view('yellowpages::Vcard.CardView', compact('user', 'address', 'message','category'));
        }
    
        // If VCard is not approved
        if ($vcard->is_active != 1) {
            $message = 'आपका कार्ड स्वीकृति की प्रक्रिया में है।';
            return view('yellowpages::Vcard.CardView', compact('user', 'message', 'vcard','category'));
        }    
        
        return view('yellowpages::Vcard.CardView', compact('vcard', 'user', 'category', 'dynamicFields'));
    }
    
    
    ##------------------------- END ---------------------##
    ##------------------------- VCard list ---------------------##
    public function VcardList(Request $request) {
        try {
            $userId = Auth::id();
            $user = User::find($userId);
            $Vcard_list = Vcard::where('user_id', $userId)->get();    
            // Fetch cities for each Vcard
            $cities = City::whereIn('id', $Vcard_list->pluck('city_id'))->get()->keyBy('id');    
            // Fetch categories if necessary
            $categories = Category::whereIn('id', $Vcard_list->pluck('category_id'))->get()->keyBy('id');
    
            return view('yellowpages::Vcard.vcard-list', compact('user','Vcard_list', 'cities', 'categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching Vcard listings: ' . $e->getMessage());
        }
    }
    
    ##------------------------- END ---------------------##
    ##------------------------- VCard Delete ---------------------##
    public function vcarddelete($id)
    {
        try {
            $city = Vcard::findOrFail($id);
            $city->delete();
            return redirect()->route('vCard.createCard')->with('success', 'Vcard deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'vcard not found.']);
        } catch (Exception $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'An error occurred while trying to delete the Vcard: ' ]);
        }
    }
    ##------------------------- END ---------------------##

}
