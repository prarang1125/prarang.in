<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
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
                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        @if (Auth::guard('admin')->check())
                            <p class="mb-0 user-name" id="{{ Auth::guard('admin')->user()->userId }}">{{ Auth::guard('admin')->user()->firstName }} {{ Auth::guard('admin')->user()->lastName }}</p>
                            <p class="mb-0 designattion">वेब व्यवस्थापक प्रोफ़ाइल</p>
                        @elseif (Auth::check())
                            <p class="mb-0 user-name">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
                            <p class="mb-0 designattion">वेब उपयोगकर्ता प्रोफ़ाइल</p>
                        @else
                            <p class="mb-0 user-name">अतिथि</p>
                            <p class="mb-0 designattion">अंदर प्रवेश की अनुमति नहीं है</p>
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if (Auth::guard('admin')->check())
                        {{-- @if (Auth::guard('admin')->user()->roleId === '1') --}}
                        <li><a class="dropdown-item" href="{{ url('yellow-pages/admin/user-edit/'. Auth::guard('admin')->id()) }}"><i class="bx bx-user"></i><span>प्रोफ़ाइल</span></a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class='bx bx-home-circle'></i><span>डैशबोर्ड</span></a>
                        </li>
                        <li>
                            <div class="mb-0 dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>लॉग आउट</span></a>
                        {{-- @elseif (Auth::check())
                            <a class="dropdown-item" href="{{ route('accounts.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        @endif --}}
                        </li>
                    @elseif (Auth::check())
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>प्रोफ़ाइल</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>सेटिंग्स</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>डैशबोर्ड</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>आय</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>डाउनलोड</span></a>
                        </li>
                        <li>
                            <div class="mb-0 dropdown-divider"></div>
                        </li>
                        <a class="dropdown-item" href="{{ route('accounts.logout') }}"><i class='bx bx-log-out-circle'></i><span>लॉग आउट</span></a>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->

