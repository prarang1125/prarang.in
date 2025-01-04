<!-- resources/views/components/post/footer.blade.php -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Quick Links Section -->
            <div class="col-md-4">
                <h5>{{ $linksTitle ?? 'Quick Links' }}</h5>
                <ul>
                    <li>
                        <a href="{{ $homeLink ?? 'https://www.prarang.in/' . $city }}"> {{ ucfirst($city) }} होम </a>
                    </li>
                    <li>
                        <a href="{{ $servicesLink ?? 'https://www.prarang.in/' . $city . '/smart.php' }}"> {{ ucfirst($city) }} स्मार्ट सर्विसेज </a>
                    </li>
                </ul>
                
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <h5>Address</h5>
                <ul>
                    <li> 1125, The i-Thumb , A-40, Sector 62, Noida, Uttar Pradesh 201301</li>
                </ul>
            </div>

            <!-- Connect Section (Social Media) -->
            <div class="col-md-4">
                <h5>Connect With Us</h5>
                <ul class="social-links">
                    <li><a href="{{ $facebook ?? 'https://www.facebook.com/prarang.in/' }}" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="{{ $instagram ?? 'https://www.instagram.com/prarang_in/?hl=en' }}" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="{{ $playstore ?? 'https://play.google.com/store/apps/details?id=com.riversanskiriti.prarang&hl=en_IN' }}" target="_blank"><i class="fab fa-google-play"></i> Play Store</a></li>
                    <li><a href="{{ $twitter ?? 'https://x.com/prarang_in?lang=en' }}" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Section -->
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} © - 2017 All content on this website, such as text, graphics, logos, button icons, software, images, and its selection, arrangement, presentation & overall design, is the property of Indoeuropeans India Pvt. Ltd. and protected by international copyright laws.</p>
    </div>
</footer>

<!-- Optional: Add some custom CSS styles to style the footer -->
<style>
    .footer {
        background-color: #333;
        color: white;
        padding: 30px 0;
        font-family: Arial, sans-serif;
    }

    .footer h5 {
        margin-bottom: 15px;
        font-size: 18px;
        font-weight: bold;
    }

    .footer ul {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer a {
        color: white;
        text-decoration: none;
        font-size: 14px;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .footer-bottom {
        text-align: center;
        background-color: #222;
        padding: 15px 0;
        font-size: 12px;
    }

    .social-links {
        list-style-type: none;
        padding-left: 0;
        display: flex;
        justify-content: space-around;
        margin-top: 10px;
    }

    .social-links li {
        margin-right: 20px;
    }

    .social-links i {
        font-size: 24px;
        margin-right: 8px;
    }

    .social-links a {
        color: white;
        text-decoration: none;
        font-size: 16px;
    }

    .social-links a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer .row {
            flex-direction: column;
            align-items: center;
        }

        .social-links {
            flex-direction: column;
            align-items: center;
        }

        .social-links li {
            margin-bottom: 10px;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>