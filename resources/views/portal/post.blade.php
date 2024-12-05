<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chitti Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <x-post.navbar cityId="12" :cityCode="$cityCode"/>

    <div class="container">
        <div class="page-header">
            <h1>Posts from {{ $city_name }}</h1>
            <p>Browse the latest posts for this city.</p>
        </div>

        <!-- Grouped Posts by Month -->
        @forelse ($postsByMonth as $month => $posts)
            <div class="mb-5">
                <h2>{{ $month }}</h2>
                <div class="row">
                    @foreach ($posts as $post)
                   
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- Wrap the card in a clickable link -->
                            <a href="/post-summary/{{ $post['id'] }}" class="text-decoration-none">
                                <div class="card post-thumbnail">
                                    <img src="{{ $post['imageUrl'] ?? 'default-image.jpg' }}" alt="{{ $post['title'] }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post['title'] }}</h5>
                                        <p class="card-text">{{ $post['subTitle'] }}</p>
                                        <p><small>{{ \Carbon\Carbon::parse($post['createDate'])->format('d M Y') }}</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p>No posts found for this city.</p>
        @endforelse
    </div>

    <!-- Pagination Controls -->
    <div class="d-flex justify-content-center mt-4">
        {{ $chittis->links('pagination::bootstrap-5') }}
    </div>

    @include('layout.footer')
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
