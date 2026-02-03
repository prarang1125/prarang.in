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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EditVcard extends Component
{
    use WithFileUploads;

    public $color_code = '#E6C72D';
    public $profile, $category_id, $city_id, $name, $surname, $dob, $email, $phone;
    public $house_number, $cityname, $road_street, $area_name, $pincode, $state, $countryfield;
    public $vcard, $address;
    public $photo;
    public $dynamicFields = [];
    public $options = [];
    public $user;

    public function mount()
    {
        /** @var int|null $userId */
        $userId = auth()->id();

        // Find user in 'yp' database
        $this->user = User::on('yp')->with(['address', 'vcard.dynamicFields'])->find($userId);

        if (!$this->user) {
            return redirect()->route('login');
        }

        // Initialize User Data
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->dob = $this->user->dob;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->profile = $this->user->profile;
        $this->city_id = $this->user->city_id;

        // Initialize VCard Data
        $this->vcard = $this->user->vcard()->first();
        if ($this->vcard) {
            $this->color_code = $this->vcard->color_code;
            $this->category_id = $this->vcard->category_id;
        }

        // Initialize Address Data
        $this->address = $this->user->address;
        if ($this->address) {
            $this->house_number = $this->address->house_number;
            $this->road_street = $this->address->street;
            $this->area_name = $this->address->area_name;
            $this->pincode = $this->address->postal_code;
            $this->cityname = $this->address->city_name ?? '';
            $this->state = $this->address->state ?? '';
        }

        // Initialize Dynamic Fields
        $this->options = DynamicFeild::all()->keyBy('id')->toArray();
        if ($this->vcard) {
            $this->dynamicFields = $this->vcard->dynamicFields->map(fn($item) => [
                'id' => $item->dy_fields_id,
                'name' => $item->title,
                'value' => $item->data,
                'icon' => $item->icon,
                'type' => $this->options[$item->dy_fields_id]['type'] ?? 'text',
            ])->toArray();
        }

        // Ensure default field if not present (logic from original)
        $hasField6 = collect($this->dynamicFields)->contains('id', 6);
        if (!$hasField6 && isset($this->options[6])) {
            $this->dynamicFields[] = [
                'id' => 6,
                'name' => $this->options[6]['name'],
                'value' => '',
                'icon' => $this->options[6]['icon'],
                'type' => $this->options[6]['type'],
            ];
        }
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
        $this->uploadProfile();
    }

    public function uploadProfile()
    {
        if (!$this->photo) {
            return;
        }

        try {
            $this->validateOnly('photo');
            $oldImage = $this->user->profile;

            // Ensure directory exists
            if (!Storage::disk('s3')->exists('yellowpages/profiles')) {
                Storage::disk('s3')->makeDirectory('yellowpages/profiles');
            }

            // Simplified storage: directly use Livewire's store method
            // We use store on public disk
            $path = $this->photo->store('yellowpages/profiles', 's3');

            if (!$path) {
                Log::error('Profile Upload Failure: store() returned null');
                throw new \Exception('Failed to store image. Check directory permissions.');
            }

            // Update user profile in database
            $this->user->update(['profile' => $path]);

            // Delete old image if it exists and is different
            if ($oldImage && $oldImage !== $path && Storage::disk('s3')->exists($oldImage)) {
                Storage::disk('s3')->delete($oldImage);
            }

            $this->profile = $path;
            session()->flash('message', __('formyp.profile_updated_success'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Profile Upload Exception: ' . $e->getMessage());
            session()->flash('error', 'Upload Error: ' . $e->getMessage());
        }
    }

    public function addField($id)
    {
        if (!collect($this->dynamicFields)->contains('id', $id)) {
            $this->dynamicFields[] = [
                'id' => $id,
                'name' => $this->options[$id]['name'] ?? 'Field ' . $id,
                'value' => '',
                'icon' => $this->options[$id]['icon'] ?? null,
                'type' => $this->options[$id]['type'] ?? 'text',
            ];
        }
    }

    public function removeField($index)
    {
        unset($this->dynamicFields[$index]);
        $this->dynamicFields = array_values($this->dynamicFields);
    }

    protected function rules()
    {
        return [
            'color_code' => 'required',
            'photo' => 'nullable|image|max:2048', // Increased max size for better testing
            'category_id' => 'required|integer',
            'city_id' => 'required|integer',
            'name' => 'required|string|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:25',
            'surname' => 'nullable|string|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:25',
            'dob' => 'nullable|date|before_or_equal:today',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'house_number' => 'nullable|regex:/^[A-Za-z0-9\x{0900}-\x{097F},\-\/ ]+$/u|max:20',
            'road_street' => 'nullable|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:50',
            'area_name' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:100',
            'pincode' => 'required|digits:6',
            'cityname' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F} ]+$/u|max:30',
            'state' => 'required|regex:/^[A-Za-z0-9\x{0900}-\x{097F}() ]+$/u|max:50',
            'countryfield' => 'required',
        ];
    }

    protected $messages = [
        'cityname.required' => 'formyp.cityname_required',
    ];

    public function updatefield($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $userId = auth()->id();

                $this->user->update([
                    'name' => $this->name,
                    'surname' => $this->surname,
                    'dob' => $this->dob,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'city_id' => $this->city_id,
                ]);

                $this->address = Address::updateOrCreate(
                    ['user_id' => $userId],
                    [
                        'house_number' => $this->house_number,
                        'street' => $this->road_street,
                        'area_name' => $this->area_name,
                        'postal_code' => $this->pincode,
                        'city_id' => $this->city_id,
                        'city_name' => $this->cityname,
                        'country' => $this->countryfield,
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
                        'slug' => Str::slug($this->user->user_code ?: $this->name),
                    ]
                );

                // Update Dynamic Fields
                DynamicVCard::where('vcard_id', $this->vcard->id)->delete();
                foreach ($this->dynamicFields as $field) {
                    if (!empty($field['value'])) {
                        DynamicVCard::create([
                            'vcard_id' => $this->vcard->id,
                            'dy_fields_id' => $field['id'],
                            'title' => $field['name'],
                            'data' => $field['value'],
                            'icon' => $field['icon'] ?? null,
                        ]);
                    }
                }
            });

            return redirect()->route('vCard.list')
                ->with('success_message', __('formyp.vcard_updated_success'));
        } catch (\Exception $e) {
            Log::error('VCard Submission Failure: ' . $e->getMessage());
            session()->flash('error', __('formyp.vcard_update_error') . ' ' . $e->getMessage());
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
