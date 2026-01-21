@extends('yellowpages::layout.auth')

@section('title', __('yp.login'))

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700&display=swap');

    :root {
        --primary-color: #ffc107;
        --primary-dark: #ffb300;
        --bg-gradient: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        --text-dark: #2d2d2d;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        overflow-x: hidden;
    }

    .auth-bg {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ffffff;
        z-index: -1;
    }

    .auth-bg::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        top: -150px;
        right: -100px;
        animation: float 10s infinite ease-in-out;
    }

    .auth-bg::after {
        content: '';
        position: absolute;
        width: 350px;
        height: 350px;
        background: rgba(0, 0, 0, 0.03);
        border-radius: 50%;
        bottom: -100px;
        left: -50px;
        animation: float 12s infinite ease-in-out reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(20px, 30px);
        }
    }

    .login-container {
        width: 100%;
        max-width: 1000px;
        max-height: 80vh;
        padding: 24px;
        display: flex;
        flex-direction: row;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 193, 7, 0.2);
        border-radius: 40px;
        box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.1);
        margin: 20px;
        overflow: hidden;
    }

    .login-info {
        flex: 1;
        padding: 60px;
        color: var(--text-dark);
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-right: 1px solid rgba(0, 0, 0, 0.05);
    }

    .login-form-side {
        flex: 1;
        padding: 60px;
        background: white;
        border-radius: 30px;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.05);
        overflow-y: auto;
    }

    .brand-logo {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 50px;
    }

    .brand-logo img {
        height: 55px;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.08));
    }

    .brand-logo .divider {
        width: 2px;
        height: 45px;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 2px;
    }

    .login-info h1 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 3rem;
        margin-bottom: 25px;
        line-height: 1.1;
        color: #1a1a1a;
    }

    .login-info p {
        font-size: 1.25rem;
        color: #444;
        margin-bottom: 50px;
        line-height: 1.6;
    }

    .login-form-side h2 {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 12px;
        font-size: 2rem;
    }

    .login-form-side p {
        color: #777;
        margin-bottom: 40px;
        font-size: 1rem;
    }

    .form-label {
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #666;
        margin-bottom: 12px;
        display: block;
    }

    .input-group {
        background: #fafafa;
        border: 2px solid #f0f0f0;
        border-radius: 18px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
    }

    .input-group:focus-within {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 5px rgba(255, 193, 7, 0.2);
        background: white;
        transform: translateY(-2px);
    }

    .input-group-text {
        background: transparent;
        border: none;
        color: #aaa;
        padding-left: 22px;
    }

    .form-control,
    .form-select {
        border: none;
        background: transparent !important;
        padding: 16px 18px;
        font-size: 1rem;
        color: #333;
        font-weight: 600;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        outline: none;
    }

    .btn-submit {
        background: var(--primary-color);
        color: #1a1a1a;
        border: none;
        padding: 18px;
        border-radius: 18px;
        font-weight: 800;
        font-size: 1.1rem;
        margin-top: 30px;
        width: 100%;
        transition: all 0.3s;
        box-shadow: 0 8px 25px -5px rgba(255, 193, 7, 0.4);
        cursor: pointer;
    }

    .btn-submit:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px -8px rgba(255, 193, 7, 0.6);
        background: var(--primary-dark);
    }

    .register-link {
        text-align: center;
        margin-top: 35px;
        color: #666;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .register-link a {
        color: #e67e22;
        text-decoration: none;
        font-weight: 800;
        margin-left: 5px;
        transition: all 0.2s;
        box-shadow: 0 2px 0 transparent;
    }

    .register-link a:hover {
        color: #d35400;
        box-shadow: 0 2px 0 #d35400;
    }

    .error-msg {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 8px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    @media (max-width: 991px) {
        .login-container {
            flex-direction: column;
            max-width: 550px;
            padding: 16px;
        }

        .login-info {
            display: none;
        }

        .brand-logo {
            justify-content: center;
            margin-bottom: 30px;
        }

        .login-info h1 {
            font-size: 2.5rem;
        }

        .login-info p {
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .login-info .side-img {
            max-width: 250px !important;
        }

        .login-form-side {
            padding: 40px 30px;
        }
    }

    /* Login container */
    .login-container {
        background-color: rgba(255, 255, 255, 0.9);
    }

    /* Login info */
    .login-container .login-info {
        background-color: #f5e237;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    /* Login form side */
    .login-container .login-form-side {
        background-color: #f5f3f3;
        border-top-left-radius: 0px;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 20px;
    }
</style>

<div class="auth-bg"></div>

<div class="login-container animate__animated animate__zoomIn">
    <!-- Info Side -->
    <div class="login-info">
        <div class="brand-logo">
            <img src="{{ asset('assets/images/yplogo.png') }}" alt="Yellow Pages">
            <div class="divider"></div>
            <img src="{{ asset('assets/images/logo-bg.png') }}" alt="Prarang">
        </div>
        <h1>{{ __('yp.india_first_yellowpage') }}</h1>
        <p>{{ __('yp.get_business_online') }}</p>
        <img src="{{ asset('assets/images/Mobile-login-rafiki.png') }}" class="side-img img-fluid"
            style="max-width: 320px; margin-top: auto;" alt="">
    </div>

    <!-- Form Side -->
    <div class="login-form-side">
        <h2>{{ __('yp.login') }}</h2>
        <p>{{ __('yp.welcome_back') ?? 'Please enter your details to continue' }}</p>

        @if($errors->has('error'))
        <div class="alert alert-danger py-3 px-4 small border-0 mb-4 rounded-4"
            style="background: rgba(220, 53, 69, 0.08); color: #dc3545; display: flex; align-items: center;">
            <i class="fas fa-exclamation-circle me-3 fs-5"></i> {{ $errors->first('error') }}
        </div>
        @endif

        <form action="{{ route('yp.authLogin') }}" method="POST" autocomplete="off">
            @csrf

            <!-- City/Country Selection -->
            <div class="mb-4">
                <label class="form-label">{{ __('yp.country_city') }}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <select name="city_id" class="form-select @error('city_id') is-invalid @enderror" required>
                        <option value="">{{ __('yp.select_country_city') }}</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id')==$city->id ? 'selected' : '' }}>{{ $city->name
                            }}</option>
                        @endforeach
                    </select>
                </div>
                @error('city_id')
                <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <!-- Phone/Email Field -->
            <div class="mb-4">
                <label class="form-label">{{ __('yp.phone_email_label') }}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        placeholder="{{ __('yp.enter_phone_email') }}" value="{{ old('phone') }}" required />
                </div>
                @error('phone')
                <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label class="form-label">{{ __('yp.password') }}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="{{ __('yp.enter_password') }}" required />
                </div>
                @error('password')
                <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                {{ __('yp.login') }}
            </button>

            <div class="register-link">
                {{ __('yp.dont_have_account') ?? "Don't have an account yet?" }}
                <a href="{{ route('yp.newAccount') }}">{{ __('yp.create_new_account') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection