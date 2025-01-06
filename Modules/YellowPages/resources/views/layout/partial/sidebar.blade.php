<div class="sidebar-header">
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">प्रारंग</h4>
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
                <div class="menu-title">डैशबोर्ड</div>
            </a>
        </li>
        <!-- Users -->
        <li>
            <a href="{{ url('yellow-pages/user-listing') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">उपयोगकर्ताओं</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ url('yellow-pages/categories-listing') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">वर्ग</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ url('yellow-pages/cities-listing') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">शहर</div>
            </a>
        </li>
        <!-- Business Listing -->
        <li>
            <a href="{{ url('yellow-pages/business-listing') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">व्यवसाय सूचीकरण</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">भुगतान लेन - देन</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/Rating') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">समीक्षा</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/Report') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश</div>
            </a>
        </li>
</ul>
