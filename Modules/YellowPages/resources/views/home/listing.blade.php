@extends('yellowpages::layout.script')

@section('meta_title', $listing->listing_title)
@section('meta_description','Prarang - Yellow Pages')
@section('meta_og_title', $listing->listing_title)
@section('meta_og_description','Prarang - Yellow Pages')
@section('meta_keywords', $listing->listing_keywords)
@section('meta_og_image', Storage::url($listing->feature_img ?? 'default.jpg'))
@section('content')
    <style>
        /* Style for Rating Stars */
    .rating-star {
        width: 40px;
        height: 40px;
        background-color: #ccc;
        clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        transition: background-color 0.3s;
    }

    /* On hover, change background color */
    label:hover .rating-star {
        background-color: rgba(255, 215, 0, 0.7); /* Gold color for hover */
    }

    /* When radio button is checked, change background color */
    input[type="radio"]:checked + .rating-star {
        background-color: rgba(255, 215, 0, 0.9); /* Gold color for selected */
    }

    /* Highlight the stars on hover */
    label:hover ~ label .rating-star,
    label:hover .rating-star {
        background-color: rgba(255, 215, 0, 0.7); /* Gold on hover */
    }
    /* Image */
.main div div div img{
 width:100% !important;
 height:59% !important;
}

/* Image */
.main div img{
 max-height:511px;
}
@media (max-width:575px){

/* Division */
.main > div > div{
 flex-direction:column !important;
 transform:translatex(0px) translatey(0px);
}

/* Heading */
.main div h1{
 margin-bottom:15px !important;
}

}
/* Strong Tag */
.main p strong{
 font-size:14px;
 font-weight:700;
}

/* Italic Tag */
.main p i{
 color:#0e4fd1;
}
/* Body */
body{
 background-color:#f3f0f0 !important;
}

/* Division */
.main > div > div > div{
 background-color:rgba(255,255,255,0) !important;
}




    </style>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <!-- Main Container -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
            

       <!-- Main Container -->
<div style="max-width: 1200px; margin: 0 auto; padding-top: 100px; padding: 20px;">
    <!-- Image Section -->
    <div style="background-color: #ffffff; padding-top: 90px; display: flex; justify-content: center; align-items: center;">
        <img src="{{ Storage::url($listing->feature_img ?? 'default.jpg')}}" alt="Listing Image" 
            style="max-width: 100%; height: auto; border-radius: 10px; display: block;">
    </div>
</div>

        <!-- Breadcrumb Navigation -->
        <div style="font-size: 14px; color: #555; margin-bottom: 15px;">
            <a href="#" style="text-decoration: none; color: #007bff;">होम </a> / 
            <a href="#" style="text-decoration: none; color: #007bff;">सेवाएं</a> / 
            <span style="color: #555;">{{ $listing->listing_title ?? 'No Title' }}</span>
        </div>

        <!-- Listing Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
            <div>
                <h1 style="font-size: 28px; font-weight: bold; margin: 0;">{{ $listing->listing_title ?? 'No Title' }}</h1>

            </div>
            <div>
                <button id="shareButton" style="background-color: #007bff; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; cursor: pointer;">
                    शेयर करें
                </button>
                <a href="{{ route('yp.listing.save', $listing->id) }}" style="background-color: #28a745; color: white; padding: 10px 15px; font-size: 14px; border-radius: 5px; text-decoration: none; display: inline-block; cursor: pointer;">
                    सूची सहेजें
                </a>                
                
            </div>
        </div>

        <!-- Main Content -->
        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <!-- Left Section -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
               
                <p style="font-size: 16px; color: #555; margin-top: 10px;">
                    <strong><i class="bi bi-geo-alt"></i> पता:</strong> <br>
                    {{ $listing->business_address ?? 'No Address' }}
                </p>
                <p style="font-size: 16px; color: #555;">
                    <strong>विवरण:</strong><br>
                    {!! $listing->description ?? 'N/A' !!}
                </p>
                                
            </div>            

            <!-- Business Hours Section -->
            <div style="flex:2; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">काम करने के घंटे</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @if($listingHours->isNotEmpty())
                        @foreach($listingHours as $hour)
                            <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>{{ \Illuminate\Support\Str::ucfirst($hour->day) }}</span>
                                <span>{{ Carbon\Carbon::parse($hour->open_time)->format('H:i') }} - {{ Carbon\Carbon::parse($hour->close_time)->format('H:i') }}</span>
                            </li>
                        @endforeach
                    @else
                        <li>No working hours available for this listing.</li>
                    @endif
                </ul>
                <p style="font-size: 14px; margin-top: 10px; color: {{ $isOpen ? '#28a745' : '#dc3545' }};">
                    {{ $isOpen ? 'Open Now' : 'Closed Now' }}
                </p>
            </div>            

        </div>

      <!-- Review Form -->
        <div class="text-end">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
          <i class="bi bi-star"></i>  रेटिंग दें
        </button>

        </div>
