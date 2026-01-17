<?php

namespace App\Livewire\YellowPages\Elements;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class NewAccounts extends Component
{
    public $cities;
    public $city, $name, $phone, $password, $slug;
    public $loading = false;
    public $shareUrl = null;

    protected $rules = [
        'city'     => 'required',
        'name'     => 'required|string|min:3|regex:/^[^@]+$/|max:30',
        'phone'    => 'required|regex:/^(\+91)?\d{10}$/',
        'password' => 'required',
    ];
    protected function messages(): array
    {
        return [
            'city.required'     => __('yp.please_select_city'),
            'name.required'     => __('yp.name_required'),
            'name.string'       => __('yp.name_string'),
            'name.min'          => __('yp.name_min'),
            'name.max'          => __('yp.name_max'),
            'phone.required'    => __('yp.phone_required'),
            'phone.regex'       => __('yp.phone_format_error'),
            'phone.unique'      => __('yp.phone_already_exists'),
            'password.required' => __('yp.password_required'),
            'password.min'      => __('yp.password_min_length'),
        ];
    }
    public function mount($slug = null)
    {
        $this->cities = City::all();
        if ($slug != null) {
            $this->city = City::where('slug', $slug)->first()->id;
        } elseif (isset($_COOKIE['register_city'])) {
            $this->city = $_COOKIE['register_city'];
        }

        if (isset($_COOKIE['yp_share_url'])) {
            $this->shareUrl = $_COOKIE['yp_share_url'];
        }
    }
    public function register()
    {
        $this->loading = true;
        $this->validate();
        $this->phone = str_replace('+91', '', $this->phone);
        if (User::where('phone', $this->phone)->where('city_id', $this->city)->exists()) {
            $this->addError('phone', __('yp.phone_city_combination_exists'));
            $this->loading = false;
            return;
        }
        $count = 1;
        $baseUserCode = Str::slug($this->name) ?: 'user';
        do {
            $userCode = $baseUserCode . ($count > 1 ? "-$count" : '');
            $count++;
        } while (User::where('user_code', $userCode)->exists());
        $user = User::create([
            'name' => $this->name ?? '',
            'phone' => $this->phone ?? '',
            'city_id' => $this->city,
            'password' => Hash::make($this->password),
            'role' => 2,
            'user_code' => $userCode
        ]);

        $city = City::find($this->city);
        $this->reset();
        $this->cities = City::all();
        session()->flash('success', __('yp.account_created_success'));
        $this->loading = false;
        Auth::login($user);

        $this->shareUrl = route('vCard.view', ['city_arr' => Str::slug($city->city_arr), 'slug' => $user->user_code]);
        return redirect($this->shareUrl);
    }
    public function validatePhone($prop)
    {
        $this->validateOnly($prop);
    }

    public function render()
    {
        return view('livewire.yellow-pages.elements.new-accounts');
    }
}
