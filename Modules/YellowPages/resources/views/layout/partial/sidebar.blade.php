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

<ul class="metismenu" id="menu">
    <!-- Dashboard -->
    <li>
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
            <div class="menu-title">डैशबोर्ड</div>
        </a>
    </li>
    <li>
        <a href="{{ route('checker.listing') }}">
            <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
            <div class="menu-title">लिस्टिंग चेकर</div>
        </a>
    </li>
    <li>
        <a href="{{ route('checker.card') }}">
            <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
            <div class="menu-title">कार्ड चेकर</div>
        </a>
    </li>

    <!-- Show the rest of the items only if the user is not role 3 (manager) -->
    @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
        <!-- Users -->
        <li>
            <a href="{{ route('admin.user-listing') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">उपयोगकर्ताओं</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ route('admin.categories-listing') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">वर्ग</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ route('admin.cities-listing') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">शहर</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.Vcardlist') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">वीकार्ड सूची</div>
            </a>
        </li>
        <!-- Business Listing -->
    <li>
        <a href="{{ route('admin.business-listing') }}">
            <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
            <div class="menu-title">व्यवसाय सूचीकरण</div>
        </a>
    </li>
        <li>
            <a href="{{ route('admin.paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">भुगतान लेन - देन</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.purachsePlan') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">सदस्यता विवरण</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.Rating') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">समीक्षा</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.Report') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश</div>
            </a>
        </li>
    @endif
</ul>
