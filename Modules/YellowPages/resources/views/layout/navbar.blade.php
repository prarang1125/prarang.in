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

/* Mobile View - Handle dropdown on tap */
@media (max-width: 768px) {
    .navmenu ul li a {
        font-size: 1.1rem; 
    }

    /* .navmenu ul li .dropdown-menu {
        display: none; 
    } */

    .navmenu ul li.show .dropdown-menu {
        display: block; 
    }

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
                    <a href="#">सिटीज <i class="bx bx-chevron-down dropdown-icon"></i></a>
                    <ul class="dropdown-menu">
                        @foreach(get_cities() as $city)
                        <li><a href="{{ route('city.show', $city->name) }}">{{ $city->name }}</a></li>
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
