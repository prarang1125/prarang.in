<?php

namespace Modules\YellowPages\Http\Controllers\VCard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vcard;
use App\Models\Plan;
use App\Models\DynamicVcard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
        $userId = Auth::id();
    
        // Ensure user ID is included
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
    }
    
    
    public function view()
    {
        $userId = Auth::id();
        $vcard = Vcard::where('user_id', $userId)->with('dynamicFields')->firstOrFail();
        return view('yellowpages::VCard.CardView', compact('vcard'));
    }
    
    public function generateQrCode()
    {
        $userId = Auth::id();
        $vcard = Vcard::where('user_id', $userId)->latest()->firstOrFail();
    
        // Generate QR code
        $qrCode = QrCode::size(200)->generate(route('vCard.scanView', ['qrCode' => $vcard->slug]));
    
        return view('yellowpages::VCard.QRvCard', compact('qrCode'));
    }
    

public function scanAndView($qrCode, $count = 1)
{

    $vcard = Vcard::where('slug', $qrCode)->orWhere('id', $qrCode)->first();

    if ($vcard) {
        // Update scan_count for the found vCard using its ID
        Vcard::where('id', $vcard->id)->increment('scan_count', $count);

        // Refresh the vCard instance to reflect the updated count
        $vcard->refresh();

        Log::info("Scan count updated for vCard ID: {$vcard->id}, New Scan Count: {$vcard->scan_count}");
    } else {
        Log::error("vCard not found for QR Code: {$qrCode}");
        abort(404, 'vCard not found');
    }

    // Return the view with the updated vCard details
    return view('yellowpages::VCard.CardView', compact('vcard'));
}

public function plan()
{
    return view("yellowpages::Vcard.plan");
}
public function planDetails()
{
    $plans = Plan::all();
    return view("yellowpages::Vcard.planDetails", compact('plans'));
}

}

