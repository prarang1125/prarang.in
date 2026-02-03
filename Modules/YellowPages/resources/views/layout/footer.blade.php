<footer id="footer" class="footer accent-background py-5">
    <div class="container text-center">
        <div class="row">
            <!-- Business Section -->
            <div class="col-md-4">
                <h5>{{ __('yp.businesses') }}</h5>
                <ul class="list-unstyled">
                    <li style="font-size: 18px;"><a href="{{ route('yp.getLocationData') }}"
                            class="text-decoration-none text-dark">{{ __('yp.add_listing') }}</a></li>
                    <li style="font-size: 18px;"><a href="{{ route('vCard.report') }}"
                            class="text-decoration-none text-dark">{{ __('yp.help') }}</a></li>
                    <li style="font-size: 18px;"><a href="{{ route('privacy-policy') }}"
                            class="text-decoration-none text-dark">{{ __('yp.privacy_policy') }}</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>{{ __('yp.important_links') }}</h5>
                <ul class="list-unstyled">
                    <li style="font-size: 18px;"><a href="{{ route('yp.home') }}"
                            class="text-decoration-none text-dark">{{ __('yp.home') }}</a></li>
                    <li style="font-size: 18px;"><a href="{{ route('yp.login') }}"
                            class="text-decoration-none text-dark">{{ __('yp.login') }}</a></li>
                    <li style="font-size: 18px;"><a href="{{ route('yp.getLocationData') }}"
                            class="text-decoration-none text-dark">{{ __('yp.search_businesses') }}</a></li>
                </ul>
            </div>
            <style>
                /* Text center */
                #footer .container .text-center {
                    background-color: rgba(0, 0, 0, 0.04);
                    padding-top: 5px;
                    padding-bottom: 5px;
                }
            </style>
            <div class="col-md-4">
                <h5>{{ __('yp.social_media') }}</h5>
                <div class="credits">
                    <a href="https://www.facebook.com/prarang.in" target="_blank" rel="noopener noreferrer"
                        aria-label="Facebook">
                        <i class="bi bi-facebook" style="font-size: 24px; margin-right: 15px;"></i>
                    </a>
                    <a href="https://twitter.com/prarang_in" target="_blank" rel="noopener noreferrer"
                        aria-label="Twitter">
                        <i class="bi bi-twitter" style="font-size: 24px; margin-right: 15px;"></i>
                    </a>
                    <a href="https://www.instagram.com/prarang.in" target="_blank" rel="noopener noreferrer"
                        aria-label="Instagram">
                        <i class="bi bi-instagram" style="font-size: 24px; margin-right: 15px;"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/prarang" target="_blank" rel="noopener noreferrer"
                        aria-label="LinkedIn">
                        <i class="bi bi-linkedin" style="font-size: 24px; margin-right: 15px;"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-4" style="border-top: 1px solid #ddd;">
        <!-- Contact Section -->
        <div class="text-center">
            <p style="font-size: 15px;">
                {{ __('yp.footer_address') }}
            </p>
            <p style="font-size: 15px;">
                <strong class="sitename">{{ __('yp.telephone') }}: +91-01204561284 </strong>
            </p>
        </div>
</footer>