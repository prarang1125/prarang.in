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

<body style="font-family: Arial, sans-serif; background-color: #f5f9fc; margin: 0; padding: 0;">

    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar');
<br><br>
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
        <form action="#" method="post">
            <h5 style="margin-bottom: 15px;">Primary Listing Details</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select id="location" class="form-select">
                    <option selected>Select location</option>
                    <option value="location1">Location 1</option>
                    <option value="location2">Location 2</option>
                    <option value="location3">Location 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="listingTitle" class="form-label">Listing Title</label>
                <input type="text" id="listingTitle" class="form-control" placeholder="Enter listing title">
            </div>

            <div class="form-check mb-3">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="hasTagline"
                    onclick="document.getElementById('taglineField').style.display = this.checked ? 'block' : 'none'"
                >
                <label class="form-check-label" for="hasTagline">
                    Does Your Business have a tagline?
                </label>
            </div>

            <div class="mb-3" id="taglineField" style="display: none;">
                <label for="tagline" class="form-label">Tagline</label>
                <input type="text" id="tagline" class="form-control" placeholder="Enter tagline">
            </div>

            <!-- Two Column Layout for Form Fields -->
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
                    <input type="text" id="secondaryPhone" name="secondaryPhone" class="form-control" placeholder="Enter secondary phone">
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
                    <input type="text" id="secondaryContact" name="secondaryContact" class="form-control" placeholder="Enter secondary contact name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="secondaryEmail" class="form-label">Secondary Contact Email</label>
                    <input type="email" id="secondaryEmail" name="secondaryEmail" class="form-control" placeholder="Enter secondary email">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Legal Type *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="food">Food & Beverages</option>
                        <option value="fashion">Fashion</option>
                        <option value="health">Health & Wellness</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company No. of Employees (approx.) *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="food">Food & Beverages</option>
                        <option value="fashion">Fashion</option>
                        <option value="health">Health & Wellness</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Monthly Turnover (approx.) *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="food">Food & Beverages</option>
                        <option value="fashion">Fashion</option>
                        <option value="health">Health & Wellness</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Monthly Advertising (Medium)</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="food">Food & Beverages</option>
                        <option value="fashion">Fashion</option>
                        <option value="health">Health & Wellness</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Advertising (Medium) price*</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="food">Food & Beverages</option>
                        <option value="fashion">Fashion</option>
                        <option value="health">Health & Wellness</option>
                    </select>
                </div>
            </div>

        </form>
    </div>

    <br><br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
    <form action="#" method="post">
        <h5 style="margin-bottom: 15px;">Address Details</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

        <div style="display: flex; gap: 20px;">
            <!-- Pin Code Field -->
            <div style="flex: 1;">
                <label for="pincode" class="form-label">Pin Code</label>
                <input type="text" id="pincode" class="form-control" placeholder="Enter Pin Code">
            </div>

            <!-- State Field -->
            <div style="flex: 1;">
                <label for="state" class="form-label">State</label>
                <select id="state" class="form-select">
                    <option selected>Select State</option>
                    <option value="state1">State 1</option>
                    <option value="state2">State 2</option>
                    <option value="state3">State 3</option>
                </select>
            </div>
            <div style="flex: 1;">
                <label for="state" class="form-label">cities</label>
                <select id="state" class="form-select">
                    <option selected>Select cities</option>
                    <option value="state1">State 1</option>
                    <option value="state2">State 2</option>
                    <option value="state3">State 3</option>
                </select>
            </div>
        </div>
    </form>
</div>

<br><br>
<div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
    <form action="#" method="post">
        <h5 style="margin-bottom: 15px;">CATEGORY & SERVICES</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <!-- State Field -->
            <div style="flex: 1;">
                <label for="state" class="form-label">Category *</label>
                <select id="state" class="form-select">
                    <option selected>Select State</option>
                    <option value="state1">State 1</option>
                    <option value="state2">State 2</option>
                    <option value="state3">State 3</option>
                </select>
            </div>
        </div>
    </form>
