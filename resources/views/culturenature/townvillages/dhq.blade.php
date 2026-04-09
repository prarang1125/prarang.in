@php
$metaData[] = '';

@endphp

<style>
    [x-cloak] {
        display: none !important;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<x-layout.pages.dhq :data="$dhq">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-3  space-y-6 order-3 lg:order-1">
            <!-- Travel Logistics Card -->
            <div class="bg-white rounded-2xl border border-green-200 shadow-sm overflow-hidden mb-6">
                <div class="px-5 py-4 text-center">

                    <h3 class="text-base text-center font-bold text-blue-600">Travel Logistics</h3>
                </div>

                <div class="px-6 pb-8 space-y-1" x-data="{ active: null }">
                    @php
                    $logistics = [
                    [
                    'icon' => '🗺️',
                    'label' => 'City Map',
                    'link' => 'https://maps.app.goo.gl/BX755J215dehzQgx7',
                    ],
                    [
                    'icon' => '🌦️',
                    'label' => 'Weather',
                    'link' =>
                    'https://weather.com/en-MU/weather/tenday/l/65a5001d22bf60f649bb3edd51abdb3f1c22222cb2278fc1c545da9006a044ae',
                    ],
                    [
                    'icon' => '🍴',
                    'label' => 'Restaurants / Dhabas',
                    'link' =>
                    'https://www.justdial.com/Bareilly/Restaurants-in-Ram-Nagar/nct-10408936?filters=%5B%7B%22e%22%3A%22100%22%2C%22v%22%3A%5B%22Distance%22%5D%7D%5D&filtersApplied=%5B%7B%22mv%22%3A%2210000%22%2C%22v%22%3A%5B%22Distance%22%5D%7D%5D',
                    ],
                    [
                    'icon' => '🏙️',
                    'label' => 'Nearest City',
                    'value' => 'Aonla',
                    'link' => 'https://aonla.com',
                    ],
                    [
                    'icon' => '🚌',
                    'label' => 'Bus Stop',
                    'link' => 'https://maps.app.goo.gl/rkvnhjKtmbcYtrDa9',
                    ],
                    [
                    'icon' => '🚆',
                    'label' => 'Railway',
                    'value' => 'Aonla Station',
                    'link' => 'https://www.easemytrip.com/railways/aonla-ao-railway-station/',
                    ],
                    [
                    'icon' => '🛫',
                    'label' => 'Nearest Airport',
                    'value' => 'Bareilly Airport',
                    'link' => 'https://www.aai.aero/en/airports/bareilly',
                    ],
                    [
                    'icon' => '🏨',
                    'label' => 'Nearest Hotels',
                    'value' => 'Hotels in Aonla',
                    'link' => 'https://www.makemytrip.com/hotels/aonla-hotels.html',
                    ],
                    ];
                    @endphp
                    @foreach ($logistics as $index => $item)
                    <div class="border-b border-gray-50 last:border-0">
                        @if (!isset($item['value']))
                        <a href="{{ ($dhq['town']['Town_Code'] ?? null) == 800864 ? $item['link'] ?? '#' : '#' }}" {{
                            ($dhq['town']['Town_Code'] ?? null)==800864 ? 'target="_blank"' : '' }}
                            class="w-full py-2.5 flex items-center gap-3 transition-colors hover:bg-gray-50/50 rounded-lg px-2 -mx-2">
                            <span class="text-base w-6 shrink-0">{{ $item['icon'] ?? '' }}</span>
                            <span class="text-sm font-bold text-gray-800">{{ $item['label'] ?? '-' }}</span>
                        </a>
                        @else
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}"
                            class="w-full py-2.5 flex items-center justify-between group transition-colors hover:bg-gray-50/50 rounded-lg px-2 -mx-2">
                            <div class="flex items-center gap-3">
                                <span class="text-base w-6 shrink-0">{{ $item['icon'] ?? '' }}</span>
                                <span class="text-sm font-bold text-gray-800">{{ $item['label'] ?? '-' }}</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300"
                                :class="active === {{ $index }} ? 'rotate-180 text-blue-600' : ''" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="active === {{ $index }}" x-collapse x-cloak class="ml-9 pb-2">
                            @if (($dhq['town']['Town_Code'] ?? null) == 800864)
                            <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                class="block text-xs font-semibold text-gray-600 hover:text-blue-700 transition-colors">
                                • {{ $item['value'] ?? '-' }}
                            </a>
                            @else
                            <a href="#"
                                class="block text-xs font-semibold text-gray-600 hover:text-blue-700 transition-colors">
                                Coming soon.
                            </a>
                            @endif

                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Local Amenities Card -->
            <div class="bg-white rounded-2xl border border-green-200 shadow-sm overflow-hidden mb-6">
                <div class="px-5 py-4 text-center">
                    <h3 class="text-base text-center font-bold text-blue-600">Local Amenities</h3>
                </div>

                <div class="px-6 pb-6 space-y-2" x-data="{ active: null }">
                    @php
                    $amenityGroups = [
                    [
                    'icon' => '🏥',
                    'label' => 'Hospitals / Medical',
                    'items' => [
                    ['name' => 'Ram Nagar CHC', 'link' => 'https://maps.app.goo.gl/jd12CdUsMYd7yZ2T6'],
                    ],
                    ],
                    [
                    'icon' => '👮',
                    'label' => 'Police Stations',
                    'items' => [
                    [
                    'name' => 'Police Chowki Ram Nagar',
                    'link' => 'https://maps.app.goo.gl/AYNepRCAVnWd9KNG8',
                    ],
                    ],
                    ],
                    [
                    'icon' => '⛽',
                    'label' => 'Petrol Pumps',
                    'items' => [
                    ['name' => 'HPCL', 'link' => 'https://maps.app.goo.gl/RLcVexBtUs7Tk5Wy5'],
                    ['name' => 'IndianOil', 'link' => 'https://maps.app.goo.gl/SiwTzw91itdcSUhg7'],
                    ],
                    ],
                    [
                    'icon' => '🏧',
                    'label' => 'ATMs',
                    'items' => [
                    ['name' => 'SBI ATM', 'link' => 'https://www.mappls.com/UKP0K3'],
                    ['name' => 'Punjab National Bank', 'link' => 'https://www.mappls.com/2ZWCU5'],
                    ['name' => 'Bank of Baroda', 'link' => 'https://www.mappls.com/2ZVUN1'],
                    ],
                    ],
                    [
                    'icon' => '🏦',
                    'label' => 'Bank Branches',
                    'items' => [
                    [
                    'name' => 'Union Bank of India',
                    'link' => 'https://maps.app.goo.gl/ngFZ6KvVgdfMH3ZZ7',
                    ],
                    ['name' => 'Bank of Baroda', 'link' => 'https://maps.app.goo.gl/8hsRabHjr9mQb8nQ7'],
                    [
                    'name' => 'Punjab National Bank',
                    'link' => 'https://maps.app.goo.gl/Erjw4bmk2fdYnhce8',
                    ],
                    ],
                    ],
                    [
                    'icon' => '📮',
                    'label' => 'Post Offices',
                    'items' => [
                    [
                    'name' => 'Ram Nagar S.O.',
                    'link' => 'https://pin-code.org/india/uttar-pradesh/bareilly/ram-nagar/',
                    ],
                    ],
                    ],
                    [
                    'icon' => '🎓',
                    'label' => 'Schools / Colleges',
                    'items' => [
                    [
                    'name' => 'Jain Academy',
                    'link' =>
                    'https://stackschools.com/schools/09200106207/jain-academy-english-medium-school',
                    ],
                    [
                    'name' => 'Ch.Kashiram Yadav Inter College',
                    'link' =>
                    'https://stackschools.com/schools/09200106206/ch-kashiram-yadav-inter-college',
                    ],
                    ],
                    ],
                    [
                    'icon' => '🏢',
                    'label' => 'Government Offices',
                    'items' => [
                    ['name' => 'BDO Ramnagar', 'link' => 'https://maps.app.goo.gl/GNt6SzC1Grhvjvpu9'],
                    [
                    'name' => 'Kshetra Panchayat',
                    'link' => 'https://maps.app.goo.gl/vYK6uY949xXiyi3P6',
                    ],
                    ],
                    ],
                    ];
                    @endphp
                    @foreach ($amenityGroups as $index => $group)
                    <div class="border-b border-gray-50 last:border-0">
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}"
                            class="w-full py-3 flex items-center justify-between group transition-colors hover:bg-gray-50/50 rounded-lg px-2 -mx-2">
                            <div class="flex items-center gap-3">
                                <span class="text-base w-6 shrink-0">{{ $group['icon'] }}</span>
                                <span class="text-sm font-bold text-gray-800">{{ $group['label'] }}</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300"
                                :class="active === {{ $index }} ? 'rotate-180 text-blue-600' : ''" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="active === {{ $index }}" x-collapse x-cloak class="ml-9 pb-3 space-y-2">
                            @if (($dhq['town']['Town_Code'] ?? null) == 800864)
                            @foreach ($group['items'] ?? [] as $item)
                            <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                class="block text-xs font-semibold text-gray-600 hover:text-blue-700 transition-colors">
                                • {{ $item['name'] ?? '-' }}
                            </a>
                            @endforeach
                            @else
                            <p class="text-xs font-semibold text-gray-600">Coming Soon.</p>
                            @endif

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 space-y-6  order-1 lg:order-2">
            <!-- Village Banner Image -->
            <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all hover:shadow-md">
                <img src="{{ asset('assets/images/urban_states/' . ($dhq['state']['state_LGD_code'] ?? 'default')) }}.jpg"
                    alt="Village Banner" class="w-full h-[400px] object-cover">
            </div>


            {{-- @endif --}}
            @if (true)
            <!-- Village Description -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                <div class="space-y-1 text-justify">
                    <p class="text-[15px] text-gray-700 leading-relaxed font-medium">
                        {!! $dhq['slm']['town']['s1'] ?? '' !!}
                        {!! $dhq['slm']['district'] ?? '-' !!}
                        {!! $dhq['slm']['town']['s2'] ?? '' !!}
                    </p>
                </div>
            </div>
            @endif

            {{-- Village Speak Section --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                {{-- <div class="flex flex-col items-center mb-6">
                    <h3 class="text-xl font-black text-gray-900 mb-1 ">City Capital Speak</h3>
                    <div class="w-10 h-0.5 bg-blue-600 rounded-full"></div>
                </div> --}}

                <div class="space-y-2">
                    <p class="text-[14px] text-gray-700 leading-relaxed font-medium">
                        {!! $dhq['slm_lang']['p1'] ?? '-' !!} For detailed language breakup of {{ $town['name'] ?? '-'
                        }} <a class="text-blue-600 hover:text-blue-800" href="#toLanguage">please see language box.</a>
                    </p>
                </div>


                <div class="space-y-2">
                    <p class="text-[14px] text-gray-700 leading-relaxed font-medium">
                        {!! $dhq['cn-slm'] ?? '-' !!}
                    </p>
                </div>
                <!-- Sanskriti & Prakriti Dual Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-4 py-4 border-t border-gray-100">
                    <!-- Sanskriti (Culture) -->
                    <div class="flex flex-col items-center">
                        <h4 class="text-lg font-bold text-gray-900 mb-1">संस्कृति</h4>

                        <!-- Sanskriti Color Bar -->
                        <div class="flex w-full h-9  overflow-hidden mb-1 max-w-[320px] shadow-sm">
                            <div class="flex-1" style="background-color: #ff0000;"></div>
                            <div class="flex-1" style="background-color: #f7f601;"></div>
                            <div class="flex-1" style="background-color: #0000ff;"></div>
                        </div>

                        <!-- Card Entries -->
                        <div class="w-full space-y-2">
                            @for ($i = 1; $i <= 2; $i++) <div class="flex gap-4 group/entry cursor-default">
                                <div
                                    class="w-20 h-20 bg-gray-50 rounded-2xl border border-indigo-100/50 flex items-center justify-center flex-shrink-0 shadow-sm transition-all group-hover/entry:border-indigo-200">
                                    <span class="text-[10px] font-bold text-gray-400">Image
                                        {{ $i }}</span>
                                </div>
                                <div
                                    class="flex-grow bg-white border border-slate-100 rounded-2xl px-6 flex items-center shadow-sm transition-all group-hover/entry:border-slate-200">
                                    <span class="text-sm font-bold text-gray-800">Culture Insight
                                        {{ $i }}</span>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Prakriti (Nature) -->
                <div class="flex flex-col items-center">
                    <h4 class="text-lg font-bold text-gray-900 mb-1">प्रकृति</h4>

                    <!-- Nature Color Bar -->
                    <div class="flex w-full h-9  overflow-hidden mb-1 max-w-[320px] shadow-sm">
                        <div class="flex-1" style="background-color: #fef08a;"></div>
                        <div class="flex-1" style="background-color: #bef264;"></div>
                        <div class="flex-1" style="background-color: #22c55e;"></div>
                    </div>

                    <!-- Card Entries -->
                    <div class="w-full space-y-2">
                        @for ($i = 1; $i <= 2; $i++) <div class="flex gap-4 group/entry cursor-default">
                            <div
                                class="w-20 h-20 bg-gray-50 rounded-2xl border border-green-100/50 flex items-center justify-center flex-shrink-0 shadow-sm transition-all group-hover/entry:border-green-200">
                                <span class="text-[10px] font-bold text-gray-400">Image
                                    {{ $i }}</span>
                            </div>
                            <div
                                class="flex-grow bg-white border border-slate-100 rounded-2xl px-6 flex items-center shadow-sm transition-all group-hover/entry:border-slate-200">
                                <span class="text-sm font-bold text-gray-800">Nature Insight
                                    {{ $i }}</span>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>

        </div>

    </div>
    <!-- City Action Buttons -->
    <div class="flex gap-6 mt-6 mb-8 text-black">
        <a target="_blank" href="https://g2c.prarang.in/{{ $dhq['dhq']['city'] ?? '' }}?data"
            class="flex-1 text-center bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-blue-700 transition-all duration-300">
            {{ $dhq['dhq']['city'] ?? '' }} Analytics
        </a>

        <a target="_blank" href="https://g2c.prarang.in/ai/{{ $dhq['dhq']['city'] ?? '' }}"
            class="flex-1 text-center bg-blue-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-blue-700 transition-all duration-300">
            {{ $dhq['dhq']['city'] ?? '' }} A.I. Report
        </a>
    </div>



    <!-- Instruments Section -->
    <div class="p-2 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Business Instrument -->
            <div
                class="group relative bg-blue-400 shadow-xl hover:shadow-2xl transition-all duration-500  overflow-hidden">
                <div class="absolute inset-0 opacity-30">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl opacity-50"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full blur-2xl opacity-50"></div>
                </div>
                <div class="relative">
                    <div class="flex items-center justify-center mb-6 text-center">
                        <div>
                            <h5 class="text-3xl md:text-4xl font-extrabold text-white mb-2 tracking-tight">Business
                                Planner</h5>
                            <p class="text-blue-50 text-sm md:text-base font-medium">Find new opportunities for your
                                business</p>
                        </div>
                    </div>
                    <div class="space-y-4 mb-6">
                        <a href="https://g2c.prarang.in/india/market-planner/states?city={{ $dhq['town']['dhq_code'] ?? '-675' }}"
                            target="_blank"
                            class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">Find
                                    New Opportunities in India</span>
                                <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                            </div>
                            <small class="text-white/80 font-medium">(Select Cities)</small>
                        </a>
                        <a href="https://g2c.prarang.in/world/market-planner?country=63" target="_blank"
                            class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">Find
                                    New Opportunities in the World</span>
                                <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                            </div>
                            <small class="text-white/80 font-medium">(Select Countries)</small>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Development Instrument -->
            <div
                class="group relative bg-green-500  shadow-xl hover:shadow-2xl transition-all duration-500  overflow-hidden">
                <div class="absolute inset-0 opacity-30">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl opacity-50"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full blur-2xl opacity-50"></div>
                </div>
                <div class="relative">
                    <div class="flex items-center justify-center mb-6 text-center">
                        <div>
                            <h5 class="text-3xl md:text-4xl font-extrabold text-white mb-2 tracking-tight">
                                Development Planner</h5>
                            <p class="text-green-50 text-sm md:text-base font-medium">Compare the progress of your
                                city/country</p>
                        </div>
                    </div>
                    <div class="space-y-4 mb-6">
                        <a href="https://g2c.prarang.in/india/development-planners?city={{ $dhq['town']['dhq_code'] ?? '-675' }}"
                            target="_blank"
                            class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">Compare
                                    Development in India</span>
                                <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                            </div>
                            <small class="text-white/80 font-medium">(Select Cities)</small>
                        </a>
                        <a href="https://g2c.prarang.in/world/development-planner?country=63" target="_blank"
                            class="block p-4 bg-white/20 backdrop-blur-sm rounded-xl hover:bg-white/30 transition-all duration-300 group/link border border-white/30 hover:border-white/50">
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-white font-bold text-base md:text-lg group-hover/link:translate-x-1 transition-transform">Compare
                                    Development in the World</span>
                                <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                            </div>
                            <small class="text-white/80 font-medium">(Select Countries)</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="lg:col-span-3 space-y-6  order-2 lg:order-3">
        <!-- Location Card -->
        {{-- <div
            class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
            <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base text-center font-bold text-blue-600">Location</h3>
            </div>

            <div class="divide-y divide-gray-50">
                @php
                $details = [
                [
                'label' => 'District',
                'value' => $dhq['town']['district'] ?? '-',
                ],
                [
                'label' => 'State',
                'value' => $dhq['town']['State_UT_Name'] ?? '-',
                ],
                ];
                @endphp
                @foreach ($details as $detail)
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50/30 transition-colors">
                    <span class="text-[13px] font-medium text-gray-500">{{ $detail['label'] }}</span>
                    <span class="text-[13px] font-bold text-gray-800 tracking-tight">{{ $detail['value'] }}</span>
                </div>
                @endforeach
            </div>
        </div> --}}
        <div class="bg-white rounded-2xl py-2 px-4 border border-gray-100/80 shadow-sm">
            <div class="grid grid-cols-2  gap-x-6">
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-0.5">District</p>
                    <p class="text-sm font-bold text-gray-800">
                        {{ $dhq['town']['district'] ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-0.5">State</p>
                    <p class="text-sm font-bold text-gray-800">
                        {{ $dhq['town']['State_UT_Name'] ?? '-' }}</p>
                </div>
                <div class="pt-1 border-t border-gray-50">
                    <p class="text-xs font-medium text-gray-500 mb-0.5">Pop. 2026 (Est.)
                        <x-source source="Estimate - Population based on District Growth Rate - Census 2011" />
                    </p>
                    <p class="text-sm font-bold text-indigo-600">
                        {{ isset($dhq['town']['TOT_P']) ? number_format($dhq['pop']['pop26'], 0) :
                        '-' }} </p>
                </div>
                <div class="pt-1 border-t border-gray-50">
                    <p class="text-xs font-medium text-gray-500 mb-0.5">Pop. 2011
                        <x-source source="Population - Census 2011" />
                    </p>
                    <p class="text-sm font-bold text-gray-800">
                        {{ isset($dhq['town']['TOT_P']) ? number_format($dhq['pop']['pop11'], 0) :
                        '-' }}</p>
                </div>
            </div>
        </div>
        <div x-data="{ openModal: false, modalType: '' }"
            class="shadow bg-white rounded-2xl py-3 px-2 border border-gray-100/80">

            <div class="grid grid-cols-2 gap-6">
                <button @click="openModal = true; modalType = 'towns'"
                    class="cursor-pointer bg-blue-600 text-white    flex items-center justify-center py-4  border border-slate-200 text-sm font-black text-slate-700 rounded-2xl hover:bg-blue-600 hover:text-white transition-all shadow-lg hover:shadow-blue-500/20">
                    District Towns #{{ $otherVilTown['towns']['count'] ?? 0 }}
                </button>
                <button @click="openModal = true; modalType = 'villages'"
                    class="cursor-pointer bg-blue-600 text-white flex items-center justify-center py-4  border border-slate-200 text-sm font-black text-slate-700 rounded-2xl hover:bg-blue-600 hover:text-white transition-all shadow-lg hover:shadow-blue-500/20">
                    District Villages #{{ $otherVilTown['villages']['count'] ?? 0 }}
                </button>
            </div>

            <!-- Premium Modal for Towns/Villages -->
            <template x-teleport="body">
                <div x-show="openModal" x-cloak
                    class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-gray-900/60 backdrop-blur-sm"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    @click.self="openModal = false">

                    <div class="bg-white rounded-[32px] w-full max-w-4xl h-[90vh] flex flex-col shadow-2xl overflow-hidden"
                        x-show="openModal" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0">

                        <!-- Header -->
                        <div
                            class="px-8 py-6 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-inner"
                                    :class="modalType === 'towns' ? 'bg-blue-50 text-blue-600' : 'bg-emerald-50 text-emerald-600'">
                                    <svg x-show="modalType === 'towns'" class="w-6 h-6" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <svg x-show="modalType === 'villages'" class="w-6 h-6" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-slate-900 tracking-tight"
                                        x-text="modalType === 'towns' ? 'Towns' : 'Villages'"></h3>
                                    <p class="text-sm font-bold text-slate-400">Total Count: <span
                                            class="text-slate-900"
                                            x-text="modalType === 'towns' ? '{{ $otherVilTown['towns']['count'] ?? 0 }}' : '{{ $otherVilTown['villages']['count'] ?? 0 }}'"></span>
                                    </p>
                                </div>
                            </div>
                            <button @click="openModal = false"
                                class="w-10 h-10 flex items-center justify-center bg-slate-100 hover:bg-slate-200 rounded-full transition-all text-slate-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Content List -->
                        <div class="flex-grow overflow-y-auto p-8 bg-slate-50/30 custom-scrollbar">
                            <div x-show="modalType === 'towns'"
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                @foreach($otherVilTown['towns']['data'] ?? [] as $id => $name)
                                <a href="/city/{{ url_encoder($dhq['state']['state_code']."
                                    -".$dhq['dhq']['DHQ_Code']."-".$id) }}/{{ Str::kebab($name) }}"
                                    class="block px-4 py-4 bg-white border border-slate-100 rounded-2xl hover:border-blue-200 hover:shadow-lg hover:shadow-blue-500/5 transition-all group hover:text-blue-600">
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs font-bold text-blue-400 italic">0{{ $loop->iteration
                                            }}</span>
                                        <span class="text-[13px] font-bold text-slate-700 transition-colors">{{ $name
                                            }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>

                            <div x-show="modalType === 'villages'"
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                @foreach($otherVilTown['villages']['data'] ?? [] as $id => $name)
                                <a href="/village/{{ url_encoder($dhq['state']['state_code']."
                                    -".$dhq['dhq']['district_LGD_code']."-".$id) }}/{{ Str::kebab($name) }}"
                                    class="block px-4 py-4 bg-white border border-slate-100 rounded-2xl hover:border-blue-200 hover:shadow-lg hover:shadow-blue-500/5 transition-all group hover:text-blue-600">
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs font-bold text-blue-400 italic">0{{ $loop->iteration
                                            }}</span>
                                        <span class="text-[13px] font-bold text-slate-700 transition-colors">{{ $name
                                            }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-8 py-5 bg-white border-t border-slate-100 flex justify-center">
                            <button @click="openModal = false"
                                class="px-10 py-3 bg-slate-900 text-white text-xs font-black rounded-2xl hover:bg-black hover:scale-105 transition-all shadow-xl shadow-slate-900/20">
                                DONE
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- Internet Trends Card -->
        <div
            class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
            <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base text-center font-bold text-blue-600">Internet Trends</h3>
            </div>

            <div class="divide-y divide-gray-50">
                @php
                $trends = [

                [
                'label' => 'Facebook Users',
                'source' => "FB Users – FB Ad Module - Dec 2025",
                'value' => isset($intData['facebook_users']['value']) ?
                number_format($intData['facebook_users']['value'], 0) : '-',
                ],
                [
                'label' => 'LinkedIn Users',
                'source' => "LinkedIn Users – LinkedIn Ad Module - Dec 2025",
                'value' => isset($intData['linkedin_users']['value']) ?
                number_format($intData['linkedin_users']['value'], 0) : '-',
                ],
                [
                'label' => 'Twitter Users',
                'source' => "Twitter Users – X Ad Module - Dec 2025",
                'value' => isset($intData['twitter_users']['value']) ? number_format($intData['twitter_users']['value'],
                0) : '-',
                ],
                [
                'label' => 'Instagram Users',
                'source' => "Instagram Users – FB Ad Module - Dec 2025",
                'value' => isset($intData['instagram_users']['value']) ?
                number_format($intData['instagram_users']['value'], 0) : '-',
                ],
                [
                'label' => 'City Internet Users (Est.)',
                'source' => "Estimate - Population ratio of State Urban Internet Users - TRAI QTR Report",
                'value' => $dhq['internet_users']['town_int_users'] ?? '-',
                ],
                [
                'label' => 'District Internet Users (Est.)',
                'source' => "Estimate - District Urban + Rural Internet Users - TRAI QTR Report",
                'value' => $dhq['internet_users']['district_int_users'] ?? '-',
                ],
                [
                'label' => 'State Internet Users',
                'source' => "Urban + Rural Internet Users - TRAI QTR Report",
                'value' => $dhq['internet_users']['state_int'] ?? '-',
                ],
                ];
                @endphp




                @foreach ($trends as $trend)
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50/30 transition-colors">
                    <span class="text-[13px] font-medium text-gray-500">{{ $trend['label'] }}
                        <x-source source="{{ $trend['source'] }}" />
                    </span>
                    <span class="text-[13px] font-bold text-gray-800 tabular-nums">{{ $trend['value'] }}</span>
                </div>
                @endforeach

            </div>




        </div>
        <!-- Languages Card -->
        <div id="toLanguage"
            class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
            <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base text-center font-bold text-blue-600">Languages</h3>
            </div>

            <div class="divide-y divide-gray-50">
                @foreach($dhq['top5_languages'] ?? [] as $key => $lang)
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50/30 transition-colors">
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] font-black text-blue-400 w-4">0{{ $lang['rank'] ?? $loop->iteration
                            }}</span>
                        <span class="text-[13px] font-medium text-gray-500">{{ $lang['language'] ?? 'N/A' }}</span>
                    </div>
                    <span class="text-[13px] font-bold text-gray-800 tabular-nums">{{
                        ($lang['spek'] ?? 0)}}%</span>
                </div>
                @endforeach
            </div>
            <p class="text-end px-4 py-2">
                <a target="_blank"
                    href="https://g2c.prarang.in/india/multilingualism/{{ $dhq['dhq']['DHQ_Code'] }}/{{ $dhq['town']['town_code'] }}"
                    class="text-[12px] font-bold text-blue-600 hover:text-blue-800 transition-colors italic">
                    see more >>
                </a>
            </p>
        </div>
        <!-- Literacy Card -->
        <div
            class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
            <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base text-center font-bold text-blue-600">Literacy (2011)</h3>
            </div>

            <div class="divide-y divide-gray-50">
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50/30 transition-colors">
                    <span class="text-[13px] font-medium text-gray-500">Literate Population</span>
                    <span class="text-[13px] font-bold text-gray-800 tabular-nums">{{
                        number_format($dhq['literacy']['literate'] ?? 0) }}</span>
                </div>
                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50/30 transition-colors">
                    <span class="text-[13px] font-medium text-gray-500">Illiterate Population</span>
                    <span class="text-[13px] font-bold text-gray-800 tabular-nums">{{
                        number_format($dhq['literacy']['illiterate'] ?? 0) }}</span>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </x-layout.pages.town>
