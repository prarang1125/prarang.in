<style>
    /* General Styles */
    header.header {
        background-color: #f8f9fa;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        max-width: 120px;
        height: auto;
    }

    .mobile-nav-toggle {
        display: block;
        font-size: 1.2rem;
        cursor: pointer;
        color: #333;
    }

    @media (min-width: 769px) {
        .mobile-nav-toggle {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .navmenu ul {
            display: none;
            flex-direction: column;
            position: absolute;
            background: white;
            width: 100%;
            left: 0;
            top: 50px;
            /* Adjust based on your header */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navmenu ul.show {
            display: flex;
        }

        .dropdown-menu {
            display: none;
            position: relative;
            /* Fix for mobile */
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }
    }


    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .dropdown.show .dropdown-menu {
        display: block;
    }

    .dropdown-icon {
        transition: transform 0.3s ease;
    }

    /* Flexx */
    #header .d-flex {
        display: flex;
        /* transform:translatex(0px) translatey(0px); */
        padding-top: 0px;
        margin-top: -14px;
        margin-bottom: -10px;
    }

    /* Image */
    #header .d-flex .logo img {
        width: 250px !important;
    }

    /* Image */
    .d-flex .logo img {
        min-width: 219px;
        min-height: 62px;
        padding-top: 5px;
    }
</style>

<header id="header" class="header fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('yp.home') }}" class="logo">
            {{-- <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Logo">
            --}}
            <img src="{{ asset('assets/images/logo-bg.png') }}" alt="Logo">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="dropdown" id="categories-menu">
                    <a href="#">{{ __('yp.cities') }}<i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="dropdown-menu">
                        @foreach(get_cities() as $city)
                        <li><a href="{{ route('city.show', explode(" (", $city->name)[0]) }}">{{ $city->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li><a href="{{ route('yp.plan') }}">योजना</a></li> --}}
                <li><a href="{{ route('yp.vcard') }}">{{ __('yp.create_webpage') }}</a></li>

                @if(Auth::check())
                <li class="dropdown">
                    <a href="#"><i class="fas fa-user-circle"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('vCard.dashboard') }}">{{ __('yp.dashboard') }}</a></li>
                        {{-- <li><a href="{{ route('yp.getLocationData') }}">सूची जोड़ें</a></li> --}}
                        <li>
                            <a href="{{ route('vCard.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('yp.logout') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <form id="logout-form" action="{{ route('yp.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <li class="login-button">
                    <a href="{{ route('yp.login') }}" class="btn-login-icon">
                        <i class="bx bx-log-in"></i>
                        <span class="highlight-text">{{ __('yp.login') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <i class="mobile-nav-toggle bi bi-list" onclick="toggleMenu()"></i>
    </div>
</header>

<script>
    let isMenuOpen = false; // Track menu state

function toggleMenu() {
    const menu = document.querySelector('.navmenu ul');
    menu.classList.toggle('show');
    isMenuOpen = menu.classList.contains('show'); // Update menu state
}

function toggleDropdown(category) {
    category.classList.toggle('show');
}

// Handle menu toggle button (☰ / X)
document.querySelector('.mobile-nav-toggle').addEventListener('click', function (event) {
    event.stopPropagation(); // Prevent it from triggering document click
    toggleMenu();
});

// Handle dropdown click (Cities)
document.querySelectorAll('.navmenu ul .dropdown > a').forEach(function (categoryLink) {
    categoryLink.addEventListener('click', function (event) {
        event.preventDefault(); // Stop link navigation
        event.stopPropagation(); // Stop it from triggering document click
        toggleDropdown(categoryLink.parentElement);
    });
});

// Close menu when clicking outside (but NOT when clicking inside)
document.addEventListener('click', function (event) {
    const menu = document.querySelector('.navmenu ul');
    const toggleButton = document.querySelector('.mobile-nav-toggle');

    // Close menu if clicking outside (not on menu or toggle button)
    if (isMenuOpen && !menu.contains(event.target) && !toggleButton.contains(event.target)) {
        toggleMenu();
    }
});

</script>