@extends('yellowpages::layout.auth')

@section('title', 'Register')
@section('content')
<div class="forms-container">
  <div class="signin-signup">
    <!-- Registration Form -->
    <form action="{{ route('yp.register') }}" method="POST" class="sign-in-form" style="background: white; padding: 0px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; margin: auto;">
      @csrf
      <h2 class="title" style="text-align: center; font-size: 22px; color: #333;">रजिस्ट्रेशन (Registration)</h2>
  
      <!-- Display Validation Errors -->
      @if ($errors->any())
          <div class="alert alert-danger" style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px;">
              <ul style="margin: 0; padding-left: 20px;">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
     <!-- City Dropdown -->
      <div class="input-field" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-top: 10px;">
        <i class="fas fa-city" style="margin-right: 10px; color: #555;"></i>
        <select name="city" style="border: none; outline: none; flex: 1; background: transparent;">
          <option value="">कृपया शहर चुनें</option>
          @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
          @endforeach
        </select>
      </div>
      <!-- Name Field -->
      {{-- <div class="input-field" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-top: 10px;">
          <i class="fas fa-user" style="margin-right: 10px; color: #555;"></i>
          <input type="text" name="" placeholder="उपयोगकर्ता नाम" value="{{ old('name') }}" style="border: none; outline: none; flex: 1; background: transparent;" />
      </div> --}}
   
      <!-- Phone Field -->
      <div class="input-field" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-top: 10px;">
          <i class="fas fa-phone" style="margin-right: 10px; color: #555;"></i>
          <input type="text" name="phone" placeholder="फोन नंबर दर्ज करें" value="{{ old('phone') }}" style="border: none; outline: none; flex: 1; background: transparent;" />
      </div>

     
  
      <!-- Password Field -->
      <div class="input-field" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-top: 10px;">
          <i class="fas fa-lock" style="margin-right: 10px; color: #555;"></i>
          <input type="password" name="password" placeholder="पासवर्ड दर्ज करें" style="border: none; outline: none; flex: 1; background: transparent;" />
      </div>
  
      <!-- Submit Button -->
      <input type="submit" class="btn" value="रजिस्टर (Register)" style="width: 100%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'" />
  
      <!-- Login Link -->
      <a href="{{ route('yp.login') }}" class="btn" style="width: 100%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'" >
        पहले से खाता है? साइन इन (Sign In) करें
      </a>
  </form>
  
  </div>

  <!-- Panels Container -->
  <div class="panels-container" style="margin-left: 40px; text-align: center;">
    <div class="panel left-panel">
        <div class="content">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo icon" style="width: 80px; height: auto; margin-bottom: 10px;">
            <img src="{{ asset('assets/images/yplogo.jpg') }}" alt="logo icon" style="width: 100px; height: auto; margin-bottom: 10px;">
            <p class="slug" style="font-weight: bold; font-size: 16px; color: #333;">देश का पहला, हिंदी में येलो पेज(YellowPage)</p>
            <p style="font-size: 14px; color: #555;">
                अपने व्यवसाय को मुफ़्त में ऑनलाइन करें | साथ ही, अपनी खुद की मुफ़्त वेबसाइट बनाएं |
            </p>

            <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" class="image" alt="Privacy Policy Illustration"
                 style="width: 80%; margin-top: 15px; border-radius: 5px;">
        </div>
    </div>
</div>
</div>

@endsection
