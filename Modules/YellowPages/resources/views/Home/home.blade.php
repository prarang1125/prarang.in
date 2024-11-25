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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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
                
                <form action="{{ route('yp.listing') }}" method="GET" class="search-form d-flex justify-content-center mt-4">
                  <!-- Categories Dropdown -->
                  <select name="category" class="form-select" style="width: 300px; padding: 10px; margin-right: 10px;">
                      <option value="">Select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                              {{ $category->name }}
                          </option>
                      @endforeach
                  </select>
              
                  <!-- Cities Dropdown -->
                  <select name="city" class="form-select" style="width: 200px; padding: 10px; margin-right: 10px;">
                      <option value="">Select City</option>
                      @foreach ($cities as $city)
                          <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }}>
                              {{ $city->name }}
                          </option>
                      @endforeach
                  </select>
              
                  <!-- Search Button -->
                  <button type="submit" class="btn btn-primary">
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
              @foreach($categories as $index => $category)
                  <div class="col-xl-2 col-md-4">
                      <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                          <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                              <img src="{{ asset('storage/' . $category->categories_url) }}" alt="{{ $category->name }}" style="width: 100%; height: 100%; object-fit: cover;" />
                          </div>
                          <h4 class="title" style="font-size: 16px; margin-top: 10px;">
                              <!-- Add the link to the listing page with the category ID -->
                              <a href="{{ route('yp.listing') }}?category={{ $category->id }}" class="stretched-link">{{ $category->name }}</a>
                          </h4>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  
    


    </section>

  <!-- get cities  -->
  <section id="services" class="services">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Live Cities</h2>
        <p>Find the Best Services and Products in these Cities</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach($cities as $index => $city)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <a href="{{ route('yp.listing') }}?city={{ $city->id }}" class="card-link">
                        <div class="card">
                            <img src="{{ asset('storage/' . $city->cities_url) }}" class="card-img-top" alt="{{ $city->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $city->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div><!-- End City Card -->
            @endforeach
        </div>
    </div>
</section>



<section id="listings" class="listings section">
  <div class="container section-title" data-aos="fade-up" style="text-align: center; margin-bottom: 40px;">
      <h2>Listings</h2>
      <p>Popular Listings In Our Directory</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
          <div class="swiper-wrapper">
              @foreach($listings as $listing)
              <div class="swiper-slide">
                <a href="{{ route('listing', $listing->id) }}" style="display: block;">
                  <div class="listing-item" style="background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 15px; text-align: center; transition: 0.3s;">
                      <img src="{{ asset('storage/' . ($listing->feature_img ?? 'default.jpg')) }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;" alt="{{ $listing->listing_title ?? 'No Title' }}">
                      <div class="listing-details">
                          <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $listing->listing_title ?? 'No Title' }}</h3>
                          <p style="font-size: 1rem; color: #555;">Category: {{ $listing->category->name ?? 'N/A' }}</p>
                          <p style="font-size: 1rem; color: #555;">Address: {{ $listing->business_address ?? 'No Address' }}</p>
                          <p style="font-size: 1rem; color: #555;">{{ $listing->is_open ? 'Open' : 'Closed' }}</p>
                      </div>
                  </div>
                  </a>
              </div>
              @endforeach
          </div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
      </div>
  </div>
</section>

<!-- Include Swiper JS and CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Swiper Initialization Script -->
<script>
  const swiper = new Swiper('.init-swiper', {
      loop: true,
      speed: 600,
      autoplay: {
          delay: 5000
      },
      slidesPerView: 'auto',
      pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true
      },
      breakpoints: {
          320: {
              slidesPerView: 1,
              spaceBetween: 20
          },
          1200: {
              slidesPerView: 3,
              spaceBetween: 30
          }
      }
  });
</script>


  </main>
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
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

 
</body>
</html>