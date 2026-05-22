@php
    $source = (array) ($memo['source'] ?? []);
    $memoData = (array) ($memo['memo'] ?? []);

    // World Wars
    $wars = [
    'WMEMO10' => 'WW1',
    'WMEMO11' => 'WW2',
    ];

    // Active wars
    $activeWars = array_keys(array_filter($wars, fn($k) => !empty($memoData[$k]) && $memoData[$k] == 1,
    ARRAY_FILTER_USE_KEY));
    $activeWarNames = array_map(fn($k) => $wars[$k], $activeWars);
@endphp

<div class="metricsdata bg-light border shadow rounded p-2">
    <div class="overflow-hidden rounded-2xl p-1 ">
        <table class="w-full text-sm border-collapse border border-gray-600 [&_tr:nth-child(even)]:bg-gray-300/30">
            <tbody class="divide-y divide-gray-100">

                {{-- Location --}}
                <tr class="bg-gray-50">
                    <td colspan="2" class="px-5 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        📍 Location
                    </td>
                </tr>
                @foreach([
                ['label' => 'Country Capital', 'key' => 'WMEMO14'],
                ['label' => 'Area (sq km)', 'key' => 'WMEMO22'],
                ] as $row)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">{{ $row['label'] }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ $memoData[$row['key']] ?? '—' }}
                    </td>
                </tr>
                @endforeach

                {{-- Terrain --}}
                <tr class="bg-gray-50">
                    <td colspan="2" class="px-5 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        ⛰️ Terrain
                    </td>
                </tr>
                @foreach([
                ['label' => 'Highest Point', 'key' => 'WMEMO15'],
                ['label' => 'Maximum Elevation', 'key' => 'WMEMO16'],
                ['label' => 'Lowest Point', 'key' => 'WMEMO17'],
                ['label' => 'Minimum Elevation', 'key' => 'WMEMO18'],
                ] as $row)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">{{ $row['label'] }}</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ $memoData[$row['key']] ?? '—' }}
                    </td>
                </tr>
                @endforeach

                {{-- Demographics --}}
                <tr class="bg-gray-50">
                    <td colspan="2" class="px-5 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        👥 Demographics
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">% of World Population</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ isset($memoData['WMEMO24']) && $memoData['WMEMO24'] !== '' ? $memoData['WMEMO24'] . '%' : '—' }}
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">Population Density</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ $memoData['WDEM9'] ?? '—' }}
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">Sex Ratio</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        @if(isset($memoData['WDEM10']) && is_numeric($memoData['WDEM10']))
                            {{ round((float)$memoData['WDEM10'] * 1000) }} female / 1000 male
                        @else
                            —
                        @endif
                    </td>
                </tr>

                {{-- Logistics --}}
                <tr class="bg-gray-50">
                    <td colspan="2" class="px-5 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        🚚 Logistics
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">No. of Time Zones</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ $memoData['WMEMO20'] ?? '—' }}
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">Dialing Code</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        {{ $memoData['WMEMO19'] ?? '—' }}
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">Currency</td>
                    <td class="px-5 py-3 text-gray-800 font-medium">
                        @if(isset($memoData['WMEMO12']) || isset($memoData['WMEMO13']))
                            {{ trim(($memoData['WMEMO12'] ?? '') . (isset($memoData['WMEMO13']) && $memoData['WMEMO13'] ? ' (' . $memoData['WMEMO13'] . ')' : '')) }}
                        @else
                            —
                        @endif
                    </td>
                </tr>

                {{-- World Wars --}}
                <tr class="bg-gray-50">
                    <td colspan="2" class="px-5 py-2 text-xs font-semibold uppercase tracking-wider text-gray-400">
                        ⚔️ World Wars
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-5 py-3 text-gray-600">Participated In</td>
                    <td class="px-5 py-3">
                        @forelse($activeWarNames as $war)
                        <span class="inline-block bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded-full mr-1">
                            {{ $war }}
                        </span>
                        @empty
                        <span class="text-gray-400 italic">—</span>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
