@extends('yellowpages::layout.script')
@section('title', __('messages.yellow_pages'))
@section('content')
@livewireStyles
<style>
    /* Heading */
#swiper-wrapper-6b7b107b002152ae2 .card-body h5{
 font-weight:500 !important;

}
/* Hero */
#hero{
 background-size:cover;
}

/* Link */
.icon-boxes .title a{
 display:inline-block;
 transform:translatex(0px) translatey(0px) !important;
}

/* Icon box */
.icon-boxes .icon-box{
 display:flex;
 justify-content:flex-start;
 align-items:center;
 padding-top:4px !important;
 padding-bottom:4px !important;
 padding-right:5px !important;
 padding-left:5px !important;
 position:relative;
 top:-24px;
}

/* Image */
.icon-boxes a img{
 width:40px !important;
}

/* Image */
.icon-boxes .container .row .col-xl-2 .icon-box .icon a img{
 height:40px !important;
}

/* Icon */
.main #hero .icon-boxes .container .row .col-xl-2 .icon-box .icon{
 width:40px !important;
 height:40px !important;
}

/* Icon */
.icon-boxes .icon-box .icon{
 overflow:visible;
}

/* Column 4/12 */
.icon-boxes .col-xl-2{
 position:relative;
 top:1px;
 max-width:100%;
}

@media (min-width:1200px){

 /* Column 4/12 */
 .icon-boxes .col-xl-2{
  width:325px;
 }
 
}
/* Icon box */
.icon-boxes .icon-box{
 justify-content:flex-start;
 flex-wrap:nowrap;
 float:none;
 flex-direction:row;
}

/* Icon box */
.main #hero .icon-boxes .container .row .col-xl-2 .icon-box{
 padding-top:0px !important;
 padding-bottom:0px !important;
 padding-left:28px !important;
}

/* Icon */
.icon-boxes .icon-box .icon{
 padding-top:0px;
}

/* Image */
.icon-boxes a img{
 margin-right:17px;
}

/* Link */
.icon-boxes .title a{
 padding-left:13px;
}

/* Icon box (hover) */
.icon-boxes .icon-box:hover{
 box-shadow:0px 0px 32px 14px rgba(175,158,8,0.78);
 transform:scale(1.01);
}
@media (max-width:640px){

/* Icon box */
.icon-boxes .icon-box{
 display:flex;
}

/* Row */
.icon-boxes .row{
 display:grid;
 grid-template-columns:50% 50%;
}

/* Icon box */
.main #hero .icon-boxes .container .row .col-xl-2 .icon-box{
 width:100% !important;
}

/* Row */
.main #hero .icon-boxes .container .row{
 grid-template-columns:50% 64.33fr !important;
}

}
@media (max-width:575px){

/* Icon box */
.icon-boxes .icon-box{
 transform:translatex(0px) translatey(0px);
}

/* Link */
.icon-boxes .title a{
 padding-left:0px !important;
 font-weight:300;
 font-size:20px;
}

/* Icon box */
.main #hero .icon-boxes .container .row .col-xl-2 .icon-box{
 width:93% !important;
}

}

</style>

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
                        <div class="icon-box d-flex align-items-center" style="padding: 20px; text-align: center; border: 1px solid #ddd; border-radius: 10px;">
                            <div class="icon me-3">
                                <a href="{{ route('category.show', ['category_name' =>Str::slug($category->name)]) }}">
                                    <img src="{{ Storage::url($category->categories_url) }}" alt="" style="width: 40px; height: 40px; object-fit: cover;" />
                                </a>
                            </div>
                            <h4 class="title m-0">
                                <!-- Add the link to the listing page with the category ID -->
                                <a href="{{ route('category.show', ['category_name' => $category->slug]) }}" class="stretched-link text-decoration-none">{{$category->name}}</a>
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
                  <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
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
        <div class="swiper init-swiper">
            <div class="swiper-wrapper">
                @php 
                    $isMobile = request()->userAgent() && str_contains(request()->userAgent(), 'Mobile');                    
                @endphp
                @foreach($topRatedListings as $listing)
                <div class="swiper-slide">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <!-- Image -->
                        <img src="{{ Storage::url($listing->business_img ?? 'default.jpg') }}" class="card-img-top" alt="{{ $listing->listing_title ?? 'No Title' }}" style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Title -->
                            <h5 class="card-title text-primary text-center mb-3">{{ $listing->listing_title ?? 'No Title' }}</h5>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-6">
                                        @if($listing->is_open)
                                            <span class=""><span class="bi bi-check-circle-fill text-success"></span> खुला (Open)</span>
                                        @else
                                            <span class=""><span class="bi bi-x-circle-fill text-danger"></span> बंद (Closed)</span>
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
                                    <div class="col-1"><span class="text-muted"><i class="bi bi-geo-alt fw-bold"></i></span></div>
                                    <div class="col-11">
                                        <span class="text-dark">{{ $listing->business_address ?? 'No Address' }}</span>
                                    </div>
                                </div>
                            </p>

                            <!-- Category -->
                            <p class="card-text text-dark mt-0">
                                <span class="text-muted"><i class="bi bi-tag fw-bold"></i> Category:</span> 
                                <span class="text-dark">{{ $listing->category->name ?? 'N/A' }}</span>
                            </p>

                            <!-- View Details Button -->
                            <div class="row">
                               
                                <div class="col-6">
                                @if($isMobile)
                                <a href="tel:{{ $listing->user->phone ?? 'N/A' }}" class="btn btn-success text-white fw-bold w-100 rounded-pill">
                                    <span class="text-muted"><i class="bi bi-phone text-white"></i></span>  
                                    <span class="">फ़ोन करे</span>
                                </a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-success text-white fw-bold w-100 rounded-pill">
                                        <span class="text-muted"><i class="bi bi-phone text-white"></i></span> 
                                        <span class="">{{ $listing->user->phone ?? 'N/A' }}</span>
                                    </a>
                                @endif
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => str::slug($listing->listing_title), 'listing_id' => $listing->id]) }}" 
                                       class="btn btn-primary text-white fw-bold w-100 rounded-pill">
                                       जानकारी देखे<i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
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
