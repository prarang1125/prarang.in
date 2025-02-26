@extends('yellowpages::layout.admin.admin')
@section('title', 'Approve Business Listing')
@section('content')

<div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">व्यवस्थापक</div>
    </div>

    <!-- Main Form -->
    <form action="{{ route('checker.listing-approval-status', $listing->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

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
                <label class="form-check-label" for="hasTagline">क्या आपके व्यवसाय की कोई टैगलाइन है?
                </label>
            </div>
            <div class="mb-3" id="taglineField" style="display: {{ $listing->tagline ? 'block' : 'none' }};">
                <label for="tagline" class="form-label">टैगलाइन</label>
                <input type="text" id="tagline" name="tagline" class="form-control" value="{{ old('tagline', $listing->tagline) }}" placeholder="Enter tagline">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">व्यवसाय/कंपनी का नाम</label>
                    <input type="text" id="businessName" name="businessName" class="form-control" value="{{ old('business_name', $listing->business_name) }}" placeholder="Enter business name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessAddress" class="form-label">व्यवसाय/कंपनी का पता</label>
                    <input type="text" id="businessAddress" name="businessAddress" class="form-control" value="{{ old('business_address', $listing->business_address) }}" placeholder="Enter business address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">प्राथमिक फ़ोन नंबर</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control" value="{{ old('primary_phone', $listing->primary_phone) }}" placeholder="Enter primary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryPhone" class="form-label">द्वितीय फ़ोन नंबर</label>
                    <input type="text" id="secondaryPhone" name="secondary_phone" class="form-control" value="{{ old('secondary_phone', $listing->secondary_phone) }}" placeholder="Enter secondary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">प्राथमिक संपर्क नाम</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control" value="{{ old('primary_contact_name', $listing->primary_contact_name) }}"placeholder="Enter primary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">प्राथमिक संपर्क ईमेल</label>
                    <input type="email" id="primaryEmail" name="primaryEmail" class="form-control" value="{{ old('primary_contact_email', $listing->primary_contact_email) }}" placeholder="Enter primary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryContact" class="form-label">द्वितीयक संपर्क नाम</label>
                    <input type="text" id="secondaryContact" name="secondaryContactName" class="form-control" value="{{ old('secondary_contact_name', $listing->secondary_contact_name) }}" placeholder="Enter secondary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryEmail" class="form-label">द्वितीयक संपर्क ईमेल</label>
                    <input type="email" id="secondaryEmail" name="secondaryEmail" class="form-control"  value="{{ old('secondary_contact_email', $listing->secondary_contact_email) }}" placeholder="Enter secondary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">व्यवसाय/कंपनी कानूनी प्रकार *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="">प्रकार चुनें</option>
                        @foreach($company_legal_types as $Cl_type)
                            <option value="{{ $Cl_type->id }}" 
                                {{ (old('legal_type_id', $listing->legal_type_id) == $Cl_type->id) ? 'selected' : '' }}>
                                {{ $Cl_type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>                
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">व्यवसाय/कंपनी कर्मचारियों की संख्या (लगभग) *</label>
                    <select id="employee_range" name="employees" class="form-select">
                        <option selected>कर्मचारियों की संख्या चुनें</option>
                        @foreach($number_of_employees as $number_employee)
                        <option value="{{ $number_employee->id }}" 
                            {{ (old('employee_range_id', $listing->employee_range_id) == $number_employee->id) ? 'selected' : '' }}>
                            {{ $number_employee->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trunover" class="form-label">व्यवसाय/कंपनी का मासिक कारोबार (लगभग) *</label>
                    <select id="trunover" name="turnover" class="form-select">
                        <option selected>टर्नओवर चुनें</option>
                        @foreach($monthly_turnovers as $turnovers)
                        <option value="{{ $turnovers->id }}" 
                            {{ (old('turnover_id', default: $listing->turnover_id) == $turnovers->id) ? 'selected' : '' }}>
                            {{ $turnovers->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">व्यवसाय/कंपनी मासिक विज्ञापन (मध्यम)</label>
                    <select id="advertising" name="advertising" class="form-select">
                        <option selected>विज्ञापन का चयन करें</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                        <option value="{{ $advertising->id }}" 
                            {{ (old('advertising_medium_id ', $listing->advertising_medium_id) == $advertising->id) ? 'selected' : '' }}>
                            {{ $advertising->medium}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">व्यवसाय/कंपनी विज्ञापन (मध्यम) मूल्य*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select">
                        <option selected>विज्ञापन मूल्य चुनें</option>
                        @foreach($monthly_advertising_prices as $advertising)
                        <option value="{{ $advertising->id }}" 
                            {{ (old('advertising_medium_id ', $listing->advertising_price_id) == $advertising->id) ? 'selected' : '' }}>
                            {{ $advertising->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5 style="margin-bottom: 15px;">पता विवरण</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="display: flex; gap: 20px;">
                <!-- Pin Code Field -->
                <div style="flex: 1;">
                    <label for="pincode" class="form-label">पिन कोड</label>
                    <input type="text" id="pincode" name="pincode" class="form-control" value="{{ old('primary_contact_email', $listing->pincode) }}" placeholder="Enter Pin Code">
                </div>
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
        <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5 style="margin-bottom: 15px;">और जानकारी</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="margin-top: 15px;">
                <label for="description">विवरण</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter description here..." style="width: 100%;">{{ old('description', $listing->description) }}</textarea>
            </div>
            
            <div style="margin-top: 15px;">
                <label for="tags_keywords">टैग या कीवर्ड (अल्पविराम से अलग)</label>
                <textarea id="tags_keywords" name="tags_keywords" rows="4" placeholder="Enter Tags or Keywords (Comma Separated)" style="width: 100%;">{{ old('tags_keywords', $listing->tags_keywords) }}</textarea>
            </div>            
        </div>
            <br>
            <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
                <h5 style="margin-bottom: 15px; font-size: 18px; font-weight: bold;">काम करने के घंटे</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                <!-- Schedule Container -->
                <div id="schedule-container">
                    @foreach($listinghours as $hour)
                        <div class="day-schedule">
                            <select name="day[]" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px; width: 120px;">
                                <option value="">-- दिन चुनें --</option>
                                <option value="monday" {{ $hour->day == 'monday' ? 'selected' : '' }}>सोमवार</option>
                                <option value="tuesday" {{ $hour->day == 'tuesday' ? 'selected' : '' }}>मंगलवार</option>
                                <option value="wednesday" {{ $hour->day == 'wednesday' ? 'selected' : '' }}>बुधवार</option>
                                <option value="thursday" {{ $hour->day == 'thursday' ? 'selected' : '' }}>गुरुवार</option>
                                <option value="friday" {{ $hour->day == 'friday' ? 'selected' : '' }}>शुक्रवार</option>
                                <option value="saturday" {{ $hour->day == 'saturday' ? 'चयनित' : '' }}>शनिवार</option>
                                <option value="sunday" {{ $hour->day == 'sunday' ? 'चयनित' : '' }}>रविवार</option>
                            </select>
                            <input type="time" name="open_time[]" value="{{ $hour->open_time }}" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
                            <label style="font-weight: bold;">to</label>
                            <input type="time" name="close_time[]" value="{{ $hour->close_time }}" style="padding: 5px; border: 1px solid #ccc; border-radius: 3px;">
            
                            <label>
                                <input type="checkbox" name="is_24_hours[]" {{ $hour->is_24_hours ? 'checked' : '' }} style="cursor: pointer;"> 24 घंटे

                            </label>
            
                            <button type="button" class="remove-day-btn" style="background: none; border: none; color: red; font-size: 16px; cursor: pointer;">&#x2716;</button>
                        </div>
                    @endforeach
                </div>
            
                <!-- Add New Day Button -->
                <button type="button" id="add-day-btn" style="margin-top: 10px; padding: 8px 12px; background: #007bff; color: #fff; border: none; border-radius: 3px; cursor: pointer; font-size: 14px;">+ Add Day</button>
            </div>
            
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">पते की जानकारी</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="margin-bottom: 10px;">
                    <label for="street_address">Full Address:</label>
                    <input type="text" id="street_address" name="fullAddress"  value="{{ old('primary_contact_email', $listing->full_address) }}" placeholder="123 Main St" style="width: 100%; padding: 8px;">
                </div>
               
                <h5 style="margin-bottom: 15px;">संपर्क जानकारी</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="margin-bottom: 10px;">
                    <label for="website">वेबसाइट:</label>
                    <input type="url" id="website" name="website" value="{{ old('primary_contact_email', $listing->website) }}" placeholder="https://example.com" style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="phone">फ़ोन:</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('primary_contact_email', $listing->phone) }}" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="whatsapp">व्हाट्सएप:</label>
                    <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('primary_contact_email', $listing->whatsapp) }}"  placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
                </div>
            </div>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">सोशल मीडिया लिंक</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                    <select id="social_media" name="socialId" required style="flex: 1; padding: 8px;">
                    <option selected>Select location</option>
                            @foreach($social_media as $social)
                            <option value="{{ $social->id }}" 
                                {{ (old('advertising_medium_id', $listing->social_id) == $social->id) ? 'selected' : '' }}>
                                {{ $social->name }}
                    </option>
                            @endforeach
                    </select>
                    <input type="text" id="description" name="socialDescription" placeholder="Enter your link or details" style="flex: 2; padding: 8px;">
                    {{-- <button type="button" id="addSocialMedia" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                        +
                    </button> --}}
                </div>
            </div>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
                <h5 style="margin-bottom: 15px;">मिडिया</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            
                {{-- Image Upload --}}
                <div style="border: 1px dashed #ddd; padding: 20px; text-align: center; color: #888; margin-bottom: 10px;">
                     <label for="businessImage" class="form-label">व्यवसाय छवि</label>
                    <input type="file" name="image" style="display: block; margin-top: 10px;">
                    <div style="margin-top: 20px; text-align: center;">
                        @if (!empty($listing->business_img_url))
                            <img src="{{ $listing->business_img_url }}" alt="Business Image" style="max-width: 200px; margin-top: 10px;">
                        @endif
                    </div>
                </div>
            <br>
        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">सत्यापित करें</button>
        </div>
    </form>
</div>
</div>

<script>
   function toggleMenu() {
    const menu = document.querySelector('.navmenu ul');
    menu.classList.toggle('show');
}

function toggleDropdown(category) {
    const dropdown = category.querySelector('.dropdown-menu');
    const icon = category.querySelector('.dropdown-icon');

    // Close all other dropdowns before opening this one
    document.querySelectorAll('.navmenu ul .dropdown').forEach(function(item) {
        if (item !== category) {
            item.classList.remove('show');
            item.querySelector('.dropdown-menu').style.display = 'none';
            item.querySelector('.dropdown-icon').classList.remove('show');
        }
    });

    // Toggle the current dropdown
    category.classList.toggle('show');
    dropdown.style.display = category.classList.contains('show') ? 'block' : 'none';
    icon.classList.toggle('show');
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    const navmenu = document.querySelector('.navmenu');
    const isClickInside = navmenu.contains(event.target);

    if (!isClickInside) {
        document.querySelectorAll('.navmenu ul .dropdown').forEach(function(item) {
            item.classList.remove('show');
            item.querySelector('.dropdown-menu').style.display = 'none';
            item.querySelector('.dropdown-icon').classList.remove('show');
        });
    }
});

</script>
@endsection
