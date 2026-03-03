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
        }

        .month-header {
            background: #4a6fb3;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-weight: 600;
            font-size: 18px;
        }

        .trend-column {
            border: 2px solid #4a6fb3;
            padding: 15px;
            border-radius: 6px;
            background: #ffffff;
        }

        .trend-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #000;
            text-align: center;
        }

        .trend-item {
            border: 1px solid #4a6fb3;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            background: #f8f9fc;
            color: #000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        /* .trend-item:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    } */
    </style>

    <div class="container mt-5">

        <p class="text-start mb-4">
            The following are the most searched English and Hindi keywords for the city,
            ranked by popularity each month. Discover what people in your city searched
            for the most and explore the topics that captured local attention.
        </p>

        @foreach ($trends as $month => $data)

        <div class="card month-card mb-4">

            <div class="month-header">
                {{ \Carbon\Carbon::createFromFormat('M-Y', $month)->format('F Y') }}
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- English Section -->
                    <!-- English Section -->
                    <div class="col-lg-6">
                        <div class="trend-column">
                            <div class="trend-title">English Searches</div>

                            <div class="row">
                                @foreach ($data['english'] as $item)
                                <div class="col-md-6 mb-2">
                                    <div class="trend-item">
                                        {{ $item['Queries'] }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Hindi Section -->
                    <div class="col-lg-6">
                        <div class="trend-column">
                            <div class="trend-title">हिंदी सर्च</div>

                            <div class="row">
                                @foreach ($data['hindi'] as $item)
                                <div class="col-md-6 mb-2">
                                    <div class="trend-item">
                                        {{ $item['Queries'] }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @endforeach

    </div>

</x-layout.main.base>
