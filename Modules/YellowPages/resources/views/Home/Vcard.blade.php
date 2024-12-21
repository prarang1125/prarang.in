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

<div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 90vh; padding: 10px; background-color: #fff;">
    
    <!-- Text Content -->
    <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
      <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">It all starts with a digital business card.</h1>
      <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
        Quick vCard is a digital business card maker SAAS script, an easy way to share your contacts and grow your professional relationships.
      </p>
      <a href="#demo" style="padding: 12px 24px; background-color: #6200ea; color: #fff; border-radius: 8px; font-size: 1.2em; text-decoration: none; font-weight: bold;">
        TRY DEMO
      </a>
    </div>

    <!-- Image Content -->
    <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
      <img src="{{ asset('storage/Vcard/vcard.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
    </div>
  </div>
    <!-- First Step -->
    <div class="container" style="padding: 0px 0; background-color: #f9f9f9;">
        <h2 style="text-align: center; font-size: 2.5em; margin-bottom: 40px; font-weight: bold; color: #333;">How It Works?</h2>
        <div class="row justify-content-center">
          <!-- Column 1 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
            <div class="icon-box">
              <!-- Icon -->
              <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #6200ea; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 2em;">
                  <i class="la la-qrcode"></i>
                </div>
                <div class="icon-box-check" style="position: absolute; bottom: 0; right: -5px; background: #fff; border-radius: 50%; color: #6200ea; display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                  <i class="icon-material-outline-check"></i>
                </div>
              </div>
              <!-- Text -->
              <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">Create Digital Business Card</h3>
              <p style="font-size: 1em; color: #555; line-height: 1.5;">
                Easily create QR codes for your visiting card and make a great first impression. Fill your profile—it’s simple!
              </p>
            </div>
          </div>
      
          <!-- Column 2 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
            <div class="icon-box">
              <!-- Icon -->
              <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #6200ea; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 2em;">
                  <i class="la la-share-alt"></i>
                </div>
                <div class="icon-box-check" style="position: absolute; bottom: 0; right: -5px; background: #fff; border-radius: 50%; color: #6200ea; display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                  <i class="icon-material-outline-check"></i>
                </div>
              </div>
              <!-- Text -->
              <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">Share Your Card with Anyone</h3>
              <p style="font-size: 1em; color: #555; line-height: 1.5;">
                Easily share your digital business card using a QR code, email, link, and more. Share and grow connections effortlessly.
              </p>
            </div>
          </div>
      
          <!-- Column 3 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
            <div class="icon-box">
              <!-- Icon -->
              <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #6200ea; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 2em;">
                  <i class="la la-users"></i>
                </div>
                <div class="icon-box-check" style="position: absolute; bottom: 0; right: -5px; background: #fff; border-radius: 50%; color: #6200ea; display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                  <i class="icon-material-outline-check"></i>
                </div>
              </div>
              <!-- Text -->
              <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">Get More Customers</h3>
              <p style="font-size: 1em; color: #555; line-height: 1.5;">
                Your customers will find a way to reach you. All they need to do is scan your QR code and choose the best way to connect.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 70vh; padding: 20px; background-color: #fff;">
    
            <!-- Image Content -->
            <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
                <img src="{{ asset('storage/Vcard/vcard-1.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
              </div>
        <!-- Text Content -->
        <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
          <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">Contactless digital business cards</h1>
          <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
            Quick vCard helps easily overcome any new sanitary friction with an ideal contactless experience and grow your professional relationships with its viral features. No physical contact is required to send or receive a virtual business card. You can create as many business cards as you’d like, with different information on each card. Make a card for your work contacts, one for clients or customers, and one for your friends.
          </p>
        </div>
      </div>

      <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 70vh; padding: 20px; background-color: #fff;">
    
        <!-- Text Content -->
        <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
          <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">Share your card with anyone        </h1>
          <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
            Easily share your digital business card with anyone using a QR code or send it through email, a link, and more. you can download QR code and print on anything like flyers, newsletters, or a billboard.
          </p>
        
        </div>
    
        <!-- Image Content -->
        <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
          <img src="{{ asset('storage/Vcard/vcard-2.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
        </div>
        
      </div>
      <div class="container" style="padding: 50px 0; background-color: #f9f9f9;">
        <h2 style="text-align: center; font-size: 2.5em; margin-bottom: 40px; font-weight: bold; color: #333;">Membership Plan</h2>
        
        <!-- Radio Button Options for Monthly/Yearly -->
        <div style="text-align: center; margin-bottom: 30px;">
            <label for="monthly" style="font-size: 1.5em; color: #333; margin-right: 20px;">
                <input type="radio" id="monthly" name="plan" value="100" checked>
                Monthly
            </label>
            <label for="yearly" style="font-size: 1.5em; color: #333;">
                <input type="radio" id="yearly" name="plan" value="1000">
                Yearly
            </label>
        </div>
    
        <!-- Hidden input to store the selected amount -->
        <input type="hidden" id="selected-plan-amount" name="amount" value="100">
    
        <!-- Plan Prices Based on Radio Selection -->
        <div id="plan-price" style="text-align: center; margin-bottom: 40px;">
            <p style="font-size: 1.5em; font-weight: bold; color: #333;" id="price-display">₹100/Monthly</p>
        </div>
    
        <!-- Plan Details -->
        <div class="row justify-content-center">
            <!-- Free Plan Column -->
            <div class="col-lg-4 col-md-6 col-sm-12 text-center" style="margin-bottom: 30px;">
                <div style="background: linear-gradient(145deg, #f0f0f0, #d4d4d4); border-radius: 15px; padding: 30px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 28px; font-weight: bold; color: #333;">Free Plan</h3>
                    <p style="font-size: 22px; color: #007bff;">₹0/Monthly</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 20px; text-align: center;">
                        <li style="font-size: 16px; color: #555;">5 Additional fields on card</li>
                        <li style="font-size: 16px; color: #555;">50 Scans Per Month</li>
                        <li style="font-size: 16px; color: #555;">Hide QuickVCard Branding</li>
                    </ul>
                    <a onclick="window.location.href='{{ url('yellow-pages/vCard/dashboard') }}'" style="background-color: #007bff; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">Current Plan</a>
                </div>
            </div>
    
            <!-- Trial Plan Column -->
            <div class="col-lg-4 col-md-6 col-sm-12 text-center" style="margin-bottom: 30px;">
                <div style="background: linear-gradient(145deg, #ffb74d, #ff9800); border-radius: 15px; padding: 30px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                    <h3 style="font-size: 28px; font-weight: bold; color: #fff;">Trial Plan</h3>
                    <p style="font-size: 22px; color: #fff;">₹0/Monthly</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 20px; text-align: center;">
                        <li style="font-size: 16px; color: #fff;">15 Additional fields on card</li>
                        <li style="font-size: 16px; color: #fff;">50 Scans Per Month</li>
                        <li style="font-size: 16px; color: #fff;">Hide QuickVCard Branding</li>
                    </ul>
                    <a onclick="window.location.href='{{ url('yellow-pages/vCard/dashboard') }}'" style="background-color: #fff; color: #ff9800; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">Join Now</a>
                </div>
            </div>
    
            <!-- Standard Plan Column (Recommended) -->
            <div class="col-lg-4 col-md-6 col-sm-12 text-center" style="margin-bottom: 30px;">
                <div style="background: linear-gradient(145deg, #81c784, #66bb6a); border-radius: 15px; padding: 30px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); position: relative;">
                    <h3 style="font-size: 28px; font-weight: bold; color: #fff;" id="standard-plan-title">Standard Plan</h3>
                    <p id="standard-plan-price" style="font-size: 22px; color: #fff;">₹100/Monthly</p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 20px; text-align: center;">
                        <li style="font-size: 16px; color: #fff;">10 Additional fields on card</li>
                        <li style="font-size: 16px; color: #fff;">100 Scans Per Month</li>
                        <li style="font-size: 16px; color: #fff;">Hide QuickVCard Branding</li>
                    </ul>
                    <a onclick="window.location.href='{{ url('yellow-pages/vCard/dashboard') }}'" id="checkout-button" style="background-color: #fff; color: #66bb6a; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">Join Now</a>
                </div>
            </div>
        </div>
    </div>
    
  <script>

  document.getElementById("monthly").addEventListener("click", function() {
    updatePrice("monthly");
});

document.getElementById("yearly").addEventListener("click", function() {
    updatePrice("yearly");
});

function updatePrice(plan) {
    if (plan === "monthly") {
        document.getElementById("price-display").innerText = "₹100/Monthly";
        document.getElementById("selected-plan-amount").value = "100";
    } else {
        document.getElementById("price-display").innerText = "₹1000/Yearly";
        document.getElementById("selected-plan-amount").value = "1000";
    }
}

document.getElementById('checkout-button').addEventListener('click', function () {
    const amount = document.getElementById('selected-plan-amount').value;

    fetch('/create-checkout-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ amount: amount }),
    })
    .then(response => response.json())
    .then(session => {
        const stripe = Stripe('your_stripe_public_key'); // Replace with your actual public key
        stripe.redirectToCheckout({ sessionId: session.id });
    })
    .catch(error => console.error('Error:', error));
});

  </script>

    {{-- @include('layout.footer') --}}
    @include('yellowpages::layout.footer')
</body>
</html>