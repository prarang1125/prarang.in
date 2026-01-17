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
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoding\JpegEncoder;

class EditVcard extends Component
{
    use WithFileUploads;

    public $color_code = '#E6C72D';
    public $profile, $category_id, $city_id, $name, $surname, $dob, $email, $phone;
    public $house_number, $cityname, $road_street, $area_name, $pincode, $state;
    public $vcard, $address;
    public $photo;
    public $dynamicFields = [];
    public $existingFields = [];
    public $options = [];
    public $user;

    public function mount()
    {
        $userId = auth()->id();
        $this->vcard = VCard::where('user_id', $userId)->first();
        $this->address = Address::where('user_id', $userId)->first();
        $this->user = $user = User::find($userId);

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
            $this->cityname = $this->address->city_name ?? '';
            $this->state = $this->address->state ?? 'उत्तर प्रदेश (Uttar Pradesh)';
        }
        $this->options = DynamicFeild::all()->keyBy('id')->toArray();

        $this->dynamicFields = [];

        if ($this->vcard) {
            $this->existingFields = DynamicVCard::where('vcard_id', $this->vcard->id)->get()->map(function ($item) {
                return ['id' => $item->dy_fields_id, 'name' => $item->title, 'value' => $item->data, 'icon' => $item->icon, 'type' => $item->type];
            })->toArray();

            // Existing fields ko dynamicFields me add karna
            foreach ($this->existingFields as $field) {
                $this->dynamicFields[$field['id']] = [
                    'id' => $field['id'],
                    'name' => $field['name'],
                    'value' => $field['value'],
                    'icon' => $field['icon'],
                    'type' => $field['type']
                ];
            }
        } else {
            $this->existingFields = [];
        }
        $requiredIds = [6];

        foreach ($requiredIds as $id) {
            if (!isset($this->dynamicFields[$id])) {
                $this->dynamicFields[$id] = [
                    'id' => $id,
                    'name' => $this->options[$id]['name'] ?? 'Field ' . $id,
                    'value' => '',
                    'icon' => $this->options[$id]['icon'] ?? null,
                    'type' => $this->options[$id]['type'] ?? null
                ];
            }
        }

