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
            'profile.required'       => 'प्रोफ़ाइल छवि आवश्यक है।',
            'profile.image'          => 'प्रोफ़ाइल एक मान्य छवि होनी चाहिए।',
            'profile.max'            => 'प्रोफ़ाइल छवि का आकार अधिकतम 2MB होना चाहिए।',
            'category_id.required'   => 'श्रेणी आवश्यक है।',
            'category_id.exists'     => 'चयनित श्रेणी अमान्य है।',
            'city_id.required'       => 'शहर आवश्यक है।',
            'city_id.exists'         => 'चयनित शहर अमान्य है।',
            'name.required'          => 'नाम आवश्यक है।',
            'house_number.required'  => 'मकान नंबर आवश्यक है।',
            'road_street.required'   => 'सड़क/गली आवश्यक है।',
            'area_name.required'     => 'क्षेत्र का नाम आवश्यक है।',
            'pincode.string'         => 'पिन कोड एक मान्य स्ट्रिंग होनी चाहिए।',
            'aadhar.string'          => 'आधार संख्या एक मान्य स्ट्रिंग होनी चाहिए।',
            'dob.date'               => 'जन्मतिथि एक मान्य तिथि होनी चाहिए।',
            'aadhar_front.image'     => 'आधार का अगला भाग एक मान्य छवि होनी चाहिए।',
            'aadhar_back.image'      => 'आधार का पिछला भाग एक मान्य छवि होनी चाहिए।',
            'dynamic_name.array'     => 'डायनामिक नाम एक सूची होनी चाहिए।',
            'dynamic_data.array'     => 'डायनामिक डेटा एक सूची होनी चाहिए।',
            'dynamic_icon.array'     => 'डायनामिक आइकन एक सूची होनी चाहिए।',
            'email.email' => 'कृपया एक मान्य ईमेल पता दर्ज करें।',
            'email.unique' => 'यह ईमेल पहले से ही पंजीकृत है। कृपया दूसरा ईमेल उपयोग करें।',
        ];
    }
}
