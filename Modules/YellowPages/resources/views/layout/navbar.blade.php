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
<style>
    .login-button {
    position: absolute;
    left: 50px;
    z-index: 10; /* Make sure it's on top of other items */
    }

.btn-login-icon {
    font-size: 2rem;
    color: #fff; /* White text */
    padding: 10px 20px;
    border-radius: 30px; /* Rounded corners for a pill shape */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-login-icon:hover {
  
    transform: scale(1.05); /* Slightly increase the size */
}

.highlight-text {
    margin-left: 8px;
    font-size: 1rem;
    font-weight: 600;
}

.btn-login-icon i {
    font-size: 2.5rem; /* Larger icon for emphasis */
}

</style>
<body>
<!-- Header -->
<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">       
            <a href="{{ url('/yellow-pages/home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Logo">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul class="d-flex align-items-center">
                    <!-- Category Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            श्रेणियाँ <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{ url('yellow-pages/category/' . $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/listing_plan') }}" class="btn-add-listing">
                            <i class="fa fa-plus"></i> सूची जोड़ें
                        </a>
                    </li>
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/plan') }}" class="btn-add-listing">
                            <i class="fa fa-chart-line"></i> योजना <!-- "Plan" menu item -->
                        </a>
                    </li>
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/vcard') }}" class="btn-get-vcard">
                            <i class="fa fa-id-card"></i> वी-कार्ड प्राप्त करें
                        </a>
                    </li>

                    @if(Auth::check())
                    <!-- Dropdown for logged-in users -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user-circle" style="font-size: 1.5rem;"></i>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('yellow-pages/vCard/dashboard') }}">डैशबोर्ड</a></li>
                            <li><a class="dropdown-item" href="{{ url('yellow-pages/getLocationData') }}">सूची जोड़ें</a></li>
                            <li><a class="dropdown-item" href="{{ route('yp.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">लॉग आउट</a></li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('yp.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <!-- Show larger icon for login if not authenticated -->
                    <li class="login-button" style="margin-left: auto; position: relative;"> <!-- Push to the right -->
                        <a href="{{ url('yellow-pages/login') }}" class="btn-login-icon">
                            <i class="fa fa-sign-in-alt" style="font-size: 2rem;"></i> <!-- Bigger Icon -->
                            <span class="highlight-text">साइन इन</span>
                        </a>
                    </li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>

{{-- need to add category or menu navbar category drop down show category name with login isde not name show iocn show --}}

{{-- <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="signInModalLabel">दाखिल करना</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div id="loginError" class="text-danger mt-2" style="display: none;"></div>
                <form method="POST" action="{{ route('yp.authLogin') }}">
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">मेल पता</label>
                        <input type="text" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">पासवर्ड</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">लॉग इन करें</button>
                    <p style="margin-top: 10px;">क्या आपके पास खाता नहीं है?<a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">पंजीकरण करवाना</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- Registration Modal -->
{{-- <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 8px; border: 1px solid #ccc;">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="registerModalLabel">पंजीकरण करवाना</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div id="registerError" class="text-danger mt-2" style="display: none;"></div>
                <form method="POST" action="{{ route('yp.register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="registerName">पूरा नाम</label>
                        <input type="text" class="form-control" id="registerName" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">मेल पता</label>
                        <input type="text" class="form-control" id="registerEmail" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">पासवर्ड</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">पासवर्ड की पुष्टि कीजिये</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                    </div>
                    <button type="submit" class="btn btn-primary">पंजीकरण करवाना</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
