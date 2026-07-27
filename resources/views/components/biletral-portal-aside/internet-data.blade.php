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

<div class="p-3 bg-white rounded">
                <div class="d-flex justify-content-end mb-3">
                    <span class="text-dark fw-normal" style="font-size: 0.9rem;">Last Update :
                        {{ \Carbon\Carbon::now()->subMonth()->format('F Y') }}</span>
                </div>
                <div class="internate-data-list">
                    <table class="table table-sm table-hover table-striped align-middle mb-0"
                        style="font-size: 0.82rem;">
                        <style>
                            /* Table Data */
                            table .table-striped td {
                                padding-top: 2px;
                                padding-bottom: 2px;
                            }
                        </style>
                        <thead class="table-light">
                            <tr>
                                <th class="text-muted fw-semibold" style="width: 50%;"></th>
                                <th class="text-muted fw-semibold text-end" style="width: 30%; white-space: nowrap;">
                                    People </th>
                                <th class="text-muted fw-semibold text-end" style="width: 20%;">World Rank</th>
                            </tr>
                        </thead>

                        <tbody>
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
                            } elseif (Str::contains($name, ['Internet'])) {
                            $icon = 'fa-globe';
                            $color = '#3498db';
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

                            <tr>
                                <td>
                                    <span class="me-2" style="display:inline-block; width:18px; text-align:center;">
                                        <i class="fa {{ $icon }}" style="color: {{ $color }};"></i>
                                    </span>
                                    <span class="text-dark">{{ $name }}</span>
                                    <span>
                                        <i onmouseover="showToolTip('{{ $key }}','{{ $intData['source'] }}')"
                                            class="fa fa-info-circle" style="color: {{ $color }};"></i>
                                    </span>
                                </td>

                                {{-- Value After --}}
                                <td class="text-end fw-semibold text-dark">
                                    {{ number_format($intData['value']) ?? '-' }}
                                </td>
                                {{-- Rank First --}}
                                <td class="text-end text-muted fw-semibold">
                                    {{ getSuperScript($intData['rank']) ?? '' }}
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            <!-- Cyber Crime Index Widget -->
            <div class="p-2 bg-white rounded border mt-4 mb-3">
                <h6 class="text-center text-dark mb-2" style="font-weight: 700; font-size: 13px;">
                    <i class="fa fa-shield me-1" style="color: #e74c3c;"></i>
                    Cyber Crime Index
                </h6>

                <div class="d-flex align-items-center justify-content-around py-1 px-2 rounded bg-[#F5F4ED]"
                    style="font-size: 11px;">
                    <div class="text-center">
                        <span class="text-muted">Index:</span>
                        <span class="fw-bold text-dark ms-1">{{ $cirusData['risk_index'] ?? '-' }}</span>
                    </div>
                    <div class="vr mx-2" style="height: 15px; opacity: 0.1;"></div>
                    <div class="text-center">
                        <span class="text-muted">Rank:</span>
                        <span class="fw-bold text-danger ms-1">{{ getSuperScript($cirusData['cyber_risk_rank'] ?? '')
                            }}</span>
                    </div>
                    <div class="ms-2">
                        <a href="https://www.prarang.in/cirus/world" target="_blank" class="text-primary">
                            <i class="fa fa-external-link" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
</div>
