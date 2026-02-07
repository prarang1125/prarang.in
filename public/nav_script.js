// Navbar Toggle Functionality
document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const navbarToggler = document.getElementById('navbarToggler');
    const navbarCollapse = document.getElementById('mainNavbarMenu');

    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function () {
            navbarCollapse.classList.toggle('show');
        });
    }

    // Touch optimization variables
    let touchStartY = 0;
    let isSwiping = false;

    // Handle all dropdown toggles (both main and nested)
    document.querySelectorAll('.dropdown-toggle').forEach(function (toggle) {
        // Touch start tracking
        toggle.addEventListener('touchstart', function (e) {
            touchStartY = e.touches[0].clientY;
            isSwiping = false;
        }, { passive: true });

        // Touch move detection
        toggle.addEventListener('touchmove', function (e) {
            const touchY = e.touches[0].clientY;
            if (Math.abs(touchY - touchStartY) > 10) {
                isSwiping = true;
            }
        }, { passive: true });

        // Click/Touch handler
        toggle.addEventListener('click', function (e) {
            // Ignore if user was swiping
            if (isSwiping) {
                return;
            }

            // Only handle on mobile or if it's a nested dropdown
            if (window.innerWidth < 992 || this.closest('.dropdown-menu')) {
                e.preventDefault();
                e.stopPropagation();

                const parentDropdown = this.closest('.dropdown');
                if (parentDropdown) {
                    const wasOpen = parentDropdown.classList.contains('show');

                    // Close other dropdowns at the same level
                    const siblings = parentDropdown.parentElement.querySelectorAll(':scope > .dropdown');
                    siblings.forEach(function (sibling) {
                        if (sibling !== parentDropdown && sibling.classList.contains('show')) {
                            sibling.classList.remove('show');
                        }
                    });

                    // Toggle current dropdown
                    if (wasOpen) {
                        parentDropdown.classList.remove('show');
                    } else {
                        parentDropdown.classList.add('show');

                        // Add haptic feedback on supported devices
                        if (window.navigator && window.navigator.vibrate) {
                            window.navigator.vibrate(10);
                        }
                    }
                }
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dropdown') && !e.target.closest('.navbar-toggler')) {
            document.querySelectorAll('.dropdown.show').forEach(function (dropdown) {
                dropdown.classList.remove('show');
            });
        }
    });

    // Close mobile menu when clicking a non-dropdown link
    document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle), .dropdown-menu .dropdown-item:not(.dropdown-toggle)').forEach(function (link) {
        link.addEventListener('click', function (e) {
            // Don't close if it's a dropdown toggle
            if (this.classList.contains('dropdown-toggle')) {
                return;
            }

            if (navbarCollapse && window.innerWidth < 992) {
                // Small delay for better UX
                setTimeout(function () {
                    navbarCollapse.classList.remove('show');
                }, 150);
            }
        });
    });

    // Close all dropdowns when navbar is collapsed
    if (navbarCollapse) {
        // Listen for when the navbar is being hidden
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === 'class') {
                    if (!navbarCollapse.classList.contains('show')) {
                        document.querySelectorAll('.dropdown.show').forEach(function (dropdown) {
                            dropdown.classList.remove('show');
                        });
                    }
                }
            });
        });

        observer.observe(navbarCollapse, {
            attributes: true
        });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function (e) {
        if (navbarCollapse &&
            !e.target.closest('.navbar-collapse') &&
            !e.target.closest('.navbar-toggler') &&
            navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
        }
    });

    // Handle window resize
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 992) {
            // Close mobile menu on desktop
            if (navbarCollapse) {
                navbarCollapse.classList.remove('show');
            }
            // Close all dropdowns
            document.querySelectorAll('.dropdown.show').forEach(function (dropdown) {
                dropdown.classList.remove('show');
            });
        }
    });
});
