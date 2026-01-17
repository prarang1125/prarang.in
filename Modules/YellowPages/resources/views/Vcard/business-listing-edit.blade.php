@extends('yellowpages::layout.vcard.vcard')
@section('title', __('formyp.edit_listing_breadcrumb'))
@section('content')

<div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ __('formyp.vcard_breadcrumb') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('vCard.listing-edit', $listing->id) }}"><i class="bx bx-list-ul"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('formyp.edit_listing_breadcrumb') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Header Section -->

    <div style="text-align: center;">
        <h1 class="position-relative z-index-1">{{ __('formyp.edit_listing_heading') }}</h1>
    </div>


    <!-- Main Form -->
    <form action="{{ route('vCard.listing-update', $listing->id) }}" id="listingForm" method="POST"
        enctype="multipart/form-data" class="form-container">
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
        <div class="form-section"
            style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5>{{ __('formyp.primary_listing_details') }}</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">{{ __('formyp.location') }}</label>
                <select id="location" name="location" class="form-select">
                    <option selected disabled>{{ __('formyp.select_location') }}</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ (old('legal_type_id', $listing->city_id) == $city->id) ?
                        'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="listingTitle" class="form-label">{{ __('formyp.listing_title') }}</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control"
                    value="{{ old('listing_title', $listing->listing_title) }}">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="hasTagline" {{ $listing->tagline ? 'checked' : '' }}
                onclick="toggleTaglineField()">
                <label class="form-check-label" for="hasTagline">{{ __('formyp.has_tagline') }}</label>
            </div>
            <div class="mb-3" id="taglineField" style="display: {{ $listing->tagline ? 'block' : 'none' }};">
                <label for="tagline" class="form-label">{{ __('formyp.tagline') }}</label>
                <input type="text" id="tagline" name="tagline" class="form-control"
                    value="{{ old('tagline', $listing->tagline) }}" placeholder="{{ __('formyp.enter_tagline') }}">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">{{ __('formyp.business_name') }}</label>
                    <input type="text" id="businessName" name="businessName" class="form-control"
                        placeholder="{{ __('formyp.enter_business_name') }}"
                        value="{{ old('businessName',$listing->business_name) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">{{ __('formyp.phone_number') }}</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control"
                        placeholder="{{ __('formyp.enter_primary_phone') }}"
                        value="{{ old('primaryPhone', $user->phone) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">{{ __('formyp.contact_name') }}</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control"
                        placeholder="{{ __('formyp.enter_primary_contact') }}"
                        value="{{ old('primaryContact', $user->name) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">{{ __('formyp.email_label') }}</label>
                    <input type="text" id="primaryEmail" name="primaryEmail" class="form-control"
                        placeholder="{{ __('formyp.enter_primary_email') }}"
                        value="{{ old('primaryEmail', $user->email) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">{{ __('formyp.business_type') }} *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="" disabled selected>{{ __('formyp.select_type') }}</option>
                        @foreach($company_legal_type as $Cl_type)
                        <option value="{{ $Cl_type->id }}" {{ old('businessType',$listing->legal_type_id) ==
                            $Cl_type->id ? 'selected' : '' }}>
                            {{ $Cl_type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">{{ __('formyp.employee_range') }} *</label>
                    <select id="employee_range" name="employees" class="form-select">
                        <option value="" disabled selected>{{ __('formyp.select_employee_count') }}</option>
                        @foreach($number_of_employees as $number_employee)
                        <option value="{{ $number_employee->id }}" {{ old('employees', $listing->employee_range_id) ==
                            $number_employee->id ? 'selected' : '' }}>
                            {{ $number_employee->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="turnover" class="form-label">{{ __('formyp.turnover') }} *</label>
                    <select id="turnover" name="turnover" class="form-select">
                        <option value="" disabled selected>{{ __('formyp.select_turnover') }}</option>
                        @foreach($monthly_turnovers as $turnovers)
                        <option value="{{ $turnovers->id }}" {{ old('turnover',$listing->turnover_id) == $turnovers->id
                            ? 'selected' : '' }}>
                            {{ $turnovers->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">{{ __('formyp.advertising') }}</label>
                    <select id="advertising" name="advertising" class="form-select">
                        <option value="" disabled selected>{{ __('formyp.select_advertising') }}</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                        <option value="{{ $advertising->id }}" {{ old('advertising',$listing->advertising_medium_id) ==
                            $advertising->id ? 'selected' : '' }}>
                            {{ $advertising->medium }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">{{ __('formyp.advertising_price') }}*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select">
                        <option value="" disabled selected>{{ __('formyp.select_advertising_price') }}</option>
                        @foreach($monthly_advertising_prices as $advertising)
                        <option value="{{ $advertising->id }}" {{ old('advertising_price',$listing->
                            advertising_price_id) == $advertising->id ? 'selected' : '' }}>
                            {{ $advertising->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">{{ __('formyp.category_and_services') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="display: flex; gap: 20px;">
                    <div style="flex: 1;">
                        <label for="state" class="form-label">{{ __('formyp.category') }} *</label>
                        <select id="state" class="form-select" name="category">
                            <option selected>{{ __('formyp.select_category_opt') }}</option>
                            @foreach($categories as $Cate)
                            <option value="{{ $Cate->id }}" {{
                                (old('advertising_medium_id ', $listing->category_id) == $Cate->id) ? ' selected' : ''
                                }}>
                                {{ $Cate->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br><br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">{{ __('formyp.more_info') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="margin-top: 15px;">
                    <label for="description">{{ __('formyp.description') }}</label>
                    <textarea id="description" name="description" rows="4"
                        style="width: 100%;">{{ old('description',$listing->description) }}</textarea>
                </div>
            </div>
            <br>
            <div
                style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
                <h5 style="margin-bottom: 15px; font-size: 18px; font-weight: bold;">{{ __('formyp.working_hours') }}
                </h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

                <!-- Schedule Container -->
                <div id="schedule-container">
                    @if($listinghours->isNotEmpty())
                    @foreach($listinghours as $hour)
                    <div class="day-schedule">
                        <select name="day[]" class="day-select">
                            <option value="">{{ __('formyp.select_day') }}</option>
                            <option value="monday" {{ $hour->day == 'monday' ? 'selected' : '' }}>{{ __('formyp.monday')
                                }}</option>
                            <option value="tuesday" {{ $hour->day == 'tuesday' ? 'selected' : '' }}>{{
                                __('formyp.tuesday') }}</option>
                            <option value="wednesday" {{ $hour->day == 'wednesday' ? 'selected' : '' }}>{{
                                __('formyp.wednesday') }}</option>
                            <option value="thursday" {{ $hour->day == 'thursday' ? 'selected' : '' }}>{{
                                __('formyp.thursday') }}</option>
                            <option value="friday" {{ $hour->day == 'friday' ? 'selected' : '' }}>{{ __('formyp.friday')
                                }}</option>
                            <option value="saturday" {{ $hour->day == 'saturday' ? 'selected' : '' }}>{{
                                __('formyp.saturday') }}</option>
                            <option value="sunday" {{ $hour->day == 'sunday' ? 'selected' : '' }}>{{ __('formyp.sunday')
                                }}</option>
                        </select>

                        <input type="time" name="open_time[]" class="time-input" value="{{ $hour->open_time }}">
                        <label>to</label>
                        <input type="time" name="close_time[]" class="time-input" value="{{ $hour->close_time }}">

                        {{-- <label>
                            <input type="checkbox" name="is_24_hours[]" class="is-24-hours" value="0" {{
                                $hour->is_24_hours ? 'checked' : '' }}> 24 घंटे
                        </label> --}}

                        <label>
                            <input type="checkbox" class="add-2nd-slot" {{ $hour->open_time_2 ? 'checked' : '' }}> {{
                            __('formyp.add_second_slot') }}
                        </label>

                        <button type="button" class="remove-day-btn">&#x2716;</button>

                        <!-- Second Time Slot -->
                        <div class="second-time-slot"
                            style="display: {{ $hour->open_time_2 ? 'block' : 'none' }}; margin-top: 10px;">
                            <input type="time" name="open_time_2[]" class="time-input" value="{{ $hour->open_time_2 }}">
                            <label>to</label>
                            <input type="time" name="close_time_2[]" class="time-input"
                                value="{{ $hour->close_time_2 }}">
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>{{ __('formyp.no_working_hours') }}</p>
                    @endif
                </div>

                <!-- Add New Day Button -->
                <button type="button" id="add-day-btn">{{ __('formyp.add_day') }}</button>
            </div>

            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">{{ __('formyp.business_address') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

                <div style="margin-bottom: 10px;">
                    <label for="business_address">{{ __('formyp.business_address') }} :</label>
                    <input type="text" id="business_address" name="business_address"
                        placeholder="{{ __('formyp.enter_business_address') }}" style="width: 100%; padding: 8px;"
                        value="{{ old('business_address', $listing->business_address ?? '') }}">
                </div>


                <h5 style="margin-bottom: 15px;">{{ __('formyp.contact_info') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

                <div style="margin-bottom: 10px;">
                    <label for="website">{{ __('formyp.website') }}</label>
                    <input type="url" id="website" name="website" placeholder="{{ __('formyp.enter_website') }}"
                        style="width: 100%; padding: 8px;" value="{{ old('website', $listing->website ?? '') }}">
                </div>
            </div>
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">{{ __('formyp.social_media_links') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

                <div id="social-media-container">
                    @if(!empty($social_media_data) && count($social_media_data) > 0)
                    @foreach($social_media_data as $data)
                    <div class="social-media-row"
                        style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <select name="socialId[]" style="flex: 1; padding: 8px;">
                            <option value="">स्थान चुनें</option>
                            @foreach($social_media as $social)
                            <option value="{{ $social->id }}" @if(isset($data->social_id) && $data->social_id ==
                                $social->id) selected @endif>
                                {{ $social->name }}
                            </option>
                            @endforeach
                        </select>
                        <input type="text" name="socialDescription[]" value="{{ $data->description ?? '' }}"
                            placeholder="{{ __('formyp.enter_link_desc') }}" style="flex: 2; padding: 8px;">
                        <button type="button" class="removeSocialMedia"
                            style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer;">-</button>
                    </div>
                    @endforeach
                    @else
                    <div class="social-media-row"
                        style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <select name="socialId[]" style="flex: 1; padding: 8px;">
                            <option value="">{{ __('formyp.select_social_media') }}</option>
                            @foreach($social_media as $social)
                            <option value="{{ $social->id }}">{{ $social->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="socialDescription[]" placeholder="{{ __('formyp.enter_link_desc') }}"
                            style="flex: 2; padding: 8px;">
                        <button type="button" class="removeSocialMedia"
                            style="padding: 10px; background-color: red; color: white; border: none; cursor: pointer;">-</button>
                    </div>
                    @endif
                </div>

                <!-- Add Button -->
                <button type="button" id="addSocialMedia"
                    style="padding: 10px; background-color: green; color: white; border: none; cursor: pointer; margin-top: 10px;">+</button>
            </div>
            <br>
            <div
                style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
                <h5 style="margin-bottom: 15px;">{{ __('formyp.media') }}</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>

                <!-- Single Image Upload -->
                <div
                    style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px;">
                    <input type="file" id="imageUpload" name="image" style="display: block; margin-top: 10px;"
                        onchange="previewImage(event, 'previewImage')">

                    <!-- Show Old Image if Exists -->
                    <img id="previewImage" {{--
                        src="{{ $listing->business_img ? asset('storage/'.$listing->business_img) : '' }}" --}}
                        src="{{ Storage::url($listing->business_img ?? 'default.jpg') }}" alt="Uploaded Image"
                        style="margin-top: 10px; max-width: 100px; border: 1px solid #ddd; {{ $listing->business_img ? '' : 'display: none;' }}">

                </div>
            </div>

            <br>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">{{ __('formyp.update_listing_btn') }}</button>
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
                <option value="">{{ __('formyp.select_day') }}</option>
                <option value="monday">{{ __('formyp.monday') }}</option>
                <option value="tuesday">{{ __('formyp.tuesday') }}</option>
                <option value="wednesday">{{ __('formyp.wednesday') }}</option>
                <option value="thursday">{{ __('formyp.thursday') }}</option>
                <option value="friday">{{ __('formyp.friday') }}</option>
                <option value="saturday">{{ __('formyp.saturday') }}</option>
                <option value="sunday">{{ __('formyp.sunday') }}</option>
            </select>
            <input type="time" name="open_time[]" class="time-input">
            <label>to</label>
            <input type="time" name="close_time[]" class="time-input">
         
            <label>
                <input type="checkbox" class="add-2nd-slot"> {{ __('formyp.add_2nd_slot') }}
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
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("listingForm").addEventListener("submit", function (event) {
        document.querySelectorAll('input[name="is_24_hours[]"]').forEach(checkbox => {
            let hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = checkbox.name; 
            hiddenInput.value = checkbox.checked ? "yes" : "no";
            this.appendChild(hiddenInput);
            checkbox.remove(); 
        });
    });
});


// Collect and log schedules
document.getElementById('submit-btn')?.addEventListener('click', () => {
    const schedules = [];
    document.querySelectorAll('.day-schedule').forEach(schedule => {
        const day = schedule.querySelector('.day-select').value;
        const openTime = schedule.querySelector('input[name="open_time[]"]').value;
        const closeTime = schedule.querySelector('input[name="close_time[]"]').value;
        const is24Hours = schedule.querySelector('.is-24-hours').checked;
        let openTime2 = '', closeTime2 = '';
        const secondSlot = schedule.querySelector('.second-time-slot');
        if (secondSlot.style.display !== 'none') {
            openTime2 = secondSlot.querySelector('input[name="open_time_2[]"]').value;
            closeTime2 = secondSlot.querySelector('input[name="close_time_2[]"]').value;
        }

        schedules.push({
            day,
            openTime: is24Hours ? '24 Hours' : openTime,
            closeTime: is24Hours ? '24 Hours' : closeTime,
            is24Hours: is24Hours ? 1 : 0, // Set is_24_hours correctly // added the is24Hours to the object.
            secondSlot: openTime2 && closeTime2 ? { openTime2, closeTime2 } : null,
        });
    });

    console.log(schedules);
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
        console.log(container);
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
        defaultOption.text = "{{ __('formyp.select_social_media') }}";
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
        input.placeholder = "{{ __('formyp.enter_link_desc') }}";
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