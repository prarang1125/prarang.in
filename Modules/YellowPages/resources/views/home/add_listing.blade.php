@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
    <br>
    <br>
    <!-- Header Section -->
    <div style="position: relative; background-image: url('{{ Storage::url('categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; text-align: center; color: white;">
        <!-- Optional Overlay for better text visibility -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
        <h1 style="position: relative; z-index: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);">अपनी सूची जमा करें</h1>
    </div>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h5 style="text-align: center;">अपनी सूची जोड़ें</h5>
        <p style="text-align: center;  margin-bottom: 20px;">अपनी लिस्टिंग के बारे में विवरण जोड़ें</p>
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
            <h5 style="margin-bottom: 15px;">प्राथमिक सूची विवरण</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">जगह</label>
                <select id="location" class="form-select" name="location">
                    <option selected>स्थान चुनें</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="listingTitle" class="form-label">लिस्टिंग शीर्षक</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="hasTagline" onclick="document.getElementById('taglineField').style.display = this.checked ? 'block' : 'none'">
                <label class="form-check-label" for="hasTagline">
                    क्या आपके व्यवसाय की कोई टैगलाइन है?
                </label>
            </div>
            <div class="mb-3" id="taglineField" style="display: none;">
                <label for="tagline" class="form-label">टैगलाइन</label>
                <input type="text" id="tagline" name="tagline" class="form-control" placeholder="टैगलाइन दर्ज करें">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">व्यवसाय/कंपनी का नाम</label>
                    <input type="text" id="businessName" name="businessName" class="form-control" placeholder="व्यवसाय का नाम दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessAddress" class="form-label">व्यवसाय/कंपनी का पता</label>
                    <input type="text" id="businessAddress" name="businessAddress" class="form-control" placeholder="व्यावसायिक पता दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">प्राथमिक फ़ोन नंबर</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control" placeholder="प्राथमिक फ़ोन दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryPhone" class="form-label">द्वितीय फ़ोन नंबर
                    </label>
                    <input type="text" id="secondaryPhone" name="secondary_phone" class="form-control" placeholder="द्वितीयक फ़ोन दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">प्राथमिक संपर्क नाम</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control" placeholder="प्राथमिक संपर्क नाम दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">प्राथमिक संपर्क ईमेल</label>
                    <input type="text" id="primaryEmail" name="primaryEmail" class="form-control" placeholder="प्राथमिक ईमेल दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryContact" class="form-label">द्वितीयक संपर्क नाम</label>
                    <input type="text" id="secondaryContact" name="secondaryContactName" class="form-control" placeholder="द्वितीयक संपर्क नाम दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryEmail" class="form-label">द्वितीयक संपर्क ईमेल</label>
                    <input type="text" id="secondaryEmail" name="secondaryEmail" class="form-control" placeholder="द्वितीयक ईमेल दर्ज करें">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">व्यवसाय/कंपनी कानूनी प्रकार *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option selected>प्रकार चुनें</option>
                        @foreach($company_legal_type as $Cl_type)
                        <option value="{{ $Cl_type->id }}">{{ $Cl_type->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">व्यवसाय/कंपनी कर्मचारियों की संख्या (लगभग) *</label>
                    <select id="employee_range" name="employees" class="form-select">
                        <option selected>कर्मचारियों की संख्या चुनें</option>
                        @foreach($number_of_employees as $number_employee)
                        <option value="{{ $number_employee->id }}">{{ $number_employee->range}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trunover" class="form-label">व्यवसाय/कंपनी का मासिक कारोबार (लगभग) *</label>
                    <select id="trunover" name="turnover" class="form-select">
                        <option selected>Select Turnover</option>
                        @foreach($monthly_turnovers as $turnovers)
                        <option value="{{ $turnovers->id }}">{{ $turnovers->range}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">व्यवसाय/कंपनी मासिक विज्ञापन (मध्यम)</label>
                    <select id="advertising" name="advertising" class="form-select">
                        <option selected>विज्ञापन का चयन करें</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                        <option value="{{ $advertising->id }}">{{ $advertising->medium}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">व्यवसाय/कंपनी विज्ञापन (मध्यम) मूल्य*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select">
                        <option selected>विज्ञापन मूल्य चुनें</option>
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
        <h5 style="margin-bottom: 15px;">पता विवरण</h5>
    <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <!-- Pin Code Field -->
            <div style="flex: 1;">
                <label for="pincode" class="form-label">पिन कोड</label>
                <input type="text" id="pincode" name="pincode" class="form-control" placeholder="पिन कोड दर्ज करें">
            </div>
        </div>
    </div>
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">श्रेणी और सेवाएँ</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <div style="flex: 1;">
                <label for="state" class="form-label">वर्ग *</label>
                <select id="state" class="form-select" name="category">
                    <option selected>श्रेणी चुनना</option>
                    @foreach($Category as $Cate)
                    <option value="{{ $Cate->id }}">{{ $Cate->name}}</option>
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
            <textarea id="description" name="description" rows="4" placeholder="यहां विवरण दर्ज करें..." style="width: 100%;"></textarea>
        </div>
        <div style="margin-top: 15px;">
            <label for="description">टैग या कीवर्ड (अल्पविराम से अलग)</label>
            <textarea id="description" name="tags_keywords" rows="4" placeholder="टैग या कीवर्ड दर्ज करें (अल्पविराम से अलग करके)" style="width: 100%;"></textarea>
        </div>
    </div>
    <br>
    <br>
    
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
        <h5 style="margin-bottom: 15px; font-size: 18px; font-weight: bold;">काम करने के घंटे</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
    
        <!-- Schedule Container -->
        <div id="schedule-container">
            <!-- Initial Day Schedule -->
            <div class="day-schedule">
                <select name="day[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px; width: 120px;">
                    <option value="">-- दिन चुनें --</option>
                    <option value="monday">सोमवार</option>
                    <option value="tuesday">मंगलवार</option>
                    <option value="wednesday">बुधवार</option>
                    <option value="thursday">गुरुवार</option>
                    <option value="friday">शुक्रवार</option>
                    <option value="saturday">शनिवार</option>
                    <option value="sunday">रविवार</option>
                </select>
                <input type="time" name="open_time[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
                <label style="font-weight: bold;">to</label>
                <input type="time" name="close_time[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
                <label>
                    <input type="checkbox" name="is_24_hours[]" style="cursor: pointer;"> 24 घंटे
                </label>
                <label>
                    <input type="checkbox" class="add-2nd-slot" style="cursor: pointer;">दूसरा स्लॉट जोड़ें
                </label>
                <button type="button" class="remove-day-btn" style="background: none; border: none; color: red; font-size: 16px; cursor: pointer;">&#x2716;</button>
        
                <!-- Second Time Slot -->
                <div class="second-time-slot" style="display: none; margin-top: 10px;">
                    <input type="time" name="open_time_2[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
                    <label style="font-weight: bold;">to</label>
                    <input type="time" name="close_time_2[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
                </div>
            </div>
        </div>
        

       

        <!-- Add New Day Button -->
        <button type="button" id="add-day-btn" style="margin-top: 10px; padding: 8px 12px; background: #007bff; color: #fff; border: none; border-radius: 3px; cursor: pointer; font-size: 14px;">+ Add Day</button>
    </div>
    

    <br>
    <br>
   

    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">पते की जानकारी</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-bottom: 10px;">
            <label for="street_address">पूरा पता:</label>
            <input type="text" id="street_address" name="fullAddress" placeholder="पूरा पता दर्ज करें" style="width: 100%; padding: 8px;">
        </div>
       
        <h5 style="margin-bottom: 15px;">संपर्क जानकारी</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-bottom: 10px;">
            <label for="website">वेबसाइट:</label>
            <input type="url" id="website" name="website" placeholder="वेबसाइट का नाम दर्ज करें" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="phone">फ़ोन:</label>
            <input type="tel" id="phone" name="phone" placeholder="फ़ोन नंबर दर्ज करें" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="whatsapp">व्हाट्सएप:</label>
            <input type="tel" id="whatsapp" name="whatsapp" placeholder="व्हाट्सअप नंबर दर्ज करें" style="width: 100%; padding: 8px;">
        </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">सोशल मीडिया लिंक</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
            <select id="social_media" name="socialId" required style="flex: 1; padding: 8px;">
            <option selected>स्थान चुनें</option>
                    @foreach($social_media as $social)
                    <option value="{{ $social->id }}">{{ $social->name }}</option>
                    @endforeach
            </select>
            <input type="text" id="description" name="socialDescription" placeholder="अपना लिंक या विवरण दर्ज करें" style="flex: 2; padding: 8px;">
            <button type="button" id="addSocialMedia" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                +
            </button>
        </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
        <h5 style="margin-bottom: 15px;">मिडिया</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px;">
        <input type="file" name="image" style="display: block; margin-top: 10px;">
      
        </div>

        <div style="display: flex; gap: 10px; justify-content: space-between; margin-bottom: 10px;">
            <div style="flex: 1; padding: 10px; border: 1px solid #ddd; text-align: center;">
                <label for="coverImage" class="form-label">कवर छवि</label>
                <input type="file" id="coverImage" name="coverImage" class="form-control @error('coverImage') is-invalid @enderror">
            </div>
            <div style="flex: 1; padding: 10px; border: 1px solid #ddd; text-align: center;">
                <label for="logo" class="form-label">प्रतीक चिन्ह </label>
                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
            </div>
        </div>
        <h5 style="margin-top: 20px; margin-bottom: 15px;">विशेषताएँ</h5>
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
            <label for="featuresToggle" style="font-weight: bold;">विशेषताएँ</label>
            <input type="checkbox" id="featuresToggle" style="cursor: pointer;">
        </div>
        <div id="faqSection" style="display: none;">
            <div class="faq-item" style="margin-bottom: 10px;">
                <label>अक्सर पूछे जाने वाले प्रश्नों</label>
                <input type="text" name="faq" placeholder="Frequently Asked Questions" style="width: 100%; margin-bottom: 5px;">
                <textarea placeholder="Answer" name="answer" style="width: 100%; height: 60px;"></textarea>
            </div>
            <div class="add-new" style="color: #007bff; cursor: pointer; font-size: 14px; display: inline-block; margin-top: 10px;" onclick="addFAQ()">+ नया जोड़ें</div>
        </div>   
    </div>
    <br>
    {{-- <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <div id="signupFields" style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label for="signupEmail">साइनअप करने के लिए ईमेल दर्ज करें और लिस्टिंग अनुमोदन पर अधिसूचना प्राप्त करें
                </label>
                <input type="text" id="signupEmail" name="notificationEmail" placeholder="Enter email here..." style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
            <div style="flex: 1;">
                <label for="userName">उपयोगकर्ता नाम दर्ज करें</label>
                <input type="text" id="userName" name="userName" placeholder="Enter User Name" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
        </div>
        <div style="margin-top: 15px; margin-bottom: 15px;">
            <label>
                <input type="checkbox" id="existingAccountCheckbox" style="margin-right: 5px;">क्या आपके पास पहले से ही खाता है?
            </label>
        </div>
        <div id="accountFields" style="display: none; flex-direction: row; gap: 20px;">
            <div style="flex: 1;">
                <label for="email">ईमेल</label>
                <input type="type" id="email" name="email" placeholder="Enter your email" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
            <div style="flex: 1;">
                <label for="password">पासवर्ड</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
            </div>
        </div>
    </div> --}}
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <div style="margin-top: 15px; margin-bottom: 15px;">
            <label>
                <input type="checkbox" name="agree" id="existingAccountCheckbox" style="margin-right: 5px;">मैं नियमों और शर्तों से सहमत हूं।

            </label>
        </div>
        <button type="submit"  id="submit-btn" class="btn btn-primary">जमा करना</button>
    </div>
    </form>
    </div>
    @endsection
    @push('scripts')

    
  
   <script>
 document.getElementById('add-day-btn').addEventListener('click', () => {
    const container = document.getElementById('schedule-container');
    const firstSchedule = container.querySelector('.day-schedule');

    if (firstSchedule) {
        const newSchedule = firstSchedule.cloneNode(true);

        // Clear select and input values
        newSchedule.querySelectorAll('select, input').forEach(input => {
            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
                input.disabled = false;
            }
        });

        // Hide the second time slot
        const secondSlot = newSchedule.querySelector('.second-time-slot');
        secondSlot.style.display = 'none';

        // Append the new schedule
        container.appendChild(newSchedule);
    } else {
        console.error('Initial schedule not found.');
    }
});

// Toggle time inputs when 24 Hours checkbox is checked
document.addEventListener('change', (e) => {
    if (e.target.name === 'is_24_hours[]') {
        const parent = e.target.closest('.day-schedule');
        const timeInputs = parent.querySelectorAll('input[type="time"]');
        timeInputs.forEach(input => input.disabled = e.target.checked);
    }
});

// Show or hide the second time slot
document.addEventListener('change', (e) => {
    if (e.target.classList.contains('add-2nd-slot')) {
        const parent = e.target.closest('.day-schedule');
        const secondSlot = parent.querySelector('.second-time-slot');
        secondSlot.style.display = e.target.checked ? 'block' : 'none';
    }
});

// Remove a day schedule
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-day-btn')) {
        e.target.closest('.day-schedule').remove();
    }
});

// Collect and log schedules
document.getElementById('submit-btn').addEventListener('click', () => {
    const schedules = [];
    const container = document.getElementById('schedule-container');

    container.querySelectorAll('.day-schedule').forEach(schedule => {
        const day = schedule.querySelector('select[name="day[]"]').value;
        const openTime = schedule.querySelector('input[name="open_time[]"]').value;
        const closeTime = schedule.querySelector('input[name="close_time[]"]').value;
        const is24Hours = schedule.querySelector('input[name="is_24_hours[]"]').checked;

        let openTime2 = '';
        let closeTime2 = '';
        const secondSlot = schedule.querySelector('.second-time-slot');
        if (secondSlot && secondSlot.style.display !== 'none') {
            openTime2 = secondSlot.querySelector('input[name="open_time_2[]"]').value;
            closeTime2 = secondSlot.querySelector('input[name="close_time_2[]"]').value;
        }

        schedules.push({
            day,
            openTime: is24Hours ? '24 Hours' : openTime,
            closeTime: is24Hours ? '24 Hours' : closeTime,
            secondSlot: openTime2 && closeTime2 ? { openTime2, closeTime2 } : null,
        });
    });

    console.log(schedules);
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('addSocialMedia').addEventListener('click', function () {
    const socialMediaForm = document.querySelector('.social-media-row');

    // Create a new row for social media input
    const newRow = document.createElement('div');
    newRow.className = 'social-media-row';
    newRow.style.display = 'flex';
    newRow.style.alignItems = 'center';
    newRow.style.gap = '10px';
    newRow.style.marginBottom = '10px';

    // Create the select element for social media
    const select = document.createElement('select');
    select.name = 'socialId[]';
    select.required = true;
    select.style.flex = '1';
    select.style.padding = '8px';

    const defaultOption = document.createElement('option');
    defaultOption.selected = true;
    defaultOption.textContent = 'स्थान चुनें';
    select.appendChild(defaultOption);

    // Ensure the select element is appended to the DOM before populating
    newRow.appendChild(select);

    // Populate the select options dynamically
    fetch('/get-social-media') // Replace with your endpoint
        .then(response => response.json())
        .then(data => {
            data.forEach(social => {
                const option = document.createElement('option');
                option.value = social.id;
                option.textContent = social.name;
                select.appendChild(option);
            });
        });

    // Create the input field for description
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'socialDescription[]';
    input.placeholder = 'अपना लिंक या विवरण दर्ज करें';
    input.style.flex = '2';
    input.style.padding = '8px';

    // Append input to the new row
    newRow.appendChild(input);

    // Append the new row to the form
    socialMediaForm.parentNode.insertBefore(newRow, socialMediaForm.nextSibling);
});
    // FAQ Toggle
    const faqToggle = document.getElementById('featuresToggle');
    if (faqToggle) {
        faqToggle.addEventListener('change', function () {
            const faqSection = document.getElementById('faqSection');
            faqSection.style.display = this.checked ? 'block' : 'none';
        });
    }
});

// FAQ: Add new FAQ item
function addFAQ() {
    var faqSection = document.getElementById('faqSection');
    
    // Create new FAQ item
    var newFAQ = document.createElement('div');
    newFAQ.classList.add('faq-item');
    newFAQ.style.marginBottom = '10px';
    
    // Create input fields
    newFAQ.innerHTML = `
        <label>अक्सर पूछे जाने वाले प्रश्नों</label>
        <input type="text" name="faq" placeholder="Frequently Asked Questions" style="width: 100%; margin-bottom: 5px;">
        <textarea placeholder="Answer" name="answer" style="width: 100%; height: 60px;"></textarea>
    `;
    
    // Add the new FAQ item to the section
    faqSection.insertBefore(newFAQ, document.querySelector('.add-new'));
}

</script>
@endpush