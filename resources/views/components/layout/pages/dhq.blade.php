<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $data['town']['town_name'] ?? 'City' }} | {{ $data['town']['district'] ?? "-" }} | {{
        $data['town']['State_UT_Name'] ?? "-" }} </title>
    <meta name="title" content="{{  $data['town']['town_name'] ?? 'City' }}  | {{ $data['town']['district'] ?? " -" }} |
        {{ $data['town']['State_UT_Name'] ?? "-" }} ">
    <meta name=" description" content="{{ strip_tags($data['slm']['district'] ?? '' ) }}">
    <meta name="keywords"
        content="{{  $data['name'] ?? '' }}, {{ $data['district']['district_name'] ?? '' }}, {{ $data['state']['state_name'] ?? '' }}, Village, Rural, India, Culture, Nature, Demographics, Economy, History">
    <meta property="og:title" content="{{  $data['town']['town_name'] ?? 'City' }}  | {{ $data['town']['district'] ?? "
        -" }} | {{ $data['town']['State_UT_Name'] ?? "-" }} ">
    <meta property=" og:description" content="{{ strip_tags($data['slm']['district'] ?? '' ) }}">
    <meta property="og:image"
        content="{{ asset('assets/images/rural_states/' . ($data['state']['state_LGD_code'] ?? 'default') . '.jpg') }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dhq-style.css') }}">
</head>

