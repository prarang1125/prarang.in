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
    </style>
    <section>
        @switch($catg)
            @case('time')
                <div class="p-3 mt-3 shadow">
                    <h1 class="text-center">Time</h1>
                    <p>List of cities</p>
                    <div class="row">
                        @foreach ($portal as $item)
                            <div class="city-a col-sm-2 p-1 rounded border border-primary m-1 ">
                                <a target="_blank" class="text-primary fw-bold fs-6" style="text-decoration: none; "
                                    href="{{ route('posts.city', ['city' => $item->slug]) }}">{{ $item->city_name }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>
            @break

            @case('work')
                <div class="p-3 mt-3 shadow">
                    <h1 class="text-center">Work</h1>

                    <div class="row">
                        @foreach ($profession as $key => $items)
                            @if (array_key_exists($key, config('tagmaping.profession')))
                                <div class="col-sm-6">
                                    <div class="rounded border p-1 mb-3">
                                        <h6 class="text-center border-bottom fw-bold p-1">
                                            {{ config('tagmaping.profession')[$key] }}</h5>
                                            <ul>
                                                @foreach ($items as $item)
                                                    <li><a href="{{route('post-archive',['catg'=>$catg,'ids'=>implode('-',$item['tags']),'name'=>\Illuminate\Support\Str::slug($item['profession']),'cityCode'=>$cityCode])}}">{{ $item['profession'] }}</a></li>
                                                @endforeach
                                            </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        {{-- @foreach ($profrssion as $key => $item)
                        {{dd($item)}}                        <div class="city-a col-sm-2 p-1 rounded border border-primary m-1 ">
                            <a target="_blank" class="text-primary fw-bold fs-6" style="text-decoration: none; "
                                href="{{ route('posts.city', ['city' => $item->slug]) }}">{{ $item->city_name }}</a>
                        </div>
                    @endforeach --}}
                    </div>

                </div>
            @break

            @case('education')
                <div>
                    <h1>Education Category</h1>
                    <p>Add your education-related content here.</p>
                </div>
            @break

            @case('workemotion')
                <div>
                    <h1>Work Emotion Category</h1>
                    <p>Add your work emotion-related content here.</p>
                </div>
            @break

            @default
                <div>
                    <h1>Default Category</h1>
                    <p>No category matched. Add your default content here.</p>
                </div>
        @endswitch



        </div>
    </section>

</x-layout.main.base>
