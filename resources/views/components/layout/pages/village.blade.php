<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $data['name'] ?? 'Village' }} | {{ $data['district']['district_name'] ?? "-" }} | {{
        $data['state']['state_name'] ?? "-" }} </title>
    <meta name="title" content="{{  $data['name'] ?? 'Village' }}  | {{ $data['district']['district_name'] ?? " -" }} |
        {{ $data['state']['state_name'] ?? "-" }} ">
    <meta name=" description" content="{{ strip_tags($data['slm']['village']['s1'] ?? '' ) }}">
    <meta name="keywords"
        content="{{  $data['name'] ?? '' }}, {{ $data['district']['district_name'] ?? '' }}, {{ $data['state']['state_name'] ?? '' }}, Village, Rural, India, Culture, Nature, Demographics, Economy, History">
    <meta property="og:title" content="{{  $data['name'] ?? 'Village' }}  | {{ $data['district']['district_name'] ?? "
        -" }} | {{ $data['state']['state_name'] ?? "-" }} ">
    <meta property=" og:description" content="{{ strip_tags($data['slm']['village']['s1'] ?? '' ) }}">
    <meta property="og:image"
        content="{{ asset('assets/images/rural_states/' . ($data['state']['state_LGD_code'] ?? 'default') . '.jpg') }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/villages-style.css') }}">
</head>

<body>
    <header class="py-6">
        <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-1 lg:gap-8 items-center">
                <!-- Search Trigger -->
                <div class="lg:col-span-3 flex items-center gap-4 order-3 lg:order-1">
                    @livewire('utility.village-town-filter', ['type' => 'village'])

                    <div x-data="{ open: false }" @click.away="open = false" class="inline-block">
                        <button @click="open = !open"
                            class="flex items-center gap-3 p-1 px-2 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-xl hover:border-gray-300 transition-all duration-500 min-w-[160px] group/ai">

                            <div
                                class="flex items-center justify-center w-8 h-8 bg-indigo-50 rounded-xl group-hover/ai:bg-indigo-100 transition-all duration-500">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.364-6.364l-.707-.707M6.364 18.364l-.707.707M18.364 18.364l-.707.707M12 21v-1m0-5a3 3 0 110-6 3 3 0 010 6z" />
                                </svg>
                            </div>

                            <div class="flex flex-col items-start text-left">
                                <span class="text-[9px] text-indigo-600 font-black tracking-widest uppercase">Upmana
                                </span>
                                <span
                                    class="text-[14px] text-gray-900 font-bold flex items-center gap-1.5 leading-tight">
                                    A.I.
                                    <svg class="w-3 h-3 text-gray-400 group-hover/ai:text-indigo-500 transition-colors"
                                        :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </div>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute z-50 mt-2 w-48 bg-white border border-gray-100 rounded-2xl shadow-2xl p-2 hidden"
                            :class="{ 'hidden': !open }">

                            <a href="https://www.prarang.in/ai/upmana/hi" target="_blank"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 text-gray-700 hover:text-indigo-600 transition-all group/opt">
                                <span
                                    class="text-xs font-black tracking-widest text-indigo-200 group-hover/opt:text-indigo-400">HI</span>
                                <span class="text-[13px] font-bold">Hindi</span>
                            </a>
                            <a href="https://www.prarang.in/ai/upmana" target="_blank"
                                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-indigo-50 text-gray-700 hover:text-indigo-600 transition-all group/opt">
                                <span
                                    class="text-xs font-black tracking-widest text-indigo-200 group-hover/opt:text-indigo-400">EN</span>
                                <span class="text-[13px] font-bold">English</span>
                            </a>
                        </div>
                    </div>


                </div>

                <!-- Main Branding -->
                <div class="lg:col-span-6 flex flex-col items-center order-1 lg:order-2">
                    <div class="flex items-center mb-4 group cursor-default">
                        <div>
                            <img class="h-14 w-14 " src="https://www.prarang.in/assets/images/home/Villages-1.png"
                                alt="Village Icon">
                        </div>
                        <div>
                            <h1
                                class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 ml-6 tracking-tight">
                                {{ $data['name'] ?? '-' }} Village
                            </h1>
                        </div>
                    </div>
                    <div class="px-6 py-1.5 rounded-full bg-gray-50 border border-gray-100">
                        <p class="text-center text-lg font-medium text-gray-500 tracking-wide">
                            @if(($data['village']['Town_Village'] ?? null) == 129823)
                            Capital of Panchalas – Ancient Indian Metropolis but now a village
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Village Stats -->
                <div class="lg:col-span-3 order-2 lg:order-3">
                    <div class="bg-white rounded-2xl py-2 px-4 border border-gray-100/80 shadow-sm">
                        <div class="grid grid-cols-2  gap-x-6">
                            <div>
                                <p class="text-xs font-medium text-gray-500 mb-0.5">District</p>
                                <p class="text-sm font-bold text-gray-800">
                                    {{ $data['district']['district_name'] ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500 mb-0.5">State</p>
                                <p class="text-sm font-bold text-gray-800">
                                    {{ $data['state']['state_name'] ?? '-' }}</p>
                            </div>
                            <div class="pt-1 border-t border-gray-50">
                                <p class="text-xs font-medium text-gray-500 mb-0.5">Pop. 2026 (Est.)
                                    <x-source
                                        source="Estimate - Population based on District Growth Rate - Census 2011." />
                                </p>
                                <p class="text-sm font-bold text-indigo-600">
                                    {{ isset($data['pop']['pop_2026']) ? number_format($data['pop']['pop_2026'], 0) :
                                    '-' }} </p>
                            </div>
                            <div class="pt-1 border-t border-gray-50">
                                <p class="text-xs font-medium text-gray-500 mb-0.5">Pop. 2011
                                    <x-source source="Population - Census 2011." />
                                </p>
                                <p class="text-sm font-bold text-gray-800">
                                    {{ isset($data['pop']['pop_2011']) ? number_format($data['pop']['pop_2011'], 0) :
                                    '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        {{ $slot }}
    </main>

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

</body>

</html>
