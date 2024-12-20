<div class="sidebar-header">
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">PRARANG</h4>
    </div>
    <div class="toggle-icon ms-auto">
        <i class="bx bx-menu"></i>
    </div>
</div>

<!-- Navigation -->
<ul class="metismenu" id="menu">
    <h6>Membership</h6>
    
        <!-- Dashboard -->
        <li>
            <a href="{{ url('yellow-pages/dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <!-- Users -->
        <li>
            <a href="{{ url('yellow-pages/user-listing') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">VCard</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ url('yellow-pages/categories-listing') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Membership</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ url('yellow-pages/cities-listing') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">QR Builder</div>
            </a>
        </li>
        <br>
        <h6>Account</h6>
        <li>
            <a href="{{ url('yellow-pages/business-listing') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">Transaction</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">Account setting</div>
            </a>
        </li>
</ul>
<!-- End Navigation -->
