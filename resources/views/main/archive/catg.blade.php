<x-layout.main.base>
    <style>
        /* Image */
        .align-items-center .fw-bold img {
            width: 27px;
            margin-right: 14px;
        }

        /* Link */
        .align-items-center a {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .city-a:hover {
            background: #326de5;


        }

        .city-a:hover a {
            /* background: #326de5; */
            color: white !important;
        }

        /* Paragraph */
        .container section p {
            font-weight: 600;
            margin-bottom: 0px;
        }

        /* List Item */
        .shadow ul li {
            text-decoration: none;
            color: #5b7599;
        }

        /* Link */
        .shadow ul a {
            text-decoration: none;
            color: #1e2123;
        }

        .shadow ul a:hover {
            text-decoration: none;
            color: #28a0ef;
        }

        .container section .shadow>.text-center>.text-center {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            /* height: 200px; Example height for demonstration */
            /* border: 1px solid #ccc; */
        }

        .container section .shadow>.text-center>.text-center:hover div {
            background: #f0f6ca;

        }

        /* .container section .shadow>.text-center>.text-center:hover div a {

            color:#fff;
        } */
        /* Link */
        .container section a {
            text-decoration: none;
            color: #000000;
            font-weight: 600;
        }
    </style>
    <section>
        @switch($catg)
            @case('time')
                <div class="shadow mt-3 p-3">
                    <h1 class="text-center">Time</h1>
                    <p>List of cities</p>
                    <div class="row">
                        @foreach ($portal as $item)
                            <div class="m-1 p-1 border border-primary rounded city-a col-sm-2">
                                <a target="_blank" class="text-primary fw-bold fs-6" style="text-decoration: none; "
                                    href="{{ route('posts.city', ['city' => $item->slug]) }}">{{ $item->city_name }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>
            @break

            @case('work')
                <div class="shadow mt-3 p-3">
                    <h1 class="text-center">Work</h1>

                    <div class="row">
                        @foreach ($profession as $key => $items)
                            @if (array_key_exists($key, config('tagmaping.profession')))
                                <div class="col-sm-6">
                                    <div class="mb-3 p-1 border rounded">
                                        <h6 class="p-1 border-bottom text-center fw-bold">
                                            {{ config('tagmaping.profession')[$key] }}</h5>
                                            <ul>
                                                @foreach ($items as $item)
                                                    <li><a href="{{ route('post-archive', [
    'catg' => $catg,
    'ids' => implode('-', $item['tags']),
    'name' => strtoupper(str_replace('/', ', ', $item['profession'])),
    'cityCode' => $cityCode
]) }}">
    {{ strtoupper(str_replace('/', ', ', $item['profession'])) }}
</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            @break

            @case('education')
                <div class="shadow mt-3 p-3">
                    <h1 class="text-center">Education</h1>
                    <div class="row">
                        @foreach ($education as $key => $items)
                            @if (array_key_exists($key, config('tagmaping.education')))
                                <div class="col-sm-6">
                                    <div class="mb-3 p-1 border rounded">
                                        <h6 class="p-1 border-bottom text-center fw-bold">
                                            {{ config('tagmaping.education')[$key] }}</h5>
                                            <ul>
                                                @foreach ($items as $item)
                                                    <li><a
                                                            href="{{ route('post-archive', ['catg' => $catg, 'ids' => implode('-', $item['tags']), 
                                                             'name' => strtoupper(str_replace('/', ',', $item['subjectname'])),
                                                            'cityCode' => $cityCode]) }}">{{ $item['subjectname'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @break

            @case('place')
                <div class="shadow mt-3 p-3">
                    <h1 class="text-center">Place</h1>
                    <div class="text-center row">
                        <div class="text-center col-sm-6">
                            <div class="shadow p-2 pt-3 pb-3 border rounded w-50 text-center"><a
                                    href="{{ route('post-archive', ['catg' => $catg, 'ids' => 0, 'name' => 'For The City', 'cityCode' => $cityCode]) }}">For
                                    The City</a></div>
                        </div>
                        <div class="text-center col-sm-6">
                            <div class="shadow p-2 pt-3 pb-3 border rounded w-50 text-center"><a
                                    href="{{ route('post-archive', ['catg' => $catg, 'ids' => 1, 'name' => 'About The City', 'cityCode' => $cityCode]) }}">About
                                    The City</a></div>
                        </div>
                    </div>
                </div>
                </div>
            @break

            @case('emotion')
                <div class="shadow mt-3 p-3">
                    <h1 class="text-center">Emotion</h1> <br>
                    <div class="text-center row">
                        @foreach (config('tagmaping.emotionIdName') as $key => $items)
                            <div class="text-center col-sm-4">
                                <div class="shadow m-2 p-2 pt-3 pb-3 border rounded w-75 text-center"><a
                                        href="{{ route('post-archive', ['catg' => $catg, 'ids' => implode('-', config('tagmaping.emotionIdToId')[$key]), 'name' => $items, 'cityCode' => $cityCode]) }}">
                                        {{ $items }}</a></a></div>
                            </div>
                        @endforeach

                    </div>
                </div>
                </div>
            @break

            @default
                <div>

                </div>
        @endswitch



        </div>
    </section>

</x-layout.main.base>