</div>
<div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
    <form action="#" method="post">
        <h5 style="margin-bottom: 15px;">More Info</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

        <!-- Description Field -->
        <div style="margin-top: 15px;">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter description here..." style="width: 100%;"></textarea>
        </div>

        <!-- Tags or Keywords Field -->
        <div style="margin-top: 15px;">
            <label for="description">Tags or Keywords (Comma Separated)</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter Tags or Keywords (Comma Separated)" style="width: 100%;"></textarea>
        </div>
    </form>
</div>

<br>
<div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
    <form action="#" method="post">
        <h5 style="margin-bottom: 15px;">Business Hours</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        
        <!-- Business Hours for Each Day -->
        <div id="day-schedule-container">
            <!-- Day Template for JavaScript Duplication -->
            <div id="day-template" style="display: none;">
                <div style="margin-bottom: 10px;">
                    <label>Select Day:</label>
                    <select class="day-select" onchange="updateDaySelection(this)">
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
                    <!-- Opening Hour -->
                    <label class="day-label"></label>
                    <input type="time" class="day-open" name="open_time[]">
                    
                    <!-- Closing Hour -->
                    <label>Closing:</label>
                    <input type="time" class="day-close" name="close_time[]">
                    
                    <!-- 24 Hours Option -->
                    <label>
                        <input type="checkbox" class="day-24hours" onclick="toggle24Hours(this)"> 24 Hours
                    </label>
                    
                    <!-- Add Second Time Slot Option -->
                    <label>
                        <input type="checkbox" class="day-2nd-slot-toggle" onclick="toggleSecondSlot(this)"> Add 2nd Time Slot
                    </label>
                </div>
                
                <!-- Second Time Slot -->
                <div class="second-time-slot" style="display: none; margin-top: 5px; padding-left: 20px;">
                    <label>Opening (2nd Slot):</label>
                    <input type="time" class="day-open-2" name="open_time_2[]">
                    
                    <label>Closing (2nd Slot):</label>
                    <input type="time" class="day-close-2" name="close_time_2[]">
                </div>
            </div>
        </div>
        
        <!-- Add More Day Button -->
        <button type="button" onclick="addNewDay()">Add More Day</button>
    </form>
</div>

<br><br>
<div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
    <form action="#" method="post">

        <!-- Address Information -->
        <h5 style="margin-bottom: 15px;">Address Information</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        
        <!-- Address Line 1 -->
        <div style="margin-bottom: 10px;">
            <label for="street_address">Full Address:</label>
            <input type="text" id="street_address" name="street_address" placeholder="123 Main St" required style="width: 100%; padding: 8px;">
        </div>
        
        <!-- City -->
        <div style="margin-bottom: 10px;">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required style="width: 100%; padding: 8px;">
        </div>
        
        <!-- State / Province -->
        <div style="margin-bottom: 10px;">
            <label for="state">State / Province:</label>
            <input type="text" id="state" name="state" required style="width: 100%; padding: 8px;">
        </div>
        
        <!-- Postal Code -->
        <div style="margin-bottom: 10px;">
            <label for="postal_code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" required style="width: 100%; padding: 8px;">
        </div>
        
        <!-- Contact Information -->
        <h5 style="margin-bottom: 15px;">Contact Information</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

        <!-- Website -->
        <div style="margin-bottom: 10px;">
            <label for="website">Website:</label>
            <input type="url" id="website" name="website" placeholder="https://example.com" style="width: 100%; padding: 8px;">
        </div>
        
        <!-- Phone -->
        <div style="margin-bottom: 10px;">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
        </div>
        
        <!-- WhatsApp -->
        <div style="margin-bottom: 10px;">
            <label for="whatsapp">WhatsApp:</label>
            <input type="tel" id="whatsapp" name="whatsapp" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
        </div>
    </form>
</div>

