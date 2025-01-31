@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
    <br><br>
    <!-- Header with Background Image -->
    <div class="text-white text-center py-5" style="background: url('{{ Storage::url('categories/cate_bg.jpg') }}') center/cover;">
        <div class="container d-flex justify-content-start">
            <a href="{{ route('yp.home') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>

        <h1 class="pt-3">
            @if(isset($city_name) && $city_name)
                {{$city_name}} व्यवसाय
            @elseif(isset($city) && $city)
                {{$city}} व्यवसाय
            @else
                {{$category_name}}
            @endif
        </h1>
    </div>

    <div class="container my-4">
        <!-- Filters Section -->
        <div class="bg-light p-3 rounded shadow-sm d-flex justify-content-evenly align-items-center mb-4">
            <!-- Future Filter Options -->
        </div>

        <!-- Listings Grid -->
        <div class="row g-4">
            @foreach($listings as $listing)
                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => $listing->listing_title, 'listing_id' => $listing->id]) }}"
                       class="text-decoration-none text-dark">
                        <div class="card shadow-sm border-0">
                            <img src="{{ Storage::url($listing->feature_img ?? 'default.jpg') }}" class="card-img-top" alt="Listing Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <span class="badge bg-{{ $listing->status === 'Closed' ? 'danger' : 'success' }} mb-2">
                                    {{ $listing->is_open ? 'Open' : 'Closed' }}
                                </span>
                                <h5 class="card-title">{{ $listing->listing_title ?? 'No Title' }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function replaceContent(element, newText) {
            element.textContent = newText;
        }

        function restoreContent(element, originalText) {
            element.textContent = originalText;
        }
    </script>
@endpush
