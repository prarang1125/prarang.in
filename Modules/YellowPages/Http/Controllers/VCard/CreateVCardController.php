<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\DynamicVcard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateVCardController extends Controller
{
    public function store(Request $request)
    {
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
            $validatedData['banner_img'] = $request->file('banner_img')->store('banners', 'public');
        }
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
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
    
        return redirect()->route('vCard.createCard', ['id' => $card->id])->with('success', 'Card saved successfully.');
    }
    
    public function view($id)
{
    dd($id);
    $vcard = Vcard::with('dynamicFields')->findOrFail($id);

    return view('yellowpages::VCard.CardView', compact('vcard'));
}


}