<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Form</title>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <form action="#" method="post" id="socialMediaForm">
            <h5 style="margin-bottom: 15px;">Social Media Links</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
            <!-- Social Media Row -->
            <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <label for="social_media">Select Platform:</label>
                <select id="social_media" name="social_media[]" required style="flex: 1; padding: 8px;">
                    <option value="">-- Select a Platform --</option>
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="instagram">Instagram</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="youtube">YouTube</option>
                    <option value="pinterest">Pinterest</option>
                    <option value="tiktok">TikTok</option>
                    <!-- Add more social media options as needed -->
                </select>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description[]" placeholder="Enter your link or details" style="flex: 2; padding: 8px;">
            </div>

            <!-- Button to Add More Social Media Links -->
            <div>
                <button type="button" id="addSocialMedia" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                    Add Another Social Media Link
                </button>
            </div>
        </form>
    </div>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the button
            document.getElementById('addSocialMedia').addEventListener('click', function() {
                // Create a new row for social media input
                const newRow = document.createElement('div');
                newRow.className = 'social-media-row';
                newRow.style.display = 'flex';
                newRow.style.alignItems = 'center';
                newRow.style.gap = '10px';
                newRow.style.marginBottom = '10px';
                
                // Create the dropdown for social media
                const socialMediaSelect = document.createElement('select');
                socialMediaSelect.name = 'social_media[]';
                socialMediaSelect.required = true;
                socialMediaSelect.style.flex = '1';
                socialMediaSelect.style.padding = '8px';

                const options = [
                    { value: '', text: '-- Select a Platform --' },
                    { value: 'facebook', text: 'Facebook' },
                    { value: 'twitter', text: 'Twitter' },
                    { value: 'instagram', text: 'Instagram' },
                    { value: 'linkedin', text: 'LinkedIn' },
                    { value: 'youtube', text: 'YouTube' },
                    { value: 'pinterest', text: 'Pinterest' },
                    { value: 'tiktok', text: 'TikTok' }
                ];

                options.forEach(option => {
                    const opt = document.createElement('option');
                    opt.value = option.value;
                    opt.textContent = option.text;
                    socialMediaSelect.appendChild(opt);
                });

                // Create the description input
                const descriptionInput = document.createElement('input');
                descriptionInput.type = 'text';
                descriptionInput.name = 'description[]';
                descriptionInput.placeholder = 'Enter your link or details';
                descriptionInput.style.flex = '2';
                descriptionInput.style.padding = '8px';

                // Append the select and input to the new row
                newRow.appendChild(socialMediaSelect);
                newRow.appendChild(descriptionInput);

                // Append the new row to the form
                document.getElementById('socialMediaForm').insertBefore(newRow, document.getElementById('addSocialMedia'));
            });
        });
    </script>


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
    // Array to keep track of selected days to disable them in other dropdowns
    let selectedDays = [];

    // Function to duplicate the day template for adding a new day
    function addNewDay() {
        const container = document.getElementById('day-schedule-container');
        const template = document.getElementById('day-template').cloneNode(true);
        template.style.display = 'block';
        template.removeAttribute('id'); // Remove the ID so we can use it for multiple days
        container.appendChild(template);

        updateDayOptions();
    }

    // Function to update the dropdown options for all day selects to exclude selected days
    function updateDayOptions() {
        const daySelects = document.querySelectorAll('.day-select');
        daySelects.forEach(select => {
            Array.from(select.options).forEach(option => {
                if (selectedDays.includes(option.value)) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });
    }

    // Function to handle day selection and update label and selectedDays array
    function updateDaySelection(selectElement) {
        const dayLabel = selectElement.closest('div').querySelector('.day-label');
        const selectedDay = selectElement.value;

        if (selectedDay) {
            // Add to selected days if it’s not already included
            if (!selectedDays.includes(selectedDay)) {
                selectedDays.push(selectedDay);
            }
            dayLabel.textContent = selectedDay.charAt(0).toUpperCase() + selectedDay.slice(1) + " Opening:";
        } else {
            // Remove from selected days if the selection is cleared
            const index = selectedDays.indexOf(selectElement.dataset.prevSelectedDay);
            if (index > -1) selectedDays.splice(index, 1);
        }

        selectElement.dataset.prevSelectedDay = selectedDay; // Track previously selected day
        updateDayOptions(); // Refresh options in all selects
    }

    // Function to toggle 24 hours option
    function toggle24Hours(checkbox) {
        const container = checkbox.closest('div');
        container.querySelector('.day-open').disabled = checkbox.checked;
        container.querySelector('.day-close').disabled = checkbox.checked;
    }

    // Function to toggle the display of the second time slot
    function toggleSecondSlot(checkbox) {
        const secondSlot = checkbox.closest('div').nextElementSibling;
        secondSlot.style.display = checkbox.checked ? 'flex' : 'none';
    }
</script>

</body>
</html>
