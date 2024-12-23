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
                <div class="menu-title">Users</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ url('yellow-pages/categories-listing') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ url('yellow-pages/cities-listing') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">Cities</div>
            </a>
        </li>
        <!-- Business Listing -->
        <li>
            <a href="{{ url('yellow-pages/business-listing') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">Business Listing</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">Payment Transaction</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/vcard/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">Review</div>
            </a>
        </li>
</ul>
