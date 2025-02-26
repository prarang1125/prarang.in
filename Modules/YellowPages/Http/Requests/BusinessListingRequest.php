<?php

namespace Modules\YellowPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
  public function rules()
{
    return [
        'location' => 'required|numeric',
        'listingTitle' => 'required|string|max:255',
        'tagline' => 'nullable|string',
        'businessName' => 'required|string|max:255',
        'primaryPhone' => 'required|string',
        'primaryContact' => 'required|string',
        'primaryEmail' => 'required|email',
        'businessType' => 'required|numeric',
        'business_address' => 'nullable',
        'employees' => 'required|numeric',
        'turnover' => 'required|numeric',
        'advertising' => 'required|numeric',
        'advertising_price' => 'required|numeric',
        'category' => 'required|numeric',
        'description' => 'nullable|string',
        'website' => 'nullable|url',
        'street' => 'nullable|string',
        'area_name' => 'nullable|string',
        'house_number' => 'nullable|string',
        'city_id' => 'nullable|exists:yp.cities,id',
        'postal_code' => 'nullable|string',
        'socialId' => 'nullable|array',
        'socialId.*' => 'nullable|exists:yp.dynamic_fields,id',
        'socialDescription' => 'nullable|array',
        'socialDescription.*' => 'nullable|string|max:255',
        'agree' => 'nullable',
        'day' => 'nullable|array|min:1',
        'day.*' => 'nullable|string',
        'open_time' => 'nullable|array|min:1',
        'open_time.*' => 'nullable|string', // Ensures it's required when 'day' is present
        'close_time' => 'nullable|array|min:1',
        'close_time.*' => 'nullable|string', // Ensures it's required when 'day' is present
        'is_24_hours' => 'nullable|array',
        'is_24_hours.*' => 'nullable|string',
        'add_2nd_time_slot' => 'nullable|array',
        'add_2nd_time_slot.*' => 'nullable|string',
        'open_time_2' => 'nullable|array',
        'open_time_2.*' => 'nullable|string',
        'close_time_2' => 'nullable|array',
        'close_time_2.*' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200',
    ];
}

public function messages()
{
    return [
        'location.required' => 'स्थान आवश्यक है।',
        'listingTitle.required' => 'लिस्टिंग का शीर्षक आवश्यक है।',
        'listingTitle.max' => 'लिस्टिंग का शीर्षक 255 अक्षरों से अधिक नहीं हो सकता।',
        'businessName.required' => 'व्यवसाय का नाम आवश्यक है।',
        'primaryPhone.required' => 'मुख्य फोन नंबर आवश्यक है।',
        'primaryContact.required' => 'मुख्य संपर्क व्यक्ति आवश्यक है।',
        'primaryEmail.required' => 'ईमेल आवश्यक है।',
        'primaryEmail.email' => 'कृपया एक वैध ईमेल पता दर्ज करें।',
        'businessType.required' => 'व्यवसाय का प्रकार आवश्यक है।',
        'employees.required' => 'कर्मचारियों की संख्या आवश्यक है।',
        'turnover.required' => 'वार्षिक टर्नओवर आवश्यक है।',
        'advertising.required' => 'विज्ञापन का माध्यम आवश्यक है।',
        'advertising_price.required' => 'विज्ञापन की कीमत आवश्यक है।',
        'category.required' => 'श्रेणी आवश्यक है।',
        'street.required' => 'सड़क का नाम आवश्यक है।',
        'area_name.required' => 'क्षेत्र का नाम आवश्यक है।',
        'house_number.required' => 'मकान संख्या आवश्यक है।',
        'city_id.required' => 'शहर आवश्यक है।',
        'city_id.exists' => 'चयनित शहर मान्य नहीं है।',
        'postal_code.string' => 'डाक कोड अक्षरों में होना चाहिए।',
        'socialId.*.exists' => 'चयनित सोशल आईडी मान्य नहीं है।',
        'socialDescription.*.max' => 'सोशल विवरण 255 अक्षरों से अधिक नहीं हो सकता।',
        'agree.accepted' => 'कृपया शर्तों को स्वीकार करें।',
        'day.required' => 'दिन आवश्यक हैं।',
        'day.*.required' => 'हर दिन का उल्लेख आवश्यक है।',
        'open_time.required' => 'खुलने का समय आवश्यक है।',
        'close_time.required' => 'बंद होने का समय आवश्यक है।',
        'is_24_hours.*.boolean' => '24 घंटे का विकल्प केवल सत्य या असत्य हो सकता है।',
        'add_2nd_time_slot.*.boolean' => 'दूसरे समय स्लॉट का विकल्प केवल सत्य या असत्य हो सकता है।',
        'open_time_2.*.string' => 'दूसरा खुलने का समय केवल अक्षरों में होना चाहिए।',
        'close_time_2.*.string' => 'दूसरा बंद होने का समय केवल अक्षरों में होना चाहिए।',
        'image.required' => 'कृपया एक छवि अपलोड करें।',
        'image.image' => 'केवल छवि फ़ाइलें अपलोड करें।',
        'image.mimes' => 'केवल JPEG, PNG, JPG, या GIF प्रारूप की छवियाँ स्वीकार्य हैं।',
        'image.max' => 'छवि का आकार 200KB से अधिक नहीं होना चाहिए।',
    ];
}

}
