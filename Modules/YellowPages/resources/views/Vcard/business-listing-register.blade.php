@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Business Listing')
@section('content')
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h5 style="text-align: center;">अपनी सूची जोड़ें</h5>
        <p style="text-align: center;  margin-bottom: 20px;">अपनी लिस्टिंग के बारे में विवरण जोड़ें</p>
    </div>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
  <form action="{{ route('yp.listing.store') }}" method="POST" id="listingForm" enctype="multipart/form-data">    
            @csrf

            <h5 style="margin-bottom: 15px;">प्राथमिक सूची विवरण</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">जगह</label>
                <select id="location" class="form-select {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location">
                    <option selected disabled>स्थान चुनें</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" 
                            {{ old('location', $user->city_id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('location')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>            
            <div class="mb-3">
                <label for="listingTitle" class="form-label">लिस्टिंग शीर्षक</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control {{ $errors->has('listingTitle') ? 'is-invalid' : '' }}" value="{{ old('listingTitle') }}">
                @error('listingTitle')
               <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>            
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="hasTagline" onclick="document.getElementById('taglineField').style.display = this.checked ? 'block' : 'none'">
                <label class="form-check-label" for="hasTagline">
                    क्या आपके व्यवसाय की कोई टैगलाइन है?
                </label>
            </div>
            <div class="mb-3" id="taglineField" style="display: none;">
                <label for="tagline" class="form-label">टैगलाइन</label>
                <input type="text" id="tagline" name="tagline" class="form-control" placeholder="टैगलाइन दर्ज करें" value ="{{ old('tagline')}}">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">व्यवसाय/कंपनी का नाम</label>
                    <input type="text" id="businessName" name="businessName" class="form-control {{ $errors->has('businessName') ? 'is-invalid' : '' }}" placeholder="व्यवसाय का नाम दर्ज करें" value="{{ old('businessName') }}">
                    @error('businessName')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">फ़ोन नंबर</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control {{ $errors->has('primaryPhone') ? 'is-invalid' : '' }}" placeholder="प्राथमिक फ़ोन दर्ज करें" value="{{ old('primaryPhone', $user->phone) }}">
                    @error('primaryPhone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">संपर्क नाम</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control {{ $errors->has('primaryContact') ? 'is-invalid' : '' }}" placeholder="प्राथमिक संपर्क नाम दर्ज करें" value="{{ old('primaryContact', $user->name) }}">
                    @error('primaryContact')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">ईमेल</label>
                    <input type="text" id="primaryEmail" name="primaryEmail" class="form-control {{ $errors->has('primaryEmail') ? 'is-invalid' : '' }} " placeholder="प्राथमिक ईमेल दर्ज करें" value="{{ old('primaryEmail', $user->email) }}">
                    @error('primaryEmail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">व्यवसाय/कंपनी कानूनी प्रकार *</label>
                    <select id="businessType" name="businessType" class="form-select {{ $errors->has('businessType') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>प्रकार चुनें</option>
                        @foreach($company_legal_type as $Cl_type)
                            <option value="{{ $Cl_type->id }}" {{ old('businessType') == $Cl_type->id ? 'selected' : '' }}>
                                {{ $Cl_type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('businessType')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">व्यवसाय/कंपनी कर्मचारियों की संख्या (लगभग) *</label>
                    <select id="employee_range" name="employees" class="form-select {{ $errors->has('employees') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>कर्मचारियों की संख्या चुनें</option>
                        @foreach($number_of_employees as $number_employee)
                            <option value="{{ $number_employee->id }}" {{ old('employee_range') == $number_employee->id ? 'selected' : '' }}>
                                {{ $number_employee->range }}
                            </option>
                        @endforeach
                    </select>
                    @error('employees')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="turnover" class="form-label">व्यवसाय/कंपनी का मासिक कारोबार (लगभग)*</label>
                    <select id="turnover" name="turnover" class="form-select  {{ $errors->has('turnover') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>टर्नओवर(Turnover) चुनें</option>
                        @foreach($monthly_turnovers as $turnovers)
                            <option value="{{ $turnovers->id }}" {{ old('turnover') == $turnovers->id ? 'selected' : '' }}>
                                {{ $turnovers->range }}
                            </option>
                        @endforeach
                    </select>
                    @error('turnover')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">व्यवसाय/कंपनी मासिक विज्ञापन (मध्यम)</label>
                    <select id="advertising" name="advertising" class="form-select  {{ $errors->has('advertising') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>विज्ञापन का चयन करें</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                            <option value="{{ $advertising->id }}" {{ old('advertising') == $advertising->id ? 'selected' : '' }}>
                                {{ $advertising->medium }}
                            </option>
                        @endforeach
                    </select>
                    @error('advertising')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">व्यवसाय/कंपनी विज्ञापन (मध्यम) मूल्य*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select  {{ $errors->has('advertising_price') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>विज्ञापन मूल्य चुनें</option>
                        @foreach($monthly_advertising_prices as $advertising)
                            <option value="{{ $advertising->id }}" {{ old('advertising_price') == $advertising->id ? 'selected' : '' }}>
                                {{ $advertising->range }}
                            </option>
                        @endforeach
                    </select>
                    @error('advertising_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    </div>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">श्रेणी और सेवाएँ</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="display: flex; gap: 20px;">
            <div style="flex: 1;">
                <label for="category" class="form-label">वर्ग *</label>
                <select id="category" class="form-select  {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                    <option value="" disabled selected>श्रेणी चुनें</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category', $vcard->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>            
        </div>
    </div>
    <br><br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">और जानकारी</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
        <div style="margin-top: 15px;">
            <label for="description">विवरण</label>
            <textarea id="description" name="description" rows="4" style="width: 100%;">{{ old('description') }}</textarea>
        </div>
    </div>
    <br>
    <br>
    
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
        <h5 style="margin-bottom: 15px; font-size: 18px; font-weight: bold;">काम करने के घंटे</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
    
        <!-- Schedule Container -->
        <div id="schedule-container">
            <div class="day-schedule" style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
                <select name="day[]" class="day-select" style="flex: 1; min-width: 100px; padding: 5px;">
                    <option value="">-- दिन चुनें --</option>
                    <option value="monday">सोमवार</option>
                    <option value="tuesday">मंगलवार</option>
                    <option value="wednesday">बुधवार</option>
                    <option value="thursday">गुरुवार</option>
                    <option value="friday">शुक्रवार</option>
                    <option value="saturday">शनिवार</option>
                    <option value="sunday">रविवार</option>
                </select>
    
                <input type="time" name="open_time[]" class="time-input" style="flex: 1; padding: 5px;">
                <label>to</label>
                <input type="time" name="close_time[]" class="time-input" style="flex: 1; padding: 5px;">
    
                <label style="white-space: nowrap;">
                    <input type="checkbox" name ="is_24_hours[]" class="is-24-hours"> 24 घंटे
                </label>
                <label style="white-space: nowrap;">
                    <input type="checkbox" class="add-2nd-slot"> दूसरा स्लॉट जोड़ें
                </label>
                <button type="button" class="remove-day-btn" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">&#x2716;</button>
    
                <!-- Second Time Slot -->
                <div class="second-time-slot" style="display: none; margin-top: 10px; width: 100%;">
                    <input type="time" name="open_time_2[]" class="time-input" style="flex: 1; padding: 5px;">
                    <label>to</label>
                    <input type="time" name="close_time_2[]" class="time-input" style="flex: 1; padding: 5px;">
                </div>
            </div>
        </div>
    
        <!-- Add New Day Button -->
        <button type="button" id="add-day-btn">+ Add Day</button>
    </div>                
    
        
    <br>
    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
        <h5 style="margin-bottom: 15px;">व्यवसाय/कंपनी का पता</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
    
        <div style="margin-bottom: 10px;">
            <label for="street">व्यवसाय/कंपनी का पता (सड़क/गली):</label>
            <input type="text" id="street" name="street" placeholder="सड़क/गली का नाम दर्ज करें" style="width: 100%; padding: 8px; border: 1px solid {{ $errors->has('street') ? 'red' : '#ccc' }};" value="{{ old('street', $address->street ?? '') }}">
        
            @if ($errors->has('street'))
            <div style="color: red; font-size: 14px; margin-top: 5px;">
                {{ $errors->first('street') }}
            </div>
            @endif
        </div>
    
        <div style="margin-bottom: 10px;">
            <label for="area_name">क्षेत्र/इलाका:</label>
            <input type="text" id="area_name" name="area_name" placeholder="क्षेत्र का नाम दर्ज करें" style="width: 100%; padding: 8px; border: 1px solid {{ $errors->has('street') ? 'red' : '#ccc' }};" value="{{ old('area_name', $address->area_name ?? '') }}">
            @if ($errors->has('area_name'))
            <div style="color: red; font-size: 14px; margin-top: 5px;">
                {{ $errors->first('area_name') }}
            </div>
        @endif       
        </div>
    
        <div style="margin-bottom: 10px;">
            <label for="house_number">भवन संख्या:</label>
            <input type="text" id="house_number" name="house_number" placeholder="भवन संख्या दर्ज करें" style="width: 100%; padding: 8px; border: 1px solid {{ $errors->has('street') ? 'red' : '#ccc' }};" value="{{ old('house_number', $address->house_number ?? '') }}">
            @if ($errors->has('house_number'))
            <div style="color: red; font-size: 14px; margin-top: 5px;">
                {{ $errors->first('house_number') }}
            </div>
            @endif 
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
            <input type="url" id="website" name="website" placeholder="वेबसाइट का नाम दर्ज करें" style="width: 100%; padding: 8px;" value="{{ old('website', $user->website ?? '') }}">
        </div>
    </div>      
    <br>
    <div style="width: 100%; max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-sizing: border-box;">
        <h5 style="margin-bottom: 15px;">सोशल मीडिया लिंक</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
    
        <div id="social-media-container">
            @if(!empty($social_media_data) && count($social_media_data) > 0)
                @foreach($social_media_data as $data)
                    <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; flex-wrap: nowrap; width: 100%; box-sizing: border-box;">
                        <select name="socialId[]" style="flex: 1; min-width: 100px; padding: 8px; box-sizing: border-box; width: 100%;">
                            <option value="">स्थान चुनें</option>
                            @foreach($social_media as $social)
                                <option value="{{ $social->id }}" 
                                    @if(isset($data->social_id) && $data->social_id == $social->id) selected @endif>
                                    {{ $social->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="socialDescription[]" value="{{ $data->description ?? '' }}" placeholder="अपना लिंक या विवरण दर्ज करें" 
                               style="flex: 2; min-width: 180px; padding: 8px; box-sizing: border-box; width: 100%;">
                        <button type="button" class="removeSocialMedia" 
                                style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer; flex-shrink: 0;">-</button>
                    </div>
                @endforeach
            @else
                <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; flex-wrap: nowrap; width: 100%; box-sizing: border-box;">
                    <select name="socialId[]" style="flex: 1; min-width: 100px; padding: 8px; box-sizing: border-box; width: 100%;">
                        <option value="">स्थान चुनें</option>
                        @foreach($social_media as $social)
                            <option value="{{ $social->id }}">{{ $social->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="socialDescription[]" placeholder="अपना लिंक या विवरण दर्ज करें" 
                           style="flex: 2; min-width: 180px; padding: 8px; box-sizing: border-box; width: 100%;">
                    <button type="button" class="removeSocialMedia" 
                            style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer; flex-shrink: 0;">-</button>
                </div>
            @endif
        </div>
    
        <!-- Add Button -->
        <button type="button" id="addSocialMedia" 
                style="padding: 10px; background-color: green; color: white; border: none; cursor: pointer; margin-top: 10px;">+</button>
    </div>    

    <br>
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
        <h5 style="margin-bottom: 15px;">मिडिया</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px; "></div>
        
        <!-- Single Image Upload -->
        <div style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px; border: 1px solid {{ $errors->has('street') ? 'red' : '#ccc' }}">
            <input type="file" id="imageUpload" name="image" style="display: block; margin-top: 10px; " onchange="previewImage(event, 'previewImage')">
            <img id="previewImage" src="" alt="Uploaded Image" style="display: none; margin-top: 10px; max-width: 100px; border: 1px solid #ddd;">
        </div>

        @error('image')
        <div style="color: red; font-size: 14px; margin-top: 5px;">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
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
    function toggleTaglineField() {
        const taglineField = document.getElementById('taglineField');
        taglineField.style.display = taglineField.style.display === 'none' ? 'block' : 'none';
    }

    document.getElementById('add-day-btn').addEventListener('click', () => {
    const container = document.getElementById('schedule-container');
    const firstSchedule = container.querySelector('.day-schedule');

    if (firstSchedule) {
        // Clone an existing schedule
        const newSchedule = firstSchedule.cloneNode(true);

        // Reset values for cloned inputs
        newSchedule.querySelectorAll('select, input').forEach(input => {
            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
                input.disabled = false;
            }
        });

        // Hide second slot in the new schedule
        newSchedule.querySelector('.second-time-slot').style.display = 'none';

        // Append new schedule
        container.appendChild(newSchedule);
    } else {
        // Create a new schedule if none exist
        const newSchedule = document.createElement('div');
        newSchedule.classList.add('day-schedule');

        newSchedule.innerHTML = `
            <select name="day[]" class="day-select">
                <option value="">-- दिन चुनें --</option>
                <option value="monday">सोमवार</option>
                <option value="tuesday">मंगलवार</option>
                <option value="wednesday">बुधवार</option>
                <option value="thursday">गुरुवार</option>
                <option value="friday">शुक्रवार</option>
                <option value="saturday">शनिवार</option>
                <option value="sunday">रविवार</option>
            </select>
            <input type="time" name="open_time[]" class="time-input">
            <label>to</label>
            <input type="time" name="close_time[]" class="time-input">
            <label>
                <input type="checkbox" name="is_24_hours[]" class="is-24-hours"> 24 घंटे
            </label>
            <label>
                <input type="checkbox" class="add-2nd-slot"> दूसरा स्लॉट जोड़ें
            </label>
            <button type="button" class="remove-day-btn">&#x2716;</button>
            
            <!-- Second Time Slot -->
            <div class="second-time-slot" style="display: none; margin-top: 10px;">
                <input type="time" name="open_time_2[]" class="time-input">
                <label>to</label>
                <input type="time" name="close_time_2[]" class="time-input">
            </div>
        `;

        container.appendChild(newSchedule);
    }
});

// Handle 24-hour checkbox toggle
document.addEventListener('change', (e) => {
    if (e.target.classList.contains('is-24-hours')) {
        const parent = e.target.closest('.day-schedule');
        parent.querySelectorAll('.time-input').forEach(input => {
            input.disabled = e.target.checked;
        });
    }
});

// Show or hide the second time slot
document.addEventListener('change', (e) => {
    if (e.target.classList.contains('is-24-hours')) {
        const parent = e.target.closest('.day-schedule');

        // Disable or enable time inputs based on checkbox state
        parent.querySelectorAll('.time-input').forEach(input => {
            input.disabled = e.target.checked;
            if (e.target.checked) input.value = ''; // Clear input when disabled
        });
    }

});

// Remove a day schedule
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-day-btn')) {
        e.target.closest('.day-schedule').remove();
    }
});

// Collect and log schedules
document.getElementById('submit-btn')?.addEventListener('click', () => {
    const schedules = [];
    document.querySelectorAll('.day-schedule').forEach(schedule => {
        const day = schedule.querySelector('.day-select').value;
        const is24Hours = schedule.querySelector('.is-24-hours').checked; // true or false

        // Get time values (only if 24-hour mode is NOT selected)
        let openTime = schedule.querySelector('input[name="open_time[]"]').value;
        let closeTime = schedule.querySelector('input[name="close_time[]"]').value;
        let openTime2 = '', closeTime2 = '';

        if (is24Hours) {
            openTime = "24 Hours"; 
            closeTime = "24 Hours";
        } else {
            const secondSlot = schedule.querySelector('.second-time-slot');
            if (secondSlot.style.display !== 'none') {
                openTime2 = secondSlot.querySelector('input[name="open_time_2[]"]').value;
                closeTime2 = secondSlot.querySelector('input[name="close_time_2[]"]').value;
            }
        }

        schedules.push({
            day,
            openTime,
            closeTime,
            is24Hours: is24Hours ? "1" : "0", // Convert to string for clarity
            secondSlot: openTime2 && closeTime2 ? { openTime2, closeTime2 } : null,
        });
    });

    console.log(schedules); // Check output
});

document.addEventListener("DOMContentLoaded", function() {
    let socialMediaData = {!! json_encode($social_media) !!}; 

    document.getElementById("addSocialMedia").addEventListener("click", function() {
        let container = document.getElementById("social-media-container");
        let newRow = document.createElement("div");
        newRow.classList.add("social-media-row");
        newRow.style.display = "flex";
        newRow.style.alignItems = "center";
        newRow.style.gap = "10px";
        newRow.style.marginBottom = "10px";
        newRow.style.flexWrap = "nowrap";
        newRow.style.width = "100%";
        newRow.style.boxSizing = "border-box";

        let select = document.createElement("select");
        select.name = "socialId[]";
        select.style.flex = "1";
        select.style.minWidth = "100px";
        select.style.padding = "8px";
        select.style.boxSizing = "border-box";
        select.style.width = "100%";

        let defaultOption = document.createElement("option");
        defaultOption.text = "स्थान चुनें";
        defaultOption.value = "";
        select.appendChild(defaultOption);

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
        input.style.minWidth = "180px";
        input.style.padding = "8px";
        input.style.boxSizing = "border-box";
        input.style.width = "100%";

        let removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.textContent = "-";
        removeButton.style.padding = "10px";
        removeButton.style.backgroundColor = "red";
        removeButton.style.color = "white";
        removeButton.style.border = "none";
        removeButton.style.cursor = "pointer";
        removeButton.style.flexShrink = "0";

        removeButton.addEventListener("click", function() {
            newRow.remove();
        });

        newRow.appendChild(select);
        newRow.appendChild(input);
        newRow.appendChild(removeButton);
        container.appendChild(newRow);
    });

    document.querySelectorAll(".removeSocialMedia").forEach(button => {
        button.addEventListener("click", function() {
            this.parentElement.remove();
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    function previewImage(event, previewId) {
        var input = event.target;
        var preview = document.getElementById(previewId);
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById("imageUpload").addEventListener("change", function(event) {
        previewImage(event, "previewImage");
    });

    document.getElementById("coverImage").addEventListener("change", function(event) {
        previewImage(event, "coverPreview");
    });

    document.getElementById("logo").addEventListener("change", function(event) {
        previewImage(event, "logoPreview");
    });
});

</script>
@endpush