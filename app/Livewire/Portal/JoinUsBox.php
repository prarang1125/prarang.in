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

class JoinUsBox extends Component
{
    public $firstName, $lastName, $email, $country;
    public $preferredSocialMedia = [];
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
            'preferredSocialMedia' => 'array',
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
        $socialMediaStr = is_array($this->preferredSocialMedia) ? implode(', ', $this->preferredSocialMedia) : '';

        DB::table('country_sub')->insert([
            'name'       => $fullName,
            'email'      => $this->email,
            'mobile'     => $socialMediaStr, // Saving social media in mobile column since it replaced it
            'country'    => $this->country,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->showWelcome = true;
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.portal.join-us-box');
    }
}
