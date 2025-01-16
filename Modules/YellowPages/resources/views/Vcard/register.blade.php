@extends('yellowpages::layout.auth')

@section('title', 'साइन अप')
@section('content')
<div class="forms-container">
  <div class="signin-signup">
    <!-- Registration Form -->
    <form action="{{ route('yp.register') }}" method="POST" class="sign-in-form">
      @csrf
      <h2 class="title">साइन अप</h2>

      <!-- Display Validation Errors for All Fields -->
      @if ($errors->any())
        <div class="alert alert-danger" style="color: red;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Name Field -->
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" name="name" placeholder="उपयोगकर्ता नाम" value="{{ old('name') }}" />
      </div>

      <!-- Email Field -->
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" name="email" placeholder="ईमेल दर्ज करें" value="{{ old('email') }}" />
      </div>

      <!-- Password Field -->
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="पासवर्ड दर्ज करें" />
       
      </div>

      <!-- Confirm Password Field (if required) -->
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password_confirmation" placeholder="पासवर्ड की पुष्टि करें" />
    
      </div>

      <!-- Submit Button -->
      <input type="submit" class="btn" value="साइन अप करें" />
    </form>
  </div>

  <!-- Panels Container -->
  <div class="panels-container">
    <!-- Left Panel -->
    <div class="panel left-panel">
      <div class="content">
        <h3>हमारे मूल्यवान सदस्य</h3>
        <p>
          हमारे समुदाय का हिस्सा बनने के लिए धन्यवाद। आपकी उपस्थिति हमारे साझा अनुभवों को समृद्ध करती है। चलिए इस यात्रा को एक साथ जारी रखते हैं!
        </p>
        <a href="{{ route('yp.login') }}" class="btn transparent">साइन इन करें</a>
      </div>
      <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" class="image" alt="Privacy Policy Illustration" />
    </div>
  </div>
</div>
@endsection
