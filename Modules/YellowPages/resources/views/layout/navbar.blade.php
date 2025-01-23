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

.navmenu ul {
    display: none; /* Initially hidden */
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
    flex-direction: column; /* Stack items vertically */
    background-color: #f8f9fa;
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    z-index: 9999;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navmenu ul.show {
    display: flex; /* Show menu when toggled */
}

.navmenu ul li {
    position: relative;
    margin: 0;
    padding: 10px;
}

.navmenu ul li a {
    text-decoration: none;
    color: #333;
    font-size: 1rem;
    display: block;
    transition: color 0.3s ease;
}

.navmenu ul li a:hover {
    color: #007bff;
}

/* Dropdown menu styles */
.navmenu ul .dropdown-menu {
    flex-direction: column;
    background-color: #fff;
    padding: 40px 0;
    position: absolute;
    top: 100%; /* Position the dropdown below the parent item */
    left: 0;
    width: 80%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

/* Show dropdown on click */
.navmenu ul li.show .dropdown-menu {
    display: block; /* Show the dropdown when the parent <li> has the .show class */
}

/* Mobile Nav Toggle */
.mobile-nav-toggle {
    display: block;
    font-size: 1.2rem; /* Smaller toggle icon */
    cursor: pointer;
    color: #333;
}

@media (min-width: 769px) {
    .mobile-nav-toggle {
        display: none; /* Hide toggle button on larger screens */
    }

    .navmenu ul {
        display: flex; /* Show menu on desktop */
        flex-direction: row; /* Arrange items horizontally */
        position: static; /* Default positioning */
        width: auto;
        background-color: transparent;
        box-shadow: none;
    }

    /* Make dropdown visible on hover in larger screens */
    .navmenu ul li:hover .dropdown-menu {
        display: block;
    }
}

/* Mobile View - Handle dropdown on tap */
@media (max-width: 768px) {
    .navmenu ul li a {
        font-size: 1.1rem; /* Slightly larger font for mobile devices */
    }

    .navmenu ul li .dropdown-menu {
        display: none; /* Keep dropdown hidden */
    }

    .navmenu ul li.show .dropdown-menu {
        display: block; /* Show dropdown menu on click */
    }

    /* Rotate the dropdown icon when the menu is open */
    .navmenu ul li.show .dropdown-icon {
        transform: rotate(180deg); /* Rotate icon */
    }
}

/* Dropdown icon styles */
.dropdown-icon {
    margin-left: 10px;
    transition: transform 0.3s ease; /* Smooth rotation effect */
}

/* Optional: Add hover effect to the dropdown icon */
.navmenu ul li a:hover .dropdown-icon {
    color: #007bff;
}

</style>

<header id="header" class="header fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('yp.home') }}" class="logo">
            <img src="{{ asset('assets/images/logo/yellow_logo.png') }}" alt="Logo">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="dropdown" id="categories-menu">
                    <a href="#">श्रेणियाँ <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="dropdown-menu">
                        @foreach(get_categories() as $category)
                            <li><a href="{{ url('yellow-pages/category/' . $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ url('yellow-pages/plans') }}">योजना</a></li>
                <li><a href="{{ url('yellow-pages/vcard') }}">वी-कार्ड प्राप्त करें</a></li>

                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#"><i class="bx bx-user"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('vCard.dashboard') }}">डैशबोर्ड</a></li>
                            <li><a href="{{ url('yellow-pages/getLocationData') }}">सूची जोड़ें</a></li>
                            <li>
                                <a href="{{ route('yp.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    लॉग आउट
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('yp.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="login-button">
                        <a href="{{ url('yellow-pages/login') }}" class="btn-login-icon">
                            <i class="bx bx-log-in"></i>
                            <span class="highlight-text">साइन इन</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <i class="mobile-nav-toggle bi bi-list" onclick="toggleMenu()"></i>
    </div>
</header>

<script>
    function toggleMenu() {
    const menu = document.querySelector('.navmenu ul');
    menu.classList.toggle('show');
}

function toggleDropdown(category) {
    const dropdown = category.querySelector('.dropdown-menu');
    category.classList.toggle('show');  // Show or hide the dropdown

    // Toggle the dropdown icon
    const icon = category.querySelector('.dropdown-icon');
    icon.classList.toggle('show');  // Optional: Rotate the icon on open/close
}

// Attach the toggleDropdown function to the category items
document.querySelectorAll('.navmenu ul .dropdown > a').forEach(function(categoryLink) {
    categoryLink.addEventListener('click', function(event) {
        event.preventDefault();  // Prevent default link behavior
        toggleDropdown(categoryLink.parentElement);  // Pass the parent <li> element
    });
});

</script>
