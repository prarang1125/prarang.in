<div>
    <h6 class="ps-2 text-center text-dark mt-3 mb-3" style="font-weight:700; letter-spacing:0.5px;">
        <i class="fa fa-language me-2"></i>
        {{ $data->country_name }} Language
    </h6>
    <table class="table table-bordered align-middle mb-0 language-data-table"
        style="background:transparent; font-size:0.78rem;">
        <tbody>
            @if($language && isset($language['languages']))
            <tr>
                <td class="text-dark">Language</td>
                <td>Speakers</td>
                <td class="text-end">Rank</td>
            </tr>
            @if(isset($language['english']['value']) && $language['english']['value'] > 0)
            <td>{{ $language['english']['name'] ?? '' }} <span style="cursor:pointer;"
                    onmouseover="showToolTip('lit-src', '{{$language['english']['source']}}')">
                    <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
                </span>
            </td>
            <td class="text-end">{{ $language['english']['value'] ?? '-' }}
            </td>
            <td class="text-end">{{ getSuperScript($language['english']['rank']) ?? '' }}
            </td>
            @endif
            @foreach ($language['languages'] as $row)
            <tr>
                <td>{{ $row['name'] ?? '' }} <span style="cursor:pointer;"
                        onmouseover="showToolTip('lit-src', '{{$row['source']}}')">
                        <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
                    </span></td>
                <td class="text-end">{{ $row['value'] ?? '-' }}
                </td>
                <td class="text-end">{{ getSuperScript($row['rank']) ?? '' }}
                </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="2" class="text-center">No language data available</td>
            </tr>
            @endif
        </tbody>

    </table>
    <div class="mt-3 text-center" style="font-size:12px;">
        <span class="fw-bold">
            {{ $data->country_name }} Literacy Rate



            <span style="cursor:pointer;"
                onmouseover="showToolTip('lit-src', 'World FactBook CIA, 2022 – % of Literate Population')">
                <i class="fa fa-info-circle" style="color: #fd7e14;"></i>
            </span>: {{ $language['literacy'] ?? 0 }}%
        </span>
        <span class="fw-bold ms-2">

        </span>
    </div>
    <div class="mt-1 pt-1 border-t text-center" style="font-size:12px;">
        <a class="text-md font-semibold text-blue-500 hover:text-blue-800 hover:font-bold"
            href="https://g2c.prarang.in/world/communication-planner/q/{{ $data->anlytics_code }}" target="_blank">World
            Communication
            Planner</a>
    </div>
</div>
