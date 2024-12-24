<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chitti Posts</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
    <x-post.navbar cityId="12" :cityCode="$cityCode" />

    <div class="container">
        @isset($name)
        <div class="page-header">
            <h1>{{ $name }}</h1>
            {{-- <small>Browse the latest posts for this city.</small> --}}
        </div>
        @endisset
        <br><br>

        <!-- Grouped Posts by Month -->
        @forelse ($postsByMonth as $month => $posts)
        <div class="mb-5">
            <h2>{{ $month }}</h2>
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card blog-card h-100">
                        <div class="image-wrapper">
                            <img src="https://picsum.photos/800/400?random=1" class="card-img-top" alt="Blog Post Image">
                            <div class="category-badge">Featured</div>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="#" class="text-decoration-none">How to Master Web Development in 2024</a>
                            </h2>
                            <div class="meta-info mb-3">
                                <div class="tags mb-2">
                                    <span class="badge bg-primary">Technology</span>
                                    <span class="badge bg-secondary">Web Dev</span>
                                </div>
                                <div class="post-info">
                                    <i class="bi bi-calendar3"></i>
                                    <small class="text-muted">March 14, 2024</small>
                                    <i class="bi bi-clock ms-3"></i>
                                    <small class="text-muted">5 min read</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-4 col-sm-6">
                    <!-- Wrap the card in a clickable link -->
                    <a href="{{ route('post-summary', [
                                'id' => $post['id'],
                                'slug' => $city_name,
                                'subTitle' => isset($post['subTitle']) ? str_replace(' ', '-', $post['subTitle']) : null,
                            ]) }}"
                        class="text-decoration-none">
                        <div class="card post-thumbnail">
                            <img src="{{ $post['imageUrl'] ?? 'default-image.jpg' }}" alt="{{ $post['title'] }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post['title'] }}</h5>
                                <p class="card-text">{{ $post['tags'] }}</p>
                                <p><small>{{ \Carbon\Carbon::parse($post['createDate'])->format('d M Y') }}</small>
                                </p>
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

    {{-- @include('layout.footer') --}}

    {{-- <x-post.footer /> --}}
    <x-post.footer :city="$city_name" />


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>