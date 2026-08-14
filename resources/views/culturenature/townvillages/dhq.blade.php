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

    /* Paragraph */
    .mx-auto .divide-y p {
        text-align: right;
        margin-top: -12px;
        margin-bottom: 15px;
        margin-right: 8px;
    }

    /* Hover */
    .shadow .grid .hover\:text-white {
        font-size: 13px;
    }

    /* Cursor help */
    .mx-auto tr .cursor-help {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Font medium */
    .mx-auto tr .font-medium {
        display: flex;
    }

    /* Cursor help */
    .mx-auto tr .cursor-help {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Font medium */
    .mx-auto tr .font-medium {
        display: flex;
    }
</style>

<x-layout.pages.dhq :data="$dhq" :isAdsEnable="$isAdsEnable">

    <div class="gap-6 grid grid-cols-1 lg:grid-cols-12">
        <div class="space-y-6 order-3 lg:order-1 lg:col-span-3">
            <!-- Travel Logistics Card -->
            <div class="bg-white shadow-sm mb-6 border border-green-200 rounded-2xl overflow-hidden">
                <div class="px-5 py-4 text-center">

                    <h3 class="font-bold text-blue-600 text-base text-center">Travel Logistics</h3>
                </div>

                <div class="space-y-1 px-6 pb-8" x-data="{ active: null }">
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
                    <div class="border-gray-50 last:border-0 border-b">
                        @if (!isset($item['value']))
                        <a href="{{ ($dhq['town']['Town_Code'] ?? null) == 800864 ? $item['link'] ?? '#' : '#' }}" {{
                            ($dhq['town']['Town_Code'] ?? null)==800864 ? 'target="_blank"' : '' }}
                            class="flex items-center gap-3 hover:bg-gray-50/50 -mx-2 px-2 py-2.5 rounded-lg w-full transition-colors">
                            <span class="w-6 text-base shrink-0">{{ $item['icon'] ?? '' }}</span>
                            <span class="font-bold text-gray-800 text-sm">{{ $item['label'] ?? '-' }}</span>
                        </a>
                        @else
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}"
                            class="group flex justify-between items-center hover:bg-gray-50/50 -mx-2 px-2 py-2.5 rounded-lg w-full transition-colors">
                            <div class="flex items-center gap-3">
                                <span class="w-6 text-base shrink-0">{{ $item['icon'] ?? '' }}</span>
                                <span class="font-bold text-gray-800 text-sm">{{ $item['label'] ?? '-' }}</span>
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
                                class="block font-semibold text-gray-600 hover:text-blue-700 text-xs transition-colors">
                                • {{ $item['value'] ?? '-' }}
                            </a>
                            @else
                            <a href="#"
                                class="block font-semibold text-gray-600 hover:text-blue-700 text-xs transition-colors">
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
            <div class="bg-white shadow-sm mb-6 border border-green-200 rounded-2xl overflow-hidden">
                <div class="px-5 py-4 text-center">
                    <h3 class="font-bold text-blue-600 text-base text-center">Local Amenities</h3>
                </div>

                <div class="space-y-2 px-6 pb-6" x-data="{ active: null }">
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
                    <div class="border-gray-50 last:border-0 border-b">
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}"
                            class="group flex justify-between items-center hover:bg-gray-50/50 -mx-2 px-2 py-3 rounded-lg w-full transition-colors">
                            <div class="flex items-center gap-3">
                                <span class="w-6 text-base shrink-0">{{ $group['icon'] }}</span>
                                <span class="font-bold text-gray-800 text-sm">{{ $group['label'] }}</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300"
                                :class="active === {{ $index }} ? 'rotate-180 text-blue-600' : ''" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="active === {{ $index }}" x-collapse x-cloak class="space-y-2 ml-9 pb-3">
                            @if (($dhq['town']['Town_Code'] ?? null) == 800864)
                            @foreach ($group['items'] ?? [] as $item)
                            <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                class="block font-semibold text-gray-600 hover:text-blue-700 text-xs transition-colors">
                                • {{ $item['name'] ?? '-' }}
                            </a>
                            @endforeach
                            @else
                            <p class="font-semibold text-gray-600 text-xs">Coming Soon.</p>
                            @endif

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white shadow-sm mb-6 border border-green-200 rounded-2xl overflow-hidden">
                <div class="px-5 py-4 text-center">
                    <h3 class="font-bold text-blue-600 text-base text-center">Useful web Links</h3>
                </div>

                <div class="space-y-2 px-6 pb-6" x-data="{ active: null }">
                    @php
                    $linksGroups = [];
                    $corpData = $dhq['extanded']['corporations'] ?? [];

                    // Municipal Corporation
                    if (!empty($corpData['mcp']) && is_array($corpData['mcp'])) {
                    $mcpItems = [];
                    foreach ($corpData['mcp'] as $mcp) {
                    $mcpItems[] = [
                    'name' => $mcp['name'] ?? 'Municipal Corporation',
                    'link' => $mcp['url'] ?? '#'
                    ];
                    }
                    $linksGroups[] = [
                    'icon' => '🏛️',
                    'label' => 'Municipal Corporation',
                    'items' => $mcpItems
                    ];
                    }

                    // Smart City
                    if (!empty($corpData['smc'])) {
                    $smcItems = [];
                    if (isset($corpData['smc']['name'])) {
                    // Single object
                    $smcItems[] = [
                    'name' => $corpData['smc']['name'],
                    'link' => $corpData['smc']['url'] ?? '#'
                    ];
                    } elseif (is_array($corpData['smc'])) {
                    // Array of objects
                    foreach ($corpData['smc'] as $smc) {
                    $smcItems[] = [
                    'name' => $smc['name'] ?? 'Smart City',
                    'link' => $smc['url'] ?? '#'
                    ];
                    }
                    }

                    if (!empty($smcItems)) {
                    $linksGroups[] = [
                    'icon' => '🏙️',
                    'label' => 'Smart City',
                    'items' => $smcItems
                    ];
                    }
                    }
                    @endphp

                    @forelse ($linksGroups as $index => $group)
                    <div class="border-gray-50 last:border-0 border-b text-left">
                        <button @click="active = active === {{ $index }} ? null : {{ $index }}"
                            class="group flex justify-between items-center hover:bg-gray-50/50 -mx-2 px-2 py-3 rounded-lg w-full transition-colors">
                            <div class="flex items-center gap-3">
                                <span class="w-6 text-base shrink-0">{{ $group['icon'] }}</span>
                                <span class="font-bold text-gray-800 text-sm">{{ $group['label'] }}</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300"
                                :class="active === {{ $index }} ? 'rotate-180 text-blue-600' : ''" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="active === {{ $index }}" x-collapse x-cloak class="space-y-2 ml-9 pb-3">
                            @foreach ($group['items'] ?? [] as $item)
                            <a href="{{ $item['link'] ?? '#' }}" target="_blank"
                                class="block font-semibold text-gray-600 hover:text-blue-700 text-xs transition-colors">
                                • {{ $item['name'] ?? '-' }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <p class="bg-white shadow p-2 rounded font-bold text-gray-700 text-sm text-center leading-relaxed">
                        No Useful web Links found</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6 order-1 lg:order-2 lg:col-span-6">
            @if($dhq['ua_data'] != null)
            <div x-data="{ openUA: false }" class="mb-6">
                @php
                $uaArr = is_array($dhq['ua_data']) ? $dhq['ua_data'] : [];
                $uaCount = count($uaArr);
                $uaDisplay = array_slice($uaArr, 0, 3);
                @endphp

                <p class="bg-white shadow p-2 rounded font-bold text-gray-700 text-sm text-center leading-relaxed">
                    Urban Agglomeration (UA) comprising of
                    <span class="text-blue-600">
                        @foreach($uaDisplay as $index => $item)
                        @if($uaCount > 3)
                        {{ $item['name'] ?? '' }}{{ $index < 2 ? ',' : '' }} @else {{ $item['name'] ?? '' }}{{
                            ($index==$uaCount - 2) ? ' and' : ($index < $uaCount - 2 ? ',' : '' ) }} @endif @endforeach
                    </span>
                    @if($uaCount > 3)
                    <button @click="openUA = true" class="text-blue-900 hover:text-blue-400">
                        <span>+{{ $uaCount - 3 }} more</span>
                    </button>
                    @endif
                </p>

                <!-- UA Modal Table -->
                <template x-teleport="body">
                    <div x-show="openUA" x-cloak
                        class="z-[9999] fixed inset-0 flex justify-center items-center bg-slate-900/80 backdrop-blur-md p-4"
                        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        @click.self="openUA = false">

                        <div class="flex flex-col bg-white shadow-2xl border border-slate-200 rounded-[32px] w-full max-w-lg max-h-[80vh] overflow-hidden"
                            x-show="openUA" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0">

                            <!-- Modal Header -->
                            <div
                                class="relative flex justify-between items-center bg-slate-50 px-8 py-6 border-slate-100 border-b">
                                <div>
                                    <h5 class="font-black text-slate-900 text-xl tracking-tight">Urban Agglomeration
                                    </h5>
                                    {{-- <p
                                        class="mt-0.5 font-bold text-[11px] text-blue-500 uppercase tracking-widest">
                                        {{ $uaCount }} entities found
                                    </p> --}}
                                </div>
                                <button @click="openUA = false"
                                    class="flex justify-center items-center bg-white hover:bg-slate-50 shadow-sm border border-slate-200 rounded-full w-8 h-8 text-slate-400 hover:text-slate-900 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Table Content -->
                            <div class="flex-grow bg-white p-6 overflow-y-auto custom-scrollbar">
                                <div class="border border-slate-100 rounded-2xl overflow-hidden">
                                    <table class="w-full text-left border-collapse">
                                        <thead>
                                            <tr class="bg-slate-50/50">
                                                <th
                                                    class="px-4 py-3 border-slate-100 border-b w-16 font-black text-[9px] text-slate-400 tracking-widest">
                                                    #</th>
                                                <th
                                                    class="px-4 py-3 border-slate-100 border-b font-black text-[9px] text-slate-400 tracking-widest">
                                                    Town</th>
                                                <th
                                                    class="px-4 py-3 border-slate-100 border-b font-black text-[9px] text-slate-400 tracking-widest">
                                                    Population</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-50">
                                            @foreach($uaArr as $index => $item)
                                            <tr class="group hover:bg-blue-50/30 transition-colors">
                                                <td
                                                    class="px-4 py-2.5 font-bold text-[10px] text-slate-400 tracking-tight">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="px-4 py-2.5 font-bold text-slate-700 group-hover:text-blue-600 text-xs transition-colors">
                                                    {{ $item['name'] ?? 'N/A' }}
                                                </td>
                                                <td
                                                    class="px-4 py-2.5 font-bold text-slate-700 group-hover:text-blue-600 text-xs transition-colors">
                                                    {{ number_format($item['TOT_P'] ?? 'N/A') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex justify-center bg-slate-50 px-8 py-5 border-slate-100 border-t">
                                <button @click="openUA = false"
                                    class="bg-slate-900 hover:bg-black shadow-lg px-10 py-2.5 rounded-xl font-bold text-[10px] text-white uppercase tracking-widest transition-all">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            @endif
            <!-- Village Banner Image -->
            <div class="shadow-sm hover:shadow-md border border-gray-100 rounded-2xl overflow-hidden transition-all">
    <img
        id="village-banner"
        src="https://prarang.s3.ap-south-1.amazonaws.com/town_villages_images/city_webs/756_Capitals/{{ $dhq['town']['town_code'] }}.jpg"
        alt="Village Banner"
        class="w-full h-[400px] object-cover"
        onerror="handleImageError(this)"
    >
</div>

<script>
function handleImageError(img) {
    const src = img.src;

    // Prevent infinite loop
    img.onerror = null;

    if (src.endsWith('.jpg')) {
        img.src = src.replace('.jpg', '.jpeg');
    } else if (src.endsWith('.jpeg')) {
        img.src = src.replace('.jpeg', '.png');
    } else {
        // All formats failed → blank image
        img.src = '';
    }
}
</script>

            {{-- @endif --}}
            @if (true)
            <!-- Village Description -->
            <div class="bg-white shadow-sm hover:shadow-md p-6 border border-gray-100 rounded-2xl transition-all">
                <div class="space-y-1 text-justify">
                    <p class="font-medium text-[15px] text-gray-700 leading-relaxed">
                        {!! $dhq['slm']['town']['s1'] ?? '' !!}
                        {!! $dhq['slm']['district'] ?? '-' !!}
                        {!! $dhq['slm']['town']['s2'] ?? '' !!}
                    </p>
                </div>
            </div>
            @endif

            {{-- Village Speak Section --}}
            <div class="bg-white shadow-sm hover:shadow-md p-6 border border-gray-100 rounded-2xl transition-all">
                {{-- <div class="flex flex-col items-center mb-6">
                    <h3 class="mb-1 font-black text-gray-900 text-xl">City Capital Speak</h3>
                    <div class="bg-blue-600 rounded-full w-10 h-0.5"></div>
                </div> --}}

                <div class="space-y-2">
                    <p class="font-medium text-[14px] text-gray-700 leading-relaxed">
                        {!! $dhq['slm_lang']['p1'] ?? '-' !!} For detailed language breakup of {{ $town['name'] ?? '-'
                        }} <a class="text-blue-600 hover:text-blue-800" href="#toLanguage">please see language box.</a>
                    </p>
                </div>


                <div class="space-y-2">
                    <p class="font-medium text-[14px] text-gray-700 leading-relaxed">
                        {!! $dhq['cn-slm'] ?? '-' !!}
                    </p>
                </div>
                <!-- Sanskriti & Prakriti Dual Section -->
                <!-- <div class="gap-10 grid grid-cols-1 md:grid-cols-2 mt-4 py-4 border-gray-100 border-t"> -->
                <!-- Sanskriti (Culture) -->
                <!-- <div class="flex flex-col items-center">
                        <h4 class="mb-1 font-bold text-gray-900 text-lg">संस्कृति</h4> -->

                <!-- Sanskriti Color Bar -->
                <!-- <div class="flex shadow-sm mb-1 w-full max-w-[320px] h-9 overflow-hidden">
                            <div class="flex-1" style="background-color: #ff0000;"></div>
                            <div class="flex-1" style="background-color: #f7f601;"></div>
                            <div class="flex-1" style="background-color: #0000ff;"></div>
                        </div> -->

                <!-- Card Entries -->
                <!-- <div class="space-y-2 w-full">
                            @for ($i = 1; $i <= 2; $i++) <div class="group/entry flex gap-4 cursor-default">
                                <div
                                    class="flex flex-shrink-0 justify-center items-center bg-gray-50 shadow-sm border border-indigo-100/50 group-hover/entry:border-indigo-200 rounded-2xl w-20 h-20 transition-all">
                                    <span class="font-bold text-[10px] text-gray-400">Image
                                        {{ $i }}</span>
                                </div>
                                <div
                                    class="flex flex-grow items-center bg-white shadow-sm px-6 border border-slate-100 group-hover/entry:border-slate-200 rounded-2xl transition-all">
                                    <span class="font-bold text-gray-800 text-sm">Culture Insight
                                        {{ $i }}</span>
                                </div>
                        </div> -->
                <!-- @endfor -->
                <!-- </div> -->
                <!-- </div> -->

                <!-- Prakriti (Nature) -->
                <!-- <div class="flex flex-col items-center">
                    <h4 class="mb-1 font-bold text-gray-900 text-lg">प्रकृति</h4>

                    <!-- Nature Color Bar -->
                <!-- <div class="flex shadow-sm mb-1 w-full max-w-[320px] h-9 overflow-hidden">
                    <div class="flex-1" style="background-color: #fef08a;"></div>
                    <div class="flex-1" style="background-color: #bef264;"></div>
                    <div class="flex-1" style="background-color: #22c55e;"></div>
                </div> -->

                <!-- Card Entries -->
                <!-- <div class="space-y-2 w-full">
                    @for ($i = 1; $i <= 2; $i++) <div class="group/entry flex gap-4 cursor-default">
                        <div
                            class="flex flex-shrink-0 justify-center items-center bg-gray-50 shadow-sm border border-green-100/50 group-hover/entry:border-green-200 rounded-2xl w-20 h-20 transition-all">
                            <span class="font-bold text-[10px] text-gray-400">Image
                                {{ $i }}</span>
                        </div>
                        <div
                            class="flex flex-grow items-center bg-white shadow-sm px-6 border border-slate-100 group-hover/entry:border-slate-200 rounded-2xl transition-all">
                            <span class="font-bold text-gray-800 text-sm">Nature Insight
                                {{ $i }}</span>
                        </div>
                </div>
                @endfor
            </div> -->
                <!-- </div> -->



            </div>
            @if($isAdsEnable)
            <style>
                /* Image */
                .mx-auto .grid .lg\:col-span-6 .justify-center img {
                    width: 100% !important;
                }
            </style>
            <div class="flex justify-center">
                <a href="{{config('portal.ads_url.url')}}" target="_blank">
                    <img class="rounded-lg" src="{{config('portal.sceh_ads.non-interaction')}}" alt=""></a>
            </div>
            @endif

            <!-- City Action Buttons -->
            <div class="flex gap-6 mt-6 mb-8 text-black">
                <a target="_blank" href="https://g2c.prarang.in/{{ $dhq['dhq']['city'] ?? '' }}?data"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 shadow-lg py-4 rounded-xl font-bold text-white text-center transition-all duration-300">
                    {{ $dhq['dhq']['city'] ?? '' }} Analytics
                </a>

                <a target="_blank" href="https://g2c.prarang.in/ai/{{ $dhq['dhq']['city'] ?? '' }}"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 shadow-lg py-4 rounded-xl font-bold text-white text-center transition-all duration-300">
                    {{ $dhq['dhq']['city'] ?? '' }} A.I. Report
                </a>
            </div>



            <!-- Instruments Section -->
            <div class="bg-white p-2">
                <div class="gap-8 grid grid-cols-1 md:grid-cols-2">
                    <!-- Business Instrument -->
                    <div
                        class="group relative bg-blue-400 shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-500">
                        <div class="absolute inset-0 opacity-30">
                            <div class="top-0 right-0 absolute bg-white opacity-50 blur-3xl rounded-full w-32 h-32"></div>
                            <div class="bottom-0 left-0 absolute bg-white opacity-50 blur-2xl rounded-full w-24 h-24"></div>
                        </div>
                        <div class="relative">
                            <div class="flex justify-center items-center mb-6 text-center">
                                <div>
                                    <h5 class="mb-2 font-extrabold text-white text-3xl md:text-4xl tracking-tight">Business
                                        Planner</h5>
                                    <p class="font-medium text-blue-50 text-sm md:text-base">Find new opportunities for your
                                        business</p>
                                </div>
                            </div>
                            <div class="space-y-4 mb-6">
                                <a href="https://g2c.prarang.in/india/market-planner/states?city={{ $dhq['town']['dhq_code'] ?? '-675' }}"
                                    target="_blank"
                                    class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">Find
                                            New Opportunities in India</span>
                                        <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                    </div>
                                    <small class="font-medium text-white/80">(Select Cities)</small>
                                </a>
                                <a href="https://g2c.prarang.in/world/market-planner?country=63" target="_blank"
                                    class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">Find
                                            New Opportunities in the World</span>
                                        <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                    </div>
                                    <small class="font-medium text-white/80">(Select Countries)</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Development Instrument -->
                    <div
                        class="group relative bg-green-500 shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-500">
                        <div class="absolute inset-0 opacity-30">
                            <div class="top-0 right-0 absolute bg-white opacity-50 blur-3xl rounded-full w-32 h-32"></div>
                            <div class="bottom-0 left-0 absolute bg-white opacity-50 blur-2xl rounded-full w-24 h-24"></div>
                        </div>
                        <div class="relative">
                            <div class="flex justify-center items-center mb-6 text-center">
                                <div>
                                    <h5 class="mb-2 font-extrabold text-white text-3xl md:text-4xl tracking-tight">
                                        Development Planner</h5>
                                    <p class="font-medium text-green-50 text-sm md:text-base">Compare the progress of your
                                        city/country</p>
                                </div>
                            </div>
                            <div class="space-y-4 mb-6">
                                <a href="https://g2c.prarang.in/india/development-planners?city={{ $dhq['town']['dhq_code'] ?? '-675' }}"
                                    target="_blank"
                                    class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">Compare
                                            Development in India</span>
                                        <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                    </div>
                                    <small class="font-medium text-white/80">(Select Cities)</small>
                                </a>
                                <a href="https://g2c.prarang.in/world/development-planner?country=63" target="_blank"
                                    class="group/link block bg-white/20 hover:bg-white/30 backdrop-blur-sm p-4 border border-white/30 hover:border-white/50 rounded-xl transition-all duration-300">
                                    <div class="flex justify-between items-center">
                                        <span
                                            class="font-bold text-white text-base md:text-lg transition-transform group-hover/link:translate-x-1">Compare
                                            Development in the World</span>
                                        <span class="text-white/70 group-hover/link:text-white text-xl transition-all">→</span>
                                    </div>
                                    <small class="font-medium text-white/80">(Select Countries)</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-6 order-2 lg:order-3 lg:col-span-3">
            <!-- Location Card -->
            {{-- <div
            class="bg-white shadow-sm hover:shadow-md border border-gray-100 rounded-2xl overflow-hidden transition-all">
            <div class="bg-gray-50/50 px-4 py-3 border-gray-50 border-b">
                <h3 class="font-bold text-blue-600 text-base text-center">Location</h3>
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
                <div class="flex justify-between items-center hover:bg-gray-50/30 px-4 py-2 transition-colors">
                    <span class="font-medium text-[13px] text-gray-500">{{ $detail['label'] }}</span>
            <span class="font-bold text-[13px] text-gray-800 tracking-tight">{{ $detail['value'] }}</span>
        </div>
        @endforeach
    </div>
    </div> --}}
    <div class="bg-white shadow-sm p-4 border border-gray-100/80 rounded-2xl">
        <table class="w-full border-collapse">
            <tbody class="text-[13px]">
                <tr>
                    <td class="py-1 font-medium text-gray-500">State</td>
                    <td class="py-1 font-bold text-gray-800 text-right">
                        {{ $dhq['state']['state_name'] ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-500">District</td>
                    <td class="py-1 font-bold text-gray-800 text-right">
                        {{ $dhq['town']['district'] ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-500 whitespace-nowrap">
                        Pop. 2011
                        <x-source source="Population - Census 2011" />
                    </td>
                    <td class="py-1 font-bold tabular-nums text-gray-800 text-right">
                        {{ isset($dhq['town']['TOT_P']) ? number_format($dhq['pop']['pop11'], 0) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-500 whitespace-nowrap">
                        Pop. 2026 (Est.)
                        <x-source source="Estimate - Population based on District Growth Rate - Census 2011" />
                    </td>
                    <td class="py-1 font-bold tabular-nums text-indigo-600 text-right">
                        {{ isset($dhq['town']['TOT_P']) ? number_format($dhq['pop']['pop26'], 0) : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div x-data="{ openModal: false, modalType: '' }"
        class="bg-white shadow px-2 py-3 border border-gray-100/80 rounded-2xl">

        <div class="gap-6 grid grid-cols-2">
            <button @click="openModal = true; modalType = 'towns'"
                class="flex justify-center items-center bg-blue-600 hover:bg-blue-600 shadow-lg hover:shadow-blue-500/20 py-4 border border-slate-200 rounded-2xl font-black text-slate-700 text-white hover:text-white text-sm transition-all cursor-pointer">
                District Towns #{{ $otherVilTown['towns']['count'] ?? 0 }}
            </button>
            <button @click="openModal = true; modalType = 'villages'"
                class="flex justify-center items-center bg-blue-600 hover:bg-blue-600 shadow-lg hover:shadow-blue-500/20 py-4 border border-slate-200 rounded-2xl font-black text-slate-700 text-white hover:text-white text-sm transition-all cursor-pointer">
                District Villages #{{ $otherVilTown['villages']['count'] ?? 0 }}
            </button>
        </div>

        <!-- Premium Modal for Towns/Villages -->
        <template x-teleport="body">
            <div x-show="openModal" x-cloak
                class="z-[999] fixed inset-0 flex justify-center items-center bg-gray-900/60 backdrop-blur-sm p-4"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                @click.self="openModal = false">

                <div class="flex flex-col bg-white shadow-2xl rounded-[32px] w-full max-w-4xl h-[90vh] overflow-hidden"
                    x-show="openModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0">

                    <!-- Header -->
                    <div
                        class="flex justify-between items-center bg-gradient-to-r from-slate-50 to-white px-8 py-6 border-slate-100 border-b">
                        <div class="flex items-center gap-4">
                            <div class="flex justify-center items-center shadow-inner rounded-2xl w-12 h-12"
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
                                <h3 class="font-black text-slate-900 text-2xl tracking-tight"
                                    x-text="modalType === 'towns' ? 'Towns' : 'Villages'"></h3>
                                <p class="font-bold text-slate-400 text-sm">Total Count: <span
                                        class="text-slate-900"
                                        x-text="modalType === 'towns' ? '{{ $otherVilTown['towns']['count'] ?? 0 }}' : '{{ $otherVilTown['villages']['count'] ?? 0 }}'"></span>
                                </p>
                            </div>
                        </div>
                        <button @click="openModal = false"
                            class="flex justify-center items-center bg-slate-100 hover:bg-slate-200 rounded-full w-10 h-10 text-slate-600 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Content List -->
                    <div class="flex-grow bg-slate-50/30 p-8 overflow-y-auto custom-scrollbar">
                        <div x-show="modalType === 'towns'"
                            class="gap-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($otherVilTown['towns']['data'] ?? [] as $id => $name)
                            <a href="/city/{{ url_encoder($dhq['state']['state_code']."
                                    -".$dhq['dhq']['DHQ_Code']."-".$id) }}/{{ Str::kebab($name) }}"
                                class="group block bg-white hover:shadow-blue-500/5 hover:shadow-lg px-4 py-4 border border-slate-100 hover:border-blue-200 rounded-2xl hover:text-blue-600 transition-all">
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-blue-400 text-xs italic">0{{ $loop->iteration
                                            }}</span>
                                    <span class="font-bold text-[13px] text-slate-700 transition-colors">{{ $name
                                            }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        <div x-show="modalType === 'villages'"
                            class="gap-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($otherVilTown['villages']['data'] ?? [] as $id => $name)
                            <a href="/village/{{ url_encoder($dhq['state']['state_code']."
                                    -".$dhq['dhq']['district_LGD_code']."-".$id) }}/{{ Str::kebab($name) }}"
                                class="group block bg-white hover:shadow-blue-500/5 hover:shadow-lg px-4 py-4 border border-slate-100 hover:border-blue-200 rounded-2xl hover:text-blue-600 transition-all">
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-blue-400 text-xs italic">0{{ $loop->iteration
                                            }}</span>
                                    <span class="font-bold text-[13px] text-slate-700 transition-colors">{{ $name
                                            }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-center bg-white px-8 py-5 border-slate-100 border-t">
                        <button @click="openModal = false"
                            class="bg-slate-900 hover:bg-black shadow-slate-900/20 shadow-xl px-10 py-3 rounded-2xl font-black text-white text-xs hover:scale-105 transition-all">
                            DONE
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <!-- Internet Trends Card -->
    <div
        class="bg-white shadow-sm hover:shadow-md border border-gray-100 rounded-2xl overflow-hidden transition-all">
        <div class="bg-gray-50/50 px-4 py-3 border-gray-50 border-b">
            <h3 class="font-bold text-blue-600 text-base text-center">Internet Trends</h3>
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
            'value' => isset($intData['internet_users']['value']) ?
            number_format($intData['internet_users']['value'], 0) : '-',
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
            [
            'label' => 'City Cyber Risk Index',
            'source' => "",
            'value' => $cirusData['risk_index'] ?? '-',
            ],
            ];
            @endphp



            @foreach ($trends as $trend)
            <div class="flex justify-between items-center hover:bg-gray-50/30 px-4 py-2 transition-colors">
                <span class="font-medium text-[13px] text-gray-500">{{ $trend['label'] }}
                    <x-source source="{{ $trend['source'] }}" />
                </span>
                <span class="font-bold tabular-nums text-[13px] text-gray-800">{{ $trend['value'] }}</span>
            </div>
            @endforeach
            <p class="text-end">
                <a href="https://www.prarang.in/cirus" class="text-blue-600 text-xs">See More >> </a>
            </p>

        </div>




    </div>
    <!-- Languages Card -->
    <div id="toLanguage"
        class="bg-white shadow-sm hover:shadow-md border border-gray-100 rounded-2xl overflow-hidden transition-all">
        <div class="bg-gray-50/50 px-4 py-3 border-gray-50 border-b">
            <h3 class="font-bold text-blue-600 text-base text-center">Languages</h3>
        </div>

        <div class="divide-y divide-gray-50">
            @foreach($dhq['top5_languages'] ?? [] as $key => $lang)
            <div class="flex justify-between items-center hover:bg-gray-50/30 px-4 py-2 transition-colors">
                <div class="flex items-center gap-2">
                    <span class="w-4 font-black text-[11px] text-blue-400">0{{ $lang['rank'] ?? $loop->iteration
                            }}</span>
                    <span class="font-medium text-[13px] text-gray-500">{{ $lang['language'] ?? 'N/A' }}</span>
                </div>
                <span class="font-bold tabular-nums text-[13px] text-gray-800">{{
                        ($lang['spek'] ?? 0)}}%</span>
            </div>
            @endforeach
        </div>
        <p class="px-4 py-2 text-end">
            <a target="_blank"
                href="https://g2c.prarang.in/india/multilingualism/{{ $dhq['dhq']['DHQ_Code'] }}/{{ $dhq['town']['town_code'] }}"
                class="font-bold text-[12px] text-blue-600 hover:text-blue-800 italic transition-colors">
                see more >>
            </a>
        </p>
    </div>
    <!-- Literacy Card -->
    <div
        class="bg-white shadow-sm hover:shadow-md border border-gray-100 rounded-2xl overflow-hidden transition-all">
        <div class="bg-gray-50/50 px-4 py-3 border-gray-50 border-b">
            <h3 class="font-bold text-blue-600 text-base text-center">Literacy (2011)</h3>
        </div>

        <div class="divide-y divide-gray-50">
            <div class="flex justify-between items-center hover:bg-gray-50/30 px-4 py-2 transition-colors">
                <span class="font-medium text-[13px] text-gray-500">Literate Population</span>
                <span class="font-bold tabular-nums text-[13px] text-gray-800">{{
                        number_format($dhq['literacy']['literate'] ?? 0) }}</span>
            </div>
            <div class="flex justify-between items-center hover:bg-gray-50/30 px-4 py-2 transition-colors">
                <span class="font-medium text-[13px] text-gray-500">Illiterate Population</span>
                <span class="font-bold tabular-nums text-[13px] text-gray-800">{{
                        number_format($dhq['literacy']['illiterate'] ?? 0) }}</span>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </x-layout.pages.town>
