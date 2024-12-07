<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />                               
    <meta property="og:image:height" content="315"/>
    <meta property="og:site_name" content="" />
    <title>{{ $post['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }
        th, td {
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
    background-color: #007bff; /* Blue button color */
    color: black;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.tag-button:hover {
    background-color: #0056b3; /* Darker blue when hovered */
}
    </style>
</head>
<body>
    <x-post.navbar cityId="12" :cityCode="$cityCode"/>
    <div class="container">
        <div class="row">
            <!-- Page Header -->
            @if (\Carbon\Carbon::parse($post['createDate'])->addDays(5)->lte(now()))
            @if (!empty($post['totalViewerCount']) && $post['totalViewerCount'] > 0)
            <table>
                <thead>
                    <tr>
                        <th colspan="5">Post Viewership from Post Date to {{ $post['createDate'] }} (31st Day)</th>
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
                        <td>{{ $post['citySubscriber'] }}</td>
                        <td>{{ $post['websiteCount'] }}</td>
                        <td>{{ $post['emailCount'] }}</td>
                        <td>{{ $post['instagramCount'] }}</td>
                        <td>{{ $post['totalViewerCount'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        @endif
            <br>
            <div class="post-header">
                <h1>{{ $post['Title'] }}</h1>
                <p>
                    <a href="#" class="tag-link">
                        {{ $post['tagInUnicode'] }}
                    </a>
                </p>     
                <p>{{ $post['createDate'] }}</p>
            </div>
        </div>
        <div class="main-content">
            <!-- Main Post -->
            <div class="main-post">
                <!-- Post Image -->
                @if($post['imageUrl'])
                    <img src="{{ $post['imageUrl'] }}" alt="Post Image">
                @endif
                <!-- Post Content -->
                <h2 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">{{ $post['title'] }}</h2>
                <p>{!! $post['description'] !!}</p>
            </div>
    
            <!-- Sidebar (Recent Posts) -->
            <aside class="recent-posts">
                <h3>Recent Posts</h3>
                @foreach($recentPosts as $recent)
                    <div class="recent-post">
                        <img src="{{ $recent['imageUrl'] }}" alt="Thumbnail">
                        <div class="text-content">
                            <a href="/post-summary/{{ $recent['chittiId'] }}" class="text-decoration-none">
                            <p class="title">{{ $recent->Title }}</p>
                            <p class="date">{{ $recent->formattedDate }}</p>
                        </div>
                    </div>
                @endforeach
            </aside>
        </div>
        <a href="#" class="tag-link" style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; display: inline-block; text-decoration: none; cursor: default; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#0056b3';" onmouseout="this.style.backgroundColor='#007bff';">
            {{ $post['tagInUnicode'] }}
        </a>
        
        <div class="definitions">
            <h3>Definitions of the Post Viewership Metrics</h3>
            <p>
                <strong>A. City Subscribers (FB + App) -</strong> This is the Total city-based unique subscribers from the Prarang Hindi FB page and the Prarang App who reached this specific post.
            </p>
            <p>
                <strong>B. Website (Google + Direct) -</strong> This is the Total viewership of readers who reached this post directly through their browsers and via Google search.
            </p>
            <p>
                <strong>C. Total Viewership —</strong> This is the Sum of all Subscribers (FB+App), Website (Google+Direct), Email, and Instagram who reached this Prarang post/page.
            </p>
            <p>
                <strong>D. The Reach (Viewership) -</strong> The reach on the post is updated either on the 6th day from the day of posting or on the completion (Day 31 or 32) of one month from the day of posting.
            </p>
        </div>

        <!-- Navigation Buttons (Previous and Next Posts) -->
<!-- Add Previous and Next buttons below the post content -->
<div class="post-navigation">
    @if($previousPost)
        <a href="/post-summary/{{ $previousPost->chittiId }}" class="btn btn-primary">पिछला</a>
    @endif

    @if($nextPost)
        <a href="/post-summary/{{ $nextPost->chittiId }}" class="btn btn-primary">अगला</a>
    @endif
</div>

</div>
    <x-post.footer />
  
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
</body>
</html>
