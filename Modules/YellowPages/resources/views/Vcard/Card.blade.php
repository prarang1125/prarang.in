@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')

<div class="container my-5">
    <br><br>
    <h2 class="text-center mt-6 mb-4">वीकार्ड प्रबंधित करें</h2>

    <div class="row">
        <!-- Left Card: Form -->
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="mb-4 d-flex align-items-center">
                        <span>वीकार्ड सूचना</span>
                    </h5>                  
                    <form action="{{ route('vCard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="color_code" class="form-label">रंग पसंद करो</label>
                            <input type="color" class="form-control form-control-color" id="color_code" name="color_code" value="#007bff">
                        </div>
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">बैनर अपलोड करें</label>
                            <input type="file" class="form-control" id="banner_img" name="banner_img">
                            @error('banner_img')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Upload Logo -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">लोगो अपलोड करें</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">काउंटर</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="अद्वितीय स्लग मान दर्ज करें">
                            @error('slug')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">शीर्षक</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="शीर्षक दर्ज करें">
                            @error('title')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">उपशीर्षक</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="उपशीर्षक दर्ज करें">
                            @error('subtitle')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">विवरण</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="विवरण दर्ज करें"></textarea>
                            @error('description')
                            <div class="alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dynamic Fields will be appended here -->
                        <div id="dynamic-fields"></div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"value="Save_VCard" name="action">वीकार्ड बनाएं</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>

        <!-- Right Card: Add New Information -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="mb-4">नई जानकारी जोड़ें</h5>
                    <div class="icon-box row gx-3 gy-3 justify-content-center">
                        @foreach ($dynamicFields as $field)
                            <div class="col-3 text-center" onclick="addField('{{ $field->name }}', '{{ $field->name }}')">
                                <i class="{{ $field->icon }}" title="{{ $field->name }}" style="font-size: 24px;"></i>
                                <p class="mt-1">{{ $field->name }}</p>
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
    // Define the addField function globally
    function addField(label, fieldName) {
    const fieldHTML = `
        <div class="mb-3">
            <label for="${fieldName}" class="form-label">${label}</label>
            <input type="text" class="form-control" id="${fieldName}" name="data[]" placeholder=" ${label.toLowerCase()} दर्ज करें">
            <input type="hidden" name="name[]" value="${label}">
        </div>
    `;
    const dynamicFields = document.getElementById('dynamic-fields');
    if (dynamicFields) {
        dynamicFields.insertAdjacentHTML('beforeend', fieldHTML);
    }
}

    // Ensure the script runs after DOM is loaded
    document.addEventListener("DOMContentLoaded", function () {
        console.log('Page fully loaded and DOM is ready.');
    });
</script>

