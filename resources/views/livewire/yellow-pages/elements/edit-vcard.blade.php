<div class="row g-4">
    <style>
        /* Flex */
        .card-body div .d-flex {
            flex-direction: row;
            align-items: center;
        }

        /* Paragraph */
        .card-body .d-flex p {
            position: relative;
            top: 7px;
            padding-top: 17px !important;
        }

        /* Label */
        .card-body .d-flex label {
            min-height: 20px;
        }

        /* Input */
        .card-body div input[type=URL] {
            margin-top: 4px;
        }

        /* Italic Tag */
        .card-body .text-danger i {
            top: 2px !important;
        }

        /* Italic Tag */
        .wrapper .page-wrapper .container .row .col-sm-6 .card .card-body .container form div .d-flex .text-danger i {
            bottom: auto !important;
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
                        <div class="p-3 text-center rounded position-relative"
                            style="background-color: {{ $color_code }}">
                            <div class="top-0 m-2 position-absolute start-0">
                                <label for="color_value" class="form-label">{{ __('formyp.select_color') }} *</label>
                                <input type="color" id="color_value" class="form-control form-control-color"
                                    wire:change="updatefield('color_value')" wire:model.bounce.500ms="color_code">
                                @error('color_code')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <label for="profile-upload" class="position-relative d-inline-block">
                                <img id="ddimg"
                                    src="{{ $profile ? Storage::url($profile) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg' }}"
                                    class="border shadow-sm rounded-circle"
                                    style="width: 120px; height: 120px; object-fit: cover;" alt="Profile">
                                <span wire:loading wire:target="photo"
                                    class="bottom-0 p-1 text-white position-absolute end-0 bg-primary rounded-circle">
                                    {{-- <i class="fas fa-camera" wire:loading.remove wire:target="photo"></i> --}}
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                            </label>
                            {{-- <input type="file" id="profile-upload" class="d-none" wire:model="photo"> --}}
                        </div>

                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.your_photo') }} *</label>
                                <input class="form-control" type="file" wire:model="photo" accept="image/*">
                                @error('photo')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>


                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.first_name') }} *</label>
                                <input type="text" class="form-control"
                                    placeholder="{{ __('formyp.enter_business_name') }}"
                                    wire:change="updatefield('name')" wire:model.debounce.500ms="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.last_name') }}</label>
                                <input type="text" class="form-control" wire:change="updatefield('surname')"
                                    placeholder="{{ __('formyp.enter_secondary_contact') }}"
                                    wire:model.debounce.500ms="surname">
                                @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.category') }} *</label>
                                <select class="form-select" wire:change="updatefield('category_id')"
                                    wire:model="category_id">
                                    <option value="">{{ __('formyp.select_category') }}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.prarang_city') }} *</label>
                                <select class="form-select" wire:change="updatefield('city_id')" wire:model="city_id">
                                    <option value="">{{ __('formyp.select_prarang_city') }}</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <small class="text-muted fw-bold mb-1 mt-2">{{ __('formyp.enter_your_address') }} ------
                        </small>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.house_number') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.enter_house_no') }}"
                                    wire:change="updatefield('house_number')" wire:model="house_number">
                                @error('house_number')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.road_street') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.road_street') }}"
                                    wire:change="updatefield('road_street')" wire:model="road_street">
                                @error('road_street')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-12">
                                <label class="form-label">{{ __('formyp.address_label') }} *</label>
                                <textarea type="text" class="form-control"
                                    placeholder="{{ __('formyp.enter_area_name') }}"
                                    wire:change="updatefield('area_name')" wire:model="area_name"></textarea>
                                @error('area_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.your_city') }} *</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.your_city') }}"
                                    wire:change="updatefield('cityname')" wire:model="cityname">
                                @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.state_province') }} *</label>
                                <select class="form-select" wire:change="updatefield('state')" wire:model="state">
                                    <option value="उत्तर प्रदेश (Uttar Pradesh)">{{ __('formyp.uttar_pradesh') }}
                                    </option>
                                    <option value="आंध्र प्रदेश (Andhra Pradesh)">{{ __('formyp.andhra_pradesh') }}
                                    </option>
                                    <option value="अरुणाचल प्रदेश (Arunachal Pradesh)">{{ __('formyp.arunachal_pradesh')
                                        }}</option>
                                    <option value="असम (Assam)">{{ __('formyp.assam') }}</option>
                                    <option value="बिहार (Bihar)">{{ __('formyp.bihar') }}</option>
                                    <option value="छत्तीसगढ़ (Chhattisgarh)">{{ __('formyp.chhattisgarh') }}</option>
                                    <option value="गोवा (Goa)">{{ __('formyp.goa') }}</option>
                                    <option value="गुजरात (Gujarat)">{{ __('formyp.gujarat') }}</option>
                                    <option value="हरियाणा (Haryana)">{{ __('formyp.haryana') }}</option>
                                    <option value="हिमाचल प्रदेश (Himachal Pradesh)">{{ __('formyp.himachal_pradesh') }}
                                    </option>
                                    <option value="झारखंड (Jharkhand)">{{ __('formyp.jharkhand') }}</option>
                                    <option value="कर्नाटक (Karnataka)">{{ __('formyp.karnataka') }}</option>
                                    <option value="केरल (Kerala)">{{ __('formyp.kerala') }}</option>
                                    <option value="मध्य प्रदेश (Madhya Pradesh)">{{ __('formyp.madhya_pradesh') }}
                                    </option>
                                    <option value="महाराष्ट्र (Maharashtra)">{{ __('formyp.maharashtra') }}</option>
                                    <option value="मणिपुर (Manipur)">{{ __('formyp.manipur') }}</option>
                                    <option value="मेघालय (Meghalaya)">{{ __('formyp.meghalaya') }}</option>
                                    <option value="मिजोरम (Mizoram)">{{ __('formyp.mizoram') }}</option>
                                    <option value="नागालैंड (Nagaland)">{{ __('formyp.nagaland') }}</option>
                                    <option value="ओडिशा (Odisha)">{{ __('formyp.odisha') }}</option>
                                    <option value="पंजाब (Punjab)">{{ __('formyp.punjab') }}</option>
                                    <option value="राजस्थान (Rajasthan)">{{ __('formyp.rajasthan') }}</option>
                                    <option value="सिक्किम (Sikkim)">{{ __('formyp.sikkim') }}</option>
                                    <option value="तमिलनाडु (Tamil Nadu)">{{ __('formyp.tamil_nadu') }}</option>
                                    <option value="तेलंगाना (Telangana)">{{ __('formyp.telangana') }}</option>
                                    <option value="त्रिपुरा (Tripura)">{{ __('formyp.tripura') }}</option>
                                    <option value="उत्तराखंड (Uttarakhand)">{{ __('formyp.uttarakhand') }}</option>
                                    <option value="पश्चिम बंगाल (West Bengal)">{{ __('formyp.west_bengal') }}</option>
                                </select>

                                @error('state')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">{{ __('formyp.your_country') }}</label>
                                <input type="text" value="{{ __('formyp.india') }}" class="form-control"
                                    placeholder="{{ __('formyp.your_country') }}">
                                {{-- @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror --}}
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">{{ __('formyp.pincode') }}*</label>
                                <input type="text" class="form-control" wire:change="updatefield('pincode')"
                                    placeholder="{{ __('formyp.pincode') }}" wire:model="pincode">
                                @error('pincode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.dob') }}</label>
                                <input type="date" class="form-control" wire:change="updatefield('dob')"
                                    wire:model="dob">
                                @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('formyp.email_label') }} </label>
                                <input type="email" class="form-control" placeholder="{{ __('formyp.email_label') }}"
                                    wire:change="updatefield('email')" wire:model="email">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <small class="text-muted fw-bold m-1">{{ __('formyp.social_media_links') }} ------</small>
                        <div>
                            @foreach($dynamicFields as $index => $field)
                            <div class="mb-3 d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <label for="field_{{ $field['id'] }}" class="form-label">
                                        <i class="{{ $field['icon'] }}"></i> {{ $field['name'] }}
                                    </label>
                                    <input type="{{ $field['type'] }}" id="field_{{ $field['id'] }}"
                                        placeholder="{{ $field['name'] }} {{ __('formyp.enter') }}" class="form-control"
                                        wire:model="dynamicFields.{{ $index }}.value">
                                </div>
                                <p class="p-2 text-danger " wire:click="removeField({{ $index }})"><i
                                        class="bx bx-trash"></i></p>
                            </div>
                            @endforeach
                        </div>

                        <p class="text-end">
                        <div class="dropdown text-end">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-plus"></i> {{ __('formyp.choose_other_social_media') }}
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
                            <span wire:loading.remove wire:target="submit">{{ __('formyp.submit_btn') }}</span>
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