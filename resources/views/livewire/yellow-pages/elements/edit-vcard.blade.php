<div class="row g-4">
    <style>
        /* Flex */
.card-body div .d-flex{
 flex-direction:row;
 align-items:center;
}

/* Paragraph */
.card-body .d-flex p{
 position:relative;
 top:7px;
 padding-top:17px !important;
}

/* Label */
.card-body .d-flex label{
 min-height:20px;
}

/* Input */
.card-body div input[type=URL]{
 margin-top:4px;
}

/* Italic Tag */
.card-body .text-danger i{
 top:2px !important;
}

/* Italic Tag */
.wrapper .page-wrapper .container .row .col-sm-6 .card .card-body .container form div .d-flex .text-danger i{
 bottom:auto !important;
}


    </style>
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="border-0 card">
            <div class="card-body">
                <div class="container mt-3">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        <div class="p-3 text-center rounded position-relative" style="background-color: {{ $color_code }}">
                            <div class="top-0 m-2 position-absolute start-0">
                                <label for="color_value" class="form-label">रंग चुनें *</label>
                                <input type="color" id="color_value" class="form-control form-control-color" wire:change="updatefield('color_value')" wire:model.bounce.500ms="color_code">
                                @error('color_code')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <label for="profile-upload" class="position-relative d-inline-block">
                                <img id="ddimg" src="{{ $profile ? Storage::url($profile) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg' }}" class="border shadow-sm rounded-circle" style="width: 120px; height: 120px; object-fit: cover;" alt="Profile">
                                <span wire:loading wire:target="photo" class="bottom-0 p-1 text-white position-absolute end-0 bg-primary rounded-circle">
                                    {{-- <i class="fas fa-camera" wire:loading.remove wire:target="photo"></i> --}}
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                            </label>
                            {{-- <input type="file" id="profile-upload" class="d-none" wire:model="photo"> --}}
                        </div>

                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">आपका तस्वीर *</label>
                                <input class="form-control" type="file" wire:model="photo" accept="image/*">
                                @error('photo')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>


                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">नाम *</label>
                                <input type="text" class="form-control" placeholder="अपना नाम दर्ज करें" wire:change="updatefield('name')" wire:model.debounce.500ms="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">उपनाम</label>
                                <input type="text" class="form-control" wire:change="updatefield('surname')" placeholder="अपना उपनाम दर्ज करें" wire:model.debounce.500ms="surname">
                                @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">श्रेणी *</label>
                                <select class="form-select" wire:change="updatefield('category_id')" wire:model="category_id">
                                    <option value="">श्रेणी चुनें</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">प्रारंग शहर *</label>
                                <select class="form-select" wire:change="updatefield('city_id')" wire:model="city_id">
                                    <option value="">प्रारंग शहर चुनें</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <small class="text-muted fw-bold mb-1 mt-2">अपना पता दर्ज करें ------ </small>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">घर नंबर</label>
                                <input type="text" class="form-control"  placeholder="अपना घर नंबर दर्ज करें" wire:change="updatefield('house_number')" wire:model="house_number">
                                @error('house_number')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">सड़क/गली</label>
                                <input type="text" class="form-control" placeholder="सड़क/गली का नाम" wire:change="updatefield('road_street')" wire:model="road_street">
                                @error('road_street')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-12">
                                <label class="form-label">पता *</label>
                                <textarea type="text" class="form-control" placeholder="क्षेत्र का नाम दर्ज करें" wire:change="updatefield('area_name')" wire:model="area_name"></textarea>
                                @error('area_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">आपका शहर *</label>
                                <input type="text" class="form-control" placeholder="अपना शहर दर्ज करें" wire:change="updatefield('cityname')" wire:model="cityname">
                                @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">राज्य/प्रदेश *</label>
                                <select class="form-select" wire:change="updatefield('state')" wire:model="state">
                                    <option value="उत्तर प्रदेश (Uttar Pradesh)">उत्तर प्रदेश (Uttar Pradesh)</option>
                                    <option value="आंध्र प्रदेश (Andhra Pradesh)">आंध्र प्रदेश (Andhra Pradesh)</option>
                                    <option value="अरुणाचल प्रदेश (Arunachal Pradesh)">अरुणाचल प्रदेश (Arunachal Pradesh)</option>
                                    <option value="असम (Assam)">असम (Assam)</option>
                                    <option value="बिहार (Bihar)">बिहार (Bihar)</option>
                                    <option value="छत्तीसगढ़ (Chhattisgarh)">छत्तीसगढ़ (Chhattisgarh)</option>
                                    <option value="गोवा (Goa)">गोवा (Goa)</option>
                                    <option value="गुजरात (Gujarat)">गुजरात (Gujarat)</option>
                                    <option value="हरियाणा (Haryana)">हरियाणा (Haryana)</option>
                                    <option value="हिमाचल प्रदेश (Himachal Pradesh)">हिमाचल प्रदेश (Himachal Pradesh)</option>
                                    <option value="झारखंड (Jharkhand)">झारखंड (Jharkhand)</option>
                                    <option value="कर्नाटक (Karnataka)">कर्नाटक (Karnataka)</option>
                                    <option value="केरल (Kerala)">केरल (Kerala)</option>
                                    <option value="मध्य प्रदेश (Madhya Pradesh)">मध्य प्रदेश (Madhya Pradesh)</option>
                                    <option value="महाराष्ट्र (Maharashtra)">महाराष्ट्र (Maharashtra)</option>
                                    <option value="मणिपुर (Manipur)">मणिपुर (Manipur)</option>
                                    <option value="मेघालय (Meghalaya)">मेघालय (Meghalaya)</option>
                                    <option value="मिजोरम (Mizoram)">मिजोरम (Mizoram)</option>
                                    <option value="नागालैंड (Nagaland)">नागालैंड (Nagaland)</option>
                                    <option value="ओडिशा (Odisha)">ओडिशा (Odisha)</option>
                                    <option value="पंजाब (Punjab)">पंजाब (Punjab)</option>
                                    <option value="राजस्थान (Rajasthan)">राजस्थान (Rajasthan)</option>
                                    <option value="सिक्किम (Sikkim)">सिक्किम (Sikkim)</option>
                                    <option value="तमिलनाडु (Tamil Nadu)">तमिलनाडु (Tamil Nadu)</option>
                                    <option value="तेलंगाना (Telangana)">तेलंगाना (Telangana)</option>
                                    <option value="त्रिपुरा (Tripura)">त्रिपुरा (Tripura)</option>
                                    <option value="उत्तराखंड (Uttarakhand)">उत्तराखंड (Uttarakhand)</option>
                                    <option value="पश्चिम बंगाल (West Bengal)">पश्चिम बंगाल (West Bengal)</option>
                                </select>

                                @error('state')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">आपका देश</label>
                                <input type="text" value="भारत (India)" class="form-control" placeholder="अपना देश दर्ज करें">
                                {{-- @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror --}}
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">पिनकोड*</label>
                                <input type="text" class="form-control" wire:change="updatefield('pincode')" placeholder="पिनकोड दर्ज करें" wire:model="pincode">
                                @error('pincode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">जन्म तिथि</label>
                                <input type="date" class="form-control" wire:change="updatefield('dob')" wire:model="dob">
                                @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ईमेल </label>
                                <input type="email" class="form-control" placeholder="आपका ईमेल" wire:change="updatefield('email')"   wire:model="email">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <small class="text-muted fw-bold m-1">सोशल मीडिया लिंक्स ------</small>
                        <div>
                            @foreach($dynamicFields as $index => $field)
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <label for="field_{{ $field['id'] }}" class="form-label">
                                            <i class="{{ $field['icon'] }}"></i> {{ $field['name'] }}
                                        </label>
                                        <input type="{{ $field['type'] }}" id="field_{{ $field['id'] }}" placeholder="{{ $field['name'] }} दर्ज करें" class="form-control"
                                               wire:model="dynamicFields.{{ $index }}.value">
                                    </div>
                                    <p class="p-2 text-danger " wire:click="removeField({{ $index }})"><i class="bx bx-trash"></i></p>
                                </div>
                            @endforeach
                        </div>

                        <p class="text-end">
                            <div class="dropdown text-end">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-plus"></i> अन्य सोशल मीडिया चुनें
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($options as $option)
                                        @unless(collect($dynamicFields)->pluck('id')->contains($option['id']))
                                            <li>
                                                <p class="dropdown-item" wire:click="addField({{ $option['id'] }})">
                                                    {{ $option['name'] }}
                                                </p>
                                            </li>
                                        @endunless
                                    @endforeach
                                </ul>

                            </div>

                        </p>
                        <button type="submit" class="mt-3 btn btn-primary w-100">
                            <span wire:loading.remove wire:target="submit">सबमिट करें</span>
                            <span wire:loading wire:target="submit">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

