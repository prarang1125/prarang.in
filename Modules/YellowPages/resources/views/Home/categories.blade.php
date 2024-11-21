<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Prarang - YellowPages</title>
        <meta name="description" content="Find local crafts and businesses in your area. Listings for furniture, embroidery, and more.">
        <meta name="keywords" content="craft, furniture, embroidery, local business">
      
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Montserrat:wght@100;300;400;500;600;700;900&family=Poppins:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        
        <!-- Main CSS File -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    </head>

    <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;">
        <!-- Navbar Include -->
        @include('yellowpages::layout.navbar');
    
        <!-- Header with Background Color -->
        <div style="background-image: url('{{ asset('storage/categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; color: white; text-align: center;">
            <h1 style="padding-top: 20px;">Craft Listings</h1>
        </div>
    
        <!-- Listings Section -->
        <div style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
            <div style="font-size: 24px; margin-bottom: 20px;">
                Results For <strong>Craft (शिल्प)</strong> Listings
            </div>
    
            <!-- Filters Section -->
            <div style="display: flex; justify-content: space-evenly; align-items: center; margin-bottom: 20px; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <!-- Filter Options with Checkboxes -->
                <div>
                    <label for="credit-cards" style="margin-right: 15px; padding: 10px 15px; border: 1px solid #ccc; border-radius: 20px; background-color: #fff; cursor: pointer;">
                        <input type="checkbox" id="credit-cards" name="credit-cards" style="margin-right: 5px;"> Accepts Credit Cards
                    </label>
                    <label for="wireless-internet" style="padding: 10px 15px; border: 1px solid #ccc; border-radius: 20px; background-color: #fff; cursor: pointer;">
                        <input type="checkbox" id="wireless-internet" name="wireless-internet" style="margin-right: 5px;"> Wireless Internet
                    </label>
                </div>
            
                <!-- Dropdown Filters -->
                <div style="display: flex; gap: 10px;">
                    <select style="padding: 10px 15px; border-radius: 20px; border: 1px solid #007bff; background-color: #007bff; color: white; cursor: pointer;">
                        <option>Near Me</option>
                        <option>Price</option>
                        <option>Open Now</option>
                        <option>Best Match</option>
                    </select>
                    <select style="padding: 10px 15px; border-radius: 20px; border: 1px solid #007bff; background-color: #007bff; color: white; cursor: pointer;">
                        <option>Sort By</option>
                        <option>Craft (शिल्प)</option>
                    </select>
                </div>
            </div>

            <!-- Listings Grid -->
<div class="listings-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
    @foreach($listings as $listing)
        <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <img src="{{ asset('storage/categories/cate_bg.jpg') }}" alt="{{ $listing->title }}" style="width: 100%; height: auto;">
            <div style="padding: 20px;">
                <div style="background-color: {{ $listing->status === 'Closed' ? '#ff4d4d' : '#28a745' }}; color: white; padding: 5px; border-radius: 5px; font-size: 12px; display: inline-block; margin-bottom: 10px;">
                    {{ $listing->status === 'Closed' ? 'Closed Now!' : 'Open Now!' }}
                </div>
                <h3 style="font-size: 18px; margin-bottom: 10px;">{{ $listing->title }}</h3>
                <p><a href="#" style="text-decoration: none; color: #333; font-weight: bold;">Business Listing</a></p>

                <!-- Call and Location Options -->
                <div style="margin-top: 15px;">
                    <a href="tel:+{{ $listing->phone }}" style="text-decoration: none; color: white; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-size: 14px; margin-right: 10px; display: inline-block;">
                        📞 Call Now
                    </a>
                    <a href="https://maps.google.com/?q={{ urlencode($listing->business_address) }}" target="_blank" style="text-decoration: none; color: white; background-color: #28a745; padding: 10px 20px; border-radius: 5px; font-size: 14px; display: inline-block;">
                        📍 View Location
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
        @include('yellowpages::layout.footer')
        <!-- Vendor JS Files -->
        
        
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    
        <!-- Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    
        <!-- Responsive Grid for Mobile -->
        <style>
            @media (max-width: 768px) {
                .listings-grid {
                    grid-template-columns: 1fr; /* One listing per row on small screens */
                }
            }
        </style>
    </body>
    
</html>
