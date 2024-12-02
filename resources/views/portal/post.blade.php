<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Summary</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .post-thumbnail {
            margin-bottom: 20px;
        }
        .thumbnail {
            border: none;
            background-color: #f8f8f8;
        }
        .caption h4 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

@include('layout.navbar') <!-- Including the Navbar -->

<div class="container">
    <div class="page-header">
        <h1>{{ $posts->city_name }}</h1>
        <p>Posts from {{ $posts->city_name }}</p>
    </div>
    <!-- Display posts -->
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="thumbnail">
            <img src="{{ $posts->local_info_image }}" alt="{{ $posts->city_name }}" class="img-responsive">
                <div class="caption">
                    <h4>{{ $posts->city_name }}</h4>
                    <p>{{ \Carbon\Carbon::parse($posts->created_at)->format('d M Y') }}</p>
                </div>
                </div>
            </div>
        @empty
            <p>No posts found for this portal.</p>
        @endforelse
    </div>
</div>

@include('layout.footer') <!-- Including the Footer -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
