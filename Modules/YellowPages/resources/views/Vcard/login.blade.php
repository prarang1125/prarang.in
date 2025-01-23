@extends('yellowpages::layout.auth')

@section('title', 'साइन इन')

@section('content')
<div class="forms-container">
  <div class="signin-signup">
    <!-- Login Form -->
    <form action="{{ route('yp.authLogin') }}" method="POST" class="sign-in-form">
      @csrf
      <h2 class="title">साइन इन</h2>
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
        <input type="text" name="email" placeholder="ईमेल दर्ज करें" value="{{ old('email') }}" />
      </div>

      <!-- Password Field -->
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="पासवर्ड दर्ज करें" />
      </div>

      <!-- Submit Button -->
      <input type="submit" value="लॉग इन" class="btn solid" />
    </form>
  </div>

  <!-- Panels Container -->
  <div class="panels-container">
    <!-- Left Panel -->
    <div class="panel left-panel">
      <div class="content">
        <h3>हमारे येलो पेज समुदाय से जुड़ें!</h3>
        <p>
          संभावनाओं की दुनिया की खोज करें! हमारे साथ जुड़ें और एक जीवंत समुदाय में भाग लें जहाँ विचार फलते-फूलते हैं और कनेक्शन मजबूत होते हैं।
        </p>
        <!-- Button to navigate to sign up page -->
        <a href="{{ route('yp.newAccount') }}" class="btn transparent">साइन अप करें</a>
      </div>
      <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" class="image" alt="Privacy Policy Illustration" />
    </div>
  </div>
</div>
@endsection
