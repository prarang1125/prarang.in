<div class="w-full bg-white shadow-sm p-4 mt-2">

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
    </style>

    <div class="flex justify-center items-center mb-1">
        <h3 class="text-lg font-semibold text-gray-800 text-center">{{ $cityName }} का इंटरनेट गणित</h3>
    </div>

    <p class="text-end mb-3">
        <small>नयी अपडेट : {{ $lastUpdate }}</small>
    </p>

    @if ($loading)
    <div class="text-center text-gray-500 py-4">लोड हो रहा है...</div>
    @else
    {{-- INTERNATE DATA SECTION --}}
    @if ($internateError)
    <div class="text-center text-red-500 py-4">त्रुटि: {{ $internateError }}</div>
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
            <div class="p-1 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <i class="{{ $category['icon'] }} text-2xl {{ $category['icon_color'] }}"></i>

                    <span class="text-base font-semibold text-gray-800 flex items-center gap-2 relative group">
                        {{ $category['label'] }}

                        <i
                            class="fa fa-info-circle text-gray-400 cursor-pointer hover:text-blue-500 transition-colors"></i>

                        <!-- Custom Tailwind Tooltip -->
                        <div
                            class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 hidden group-hover:block z-50 min-w-[200px]">
                            <div
                                class="bg-slate-900/95 backdrop-blur-sm text-white text-[11px] rounded-lg p-2 shadow-xl border border-white/10 relative text-center">
                                <span class="block text-sky-400 font-bold mb-1 border-b border-white/10 pb-1">{{
                                    $category['label'] }}</span>
                                <span class="italic opacity-90">Source: {{ $internateData[$key]['source']['source'] ??
                                    'N/A' }}</span>

                                <!-- Tooltip Arrow -->
                                <div
                                    class="absolute top-full left-1/2 -translate-x-1/2 -mt-px border-4 border-transparent border-t-slate-900/95">
                                </div>
                            </div>
                        </div>
                    </span>
                </div>

                <div class="text-right">
                    <span class="text-lg font-bold text-gray-900">
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
    <div class="text-center text-gray-500 py-8">कोई डेटा उपलब्ध नहीं</div>
    @endif

    {{-- CIRUS Data Section --}}
    @if ($cirusData)
    <div class="mt-4 border-t-4 border-red-900 pt-4 bg-red-50/30 p-4 rounded-b-lg shadow-inner">
        <h3 class="font-bold text-red-900 mb-2 flex items-center gap-2">
            <i class="fa fa-shield-alt text-red-600"></i> {{ $cityName }} में साइबर सुरक्षा
        </h3>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between items-center bg-white p-2 rounded border border-red-100">
                <span class="text-gray-700 font-medium">साइबर जोखिम सूचकांक:</span>
                <span class="font-bold text-red-900 text-lg">{{ $cirusData['risk_index'] ?? '-' }}</span>
            </div>
        </div>
        <div class="flex justify-end items-center mt-3">
            <a href="https://prarang.in/cirus" target="_blank"
                class="text-sm font-bold text-blue-800 hover:text-blue-600 flex items-center gap-1 group">
                अधिक देखें और समझे
                <i class="fa fa-external-link-alt text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
            </a>
        </div>
    </div>
    @endif
    @endif
</div>