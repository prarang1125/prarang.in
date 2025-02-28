<?php

namespace App\Livewire\YellowPages\Elements;

use App\Models\Address;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\City;
use App\Models\DynamicFeild;
use App\Models\DynamicVCard;
use App\Models\User;
use App\Models\VCard;
use Illuminate\Support\Str;

class EditVcard extends Component
{
    use WithFileUploads;

    public $color_code = '#E6C72D';
    public $profile, $category_id, $city_id, $name, $surname, $dob, $email, $phone;
    public $house_number, $road_street, $area_name, $pincode;
    public $vcard, $address;
    public $photo;
    public $dynamicFields = [];
    public $existingFields = [];
    public $options = [];

    public function mount()
    {
        $userId = auth()->id();
        $this->vcard = VCard::where('user_id', $userId)->first();
        $this->address = Address::where('user_id', $userId)->first();
        $user = User::find($userId);

        if ($user) {
            $this->name = $user->name;
            $this->surname = $user->surname;
            $this->dob = $user->dob;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->profile = $user->profile;
            $this->city_id = $user->city_id;
        }

        if ($this->vcard) {
            $this->color_code = $this->vcard->color_code;
            $this->category_id = $this->vcard->category_id;
        }

        if ($this->address) {
            $this->house_number = $this->address->house_number;
            $this->road_street = $this->address->street;
            $this->area_name = $this->address->area_name;
            $this->pincode = $this->address->postal_code;
        }
        $this->options = DynamicFeild::all()->keyBy('id')->toArray();

        if ($this->vcard) {
            $this->existingFields = DynamicVCard::where('vcard_id', $this->vcard->id)->get()->map(function ($item) {
                return ['id' => $item->dy_fields_id, 'name' => $item->title, 'value' => $item->data];
            })->toArray();
            foreach ($this->existingFields as $field) {
                $this->dynamicFields[] = ['id' => $field['id'], 'name' => $field['name'], 'value' => $field['value']];
            }
        } else {
            $this->existingFields = [];
        }
        $this->dynamicFields = array_values($this->dynamicFields);
    }
    public function updatedPhoto()
    {

        $this->uploadProfile();
    }
    public function uploadProfile()
    {
        if ($this->photo) {
            $photoPath = $this->photo->store('yellowpages/profiles', 's3');
            auth()->user()->update(['profile' => $photoPath]);
            $this->profile = $photoPath;
            // session()->flash('message', 'Profile updated successfully!');
        }
    }


    public function addField()
    {
        $this->dynamicFields[] = ['id' => '', 'name' => '', 'value' => ''];
    }

    public function removeField($index)
    {
        unset($this->dynamicFields[$index]);
        $this->dynamicFields = array_values($this->dynamicFields);
    }

    protected $rules = [
        'color_code' => 'required',
        'profile' => 'nullable|max:1024',
        'category_id' => 'required|integer',
        'city_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'surname' => 'nullable|string|max:255',
        'dob' => 'nullable|date|before_or_equal:today',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:15',
        'house_number' => 'required|string|max:255',
        'road_street' => 'required|string|max:255',
        'area_name' => 'required|string|max:255',
        'pincode' => 'required|digits:6',
    ];
    protected $messages = [
        'color_code.required' => 'रंग कोड आवश्यक है।',
        'profile.max' => 'प्रोफ़ाइल का आकार 1024 KB से अधिक नहीं हो सकता।',
        'category_id.required' => 'श्रेणी चयन आवश्यक है।',
        'category_id.integer' => 'श्रेणी आईडी एक मान्य संख्या होनी चाहिए।',
        'city_id.required' => 'शहर चयन आवश्यक है।',
        'city_id.integer' => 'शहर आईडी एक मान्य संख्या होनी चाहिए।',
        'name.required' => 'नाम आवश्यक है।',
        'name.string' => 'नाम केवल अक्षरों में होना चाहिए।',
        'name.max' => 'नाम 255 अक्षरों से अधिक नहीं हो सकता।',
        'surname.string' => 'उपनाम केवल अक्षरों में होना चाहिए।',
        'surname.max' => 'उपनाम 255 अक्षरों से अधिक नहीं हो सकता।',
        'dob.date' => 'जन्मतिथि मान्य तिथि प्रारूप में होनी चाहिए।',
        'email.email' => 'कृपया एक मान्य ईमेल पता दर्ज करें।',
        'email.max' => 'ईमेल 255 अक्षरों से अधिक नहीं हो सकता।',
        'phone.required' => 'फोन नंबर आवश्यक है।',
        'phone.string' => 'फोन नंबर केवल अक्षरों और अंकों में होना चाहिए।',
        'phone.max' => 'फोन नंबर 15 अंकों से अधिक नहीं हो सकता।',
        'house_number.required' => 'मकान संख्या आवश्यक है।',
        'house_number.string' => 'मकान संख्या केवल अक्षरों और अंकों में होनी चाहिए।',
        'house_number.max' => 'मकान संख्या 255 अक्षरों से अधिक नहीं हो सकती।',
        'road_street.required' => 'सड़क/गली का नाम आवश्यक है।',
        'road_street.string' => 'सड़क/गली का नाम केवल अक्षरों में होना चाहिए।',
        'road_street.max' => 'सड़क/गली का नाम 255 अक्षरों से अधिक नहीं हो सकता।',
        'area_name.required' => 'क्षेत्र का नाम आवश्यक है।',
        'area_name.string' => 'क्षेत्र का नाम केवल अक्षरों में होना चाहिए।',
        'area_name.max' => 'क्षेत्र का नाम 255 अक्षरों से अधिक नहीं हो सकता।',
        'pincode.required' => 'पिन कोड आवश्यक है।',
        'pincode.string' => 'पिन कोड केवल अंकों में होना चाहिए।',
        'pincode.digits' => 'पिन कोड ठीक 6 अंकों का होना चाहिए।',
    ];
    

    public function updatefield($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
        $userId = auth()->id();
        $photo = $this->photo ? $this->photo->store('yellowpages/profiles', 's3') : null;

        $user = User::updateOrCreate(
            ['id' => $userId],
            [
                'name' => $this->name,
                'surname' => $this->surname,
                'dob' => $this->dob,
                'email' => $this->email,
                'phone' => $this->phone,
                'city_id' => $this->city_id,
                'profile' => $photo ?? $this->profile,
            ]
        );

        $this->profile = $user->profile;

        $this->address = Address::updateOrCreate(
            ['user_id' => $userId],
            [
                'house_number' => $this->house_number,
                'street' => $this->road_street,
                'area_name' => $this->area_name,
                'postal_code' => $this->pincode,
                'city_id' => $this->city_id,
            ]
        );



        $this->vcard = VCard::updateOrCreate(
            ['user_id' => $userId],
            [
                'color_code' => $this->color_code,
                'category_id' => $this->category_id,
                'city_id' => $this->city_id,
                'address_id' => $this->address->id,
                'slug' => Str::slug($user->user_code),
            ]
        );
        DynamicVCard::where('vcard_id', $this->vcard->id)->delete();


        foreach ($this->dynamicFields as $field) {

            DynamicVCard::create([
                'vcard_id' => $this->vcard->id,
                'dy_fields_id' => $field['id'],
                'title'    => $this->options[$field['id']]['name'],
                'data'     => $field['value'],
                'icon'     => $this->options[$field['id']]['icon'] ?? null,
            ]);
        }

        return redirect()->route('vCard.list')
            ->with('errors_message', 'VCard successfully updated!');
    }

    public function render()
    {
        return view('livewire.yellow-pages.elements.edit-vcard', [
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }
}
