@extends('yellowpages::layout.admin.admin')
@section('title', 'Manage VCard')

@section('content')
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
                    <form action="{{ route('admin.update', $vcard->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Color Picker -->
                        <div class="mb-3">
                            <label for="color_code" class="form-label">रंग पसंद करो</label>
                            <input type="color" class="form-control form-control-color" id="color_code" name="color_code" value="#007bff">
                        </div>
                    
                        <!-- Photo Upload (Profile Image) -->
                        <div class="mb-3">
                            <label for="profile" class="form-label">फ़ोटो अपलोड करें</label>
                            
                            <!-- Existing Profile Picture -->
                            @if(old('profile', $user->profile ?? false))
                                <div class="mb-2">
                                    <img src="{{ Storage::url(old('profile', $user->profile)) }}" 
                                         class="img-thumbnail" 
                                         style="width: 120px; height: 120px; object-fit: cover;" 
                                         alt="Profile Picture">
                                </div>
                            @endif
                            
                            <!-- File Input Field -->
                            <input type="file" class="form-control" id="profile" name="profile" accept="image/*">
                            
                            <!-- Hidden Input to Retain Old Image -->
                            <input type="hidden" name="old_profile" value="{{ $user->profile }}">
                        </div>                        
                    
                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category" class="form-label">श्रेणी चुनें</label>
                            <select class="form-control" id="category" name="category_id">
                                <option value="">चुनें</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $vcard->category_id ?? '') == $category->id ? 'selected' : '' }}>
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
                                    <option value="{{ $city->id }}" {{ old('city_id', $vcard->city_id ?? '') == $city->id ? 'selected' : '' }}>
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
                            @if(!empty($vcard->aadhar_front))
                                <div class="mb-2">
                                    <img src="{{ Storage::url($vcard->aadhar_front) }}" 
                                         class="img-thumbnail" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="aadhar_front" name="aadhar_front" accept="image/*">
                            <input type="hidden" name="old_aadhar_front" value="{{ $vcard->aadhar_front }}">
                        </div>
                    
                        <!-- Aadhar Upload (Back) -->
                        <div class="mb-3">
                            <label for="aadhar_back" class="form-label">आधार कार्ड (Back)</label>
                            @if(!empty($vcard->aadhar_back))
                                <div class="mb-2">
                                    <img src="{{ Storage::url($vcard->aadhar_back) }}" 
                                         class="img-thumbnail" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="aadhar_back" name="aadhar_back" accept="image/*">
                            <input type="hidden" name="old_aadhar_back" value="{{ $vcard->aadhar_back }}">
                        </div>
                        @foreach($vcardInfo as $dynamicField)
                        <div class="mb-3">
                            <label for="{{$dynamicField->title}}" class="form-label">{{ $dynamicField->title }}</label>
                            <input type="text" class="form-control" id="{{ $dynamicField->title }}" 
                                   name="data[{{ $dynamicField->title }}]" 
                                   value="{{ old('data.'.$dynamicField->title, $dynamicField->data) }}">
                        </div>
                        @endforeach
                        
                        <div id="dynamic-fields"></div>
                        
                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">सबमिट(Submit) करें</button>
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
// Add Dynamic Fields
function addField(label, fieldName) {
    const uniqueId = 'field-' + Date.now();
    const fieldKey = fieldName.toLowerCase().replace(/\s+/g, '_'); // Ensure unique valid field names

    const fieldHTML = `
    <div class="mb-3 d-flex align-items-center" id="${uniqueId}">
        <div class="flex-grow-1">
            <label for="${fieldName}" class="form-label">${label}</label>
            <input type="text" class="form-control" name="data[${fieldName}]" placeholder="${label} दर्ज करें">
        </div>
        <button type="button" class="btn btn-light ms-2" onclick="removeField('${uniqueId}')">X</button>
    </div>
`;


    document.getElementById('dynamic-fields').insertAdjacentHTML('beforeend', fieldHTML);
}


// Remove Dynamic Field
function removeField(uniqueId) {
    const fieldElement = document.getElementById(uniqueId);
    if (fieldElement) {
        fieldElement.remove();
    }
}

// Image Preview for Aadhar and Profile Images
document.getElementById('aadhar').addEventListener('change', function(event) {
    let previewDiv = document.getElementById('aadhar-preview');
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
