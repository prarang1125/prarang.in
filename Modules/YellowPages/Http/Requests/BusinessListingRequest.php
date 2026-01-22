<?php

namespace Modules\YellowPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class BusinessListingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.


     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Allow all users to submit the form
    }
    public function rules(Request $request)
    {

        return [
            'location' => 'required|numeric|exists:yp.cities,id',
            'listingTitle' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'businessName' => 'required|string|max:255',
            'primaryPhone' => 'required|string|max:20',
            'primaryContact' => 'required|string|max:255',
            'primaryEmail' => 'required|email|max:255',
            'businessType' => 'required|numeric',
            'business_address' => 'nullable|string|max:500',
            'employees' => 'required|numeric',
            'turnover' => 'required|numeric',
            'advertising' => 'required|numeric',
            'advertising_price' => 'required|numeric',
            'category' => 'required|numeric',
            'description' => 'nullable|string',
            'website' => 'nullable|url|max:255',
            'street' => 'nullable|string|max:255',
            'area_name' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:100',
            'city_id' => 'nullable|exists:yp.cities,id',
            'postal_code' => 'nullable|string|max:20',
            'socialId' => 'nullable|array',
            'socialId.*' => 'nullable|exists:yp.dynamic_fields,id',
            'socialDescription' => 'nullable|array',
            'socialDescription.*' => 'nullable|string|max:255',
            'agree' => 'required|accepted',
            'day' => 'nullable|array',
            'day.*' => 'nullable|string',
            'open_time' => 'nullable|array',
            'open_time.*' => 'nullable|string',
            'close_time' => 'nullable|array',
            'close_time.*' => 'nullable|string',
            'is_24_hours' => 'nullable|array',
            'is_24_hours.*' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'location.required' => __('yp.location_required'),
            'location.exists' => __('yp.location_invalid'),
            'listingTitle.required' => __('yp.listing_title_required'),
            'businessName.required' => __('yp.business_name_required'),
            'primaryPhone.required' => __('yp.phone_required'),
            'primaryContact.required' => __('yp.contact_person_required'),
            'primaryEmail.required' => __('yp.email_required'),
            'primaryEmail.email' => __('yp.email_invalid'),
            'businessType.required' => __('yp.business_type_required'),
            'employees.required' => __('yp.employees_required'),
            'turnover.required' => __('yp.turnover_required'),
            'advertising.required' => __('yp.advertising_medium_required'),
            'advertising_price.required' => __('yp.advertising_price_required'),
            'category.required' => __('yp.category_required'),
            'agree.required' => __('yp.agree_terms_required'),
            'agree.accepted' => __('yp.agree_terms_required'),
            'image.image' => __('yp.image_invalid'),
            'image.mimes' => __('yp.image_mimes'),
            'image.max' => __('yp.image_max'),
            'logo.image' => __('yp.logo_invalid'),
            'logo.mimes' => __('yp.logo_mimes'),
            'logo.max' => __('yp.logo_max'),
        ];
    }
}
