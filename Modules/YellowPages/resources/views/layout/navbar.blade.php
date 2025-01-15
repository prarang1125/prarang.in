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


<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">       
            <a href="{{ route('yp.home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Logo">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul class="d-flex align-items-center">
                    <!-- Category Dropdown -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            श्रेणियाँ
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(get_categories() as $category)
                                <li><a class="dropdown-item" href="{{ url('yellow-pages/category/' . $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>                        
                    </li>
                    {{-- <li class="action-buttons">
                        <a href="{{ url('yellow-pages/listing_plan') }}" class="btn-add-listing">
                            <i class="fa fa-plus"></i> सूची जोड़ें
                        </a>
                    </li> --}}
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/plans') }}" class="btn-add-listing">
                            <i class="bx bx-analyse"></i> योजना <!-- "Plan" menu item -->
                        </a>
                    </li>
                    <li class="action-buttons">
                        <a href="{{ url('yellow-pages/vcard') }}" class="btn-get-vcard">
                            <i class="bx bx-id-card"></i> वी-कार्ड प्राप्त करें
                        </a>
                    </li>

                    @if(Auth::check())
                    <!-- Dropdown for logged-in users -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-user" style="font-size: 1.5rem;"></i>
                          
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('vCard.dashboard') }}">डैशबोर्ड</a></li>
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
                        <i class='bx bx-log-in' ></i> <!-- Bigger Icon -->
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
