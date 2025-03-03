<div class="row g-4">
    <style>
.card-body .position-absolute label{
 text-shadow:rgb(255, 255, 255) 0px 1px 1px, rgb(255, 255, 255) 0px -1px 1px, rgb(255, 255, 255) 1px 0px 1px, rgb(255, 255, 255) -1px 0px 1px;
}
/* Dropdown item */
.card-body li .dropdown-item{
 cursor:pointer;
}

/* Dropdown item (hover) */
.card-body li .dropdown-item:hover{
 font-weight:500;
 background-color:#f3e7e7;
}
/* Link */
.card-body .d-flex a{
 transform:translatex(0px) translatey(12px);
}

/* Italic Tag */
.card-body .text-danger .bx{
 font-size:17px;
}

/* Italic Tag */
.card-body .text-danger .bx{
 cursor:progress;
}

/* Italic Tag */
.card-body .text-danger .bx{
 position:relative;
 top:-2px;
 left:-1px;
}
/* Button */
.card-body form .btn-secondary{
 font-size:13px;
 margin-top:4px;
}


/* Column 6/12 */
.card-body form .col-md-6{
 margin-bottom:4px;
}

/* Form label */
.container form .row .col-md-6 .form-label{
 margin-bottom:0px;
 font-weight:600;
}

/* Label */
.container form .row .col-md-12 label{
 margin-bottom:0px;
}

/* Label */
.container form .row .col-md-12 label{
 font-weight:600;
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
                                <span class="bottom-0 p-1 text-white position-absolute end-0 bg-primary rounded-circle">
                                    <i class="fas fa-camera" wire:loading.remove wire:target="photo"></i>
                                    <i class="fas fa-spinner fa-spin" wire:loading wire:target="photo"></i>
                                </span>
                            </label>
                            <input type="file" id="profile-upload" class="d-none" wire:model="photo">
                        </div>

                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">आपका तस्वीर *</label>
                                <input class="form-control" type="file" id="" class="" wire:model="photo">
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
                                <input type="text" class="form-control" value=" उत्तर प्रदेश (Uttar Pradesh)"  placeholder="अपना राज्य दर्ज करें" wire:change="updatefield('state')" wire:model="state">
                                @error('state')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">आपका देश</label>
                                <input type="text" value="भारत (India)" class="form-control" placeholder="अपना देश दर्ज करें">
                                @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">पिनकोड</label>
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
                                    <a class="p-2 text-danger " wire:click="removeField({{ $index }})"><i class="bx bx-trash"></i></a>
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
                                                <a class="dropdown-item" wire:click="addField({{ $option['id'] }})">
                                                    {{ $option['name'] }}
                                                </a>
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
