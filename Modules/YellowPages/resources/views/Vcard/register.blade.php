@extends('yellowpages::layout.auth')

@section('title', 'Register')
@section('content')

<style>
  .left-panel .logo-sec {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .pie {
    border-left: 4px solid;
    height: 50px;
  }

  .left-panel .logo-sec p {
    margin: 0 9px;
  }

  .signin-signup .sign-in-form .input-field {
    transform: translate(0);
  }

  .signin-signup .sign-in-form a.btn {
    background-color: white !important;
    color: #020202 !important;
  }

  .signin-signup .sign-in-form a.btn:hover {
    color: #f39c12 !important;
  }

  .forms-container .signin-signup form {
    box-shadow: 0 4px 13px 15px rgba(72, 65, 65, 0.1) !important;
  }

  .container .forms-container .signin-signup .sign-in-form .btn {
    width: 90% !important;
  }

  @media (min-width: 571px) {
    .forms-container .signin-signup form {
      padding: 33px 5px 25px !important;
    }
  }
  @media (max-width:570px){

/* Container */
.container{
 padding-top:10px;
 padding-bottom:42px;
}

/* Form Division */
.forms-container .signin-signup form{
 padding-top:11px !important;
}

}
@media (max-width:570px){

/* Form Division */
.container .forms-container .signin-signup form{
 box-shadow:0px 4px 0px -50px rgba(72,65,65,0.1) !important;
}

/* Form Division */
.forms-container .signin-signup form{
 padding-left:17px !important;
 padding-right:14px !important;
}

}
</style>

<div class="forms-container">
  <div class="signin-signup">
    <form action="{{ route('yp.register') }}" method="POST" class="sign-in-form" style="background: white; padding: 0; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; margin: auto;" autocomplete="off">             
      @csrf
      <h2 class="title" style="text-align: center; font-size: 22px; color: #333;">रजिस्ट्रेशन (Registration)</h2>
      @if ($errors->any())      
        <ul>  
        @foreach ($errors->all() as $error)
         <li><small style="color: red; font-align: left;">{{ $error }}</small></li>
        @endforeach
        </ul>  
        @endif
      @php
        $fields = [
          ['name' => 'city', 'icon' => 'fas fa-city', 'type' => 'select', 'placeholder' => 'कृपया शहर चुनें', 'options' => $cities],
          ['name' => 'name', 'icon' => 'fas fa-user', 'type' => 'text', 'placeholder' => 'उपयोगकर्ता नाम'],
          ['name' => 'phone', 'icon' => 'fas fa-phone', 'type' => 'text', 'placeholder' => 'फोन नंबर दर्ज करें'],
          ['name' => 'password', 'icon' => 'fas fa-lock', 'type' => 'password', 'placeholder' => 'पासवर्ड दर्ज करें']
        ];
      @endphp

      @foreach ($fields as $field)
        <div class="input-field" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-top: 10px;">
          <i class="{{ $field['icon'] }}" style="margin-right: 10px; color: #555;"></i>
          @if ($field['type'] === 'select')
            <select name="{{ $field['name'] }}" style="border: none; outline: none; flex: 1; background: transparent;">
              <option value="">{{ $field['placeholder'] }}</option>
              @foreach ($field['options'] as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
              @endforeach
            </select>
          @else
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}" value="{{ old($field['name']) }}" style="border: none; outline: none; flex: 1; background: transparent;" />
          @endif
        </div>
      @endforeach

    
      <input type="submit" class="btn" value="रजिस्टर (Register)" style="width: 100%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'" />

      <a href="{{ route('yp.login') }}" class="btn" style="width: 100%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'">
        पहले से खाता है? साइन इन (Sign In) करें
      </a>
    </form>
  </div>

  <div class="panels-container" style="margin-left: 40px; text-align: center;">
    <div class="panel left-panel">
      <div class="content">
        <div class="logo-sec">
          <img src="{{ asset('assets/images/yplogo.png') }}" alt="logo icon" style="width: 100px; height: auto; margin-bottom: 10px;">
          <p class="pie"></p>
          <img src="{{ asset('assets/images/logo-bg.png') }}" alt="logo icon" style="width: 30%; height: auto; margin-bottom: 10px;">
        </div>
        <p class="slug" style="font-weight: bold; font-size: 16px; color: #333;">देश का पहला, हिंदी में येलो पेज(YellowPage)</p>
        <p style="font-size: 14px; color: #555;">
          अपने व्यवसाय को मुफ़्त में ऑनलाइन करें | साथ ही, अपनी खुद की मुफ़्त वेबसाइट बनाएं |
        </p>
        <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" class="image" alt="Privacy Policy Illustration" style="width: 80%; margin-top: 15px; border-radius: 5px;">
      </div>
    </div>
  </div>
</div>
@endsection
