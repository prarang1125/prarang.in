<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prarang Navigation</title>
    <link rel="stylesheet" href="nav_style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">
    <div id="main-header">
        <!-- Desktop Header -->
        <header class="bg-white container-fluid py-3 d-none-mobile">
            <div class="container">
                <div class="header-row">
                    <div class="header-content-col">
                        <h1 class="header-title">Prarang Knowledge Webs</h1>
                        <p class="header-tagline">Bridging the Digital Divide – By City, By Language</p>
                    </div>
                    <div class="header-logo-col">
                        <a href="/" class="logo-link">
                            <img class="logo-image" src="https://www.prarang.in/home-assets/image/logo.png" alt="Prarang" height="60">
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="container">
                <!-- Mobile Header Area -->
                <div class="mobile-header">
                    <!-- Mobile Toggler -->
                    <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Mobile Brand Content -->
                    <div class="mobile-brand">
                        <h1 class="header-title">Prarang Knowledge Webs</h1>
                        <p class="header-tagline">Bridging the Digital Divide – By City, By Language</p>
                    </div>

                    <!-- Mobile Logo -->
                    <a class="navbar-brand" href="/">
                        <img class="logo-image" src="https://www.prarang.in/home-assets/image/logo.png" alt="Prarang" height="35">
                    </a>
                </div>

                <!-- Navigation Menu -->
                <div class="navbar-collapse" id="mainNavbarMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/digital-divide">Digital Divide</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button">
                                Solutions
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/content">Content</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button">
                                        Analytics
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" target="_blank" href="https://g2c.prarang.in/india">India Analytics</a></li>
                                        <li><a class="dropdown-item" target="_blank" href="https://g2c.prarang.in/world">World Analytics</a></li>
                                        <li><a class="dropdown-item" href="/cirus">CIRUS</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="/ai/upmana">A.I.</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" role="button">
                                        Performance Metrics
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/semiotics">Semiotics</a></li>
                                        <li><a class="dropdown-item" href="/partners">Partner Metrics</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/partners">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about-us">About-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" id="viveks-modal">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/knowledge">Knowledge</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/intelligence">Intelligence</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <script src="nav_script.js"></script>
</body>

</html>