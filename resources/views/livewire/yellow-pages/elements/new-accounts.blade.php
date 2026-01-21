<div>
    {{-- Internal styling removed to favor parent wrapper styles --}}
    <div class="registration-container">
        @if (session()->has('success'))
        <div class="alert alert-success py-3 px-4 small border-0 mb-4 rounded-4 animate__animated animate__fadeIn"
            style="background: rgba(40, 167, 69, 0.08); color: #28a745; display: flex; align-items: center;">
            <i class="fas fa-check-circle me-3 fs-5"></i> {{ session('success') }}
        </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                @if ($shareUrl)
                <div class="success-screen text-center animate__animated animate__fadeIn">
                    <div class="success-icon mb-4">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto"
                            style="width: 80px; height: 80px; background: rgba(255, 193, 7, 0.15); color: #ff9800;">
                            <i class="fas fa-rocket fa-2x"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold mb-3" style="color: #1a1a1a;">{{ __('yp.congratulations') }}</h2>
                    <p class="mb-4 text-muted">{{ __('yp.webpage_opened') }}</p>

                    <div class="share-url-box p-3 mb-4 rounded-4 border-2 border-dashed"
                        style="border-color: #ffc107; background: #fffbeb;">
                        <a href="{{ $shareUrl }}" class="fw-bold text-decoration-none" style="color: #e67e22;">{{
                            $shareUrl }}</a>
                    </div>

                    <p class="small text-muted mb-4">{!! __('yp.save_website_msg') !!}</p>

                    <div class="d-grid gap-3">
                        <a href="https://wa.me/?text={{ $shareUrl }}"
                            class="btn btn-primary d-flex align-items-center justify-content-center gap-2"
                            style="background: #25D366 !important; border: none !important;" target="_blank">
                            <i class="fab fa-whatsapp"></i> {{ __('yp.share_on_whatsapp') }}
                        </a>
                        <a href="sms:?body={{ $shareUrl }}"
                            class="btn btn-dark d-flex align-items-center justify-content-center gap-2" target="_blank">
                            <i class="fas fa-sms"></i> {{ __('yp.share_on_sms') }}
                        </a>
                    </div>
                </div>
                @else
                <form wire:submit.prevent="register" class="registration-form">
                    <h2 class="mb-2">{{ __('yp.registration_title') }}</h2>
                    <p class="text-muted mb-4 small">
                        {{ __('yp.registration_subtitle') }}
                    </p>

                    <!-- City Selection -->
                    <div class="mb-4">
                        <label for="city" class="form-label">{{ __('yp.country_city') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <select wire:model="city" id="city" class="form-select @error('city') is-invalid @enderror">
                                <option value="">{{ __('yp.select_country_city') }}</option>
                                @foreach ($cities as $cityItem)
                                <option value="{{ $cityItem->id }}">{{ $cityItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('city')
                        <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Name Input -->
                    <div class="mb-4">
                        <label for="name" class="form-label">{{ __('yp.name') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            <input type="text" wire:model="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ __('yp.username_placeholder') }}">
                        </div>
                        @error('name')
                        <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-4">
                        <label for="phone" class="form-label">{{ __('yp.phone_email_label') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" wire:model.debounce.250ms="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="{{ __('yp.enter_phone_email') }}">
                        </div>
                        @error('phone')
                        <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('yp.password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" wire:model="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('yp.enter_password') }}">
                        </div>
                        @error('password')
                        <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-3 mt-2 btn-register"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            {{ __('yp.register') }} <i class="fas fa-arrow-right ms-2 small"></i>
                        </span>
                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            {{ __('yp.loading') }}
                        </span>
                    </button>

                    <div class="footer-links">
                        {{ __('yp.already_have_account') }}
                        <a href="{{ route('yp.login') }}">{{ __('yp.login') }}</a>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>