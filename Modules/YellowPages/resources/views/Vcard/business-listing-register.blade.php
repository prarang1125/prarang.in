@extends('yellowpages::layout.vcard.vcard')

@section('title', __('formyp.add_your_listing'))

@section('content')

    <style>
        /* Card title */
        .card .card-body .card-title {
            font-weight: 700;
            font-size: 24px;
        }

        /* Text uppercase */
        #listingForm .text-uppercase {
            padding-left: 4px;
            padding-right: 8px;
            padding-top: 10px;
            padding-bottom: 8px;
            font-weight: 700;
        }
    </style>

    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('formyp.vcard_breadcrumb') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('vCard.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('formyp.add_your_listing') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-business me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">{{ __('formyp.add_your_listing') }}</h5>
                        </div>
                        <p class="mb-4">{{ __('formyp.add_listing_details_sub') }}</p>
                        <hr>

                        <form action="{{ route('yp.listing.store') }}" method="POST" id="listingForm"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf

                            <!-- Section: Primary Details -->
                            <div class="col-12">
                                <h6 class="mb-0 text-uppercase">{{ __('formyp.primary_listing_details') }}</h6>
                                <hr>
                            </div>

                            <div class="col-md-6">
                                <label for="location" class="form-label">{{ __('formyp.location') }} <span
                                        class="text-danger">*</span></label>
                                <select id="location" class="form-select @error('location') is-invalid @enderror"
                                    name="location">
                                    <option selected disabled>{{ __('formyp.select_location') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('location', $user->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="listingTitle" class="form-label">{{ __('formyp.listing_title') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('listingTitle') is-invalid @enderror"
                                    id="listingTitle" name="listingTitle" value="{{ old('listingTitle') }}"
                                    placeholder="{{ __('formyp.enter_listing_title') }}">
                                @error('listingTitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="toggleTagline"
                                        onclick="toggleTaglineField()">
                                    <label class="form-check-label"
                                        for="toggleTagline">{{ __('formyp.has_tagline') }}</label>
                                </div>
                            </div>

                            <div class="col-md-12" id="taglineField" style="display: none;">
                                <label for="tagline" class="form-label">{{ __('formyp.tagline') }}</label>
                                <input type="text" class="form-control @error('tagline') is-invalid @enderror"
                                    id="tagline" name="tagline" value="{{ old('tagline') }}"
                                    placeholder="{{ __('formyp.enter_tagline') }}">
                                @error('tagline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="businessName" class="form-label">{{ __('formyp.business_name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('businessName') is-invalid @enderror"
                                    id="businessName" name="businessName" value="{{ old('businessName') }}"
                                    placeholder="{{ __('formyp.enter_business_name') }}">
                                @error('businessName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="businessType" class="form-label">{{ __('formyp.business_type') }} <span
                                        class="text-danger">*</span></label>
                                <select id="businessType" class="form-select @error('businessType') is-invalid @enderror"
                                    name="businessType">
                                    <option selected disabled>{{ __('formyp.select_type') }}</option>
                                    @foreach ($company_legal_type as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('businessType') == $type->id ? 'selected' : '' }}>
                                            {{ __('yp.biz_type.' . $type->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('businessType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="employees" class="form-label">{{ __('formyp.employee_range') }} <span
                                        class="text-danger">*</span></label>
                                <select id="employees" class="form-select @error('employees') is-invalid @enderror"
                                    name="employees">
                                    <option selected disabled>{{ __('formyp.select_employee_count') }}</option>
                                    @foreach ($number_of_employees as $range)
                                        <option value="{{ $range->id }}"
                                            {{ old('employees') == $range->id ? 'selected' : '' }}>
                                            {{ __('yp.emp_no.' . $range->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employees')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="turnover" class="form-label">{{ __('formyp.turnover') }} <span
                                        class="text-danger">*</span></label>
                                <select id="turnover" class="form-select @error('turnover') is-invalid @enderror"
                                    name="turnover">
                                    <option selected disabled>{{ __('formyp.select_turnover') }}</option>
                                    @foreach ($monthly_turnovers as $turnover)
                                        <option value="{{ $turnover->id }}"
                                            {{ old('turnover') == $turnover->id ? 'selected' : '' }}>
                                            {{ __('yp.turnovers.' . $turnover->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('turnover')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="advertising" class="form-label">{{ __('formyp.advertising') }} <span
                                        class="text-danger">*</span></label>
                                <select id="advertising" class="form-select @error('advertising') is-invalid @enderror"
                                    name="advertising">
                                    <option selected disabled>{{ __('formyp.select_advertising') }}</option>
                                    @foreach ($monthly_advertising_mediums as $medium)
                                        <option value="{{ $medium->id }}"
                                            {{ old('advertising') == $medium->id ? 'selected' : '' }}>
                                            {{ __('yp.ad_type.' . $medium->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('advertising')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="advertising_price" class="form-label">{{ __('formyp.ad_price_label') }} <span
                                        class="text-danger">*</span></label>
                                <select id="advertising_price"
                                    class="form-select @error('advertising_price') is-invalid @enderror"
                                    name="advertising_price">
                                    <option selected disabled>{{ __('formyp.select_ad_price') }}</option>
                                    @foreach ($monthly_advertising_prices as $price)
                                        <option value="{{ $price->id }}"
                                            {{ old('advertising_price') == $price->id ? 'selected' : '' }}>
                                            {{ __('yp.ad_price.' . $price->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('advertising_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">{{ __('formyp.category') }} <span
                                        class="text-danger">*</span></label>
                                <select id="category" class="form-select @error('category') is-invalid @enderror"
                                    name="category">
                                    <option selected disabled>{{ __('formyp.select_category_opt') }}</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category') == $cat->id ? 'selected' : '' }}>
                                            {{ __('yp.' . $cat->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Section: Contact Details -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-0 text-uppercase">{{ __('formyp.contact_info') }}</h6>
                                <hr>
                            </div>

                            <div class="col-md-4">
                                <label for="primaryContact" class="form-label">{{ __('formyp.primary_contact') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('primaryContact') is-invalid @enderror"
                                    id="primaryContact" name="primaryContact"
                                    value="{{ old('primaryContact', $user->name) }}"
                                    placeholder="{{ __('formyp.enter_primary_contact') }}">
                                @error('primaryContact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="primaryPhone" class="form-label">{{ __('formyp.primary_phone') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('primaryPhone') is-invalid @enderror"
                                    id="primaryPhone" name="primaryPhone"
                                    value="{{ old('primaryPhone', $user->phone) }}"
                                    placeholder="{{ __('formyp.enter_primary_phone') }}">
                                @error('primaryPhone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="primaryEmail" class="form-label">{{ __('formyp.primary_email') }} <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('primaryEmail') is-invalid @enderror"
                                    id="primaryEmail" name="primaryEmail"
                                    value="{{ old('primaryEmail', $user->email) }}"
                                    placeholder="{{ __('formyp.enter_primary_email') }}">
                                @error('primaryEmail')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="website" class="form-label">{{ __('formyp.website') }}</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website') }}"
                                    placeholder="{{ __('formyp.enter_website') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Section: Address Details -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-0 text-uppercase">{{ __('formyp.address_details') }}</h6>
                                <hr>
                            </div>

                            <div class="col-md-3">
                                <label for="house_number" class="form-label">{{ __('formyp.house_number') }}</label>
                                <input type="text" class="form-control @error('house_number') is-invalid @enderror"
                                    id="house_number" name="house_number" value="{{ old('house_number') }}"
                                    placeholder="{{ __('formyp.enter_house_no') }}">
                                @error('house_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="street" class="form-label">{{ __('formyp.road_street') }}</label>
                                <input type="text" class="form-control @error('street') is-invalid @enderror"
                                    id="street" name="street" value="{{ old('street') }}"
                                    placeholder="{{ __('formyp.road_street') }}">
                                @error('street')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="area_name" class="form-label">{{ __('formyp.area_name_public') }}</label>
                                <input type="text" class="form-control @error('area_name') is-invalid @enderror"
                                    id="area_name" name="area_name" value="{{ old('area_name') }}"
                                    placeholder="{{ __('formyp.enter_area_name') }}">
                                @error('area_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="city_id" class="form-label">{{ __('yp.country_city') }}</label>
                                <select id="city_id" class="form-select @error('city_id') is-invalid @enderror"
                                    name="city_id">
                                    <option selected disabled>{{ __('yp.select_country_city') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="postal_code" class="form-label">{{ __('formyp.pincode') }}</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    id="postal_code" name="postal_code" value="{{ old('postal_code') }}"
                                    placeholder="{{ __('formyp.enter_pincode') }}">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Section: Description -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-0 text-uppercase">{{ __('formyp.more_info') }}</h6>
                                <hr>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">{{ __('formyp.description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="{{ __('formyp.enter_description') }}">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Section: Working Hours -->
                            <div class="col-12 mt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0 text-uppercase">{{ __('formyp.working_hours') }}</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addWorkingHour()">
                                        <i class="bx bx-plus"></i> {{ __('formyp.add_day') }}
                                    </button>
                                </div>
                                <hr>
                            </div>

                            <div class="col-12">
                                <div id="workingHoursContainer">
                                    @if (old('day'))
                                        @foreach (old('day') as $index => $dayValue)
                                            <div class="row g-2 mb-3 align-items-end working-hour-row">
                                                <div class="col-md-3">
                                                    <label class="form-label small">{{ __('formyp.select_day') }}</label>
                                                    <select name="day[]" class="form-select form-select-sm">
                                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                            <option value="{{ strtolower($day) }}"
                                                                {{ $dayValue == strtolower($day) ? 'selected' : '' }}>
                                                                {{ __('formyp.' . strtolower($day)) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label small">Open</label>
                                                    <input type="time" name="open_time[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ old('open_time.' . $index) }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label small">Close</label>
                                                    <input type="time" name="close_time[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ old('close_time.' . $index) }}">
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="is_24_hours[{{ $index }}]" value="1"
                                                            {{ old('is_24_hours.' . $index) ? 'checked' : '' }}>
                                                        <label class="form-check-label small"
                                                            for="is_24_hours">{{ __('formyp.24_hours') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="removeRow(this)">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Section: Social Media -->
                            <div class="col-12 mt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0 text-uppercase">{{ __('formyp.social_media_links') }}</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="addSocialMedia()">
                                        <i class="bx bx-plus"></i> {{ __('formyp.add_new') }}
                                    </button>
                                </div>
                                <hr>
                            </div>

                            <div class="col-12">
                                <div id="socialMediaContainer">
                                    @if (old('socialId'))
                                        @foreach (old('socialId') as $index => $socialId)
                                            <div class="row g-2 mb-3 align-items-end social-media-row">
                                                <div class="col-md-4">
                                                    <label
                                                        class="form-label small">{{ __('formyp.select_social_media') }}</label>
                                                    <select name="socialId[]" class="form-select form-select-sm">
                                                        @foreach ($social_media as $platform)
                                                            <option value="{{ $platform->id }}"
                                                                {{ $socialId == $platform->id ? 'selected' : '' }}>
                                                                {{ __('yp.social_types.' . $platform->id) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label small">{{ __('formyp.enter_link_desc') }}</label>
                                                    <input type="text" name="socialDescription[]"
                                                        class="form-control form-control-sm"
                                                        value="{{ old('socialDescription.' . $index) }}"
                                                        placeholder="https://...">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="removeRow(this)">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Section: Media -->
                            <div class="col-12 mt-4">
                                <h6 class="mb-0 text-uppercase">{{ __('formyp.media') }}</h6>
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">{{ __('formyp.cover_image') }}</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" accept="image/*">
                                <div class="form-text text-muted">Max size: 200KB. Formats: jpeg, png, jpg, gif.</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox"
                                        id="agree" name="agree" value="1"
                                        {{ old('agree') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="agree">
                                        {{ __('formyp.agree_terms') }}
                                    </label>
                                    @error('agree')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-5">
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-primary px-5">{{ __('formyp.submit_btn') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleTaglineField() {
            const taglineField = document.getElementById('taglineField');
            const checkbox = document.getElementById('toggleTagline');
            taglineField.style.display = checkbox.checked ? 'block' : 'none';
        }

        function removeRow(btn) {
            btn.closest('.row').remove();
        }

        let workingHourIndex = {{ old('day') ? count(old('day')) : 0 }};

        function addWorkingHour() {
            const container = document.getElementById('workingHoursContainer');
            const html = `
            <div class="row g-2 mb-3 align-items-end working-hour-row animate__animated animate__fadeIn">
                <div class="col-md-3">
                    <label class="form-label small">{{ __('formyp.select_day') }}</label>
                    <select name="day[]" class="form-select form-select-sm">
                        <option value="monday">{{ __('formyp.monday') }}</option>
                        <option value="tuesday">{{ __('formyp.tuesday') }}</option>
                        <option value="wednesday">{{ __('formyp.wednesday') }}</option>
                        <option value="thursday">{{ __('formyp.thursday') }}</option>
                        <option value="friday">{{ __('formyp.friday') }}</option>
                        <option value="saturday">{{ __('formyp.saturday') }}</option>
                        <option value="sunday">{{ __('formyp.sunday') }}</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Open</label>
                    <input type="time" name="open_time[]" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label class="form-label small">Close</label>
                    <input type="time" name="close_time[]" class="form-control form-control-sm">
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="is_24_hours[${workingHourIndex}]" value="1">
                        <label class="form-check-label small">{{ __('formyp.24_hours') }}</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this)">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', html);
            workingHourIndex++;
        }

        function addSocialMedia() {
            const container = document.getElementById('socialMediaContainer');
            const html = `
            <div class="row g-2 mb-3 align-items-end social-media-row animate__animated animate__fadeIn">
                <div class="col-md-4">
                    <label class="form-label small">{{ __('formyp.select_social_media') }}</label>
                    <select name="socialId[]" class="form-select form-select-sm">
                        @foreach ($social_media as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small">{{ __('formyp.enter_link_desc') }}</label>
                    <input type="text" name="socialDescription[]" class="form-control form-control-sm" placeholder="https://...">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this)">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', html);
        }

        // Initialize with one row if empty and no old input
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('workingHoursContainer').children.length === 0) {
                addWorkingHour();
            }
            if (document.getElementById('socialMediaContainer').children.length === 0) {
                addSocialMedia();
            }
        });
    </script>

    <style>
        .animate__fadeIn {
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-weight: 500;
        }

        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
@endpush
