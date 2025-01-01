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
            <a href="{{ url('yellow-pages/vCard/dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                <div class="menu-title">डैशबोर्ड</div>
            </a>
        </li>
        <!-- Users -->
        <li>
            <a href="{{ url('yellow-pages/vCard/createCard') }}">
                <div class="parent-icon"><i class="lni lni-user"></i></div>
                <div class="menu-title">वीकार्ड</div>
            </a>
        </li>
        <!-- Category -->
        <li>
            <a href="{{ url('yellow-pages/vcard/ActivePlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता</div>
            </a>
        </li>
        <li>
            <a href="{{ url('yellow-pages/vcard/MembershipPlan') }}">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">सदस्यता योजना</div>
            </a>
        </li>
        <!-- Cities -->
        <li>
            <a href="{{ url('yellow-pages/vcard/qr/') }}">
                <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                <div class="menu-title">क्यूआर बिल्डर</div>
            </a>
        </li>
        <br>
        <h6>खाता</h6>
        <li>
            <a href="{{ url('yellow-pages/vcard/paymentHistory') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">लेन-देन</div>
            </a>
        </li>
      
        <h6>व्यापार</h6>
        <li>
            <a href="{{ url('yellow-pages/vcard/business-listing') }}">
                <div class="parent-icon"><i class="bx bx-briefcase"></i></div>
                <div class="menu-title">व्यवसाय सूचीकरण</div>
            </a>
        </li>
</ul>
<!-- End Navigation -->
