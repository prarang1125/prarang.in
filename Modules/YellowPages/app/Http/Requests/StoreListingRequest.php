<?php

namespace Modules\YellowPages\app\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest

{
    public function rules()
    {
        return [
            // Basic fields
            'location' => 'required|exists:cities,id',
            'listingTitle' => 'required|string|max:255',
            'businessName' => 'required|string|max:255',
            'businessAddress' => 'required|string',
            'primaryPhone' => 'required|string',
            'primaryContact' => 'required|string',
            'primaryEmail' => 'required|email',
            'businessType' => 'required|exists:company_legal_types,id',
            'employees' => 'required|exists:employee_ranges,id',
            'turnover' => 'required|exists:monthly_turnovers,id',
            'category' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'social_media' => 'nullable|array',
            'social_media.*' => 'nullable|string',

            // Business hours
            'day' => 'required|array',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i|after_or_equal:open_time',
            'is_24_hours' => 'boolean',
            'add_2nd_time_slot' => 'nullable|boolean',

            // Social media validation
            'social_id' => 'required|array|min:1',
            'social_id.*' => 'integer|gt:1000',

            // Image validation
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'business_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // Account info
            'Email' => 'required|email',
            'Password' => 'nullable|string|min:8',
            'listing_approval' => 'required|boolean',

            // Term conditions
            'agree' => 'required|boolean',
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
