@php
$metaData[] = '';

@endphp

<x-layout.pages.village :metaData="$metaData" :data="$village">

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
                    'label' => 'Village Map',
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
                        <a href="{{ ($village['village']['Town_Village'] ?? null) == 129823 ? $item['link'] ?? '#' : '#' }}"
                            {{ ($village['village']['Town_Village'] ?? null)==129823 ? 'target="_blank"' : '' }}
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
                            @if (($village['village']['Town_Village'] ?? null) == 129823)
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
                            @if (($village['village']['Town_Village'] ?? null) == 129823)
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
                <img src="{{ asset('assets/images/rural_states/' . ($village['state']['state_LGD_code'] ?? 'default')) }}.jpg"
                    alt="Village Banner" class="w-full h-[400px] object-cover">
            </div>


                @if ($village['village_type'] == 'type_b')
                   <div class="bg-blue-100 font-[14px]  text-black px-4 py-3 rounded" role="alert"
                style="font-size: 14px !important">
                <span class="sr-only font-[14px]">Info</span>
                This is one of the 43331 unpopulated villages of India in 2011 Census.
                 </div>
                @elseif($village['village_type'] == 'type_c')
                       <div class="bg-blue-100 font-[14px]  text-black px-4 py-3 rounded" role="alert"
                style="font-size: 14px !important">
                <span class="sr-only font-[14px]">Info</span>
                New Village recognized by panchyat after 2011 Census. There are 40921 new villages in India in Janaury
                2026.
                       </div>
                @endif

            {{-- @endif --}}
            @if ($village['village_type']=='type_a')
            <!-- Village Description -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                <div class="space-y-1 text-justify">
                    <p class="text-[15px] text-gray-700 leading-relaxed font-medium">
                        {!! $village['slm']['village']['s1'] ?? '-' !!}
                    </p>
                    <p class="text-[15px] text-gray-700 leading-relaxed font-medium">
                        {!! $village['slm']['district'] ?? '-' !!}
                    </p>
                    @if (isset($village['slm']['village']['s2']))
                    <p class="text-[15px] text-gray-700 leading-relaxed font-medium">
                        {!! $village['slm']['village']['s2'] ?? '-' !!}
                    </p>
                    @endif
                </div>
            </div>
            @endif

            <!-- Village Speak Section -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm transition-all hover:shadow-md">
                <div class="flex flex-col items-center mb-6">
                    <h3 class="text-xl font-black text-gray-900 mb-1 ">Village Speak</h3>
                    <div class="w-10 h-0.5 bg-blue-600 rounded-full"></div>
                </div>

                <div class="space-y-2">
                    <p class="text-[14px] text-gray-700 leading-relaxed font-medium">
                        {!! $village['slm_lang']['p1'] ?? '-' !!}
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


    </div>

    <div class="lg:col-span-3 space-y-6  order-2 lg:order-3">
        <!-- Location Card -->
        <div
            class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
            <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                <h3 class="text-base text-center font-bold text-blue-600">Location</h3>
            </div>

            <div class="divide-y divide-gray-50">
                @php
                $details = [
                [
                'label' => 'Gram Panchayat',
                'value' => $village['gram_panchayat']['local_body_name_en'] ?? '-',
                ],
                [
                'label' => 'Sub-District (Tehsil)',
                'value' => $village['gram_panchayat']['subdistrict_name_en'] ?? '-',
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
                'label' => 'Village Users (Est.)',
                'source' => "Estimated number of rural internet users in the village,
                derived from the village’s proportion relative to the state. (Source: Telecom Regulatory Authority of
                India, September 2025)",
                'value' => $village['internet_users']['village_int_users'] ?? '-',
                ],
                [
                'label' => 'District Users (Est.)',
                'source' => "Estimated number of rural internet users in the
                district, calculated using the district’s share of the state total. (Source: Telecom Regulatory
                Authority of India, September 2025)",
                'value' => $village['internet_users']['district_int_users'] ?? '-',
                ],
                [
                'label' => 'State Users',
                'source' => "Total number of rural internet users in the state. (Source:
                Telecom Regulatory Authority of India, September 2025)",
                'value' => $village['internet_users']['state_int'] ?? '-',
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
        <!-- Analytics Section -->
        <div class="bg-white rounded-2xl p-2 px-8 border border-gray-100 shadow-sm transition-all hover:shadow-md">
            <div class="flex flex-col items-center mb-10">

                <h3 class="text-base text-center font-bold text-blue-600">
                    {{ $village['district']['district_name'] ?? '-' }}
                    Analytics</h3>
                {{-- <div class="w-12 h-1 bg-purple-600 rounded-full"></div> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
                <!-- Compare District Card -->
                <div
                    class="group/card p-6 bg-slate-50 rounded-2xl border border-slate-100 transition-all hover:bg-white hover:shadow-lg hover:shadow-slate-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h4 class="text-[13px] font-bold text-slate-600">Compare India District</h4>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <a target="_blank"
                            href="https://g2c.prarang.in/india/market-planner/states?city={{ $village['district']['dhq_code'] ?? '' }}"
                            class="flex items-center justify-center py-2.5 bg-white border border-slate-200 text-xs font-bold text-slate-700 rounded-xl hover:bg-indigo-600 hover:text-white hover:border-slate-900 transition-all shadow-sm">
                            Market
                        </a>
                        <a target="_blank"
                            href="https://g2c.prarang.in/india/development-planners?city={{ $village['district']['dhq_code'] ?? '' }}"
                            class="flex items-center justify-center py-2.5 bg-white border border-slate-200 text-xs font-bold text-slate-700 rounded-xl hover:bg-indigo-600 hover:text-white hover:border-slate-900 transition-all shadow-sm">
                            Development
                        </a>
                    </div>
                </div>

                <!-- District Summary Card -->
                <div
                    class="p-2 bg-indigo-50/40 rounded-2xl border border-indigo-100/50 flex flex-col transition-all hover:bg-white hover:shadow-lg hover:shadow-indigo-100">

                    <a target="_blank" href="https://g2c.prarang.in/ai/{{ $village['district']['city'] ?? ' ' }}">
                        <img class="rounded-2xl" src="{{ asset('assets/images/12e.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-layout.pages.village>
