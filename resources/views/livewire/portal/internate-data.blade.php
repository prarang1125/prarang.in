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

    @if($loading)
    <div class="text-center text-gray-500 py-4">लोड हो रहा है...</div>
    @elseif($error)
    <div class="text-center text-red-500 py-4">त्रुटि: {{ $error }}</div>
    @elseif($internateData && !empty($internateData['city_info']))
    <div class="space-y-3">
        <div class="space-y-2">
            @foreach($internateData['city_info'] as $city)
            @php
            $categoryLabel = '';
            $categoryColor = '';
            $icon = '';
            $iconColor = '';

            switch ($city['sno']) {
            case 2:
            $categoryLabel = 'जनसंख्या (2025)';
            $categoryColor = 'bg-purple-50 border-purple-200';
            $icon = 'fa fa-users';
            $iconColor = 'text-purple-600';
            break;
            case 6:
            $categoryLabel = 'इंटरनेट उपयोगकर्ता';
            $categoryColor = 'bg-blue-50 border-blue-200';
            $icon = 'fa fa-globe';
            $iconColor = 'text-blue-600';
            break;
            case 7:
            $categoryLabel = 'फेसबुक उपयोगकर्ता';
            $categoryColor = 'bg-blue-50 border-blue-200';
            $icon = 'fa fa-facebook';
            $iconColor = 'text-blue-600';
            break;
            case 8:
            $categoryLabel = 'लिंक्डइन उपयोगकर्ता';
            $categoryColor = 'bg-blue-50 border-blue-200';
            $icon = 'fa fa-linkedin';
            $iconColor = 'text-blue-700';
            break;
            case 9:
            $categoryLabel = 'ट्विटर उपयोगकर्ता';
            $categoryColor = 'bg-sky-50 border-sky-200';
            $icon = 'fa fa-times';
            $iconColor = 'text-dark';
            break;
            default:
            $categoryLabel = $city['title'];
            $categoryColor = 'bg-white border-gray-200';
            $icon = 'fa fa-chart-bar';
            $iconColor = 'text-gray-600';
            }
            @endphp

            <div class="p-1 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <i class="{{ $icon }} text-2xl {{ $iconColor }}"></i>
                    <span class="text-base font-semibold text-gray-800">{{ $categoryLabel }}</span>
                </div>
                <div class="text-right">
                    <span class="text-lg font-bold text-gray-900">
                        {{ is_numeric($city['value']) ? number_format($city['value'], 0, '.', ',') : $city['value'] }}
                    </span>
                </div>
            </div>
            @endforeach

        </div>

        {{-- CIRUS Data Section --}}
        @if($cirusData)
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
    </div>
    @else
    <div class="text-center text-gray-500 py-8">कोई डेटा उपलब्ध नहीं</div>
    @endif
</div>