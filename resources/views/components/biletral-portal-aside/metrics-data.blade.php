@php
    $source = (array) ($memo['source'] ?? []);
    $memoData = (array) ($memo['memo'] ?? []);

    // Government types
    $govTypes = [
        'WMEMO1' => 'Communist State',
        'WMEMO2' => 'Monarchy',
        'WMEMO3' => 'Democracy',
        'WMEMO4' => 'Republic',
    ];

    // Religion types
    $religions = [
        'WMEMO5' => 'Islamic',
        'WMEMO6' => 'Jewish',
        'WMEMO7' => 'Christian',
        'WMEMO8' => 'Hindu',
        'WMEMO9' => 'Buddhist',
    ];

    // World Wars
    $wars = [
        'WMEMO10' => 'WW1',
        'WMEMO11' => 'WW2',
    ];

    // Active governments (value == 1)
    $activeGovNames = [];
    foreach ($govTypes as $key => $name) {
        if (!empty($memoData[$key]) && $memoData[$key] == 1) {
            $activeGovNames[] = $name;
        }
    }

    // Active religions
    $activeRelNames = [];
    foreach ($religions as $key => $name) {
        if (!empty($memoData[$key]) && $memoData[$key] == 1) {
            $activeRelNames[] = $name;
        }
    }

    // Active wars
    $activeWarNames = [];
    foreach ($wars as $key => $name) {
        if (!empty($memoData[$key]) && $memoData[$key] == 1) {
            $activeWarNames[] = $name;
        }
    }
@endphp

<div class="metrics-data-list">
    <div class="overflow-hidden rounded-xl border border-gray-100 shadow-sm">
        <table class="w-full text-sm border-collapse bg-white">
            <tbody class="divide-y divide-gray-100">
                {{-- Government --}}
                <tr class="bg-gray-50/50">
                    <td colspan="2" class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                        🏛 Government Type
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-600 font-medium">System</td>
                    <td class="px-4 py-3 text-right">
                        @forelse($activeGovNames as $name)
                            <span class="inline-block bg-green-50 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-100 mb-1">
                                {{ $name }}
                            </span>
                        @empty
                            <span class="text-gray-400 italic text-xs">—</span>
                        @endforelse
                    </td>
                </tr>

                {{-- Religion --}}
                <tr class="bg-gray-50/50">
                    <td colspan="2" class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                        🕌 Religion
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-600 font-medium">State Religion</td>
                    <td class="px-4 py-3 text-right">
                        @forelse($activeRelNames as $name)
                            <span class="inline-block bg-blue-50 text-blue-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-blue-100 mb-1">
                                {{ $name }}
                            </span>
                        @empty
                            <span class="text-gray-400 italic text-xs">No official state religion</span>
                        @endforelse
                    </td>
                </tr>

                {{-- Geography --}}
                <tr class="bg-gray-50/50">
                    <td colspan="2" class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                        📍 Geography
                    </td>
                </tr>
                @foreach ([
                    ['label' => 'Capital', 'key' => 'WMEMO14'],
                    ['label' => 'Highest Point', 'key' => 'WMEMO15'],
                    ['label' => 'Max Elevation', 'key' => 'WMEMO16', 'suffix' => ' m'],
                    ['label' => 'Lowest Point', 'key' => 'WMEMO17'],
                    ['label' => 'Min Elevation', 'key' => 'WMEMO18', 'suffix' => ' m'],
                    ['label' => 'Time Zones', 'key' => 'WMEMO20'],
                ] as $row)
                    @if(!empty($memoData[$row['key']]))
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-gray-600 font-medium">{{ $row['label'] }}</td>
                        <td class="px-4 py-3 text-gray-900 font-bold text-right">
                            {{ $memoData[$row['key']] }}{{ $row['suffix'] ?? '' }}
                        </td>
                    </tr>
                    @endif
                @endforeach

                {{-- Economy --}}
                <tr class="bg-gray-50/50">
                    <td colspan="2" class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                        💱 Economy
                    </td>
                </tr>
                @foreach ([
                    ['label' => 'Currency', 'key' => 'WMEMO12'],
                    ['label' => 'Currency ISO', 'key' => 'WMEMO13'],
                    ['label' => 'Dialing Code', 'key' => 'WMEMO19'],
                    ['label' => '% of World Pop.', 'key' => 'WMEMO24', 'suffix' => '%'],
                ] as $row)
                    @if(!empty($memoData[$row['key']]))
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-gray-600 font-medium">{{ $row['label'] }}</td>
                        <td class="px-4 py-3 text-gray-900 font-bold text-right">
                            {{ $memoData[$row['key']] }}{{ $row['suffix'] ?? '' }}
                        </td>
                    </tr>
                    @endif
                @endforeach

                {{-- World Wars --}}
                <tr class="bg-gray-50/50">
                    <td colspan="2" class="px-4 py-2 text-[10px] font-bold uppercase tracking-wider text-gray-400">
                        ⚔️ World Wars
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-gray-600 font-medium">Participated In</td>
                    <td class="px-4 py-3 text-right">
                        @forelse($activeWarNames as $war)
                            <span class="inline-block bg-red-50 text-red-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-red-100 mb-1">
                                {{ $war }}
                            </span>
                        @empty
                            <span class="text-gray-400 italic text-xs">—</span>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
