@extends('yellowpages::layout.script')

@section('meta_title', isset($category->name) ? $category->name : ($city->name ?? ''))
@section('meta_description', isset($category->description) ? $category->description : ($city->name ?? ''))
{{-- @section('meta_keywords', isset($category->name) ? ($category->name . ', businesses, services') : ($city->name . ', businesses, services')) --}}
@section('meta_og_title', isset($category->name) ? $category->name : ($city->name ?? ''))
@section('meta_og_image', 
    (isset($category->categories_url) && $category->categories_url) ? Storage::url($category->categories_url) :
    (isset($city->cities_url) && $city->cities_url ? Storage::url($city->cities_url) : asset('assets/images/default.jpg'))
)


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
            @elseif(isset($category) && $category)
            {{$category->name}}
            @endif
        
        </h1>
    </div>
    
    <div class="container my-4">
        <!-- Listings Grid -->
        <div class="row g-4 "> <!-- Centered Listings -->
            @foreach($listings as $listing)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 text-center"> <!-- Centering Text -->
                        <img src="{{ Storage::url($listing->feature_img ?? 'default.jpg') }}" class="card-img-top" alt="Listing Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $listing->listing_title ?? 'No Title' }}</h5>
                            <p class="card-text">
                                <strong>📍 पता (Address):</strong><br>
                                @if($listing->address)
                                    <span>{{ $listing->address->street ?? 'N/A' }}</span>,
                                    <span>{{ $listing->address->area_name ?? 'N/A' }}</span>,
                                    <span>{{ $listing->address->city_id ? $listing->city->name : 'N/A' }}</span>,
                                    <span>{{ $listing->address->postal_code ?? 'N/A' }}</span>
                                @else
                                    <span>N/A</span>
                                @endif
                                <br>
                                <strong>📞 फ़ोन नंबर(Contact):</strong> {{ $listing->user->phone ?? 'N/A' }}<br>
                                <strong>👤 निर्माता (Owner):</strong> {{ $listing->user->name ?? 'N/A' }}<br>
                            </p>
                            <div class="mt-auto">
                                <strong>⏳ स्थिति(Status):</strong>
                                @if($listing->is_open)
                                    <span class="badge bg-success">खुला हुआ(Open)</span>
                                @else
                                    <span class="badge bg-danger">बंद है(Closed)</span>
                                    @if($listing->next_open)
                                        <br><strong>🗓(अगला खुला) Next Open:</strong> {{ $listing->next_open->format('l, h:i A') }}
                                    @else
                                        <br><strong>🕒 (अगला खुला)Next Open:</strong> समय उपलब्ध नहीं है
                                    @endif
                                @endif
                                <br><br>
                                <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => Str::slug($listing->listing_title), 'listing_id' => $listing->id]) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
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
