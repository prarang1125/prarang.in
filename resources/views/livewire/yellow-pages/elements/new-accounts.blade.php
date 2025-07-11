<div>
    <style>
        .registration-form {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            font-size: 22px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .btn {
            width: 100%;
            {{-- background: #f39c12; --}} {{-- color: white; --}} padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn.loading {
            background: #e67e22;
        }

        .alert.success {
            color: green;
            padding: 10px;
            background: #e6ffe6;
            border: 1px solid green;
        }

        /* Form Division */
        .signin-signup div form {
            justify-content: flex-start;
            /* {{-- transform: translatex(0px) translatey(0px); --}} display: block; */
        }

        /* Small Tag */
        .registration-form .sign-in-form small {
            padding-left: 12px;
        }

        /* Button */
        .card p .btn-success {
            color: #ffffff !important;
        }

        /* Button */
        .card p .btn-primary {
            color: #ffffff !important;
        }

        /* Paragraph */
        .card section p {
            margin-bottom: 0px !important;
        }
    </style>
    <!-- Include Bootstrap & Animate.css -->


    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4 rounded" style="max-width: 400px; width: 100%;">
            @if (session()->has('success'))
                <div class="alert alert-success text-center animate__animated animate__fadeIn" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($shareUrl)
                <section>
                    <h1>🎉 बधाई हो! 🎉</h1>
                    <p>आपका अपना वेबपेज खुल गया है।</p>

                    <a href="{{ $shareUrl }}">{{ $shareUrl }}</a>
                    <p> <small>आप अपनी वेबसाइट को याद रखें या इसे याद रखने के लिए खुद को
                            <strong>WhatsApp</strong> या <strong>SMS</strong> करें।</small>
                    </p>
                   <div class="btnx">
                    <p>
                        <a href="https://wa.me/?text={{ $shareUrl }}" class="btn btn-success btn-block mb-2"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> WhatsApp पर साझा करें
                        </a>
                    </p>
                    <p>
                        <a href="sms:?body={{ $shareUrl }}" class="btn btn-primary btn-block mb-2" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fas fa-sms"></i> SMS पर साझा करें
                        </a>
                    </p>
                </div>

                </section>
            @else
                <form wire:submit.prevent="register" class="sign-in-form">
                    <h2 class="text-center text-primary mb-3">रजिस्ट्रेशन (Registration)</h2>

                    <!-- City Selection -->
                    <div class="mb-3">
                        <label for="city" class="form-label fw-bold">शहर चुनें:</label>
                        <select wire:change="validatePhone('city')" wire:model="city" id="city"
                            class="form-select @error('city') is-invalid animate__animated animate__headShake @enderror">
                            <option value="">कृपया शहर चुनें</option>
                            @foreach ($cities as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Name Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">नाम:</label>
                        <input type="text" wire:model="name" wire:change="validatePhone('name')" id="name"
                            class="form-control @error('name') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="उपयोगकर्ता नाम">
                        @error('name')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">फोन नंबर:</label>
                        <input type="text" wire:change="validatePhone('phone')" wire:model.debounce.250ms="phone"
                            id="phone"
                            class="form-control @error('phone') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="फोन नंबर दर्ज करें">
                        @error('phone')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">पासवर्ड:</label>
                        <input type="password" wire:change="validatePhone('password')" wire:model="password"
                            id="password"
                            class="form-control @error('password') is-invalid animate__animated animate__headShake @enderror"
                            placeholder="पासवर्ड दर्ज करें">
                        @error('password')
                            <small class="text-danger animate__animated animate__headShake">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <span wire:loading.remove>रजिस्टर (Register)</span>
                        <span wire:loading class="spinner-border spinner-border-sm"></span>
                    </button>
                </form>
                <a href="{{ route('yp.login') }}">पहले से खाता है? लॉगिन (Login) करें </a>

            @endif
        </div>
    </div>
</div>
