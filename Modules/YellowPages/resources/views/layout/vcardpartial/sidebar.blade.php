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
    <h6>सदस्यता</h6>
        <!-- Dashboard -->
        <li>
            <a href="{{ url('yellow-pages/user/dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">डैशबोर्ड</div>
            </a>
        </li>
        <!-- Users -->
        <li>
            <a href="{{ url('yellow-pages/user/createCard') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">वीकार्ड</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ url('yellow-pages/user/ActivePlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/MembershipPlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता योजना</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ url('yellow-pages/user/qr/') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">क्यूआर बिल्डर</div>
            </a>
        </li>
        <br>
        <h6>खाता</h6>
        <li>
            <a href="{{ url('yellow-pages/user/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-wallet"></i></div>
                <div class="menu-title">लेन-देन</div>
            </a>
        </li>
      
        <h6>व्यापार</h6>
        <li>
            <a href="{{ url('yellow-pages/user/business-listing') }}">
                <div class="parent-icon"><i class="bx bx-store"></i></div>
                <div class="menu-title">व्यवसाय सूचीकरण</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/save-listing') }}">
                <div class="parent-icon"><i class="bx bx-save"></i></div>
                <div class="menu-title">सहेजें व्यवसाय</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/rating') }}">
                <div class="parent-icon"><i class="bx bx-star"></i></div>
                <div class="menu-title">समीक्षा</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/report') }}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/user/report-list')}}">
                <div class="parent-icon"><i class="bx bx-chart"></i></div>
                <div class="menu-title">संदेश सूचीकरण</div>
            </a>
        </li>
</ul>