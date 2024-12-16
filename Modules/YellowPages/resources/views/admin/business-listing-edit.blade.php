@extends('yellowpages::layout.admin.admin')
@section('title', 'Edit Business Listing')
@section('content')

<div class="page-content">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.listing-edit', $listing->id) }}"><i class="bx bx-list-ul"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Business Listing</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Header Section -->
  
    <div style="text-align: center;">
        <h1 class="position-relative z-index-1">Edit Your Listing</h1>
    </div>
    

    <!-- Main Form -->
    <form action="#" method="POST" enctype="multipart/form-data" class="form-container">
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
            <h5>Primary Listing Details</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select id="location" name="location" class="form-select">
                    <option selected disabled>Select location</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}" 
                        {{ (old('legal_type_id', $listing->city_id) == $city->id) ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="listingTitle" class="form-label">Listing Title</label>
                <input type="text" id="listingTitle" name="listingTitle" class="form-control" value="{{ old('listing_title', $listing->listing_title) }}">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="hasTagline" {{ $listing->tagline ? 'checked' : '' }}
                       onclick="toggleTaglineField()">
                <label class="form-check-label" for="hasTagline">Does Your Business have a tagline?</label>
            </div>
            <div class="mb-3" id="taglineField" style="display: {{ $listing->tagline ? 'block' : 'none' }};">
                <label for="tagline" class="form-label">Tagline</label>
                <input type="text" id="tagline" name="tagline" class="form-control" value="{{ old('tagline', $listing->tagline) }}" placeholder="Enter tagline">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="businessName" class="form-label">Business/Company Name</label>
                    <input type="text" id="businessName" name="businessName" class="form-control" value="{{ old('business_name', $listing->business_name) }}" placeholder="Enter business name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessAddress" class="form-label">Business/Company Address</label>
                    <input type="text" id="businessAddress" name="businessAddress" class="form-control" value="{{ old('business_address', $listing->business_address) }}" placeholder="Enter business address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryPhone" class="form-label">Primary Phone Number</label>
                    <input type="text" id="primaryPhone" name="primaryPhone" class="form-control" value="{{ old('primary_phone', $listing->primary_phone) }}" placeholder="Enter primary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryPhone" class="form-label">Secondary Phone Number</label>
                    <input type="text" id="secondaryPhone" name="secondary_phone" class="form-control" value="{{ old('secondary_phone', $listing->secondary_phone) }}" placeholder="Enter secondary phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryContact" class="form-label">Primary Contact Name</label>
                    <input type="text" id="primaryContact" name="primaryContact" class="form-control" value="{{ old('primary_contact_name', $listing->primary_contact_name) }}"placeholder="Enter primary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="primaryEmail" class="form-label">Primary Contact Email</label>
                    <input type="email" id="primaryEmail" name="primaryEmail" class="form-control" value="{{ old('primary_contact_email', $listing->primary_contact_email) }}" placeholder="Enter primary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryContact" class="form-label">Secondary Contact Name</label>
                    <input type="text" id="secondaryContact" name="secondaryContactName" class="form-control" value="{{ old('secondary_contact_name', $listing->secondary_contact_name) }}" placeholder="Enter secondary contact name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="secondaryEmail" class="form-label">Secondary Contact Email</label>
                    <input type="email" id="secondaryEmail" name="secondaryEmail" class="form-control"  value="{{ old('secondary_contact_email', $listing->secondary_contact_email) }}" placeholder="Enter secondary email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="businessType" class="form-label">Business/Company Legal Type *</label>
                    <select id="businessType" name="businessType" class="form-select">
                        <option value="">Select Type</option>
                        @foreach($company_legal_types as $Cl_type)
                            <option value="{{ $Cl_type->id }}" 
                                {{ (old('legal_type_id', $listing->legal_type_id) == $Cl_type->id) ? 'selected' : '' }}>
                                {{ $Cl_type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>                
                <div class="col-md-6 mb-3">
                    <label for="employee_range" class="form-label">Business/Company No. of Employees (approx.) *</label>
                    <select id="employee_range" name="employees" class="form-select">
                        <option selected>Select No. of Employees</option>
                        @foreach($number_of_employees as $number_employee)
                        <option value="{{ $number_employee->id }}" 
                            {{ (old('employee_range_id', $listing->employee_range_id) == $number_employee->id) ? 'selected' : '' }}>
                            {{ $number_employee->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trunover" class="form-label">Business/Company Monthly Turnover (approx.) *</label>
                    <select id="trunover" name="turnover" class="form-select">
                        <option selected>Select Turnover</option>
                        @foreach($monthly_turnovers as $turnovers)
                        <option value="{{ $turnovers->id }}" 
                            {{ (old('turnover_id', $listing->turnover_id) == $turnovers->id) ? 'selected' : '' }}>
                            {{ $turnovers->range }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising" class="form-label">Business/Company Monthly Advertising (Medium)</label>
                    <select id="advertising" name="advertising" class="form-select">
                        <option selected>Select Advertising</option>
                        @foreach($monthly_advertising_mediums as $advertising)
                        <option value="{{ $advertising->id }}" 
                            {{ (old('advertising_medium_id ', $listing->advertising_medium_id) == $advertising->id) ? 'selected' : '' }}>
                            {{ $advertising->medium}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="advertising_price" class="form-label">Business/Company Advertising (Medium) price*</label>
                    <select id="advertising_price" name="advertising_price" class="form-select">
                        <option selected>Select Advertising Price</option>
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
            <h5 style="margin-bottom: 15px;">Address Details</h5>
        <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="display: flex; gap: 20px;">
                <!-- Pin Code Field -->
                <div style="flex: 1;">
                    <label for="pincode" class="form-label">Pin Code</label>
                    <input type="text" id="pincode" name="pincode" class="form-control" value="{{ old('primary_contact_email', $listing->pincode) }}" placeholder="Enter Pin Code">
                </div>
            </div>
        </div>
        <br>
        <br>
        <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
            <h5 style="margin-bottom: 15px;">CATEGORY & SERVICES</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="display: flex; gap: 20px;">
                <div style="flex: 1;">
                    <label for="state" class="form-label">Category *</label>
                    <select id="state" class="form-select" name="category">
                        <option selected>Select Category</option>
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
            <h5 style="margin-bottom: 15px;">More Info</h5>
            <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
            <div style="margin-top: 15px;">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" value="{{ old('primary_contact_email', $listing->description) }}" placeholder="Enter description here..." style="width: 100%;"></textarea>
            </div>
            <div style="margin-top: 15px;">
                <label for="description">Tags or Keywords (Comma Separated)</label>
                <textarea id="description" name="tags_keywords" rows="4" placeholder="Enter Tags or Keywords (Comma Separated)"  value="{{ old('primary_contact_email', $listing->tags_keywords) }}" style="width: 100%;"></textarea>
            </div>
        </div>
            <br>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">Address Information</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="margin-bottom: 10px;">
                    <label for="street_address">Full Address:</label>
                    <input type="text" id="street_address" name="fullAddress"  value="{{ old('primary_contact_email', $listing->full_address) }}" placeholder="123 Main St" style="width: 100%; padding: 8px;">
                </div>
               
                <h5 style="margin-bottom: 15px;">Contact Information</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div style="margin-bottom: 10px;">
                    <label for="website">Website:</label>
                    <input type="url" id="website" name="website" value="{{ old('primary_contact_email', $listing->website) }}" placeholder="https://example.com" style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('primary_contact_email', $listing->phone) }}" placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label for="whatsapp">WhatsApp:</label>
                    <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('primary_contact_email', $listing->whatsapp) }}"  placeholder="+1 234 567 8900" style="width: 100%; padding: 8px;">
                </div>
            </div>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <h5 style="margin-bottom: 15px;">Social Media Links</h5>
                <div style="border-bottom: 2px solid #000; margin-bottom: 15px;"></div>
                <div class="social-media-row" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                    <select id="social_media" name="socialId" required style="flex: 1; padding: 8px;">
                    <option selected>Select location</option>
                            @foreach($social_media as $social)
                            <option value="{{ $social->id }}" 
                                {{ (old('advertising_medium_id ', $listing->social_id) == $social->id) ? 'selected' : '' }}>
                                {{ $social->name }}
                            </option>
                            @endforeach
                    </select>
                    <input type="text" id="description" name="socialDescription" placeholder="Enter your link or details" style="flex: 2; padding: 8px;">
                    <button type="button" id="addSocialMedia" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">
                        +
                    </button>
                </div>
            </div>
            <br>
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
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
            <div style="max-width: 900px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ddd;">
                <div id="signupFields" style="display: flex; gap: 20px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label for="signupEmail">Enter email to signup & receive notification upon listing approval</label>
                        <input type="email" id="signupEmail" name="notificationEmail" placeholder="Enter email here..." style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
                    </div>
                    <div style="flex: 1;">
                        <label for="userName">Enter User Name</label>
                        <input type="text" id="userName" name="userName" value="{{ old('user_name', $listing->user_name) }}" placeholder="Enter User Name" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
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
                        <input type="email" id="email" name="email" value="{{ old('email', $listing->email) }}" placeholder="Enter your email" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
                    </div>
                    <div style="flex: 1;">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password', $listing->password) }}" placeholder="Enter your password" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd;">
                    </div>
                </div>
            </div>

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
</script>

@endsection
