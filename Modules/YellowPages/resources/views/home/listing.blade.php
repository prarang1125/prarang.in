@extends('yellowpages::layout.script')

@section('meta_title', $listing->listing_title)
@section('meta_description', strip_tags($listing->description))
@section('meta_og_title', $listing->listing_title)
@section('meta_og_description', strip_tags($listing->description))
@section('meta_og_image', $listing->business_img ? Storage::url($listing->business_img) :
asset('assets/images/yplogo.jpg'))

@section('content')
<style>
    :root {
        --prarang-blue: #0e4fd1;
        --prarang-green: #28a745;
        --prarang-red: #dc3545;
        --prarang-yellow: #ffc107;
    }

    .listing-hero {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 0 0 20px 20px;
        margin-top: -1px;
    }

    .listing-hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .listing-hero-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        padding: 40px 20px;
        color: white;
    }

    .card-custom {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
        background: white;
    }

    .card-custom-title {
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
        font-size: 1.25rem;
    }

    .card-custom-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: var(--prarang-blue);
        border-radius: 2px;
    }

    .product-listing-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #eee;
        border-radius: 15px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-listing-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .status-open {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }

    .status-closed {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }

    .working-hours-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .working-hours-list li {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px dashed #eee;
    }

    .working-hours-list li:last-child {
        border-bottom: none;
    }

    .working-hours-list .current-day {
        font-weight: 700;
        color: var(--prarang-blue);
    }

    .rating-star-btn {
        font-size: 1.5rem;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s;
    }

    .rating-star-btn.active {
        color: var(--prarang-yellow);
    }

    .action-button {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: transform 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .action-button:active {
        transform: scale(0.95);
    }

    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .listing-hero {
            height: 250px;
        }

        .listing-hero-overlay h1 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="listing-hero">
        <img src="{{ $listing->business_img ? Storage::url($listing->business_img) : asset('assets/images/yplogo.jpg') }}"
            alt="{{ $listing->listing_title }}">
        <div class="listing-hero-overlay">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-light mb-2">
                        <li class="breadcrumb-item"><a href="/" class="text-light opacity-75 text-decoration-none">{{
                                __('yp.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-light opacity-75 text-decoration-none">{{
                                __('yp.businesses') }}</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">{{ $listing->listing_title }}
                        </li>
                    </ol>
                </nav>
                <h1 class="display-6 fw-bold m-0">{{ $listing->listing_title }}</h1>
                <div class="mt-2 d-flex align-items-center flex-wrap gap-3">
                    <span class="status-badge {{ $isOpen ? 'status-open' : 'status-closed' }}">
                        <i class="bx {{ $isOpen ? 'bx-check-circle' : 'bx-time' }} me-1"></i>
                        {{ $isOpen ? __('yp.open_now') : __('yp.closed_now') }}
                    </span>
                    @if($listing->category)
                    <span class="text-light opacity-75 small">
                        <i class="bx bx-category me-1"></i> {{ $listing->category->name }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-5">
    <div class="row g-4">
        <!-- Main Content (Left) -->
        <div class="col-lg-8">
            <!-- Quick Actions Mobile -->
            <div class="d-flex gap-2 mb-4 d-lg-none">
                <button class="btn btn-primary action-button flex-fill" id="shareButtonMob">
                    <i class="bx bx-share-alt"></i> {{ __('yp.share') }}
                </button>
                <a href="{{ route('yp.listing.save', $listing->id) }}" class="btn btn-success action-button flex-fill">
                    <i class="bx bx-heart"></i> {{ __('yp.save_listing') }}
                </a>
            </div>

            <!-- Description -->
            <div class="card card-custom p-4">
                <h3 class="card-custom-title">{{ __('yp.description') }}</h3>
                <div class="text-muted lh-lg">
                    {!! $listing->description !!}
                </div>
            </div>

            <!-- Products -->
            @if($listing->products->isNotEmpty())
            <div class="card card-custom p-4">
                <h3 class="card-custom-title">{{ __('yp.products') }}</h3>
                <div class="row g-4">
                    @foreach($listing->products as $product)
                    <div class="col-md-6 col-xl-4">
                        <div class="product-listing-card">
                            <div class="ratio ratio-1x1 bg-light">
                                <img src="{{ $product->image1 ? Storage::url($product->image1) : asset('assets/images/yplogo.jpg') }}"
                                    class="object-fit-cover" alt="{{ $product->product_name }}">
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold mb-1 text-dark">{{ $product->product_name }}</h5>
                                <p class="text-muted small mb-3 text-truncate-2">{{ Str::limit($product->description,
                                    60) }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    @if($product->price)
                                    <span class="fw-bold text-primary">{{ $product->price }}</span>
                                    @endif
                                    @if($product->purchase_url)
                                    <a href="{{ $product->purchase_url }}" target="_blank"
                                        class="btn btn-warning btn-sm px-3 fw-bold rounded-pill">
                                        {{ __('yp.buy_now') ?? 'Buy Now' }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Reviews -->
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h3 class="card-custom-title mb-0">{{ __('yp.rate_and_review') }}</h3>
                    <button type="button" class="btn btn-primary action-button btn-sm" data-bs-toggle="modal"
                        data-bs-target="#reviewModal">
                        <i class="bx bx-star"></i> {{ __('yp.rate_us') }}
                    </button>
                </div>
                <!-- Reviews listing would go here -->
                <div class="text-center py-5">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/no-rating-illustration-download-in-svg-png-gif-file-formats--no-reviews-empty-state-search-page-social-media-pack-logos-illustrations-4621183.png?f=webp"
                        alt="No Reviews" style="width: 150px; opacity: 0.6;">
                    <p class="text-muted mt-3 mb-0">{{ __('yp.no_reviews_yet') ?? 'No reviews yet. Be the first to rate
                        your experience!' }}</p>
                </div>
            </div>
        </div>

        <!-- Sidebar (Right) -->
        <div class="col-lg-4">
            <!-- Desktop Actions -->
            <div class="card card-custom p-4 d-none d-lg-block">
                <div class="d-grid gap-3">
                    <button class="btn btn-primary action-button w-100" id="shareButtonDesk">
                        <i class="bx bx-share-alt"></i> {{ __('yp.share') }}
                    </button>
                    <a href="{{ route('yp.listing.save', $listing->id) }}"
                        class="btn btn-outline-success action-button w-100">
                        <i class="bx bx-heart"></i> {{ __('yp.save_listing') }}
                    </a>
                </div>
            </div>

            <!-- Contact & Map -->
            <div class="card card-custom p-4">
                <h3 class="card-custom-title">{{ __('yp.address') }}</h3>
                <div class="d-flex gap-3 mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                            <i class="bx bxs-map fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <p class="mb-2 text-dark">{{ $listing->business_address }}</p>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($listing->business_address) }}"
                            target="_blank"
                            class="btn btn-link p-0 text-decoration-none small fw-bold d-flex align-items-center gap-1">
                            <i class="bx bx-navigation"></i> {{ __('yp.get_directions') ?? 'Get Directions' }}
                        </a>
                    </div>
                </div>

                @if($listing->business_phone)
                <div class="d-flex gap-3">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 p-2 rounded-3 text-success">
                            <i class="bx bxs-phone fs-4"></i>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0 fw-bold text-dark">{{ $listing->business_phone }}</p>
                        <small class="text-muted">{{ __('formyp.phone_label_card') }}</small>
                    </div>
                </div>
                @endif
            </div>

            <!-- Working Hours -->
            <div class="card card-custom p-4">
                <h3 class="card-custom-title">{{ __('yp.working_hours') }}</h3>
                <ul class="working-hours-list">
                    @php
                    $today = strtolower(date('l'));
                    $localizedDays = [
                    'monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday',
                    'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday', 'sunday' => 'Sunday'
                    ];
                    @endphp

                    @forelse($listingHours as $hour)
                    <li class="{{ strtolower($hour->day) == $today ? 'current-day' : '' }}">
                        <span>{{ $localizedDays[strtolower($hour->day)] ?? $hour->day }}</span>
                        <span>
                            @if($hour->is_24_hours)
                            <span class="badge bg-success opacity-75 small fw-normal">{{ __('yp.24_hours') ?? '24 Hours'
                                }}</span>
                            @else
                            {{ Carbon\Carbon::parse($hour->open_time)->format('H:i') }} -
                            {{ Carbon\Carbon::parse($hour->close_time)->format('H:i') }}
                            @endif
                        </span>
                    </li>
                    @empty
                    <li class="text-muted small italic">No specific hours provided.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark">{{ __('yp.rate_and_review') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('reviews.store', $listing->id) }}" enctype="multipart/form-data">
                    @csrf

                    @foreach(['cleanliness' => __('yp.cleanliness'), 'service' => __('yp.service'), 'ambience' =>
                    __('yp.ambience'), 'price' => __('yp.price')] as $key => $label)
                    <div class="mb-4">
                        <label class="form-label d-block fw-bold small text-uppercase text-muted mb-2 ls-1">{{ $label
                            }}</label>
                        <div class="rating-box d-flex gap-2">
                            @for ($i = 1; $i <= 5; $i++) <input type="radio" name="{{ $key }}" id="{{ $key }}-{{ $i }}"
                                value="{{ $i }}" class="btn-check" required>
                                <label class="rating-star-btn" for="{{ $key }}-{{ $i }}">
                                    <i class="bx bxs-star"></i>
                                </label>
                                @endfor
                        </div>
                    </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase text-muted">{{ __('yp.review_title')
                            }}</label>
                        <input type="text" name="title" class="form-control border-light-subtle rounded-3"
                            placeholder="Great service!">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase text-muted">{{ __('yp.review') }}</label>
                        <textarea name="review" class="form-control border-light-subtle rounded-3" rows="3"
                            placeholder="Describe your experience..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">{{ __('yp.select_images')
                            }}</label>
                        <input type="file" name="image[]" class="form-control border-light-subtle rounded-3" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 action-button py-3">
                        {{ __('yp.submit_review') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Universal Share Handler
        const handleShare = () => {
            if (navigator.share) {
                navigator.share({
                    title: "{{ $listing->listing_title }}",
                    text: "{{ strip_tags(Str::limit($listing->description, 100)) }}",
                    url: window.location.href,
                }).catch(console.error);
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert("{{ __('yp.copied') ?? 'Link copied to clipboard!' }}");
            }
        };

        const deskShare = document.getElementById("shareButtonDesk");
        const mobShare = document.getElementById("shareButtonMob");
        
        if(deskShare) deskShare.onclick = handleShare;
        if(mobShare) mobShare.onclick = handleShare;

        // Interactive Star Rating
        document.querySelectorAll('.rating-box').forEach(box => {
            const stars = box.querySelectorAll('.rating-star-btn');
            stars.forEach((star, idx) => {
                star.onclick = () => {
                    stars.forEach((s, i) => {
                        s.classList.toggle('active', i <= idx);
                    });
                };
            });
        });
    });
</script>
@endpush