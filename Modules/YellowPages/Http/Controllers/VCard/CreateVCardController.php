<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use Exception;
use App\Models\DynamicVcard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CreateVCardController extends Controller
{
    ##------------------------- store ---------------------##
    public function store(Request $request)
    {

            $validatedData = $request->validate([
                'color_code' => 'nullable|string',
                'slug' => 'required|string',
                'banner_img' => 'required|image|max:2048',
                'logo' => 'required|image|max:2048',
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'description' => 'required|string',
                'name' => 'nullable|array',
                'data' => 'nullable|array',
            ]);
            try {

            // Handle file uploads
            if ($request->hasFile('banner_img')) {
                $validatedData['banner_img'] = $request->file('banner_img')->store('yellowpages/banners');
            }
            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('yellowpages/logos');
            }

            $userId = Auth::id();
            $validatedData['user_id'] = $userId;

            // Save card
            $card = Vcard::create($validatedData);
            if (!$card) {
                return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
            }

            // Save dynamic fields
            if (!empty($validatedData['name'])) {
                foreach ($validatedData['name'] as $index => $name) {
                    if (!empty($name) && !empty($validatedData['data'][$index])) {
                        DynamicVcard::create([
                            'vcard_id' => $card->id,
                            'title' => $name,
                            'data' => $validatedData['data'][$index],
                        ]);
                    }
                }
            }

            return redirect()->route('vCard.createCard')->with('success', 'Card saved successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating VCard: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to create VCard.']);
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
        } catch (\Exception $e) {
            Log::error('Error updating VCard: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to update VCard.']);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- VCard view ---------------------##
    public function view($vcard_id)
    {
        try {
            $userId = Auth::id();
            $vcard = Vcard::where('id', $vcard_id)->with('dynamicFields')->firstOrFail();

            return view('yellowpages::Vcard.CardView', compact('vcard'));
        } catch (\Exception $e) {
            Log::error('Error viewing VCard: ' );
            return redirect()->back()->withErrors(['error' => 'Unable to fetch VCard details.']);
        }
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
