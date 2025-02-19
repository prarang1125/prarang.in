@extends('yellowpages::layout.script')
@section('title', __('messages.yellow_pages'))
@section('content')
@livewireStyles
    <!-- Hero Section -->
    <!-- <section id="hero" class="hero section-bg" style="background-image: url('{{ asset('assets/images/background-image.jpg') }}');"> -->
    <section id="hero" class="hero section-bg" style="background-image: url('https://img.freepik.com/free-vector/abstract-low-poly-colorful-triangle-shapes-background_1035-23257.jpg?t=st=1736766260~exp=1736769860~hmac=21a7d387175441dd76fc7c0247feb6fe57afa117b8db6c6db37cdec88a5537e5&w=1060');">
        <div class="container position-relative text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-5 justify-content-center">
              <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center mx-auto">
                  <h2>
                      <span>{{ __('messages.explore_your_city') }}</span>
                  </h2>
                  <p>{{ __('messages.Let_uncover_the_best_Businesses') }}</p>

                  <div class="search-form d-flex justify-content-center mt-4">
                      <!-- Categories Dropdown -->
                      <select id="category" class="form-select" style="width: 300px; padding: 10px; margin-right: 10px;">
                          <option value="">{{ __('messages.select_category') }}</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                  {{ $category->name }}
                              </option>
                          @endforeach
                      </select>

                      <!-- Cities Dropdown -->
                      <select id="city" class="form-select" style="width: 200px; padding: 10px; margin-right: 10px;">
                          <option value="">{{ __('messages.select_city') }}</option>
                          @foreach ($cities as $city)
                              <option value="{{ $city->name }}" {{ request('city') == $city->name ? 'selected' : '' }}>
                                  {{ $city->name }}
                              </option>
                          @endforeach
                      </select>

                      <!-- Search Button -->
                      <button id="submitCatForm" class="btn btn-primary">
                          <i class="bi bi-search" style="font-size: 1.2rem;"></i>
                      </button>

                  </div>
                   <p class="text-danger citymsg"></p>

                  <div class="text-center lp-search-description" style="margin-top: 20px;">
                      <p>{{ __('messages.Looking_for_a_service') }}</p>
                      <img src="{{ asset('assets/images/banner-arrow.png') }}" alt="banner-arrow" class="banner-arrow" style="margin-top: 10px;" />
                  </div>
              </div>
          </div>
      </div>
      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                @foreach($categories as $index => $category)
                    <div class="col-xl-2 col-md-4">
                        <div class="icon-box" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                            <div class="icon" style="width: 80px; height: 80px; margin: 0 auto;">
                              <a href="{{ route('category.show', ['category_name' =>Str::slug($category->name)]) }}">
                                  <img src="{{ Storage::url($category->categories_url) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                              </a>

                            </div>
                            <h4 class="title" style="font-size: 16px; margin-top: 10px;">
                                <!-- Add the link to the listing page with the category ID -->
                                <a href="{{ route('category.show', ['category_name' => $category->slug]) }}" class="stretched-link">{{$category->name}}</a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  </section>

    <!-- get cities  -->
    <section id="services" class="services">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>{{__('messages.Live_Cities')}}</h2>
          <p>{{__('messages.Find_the_Best_Services')}}</p>
      </div><!-- End Section Title -->

      <div class="container">
          <div class="row gy-4">
              @foreach($cities as $index => $city)
                  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                      <a href="{{ route('city.show', ['city_name' => $city->name]) }}" class="card-link">
                          <div class="card">

                              <img src="{{ Storage::url($city->cities_url) }}" class="card-img-top" alt="{{ $city->name }}">
                              <div class="card-body text-center">
                                  <h5 class="card-title">{{$city->name}}</h5>
                              </div>
                          </div>
                      </a>
                  </div>
              @endforeach
          </div>
      </div>
  </section>

  <section id="listings" class="listings section">
    <div class="container section-title" data-aos="fade-up" style="text-align: center; margin-bottom: 40px;">
        <h2>{{__('messages.Listings')}}</h2>
        <p>{{__('messages.Popular_Listings_In_Our_Directory')}}</p>
    </div>

   <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
        @foreach($topRatedListings as $listing)
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
                                    <span class="text-success"><i class="bi bi-check-circle-fill"></i> खुला (Open)</span>
                                @else
                                    <span class="text-danger"><i class="bi bi-x-circle-fill"></i> बंद (Closed)</span>
                                @endif
                            </div>
                            <div class="col-6">
                                @if($listing->next_open)
                                    <strong class="text-dark"><i class="bi bi-calendar-week"></i> अगला खुला:</strong> 
                                    <span class="text-muted">{{ $listing->next_open->format('l, h:i A') }}</span>
                                @else
                                    <span class="text-muted">समय उपलब्ध नहीं है</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <p class="card-text text-dark mb-0">
                        <div class="row">
                            <div class="col-1">  
                                <i class="bi bi-geo-alt fw-bold text-muted"></i>
                            </div>
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

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-6">
                            <a href="tel:{{ $listing->user->phone ?? 'N/A' }}" class="btn btn-success text-white fw-bold w-100 rounded-pill">
                                <i class="bi bi-phone text-white"></i> फ़ोन करे
                            </a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => Str::slug($listing->listing_title), 'listing_id' => $listing->id]) }}" 
                               class="btn btn-primary text-white fw-bold w-100 rounded-pill">
                               जानकारी देखे <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

  </section>

@endsection
@push('scripts')
<script>
    document.getElementById('submitCatForm').addEventListener('click', function () {
        const category = document.getElementById('category').value;
        const city = document.getElementById('city').value;

        if (category !== "" && city !== "") {
            const url = `{{ url('yp') }}/${category}/${city}`;
            window.location.href = url;
        } else {
            document.querySelector('.citymsg').textContent = "Please Select Category and City";
        }
    });

    const swiper = new Swiper('.init-swiper', {
        loop: true,
        speed: 600,
        autoplay: {
            delay: 5000
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
</script>
{{-- @livewireScripts --}}
@endpush
