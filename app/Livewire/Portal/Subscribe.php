<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Subscribe extends Component
{
    public $firstName, $lastName, $email, $country, $mobile;
    public $loading = false;
    public $showWelcome = false;
    public $isSubscribed = false;

    protected function rules()
    {
        return [
            'country'   => 'required|string',
            'firstName' => 'required|string|min:2|max:50',
            'lastName'  => 'nullable|string|max:50',
            'email'     => 'required|email|max:100',
            // 'mobile'    => 'nullable|string|min:8|max:20',
        ];
    }

    protected function messages()
    {
        return [
            'country.required'   => 'Country is required.',
            'firstName.required' => 'First Name is required.',
            'firstName.min'      => 'First Name must be at least 2 characters.',
            'email.required'     => 'Email is required.',
            'email.email'        => 'Please enter a valid email address.',
        ];
    }

    public function updatedCountry($value)
    {
        $countryCodes = [
            'india' => '+91 ',
            'czech' => '+420 ',
            'slovakia' => '+421 ',
            'germany' => '+49 ',
            'afghanistan' => '+93 ',
            'albania' => '+355 ',
            'algeria' => '+213 ',
            'andorra' => '+376 ',
            'angola' => '+244 ',
            'argentina' => '+54 ',
            'armenia' => '+374 ',
            'australia' => '+61 ',
            'austria' => '+43 ',
            'azerbaijan' => '+994 ',
            'bahrain' => '+973 ',
            'bangladesh' => '+880 ',
            'belarus' => '+375 ',
            'belgium' => '+32 ',
            'bhutan' => '+975 ',
            'bolivia' => '+591 ',
            'bosnia' => '+387 ',
            'brazil' => '+55 ',
            'bulgaria' => '+359 ',
            'cambodia' => '+855 ',
            'canada' => '+1 ',
            'chile' => '+56 ',
            'china' => '+86 ',
            'colombia' => '+57 ',
            'croatia' => '+385 ',
            'cuba' => '+53 ',
            'cyprus' => '+357 ',
            'denmark' => '+45 ',
            'ecuador' => '+593 ',
            'egypt' => '+20 ',
            'estonia' => '+372 ',
            'ethiopia' => '+251 ',
            'finland' => '+358 ',
            'france' => '+33 ',
            'georgia' => '+995 ',
            'ghana' => '+233 ',
            'greece' => '+30 ',
            'hungary' => '+36 ',
            'iceland' => '+354 ',
            'indonesia' => '+62 ',
            'iran' => '+98 ',
            'iraq' => '+964 ',
            'ireland' => '+353 ',
            'israel' => '+972 ',
            'italy' => '+39 ',
            'jamaica' => '+1 ',
            'japan' => '+81 ',
            'jordan' => '+962 ',
            'kazakhstan' => '+7 ',
            'kenya' => '+254 ',
            'kuwait' => '+965 ',
            'latvia' => '+371 ',
            'lebanon' => '+961 ',
            'libya' => '+218 ',
            'lithuania' => '+370 ',
            'luxembourg' => '+352 ',
            'malaysia' => '+60 ',
            'maldives' => '+960 ',
            'malta' => '+356 ',
            'mexico' => '+52 ',
            'monaco' => '+377 ',
            'morocco' => '+212 ',
            'nepal' => '+977 ',
            'netherlands' => '+31 ',
            'new_zealand' => '+64 ',
            'nigeria' => '+234 ',
            'norway' => '+47 ',
            'oman' => '+968 ',
            'pakistan' => '+92 ',
            'philippines' => '+63 ',
            'poland' => '+48 ',
            'portugal' => '+351 ',
            'qatar' => '+974 ',
            'romania' => '+40 ',
            'russia' => '+7 ',
            'saudi_arabia' => '+966 ',
            'singapore' => '+65 ',
            'south_africa' => '+27 ',
            'south_korea' => '+82 ',
            'spain' => '+34 ',
            'sri_lanka' => '+94 ',
            'sweden' => '+46 ',
            'switzerland' => '+41 ',
            'taiwan' => '+886 ',
            'thailand' => '+66 ',
            'turkey' => '+90 ',
            'uae' => '+971 ',
            'uk' => '+44 ',
            'usa' => '+1 ',
            'uzbekistan' => '+998 ',
            'vietnam' => '+84 ',
            'other'   => '+',
        ];

        if (array_key_exists($value, $countryCodes)) {
            $this->mobile = $countryCodes[$value];
        }
    }

    public function mount()
    {
        if (isset($_COOKIE['pop-sub-mobile'])) {
            $this->isSubscribed = true;
        }
    }

    public function register()
    {
        $this->validate();
        $this->loading = true;

        $fullName = trim($this->firstName . ' ' . $this->lastName);

        DB::table('country_sub')->insert([
            'name'       => $fullName,
            'email'      => $this->email,
            'mobile'     => $this->mobile,
            'country'    => $this->country,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->showWelcome = true;
        $this->loading = false;

        // Set cookie to prevent showing again
        // setcookie('pop-sub-mobile', 'true', time() + (200 * 24 * 60 * 60), "/");
    }

    public function render()
    {
        return view('livewire.portal.subscribe');
    }
}
