@php
$metaData = [
'nav-heading' => view('components.nav-heading', [
'text' => $city_name . ' : Top Monthly Search Results',
'leftImg' => '',
'rightImg' => asset('images/trends.png'),
'imageclass' => 'h-8 w-8 md:h-14 md:w-14'
]),
'nav-sub-heading' => '',
];
@endphp

<x-layout.main.base :metaData="$metaData">

    <style>
        .month-card {
            border: 1px solid #b5c7e3;
            border-radius: 0;
        }

        .month-header {
            background: #4a6fb3;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-weight: 600;
            font-size: 18px;
        }

        .trend-table thead th {
            background: #4a6fb3;
            color: #fff;
            font-weight: 600;
            border-color: #3a5fa0;
        }

        .trend-table td, .trend-table th {
            padding: 7px 10px;
            vertical-align: middle;
            font-size: 14px;
        }

        .trend-table tbody tr:hover {
            background: #eef2fa;
        }

        .other-searches {
            border: 1px solid #b5c7e3;
            background: #f8f9fc;
            padding: 12px 15px;
            border-radius: 6px;
            font-size: 13px;
            line-height: 1.8;
        }

        .other-searches .cat-label {
            font-weight: 600;
            color: #333;
        }

        .source-text {
            font-size: 12px;
            color: #000;
        }

        .note-text {
            font-size: 12px;
            color: #000;
        }
    </style>

    <div class="container mt-4">

        <p class="text-start mb-2">
            Discover what people in our city searched for the most and explore the topics that captured local attention.
            The following highlights the queries that generated the highest interest among citizens, based on Google search activity in both English and Hindi.
        </p>

        <div class="d-flex justify-content-between align-items-start mb-3">
            <p class="note-text mb-0">
                <strong>Note:</strong> Popularity values represent relative interest within each language and should not be directly compared across the two languages.
            </p>
            <span class="source-text text-nowrap ms-3">Source : Google Trends</span>
        </div>

        @foreach ($trends as $month => $data)

        <div class="card month-card mb-4">

            <div class="month-header">
                {{ \Carbon\Carbon::parse($month)->format('F Y') }}
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <!-- English Section -->
                    <div class="col-lg-6">
                        <table class="table table-bordered table-striped table-hover trend-table mb-0">
                            <thead>
                                <tr>
                                    <th style="width:40px">#</th>
                                    <th>English Search Topics</th>
                                    <th style="width:100px" class="text-center">Popularity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['english'] as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->search_query }}</td>
                                    <td class="text-center">{{ $item->popularity }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center text-muted">No data</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Hindi Section -->
                    <div class="col-lg-6">
                        <table class="table table-bordered table-striped table-hover trend-table mb-0">
                            <thead>
                                <tr>
                                    <th style="width:40px">#</th>
                                    <th>Hindi Search Topics</th>
                                    <th style="width:100px" class="text-center">Popularity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['hindi'] as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->search_query }}</td>
                                    <td class="text-center">{{ $item->popularity }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center text-muted">No Significant Searches</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                @if(($data['category_queries'] ?? collect())->isNotEmpty())
                <div class="other-searches mt-3">
                    <div class="cat-label mb-1">Other Major Searches:</div>
                    @foreach($data['category_queries'] as $categoryItem)
                    <div>
                        <span class="cat-label">{{ $categoryItem->category }} :</span>
                        <span class="text-muted">{{ trim($categoryItem->queries) }}</span>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

        </div>

        @endforeach

    </div>

</x-layout.main.base>

