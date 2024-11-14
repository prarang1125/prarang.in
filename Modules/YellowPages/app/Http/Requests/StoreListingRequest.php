<?php

namespace Modules\YellowPages\app\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest

{
    public function rules()
    {
        return [
            // Basic fields
            'location' => 'required|exists:yp.cities,id',
            'tagline' => 'nullable|string',
            'listingTitle' => 'required|string|max:255',
            'businessName' => 'required|string|max:255',
            'businessAddress' => 'required|string',
            'primaryPhone' => 'required|string',
            'secondary_phone' => 'nullable|string',
            'primaryContact' => 'required|string',
            'primaryEmail' => 'required|email',
            'primary_contact_email' => 'nullable|string',
            'secondaryContactName' => 'nullable|string',
            'secondaryEmail' => 'nullable|string',
            'pincode' => 'nullable|string',
            'businessType' => 'required',
            'employees' => 'required',
            'turnover' => 'required',
            'category' => 'required',
            'description' => 'required',
            'advertising' => 'required',
            'advertising_price' => 'required',
            'social_media' => 'nullable',
            'tags_keywords' => 'nullable',
            'fullAddress' => 'nullable|string',
            'website' => 'nullable',
            'phone' => 'nullable',
            'whatsapp' => 'nullable',
            'socialId' => 'nullable',
            'socialDescription' => 'nullable',
            'notificationEmail' => 'nullable|email',
            'userName' => 'nullable',
            'faq' => 'nullable',
            'answer' => 'nullable',
            
            // Business hours
           'day.*' => 'required|string',
           'open_time.*' => 'required',
           'close_time.*' => 'required',
            'is_24_hours.*' => 'nullable|boolean',
            'add_2nd_time_slot.*' => 'nullable|boolean',
            'email' => 'nullable',
            'password' => 'nullable',
            'agree' => 'nullable',


            // Image validation
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'coverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get the custom error messages for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'location.required' => 'The location is required.',
            'location.exists' => 'The selected location is invalid.',
            'listingTitle.required' => 'The listing title is required.',
            'listingTitle.string' => 'The listing title must be a string.',
            // Add more custom messages as needed
        ];
    }

    /**
     * Get the attributes for the validation rules.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'listingTitle' => 'Listing Title',
            'primaryEmail' => 'Primary Email Address',
            'Image' => 'Business Image',
            // Add more attribute customizations here if needed
        ];
    }
}
