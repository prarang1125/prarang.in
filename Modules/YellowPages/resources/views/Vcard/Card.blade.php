@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')
<br>

    <!-- Viewport meta tag for responsive design -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<style>
    /* Default styling for larger screens */
    .fixed-container {
        position: fixed;
        top: 120px;
        right: 0;
        width: 40% !important;;
        max-width: 600px;
        padding: 0 15px;
    }

    /* Custom media query for screens between 812px and 1300px */
    @media (min-width: 312px) and (max-width: 750px) {
        .fixed-container {
            position: relative !important;
            width: 100% !important;
            max-width: 100% !important;
            top: 0 !important;
            margin-top: 20px;
        }
        
        /* Adjust card sizes */
        .card-body {
            padding: 20px;
        }

        .col-md-6 {
            max-width: 50%;
        }

        .container {
            padding-left: 30px;
            padding-right: 30px;
        }

        .mb-3 {
            margin-bottom: 1.25rem;
        }

        .text-center {
            text-align: center;
        }
    }

    /* For smaller devices (less than 812px) */
    @media (max-width: 811px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }

        .fixed-container {
            margin-top: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .col-md-6 {
            max-width: 100%;
        }

        .text-center {
            text-align: center;
        }
    }
</style>



<div class="container my-5">
    <div class="row">
        <!-- Left Card: Form -->
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="mb-4">वेबपेज(Webpage) सूचना</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('vCard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf                    
                        <!-- Color Picker -->
                        <div class="mb-3">
                            <label for="color_code" class="form-label">रंग पसंद करो</label>
                            <input type="color" class="form-control form-control-color" id="color_code" name="color_code" value="#007bff">
                        </div>

                        <!-- Photo Upload (Profile Image) -->
                        <div class="mb-3">
                            <label for="profile" class="form-label">फ़ोटो अपलोड करें</label>
                            <input type="file" class="form-control" id="profile" name="profile">
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category" class="form-label">श्रेणी चुनें</label>
                            <select class="form-control" id="category" name="category_id">
                                <option value="">चुनें</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $user->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- City Dropdown -->
                        <div class="mb-3">
                            <label for="city" class="form-label">शहर चुनें</label>
                            <select class="form-control" id="city" name="city_id">
                                <option value="">चुनें</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $user->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name and Surname -->
                        <div class="mb-3">
                            <label for="name" class="form-label">नाम</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label">उपनाम</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $user->surname ?? '') }}">
                        </div>

                        <!-- Address Fields -->
                        <div class="mb-3">
                            <label class="form-label">पता</label>
                            <input type="text" class="form-control" id="house_number" name="house_number" placeholder="मकान नंबर" value="{{ old('house_number', $address->house_number ?? '') }}">
                            <input type="text" class="form-control mt-2" id="road_street" name="road_street" placeholder="सड़क/गली" value="{{ old('road_street', $address->street ?? '') }}">
                            <input type="text" class="form-control mt-2" id="area_name" name="area_name" placeholder="क्षेत्र नाम (सार्वजनिक)" value="{{ old('area_name', $address->area_name ?? '') }}">
                        </div>

                        <!-- Optional Fields -->
                        <div class="mb-3">
                            <label for="pincode" class="form-label">पिनकोड (वैकल्पिक)</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('postal_code', $address->postal_code ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">जन्म तिथि (वैकल्पिक)</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user->dob ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">ईमेल (वैकल्पिक)</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="aadhar" class="form-label">आधार संख्या (वैकल्पिक)</label>
                            <input type="text" class="form-control" id="aadhar" name="aadhar" pattern="[0-9]{12}" maxlength="12" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ old('aadhar', $user->aadhaar ?? '') }}" placeholder="12 अंकों की आधार संख्या दर्ज करें">
                        </div>

                        <div class="mb-3">
                            <label for="aadhar_front" class="form-label">आधार कार्ड (Front)</label>
                            <input type="file" class="form-control" id="aadhar_front" name="aadhar_front">
                        </div>

                        <div class="mb-3">
                            <label for="aadhar_back" class="form-label">आधार कार्ड (Back)</label>
                            <input type="file" class="form-control" id="aadhar_back" name="aadhar_back">
                        </div>

                        <div id="dynamic-fields"></div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">स्वीकृति के लिए भेजें</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Card: Add New Information -->
        <div class="col-md-6 fixed-container">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="mb-3">अन्य जानकारी</h5>
                    <div class="container">
                        @foreach ($dynamicFields->chunk(3) as $chunk)
                            <div class="row d-flex justify-content-center align-items-center mb-2">
                                @foreach ($chunk as $field)
                                    <div class="col-4 text-center" onclick="addField('{{ $field->name }}', '{{ $field->icon }}', '{{ $field->type }}')">
                                        <i class="{{ $field->icon }}" title="{{ $field->name }}" style="font-size: 24px;"></i>
                                        <p class="mt-1">{{ $field->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>              
    </div>
</div>

@endsection

<script>
// Add dynamic fields and image preview logic here
function addField(label, fieldName, fieldType) {
        // Create a unique ID using timestamp
        const uniqueId = 'field-' + Date.now();

        // Directly use the fieldType (from database) as the input type
        const inputType = fieldType.toLowerCase();  // Directly using the database value (e.g., 'text', 'url', etc.)

        // Prepare the HTML for the new dynamic field
        const fieldHTML = `
            <div class="mb-3 d-flex align-items-center" id="${uniqueId}">
                <div class="flex-grow-1">
                    <label for="${fieldName}" class="form-label">${label}</label>
                    <input type="${inputType}" class="form-control" name="dynamic_data[]" placeholder="${label} दर्ज करें">
                    <input type="hidden" name="dynamic_name[]" value="${label}">
                </div>
                <button type="button" class="btn btn-light ms-2" onclick="removeField('${uniqueId}')">X</button>
            </div>
        `;

        // Get the container where the new field should be added
        const dynamicFields = document.getElementById('dynamic-fields');
        if (dynamicFields) {
            dynamicFields.insertAdjacentHTML('beforeend', fieldHTML);
        }
    }

    function removeField(uniqueId) {
        // Find and remove the field based on its unique ID
        const fieldToRemove = document.getElementById(uniqueId);
        if (fieldToRemove) {
            fieldToRemove.remove();
        }
    }

// Image preview for Aadhar and profile images
document.getElementById('aadhar').addEventListener('change', function(event) {
    let previewDiv = document.getElementById('aadhar-preview');
    previewDiv.innerHTML = ""; // Clear previous previews
    let files = event.target.files;
    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-2');
                img.style.width = "100px";
                previewDiv.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
});

document.getElementById('profile').addEventListener('change', function(event) {
    let previewDiv = document.getElementById('image-preview');
    previewDiv.innerHTML = "";
    let files = event.target.files;
    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-2');
                img.style.width = "100px";
                previewDiv.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
});
</script>
