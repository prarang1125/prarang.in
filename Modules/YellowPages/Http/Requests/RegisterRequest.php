<?php

namespace Modules\YellowPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255', 'regex:/^[^@]+$/'],
            'phone' => [
                'required',
                'regex:/^(?:\+91|0)?[6-9]\d{9}$/',
                Rule::unique('yp.users', 'phone')->where(function ($query) {
                    return $query->where('city_id', request('city')); 
                }),
            ],
            'city' => 'required|exists:yp.cities,id',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'कृपया एक वैध नाम दर्ज करें।',
            'phone.required' => 'फोन नंबर आवश्यक है।',
            'phone.regex' => 'कृपया एक वैध फोन नंबर दर्ज करें।',
            'phone.unique' => 'इस शहर में यह फोन नंबर पहले से मौजूद है।',
            'city.required' => 'शहर का चयन आवश्यक है।',
            'city.exists' => 'चुना हुआ शहर अस्तित्व में नहीं है।',
            'password.required' => 'पासवर्ड आवश्यक है।',
            'password.confirmed' => 'पासवर्ड और पुष्टि मेल नहीं खाते।',
        ];
    }
}