<body>
    <header class="py-6">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-1 lg:gap-8 items-center">
                <!-- Search Trigger -->
                <div class="lg:col-span-3 grid grid-cols-2 gap-4 order-3 lg:order-1 items-center">
                    <!-- Grid Item 1: Logo -->
                    <div class="logo-en-dark flex justify-center">
                        <img src="https://i.ibb.co/TDKtQQrd/prarang-logo-dark.png" alt="Prarang Logo" class="max-h-16">
                    </div>

                    <!-- Grid Item 2: Clock -->
                    <!-- Premium Clock Component -->
                    <div class="flex justify-center">
                        <div
                            class="bg-gray-900 border border-gray-800 rounded-2xl p-2 px-4 shadow-xl w-full max-w-[180px] relative overflow-hidden group/clock transition-all duration-300 hover:border-blue-500/40">
                            <!-- Subtle Background Glow -->
                            <div class="absolute -top-4 -right-4 w-12 h-12 bg-blue-500/10 blur-2xl rounded-full"></div>

                            <div class="flex items-center gap-1.5 mb-1.5">
                                <div class="relative">
                                    <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                                    <div
                                        class="absolute inset-0 w-1.5 h-1.5 rounded-full bg-green-400 animate-ping opacity-75">
                                    </div>
                                </div>
                                <span class="text-[9px] font-black uppercase tracking-[0.15em] text-gray-400">
                                    {{ $data['dhq']['city'] ?? 'Local' }} Time
                                </span>
                            </div>

                            <div class="flex items-baseline gap-1">
                                <div id="realtime-clock"
                                    class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-300 tabular-nums">
                                    00:00:00
                                </div>
                                <div id="realtime-ampm" class="text-[10px] font-black text-blue-500 uppercase mb-0.5">AM
                                </div>
                            </div>

                            <div id="realtime-date"
                                class="text-[9px] mt-1 text-gray-500 font-bold uppercase tracking-wider leading-none">
                                Loading...
                            </div>
                        </div>
                    </div>

                    <!-- Grid Item 3: Filter -->
                    <div class="flex justify-center">
                        <div class="w-full">
                            @livewire('utility.village-town-filter', ['type' => 'town'])
                        </div>
                    </div>

                    <!-- Grid Item 4: Upmana AI -->
                    <div class="flex justify-center relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open"
                            class="flex items-center gap-2 p-1.5 px-3 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-gray-300 transition-all duration-300 w-full group/ai">

                            <div
                                class="flex items-center justify-center w-7 h-7 bg-indigo-50 rounded-lg group-hover/ai:bg-indigo-100 transition-all duration-300 flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.364-6.364l-.707-.707M6.364 18.364l-.707.707M18.364 18.364l-.707.707M12 21v-1m0-5a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                            </div>

                            <div class="flex flex-col items-start text-left overflow-hidden">
                                <span
                                    class="text-[8px] text-indigo-600 font-black tracking-widest uppercase truncate">Upmana</span>
                                <span class="text-[12px] text-gray-900 font-bold flex items-center gap-1 leading-tight">
                                    A.I.
                                    <svg class="w-2.5 h-2.5 text-gray-400 group-hover/ai:text-indigo-500 transition-colors"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </div>
                        </button>

                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute z-50 top-full mt-2 left-0 right-0 bg-white border border-gray-100 rounded-xl shadow-xl p-1.5">

                            <a href="https://www.prarang.in/ai/upmana/hi" target="_blank"
                                class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-indigo-50 text-gray-700 hover:text-indigo-600 transition-all group/opt">
                                <span
                                    class="text-[10px] font-black tracking-widest text-indigo-200 group-hover/opt:text-indigo-400">HI</span>
                                <span class="text-[11px] font-bold">Hindi</span>
                            </a>
                            <a href="https://www.prarang.in/ai/upmana" target="_blank"
                                class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-indigo-50 text-gray-700 hover:text-indigo-600 transition-all group/opt">
                                <span
                                    class="text-[10px] font-black tracking-widest text-indigo-200 group-hover/opt:text-indigo-400">EN</span>
                                <span class="text-[11px] font-bold">English</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Branding -->
                <div class="lg:col-span-6 flex flex-col items-center order-1 lg:order-2">
                    <div class="flex items-center mb-4 group cursor-default">
                        <div>
                            <img class="h-20 w-20" src="https://www.prarang.in/assets/images/home/town-1.png"
                                alt="Village Icon">
                        </div>
                        <div>
                            <h1
                                class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 ml-6 tracking-tight">
                                {{ $data['dhq']['city'] ?? '-' }}
                                @switch($data['dhq']['MSTR24'])
                                @case('SC')
                                State Capital
                                @break
                                @case('DC')
                                District Capital
                                @break
                                @default
                                City
                                @endswitch
                            </h1>
                        </div>
                    </div>
                    <div
                        class="px-6 py-1.5 rounded-full bg-blue-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <div id="subscribe-trigger"
                            class="text-center text-lg font-medium text-white cursor-pointer tracking-wide">
                            Join now for a free subscription
                        </div>
                    </div>
                    {{-- <div class="px-6 py-1.5 rounded-full bg-gray-50 border border-gray-100">
                        <p class="text-center text-lg font-medium text-gray-500 tracking-wide">
                            @if(($data['town']['Town_Code'] ?? null) == 800864)
                            Capital of Panchalas – Ancient Indian Metropolis but now a City
                            @endif
                        </p>
                    </div> --}}
                </div>

                <!-- Village Stats -->
                <div class="lg:col-span-3 order-2 lg:order-3">
                    <div class="flex flex-col gap-2 w-full md:w-72 ml-auto">
                        <!-- Stats -->
                        <div
                            class="bg-black text-white p-2 px-3 rounded-lg border border-gray-700 text-[11px] shadow-lg">
                            <div class="flex justify-between items-center py-1">
                                <span class="font-medium">{{ $data['dhq']['city'] ?? '-' }} Local
                                    Subscribers:</span>
                                <span class="font-bold text-green-400" id="city-subscriber-count">0</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-t border-gray-800">
                                <span class="font-medium">{{ $data['dhq']['city'] ?? '-' }} Webpage Monthly
                                    Reach:</span>
                                <span class="font-bold text-blue-400" id="city-monthly-count">0</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-t border-gray-800">
                                <span class="font-medium">Today's {{ $data['dhq']['city'] ?? '-' }} Readers:</span>
                                <span class="font-bold text-amber-400" id="city-daily-count">0</span>
                            </div>
                        </div>
                        <!-- Login Buttons -->
                        <div class="flex gap-2 justify-center items-center">
                            <a target="_blank" href="https://b2b.prarang.in/login?lt=partner"
                                class="btn btn-yellow w-full bg-amber-400 hover:bg-amber-500 text-black text-[11px] font-bold py-1.5 rounded-md shadow-md text-center transition-colors">Business
                                Login</a>
                            <a target="_blank" href="https://b2b.prarang.in/login?lt=g2c"
                                class="btn btn-yellow w-full bg-amber-400 hover:bg-amber-500 text-black text-[11px] font-bold py-1.5 rounded-md shadow-md text-center transition-colors">Govt.
                                &amp; NGO Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        {{ $slot }}
    </main>

    {{-- footer --}}
    <footer class="mt-32 px-6 py-12 text-gray-800"
        style="background-color: #fff; background-image: url(''); background-size: cover; background-position: center;">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                <!-- About Section -->
                <div class="space-y-4">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block">
                        About Prarang
                    </h4>
                    <p class="text-sm leading-relaxed opacity-90">
                        Prarang provides comprehensive information for understanding cities both in India and abroad.
                        This includes Knowledge Webs of a city's nature and culture in the local language, Yellow Pages
                        for city business listings, detailed analysis of city metrics and statistics, and unique
                        AI-powered insights derived from city residents.
                    </p>
                </div>

                <!-- Social Links -->
                <div class="space-y-6">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block text-center">
                        Follow Us
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-xs mx-auto md:mx-0">
                        <a href="https://www.facebook.com/prarang.in" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-facebook text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">Facebook</span>
                        </a>

                        <a href="https://www.instagram.com/prarang_in/?hl=en" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-instagram text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">Instagram</span>
                        </a>
                        <a href="https://www.linkedin.com/company/indeur-prarang/" target="_blank"
                            class="flex items-center justify-center md:justify-start gap-3 p-3 bg-white/20 hover:bg-white/40 rounded-xl transition-all group backdrop-blur-sm border border-white/30 no-underline text-gray-800">
                            <i class="fa fa-linkedin text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm">LinkedIn</span>
                        </a>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="space-y-4">
                    <h4 class="text-xl font-bold border-b-2 border-red-500 pb-2 inline-block md:block">
                        <i class="fa fa-map-marker me-2"></i> Address
                    </h4>
                    <div class="space-y-2 text-sm opacity-90">
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Office:</span>
                            Office #25, 11th Floor, The I-Thum, A40,
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Sector:</span>
                            Sector 62, Noida (U.P), India 201309
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Phone:</span>
                            0120-4561284
                        </p>
                        <p class="flex items-start gap-2 justify-center md:justify-start">
                            <span class="font-bold text-red-600">Email:</span>
                            <a href="mailto:query@prarang.in"
                                class="hover:text-red-700 underline decoration-red-400">query@prarang.in</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="mt-12 pt-8 border-t border-black/10 text-center">
                <p class="text-sm font-medium opacity-80">
                    © - 2026 All content on this website, including text, graphics, logos, button icons, software,
                    images, and their selection, arrangement, presentation, and overall design, is the property of
                    Indoeuropeans India Pvt. Ltd. and is protected by international copyright laws.
                </p>
            </div>
        </div>
    </footer>
    <!-- Subscription Modal -->
    <!-- Subscription Modal -->
    <div id="subscribeModal" class="fixed inset-0 z-[9999] hidden items-center justify-center p-4">
        <!-- Backdrop -->
        <div id="modalBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal Content -->
        <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-95 opacity-0 duration-300"
            id="modalContainer">
            <!-- Close Button -->
            <button id="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fa fa-times text-xl"></i>
            </button>

            <div class="p-8" id="formContent">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-envelope text-2xl text-blue-600"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Subscribe Now</h2>
                    {{-- <p class="text-gray-500 mt-2 text-sm">Stay connected with {{ $data['dhq']['city'] ?? 'your
                        city'
                        }}'s latest cultural & nature updates.</p> --}}
                </div>

                <form id="subscriptionForm" class="space-y-4">
                    <!-- City (Auto-filled) -->
                    <div>
                        <label
                            class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 px-1">City</label>
                        <input type="text" name="city" value="{{ $data['dhq']['city'] ?? '' }}" readonly
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 font-semibold focus:outline-none cursor-not-allowed">
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 px-1">Full
                            Name</label>
                        <input type="text" name="name" required placeholder="e.g. Vivek Yadav"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none">
                    </div>



                    <!-- Mobile -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 px-1">Mobile
                            No.</label>
                        <input type="tel" name="mobile" required placeholder="e.g. 7619876249"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none">
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 px-1">Email
                            (Optional)</label>
                        <input type="email" name="email" placeholder="e.g. aa@aa.aa"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none">
                    </div>

                    <button type="submit" id="submitBtn"
                        class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg hover:shadow-blue-200 transition-all transform active:scale-95 flex items-center justify-center gap-2 mt-6">
                        <span>Subscribe Now</span>
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </form>
            </div>

            <!-- Success Message (Hidden by default) -->
            <div class="hidden p-12 text-center" id="successContent">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa fa-check text-4xl text-green-600"></i>
                </div>
                <h2 class="text-3xl font-black text-gray-900 mb-2">Thank You!</h2>
                <p class="text-gray-600 text-lg">You have successfully subscribed to <span
                        class="font-bold text-blue-600">{{ $data['dhq']['city'] ?? '' }}</span> updates.</p>
                <button id="finishBtn"
                    class="mt-8 px-8 py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('subscribeModal');
            const modalContainer = document.getElementById('modalContainer');
            const trigger = document.getElementById('subscribe-trigger');
            const closeBtn = document.getElementById('closeModal');
            const backdrop = document.getElementById('modalBackdrop');
            const form = document.getElementById('subscriptionForm');
            const formContent = document.getElementById('formContent');
            const successContent = document.getElementById('successContent');
            const finishBtn = document.getElementById('finishBtn');
            const submitBtn = document.getElementById('submitBtn');

            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modalContainer.classList.remove('scale-95', 'opacity-0');
                    modalContainer.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeModal() {
                modalContainer.classList.remove('scale-100', 'opacity-100');
                modalContainer.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    // Reset content for next time
                    formContent.classList.remove('hidden');
                    successContent.classList.add('hidden');
                    form.reset();
                }, 300);
            }

            trigger.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            backdrop.addEventListener('click', closeModal);
            finishBtn.addEventListener('click', closeModal);

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                // Show loading state
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';

                fetch('/api/v1/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (response.ok) {
                        formContent.classList.add('hidden');
                        successContent.classList.remove('hidden');
                    } else {
                        throw new Error('Subscription failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                });
            });

            // ---- Stats Fetching Logic ----
            const citySubscriberPlaceHolder = document.getElementById('city-subscriber-count');
            const cityMonthlyPlaceHolder = document.getElementById('city-monthly-count');
            const cityDailyPlaceHolder = document.getElementById('city-daily-count');
            const cityCode = @json($data['portal']['city_code']??'');
            if (cityCode) {
                // ---- Subscribers Count ----
                fetch(`https://b2b.prarang.in/api/readers?city_code=${cityCode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.data && data.data.reader_info) {
                            const totalSubscribers =
                                Number(data.data.reader_info.a1 || 0) +
                                Number(data.data.reader_info.a2 || 0) +
                                Number(data.data.reader_info.a3 || 0);

                            animateCounter(citySubscriberPlaceHolder, totalSubscribers, 1500);
                            animateCounter(cityMonthlyPlaceHolder, Number(data.data.reader_info.c1 || 0), 1200);
                        }
                    })
                    .catch(error => console.error('Error fetching portal stats:', error));

                // ---- Daily Viewership ----
                const params = new URLSearchParams({
                    client: "prarang",
                    language: "hi",
                    location: cityCode,
                    per_page: 10
                });

                fetch(`https://www.prarang.in/api/v1/daily-posts/list?${params.toString()}`, {
                        method: "GET",
                        headers: { "Accept": "application/json" }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error(`HTTP ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        const dailyViews = Number(data.data.viewership || 0);
                        animateCounter(cityDailyPlaceHolder, dailyViews, 1200);
                    })
                    .catch(error => console.error("Error fetching daily posts:", error));
            }

            // Clock logic (existing)
            function updateClock() {
                const now = new Date();
                let hours = now.getHours();
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                const ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12;

                const displayHours = String(hours).padStart(2, '0');
                const strTime = `${displayHours}:${minutes}:${seconds}`;
                const options = { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' };
                const strDate = now.toLocaleDateString('en-US', options);

                const clockEl = document.getElementById('realtime-clock');
                const ampmEl = document.getElementById('realtime-ampm');
                const dateEl = document.getElementById('realtime-date');

                if(clockEl) clockEl.textContent = strTime;
                if(ampmEl) ampmEl.textContent = ampm;
                if(dateEl) dateEl.textContent = strDate;
            }

            function animateCounter(element, target, duration = 1200) {
                if (!element) return;
                let start = 0;
                const startTime = performance.now();

                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const value = Math.floor(progress * target);
                    element.textContent = value.toLocaleString('en-IN');

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    }
                }

                requestAnimationFrame(update);
            }

            setInterval(updateClock, 1000);
            updateClock();
        });
    </script>
</body>

</html>
