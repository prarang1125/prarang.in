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
            'banner_img' => 'nullable|image',
            'logo' => 'nullable|image',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'name' => 'nullable|array',
            'data' => 'nullable|array',
        ]);

        // Save card
        $card = Vcard::create($validatedData);
        if (!$card) {
                 return redirect()->back()->withErrors(['error' => 'Failed to create listing']);
        }

        return response()->json(['message' => 'Card saved successfully.', 'card' => $card]);
    }

}
