<div class="bg-white shadow-sm mt-2 p-4 w-full">
    <style>
        /* Hover */
        .home-bg div .hover\:shadow-md {
            font-size: 14px;
        }

        /* Font semibold */
        .home-bg .space-y-2 .font-semibold {
            font-size: 15px;
        }

        /* Font bold */
        .home-bg .hover\:shadow-md .font-bold {
            font-size: 15px;
        }

        /* Link */
        .rounded-b-lg .items-center a {
            justify-content: flex-end;
            align-items: flex-end;
            text-align: right;
            font-size: 12px;
        }

        /* Rounded */
        .w-full .w-full .rounded-b-lg:nth-child(5) {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Button */
        .w-full .w-full .btn-primary {
            /* background-color: #0e22d6; */
            border: 2px solid #0e22d6;
            color: #0e22d6;
            width: 235px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
            transition: background-color 0.3s ease;
        }

        /* Button (hover) */
        .w-full .w-full .btn-primary:hover {
            background-color: #d4e2f1;
        }

        /* Rounded */
        .w-full .w-full .rounded-b-lg {
            padding-left: 27px;
            padding-top: 9px;
            padding-bottom: 12px;
            margin-top: 7px;
            margin-bottom: -10px;
        }

        /* Rounded */
        .w-full .w-full .rounded-b-lg:nth-child(5) {
            padding-left: 14px;
        }

        /* Justify between */
        .w-full .space-y-3 .justify-between {
            margin-bottom: 5px;
        }

        /* Arabic numbers */
        .w-full .w-full .arabic-numbers {
            text-align: center;
            position: relative;
            top: 2px;
        }

        /* Span Tag */
        .w-full .arabic-numbers span {
            font-size: 15px;
            position: relative;
            top: -3px;
        }
    </style>

    <div class="flex justify-center items-center mb-1">
        <h3 class="font-semibold text-gray-800 text-lg text-center">{{ $cityName }} का इंटरनेट गणित</h3>
    </div>

    <p class="mb-3 text-end">
        <small>नई अपडेट : {{ $lastUpdate }}</small>
    </p>

    @if ($loading)
    <div class="py-4 text-gray-500 text-center">लोड हो रहा है...</div>
    @else
    {{-- INTERNATE DATA SECTION --}}
    @if ($internateError)
    <div class="py-4 text-red-500 text-center">त्रुटि: {{ $internateError }}</div>
    @elseif($internateData && !empty($internateData))
    <div class="space-y-3">
        <div class="space-y-2">
            @php
            $categories = [
            'city_population' => [
            'label' => 'जनसंख्या (2025)',
            'bg' => 'bg-purple-50 border-purple-200',
            'icon' => 'fa fa-users',
            'icon_color' => 'text-purple-600',
            ],
            'internet_users' => [
            'label' => 'इंटरनेट उपयोगकर्ता',
            'bg' => 'bg-blue-50 border-blue-200',
            'icon' => 'fa fa-globe',
            'icon_color' => 'text-blue-600',
            ],
            'facebook_users' => [
            'label' => 'फेसबुक उपयोगकर्ता',
            'bg' => 'bg-blue-50 border-blue-200',
            'icon' => 'fa fa-facebook',
            'icon_color' => 'text-blue-600',
            ],
            'linkedin_users' => [
            'label' => 'लिंक्डइन उपयोगकर्ता',
            'bg' => 'bg-blue-50 border-blue-200',
            'icon' => 'fa fa-linkedin',
            'icon_color' => 'text-blue-700',
            ],
            'twitter_users' => [
            'label' => 'ट्विटर उपयोगकर्ता',
            'bg' => 'bg-sky-50 border-sky-200',
            'icon' => 'fa fa-times',
            'icon_color' => 'text-dark',
            ],
            'instagram_users' => [
            'label' => 'इंस्टाग्राम उपयोगकर्ता',
            'bg' => 'bg-pink-50 border-pink-200',
            'icon' => 'fa fa-instagram',
            'icon_color' => 'text-pink-600',
            ],
            ];

            @endphp
            @foreach ($categories as $key => $category)
            @if (isset($internateData[$key]))
            <div class="flex justify-between items-center p-1">
                <div class="flex items-center gap-3">
                    <i class="{{ $category['icon'] }} text-2xl {{ $category['icon_color'] }}"></i>

                    <span class="group relative flex items-center gap-2 font-semibold text-gray-800 text-base">
                        {{ $category['label'] }}

                        <i
                            class="text-gray-400 hover:text-blue-500 transition-colors cursor-pointer fa fa-info-circle"></i>

                        <!-- Custom Tailwind Tooltip -->
                        <div
                            class="hidden group-hover:block bottom-full left-1/2 z-50 absolute mb-2 min-w-[200px] -translate-x-1/2">
                            <div
                                class="relative bg-slate-900/95 shadow-xl backdrop-blur-sm p-2 border border-white/10 rounded-lg text-[11px] text-white text-center">
                                <span class="block mb-1 pb-1 border-white/10 border-b font-bold text-sky-400">{{
                                    $category['label'] }}</span>
                                <span class="opacity-90 italic">Source:
                                    {{ $internateData[$key]['source']['source'] ?? 'N/A' }}</span>

                                <!-- Tooltip Arrow -->
                                <div
                                    class="top-full left-1/2 absolute -mt-px border-4 border-transparent border-t-slate-900/95 -translate-x-1/2">
                                </div>
                            </div>
                        </div>
                    </span>
                </div>

                <div class="text-right">
                    <span class="font-bold text-gray-900 text-lg">
                        {{ is_numeric($internateData[$key]['value'] ?? null)
                        ? number_format($internateData[$key]['value'])
                        : $internateData[$key]['value'] ?? '-' }}
                    </span>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
    @else
    <div class="py-8 text-gray-500 text-center">कोई डेटा उपलब्ध नहीं</div>
    @endif
    @php
    $allowedCities = ['lucknow', 'rampur', 'shahjahanpur', 'jaunpur', 'meerut'];
    @endphp
    @if(in_array($citySlug, $allowedCities))
    <div class="bg-red-50/30 shadow-inner mt-4 p-4 pt-4 border-red-900 border-t-4 rounded-b-lg">
        <a href="{{ route('search-trends', ['city_id' => $city_id, 'city_name' => $citySlug]) }}" target="_blank"
            class="px-4 py-2 rounded-full btn-outline-red-700 font-bold btn hover:btn-red-900 btn btn-primary">
            <i class="mr-2 text-red-600 fa fa-shield-alt"></i>
            <span class="arabic-numbers">{{ $cityName }}</span> &nbsp; के सर्च ट्रेंड्स
        </a>
    </div>

    @endif

    <div class="bg-red-50/30 shadow-inner mt-4 p-4 pt-4 border-red-900 border-t-4 rounded-b-lg">
        <a href="https://g2c.prarang.in/india/multilingualism/{{ $city_id }}" target="_blank"
            class="px-4 py-2 rounded-full btn-outline-red-700 font-bold btn hover:btn-red-900 btn btn-primary">
            <i class="mr-2 text-red-600 fa fa-shield-alt"></i>
            <span class="arabic-numbers">{{ $cityName }}</span> &nbsp; की भाषा</a>
        </a>
    </div>
    @if(in_array($citySlug, $allowedCities) && $citySlug != 'shahjahanpur')
    <div class="bg-red-50/30 shadow-inner mt-4 p-4 pt-4 border-red-900 border-t-4 rounded-b-lg">
        <a href="https://b2b.prarang.in/semiotic/{{ base64_encode($city_code) }}" target="_blank"
            class="px-4 py-2 rounded-full btn-outline-red-700 font-bold btn hover:btn-red-900 btn btn-primary">

            <span class="arabic-numbers">{{ $cityName }}&nbsp; की सांकेतिकता <span class="text-mute">(Semiotics)</span>
        </a>
    </div>

    @endif
    <div class="bg-red-50/30 shadow-inner mt-4 p-4 pt-4 border-red-900 border-t-4 rounded-b-lg">
        <a href="https://www.prarang.in/archives/{{ $citySlug }}" target="_blank"
            class="px-4 py-2 rounded-full btn-outline-red-700 font-bold btn hover:btn-red-900 btn btn-primary">
            <i class="mr-2 text-red-600 fa fa-shield-alt"></i>
            <span class="arabic-numbers">{{ $cityName }}</span> &nbsp;के व्यवस्थित लेख
        </a>
    </div>

    {{-- CIRUS Data Section --}}
    @if ($cirusData)
    <div class="bg-red-50/30 shadow-inner mt-4 p-4 pt-4 border-red-900 border-t-4 rounded-b-lg">
        <h3 class="flex items-center gap-2 mb-2 font-bold text-red-900">
            <i class="text-red-600 fa fa-shield-alt"></i> {{ $cityName }} में साइबर सुरक्षा
        </h3>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between items-center bg-white p-2 border border-red-100 rounded">
                <span class="font-medium text-gray-700">साइबर जोखिम सूचकांक:</span>
                <span class="font-bold text-red-900 text-lg">{{ $cirusData['risk_index'] ?? '-' }}</span>
            </div>
        </div>
        <div class="flex justify-end items-center mt-3">
            <a href="https://prarang.in/cirus" target="_blank"
                class="group flex items-center gap-1 font-bold text-blue-800 hover:text-blue-600 text-sm">
                अधिक देखें और समझे <br>
                (In English)
                <i class="text-[10px] transition-transform group-hover:translate-x-0.5 fa fa-external-link-alt"></i>
            </a>
        </div>
    </div>
    @endif
    @endif
</div>
