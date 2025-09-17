<?php

namespace App\Livewire\Portal\Elements;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class SubPopUp extends Component
{
    public $cities;
    public $city, $name, $phone, $password,$slug,$banner,$portal;
    public $loading = false;
    public $shareUrl=null;
    public $isVcard=false,$showPassword = false;
    public $showWelcome = false;
    public $isSubscribed = false;

    protected function rules()
    {
        return [
            'city'  => 'required',
            'name'  => 'required|string|min:3|regex:/^[^@]+$/|max:30',
            'phone' => 'required|regex:/^(\+91)?\d{10}$/',
            'password' => $this->isVcard ? 'required|min:6' : 'nullable',
        ];
    }
    protected $messages = [
        'city.required'     => 'कृपया शहर का चयन करें।',
        'name.required'     => 'नाम आवश्यक है।',
        'name.string'       => 'नाम मान्य होना चाहिए।',
        'name.min'          => 'नाम कम से कम 3 अक्षर का होना चाहिए।',
        'name.max'          => 'नाम फ़ील्ड 30 वर्णों से अधिक नहीं होनी चाहिए।',
        'phone.required'    => 'फोन नंबर दर्ज करना आवश्यक है।',
        'phone.regex'       => 'फोन नंबर मान्य नहीं है, कृपया 10 अंकों का नंबर दर्ज करें या +91 के साथ सही प्रारूप में डालें।',
        'phone.unique'      => 'यह फ़ोन नंबर पहले से मौजूद है। कृपया दूसरा फ़ोन नंबर दर्ज करें।',
        'password.required' => 'पासवर्ड आवश्यक है।',
        'password.min'      => 'पासवर्ड कम से कम 6 अक्षर का होना चाहिए।',
    ];
    public function mount($banner,$portal,$slug=null)
    {
        $this->banner = $banner;
        $this->portal = $portal;
        $this->cities = City::all();
        try {
            if($slug!=null){
                $this->city=City::where('slug', $slug)->first()->id;
            }elseif(isset($_COOKIE['register_city'])) {
                $this->city = $_COOKIE['register_city'];
            }
        } catch(\Exception $e) {
            return;
            // If there's an error, we'll leave $this->city unset
            // You may want to log the error here
        }

        if (isset($_COOKIE['yp_share_url'])) {
            $this->shareUrl = $_COOKIE['yp_share_url'];
        }
        if (isset($_COOKIE['pop-sub-mobile'])) {
            $this->isSubscribed = true;
        }

    }
    public function register()
    {
        $this->validate();
        $this->loading = true;
        $this->phone = str_replace('+91', '', $this->phone);
        if (User::where('phone', $this->phone)->where('city_id', $this->city)->exists()) {
            if($this->isVcard)
            $this->addError('phone', 'यह फ़ोन नंबर और शहर का संयोजन पहले से मौजूद है।');
            else{
                $this->showWelcome = true;
            }
            $this->showWelcome = true;
            $this->loading = false;
            return;
        }
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
            'password'  => $this->isVcard ? Hash::make($this->password) : Str::random(8),
            'role' => $this->isVcard ? 2 : 4,
            'user_code' => $userCode
        ]);

        $city = City::find($this->city);
        $this->reset();
        $this->cities = City::all();
        setcookie('pop-sub-mobile', 'true', time() + (200 * 24 * 60 * 60), "/");
        setcookie('sub-user-id', $user->id, time() + (200 * 24 * 60 * 60), "/");
        if( $this->isVcard){
            session()->flash('success', 'आपका अकाउंट बनाया गया है।');
            $this->loading = false;
            Auth::login($user);
            $this->shareUrl = route('vCard.view',['city_arr'=> Str::slug($city->city_arr),'slug'=>$user->user_code]);
            return redirect($this->shareUrl);
        }else{
            $this->showWelcome = true;
            $this->loading = false;
        }
    }
    public function validatePhone($prop)
    {
        $this->validateOnly($prop);
    }
    public function checkedVcard(){
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.portal.elements.sub-pop-up');
    }
}
