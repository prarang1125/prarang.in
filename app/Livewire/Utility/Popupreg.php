<?php

namespace App\Livewire\Utility;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Popupreg extends Component
{
    public $step = 1;

    // Step 1
    public $email, $password;

    // Step 2
    public $first_name, $last_name, $country, $occupation, $purpose;

    public function nextStep()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = DB::table('upmana_users')->where('email', $this->email)->first();
        if ($user && Hash::check($this->password, $user->password)) {
            session()->put('upmana-auth', $user->id);
            session()->flash('message', 'Authenticated! You are now logged in.');
            $this->dispatch('close-register-modal');
        } else {
            $this->step = 2;
        }
    }

    public function register()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'occupation' => 'required',
            'country' => 'required',
            'purpose' => 'required|in:Personal,Research',
        ]);

        DB::table('upmana_users')->insert([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'name' => $this->first_name . ' ' . $this->last_name,
            'occupation' => $this->occupation,
            'country' => $this->country,
            'area_of_interest' => $this->purpose,
        ]);
        session()->put('upmana-auth', DB::getPdo()->lastInsertId());
        session()->flash('message', 'Thank you for registering! You are now logged in.');
        // Close the modal via JS
        $this->dispatch('close-register-modal');
    }

    public function render()
    {
        return view('livewire.utility.popupreg');
    }
}
