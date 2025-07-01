<?php

namespace App\Livewire\Utility;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class Popupreg extends Component
{
    public $step = 1;

    // Step 1
    public $email, $password;

    // Step 2
    public $first_name, $last_name, $country, $occupation = 'Other', $purpose;
    public $mobile, $intrested;
    public function mount()
    {
        $this->password = Str::random(8);
    }
    public function nextStep()
    {
        $this->validate([
            'email' => 'required|email',
            // 'password' => 'required|min:6',
        ]);
        $user = DB::table('upmana_users')->where('email', $this->email)->first();
        if ($user) {
            session()->put('upmana-auth', $user->id);
            session()->flash('message', 'Authenticated!');
            $this->dispatch('close-register-modal');
            return redirect()->route('upmana-ai');
        } else {
            $this->step = 2;
        }
    }

    public function register()
    {
        $this->validate([
            'first_name' => 'required',
            // 'last_name' => 'required',
            'occupation' => 'required',
            'country' => 'required',
            'purpose' => 'required',
            'mobile' => 'required|regex:/^\+?[1-9]\d{10,12}$/',
        ]);

        DB::table('upmana_users')->insert([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'name' => $this->first_name . ' ' . $this->last_name,
            'mobile' => $this->mobile,
            'occupation' => $this->occupation,
            'country' => $this->country,
            'area_of_interest' => $this->purpose,
            'content_intrest' => $this->intrested ?? 0,
        ]);
        session()->put('upmana-auth', 1);
        session()->flash('message', 'Thanks for providing information!');
        // Close the modal via JS
        $this->dispatch('close-register-modal');
        return redirect()->route('upmana-ai');
    }

    public function render()
    {
        return view('livewire.utility.popupreg');
    }
}
