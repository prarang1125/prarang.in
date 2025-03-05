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
    public $house_number, $cityname, $road_street, $area_name, $pincode, $state='उत्तर प्रदेश (Uttar Pradesh)';
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
        $this->user=$user = User::find($userId);

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


            $status=auth()->user()->update(['profile' => $storagePath]);
            if($status && $oldImage){
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
        'color_code.required' => 'रंग कोड आवश्यक है।',
        'photo.max' => 'फोटो का आकार 600 KB से अधिक नहीं हो सकता।',
        'photo.image'=>'Must be Image',
        'category_id.required' => 'श्रेणी का चयन आवश्यक है।',
        'category_id.integer' => 'श्रेणी आईडी एक मान्य संख्या होनी चाहिए।',

        'city_id.required' => 'शहर का चयन आवश्यक है।',
        'city_id.integer' => 'शहर आईडी एक मान्य संख्या होनी चाहिए।',

        'name.required' => 'नाम आवश्यक है।',
        'name.string' => 'नाम केवल अक्षरों में होना चाहिए।',
        'name.max' => 'नाम 10 अक्षरों से अधिक नहीं हो सकता।',
        'name.regex' => 'नाम में केवल अक्षर होने चाहिए, बिना स्पेस या विशेष अक्षरों के।',
        'surname.regex' => 'उपनाम में केवल अक्षर होने चाहिए, बिना स्पेस या विशेष अक्षरों के।',


        'surname.string' => 'उपनाम केवल अक्षरों में होना चाहिए।',
        'surname.max' => 'उपनाम 10 अक्षरों से अधिक नहीं हो सकता।',

        'dob.date' => 'जन्मतिथि एक मान्य तिथि होनी चाहिए।',
        'dob.before_or_equal' => 'जन्मतिथि आज की तिथि या इससे पहले की होनी चाहिए।',

        'email.email' => 'कृपया एक मान्य ईमेल पता दर्ज करें।',
        'email.max' => 'ईमेल 255 अक्षरों से अधिक नहीं हो सकता।',

        'phone.required' => 'फ़ोन नंबर आवश्यक है।',
        'phone.string' => 'फ़ोन नंबर केवल संख्याओं और अक्षरों में होना चाहिए।',
        'phone.max' => 'फ़ोन नंबर 15 अंकों से अधिक नहीं हो सकता।',

        'house_number.regex' => 'मकान संख्या में कम से कम एक संख्या होनी चाहिए और केवल (, - /) विशेष वर्णों की अनुमति है।',
        'house_number.max' => 'मकान संख्या 10 अक्षरों से अधिक नहीं हो सकती।',

        'road_street.regex' => 'सड़क/गली का नाम केवल अक्षरों और संख्याओं में होना चाहिए।',
        'road_street.max' => 'सड़क/गली का नाम 30 अक्षरों से अधिक नहीं हो सकता।',

        'area_name.required' => 'पता आवश्यक है।',
        'area_name.regex' => 'पता केवल अक्षर और स्पेस होने चाहिए।',
        'area_name.max' => 'पता 50 अक्षरों से अधिक नहीं हो सकता।',

        'pincode.required' => 'पिन कोड आवश्यक है।',
        'pincode.digits' => 'पिन कोड ठीक 6 अंकों का होना चाहिए।',

        'cityname.required' => 'शहर का नाम आवश्यक है।',
        'cityname.regex' => 'शहर के नाम में केवल अक्षर और स्पेस होने चाहिए।',
        'cityname.max' => 'शहर का नाम 20 अक्षरों से अधिक नहीं हो सकता।',

        'state.required' => 'राज्य का नाम आवश्यक है।',
        'state.regex' => 'राज्य के नाम में केवल अक्षर और स्पेस होने चाहिए।',
        'state.max' => 'राज्य का नाम 30 अक्षरों से अधिक नहीं हो सकता।',
    ];



    public function updatefield($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submit()
    {
        $this->validate();
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
                ->with('success_message', 'VCard successfully updated!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error updating VCard: ' . $e->getMessage());
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
