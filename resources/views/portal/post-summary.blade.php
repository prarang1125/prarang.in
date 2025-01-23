<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:site_name" content="{{ $post['siteName'] ?? 'Prarang' }}" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $post['Title'] ?? 'Default Title' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ $post->images[0]->imageUrl ?? 'default-image-url.jpg' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $post['SubTitle'] ?? 'Default description for the post.' }}" />
    <title>{{ $post['Title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    {!! $portal->header_scripts !!}

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            margin: 0;
            padding: 0;
            background-color: rgba(234, 234, 239, 0.67) !important;
        }

        .recent-poet .rounded h6 {
            text-decoration: none !important;
        }


        /* Navigation */
        section nav {
            border-bottom-style: none;
            border-bottom-width: 1px !important;
            box-shadow: -15px -10px 19px 7px #dcdddf;
        }

        /* Link */
        .navbar-nav .nav-item a {
            padding-top: 6px !important;
            padding-bottom: 6px !important;
        }

        .badge {
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .post-header {
            margin-bottom: 15px;
        }

        .post-header h1 {
            font-size: 28px;
            color: #333;
            margin: 0;
        }

        .post-header p {
            margin: 5px 0;
            color: gray;
            font-size: 16px;
        }

        .main-content {
            display: flex;
            gap: 20px;
        }

        .main-post {
            flex: 3;
        }

        .main-post img {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .main-post p {
            font-size: 18px;
            color: #333;
        }

        .recent-posts {
            flex: 1;
            border-left: 2px solid #ddd;
            padding-left: 20px;
        }

        .recent-posts h3 {
            position: relative;
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
        }

        .recent-posts h3:after {
            border-bottom: 2px solid #f1c40f;
            width: 150px;
            display: block;
            position: absolute;
            content: '';
            padding-bottom: 10px;
            bottom: -5px;
        }

        .recent-post {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }

        .recent-post img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
        }

        .recent-post .text-content {
            flex: 1;
        }

        .recent-post .text-content p.title {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .recent-post .text-content p.date {
            margin: 5px 0 0;
            font-size: 14px;
            color: gray;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #0000FF;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .definitions {
            margin: 30px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.8;
        }

        .definitions h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: left;
            color: #333;
            text-decoration: underline;
        }

        .definitions p {
            margin: 10px 0;
            font-size: 16px;
        }

        .definitions strong {
            font-weight: bold;
            color: #000;
        }

        /* Navigation buttons */
        .post-navigation .btn {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        /* Styling for the hover effect */
        .hover-button {
            position: relative;
            display: inline-block;
        }

        .tag-button {
            display: inline-block;
            background-color: #007bff;
            /* Blue button color */
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tag-button:hover {
            background-color: #0056b3;
            /* Darker blue when hovered */
        }

        /* Frame vid */
        .container .main-content .main-post .frameVid {
            width: 100% !important;
            height: 20% !important;
        }

        /* Span Tag */
        .navbar-nav .nav-item span {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Post descreption */
        .col-sm-9 .main-post .post-descreption {
            line-height: 2em;
            word-spacing: 3.5px;
            text-align: justify;
        }

        /* Col 9 */
        .container .col-sm-9 {
            transform: translatex(0px) translatey(0px);
        }

        /* Post descreption */
        .container .post-descreption {
            white-space: normal;
            letter-spacing: -0.5px;
        }

        /* Th */
        .table-sm tr th {
            font-size: 14px;
            /* color: #aba4a4; */
            border-style: none;
        }

        /* Table Data */
        .table-sm tr td {
            font-size: 14px;
            /* color: #7c6e6e; */
            border-right-style: none;
            border-left-style: none;
        }

        /* Main image */
        .col-sm-9 .main-post .main-image {
            margin-bottom: -17px;
        }

        /* Post description */
        .col-sm-9 .main-post .post-description {
            padding-top: 26px !important;
        }

        /* App */
        .container .app-fb {
            margin-top: 126px !important;
        }

        /* Paragraph */
        .container .app-fb p {
            transform: translatex(0px) translatey(0px);
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 1px;
        }

        /* App */
        .container .stk-side {
            position: sticky;
            top: 1px;
        }

        .main-post .main-image .frameVid {
            width: 100% !important;
            height: 500px !important;
        }

        .recent-image {
            width: 100% !important;
            max-height: 170px !important;
        }

        .recent-poet .img-fluid {
            max-height: 111px;
        }

        @media (max-width:1316px) {

            /* Th */
            .table-sm tr th {
                font-weight: 500;
                font-size: 12px;
                border-width: 0px;
                padding-top: 0px;
                padding-bottom: 0px;
                padding-right: 0px;
                padding-left: 0px;
            }

            /* Table Data */
            .table-sm tr td {
                font-size: 12px;
                border-style: solid;
                border-width: 1px;
            }

        }

        @media (max-width:768px) {

            /* Th */
            .table-sm tr th {
                font-size: 12px;
                font-weight: 500;
            }

            /* Table Data */
            .table-sm tr td {
                font-size: 10px;
                font-weight: 500;
            }

            /* Frame vid */
            .main-post .main-image .frameVid {
                margin-top: 6px;
            }

        }

        @media (max-width:1316px) {

            /* Th */
            .table-sm tr th {
                font-weight: 500;
                font-size: 12px;
                border-width: 0px;
                padding-top: 0px;
                padding-bottom: 0px;
                padding-right: 0px;
                padding-left: 0px;
            }

            /* Table Data */
            .table-sm tr td {
                font-size: 12px;
                border-style: solid;
                border-width: 1px;
            }

        }

        @media (max-width:768px) {

            /* Th */
            .table-sm tr th {
                font-size: 12px;
                font-weight: 500;
            }

            /* Table Data */
            .table-sm tr td {
                font-size: 10px;
                font-weight: 500;
            }

            /* Frame vid */
            .main-post .main-image .frameVid {
                margin-top: 6px;
            }

            /* Heading */
            .col-sm-9 .post-header h1 {
                font-size: 22px;
                font-weight: 500 !important;
            }

            /* Container */
            .container {
                padding-top: 4px;
            }

        }

        @media (max-width:768px) {

            /* Container */
            .container {
                padding-right: 0px;
                padding-left: 3px;
            }

            /* Post header */
            .container .post-header {
                padding-left: 14px;
                padding-right: 20px;
            }

            /* Image */
            .main-post .main-image img {
                margin-bottom: 24px;
            }

            .container {
                /* display:block; */
                /* margin-right:0px; */
                overflow-x: hidden;
            }



            @media (max-width:768px) {

                /* Col 9 */
                .container .col-sm-9 {
                    padding-left: 7px;
                    display: inline-block;
                    transform: translatex(0px) translatey(0px);
                }

                /* Image */
                .main-post .main-image img {
                    padding-right: 4px;
                }

            }
        }

        /* Image */
        .main-post .main-image img {
            margin-top: 30px;
        }
        .main-post .main-image .frameVid{
            margin-top:30px;
 }
    </style>
</head>

<body>
    <x-post.navbar cityId="12" :cityCode="$cityCode" />
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="mt-4 post-header">
                    <h1 class="fw-bold">{{ $post['Title'] }}</h1>
                    <div class="mt-3 row">
                        <div class="col-sm-6 text-start"> <span
                                class="p-1 bg-primary rounded-pill ps-3 pe-3 text-light">{{ $post['tagInUnicode'] }}</span>
                        </div>
                        <div class="col-sm-6 text-end"> <i class="fa fa-calendar"> </i> {{ $post['dateOfApprove'] }}
                        </div>
                    </div>
                </div>
                <div class="mt-4 main-post">
                    <div class="analytics">
                        @if (\Carbon\Carbon::parse($post['dateOfApprove'])->addDays(4)->lte(now()))
                            @if (!empty($post['totalViewerCount']) && $post['totalViewerCount'] > 0)
                                {{-- @if ($post['postStatusMakerChecker'] === 'approved' && $post['totalViewerCount'] > 0) --}}
                                <table class="mb-0 table-sm" border="1">
                                    <thead>
                                        <tr>
                                            <th colspan="5">Post Viewership from Post Date to
                                                {{ \Carbon\Carbon::parse($post['postViewershipDateTo'])->format('d- M-Y') }}
                                                {{ $post['monthDay'] }}</th>
                                        </tr>
                                        <tr>
                                            <th>City Subscribers (FB+App)</th>
                                            <th>Website (Direct+Google)</th>
                                            <th>Email</th>
                                            <th>Instagram</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ intval($post['citySubscriber']) + intval($post['prarangApplication']) }}
                                            </td>
                                            <td>{{ $post['websiteCount'] }}</td>
                                            <td>{{ $post['emailCount'] }}</td>
                                            <td>{{ $post['instagramCount'] }}</td>
                                            <td>{{ $post['totalViewerCount'] }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-start">
                                                <a href="#analyticsinfo" class="text-dark" style="text-decoration-line: none;">* Please see metrics definition on bottom of this page.</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        @endif
                    </div>
                    <div class="main-image">
                        @if ($post->images[0]->VideoExist == 1)
                            {!! $post->images[0]->VideoURL !!}
                        @else
                            <img class="img-fluid" src="{{ $post->images[0]->imageUrl }}" alt="{{ $post->Title }}">
                        @endif
                    </div>

                    <div class="p-2 m-0 post-description"
                        style="font-size: 18px; background-color: {{ $ColorCode }};">
                        {!! $post['description'] !!}
                    </div>

                    <div class="m-3">
                        <a href="" class="tag-link"
                            style="background-color: #ff0000; color: white; padding: 10px 20px; border-radius: 5px; display: inline-block; text-decoration: none; cursor: default; transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#0056b3';"
                            onmouseout="this.style.backgroundColor='#007bff';">
                            {{ $post['tagInUnicode'] }}
                        </a>
                    </div>
                    <div class="text-center post-navigation">
                        @if ($previousPost)
                            <a href="{{ route('post-summary', ['slug' => $slug, 'id' => $previousPost->chittiId, 'subTitle' => Str::slug($previousPost->SubTitle)]) }}"
                                class="btn btn-primary">पिछला / Previous</a>
                        @endif

                        @if ($nextPost)
                            <a href="{{ route('post-summary', ['slug' => $slug, 'id' => $nextPost->chittiId, 'subTitle' => Str::slug($nextPost->SubTitle)]) }}"
                                class="btn btn-primary">अगला / Next</a>
                        @endif
                    </div>
                </div>

            </div>
            <div class="text-center col-sm-3 ps-1">
                <div class="stk-side">
                    <div class="p-2 text-center shadow app-fb">
                        <p class="p-0">Follow Us on</p>
                        <a class="text-center btn btn-primary" href="https://facebook.com/prarang.in" target="_blank"><i
                                class=""></i>
                            Facebook</a>
                        <a class="text-center btn btn-success " href="" target="_blank"><i
                                class="fa fa-mobile"></i>
                            Mobile
                            App</a>
                    </div>
                    <div class="pt-2 pb-2 mt-3 recent-poet text-start">
                        <h6 class="ps-2 fw-bold">Recent Posts</h6>
                        @foreach ($recentPosts as $post)
                            <a
                                href="{{ route('post-summary', ['slug' => $slug, 'id' => $post->chittiId, 'subTitle' => Str::slug($post->SubTitle)]) }}">
                                <div class="p-2 mt-3 rounded shadow">
                                    <img class="img-fluid rounded-top w-100" src="{{ $post->imageUrl }}"
                                        alt="{{ $post->Title }}">
                                    <h6 class="mt-2 text-dark ">{{ $post->Title }}</h6>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


    <div id="analyticsinfo" class="definitions" style="background-color: {{ $ColorCode }};">
        <h3>Definitions of the Post Viewership Metrics</h3>
        <p>
            <strong>A. City Subscribers (FB + App) -</strong> This is the Total city-based unique subscribers from
            the Prarang Hindi FB page and the Prarang App who reached this specific post.
        </p>
        <p>
            <strong>B. Website (Google + Direct) -</strong> This is the Total viewership of readers who reached this
            post directly through their browsers and via Google search.
        </p>
        <p>
            <strong>C. Total Viewership —</strong> This is the Sum of all Subscribers (FB+App), Website
            (Google+Direct), Email, and Instagram who reached this Prarang post/page.
        </p>
        <p>
            <strong>D. The Reach (Viewership) -</strong> The reach on the post is updated either on the 6th day from
            the day of posting or on the completion (Day 31 or 32) of one month from the day of posting.
        </p>
    </div>

    </div>

    @if ($ColorCode === '#4d4d4d')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const descriptionData = document.querySelector('.post-description');
                if (descriptionData) {
                    descriptionData.querySelectorAll('*').forEach(element => {
                        element.classList.add('text-white', 'text-light');
                    });
                }
            });
        </script>
    @endif


    <x-post.footer :city="$city_name" />
    <script src='{{ asset('location.js') }}'></script>
    <script>
        collectAndSendInformation('{{ $post['chittiId'] }}', '{{ $city_name }}');
    </script>
    {!! $portal->footer_scripts !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
