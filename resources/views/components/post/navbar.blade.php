<section>
    <style>
        .dropdown-menu-fullwidth {
            width: 100vw;
            left: 0;
        }

        .prangtxt+strong {
            display: inline-block;
            padding: 0px 5px 0px 5px;
            border: 2px solid #ccc;
            border-radius: 30%;
            background-color: #f9f9f9;
            font-weight: bold;
            background: #8e8888;
            color: white;
            margin-left: 10px;
        }

        .container section .container-fluid {
            transform: translatex(0px) translatey(0px);
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 0px;
            margin-right: 0px;
        }


        .ms-auto .nav-item a {
            /* background-color:#c71818; */
            padding-bottom: 25px;
            font-weight: 500;
            font-size: 20px;
            display: flex;
            padding-top: 25px;
            padding-right: 10px !important;
        }

        .ms-auto .nav-item span {
            margin-left: 15px;
        }


        @media (min-width:768px) {

            /* Link */
            .ms-auto .nav-item a {
                padding-left: 10px !important;
            }


        }

        /* Modal body */
        #cultureModal .modal-dialog .modal-body,
        #natureModal .modal-dialog .modal-body {
            width: 100%;
        }

        /* Heading */
        #cultureModal a h6,
        #natureModal a h6 {
            margin-bottom: 0px;
            font-weight: 400;
            color: #020202;
            text-decoration: none;
            border: 0px !important;
        }

        /* Column 10/12 */
        #cultureModal a .tagListx,
        #natureModal a .tagListx {
            border-style: none !important;
            text-align: left;
        }

        /* Rounded circle */
        #cultureModal .tagListx .rounded-circle,
        #natureModal .tagListx .rounded-circle {
            padding-left: 5px;
            padding-right: 15px;
            color: #020202;
            text-decoration: none;
        }

        /* Img fluid */
        #cultureModal a .img-fluid,
        #natureModal a .img-fluid {
            border-style: solid;
            border-color: #cdc5c5;
        }

        .nav-item a {
            text-decoration: none !important;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="https://prarang.in/cimg/logo2.png" alt="Logo">
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $portal->city_name_local }} पोर्टल</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cultureModal">
                            संस्कृति
                            <span class="badge bg-secondary">{{ $tagCounts['culture_count'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#natureModal">
                            प्रकृति
                            <span class="badge bg-secondary">{{ $tagCounts['nature_count'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Culture Modal -->
    <div class="modal fade" id="cultureModal" tabindex="-1" aria-labelledby="cultureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>समयसीमा</strong></span>
                                <strong>{{ $tagCounts['timeline_count'] }}</strong>
                            </p>

                            @foreach ($tagSubCounts['tag_1'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle" src="https://{{ $tag->tagIcon }}"
                                                    alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>मानव
                                        व उनकी
                                        इन्द्रियाँ</strong></span>
                                <strong>{{ $tagCounts['man_senses_count'] }}</strong>
                            </p>
                            @foreach ($tagSubCounts['tag_2'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle" src="https://{{ $tag->tagIcon }}"
                                                    alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>मानव
                                        व उसके
                                        आविष्कार</strong></span>
                                <strong>{{ $tagCounts['man_inventions_count'] }}</strong>
                            </p>
                            @foreach ($tagSubCounts['tag_3'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle" src="https://{{ $tag->tagIcon }}"
                                                    alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nature Modal -->
    <div class="modal fade" id="natureModal" tabindex="-1" aria-labelledby="natureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>भूगोल</strong></span>
                                <strong>{{ $tagCounts['geography_count'] }}</strong>
                            </p>
                            @foreach ($tagSubCounts['tag_4'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle"
                                                    src="https://{{ $tag->tagIcon }}" alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>जीव - जन्तु</strong></span>
                                <strong>{{ $tagCounts['fauna_count'] }}</strong>
                            </p>
                            @foreach ($tagSubCounts['tag_5'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle"
                                                    src="https://{{ $tag->tagIcon }}" alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            <p class="border-bottom">
                                <span class="mb-10 prangtxt"><strong>वनस्पति</strong></span>
                                <strong>{{ $tagCounts['flora_count'] }}</strong>
                            </p>
                            @foreach ($tagSubCounts['tag_6'] as $tag)
                                {{-- {{dd($tag)}} --}}
                                <div class="mb-1">
                                    <a target="_blank" href="">
                                        <div class="row">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle"
                                                    src="https://{{ $tag->tagIcon }}" alt="">
                                            </div>
                                            <div class="col-10 rounded-pill tagListx border">
                                                <div class="row">
                                                    <div class="col-10 m-0 p-0">
                                                        {{-- {{$tag->tagInUnicode}} --}}
                                                        <h6 class="m--0 p-0">{{ $tag->tagInEnglish }}</h6>
                                                        {{-- <small> {{$tag->tagInEnglish}}</small> --}}
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="w-100 h-100 rounded-circle border">
                                                            {{ $tag->count }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
