@extends('yellowpages::layout.auth')

@section('title', 'लॉगिन (Login)')

@section('content')
<style>
  /* General Styles */
  .signin-signup .sign-in-form h2 {
    font-size: 22px;
    line-height: 29px;
    text-align: center;
    color: #333;
  }

  .signin-signup .sign-in-form .btn {
    width: 100%;
    background: #f39c12;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s ease;
  }

  .signin-signup .sign-in-form .btn:hover {
    background: #e67e22;
  }

  .logo-sec {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .pie {
    border-left: 4px solid;
    height: 50px;
  }

  .panel p {
    font-size: 0.95rem;
    padding: 0.7rem 0;
  }

  .forms-container .signin-signup form {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    margin: auto;
  }

  .input-field {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
  }

  .input-field i {
    margin-right: 10px;
    color: #555;
  }

  .input-field input {
    border: none;
    outline: none;
    flex: 1;
    background: transparent;
  }

  .alert-danger {
    color: red;
    background: #ffe6e6;
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
  }

  .panels-container {
    text-align: center;
    margin-top: 20px;
  }
  /* Form Division */
.forms-container .signin-signup form{
 box-shadow:0px 4px 8px 7px rgba(0,0,0,0.1) !important;
}

/* Button */
.signin-signup .sign-in-form a.btn{
 background-color:#ffffff;
 color:#020202;
}

/* Button (hover) */
.signin-signup .sign-in-form a.btn:hover{
 color:#f39c12;
 /* padding-top: 13px; */
 background: #fff;
}

.signin-signup .sign-in-form a.btn{
 margin-top:17px;
}

@media (max-width:570px){

/* Form Division */
.container .forms-container .signin-signup form{
 box-shadow:0px 4px 0px -50px rgba(0,0,0,0.1) !important;
}

}
@media (max-width:570px){

/* Form Division */
.forms-container .signin-signup form{
 transform:translatex(0px) translatey(-88px);
}

}
/* Input field */
.signin-signup .sign-in-form .input-field{
 display:block;
 padding-top:6px;
}

/* Input */
.sign-in-form .input-field input[type=tel]{
 position:relative;
 top:-6px;
}

/* Input */
.sign-in-form .input-field input[type=password]{
 position:relative;
 top:-5px;
}
@media (max-width:570px){

/* Left panel */
.forms-container .left-panel{
 padding-right:0px;
 padding-left:47px;
 transform:translatex(0px) translatey(0px);
}

}


</style>

<div class="forms-container">
  <div class="signin-signup">
    <!-- Login Form -->
    <form action="{{ route('yp.authLogin') }}" method="POST" class="sign-in-form" autocomplete="off">
      @csrf
      <h2 class="title">लॉगिन (Login)</h2>
      
     
      
      <!-- Phone Field -->
      <div class="input-field ">
        <i class="fas fa-phone"></i>
        <input type="tel" name="phone" placeholder="फोन नंबर दर्ज करें" value="{{ old('phone') }}" />
      </div>

      <!-- Password Field -->
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="पासवर्ड दर्ज करें" />
      </div>
       @if ($errors->any())
          <p class="text-danger" style="color: red; font-size: 14px; margin-bottom: 10px;">
            आपका फ़ोन नंबर या पासवर्ड गलत है, कृपया पुनः प्रयाश करे |
          </p>
      @endif
      <!-- Submit Button -->
      <input type="submit" class="btn" value="लॉगिन (Login)" />
  
      <!-- Register Link -->
      <a href="{{ route('yp.newAccount') }}" class="btn">नया खाता बनाएं? रजिस्टर (Register) करें</a>
    </form>
  </div>

  <div class="panels-container">
    <div class="panel left-panel">
        <div class="content">
          <div class="logo-sec">
            <img src="{{ asset('assets/images/yplogo.png') }}" alt="logo icon" style="width: 100px; height: auto;">
            <p class="pie"></p>
            <img src="{{ asset('assets/images/logo-bg.png') }}" alt="logo icon" style="width: 30%; height: auto;">
          </div>
          <p class="slug" style="font-weight: bold; font-size: 16px; color: #333;">देश का पहला, हिंदी में येलो पेज (YellowPage)</p>
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
