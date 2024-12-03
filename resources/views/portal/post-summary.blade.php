<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post['title'] }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
    </style>
</head>
<body>

<!-- Navbar -->
@include('layout.navbar')

<div class="container">
    <div class="row">
        <!-- Page Header -->
        <div class="post-header">
            <h1>{{ $post['title'] }}</h1>
            <p>{{ $post['subTitle'] }}</p>
            <p>{{ $post['createDate'] }}</p>
        </div>
    </div>

    

    <div class="main-content">
        <!-- Main Post -->
        <div class="main-post">
            <!-- Post Image -->
            @if($post['imageUrl'])
                <img src="{{ asset('storage/' . $post['imageUrl']) }}" alt="Post Image">
            @endif
            <!-- Post Content -->
            <p>{{ $post['description'] }}</p>
            <h4 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">{{ $post['title'] }}</h4>
            <p>{{ $post['description'] }}</p>
            @if($post['imageUrl'])
                <img src="{{ asset('storage/' . $post['imageUrl']) }}" alt="Extra Image" style="margin-top: 20px;">
            @endif
        </div>

        <!-- Sidebar (Recent Posts) -->
        <aside class="recent-posts">
            <h3>Recent Posts</h3>
            @foreach($recentPosts as $recent)
                <div class="recent-post">
                    <img src="{{ asset('storage/' . optional($recent->images->first())->chittiUrl) }}" alt="Thumbnail">
                    <div class="text-content">
                        <p class="title">{{ $recent->Title }}</p>
                        <p class="date">{{ $recent->formattedDate }}</p>
                    </div>
                </div>
            @endforeach
        </aside>
    </div>
</div>

<!-- Footer -->
@include('layout.footer')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
