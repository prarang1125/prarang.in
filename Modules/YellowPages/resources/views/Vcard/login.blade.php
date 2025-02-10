@extends('yellowpages::layout.auth')

@section('title', 'लॉगिन (Login)')

@section('content')
<div class="forms-container">
  <div class="signin-signup">
    <!-- Login Form -->
    <form action="{{ route('yp.authLogin') }}" method="POST" class="sign-in-form">
      @csrf
      <h2 class="title">लॉगिन (Login)</h2>
      @if ($errors->any())
      <div class="alert alert-danger" style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
      <!-- Email Field -->
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="tel" name="phone" placeholder="फोन नंबर दर्ज करें" value="{{ old('phone') }}" />
     </div>

      <!-- Password Field -->
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="पासवर्ड दर्ज करें" />
      </div>

      <!-- Submit Button -->
      <input type="submit" class="btn" value="लॉगिन (Login)" style="width:60%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'" />
  
      <!-- Login Link -->
      <a href="{{ route('yp.newAccount') }}" class="btn" style="width:7
      0%; background: #f39c12; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; margin-top: 15px; font-size: 16px; font-weight: bold; transition: 0.3s ease;" onmouseover="this.style.background='#e67e22'" onmouseout="this.style.background='#f39c12'" >
        नया खाता बनाएं? रजिस्टर (Register) करें 
      </a>
    </form>
  </div>

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
