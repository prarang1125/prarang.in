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
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f5f9fc; margin: 0; padding: 0;">
    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar');
    <br>
    <br>
    <!-- Header Section -->
    <div style="position: relative; background-image: url('{{ asset('storage/categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; text-align: center; color: white;">
        <!-- Optional Overlay for better text visibility -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
        <h1 style="position: relative; z-index: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);">Submit Your Listing</h1>
    </div>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h5 style="text-align: center;">Add your Listing</h5>
        <p style="text-align: center;  margin-bottom: 20px;">Add details about your listing</p>
    </div>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
  <form action="{{ url('/yellow-pages/store-listing') }}" method="POST" id="listingForm" enctype="multipart/form-data">    
            @csrf
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
       </div>
      @endif
            <h5 style="margin-bottom: 15px;">Primary Listing Details</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select id="location" class="form-select" name="location">
                    <option selected>Select location</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="listingTitle" class="form-label">Listing Title</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="hasTagline" onclick="document.getElementById('taglineField').style.display = this.checked ? 'block' : 'none'">
                <label class="form-check-label" for="hasTagline">
                    Does Your Business have a tagline?
                </label>
            </div>
            <div class="mb-3" id="taglineField" style="display: none;">
                <label for="tagline" class="form-label">Tagline</label>
                <input type="text" id="tagline" name="tagline" class="form-control" placeholder="Enter tagline">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">Business/Company Name</label>
                    <input type="text" id="businessName" name="businessName" class="form-control" placeholder="Enter business name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessAddress" class="form-label">Business/Company Address</label>
                    <input type="text" id="businessAddress" name="businessAddress" class="form-control" placeholder="Enter business address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">Primary Phone Number</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control" placeholder="Enter primary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryPhone" class="form-label">Secondary Phone Number</label>
                    <input type="text" id="secondaryPhone" name="secondary_phone" class="form-control" placeholder="Enter secondary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">Primary Contact Name</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control" placeholder="Enter primary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">Primary Contact Email</label>
                    <input type="email" id="primaryEmail" name="primaryEmail" class="form-control" placeholder="Enter primary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryContact" class="form-label">Secondary Contact Name</label>
                    <input type="text" id="secondaryContact" name="secondaryContactName" class="form-control" placeholder="Enter secondary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryEmail" class="form-label">Secondary Contact Email</label>
                    <input type="email" id="secondaryEmail" name="secondaryEmail" class="form-control" placeholder="Enter secondary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Legal Type *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option selected>Select Type</option>
                        @foreach($company_legal_type as $Cl_type)
                        <option value="{{ $Cl_type->id }}">{{ $Cl_type->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">Business/Company No. of Employees (approx.) *</label>
                    <select id="employee_range" name="employees" class="form-select">
                        <option selected>Select No. of Employees</option>
                        @foreach($number_of_employees as $number_employee)
                        <option value="{{ $number_employee->id }}">{{ $number_employee->range}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trunover" class="form-label">Business/Company Monthly Turnover (approx.) *</label>
                    <select id="trunover" name="turnover" class="form-select">
                        <option selected>Select Turnover</option>
                        @foreach($monthly_turnovers as $turnovers)
                        <option value="{{ $turnovers->id }}">{{ $turnovers->range}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">Business/Company Monthly Advertising (Medium)</label>
                    <select id="advertising" name="advertising" class="form-select">
                        <option selected>Select Advertising</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                        <option value="{{ $advertising->id }}">{{ $advertising->medium}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">Business/Company Advertising (Medium) price*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select">
                        <option selected>Select Advertising Price</option>
                        @foreach($monthly_advertising_prices as $advertising)
                        <option value="{{ $advertising->id }}">{{ $advertising->range}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </div>
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">Address Details</h5>
    <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <!-- Pin Code Field -->
            <div style="flex: 1;">
                <label for="pincode" class="form-label">Pin Code</label>
                <input type="text" id="pincode" name="pincode" class="form-control" placeholder="Enter Pin Code">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">CATEGORY & SERVICES</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <div style="flex: 1;">
                <label for="state" class="form-label">Category *</label>
                <select id="state" class="form-select" name="category">
                    <option selected>Select Category</option>
                    @foreach($Category as $Cate)
                    <option value="{{ $Cate->id }}">{{ $Cate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <br><br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">More Info</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-top: 15px;">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter description here..." style="width: 100%;"></textarea>
        </div>
        <div style="margin-top: 15px;">
            <label for="description">Tags or Keywords (Comma Separated)</label>
            <textarea id="description" name="tags_keywords" rows="4" placeholder="Enter Tags or Keywords (Comma Separated)" style="width: 100%;"></textarea>
        </div>
    </div>
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">Business Hours</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div id="day-schedule-container">
            <div id="day-template" style="display: none;">
                <div style="margin-bottom: 10px;">
                    <label>Select Day:</label>
                    <select class="day-select" name="day[]" onchange="updateDaySelection(this)">
                        <option value="">-- Select a Day --</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>                    
                </div>
                <div style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                    <label class="day-label"></label>
                    <input type="time" class="day-open" name="open_time[]">
                    <label>Closing:</label>
                    <input type="time" class="day-close" name="close_time[]">
                    <label>
                        <input type="checkbox" name="is_24_hours[]" class="day-24hours" onclick="toggle24Hours(this)"> 24 Hours
                    </label>
                    <label>
                        <input type="checkbox"  name="add_2nd_time_slot[]" class="day-2nd-slot-toggle" onclick="toggleSecondSlot(this)"> Add 2nd Time Slot
                    </label>
                </div>
                <div class="second-time-slot" style="display: none; margin-top: 5px; padding-left: 20px;">
                    <label>Opening (2nd Slot):</label>
                    <input type="time" class="day-open-2" name="open_time_2[]">
                    <label>Closing (2nd Slot):</label>
                    <input type="time" class="day-close-2" name="close_time_2[]">
                </div>
            </div>
        </div>
        <button type="button" onclick="addNewDay()">Add More Day</button>
    </div>
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">Address Information</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-bottom: 10px;">
            <label for="street_address">Full Address:</label>
            <input type="text" id="street_address" name="fullAddress" placeholder="123 Main St" style="width: 100%; padding: 8px;">
        </div>
       
        <h5 style="margin-bottom: 15px;">Contact Information</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-bottom: 10px;">
            <label for="website">Website:</label>
            <input type="url" id="website" name="website" placeholder="https://example.com" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="whatsapp">WhatsApp:</label>
            <input type="tel" id="whatsapp" name="whatsapp" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
        </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">Social Media Links</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
            <select id="social_media" name="socialId" required style="flex: 1; padding: 8px;">
            <option selected>Select location</option>
                    @foreach($social_media as $social)
                    <option value="{{ $social->id }}">{{ $social->name }}</option>
                    @endforeach
            </select>
            <input type="text" id="description" name="socialDescription" placeholder="Enter your link or details" style="flex: 2; padding: 8px;">
            <button type="button" id="addSocialMedia" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                +
            </button>
        </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
        <h5 style="margin-bottom: 15px;">MEDIA</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px;">
        <input type="file" name="image" style="display: block; margin-top: 10px;">
        </div>

        <div style="display: flex; gap: 10px; justify-content: space-between; margin-bottom: 10px;">
            <div style="flex: 1; padding: 10px; border: 1px solid #ddd; text-align: center;">
                <label for="coverImage" class="form-label">Cover Image</label>
                <input type="file" id="coverImage" name="coverImage" class="form-control @error('coverImage') is-invalid @enderror">
            </div>
            <div style="flex: 1; padding: 10px; border: 1px solid #ddd; text-align: center;">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
            </div>
        </div>
        <h5 style="margin-top: 20px; margin-bottom: 15px;">FEATURES</h5>
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
            <label for="featuresToggle" style="font-weight: bold;">Features</label>
            <input type="checkbox" id="featuresToggle" style="cursor: pointer;">
        </div>
        <div id="faqSection" style="display: none;">
            <div class="faq-item" style="margin-bottom: 10px;">
                <label>Frequently Asked Questions</label>
                <input type="text" name="faq" placeholder="Frequently Asked Questions" style="width: 100%; margin-bottom: 5px;">
                <textarea placeholder="Answer" name="answer" style="width: 100%; height: 60px;"></textarea>
            </div>
            <div class="add-new" style="color: #007bff; cursor: pointer; font-size: 14px; display: inline-block; margin-top: 10px;" onclick="addFAQ()">+ Add New</div>
        </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <div id="signupFields" style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label for="signupEmail">Enter email to signup & receive notification upon listing approval</label>
                <input type="email" id="signupEmail" name="notificationEmail" placeholder="Enter email here..." style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
            <div style="flex: 1;">
                <label for="userName">Enter User Name</label>
                <input type="text" id="userName" name="userName" placeholder="Enter User Name" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
        </div>
        <div style="margin-top: 15px; margin-bottom: 15px;">
            <label>
                <input type="checkbox" id="existingAccountCheckbox" style="margin-right: 5px;"> Already Have Account?
            </label>
        </div>
        <div id="accountFields" style="display: none; flex-direction: row; gap: 20px;">
            <div style="flex: 1;">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
            <div style="flex: 1;">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
        </div>
    </div>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <div style="margin-top: 15px; margin-bottom: 15px;">
            <label>
                <input type="checkbox" name="agree" id="existingAccountCheckbox" style="margin-right: 5px;"> I agree to the terms and conditions.
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
    @include('yellowpages::layout.footer')
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>