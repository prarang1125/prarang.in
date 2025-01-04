<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chitti Posts</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .post-thumbnail {
            margin-bottom: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .caption h4 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }


        .blog-card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 1rem;
        }

        .card-title a {
            color: #2d3436;
            transition: color 0.2s;
        }

        .card-title a:hover {
            color: #0d6efd;
        }

        .meta-info {
            font-size: 0.9rem;
        }

        .tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .badge {
            font-weight: 500;
            padding: 0.5em 1em;
            border-radius: 20px;
        }

        .post-info {
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .post-info i {
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 1.1rem;
            }

            .card-img-top {
                height: 200px;
            }
        }


        /* Link */
        .container .mb-5 a {
            font-weight: 400;
            font-size: 16px;
            line-height: 0.6em !important;
            letter-spacing: -0.3px;
            word-spacing: -0.7px;
        }

        /* Image */
        .container .mb-5 img {
            width: 100%;
        }


        /* Image */
        .container .mb-5 img {
            height: 160px;
        }

        /* Month bar */
        .container .mb-5 .month-bar {
            font-weight: 600;
            text-shadow: rgba(0, 0, 0, 0.3) 0px 1px 1px;
            font-size: 16px;
            background-color: rgba(233, 230, 230, 0.88);
            background-blend-mode: color-dodge;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Import Google Fonts */
        @import url("//fonts.googleapis.com/css2?family=Alice:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

        /* Heading */
        .container h3 {
            font-weight: 700;
            font-family: 'Alice', serif;
            text-align: center;
            font-size: 30px;
            margin-bottom: 16px;
            margin-top: 28px;
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

        /* Heading */
        .container h3 {
            font-size: 45px;
            margin-top: 58px;
            margin-bottom: 35px;
        }

        /* Body */
        body {
            background-color: rgba(234, 234, 239, 0.67) !important;
        }

        /* Month bar */
        .container .mb-5 .month-bar {
            background-color: rgba(255, 255, 255, 0.9);

        }

        .container .mb-5 .mt-3 {
            padding-bottom: 44px;
        }

        /* Image */
        .container .mb-5 img {
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 5px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        /* Link */
        .container .mb-5 a {
            font-weight: 600;
            text-align: left;
            letter-spacing: 0.2px;
            word-spacing: -0.3px;
        }

        /* Heading */
        .container .mb-5 h2 {
            max-height: 55px !important;
            min-height: 55px !important;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <x-post.navbar cityId="12" :cityCode="$cityCode" />

    <div class="container">
        @isset($name)
            <div class="page-header">
                <h3 class="main-title-city">{{ $name }}</h3>

            </div>
        @else
            <h3 class="main-title-city">{{ ucfirst($city_name) }} Posts</h3>
        @endisset

        @forelse ($postsByMonth as $month => $posts)
            <div class="mb-5">
                <h6 class="p-0 ps-2 fw-bold">{{ $month }}</h6>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="mt-3 mb-3 col-md-3 col-sm-3 col-lg-3">
                            <div class="card blog-card h-100" style="background-color: {{ $post['color'] }}">
                                <div class="image-wrapper">
                                    <img src="{{ $post['imageUrl'] ?? 'default-image.jpg' }}"
                                        class="card-img-top"alt="{{ $post['title'] }}">
                                    <div class="category-badge" style="background-color: {{ $post['color'] }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a href="{{ route('post-summary', [
                                            'id' => $post['id'],
                                            'slug' => $city_name,
                                            'subTitle' => isset($post['subTitle']) ? str_replace(' ', '-', $post['subTitle']) : null,
                                        ]) }}"
                                            class="text-decoration-none {{ $post['color'] === '#4d4d4d' ? 'text-light' : '' }}">{{ $post['title'] }}</a>
                                    </h2>
                                    <div class="mb-3 meta-info">
                                        <div class="mb-2 tags">
                                            <span class="badge bg-primary">{{ $post['tags'] }}</span>
                                            <!-- <span class="badge bg-secondary">Web Dev</span> -->
                                        </div>
                                        <div
                                            class="post-info {{ $post['color'] === '#4d4d4d' ? 'text-light' : 'text-dark' }}">
                                            <i class="bi bi-calendar3"></i>
                                            <small
                                                class="{{ $post['color'] === '#4d4d4d' ? 'text-light' : 'text-dark' }}">{{ \Carbon\Carbon::parse($post['createDate'])->format('d M Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p>No posts found for this city.</p>
        @endforelse
    </div>

    <!-- Pagination Controls -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $chittis->links('pagination::bootstrap-5') }}
    </div>

    {{-- @include('layout.footer') --}}

    {{-- <x-post.footer /> --}}
    <x-post.footer :city="$city_name" />


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
