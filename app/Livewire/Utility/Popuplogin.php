<?php

namespace App\Livewire\Utility;

use Livewire\Component;

class Popuplogin extends Component
{

    public $email, $password, $country;
    public $showModal = true;

    public function login()
    {
        // Dummy login logic (replace with Auth::attempt())
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'country' => 'required'
        ]);

        // If login successful
        session()->flash('message', 'Login successful');
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.utility.popuplogin');
    }
}
