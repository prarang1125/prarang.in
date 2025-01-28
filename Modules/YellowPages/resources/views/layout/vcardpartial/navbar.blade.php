<!--start header -->

<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div> 
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>
                  
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle" class="user-img" alt="user avatar" style="font-size: 30px; color: #333;"></i>
                    <div class="user-info ps-3">
                        @if (Auth::guard('web')->check())
                            <p class="user-name mb-0" id="{{ Auth::guard('web')->user()->userId }}">{{ Auth::guard('web')->user()->firstName }} {{ Auth::guard('web')->user()->lastName }}</p>
                            <p class="designattion mb-0">वेब व्यवस्थापक प्रोफ़ाइल</p>
                        @elseif (Auth::check())
                            <p class="user-name mb-0">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
                            <p class="designattion mb-0">वेब उपयोगकर्ता प्रोफ़ाइल</p>
                        @else
                            <p class="user-name mb-0">अतिथि</p>
                            <p class="designattion mb-0">अंदर प्रवेश की अनुमति नहीं है</p>
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if (Auth::guard('web')->check())
                        {{-- @if (Auth::guard('admin')->user()->roleId === '1') --}}
                        <li><a class="dropdown-item" href="{{ route('vCard.userEdit', ['id' => Auth::id()]) }}"><i class="bx bx-user"></i><span>प्रोफ़ाइल अपडेट करें</span></a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('vCard.dashboard') }}"><i class='bx bx-home-circle'></i><span>डैशबोर्ड</span></a>
                        </li>
                        {{-- <li><a class="dropdown-item" href="{{ route('yp.getLocationData') }}"><i class='bx bx-home-circle'></i><span>सूची जोड़ें</span></a>
                        </li> --}}
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('vCard.logout') }}"><i class='bx bx-log-out-circle'></i><span>लॉग आउट</span><a>
                        {{-- @elseif (Auth::check())
                            <a class="dropdown-item" href="{{ route('accounts.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        @endif --}}
                        </li>
                    @elseif (Auth::check())
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>प्रोफ़ाइल</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>डैशबोर्ड</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <a class="dropdown-item" href="{{ route('vCard.logout') }}"><i class='bx bx-log-out-circle'></i><span>लॉग आउट<span></a>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="sidebar-wrapper">
    <!-- Sidebar Content (Navigation Links) -->
    @include('yellowpages::layout.vcardpartial.sidebar')
</div>
<!--end header -->


<!-- Add this JavaScript to handle sidebar toggle -->
<script>
    document.querySelector('.mobile-toggle-menu').addEventListener('click', function() {
        document.querySelector('.sidebar-wrapper').classList.toggle('active');
    });
</script>

