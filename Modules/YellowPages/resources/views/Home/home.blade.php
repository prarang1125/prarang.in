<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Prarang - YellowPages</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
@include('yellowpages::layout.navbar');

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section-bg accent-background">

      <div class="container position-relative text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-center">
            <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center mx-auto">
                <h2>
                    <span>Explore Your</span> 
                    <span class="accent">City</span>
                </h2>
                <p>Let's uncover the best Businesses, Products and Services</p>
                
                <form class="search-form d-flex justify-content-center mt-4" style="margin-top: 20px;" action="{{ route('home') }}" method="GET">
                      
                  <!-- Categories Dropdown -->
                  <select name="category" id="category" class="form-select"  style="width: 300px; padding: 10px; margin-right: 10px; border: 1px solid #ccc; border-radius: 4px;" >
                      <option value="">Select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                
                  <!-- Cities Dropdown -->
                  <select name="city" id="city" class="form-select" style="width: 200px; padding: 10px; margin-right: 10px;">
                      <option value="">Select City</option>
                      @foreach ($cities as $city) <!-- Loop through cities -->
                          <option value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                  </select>
                  
                  <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px;">
                      <i class="bi bi-search" style="font-size: 1.2rem;"></i>
                  </button>
              </form>

                
    
                <!-- Description and arrow image below the search bar -->
                <div class="text-center lp-search-description" style="margin-top: 20px;">
                    <p>Looking for a service? Discover the most popular and reliable service providers and products in your city</p>
                    <img src="{{ asset('storage/images/banner-arrow.png') }}" alt="banner-arrow" class="banner-arrow" style="margin-top: 10px;" />
                </div>
            </div>
        </div>
    </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/Craft-Icon.png') }}" alt="Easel Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Craft (शिल्प)</a></h4>
                    </div>
                </div><!--End Icon Box -->
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/Government-Icon.jpg') }}" alt="Gem Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Government (सरकारी)</a></h4>
                    </div>
                </div><!--End Icon Box -->
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/Industry-Icon.png') }}" alt="Location Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Industry (उद्योग)</a></h4>
                    </div>
                </div><!--End Icon Box -->
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/Real-Estate-Icon.jpg') }}" alt="Command Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Real Estate (अचल संपत्ति)</a></h4>
                    </div>
                </div><!--End Icon Box -->
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/icon-retail.png') }}" alt="Star Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Retail (फुटकर)</a></h4>
                    </div>
                </div><!--End Icon Box -->
    
                <div class="col-xl-2 col-md-4">
                    <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                        <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                            <img src="{{ asset('storage/icons/Services-Icon.png') }}" alt="Heart Icon" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <h4 class="title" style="font-size: 16px; margin-top: 10px;"><a href="" class="stretched-link">Services (सेवाएं)</a></h4>
                    </div>
                </div><!--End Icon Box -->
            </div>
        </div>
    </div>
    


    </section><!-- /Hero Section -->

  <section id="services" class="services">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Live Cities</h2>
      <p>Find the Best Services and Products in these Cities</p>
    </div><!-- End Section Title -->
  
    <div class="container">
      <div class="row gy-4">
        <!-- Meerut Card -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <a href="meerut-details.html" class="card-link">
            <div class="card">
              <img src="{{ asset('storage/cities/meerut.jpg') }}" class="card-img-top" alt="Meerut">
              <div class="card-body text-center">
                <h5 class="card-title">Meerut</h5>
              </div>
            </div>
          </a>
        </div><!-- End Meerut Card -->
  
        <!-- Lucknow Card -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <a href="lucknow-details.html" class="card-link">
            <div class="card">
              <img src="{{ asset('storage/cities/lucknow.jpg') }}" class="card-img-top" alt="Lucknow">
              <div class="card-body text-center">
                <h5 class="card-title">Lucknow</h5>
              </div>
            </div>
          </a>
        </div><!-- End Lucknow Card -->
  
        <!-- Jaunpur Card -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <a href="jaunpur-details.html" class="card-link">
            <div class="card">
              <img src="{{ asset('storage/cities/jaunpur.jpg') }}" class="card-img-top" alt="Jaunpur">
              <div class="card-body text-center">
                <h5 class="card-title">Jaunpur</h5>
              </div>
            </div>
          </a>
        </div>
  
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <a href="rampur-details.html" class="card-link">
            <div class="card">
              <img src="{{ asset('storage/cities/rampur.jpg') }}" class="card-img-top" alt="Rampur">
              <div class="card-body text-center">
                <h5 class="card-title">Rampur</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="listings" class="listings section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up" style="text-align: center; margin-bottom: 40px;">
      <h2>Listings</h2>
      <p>Popular Listings In Our Directory</p>
    </div>
  
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 20
              },
              "1200": { 
                "slidesPerView": 3,
                "spaceBetween": 30
              }
            }
          }
        </script>
  
        <div class="swiper-wrapper">
          <!-- Shop/Business 1 -->
          <div class="swiper-slide">
            <div class="listing-item" style="background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 15px; text-align: center; transition: 0.3s;">
              <img src="{{ asset('storage/cities/meerut.jpg') }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;" alt="Shop 1">
              <div class="listing-details">
                <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Shop 1</h3>
                <p style="font-size: 1rem; color: #555;">Address: 123 Main Street, City, Country</p>
                <p style="font-size: 1rem; color: #555;">Opening Hours: 9 AM - 9 PM</p>
                <p style="font-size: 1rem; color: #555;">Contact: +123 456 7890</p>
              </div>
            </div>
          </div>
  
          <!-- Shop/Business 2 -->
          <div class="swiper-slide">
            <div class="listing-item" style="background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 15px; text-align: center; transition: 0.3s;">
              <img src="{{ asset('storage/cities/meerut.jpg') }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;" alt="Shop 2">
              <div class="listing-details">
                <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Shop 2</h3>
                <p style="font-size: 1rem; color: #555;">Address: 456 Side Street, City, Country</p>
                <p style="font-size: 1rem; color: #555;">Opening Hours: 10 AM - 8 PM</p>
                <p style="font-size: 1rem; color: #555;">Contact: +123 456 7891</p>
              </div>
            </div>
          </div>
  
          <!-- Shop/Business 3 -->
          <div class="swiper-slide">
            <div class="listing-item" style="background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 15px; text-align: center; transition: 0.3s;">
              <img src="{{ asset('storage/cities/meerut.jpg') }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;" alt="Shop 3">
              <div class="listing-details">
                <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Shop 3</h3>
                <p style="font-size: 1rem; color: #555;">Address: 789 Another St, City, Country</p>
                <p style="font-size: 1rem; color: #555;">Opening Hours: 8 AM - 6 PM</p>
                <p style="font-size: 1rem; color: #555;">Contact: +123 456 7892</p>
              </div>
            </div>
          </div>
          <!-- Shop/Business 3 -->
          <div class="swiper-slide">
            <div class="listing-item" style="background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 15px; text-align: center; transition: 0.3s;">
              <img src="{{ asset('storage/cities/meerut.jpg') }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;" alt="Shop 3">
              <div class="listing-details">
                <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Shop 3</h3>
                <p style="font-size: 1rem; color: #555;">Address: 789 Another St, City, Country</p>
                <p style="font-size: 1rem; color: #555;">Opening Hours: 8 AM - 6 PM</p>
                <p style="font-size: 1rem; color: #555;">Contact: +123 456 7892</p>
              </div>
            </div>
          </div>
  
          <!-- Add more shops/businesses as needed -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section> 
  </main>
    <!-- Include the footer -->
    {{-- @include('layout.footer') --}}
    @include('yellowpages::layout.footer')


  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>



  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
 
</body>
</html>