        $this->dynamicFields = array_values($this->dynamicFields);
    }
    public function updatedPhoto()
    {
        // $this->validate(['photo' => 'max:500bk']);
        $this->uploadProfile();
    }
    public function uploadProfile()
    {
        if ($this->photo) {
            // delete old image
            $oldImage = $this->user->profile;

            $fileName = time() . '.jpg';


            $img = Image::read($this->photo->getRealPath());


            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });


            $tempFile = tempnam(sys_get_temp_dir(), 'profile_') . '.jpg';


            $img->save($tempFile, 90, 'jpg');


            $storagePath = 'yellowpages/profiles/' . $fileName;
            Storage::disk('s3')->put($storagePath, file_get_contents($tempFile));


            $status = auth()->user()->update(['profile' => $storagePath]);
            if ($status && $oldImage) {
                Storage::delete($oldImage);
            }

            $this->profile = $storagePath;
            unlink($tempFile);
        }
    }


    public function addField($id)
    {
        $name = $this->options[$id]['name'] ?? 'Field ' . $id;
        $this->dynamicFields[] = [
            'id' => $id,
            'name' => $name,
            'value' => '',
            'icon' => $this->options[$id]['icon'] ?? null,
            'type' => $this->options[$id]['type'] ?? null
        ];
    }

    public function removeField($index)
    {
        unset($this->dynamicFields[$index]);
        $this->dynamicFields = array_values($this->dynamicFields);
    }

    protected $rules = [
        'color_code' => 'required',
        'photo' => 'nullable|image|max:600',
        'category_id' => 'required|integer',
        'city_id' => 'required|integer',

        // Name और Surname में हिंदी, अंग्रेज़ी, नंबर, - और / अलLOWED
        'name' => 'required|string|regex:/^[A-Za-z0-9\x{0900}-\x{097F}]+$/u|max:10',
        'surname' => 'nullable|string|regex:/^[A-Za-z0-9\x{0900}-\x{097F}]+$/u|max:10',

        'dob' => 'nullable|date|before_or_equal:today',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:15',

        // House_number में कम से कम एक नंबर अनिवार्य और केवल , - / अलLOWED
        'house_number' => 'nullable|regex:/^(?=.*\d)[A-Za-z0-9\x{0900}-\x{097F},\-\/ ]+$/u|max:8',

        // Road_street में हिंदी, अंग्रेज़ी, नंबर और स्पेस अलLOWED
        'road_street' => 'nullable|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:15',

        // Area_name में हिंदी और अंग्रेज़ी अक्षर अलLOWED
        'area_name' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:40',

        'pincode' => 'required|digits:6',

        // Cityname में हिंदी और अंग्रेज़ी अक्षर अलLOWED
        'cityname' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:15',

        // State में हिंदी, अंग्रेज़ी, () और स्पेस अलLOWED
        'state' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F}() ]+$/u|max:40',
    ];


    protected $messages = [
        'color_code.required' => 'formyp.color_code_required',
        'photo.max' => 'formyp.photo_max_size',
        'photo.image' => 'formyp.photo_image_type',
        'category_id.required' => 'formyp.category_required',
        'category_id.integer' => 'formyp.category_integer',

        'city_id.required' => 'formyp.city_required',
        'city_id.integer' => 'formyp.city_integer',

        'name.required' => 'formyp.name_required',
        'name.string' => 'formyp.name_string',
        'name.max' => 'formyp.name_max',
        'name.regex' => 'formyp.name_regex',
        'surname.regex' => 'formyp.surname_regex',


        'surname.string' => 'formyp.surname_string',
        'surname.max' => 'formyp.surname_max',

        'dob.date' => 'formyp.dob_date',
        'dob.before_or_equal' => 'formyp.dob_before',

        'email.email' => 'formyp.email_invalid',
        'email.max' => 'formyp.email_max',

        'phone.required' => 'formyp.phone_required',
        'phone.string' => 'formyp.phone_string',
        'phone.max' => 'formyp.phone_max',

        'house_number.regex' => 'formyp.house_number_regex',
        'house_number.max' => 'formyp.house_number_max',

        'road_street.regex' => 'formyp.road_street_regex',
        'road_street.max' => 'formyp.road_street_max',

        'area_name.required' => 'formyp.area_name_required',
        'area_name.regex' => 'formyp.area_name_regex',
        'area_name.max' => 'formyp.area_name_max',

        'pincode.required' => 'formyp.pincode_required',
        'pincode.digits' => 'formyp.pincode_digits',

        'cityname_required' => 'formyp.cityname_required',
        'cityname.regex' => 'formyp.cityname_regex',
        'cityname.max' => 'formyp.cityname_max',

        'state.required' => 'formyp.state_required',
        'state.regex' => 'formyp.state_regex',
        'state.max' => 'formyp.state_max',
    ];

    public function getMessages()
    {
        $localizedMessages = [];
        foreach ($this->messages as $key => $value) {
            $localizedMessages[$key] = __($value);
        }
        return $localizedMessages;
    }



    public function updatefield($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submit()
    {
        $this->validate(null, $this->getMessages());
        try {

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
                    'city_name' => $this->cityname,
                    'country' => 'India',
                    'state' => $this->state,
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
                if ($field['value'] == null) {
                    continue;
                }
                DynamicVCard::create([
                    'vcard_id' => $this->vcard->id,
                    'dy_fields_id' => $field['id'],
                    'title'    => $this->options[$field['id']]['name'],
                    'data'     => $field['value'],
                    'icon'     => $this->options[$field['id']]['icon'] ?? null,
                ]);
            }

            return redirect()->route('vCard.list')
                ->with('success_message', __('formyp.vcard_updated_success'));
        } catch (\Exception $e) {
            session()->flash('error', __('formyp.vcard_update_error') . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.yellow-pages.elements.edit-vcard', [
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }
}
