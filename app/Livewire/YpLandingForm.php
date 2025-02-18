<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class YpLandingForm extends Component
{
    public $name, $email, $mobile;
    public $submite=false;

    protected $rules = [
        'name' => 'required|string|max:255',
        // 'email' => 'required|email|unique:yp_landing,email',
        'mobile' => 'required|string|min:10|max:15',
    ];

    protected $messages = [
        'name.required' => 'आपका नाम दर्ज करें',
        'email.required' => 'आपका ईमेल दर्ज करें',
        'mobile.required' => 'आपका मोबाइल नंबर दर्ज करें',
        'email.unique' => 'यह ईमेल पहले से ही मौजूद है',
        'mobile.string' => 'कृपया एक मान्य मोबाइल नंबर दर्ज करें',
        'mobile.min' => 'मोबाइल नंबर कम से कम 10 अंकों का होना चाहिए',
        'mobile.max' => 'मोबाइल नंबर अधिकतम 15 अंकों का हो सकता है',
        'email.email' => 'कृपया एक मान्य ईमेल दर्ज करें',
    ];


    public function save() {
        $this->validate();

        DB::connection('yp')->table('yp_landing')->insert([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->submite=true;
        session()->flash('message', 'आपका जानकारी सफलतापूर्वक भेजा गया है, जल्द ही हम आपसे से संपर्क करेंगे|');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.yp-landing-form');
    }
}
