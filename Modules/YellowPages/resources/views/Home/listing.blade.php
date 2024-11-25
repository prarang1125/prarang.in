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
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar')

    <!-- Main Container -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">

        <!-- Image Section -->
        <div style="background-color: #ffffff; padding: 20px; margin-bottom: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('storage/Vcard/vcard-2.png') }}" alt="Listing Image" 
                style="max-width: 100%; height: auto; border-radius: 10px; display: block;">
        </div>

        <!-- Breadcrumb Navigation -->
        <div style="font-size: 14px; color: #555; margin-bottom: 15px;">
            <a href="#" style="text-decoration: none; color: #007bff;">Home</a> / 
            <a href="#" style="text-decoration: none; color: #007bff;">Services</a> / 
            <span style="color: #555;">Ranjan Auto Service</span>
        </div>

        <!-- Listing Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
            <div>
                <h1 style="font-size: 28px; font-weight: bold; margin: 0;">Ranjan Auto Service</h1>
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
                <p style="font-size: 16px; color: #555; margin-top: 10px;">Address: <span style="color: #000;">123 Main Street, Springfield, IL</span></p>
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
<form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
    @csrf
    <div style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">Rate Us and Write a Review</h3>
        
        <!-- Ratings Section -->
        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label style="font-size: 14px; color: #555;">Cleanliness</label>
                <input type="number" name="cleanliness" min="0" max="5" step="0.1" value="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            
            <div style="flex: 1;">
                <label style="font-size: 14px; color: #555;">Service</label>
                <input type="number" name="service" min="0" max="5" step="0.1" value="0" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
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
</body>


</html>


