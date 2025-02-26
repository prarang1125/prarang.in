<?php

namespace App\Livewire\YellowPages\Elements;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class NewAccounts extends Component
{
    public $cities;
    public $city, $name, $phone, $password,$slug;
    public $loading = false;
    public $shareUrl=null;

    protected $rules = [
        'city'     => 'required',
        'name'     => 'string|min:3|nullable|regex:/^[^@]+$/|max:30',
        'phone'    => 'required|regex:/^(\+91)?\d{10}$/',
        'password' => 'required',
    ];
    protected $messages = [
        'city.required'      => 'कृपया शहर का चयन करें।',
        'name.max'           => 'नाम फ़ील्ड 30 वर्णों से अधिक नहीं होनी चाहिए।',
        'name.string'        => 'नाम मान्य होना चाहिए।',
        'name.min'           => 'नाम कम से कम 3 अक्षर का होना चाहिए।',
        'phone.required'     => 'फोन नंबर दर्ज करना आवश्यक है।',
        'phone.regex'        => 'फोन नंबर मान्य नहीं है, कृपया 10 अंकों का नंबर दर्ज करें या +91 के साथ सही प्रारूप में डालें।',
        'phone.unique'       => 'यह फ़ोन नंबर पहले से मौजूद है। कृपया दूसरा फ़ोन नंबर दर्ज करें।',
        'password.required'  => 'पासवर्ड आवश्यक है।',
        'password.min'       => 'पासवर्ड कम से कम 6 अक्षर का होना चाहिए।',
    ];
    public function mount($slug=null)
    {
        $this->cities = City::all();
        if($slug!=null){
            $this->city=City::where('slug', $slug)->first()->id;
        }elseif(isset($_COOKIE['register_city'])) {
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
       
        $count = 1;
        $baseUserCode = Str::slug($this->name) ?: 'user';         
        do {
            $userCode = $baseUserCode . ($count > 1 ? "-$count" : '');
            $count++;
        } while (User::where('user_code', $userCode)->exists());
        $user=User::create([
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
        session()->flash('success', 'Registration successful!');
        $this->loading = false;        
        $this->shareUrl = route('cardView.view',['city_air'=> Str::slug($city->city_arr),'slug'=>$user->user_code]);
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
