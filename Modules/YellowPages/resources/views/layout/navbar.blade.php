<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your Title</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<!-- Header -->
<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">       
            <a href="{{ url('/yellow-pages/home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/yellow_logo.png') }}" alt="Logo">
            </a>
            <nav id="navmenu" class="navmenu">
                <div class="signature-image">
                    <img src="https://yellowpages.prarang.in/wp-content/themes/listingpro/assets/images/cnsignature.png" 
                         alt="Signature Image" 
                         class="custom-image img-fluid">
                </div>
                <ul>
                    @if(Auth::check())
                    <!-- Dropdown for logged-in users -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('yellow-pages/vCard/dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('yp.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('yp.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Sign In link for guests -->
                    <li><a href="{{ url('yellow-pages/vCard/dashboard') }}" id="toggleModal" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</a></li>
                @endif
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/listing_plan') }}" class="btn-add-listing"><i class="fa fa-plus"></i> Add Listing</a>
                    </li>
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/vcard') }}" class="btn-get-vcard"><i class="fa fa-id-card"></i> Get V-Card</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>

<!-- Sign In Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div id="loginError" class="text-danger mt-2" style="display: none;"></div>
                <form method="POST" action="{{ route('yp.authLogin') }}">

                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
                    <p style="margin-top: 10px;">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div id="registerError" class="text-danger mt-2" style="display: none;"></div>
                <form method="POST" action="{{ route('yp.register') }}">

                    @csrf
                    <div class="form-group">
                        <label for="registerName">Full Name</label>
                        <input type="text" class="form-control" id="registerName" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email address</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
