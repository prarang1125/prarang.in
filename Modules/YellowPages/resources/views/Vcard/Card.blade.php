@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section(section: 'content')
<br>
<div class="container my-5">
    <h2 class="text-center mt-6 mb-4">वेबपेज बनाएं</h2>

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
                            <input type="text" class="form-control" id="aadhar" name="aadhar" value="{{ old('aadhar', $user->aadhaar ?? '') }}">
                        </div>

                          <!-- Aadhar Upload (Front) -->
                          <div class="mb-3">
                            <label for="aadhar_front" class="form-label">आधार कार्ड (Front)</label>
                            <input type="file" class="form-control" id="aadhar_front" name="aadhar_front">
                        </div>

                        <!-- Aadhar Upload (Back) -->
                        <div class="mb-3">
                            <label for="aadhar_back" class="form-label">आधार कार्ड (Back)</label>
                            <input type="file" class="form-control" id="aadhar_back" name="aadhar_back">
                        </div>

                        <div id="dynamic-fields"></div>
                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">स्वीकृति के लिए भेजें</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Card: Add New Information -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="mb-3">नई जानकारी जोड़ें</h5>
                    <div class="container">
                        @foreach ($dynamicFields->chunk(3) as $chunk)  
                            <div class="row d-flex justify-content-center align-items-center mb-2">
                                @foreach ($chunk as $field)
                                    <div class="col-4 text-center" onclick="addField('{{ $field->name }}', '{{ $field->icon }}')">
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
function addField(label, fieldName) {
    // Generate a unique ID for the field container
    const uniqueId = 'field-' + Date.now();

    const fieldHTML = `
        <div class="mb-3 d-flex align-items-center" id="${uniqueId}">
            <div class="flex-grow-1">
                <label for="${fieldName}" class="form-label">${label}</label>
                <input type="text" class="form-control" name="dynamic_data[]" placeholder="${label} दर्ज करें">
                <input type="hidden" name="dynamic_name[]" value="${label}">
            </div>
            <button type="button" class="btn btn-light ms-2" onclick="removeField('${uniqueId}')">X</button>
        </div>
    `;

    const dynamicFields = document.getElementById('dynamic-fields');
    if (dynamicFields) {
        dynamicFields.insertAdjacentHTML('beforeend', fieldHTML);
    }
}


    function removeField(uniqueId) {
        const fieldElement = document.getElementById(uniqueId);
        if (fieldElement) {
            fieldElement.remove();
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
                    img.style.width = "100px"; // Adjust image size if needed
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }
    });

    document.getElementById('profile').addEventListener('change', function(event) {
        let previewDiv = document.getElementById('image-preview');
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
                    img.style.width = "100px"; // Adjust image size if needed
                    previewDiv.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }
    });
</script>
