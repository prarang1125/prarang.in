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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <style>
        /* Style for Rating Stars */
    .rating-star {
        width: 40px;
        height: 40px;
        background-color: #ccc;
        clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        transition: background-color 0.3s;
    }

    /* On hover, change background color */
    label:hover .rating-star {
        background-color: rgba(255, 215, 0, 0.7); /* Gold color for hover */
    }

    /* When radio button is checked, change background color */
    input[type="radio"]:checked + .rating-star {
        background-color: rgba(255, 215, 0, 0.9); /* Gold color for selected */
    }

    /* Highlight the stars on hover */
    label:hover ~ label .rating-star,
    label:hover .rating-star {
        background-color: rgba(255, 215, 0, 0.7); /* Gold on hover */
    }
    </style>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar')

    <!-- Main Container -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
            

       <!-- Main Container -->
<div style="max-width: 1200px; margin: 0 auto; padding-top: 100px; padding: 20px;">
    <!-- Image Section -->
    <div style="background-color: #ffffff; padding-top: 90px; display: flex; justify-content: center; align-items: center;">
        <img src="{{ asset('storage/' . ($listing->feature_img ?? 'default.jpg')) }}" alt="Listing Image" 
            style="max-width: 100%; height: auto; border-radius: 10px; display: block;">
    </div>
</div>

        <!-- Breadcrumb Navigation -->
        <div style="font-size: 14px; color: #555; margin-bottom: 15px;">
            <a href="#" style="text-decoration: none; color: #007bff;">Home</a> / 
            <a href="#" style="text-decoration: none; color: #007bff;">Services</a> / 
            <span style="color: #555;">{{ $listing->listing_title ?? 'No Title' }}</span>
        </div>

        <!-- Listing Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
            <div>
                <h1 style="font-size: 28px; font-weight: bold; margin: 0;">{{ $listing->listing_title ?? 'No Title' }}</h1>
                <p style="font-size: 16px; color: #777;">Be the first one to rate!</p>
            </div>
            <div>
                <button style="background-color: #007bff; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; cursor: pointer; margin-right: 10px;">Share</button>
                <button style="background-color: #28a745; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; cursor: pointer;">Save</button>
            </div>
        </div>

        <!-- Main Content -->
        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <!-- Left Section -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <p style="font-size: 16px; color: #555;">Detail description about your listing</p>
                <p style="font-size: 16px; color: #555; margin-top: 10px;">Address: <span style="color: #000;">{{ $listing->business_address ?? 'No Address' }}</span></p>
            </div>            

            <!-- Business Hours Section -->
            <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">Business Hours</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Monday</span>
                        <span>09:00 - 17:00</span>
                    </li>
                    <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Tuesday</span>
                        <span>09:00 - 17:00</span>
                    </li>
                    <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Wednesday</span>
                        <span>09:00 - 17:00</span>
                    </li>
                    <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Thursday</span>
                        <span>09:00 - 17:00</span>
                    </li>
                    <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                        <span>Friday</span>
                        <span>09:00 - 17:00</span>
                    </li>
                </ul>
                <p style="font-size: 14px; color: #28a745; margin-top: 10px;">Open Now</p>
            </div>

        </div>

      <!-- Review Form -->
      <form method="POST" action="{{ route('reviews.store', $listing->id) }}" enctype="multipart/form-data">
        @csrf
        <div style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">Rate Us and Write a Review</h3>
    
            <!-- Cleanliness Rating -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Cleanliness</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    @for ($i = 1; $i <= 5; $i++)
                        <label for="cleanliness-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                            <input type="radio" name="cleanliness" id="cleanliness-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                            {{ old('cleanliness') == $i ? 'checked' : '' }}>
                            <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                        </label>
                    @endfor
                </div>
            </div>
    
            <!-- Service Rating -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Service</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    @for ($i = 1; $i <= 5; $i++)
                        <label for="service-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                            <input type="radio" name="service" id="service-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                            {{ old('service') == $i ? 'checked' : '' }}>
                            <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                        </label>
                    @endfor
                </div>
            </div>
    
            <!-- Ambience Rating -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Ambience</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    @for ($i = 1; $i <= 5; $i++)
                        <label for="ambience-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                            <input type="radio" name="ambience" id="ambience-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                            {{ old('ambience') == $i ? 'checked' : '' }}>
                            <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                        </label>
                    @endfor
                </div>
            </div>
    
            <!-- Price Rating -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Price</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    @for ($i = 1; $i <= 5; $i++)
                        <label for="price-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                            <input type="radio" name="price" id="price-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                            {{ old('price') == $i ? 'checked' : '' }}>
                            <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                        </label>
                    @endfor
                </div>
            </div>
    
            <!-- Image Upload Section -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Select Images</label>
                <input type="file" name="image[]" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" multiple>
            </div>
    
            <!-- Title Section -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Title</label>
                <input type="text" name="title" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
    
            <!-- Review Section -->
            <div style="margin-bottom: 20px;">
                <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">Review</label>
                <textarea name="review" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" rows="4"></textarea>
            </div>
    
            <!-- Submit Button -->
            <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; width: 100%;">Submit Review</button>
        </div>
    </form>
    
       
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
    <script>
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', function () {
                const stars = this.closest('div').querySelectorAll('.rating-star');
                stars.forEach(star => star.style.backgroundColor = 'rgba(128, 128, 128, 0.7)'); // Reset colors
                for (let i = 0; i < this.value; i++) {
                    stars[i].style.backgroundColor = 'yellow'; // Highlight selected stars
                }
            });
        });
    </script>
    
</body>


</html>


