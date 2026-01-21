<div class="row g-4">
    <style>
        .vcard-header {
            padding: 2rem 1rem;
            text-align: center;
            border-radius: 0.5rem;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .profile-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            z-index: 10;
        }

        .section-divider {
            display: block;
            margin: 1.5rem 0 1rem;
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 700;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 0.25rem;
        }

        .trash-btn {
            cursor: pointer;
            transition: color 0.2s;
        }

        .trash-btn:hover {
            color: #dc3545 !important;
        }
    </style>

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="border-0 shadow-sm card">
            <div class="card-body p-4">
                <div class="container p-0">
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form wire:submit.prevent="submit">
                        <div class="vcard-header mb-4" style="background-color: {{ $color_code }}">
                            <div class="position-absolute top-0 start-0 m-3 text-start">
                                <label for="color_value" class="form-label small fw-bold mb-1">{{
                                    __('formyp.select_color') }} *</label>
                                <input type="color" id="color_value" class="form-control form-control-color"
                                    wire:model.live.debounce.500ms="color_code" title="{{ __('formyp.choose_color') }}">
                                @error('color_code') <div class="text-danger xsmall">{{ $message }}</div> @enderror
                            </div>

                            <div class="row mt-3 justify-content-center">
                                <div class="col-8">
                                    <div class="profile-container mb-2">
                                        <img src="{{ $photo ? $photo->temporaryUrl() : ($profile ? asset('storage/' . $profile) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg') }}"
                                            class="profile-img" alt="Profile">
                                        <div wire:loading wire:target="photo" class="loading-overlay">
                                            <i class="fas fa-spinner fa-spin fa-2x"></i>
                                        </div>
                                    </div>
                                    <label
                                        class="form-label fw-bold small text-white bg-dark px-2 rounded mb-1 d-block mx-auto"
                                        style="width: fit-content;">{{ __('formyp.your_photo') }}</label>
                                    <input type="file" class="form-control form-control-sm" wire:model.live="photo"
                                        accept="image/*">
                                </div>
                            </div>
                            @error('photo') <div class="text-danger mt-2 small bg-white d-inline-block px-2 rounded">{{
                                $message }}</div> @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.first_name') }} *</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.name') }}"
                                    wire:model.blur="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.last_name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.surname') }}"
                                    wire:model.blur="surname">
                                @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>

                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.category') }} *</label>
                                <select class="form-select" wire:model.live="category_id">
                                    <option value="">{{ __('formyp.select_category') }}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.prarang_city') }} *</label>
                                <select class="form-select" wire:model.live="city_id">
                                    <option value="">{{ __('formyp.select_prarang_city') }}</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <span class="section-divider">{{ __('formyp.enter_your_address') }}</span>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.house_number') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.enter_house_no') }}"
                                    wire:model.blur="house_number">
                                @error('house_number')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.road_street') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.road_street') }}"
                                    wire:model.blur="road_street">
                                @error('road_street')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.address_label') }} *</label>
                                <textarea class="form-control" rows="2" placeholder="{{ __('formyp.enter_area_name') }}"
                                    wire:model.blur="area_name"></textarea>
                                @error('area_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.your_city') }} *</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.your_city') }}"
                                    wire:model.blur="cityname">
                                @error('cityname')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.state_province') }} *</label>
                                <select class="form-select" wire:model.live="state">
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
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.your_country') }}</label>
                                <input type="text" value="{{ __('formyp.india') }}" class="form-control" readonly
                                    disabled>
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.pincode') }} *</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.pincode') }}"
                                    wire:model.blur="pincode">
                                @error('pincode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <span class="section-divider">{{ __('formyp.contact_info') }}</span>

                        <div class="row g-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.phone_number') }} *</label>
                                <input type="text" class="form-control" placeholder="{{ __('formyp.enter_phone') }}"
                                    wire:model.blur="phone">
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.email_label') }}</label>
                                <input type="email" class="form-control" placeholder="{{ __('formyp.email_label') }}"
                                    wire:model.blur="email">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6 text-start">
                                <label class="form-label fw-bold small">{{ __('formyp.dob') }}</label>
                                <input type="date" class="form-control" wire:model.blur="dob">
                                @error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <span class="section-divider">{{ __('formyp.social_media_links') }}</span>

                        <div class="mt-2">
                            @foreach($dynamicFields as $index => $field)
                            <div class="mb-3 d-flex align-items-end gap-2">
                                <div class="flex-grow-1 text-start">
                                    <label for="field_{{ $index }}" class="form-label small fw-bold">
                                        <i class="{{ $field['icon'] }} me-1"></i> {{ $field['name'] }}
                                    </label>
                                    <input type="{{ $field['type'] ?? 'text' }}" id="field_{{ $index }}"
                                        placeholder="{{ __('formyp.enter') }} {{ $field['name'] }}" class="form-control"
                                        wire:model.blur="dynamicFields.{{ $index }}.value">
                                </div>
                                <div class="pb-2">
                                    <span class="trash-btn text-muted" wire:click="removeField({{ $index }})"
                                        title="Remove">
                                        <i class="bx bx-trash fs-4"></i>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="dropdown text-end mt-2">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                id="socialMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-plus me-1"></i> {{ __('formyp.choose_other_social_media') }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="socialMenu">
                                @forelse ($options as $option)
                                @unless(collect($dynamicFields)->pluck('id')->contains($option['id']))
                                <li>
                                    <a class="dropdown-item py-2" href="javascript:void(0)"
                                        wire:click="addField({{ $option['id'] }})">
                                        <i class="{{ $option['icon'] }} me-2 text-muted"></i> {{ $option['name'] }}
                                    </a>
                                </li>
                                @endunless
                                @empty
                                <li><span class="dropdown-item disabled">No more options</span></li>
                                @endforelse
                            </ul>
                        </div>

                        <button type="submit" class="mt-4 btn btn-primary w-100 py-2 fw-bold shadow-sm">
                            <span wire:loading.remove wire:target="submit">
                                {{ __('formyp.submit_btn') }}
                            </span>
                            <span wire:loading wire:target="submit">
                                <i class="fas fa-spinner fa-spin me-2"></i> {{ __('formyp.submit') }}...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>