</div>



<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">हमें रेटिंग दें और समीक्षा लिखें</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reviews.store', $listing->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                     
                
                        <!-- Cleanliness Rating -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">साफ़-सफ़ाई</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label for="cleanliness-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                                        <input type="radio" name="cleanliness" id="cleanliness-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                                        {{ old('cleanliness') == $i ? 'checked' : '' }}>
                                        <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                                    </label>
                                @endfor
                            </div>
                        </div>
                
                        <!-- Service Rating -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">सेवा</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label for="service-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                                        <input type="radio" name="service" id="service-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                                        {{ old('service') == $i ? 'checked' : '' }}>
                                        <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                                    </label>
                                @endfor
                            </div>
                        </div>
                
                        <!-- Ambience Rating -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">माहौल</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label for="ambience-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                                        <input type="radio" name="ambience" id="ambience-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                                        {{ old('ambience') == $i ? 'checked' : '' }}>
                                        <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                                    </label>
                                @endfor
                            </div>
                        </div>
                
                        <!-- Price Rating -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">कीमत</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label for="price-{{ $i }}" style="cursor: pointer; position: relative; width: 40px; height: 40px;">
                                        <input type="radio" name="price" id="price-{{ $i }}" value="{{ $i }}" style="position: absolute; opacity: 0;" 
                                        {{ old('price') == $i ? 'checked' : '' }}>
                                        <span class="rating-star" style="position: absolute; inset: 0; clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%); background-color: rgba(128, 128, 128, 0.7); transition: background-color 0.3s;"></span>
                                    </label>
                                @endfor
                            </div>
                        </div>
                
                        <!-- Image Upload Section -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">छवियाँ चुनें</label>
                            <input type="file" name="image[]" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" multiple>
                        </div>
                
                        <!-- Title Section -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">शीर्षक</label>
                            <input type="text" name="title" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                
                        <!-- Review Section -->
                        <div style="margin-bottom: 20px;">
                            <label style="font-size: 14px; color: #555; display: block; margin-bottom: 5px;">समीक्षा</label>
                            <textarea name="review" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" rows="4"></textarea>
                        </div>
                
                        <!-- Submit Button -->
                        <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; width: 100%;">समीक्षा सबमिट करें</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const shareButton = document.getElementById("shareButton");
        
        if (shareButton) {
            shareButton.addEventListener("click", function () {
                if (navigator.share) {
                    navigator.share({
                        title: document.title || "Check this out!",
                        text: "Check this interesting page!",
                        url: window.location.href,
                    })
                    .then(() => console.log("Shared successfully!"))
                    .catch((error) => console.error("Sharing failed:", error));
                } else {
                    alert("Sharing is not supported on this device.");
                }
            });
        } else {
            console.error("Error: shareButton not found.");
        }
    });
</script>

    <script>
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', function () {
                const stars = this.closest('div').querySelectorAll('.rating-star');
                stars.forEach(star => star.style.backgroundColor = 'rgba(128, 128, 128, 0.7)'); // Reset colors
                for (let i = 0; i < this.value; i++) {
                    stars[i].style.backgroundColor = 'yellow'; // Highlight selected stars
                }
            });
        });
    </script>
   
  @endpush



