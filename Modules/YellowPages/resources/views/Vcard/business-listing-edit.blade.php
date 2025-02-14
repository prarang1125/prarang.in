@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Edit Business Listing')
@section('content')

<div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">विकार्ड</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('vCard.listing-edit', $listing->id) }}"><i class="bx bx-list-ul"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">व्यवसाय सूची संपादित करें</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Header Section -->
  
    <div style="text-align: center;">
        <h1 class="position-relative z-index-1">अपनी सूची संपादित करें</h1>
    </div>
    

    <!-- Main Form -->
    <form action="{{ route('vCard.listing-update', $listing->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Primary Details Section -->
        <div class="form-section" style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5>प्राथमिक सूची विवरण</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">जगह</label>
                <select id="location" name="location" class="form-select">
                    <option selected disabled>स्थान चुनें</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}" 
                        {{ (old('legal_type_id', $listing->city_id) == $city->id) ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="listingTitle" class="form-label">लिस्टिंग शीर्षक</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control" value="{{ old('listing_title', $listing->listing_title) }}">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="hasTagline" {{ $listing->tagline ? 'checked' : '' }}
                       onclick="toggleTaglineField()">
                <label class="form-check-label" for="hasTagline">क्या आपके व्यवसाय की कोई टैगलाइन है?</label>
            </div>
            <div class="mb-3" id="taglineField" style="display: {{ $listing->tagline ? 'block' : 'none' }};">
                <label for="tagline" class="form-label">टैगलाइन</label>
                <input type="text" id="tagline" name="tagline" class="form-control" value="{{ old('tagline', $listing->tagline) }}" placeholder="Enter tagline">
            </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="businessName" class="form-label">व्यवसाय/कंपनी का नाम</label>
                        <input type="text" id="businessName" name="businessName" class="form-control" placeholder="व्यवसाय का नाम दर्ज करें" value="{{ old('businessName',$listing->business_name) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="primaryPhone" class="form-label">फ़ोन नंबर</label>
                        <input type="text" id="primaryPhone" name="primaryPhone" class="form-control" placeholder="प्राथमिक फ़ोन दर्ज करें" value="{{ old('primaryPhone', $user->phone) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="primaryContact" class="form-label">संपर्क नाम</label>
                        <input type="text" id="primaryContact" name="primaryContact" class="form-control" placeholder="प्राथमिक संपर्क नाम दर्ज करें" value="{{ old('primaryContact', $user->name) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="primaryEmail" class="form-label">ईमेल</label>
                        <input type="text" id="primaryEmail" name="primaryEmail" class="form-control" placeholder="प्राथमिक ईमेल दर्ज करें" value="{{ old('primaryEmail', $user->email) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="businessType" class="form-label">व्यवसाय/कंपनी कानूनी प्रकार *</label>
                        <select id="businessType" name="businessType" class="form-select">
                            <option value="" disabled selected>प्रकार चुनें</option>
                            @foreach($company_legal_type as $Cl_type)
                                <option value="{{ $Cl_type->id }}" {{ old('businessType',$listing->legal_type_id) == $Cl_type->id ? 'selected' : '' }}>
                                    {{ $Cl_type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="employee_range" class="form-label">व्यवसाय/कंपनी कर्मचारियों की संख्या (लगभग) *</label>
                        <select id="employee_range" name="employees" class="form-select">
                            <option value="" disabled selected>कर्मचारियों की संख्या चुनें</option>
                            @foreach($number_of_employees as $number_employee)
                                <option value="{{ $number_employee->id }}" 
                                    {{ old('employees', $listing->employee_range_id) == $number_employee->id ? 'selected' : '' }}>
                                    {{ $number_employee->range }}
                                </option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="col-md-6 mb-3">
                        <label for="turnover" class="form-label">व्यवसाय/कंपनी का मासिक कारोबार (लगभग) *</label>
                        <select id="turnover" name="turnover" class="form-select">
                            <option value="" disabled selected>टर्नओवर(Turnover) चुनें</option>
                            @foreach($monthly_turnovers as $turnovers)
                                <option value="{{ $turnovers->id }}" {{ old('turnover',$listing->turnover_id) == $turnovers->id ? 'selected' : '' }}>
                                    {{ $turnovers->range }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="advertising" class="form-label">व्यवसाय/कंपनी मासिक विज्ञापन (मध्यम)</label>
                        <select id="advertising" name="advertising" class="form-select">
                            <option value="" disabled selected>विज्ञापन का चयन करें</option>
                            @foreach($monthly_advertising_mediums as $advertising)
                                <option value="{{ $advertising->id }}" {{ old('advertising',$listing->advertising_medium_id) == $advertising->id ? 'selected' : '' }}>
                                    {{ $advertising->medium }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="advertising_price" class="form-label">व्यवसाय/कंपनी विज्ञापन (मध्यम) मूल्य*</label>
                        <select id="advertising_price" name="advertising_price" class="form-select">
                            <option value="" disabled selected>विज्ञापन मूल्य चुनें</option>
                            @foreach($monthly_advertising_prices as $advertising)
                                <option value="{{ $advertising->id }}" {{ old('advertising_price',$listing->advertising_price_id) == $advertising->id ? 'selected' : '' }}>
                                    {{ $advertising->range }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
        <br>
        <br>
        <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5 style="margin-bottom: 15px;">श्रेणी और सेवाएँ</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="display: flex; gap: 20px;">
                <div style="flex: 1;">
                    <label for="state" class="form-label">वर्ग *</label>
                    <select id="state" class="form-select" name="category">
                        <option selected>श्रेणी चुनना</option>
                        @foreach($categories as $Cate)
                        <option value="{{ $Cate->id }}" 
                            {{ (old('advertising_medium_id ', $listing->category_id) == $Cate->id) ? 'selected' : '' }}>
                            {{ $Cate->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br><br>
        <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5 style="margin-bottom: 15px;">और जानकारी</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="margin-top: 15px;">
                <label for="description">विवरण</label>
                <textarea id="description" name="description" rows="4" style="width: 100%;">{{ old('description',$listing->description) }}</textarea>
            </div>
        </div>
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
                <h5 style="margin-bottom: 15px; font-size: 18px; font-weight: bold;">काम करने के घंटे</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                <!-- Schedule Container -->
                <div id="schedule-container">
                    @if($listinghours->isNotEmpty())
                        @foreach($listinghours as $hour)
                            <div class="day-schedule">
                                <select name="day[]" class="day-select">
                                    <option value="">-- दिन चुनें --</option>
                                    <option value="monday" {{ $hour->day == 'monday' ? 'selected' : '' }}>सोमवार</option>
                                    <option value="tuesday" {{ $hour->day == 'tuesday' ? 'selected' : '' }}>मंगलवार</option>
                                    <option value="wednesday" {{ $hour->day == 'wednesday' ? 'selected' : '' }}>बुधवार</option>
                                    <option value="thursday" {{ $hour->day == 'thursday' ? 'selected' : '' }}>गुरुवार</option>
                                    <option value="friday" {{ $hour->day == 'friday' ? 'selected' : '' }}>शुक्रवार</option>
                                    <option value="saturday" {{ $hour->day == 'saturday' ? 'selected' : '' }}>शनिवार</option>
                                    <option value="sunday" {{ $hour->day == 'sunday' ? 'selected' : '' }}>रविवार</option>
                                </select>
            
                                <input type="time" name="open_time[]" class="time-input" value="{{ $hour->open_time }}">
                                <label>to</label>
                                <input type="time" name="close_time[]" class="time-input" value="{{ $hour->close_time }}">
            
                                <label>
                                    <input type="checkbox" class="is-24-hours" {{ $hour->is_24_hours ? 'checked' : '' }}> 24 घंटे
                                </label>
                                <label>
                                    <input type="checkbox" class="add-2nd-slot" {{ $hour->open_time_2 ? 'checked' : '' }}> दूसरा स्लॉट जोड़ें
                                </label>
                                <button type="button" class="remove-day-btn">&#x2716;</button>
            
                                <!-- Second Time Slot -->
                                <div class="second-time-slot" style="display: {{ $hour->open_time_2 ? 'block' : 'none' }}; margin-top: 10px;">
                                    <input type="time" name="open_time_2[]" class="time-input" value="{{ $hour->open_time_2 }}">
                                    <label>to</label>
                                    <input type="time" name="close_time_2[]" class="time-input" value="{{ $hour->close_time_2 }}">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>कोई व्यावसायिक घंटे सेट नहीं हैं।</p>
                    @endif
                </div>
            
                <!-- Add New Day Button -->
                <button type="button" id="add-day-btn">+ Add Day</button>
            </div>                
            
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">व्यवसाय/कंपनी का पता</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                <div style="margin-bottom: 10px;">
                    <label for="street">व्यवसाय/कंपनी का पता (सड़क/गली):</label>
                    <input type="text" id="street" name="street" placeholder="सड़क/गली का नाम दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('street', $address->street ?? '') }}">
                </div>
            
                <div style="margin-bottom: 10px;">
                    <label for="area_name">क्षेत्र/इलाका:</label>
                    <input type="text" id="area_name" name="area_name" placeholder="क्षेत्र का नाम दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('area_name', $address->area_name ?? '') }}">
                </div>
            
                <div style="margin-bottom: 10px;">
                    <label for="house_number">भवन संख्या:</label>
                    <input type="text" id="house_number" name="house_number" placeholder="भवन संख्या दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('house_number', $address->house_number ?? '') }}">
                </div>
            
                <div style="margin-bottom: 10px;">
                    <label for="city_id">शहर:</label>
                    <select id="city_id" name="city_id" style="width: 100%; padding: 8px;">
                        <option selected disabled>शहर चुनें</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $address->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div style="margin-bottom: 10px;">
                    <label for="postal_code">पिन कोड:</label>
                    <input type="text" id="postal_code" name="postal_code" placeholder="पिन कोड दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('postal_code', $address->postal_code ?? '') }}">
                </div>
            
                <h5 style="margin-bottom: 15px;">संपर्क जानकारी</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                <div style="margin-bottom: 10px;">
                    <label for="website">वेबसाइट:</label>
                    <input type="url" id="website" name="website" placeholder="वेबसाइट का नाम दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('website', $listing->website ?? '') }}">
                </div>
            </div>      
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">सोशल मीडिया लिंक</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                <div id="social-media-container">
                    @if(!empty($social_media_data) && count($social_media_data) > 0)
                        @foreach($social_media_data as $data)
                            <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                <select name="socialId[]" style="flex: 1; padding: 8px;">
                                    <option value="">स्थान चुनें</option>
                                    @foreach($social_media as $social)
                                        <option value="{{ $social->id }}" 
                                            @if(isset($data->social_id) && $data->social_id == $social->id) selected @endif>
                                            {{ $social->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" name="socialDescription[]" value="{{ $data->description ?? '' }}" placeholder="अपना लिंक या विवरण दर्ज करें" style="flex: 2; padding: 8px;">
                                <button type="button" class="removeSocialMedia" style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer;">-</button>
                            </div>
                    @endforeach
                    @else
                        <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <select name="socialId[]"  style="flex: 1; padding: 8px;">
                                <option value="">स्थान चुनें</option>
                                @foreach($social_media as $social)
                                    <option value="{{ $social->id }}">{{ $social->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="socialDescription[]" placeholder="अपना लिंक या विवरण दर्ज करें" style="flex: 2; padding: 8px;">
                            <button type="button" class="removeSocialMedia" style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer;">-</button>
                        </div>
                    @endif
                </div>
        
                <!-- Add Button -->
                <button type="button" id="addSocialMedia" style="padding: 10px; background-color: green; color: white; border: none; cursor: pointer; margin-top: 10px;">+</button>
            </div>
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
                <h5 style="margin-bottom: 15px;">मिडिया</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                
                <!-- Single Image Upload -->
                <div style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px;">
                    <input type="file" id="imageUpload" name="image" style="display: block; margin-top: 10px;" onchange="previewImage(event, 'previewImage')">
            
                    <!-- Show Old Image if Exists -->
                    <img id="previewImage" 
                        src="{{ $listing->business_img ? asset('storage/'.$listing->business_img) : '' }}" 
                        alt="Uploaded Image" 
                        style="margin-top: 10px; max-width: 100px; border: 1px solid #ddd; {{ $listing->business_img ? '' : 'display: none;' }}">
            
                </div>
            </div>
            
            <br>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Listing</button>
        </div>
    </form>
</div>
</div>

<script>
    // Toggle Tagline Field
    function toggleTaglineField() {
        const taglineField = document.getElementById('taglineField');
        taglineField.style.display = taglineField.style.display === 'none' ? 'block' : 'none';
    }

  // Add new day schedule
document.getElementById('add-day-btn').addEventListener('click', () => {
    const container = document.getElementById('schedule-container');
    const firstSchedule = container.querySelector('.day-schedule');

    if (firstSchedule) {
        // Clone the first schedule
        const newSchedule = firstSchedule.cloneNode(true);

        // Clear the input values in the new schedule
        newSchedule.querySelectorAll('select, input').forEach((input) => {
            if (input.type === 'checkbox') {
                input.checked = false; // Uncheck checkboxes
            } else {
                input.value = ''; // Clear other inputs
            }
        });

        // Hide second time slot by default
        const secondTimeSlot = newSchedule.querySelector('.second-time-slot');
        if (secondTimeSlot) {
            secondTimeSlot.style.display = 'none';
        }

        // Append the new schedule to the container
        container.appendChild(newSchedule);
    } else {
        console.error("Initial schedule not found.");
    }
});

// Handle "24 Hours" functionality
document.addEventListener('change', (e) => {
    if (e.target.name === 'is_24_hours[]') {
        const parent = e.target.closest('.day-schedule');
        const timeInputs = parent.querySelectorAll('input[type="time"]');
        timeInputs.forEach(input => input.disabled = e.target.checked); // Disable time inputs if "24 Hours" is checked
    }
});

// Handle "Add 2nd Slot" functionality
document.addEventListener('change', (e) => {
    if (e.target.classList.contains('add-2nd-slot')) {
        const parent = e.target.closest('.day-schedule');
        const secondSlot = parent.querySelector('.second-time-slot');
        secondSlot.style.display = e.target.checked ? 'block' : 'none'; // Show or hide second slot
    }
});

// Remove day schedule
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-day-btn')) {
        e.target.closest('.day-schedule').remove(); // Remove the current schedule
    }
});


    function previewImage(event, imgId) {
        let reader = new FileReader();
        reader.onload = function(){
        let output = document.getElementById(imgId);
        output.src = reader.result;
        output.style.display = "block";
      };
    reader.readAsDataURL(event.target.files[0]);
    }


    document.addEventListener("DOMContentLoaded", function() {
    // Add new social media row
    document.getElementById("addSocialMedia").addEventListener("click", function() {
        let container = document.getElementById("social-media-container");
        let newRow = document.createElement("div");
        newRow.classList.add("social-media-row");
        newRow.style.display = "flex";
        newRow.style.alignItems = "center";
        newRow.style.gap = "10px";
        newRow.style.marginBottom = "10px";

        let select = document.createElement("select");
        select.name = "socialId[]";
        // select.required = true;
        select.style.flex = "1";
        select.style.padding = "8px";

        let defaultOption = document.createElement("option");
        defaultOption.text = "स्थान चुनें";
        defaultOption.value = "";
        select.appendChild(defaultOption);

        let socialMediaData = @json($social_media); // Convert Blade variable to JS array

        socialMediaData.forEach(function(social) {
            let option = document.createElement("option");
            option.value = social.id;
            option.text = social.name;
            select.appendChild(option);
        });

        let input = document.createElement("input");
        input.type = "text";
        input.name = "socialDescription[]";
        input.placeholder = "अपना लिंक या विवरण दर्ज करें";
        input.style.flex = "2";
        input.style.padding = "8px";

        let removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.textContent = "-";
        removeButton.style.padding = "10px";
        removeButton.style.backgroundColor = "red";
        removeButton.style.color = "white";
        removeButton.style.border = "none";
        removeButton.style.cursor = "pointer";

        removeButton.addEventListener("click", function() {
            newRow.remove();
        });

        newRow.appendChild(select);
        newRow.appendChild(input);
        newRow.appendChild(removeButton);
        container.appendChild(newRow);
    });

    // Attach event listener to remove existing social media rows
    document.querySelectorAll(".removeSocialMedia").forEach(button => {
        button.addEventListener("click", function() {
            this.parentElement.remove();
        });
    });
});

</script>

@endsection
