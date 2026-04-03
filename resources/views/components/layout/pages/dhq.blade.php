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
                    <div class="flex justify-center">
                        <div class="bg-[#5c5c5c] rounded-lg p-1.5 px-3 text-white shadow-sm w-full max-w-[160px]">
                            <div class="flex items-center gap-2 mb-0.5 opacity-90">
                                <i class="fa fa-clock-o text-[10px]"></i>
                                <span class="text-[10px] font-bold tracking-wide leading-none truncate">{{
                                    $data['dhq']['city'] ?? 'Local' }} Time</span>
                            </div>
                            <div id="realtime-clock"
                                class="text-sm font-bold text-[#9dc3b9] leading-none mb-1 font-mono">
                                00:00:00 AM
                            </div>
                            <div id="realtime-date"
                                class="text-[9px] opacity-80 font-medium font-sans text-center leading-none">
                                Loading date...
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
                                {{ $data['dhq']['city'] ?? '-' }} City Capital
                            </h1>
                        </div>
                    </div>
                    <div class="px-6 py-1.5 rounded-full bg-gray-50 border border-gray-100  bg-blue-700 ">
                        <p class="text-center text-lg font-medium text-white cursor-pointer tracking-wide">
                            Join now for a free subscription
                        </p>
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
                                <span class="font-medium">{{ $data['dhq']['city'] ?? '-' }} Local Subscribers:</span>
                                <span class="font-bold text-green-400" id="city-subscriber-count"></span>
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
    <script>
        function updateClock() {
                            const now = new Date();

                            // Format Time: 08:02:46 AM
                            let hours = now.getHours();
                            const minutes = String(now.getMinutes()).padStart(2, '0');
                            const seconds = String(now.getSeconds()).padStart(2, '0');
                            const ampm = hours >= 12 ? 'PM' : 'AM';
                            hours = hours % 12;
                            hours = hours ? hours : 12; // the hour '0' should be '12'
                            const strTime = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;

                            // Format Date: Friday, April 3, 2026
                            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            const strDate = now.toLocaleDateString('en-US', options);

                            document.getElementById('realtime-clock').textContent = strTime;
                            document.getElementById('realtime-date').textContent = strDate;
                        }
                        setInterval(updateClock, 1000);
                        updateClock(); // initial call
    </script>
</body>

</html>
