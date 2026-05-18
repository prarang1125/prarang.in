@props(['data'])

@php
$anlyticsCode = $data->anlytics_code ?? ($data->analytics_slug ?? 'country');
$internateData = Cache::remember('mobile-internet-data-' . $anlyticsCode, now()->addDays(7), function () use (
$anlyticsCode,
) {
return httpGet('/internate-data/countries', ['country_id' => $anlyticsCode])['data'] ?? [];
});

$cirusData = Cache::remember('mobile-cirus-data-' . $anlyticsCode, now()->addDays(7), function () use (
$anlyticsCode,
) {
$allCirus =
json_decode(file_get_contents('https://api.apratyaksh.org/api/v1/cirus/countries'), true)['data'] ?? [];
if ($allCirus) {
$grouped = collect($allCirus)->groupBy('id');
return $grouped[$anlyticsCode][0] ?? null;
}
return null;
});

$isIndia = strtolower($data->country_name) === 'india';
$flagUrl = "";
@endphp

<div class="internate-data-list">

    <div class="flex items-end justify-end mb-3 bg-gray-50 p-3 rounded-lg">
        {{-- <div class="flex items-center gap-3">
            <img src="{{ $flagUrl }}" class="w-8 h-5 object-cover rounded shadow-sm border border-gray-200" alt="Flag">
            <span class="font-bold text-gray-800">{{ $data->country_name }}</span>
        </div> --}}
        <span class="text-[10px] text-gray-500 italic">Last Updated:
            {{ \Carbon\Carbon::now()->subMonth()->format('M Y') }}</span>
    </div>
    <table class="w-full text-sm border-collapse border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100/50">
            <tr>
                <th class="text-left py-2 px-3 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Source</th>
                <th class="text-right py-2 px-3 text-[10px] font-bold text-gray-400 uppercase tracking-wider">People
                </th>
                <th class="text-right py-2 px-3 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Rank</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($internateData as $key => $intData)
            @php
            $name = $intData['name'];
            $replacements = [
            'जनसंख्या' => 'Population',
            'इंटरनेट उपयोगकर्ता' => 'Internet Users',
            'फेसबुक उपयोगकर्ता' => 'Facebook Users',
            'लिंक्डइन उपयोगकर्ता' => 'LinkedIn Users',
            'ट्विटर उपयोगकर्ता' => 'X (Twitter) Users',
            'इन्स्टाग्राम उपयोगकर्ता' => 'Instagram Users',
            'उपयोगकर्ता' => 'Users',
            ];
            $name = str_replace(array_keys($replacements), array_values($replacements), $name);

            $icon = 'fa-globe';
            $color = '#3498db';
            if (Str::contains($name, ['Population'])) {
            $icon = 'fa-users';
            $color = '#8e44ad';
            } elseif (Str::contains($name, ['Facebook'])) {
            $icon = 'fa-facebook-square';
            $color = '#3b5998';
            } elseif (Str::contains($name, ['LinkedIn'])) {
            $icon = 'fa-linkedin-square';
            $color = '#0077b5';
            } elseif (Str::contains($name, ['Twitter', 'X'])) {
            $icon = 'fa-twitter';
            $color = '#000000';
            } elseif (Str::contains($name, ['Instagram'])) {
            $icon = 'fa-instagram';
            $color = '#e1306c';
            }
            @endphp
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="py-2.5 px-3 flex items-center gap-2">
                    <i class="fa {{ $icon }} w-4 text-center" style="color: {{ $color }};"></i>
                    <span class="text-gray-700 font-medium">{{ $name }}</span>
                    <span>
                        <i onmouseover="showToolTip(event, '{{ $key }}','{{ $intData['source'] }}')"
                            class="fa fa-info-circle" style="color: {{ $color }};"></i>
                    </span>
                </td>
                <td class="py-2.5 px-3 text-right font-semibold text-gray-900">
                    {{ number_format($intData['value']) }}
                </td>
                <td class="py-2.5 px-3 text-right text-gray-500 font-medium whitespace-nowrap">
                    {{ getSuperScript($intData['rank']) }}
                </td>
            </tr>
            @endforeach

            @if ($cirusData)
            <tr class="border-t-2 border-orange-200 bg-orange-50/20">
                <td class="py-3 px-3 flex items-center gap-2">
                    <i class="fa fa-shield w-4 text-center text-red-600"></i>
                    <span class="text-gray-900 font-bold text-xs">Cyber Crime Index</span>
                </td>
                <td class="py-3 px-3 text-right font-bold text-orange-700">
                    {{ $cirusData['risk_index'] ?? '-' }}
                </td>
                <td class="py-3 px-3 text-right font-bold text-gray-900">
                    {{ getSuperScript($cirusData['cyber_risk_rank'] ?? 0) }}
                </td>
            </tr>
            @endif
        </tbody>
    </table>

    <div class="mt-4 text-end">
        <a href="https://www.prarang.in/cirus/world" target="_blank"
            class="inline-block px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full text-[10px] font-bold text-gray-600 transition-colors uppercase tracking-widest">
            see more &rarr;
        </a>
    </div>
</div>
