@extends('yellowpages::layout.script')

@section('meta_title', isset($category->name) ? $category->name : ($city->name ?? ''))
@section('meta_description', isset($category->description) ? $category->description : ($city->name ?? ''))
{{-- @section('meta_keywords', isset($category->name) ? ($category->name . ', businesses, services') : ($city->name . ', businesses, services')) --}}
@section('meta_og_title', isset($category->name) ? $category->name : ($city->name ?? ''))
@section('meta_og_image', 
    (isset($category->categories_url) && $category->categories_url) ? Storage::url($category->categories_url) :
    (isset($city->cities_url) && $city->cities_url ? Storage::url($city->cities_url) : asset('assets/images/default.jpg'))
)
<style>
    /* Italic Tag */
.card-body .card-text i{
 margin-right:13px;
}

/* Span Tag */
.card-body span span{
 margin-right:13px;
}


</style>

@section('title', __('messages.yellow_pages'))

@section('content')
    <br><br>
    <!-- Header with Background Image -->
    <div class="text-white text-center py-5" style="background: url('{{ Storage::url('categories/cate_bg.jpg') }}') center/cover;">
        <div class="container d-flex justify-content-start">
           
            <a href="{{ route('portal',['portal'=>'jaunpur']) }}" class="btn btn-primary text-white">
                <i class="bi bi-phone"></i>   Portal
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
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <!-- Image -->
                    <img src="{{ Storage::url($listing->feature_img ?? 'default.jpg') }}" class="card-img-top" alt="Listing Image" style="height: 220px; object-fit: cover;">
            
                    <div class="card-body">
                        <!-- Title -->
                        <h5 class="card-title fw-bold text-primary text-center mb-3">{{ $listing->listing_title ?? 'No Title' }}</h5>
                        <div class="mb-1">
                            <div class="row">
                                <div class="col-6">
                            @if($listing->is_open)
                                <span class=""><span class="bi bi-check-circle-fill text-success"></span> खुला (Open)</span>
                            @else
                                <span class=""><span class="bi bi-x-circle-fill text-danger"></span> बंद (Closed)</span>
                            </div>
                            <div class="col-6">
                                @if($listing->next_open)
                                    <strong class="text-dark"><i class="bi bi-calendar-week"></i> अगला खुला:</strong> 
                                    <span class="text-muted">{{ $listing->next_open->format('l, h:i A') }}</span>
                                @else
                                    <span class="text-muted">समय उपलब्ध नहीं है</span>
                                @endif
                            @endif
                            </div>
                        </div>
                        </div>
                        <!-- Address Section -->
                        <p class="card-text text-dark mb-0">
                            <div class="row">
                                <div class="col-1">  <span class="text-muted"><i class="bi bi-geo-alt fw-bold"></i> </span> </div>
                                <div class="col-11">
                                    <span class="text-dark">
                                        @if($listing->address)
                                            {{ ucfirst($listing->address->street) ?? 'N/A' }},
                                            {{ $listing->address->area_name ?? 'N/A' }},
                                            {{ $listing->address->city_id ? $listing->city->name : 'N/A' }},
                                            {{ $listing->address->postal_code ?? 'N/A' }}
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </div>
                            </div>                          
                            
                        </p>
            
                        <!-- Contact & Owner Section -->
                      
                        <p class="card-text text-dark mt-0">
                            <span class="text-muted"><i class="bi bi-person-workspace fw-bold"></i> निर्माता (Owner):</span> 
                            <span class="text-dark">{{ $listing->user->name ?? 'N/A' }}</span>
                        </p>
            
                        <!-- Status Section -->
                      
            
                        <!-- View Details Button -->
                        <div class="row">
                            <div class="col-6">
                                <a href="tel:{{ $listing->user->phone ?? 'N/A' }}" class="btn btn-success text-white fw-bold w-100 rounded-pill ">
                                    <span class="text-muted"><i class="bi bi-phone text-white"> </i></span> 
                                    <span class="">फ़ोन करे</span>
                                </a>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => Str::slug($listing->listing_title), 'listing_id' => $listing->id]) }}" 
                                   class="btn btn-primary text-white  fw-bold w-100 rounded-pill ">
                                   जानकारी देखे<i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
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
