<?php

namespace Modules\YellowPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'color_code'       => 'nullable|string',
            'profile'          => 'required|image|max:2048',
            'category_id'      => 'required|exists:yp.categories,id',
            'city_id'          => 'required|exists:yp.cities,id',
            'name'             => 'required|string',
            'surname'          => 'nullable|string',
            'house_number'     => 'required|string',
            'road_street'      => 'required|string',
            'area_name'        => 'required|string',
            'pincode'          => 'nullable|string',
            'aadhar'           => 'nullable|string',
            'dob'              => 'nullable|date',
            'email'            => 'nullable|email|unique:yp.users,email',
            'aadhar_front'     => 'nullable|image|max:2048',
            'aadhar_back'      => 'nullable|image|max:2048',
            'dynamic_name'     => 'nullable|array',
            'dynamic_name.*'   => 'nullable|string',
            'dynamic_data'     => 'nullable|array',
            'dynamic_data.*'   => 'nullable|string',
            'dynamic_icon'     => 'nullable|array',
            'dynamic_icon.*'   => 'nullable|string',
        ];
    }

    /**
     * Get the custom error messages.
     */
    public function messages(): array
    {
        return [
            'profile.required'       => __('formyp.profile_image_required'),
            'profile.image'          => __('formyp.profile_image_invalid'),
            'profile.max'            => __('formyp.profile_image_max'),
            'category_id.required'   => __('formyp.category_required'),
            'category_id.exists'     => __('formyp.category_invalid'),
            'city_id.required'       => __('formyp.city_required'),
            'city_id.exists'         => __('formyp.city_invalid'),
            'name.required'          => __('formyp.name_required'),
            'house_number.required'  => __('formyp.house_number_required'),
            'road_street.required'   => __('formyp.road_street_required'),
            'area_name.required'     => __('formyp.area_name_required'),
            'pincode.string'         => __('formyp.pincode_invalid'),
            'aadhar.string'          => __('formyp.aadhar_invalid'),
            'dob.date'               => __('formyp.dob_invalid'),
            'aadhar_front.image'     => __('formyp.aadhar_front_invalid'),
            'aadhar_back.image'      => __('formyp.aadhar_back_invalid'),
            'dynamic_name.array'     => __('formyp.dynamic_name_invalid'),
            'dynamic_data.array'     => __('formyp.dynamic_data_invalid'),
            'dynamic_icon.array'     => __('formyp.dynamic_icon_invalid'),
            'email.email'            => __('formyp.email_invalid'),
            'email.unique'           => __('formyp.email_already_registered'),
        ];
    }
}
