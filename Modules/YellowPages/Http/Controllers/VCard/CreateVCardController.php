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
    
            // Update user details if different from existing values
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

    ##------------------------- vCardEdit ---------------------##
    public function vCardEdit($id)
    {
        try {
            $vcard = Vcard::findOrFail($id);
            $vcardInfo = DynamicVcard::where('vcard_id', $vcard->id)->get();

            return view('yellowpages::Vcard.vcardEdit', compact('vcard', 'vcardInfo'));
        } catch (Exception $e) {
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
    public function view($slug)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $address = Address::where('user_id', $userId)->first();
        $dynamicFields = DynamicFeild::where('is_active', 1)->get();
    
        // Fetch VCard data
        $vcard = Vcard::where('slug', $slug)
            ->orderBy('id', 'desc')
            ->with('dynamicFields')
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
            return view('yellowpages::Vcard.CardView', compact('user', 'address', 'message', 'vcard'));
        }
    
        // If VCard is approved
    
        
        return view('yellowpages::Vcard.CardView', compact('vcard', 'user', 'address', 'category', 'dynamicFields'));
    }
    
    
    ##------------------------- END ---------------------##
    ##------------------------- VCard list ---------------------##
    public function VcardList(Request $request) {
        try {
            $userId = Auth::id();
            $user = User::find($userId);
    
            // Fetch user's Vcards
            $Vcard_list = Vcard::where('user_id', $userId)->get();
    
            // Fetch cities for each Vcard
            $cities = City::whereIn('id', $Vcard_list->pluck('city_id'))->get()->keyBy('id');
    
            // Fetch categories if necessary
            $categories = Category::whereIn('id', $Vcard_list->pluck('category'))->get()->keyBy('id');
    
            return view('yellowpages::Vcard.vcard-list', compact('Vcard_list', 'cities', 'categories'));
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
            return redirect()->route('vCard.list')->with('success', 'Vcard deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'vcard not found.']);
        } catch (Exception $e) {
            return redirect()->route('vCard.list')->withErrors(['error' => 'An error occurred while trying to delete the Vcard: ' ]);
        }
    }
    ##------------------------- END ---------------------##

}
