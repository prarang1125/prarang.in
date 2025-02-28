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
        'category_id' => 'required',
        'city_id' => 'required',
        'name' => 'required|string|max:255',
        'surname' => 'nullable|string|max:255',
        'dob' => 'nullable|date',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:15',
        'house_number' => 'required|string|max:255',
        'road_street' => 'required|string|max:255',
        'area_name' => 'required|string|max:255',
        'pincode' => 'required|string|max:10',
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
