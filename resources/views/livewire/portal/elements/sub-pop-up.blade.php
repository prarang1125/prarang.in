<div>
    <style>
        @keyframes colorful-blink {
            0% {
                color: #ef4444;
                text-shadow: 0 0 10px rgba(239, 68, 68, 0.4);
            }

            25% {
                color: #3b82f6;
                text-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
            }

            50% {
                color: #10b981;
                text-shadow: 0 0 10px rgba(16, 185, 129, 0.4);
            }

            75% {
                color: #f59e0b;
                text-shadow: 0 0 10px rgba(245, 158, 11, 0.4);
            }

            100% {
                color: #ef4444;
                text-shadow: 0 0 10px rgba(239, 68, 68, 0.4);
            }
        }

        .animate-colorful-blink {
            animation: colorful-blink 4s linear infinite;
        }

        /* Open modalx */
        #openModalx {
            height: 105px;
        }

        /* Open modalx */
        /* #openModalx {
            background-image: url("https://www.prarang.in/images/sub-main-bg.png");
            background-size: cover;
            min-height: 141px;
            padding-right: 5px;
            padding-left: 153px;
        } */

        /* Heading */
        .w-full .lg\:flex-row .w-full div .w-full .overflow-hidden #openModalx .w-full h3 {
            width: 97% !important;
        }

        /* Heading */
        #openModalx .w-full h3 {
            font-size: 30px;
            position: relative;
            top: -10px;
        }
    </style>

    @if (!$isSubscribed)
        <div class="w-full">
            <div class="relative  rounded overflow-hidden shadow-lg border border-white group">
                {{-- Background Image --}}
                <div
                    class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-110">
                    {{-- Darken overlay for better text contrast if needed --}}
                    <div class="absolute inset-0 bg-white/20 backdrop-blur-[2px]"></div>
                </div>

                {{-- Content Overlay --}}
                <a href="javascript:void(0)" id="openModalx"
                    class="relative z-10 flex items-center justify-center h-full w-full px-6 py-8 no-underline">

                    <div class="w-full text-center">
                        @if ($showWelcome)
                            <h3 class="text-xl md:text-2xl font-bold text-green-700 animate-bounce">
                                {{ $locale['subscribe']['success'] ?? 'सफलता पूर्वक सब्सक्राइब हुआ' }}
                            </h3>
                        @else
                            <div class="flex flex-col md:flex-row items-center justify-center gap-4">

                                <h3
                                    class="flex flex-col gap-1 text-base md:text-xl lg:text-[30px] font-black leading-tight animate-colorful-blink tracking-tight">

                                    {{ $locale['subscribe']['city_daily_post'] ?? 'प्रारंग के' }}
                                    @if ($portal->city_name_local)
                                        {{ $portal->city_name_local }}
                                    @endif

                                    {{ $locale['subscribe']['daily_post_whatsapp_part1'] ?? 'दैनिक पोस्ट (Post) को' }}

                                    {{ $locale['subscribe']['daily_post_whatsapp_part2'] ?? 'प्रतिदिन WhatsApp पर पाए' }}

                                </h3>
                            </div>



                        @endif
                    </div>
                </a>
            </div>
        </div>

        <!-- Modal -->
        <div id="subscribeModal"
            class="hidden fixed inset-0 z-[9999] overflow-y-auto bg-black bg-opacity-60 backdrop-blur-sm items-center justify-center p-4 transition-all duration-300"
            wire:ignore.self>
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-md w-full relative overflow-hidden transform transition-all animate__animated animate__zoomIn animate__faster">
                <!-- Close Button -->
                <button
                    class="closex absolute top-4 right-5 text-gray-400 hover:text-gray-800 text-3xl font-bold transition-colors focus:outline-none">&times;</button>

                <div class="p-8">
                    @if ($showWelcome)
                        <section class="text-center">
                            <div
                                class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">
                                {{ $locale['subscribe']['welcome'] ?? 'आपका स्वागत है' }}
                            </h3>
                            <p class="text-gray-600">
                                {{ $locale['subscribe']['thanks'] ?? 'प्रारंग के साथ जुड़ने के लिए धन्यवाद.' }}
                            </p>
                        </section>
                    @else
                        <section>
                            <form wire:submit.prevent="register" class="space-y-5">
                                <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">
                                    {{ $locale['subscribe']['get_free_daily'] ?? 'प्रतिदिन मुफ़्त लेख प्राप्त करे' }}
                                </h3>

                                <!-- City Selection -->
                                <div>
                                    <label for="city"
                                        class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $locale['subscribe']['select_city'] ?? 'शहर चुनें:' }}</label>
                                    <select wire:change="validatePhone('city')" wire:model="city" id="city"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 transition-all @error('city') border-red-500 ring-1 ring-red-500 animate__animated animate__headShake @enderror">
                                        <option value="">
                                            {{ $locale['subscribe']['choose_city'] ?? 'कृपया शहर चुनें' }}</option>
                                        @foreach ($cities as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Name Input -->
                                <div>
                                    <label for="name"
                                        class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $locale['subscribe']['name_label'] ?? 'नाम:' }}</label>
                                    <input type="text" wire:model="name" wire:change="validatePhone('name')"
                                        id="name"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 transition-all @error('name') border-red-500 ring-1 ring-red-500 animate__animated animate__headShake @enderror"
                                        placeholder="{{ $locale['subscribe']['name_placeholder'] ?? 'नाम' }}">
                                    @error('name')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone Input -->
                                <div>
                                    <label for="phone"
                                        class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $locale['subscribe']['phone_label'] ?? 'फोन नंबर:' }}</label>
                                    <input type="text" wire:change="validatePhone('phone')"
                                        wire:model.debounce.250ms="phone" id="phone"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 transition-all @error('phone') border-red-500 ring-1 ring-red-500 animate__animated animate__headShake @enderror"
                                        placeholder="{{ $locale['subscribe']['phone_placeholder'] ?? 'फोन नंबर' }}">
                                    @error('phone')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Vcard Checkbox -->
                                <div class="flex items-center">
                                    <input
                                        class="w-5 h-5 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500"
                                        type="checkbox" wire:model="isVcard" wire:change="checkedVcard" id="isVcard">
                                    <label class="ml-2 text-sm font-medium text-gray-700 cursor-pointer" for="isVcard">
                                        {{ $locale['subscribe']['create_free_webpage'] ?? 'अपना मुफ़्त वेबपेज भी बनाएं' }}
                                    </label>
                                </div>

                                @if ($showPassword)
                                    <!-- Password Input -->
                                    <div>
                                        <label for="password"
                                            class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $locale['subscribe']['password_label'] ?? 'पासवर्ड:' }}</label>
                                        <input type="password" wire:change="validatePhone('password')"
                                            wire:model="password" id="password"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5 transition-all @error('password') border-red-500 ring-1 ring-red-500 animate__animated animate__headShake @enderror"
                                            placeholder="{{ $locale['subscribe']['password_placeholder'] ?? 'पासवर्ड दर्ज करे ' }}">
                                        @error('password')
                                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-bold rounded-lg text-lg px-5 py-3 text-center transition-all disabled:opacity-50 disabled:cursor-not-allowed group">
                                    <span wire:loading.remove>
                                        {{ $locale['subscribe']['subscribe_btn'] ?? 'सब्सक्राइब करें' }}
                                    </span>
                                    <div wire:loading class="flex items-center justify-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        प्रक्रिया में...
                                    </div>
                                </button>
                            </form>
                        </section>
                    @endif
                </div>
            </div>
        </div>
        <script>
            var modal = document.getElementById("subscribeModal");
            var btn = document.getElementById("openModalx");
            var span = document.getElementsByClassName("closex")[0];

            function openModal() {
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            }

            function closeModal() {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            }

            // Button click
            if (btn) {
                btn.onclick = function() {
                    openModal();
                    window.location.hash = "open"; // optional: keep URL in sync
                };
            }

            // Close button
            if (span) {
                span.onclick = function() {
                    closeModal();
                    history.replaceState(null, null, " "); // remove #open
                };
            }

            // Outside click
            window.onclick = function(event) {
                if (event.target === modal) {
                    closeModal();
                    history.replaceState(null, null, " ");
                }
            };

            // 🔥 AUTO OPEN if URL has #open
            window.addEventListener("load", function() {
                if (window.location.hash === "#open") {
                    openModal();
                }
            });
        </script>

    @endif
</div>
