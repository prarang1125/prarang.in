<?php

namespace Modules\YellowPages\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest

{
    public function rules(): array
    {
        return [
            'location' => 'required|exists:cities,id',
            'listingTitle' => 'required|string|max:255',
            'businessName' => 'required|string|max:255',
            'businessAddress' => 'required|string|max:255',
            'primaryPhone' => 'required|string|max:15',
            'secondaryPhone' => 'nullable|string|max:15',
            'primaryContact' => 'required|string|max:255',
            'primaryEmail' => 'required|email|max:255',
            'secondaryContact' => 'nullable|string|max:255',
            'secondaryEmail' => 'nullable|email|max:255',
            'businessType' => 'required|exists:company_legal_types,id',
            'businessEmployees' => 'required|numeric',
            'businessTurnover' => 'required|numeric',
            'businessAdvertising' => 'nullable|string|max:255',
            'pincode' => 'required|string|max:10',
            'state' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'category' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:500',
            'tags' => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'social_media.*' => 'nullable|url|max:255',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,mp4,mov|max:5120',
        ];
    }

}
