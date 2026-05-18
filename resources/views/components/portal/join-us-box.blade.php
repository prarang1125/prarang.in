<div>
    <style>
        .join-us-trigger {
            min-height: 60px;
            cursor: pointer;
            border-radius: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: none;
            width: 100%;
            text-decoration: none !important;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2), 0 2px 4px -1px rgba(16, 185, 129, 0.1);
        }

        .join-us-trigger:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px -5px rgba(16, 185, 129, 0.4);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        /* Minimalist Modal Styling */
        #joinUsModal .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        #joinUsModal .modal-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0;
        }

        #joinUsModal .modal-body {
            padding: 1.5rem;
        }

        #joinUsModal .form-control,
        #joinUsModal .form-select {
            font-size: 14px !important;
            padding: 0.625rem 0.75rem;
            border-radius: 0.5rem;
            border-color: #e2e8f0;
        }

        #joinUsModal .form-control:focus,
        #joinUsModal .form-select:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            border-color: #2563eb;
        }

        #joinUsModal .btn-primary {
            font-size: 14px;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 0.5rem;
        }

        /* Dark Backdrop override */
        .modal-backdrop.show {
            opacity: 0.8 !important;
            background-color: #000 !important;
        }

        /* Brand Social Colors */
        .social-brand-grid {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 3px;
            padding-top: 9px;
            border-top: 1px solid #f1f5f9;
        }

        .social-brand-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff !important;
            text-decoration: none !important;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .social-brand-btn:hover {
            transform: scale(1.1);
            opacity: 0.9;
        }

        .bg-facebook {
            background-color: #1877F2;
        }

        .bg-twitter {
            background-color: #1DA1F2;
        }

        .bg-instagram {
            background-color: #E4405F;
        }

        .bg-linkedin {
            background-color: #0A66C2;
        }
    </style>

    @if (!isset($isSubscribed) || !$isSubscribed)
    <div class="w-full">
        <button type="button" class="join-us-trigger w-100" data-bs-toggle="modal" data-bs-target="#joinUsModal">
            <h3 class="text-base md:text-lg lg:text-[22px] font-black leading-tight m-0 text-white">
                <i class="fa fa-envelope-o me-2"></i> Join Us for later
            </h3>
        </button>
    </div>

    <!-- Bootstrap 5 Modal -->
    <div class="modal fade" id="joinUsModal" tabindex="-1" aria-labelledby="joinUsModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (isset($showWelcome) && $showWelcome)
                    <div class="text-center py-5">
                        <div class="mb-4 d-inline-block p-3 bg-success bg-opacity-10 rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-check2-circle text-success" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                        </div>
                        <h3 class="h4 fw-bold mb-2">Thank You!</h3>
                        <p class="text-muted mb-4">You have successfully joined Prarang Czech-India.</p>
                        <button type="button" class="btn btn-secondary w-100 rounded-pill"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                    @else
                    <form wire:submit.prevent="register">
                        <h4 class="h5 fw-bold mb-4">Please Fill...</h4>

                        <div class="mb-3 text-start">
                            <label class="form-label text-secondary fw-semibold">Select Country <span
                                    class="text-danger">* </span></label>
                            <select wire:model.live="country"
                                class="form-select @error('country') is-invalid @enderror">
                                <option value="">Select your country</option>
                                <option value="india">India</option>
                                <option value="nepal">Nepal</option>
                                <option value="afghanistan">Afghanistan</option>
                                <option value="albania">Albania</option>
                                <option value="algeria">Algeria</option>
                                <option value="andorra">Andorra</option>
                                <option value="angola">Angola</option>
                                <option value="argentina">Argentina</option>
                                <option value="armenia">Armenia</option>
                                <option value="australia">Australia</option>
                                <option value="austria">Austria</option>
                                <option value="azerbaijan">Azerbaijan</option>
                                <option value="bahrain">Bahrain</option>
                                <option value="bangladesh">Bangladesh</option>
                                <option value="belarus">Belarus</option>
                                <option value="belgium">Belgium</option>
                                <option value="bhutan">Bhutan</option>
                                <option value="bolivia">Bolivia</option>
                                <option value="bosnia">Bosnia and Herzegovina</option>
                                <option value="brazil">Brazil</option>
                                <option value="bulgaria">Bulgaria</option>
                                <option value="cambodia">Cambodia</option>
                                <option value="canada">Canada</option>
                                <option value="chile">Chile</option>
                                <option value="china">China</option>
                                <option value="colombia">Colombia</option>
                                <option value="croatia">Croatia</option>
                                <option value="cuba">Cuba</option>
                                <option value="cyprus">Cyprus</option>
                                <option value="denmark">Denmark</option>
                                <option value="ecuador">Ecuador</option>
                                <option value="egypt">Egypt</option>
                                <option value="estonia">Estonia</option>
                                <option value="ethiopia">Ethiopia</option>
                                <option value="finland">Finland</option>
                                <option value="france">France</option>
                                <option value="georgia">Georgia</option>
                                <option value="germany">Germany</option>
                                <option value="ghana">Ghana</option>
                                <option value="greece">Greece</option>
                                <option value="hungary">Hungary</option>
                                <option value="iceland">Iceland</option>
                                <option value="indonesia">Indonesia</option>
                                <option value="iran">Iran</option>
                                <option value="iraq">Iraq</option>
                                <option value="ireland">Ireland</option>
                                <option value="israel">Israel</option>
                                <option value="italy">Italy</option>
                                <option value="jamaica">Jamaica</option>
                                <option value="japan">Japan</option>
                                <option value="jordan">Jordan</option>
                                <option value="kazakhstan">Kazakhstan</option>
                                <option value="kenya">Kenya</option>
                                <option value="kuwait">Kuwait</option>
                                <option value="latvia">Latvia</option>
                                <option value="lebanon">Lebanon</option>
                                <option value="libya">Libya</option>
                                <option value="lithuania">Lithuania</option>
                                <option value="luxembourg">Luxembourg</option>
                                <option value="malaysia">Malaysia</option>
                                <option value="maldives">Maldives</option>
                                <option value="malta">Malta</option>
                                <option value="mexico">Mexico</option>
                                <option value="monaco">Monaco</option>
                                <option value="morocco">Morocco</option>
                                <option value="nepal">Nepal</option>
                                <option value="netherlands">Netherlands</option>
                                <option value="new_zealand">New Zealand</option>
                                <option value="nigeria">Nigeria</option>
                                <option value="norway">Norway</option>
                                <option value="oman">Oman</option>
                                <option value="pakistan">Pakistan</option>
                                <option value="philippines">Philippines</option>
                                <option value="poland">Poland</option>
                                <option value="portugal">Portugal</option>
                                <option value="qatar">Qatar</option>
                                <option value="romania">Romania</option>
                                <option value="russia">Russia</option>
                                <option value="saudi_arabia">Saudi Arabia</option>
                                <option value="singapore">Singapore</option>
                                <option value="slovakia">Slovakia</option>
                                <option value="south_africa">South Africa</option>
                                <option value="south_korea">South Korea</option>
                                <option value="spain">Spain</option>
                                <option value="sri_lanka">Sri Lanka</option>
                                <option value="sweden">Sweden</option>
                                <option value="switzerland">Switzerland</option>
                                <option value="taiwan">Taiwan</option>
                                <option value="thailand">Thailand</option>
                                <option value="turkey">Turkey</option>
                                <option value="uae">United Arab Emirates</option>
                                <option value="uk">United Kingdom</option>
                                <option value="usa">USA</option>
                                <option value="uzbekistan">Uzbekistan</option>
                                <option value="vietnam">Vietnam</option>
                                <option value="other">Other</option>
                            </select>
                            @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row mb-3 text-start">
                            <div class="col-6 pe-2">
                                <label class="form-label text-secondary fw-semibold">First Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" wire:model="firstName"
                                    class="form-control @error('firstName') is-invalid @enderror"
                                    placeholder="First Name">
                                @error('firstName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6 ps-2">
                                <label class="form-label text-secondary fw-semibold">Last Name <span
                                        class="text-muted small">(optional)</span></label>
                                <input type="text" wire:model="lastName"
                                    class="form-control @error('lastName') is-invalid @enderror"
                                    placeholder="Last Name">
                                @error('lastName') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label text-secondary fw-semibold">Email Address <span
                                    class="text-danger">* </span></label>
                            <input type="email" wire:model="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="email@example.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label text-secondary fw-semibold">Mobile Number <span
                                    class="text-muted small">(optional)</span></label>
                            <input type="text" wire:model="mobile"
                                class="form-control @error('mobile') is-invalid @enderror"
                                placeholder="+XX XXXX XXX XXX">
                            @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 shadow-none border-0 bg-primary"
                            wire:loading.attr="disabled" style="background-color: #2563eb !important;">
                            <span wire:loading.remove>Subscribe Now</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-2" role="status"
                                    aria-hidden="true"></span>
                                Processing...
                            </span>
                        </button>

                        <div class="text-center mt-2" style="height: 0px !important;">
                            <p class="mb-2 text-secondary fw-semibold large">Follow us on</p>
                        </div>
                        <div class="social-brand-grid">
                            <a href="javascript:void(0)" onclick="showComingSoon(event)"
                                class="social-brand-btn bg-facebook" title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="showComingSoon(event)"
                                class="social-brand-btn bg-twitter" title="X (Twitter)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16" style="display: inline-block; vertical-align: middle;">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/india-nepal/" target="_blank"
                                class="social-brand-btn bg-linkedin" title="LinkedIn">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
