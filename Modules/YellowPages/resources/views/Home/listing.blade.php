@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

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
        background-color:#d19027 !important; /* Gold color for hover */
    }

    /* When radio button is checked, change background color */
    input[type="radio"]:checked + .rating-star {
       background-color:#d19027 !important; /* Gold color for selected */
    }

    /* Highlight the stars on hover */
    label:hover ~ label .rating-star,
    label:hover .rating-star {
       background-color:#d19027 !important; /* Gold on hover */
    }
    /* Label */
form div div div label{
 width:15px !important;
 height:15px !important;
}

/* Division */
div form div div div{
 font-size:16px;
}

/* Span Tag */
.main form span{
 width:20px;
 height:20px;
}

    </style>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <!-- Navbar Include -->
    @include('yellowpages::layout.navbar')

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
                <p style="font-size: 16px; color: #777;">रेटिंग देने वाले पहले व्यक्ति बनें!
                </p>
            </div>
            <div>
                <button id="shareButton" style="background-color: #007bff; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px; cursor: pointer;">
                    शेयर करें
                </button>

                <!-- Share Modal -->
                <div id="shareModal" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4>शेयर करें</h4>
                    <button onclick="shareOnFacebook()" style="margin-bottom: 10px; background-color: #3b5998; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px;">Facebook पर शेयर करें</button>
                    <button onclick="shareOnInstagram()" style="margin-bottom: 10px; background-color: #e4405f; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px;">Instagram पर शेयर करें</button>
                    <button onclick="shareOnWhatsApp()" style="margin-bottom: 10px; background-color: #25D366; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px;">WhatsApp पर शेयर करें</button>
                    <button onclick="shareOnLinkedIn()" style="margin-bottom: 10px; background-color: #0077b5; color: white; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px;">LinkedIn पर शेयर करें</button>
                    <button onclick="closeModal()" style="margin-top: 10px; background-color: #ccc; color: black; border: none; padding: 10px 15px; font-size: 14px; border-radius: 5px;">बंद करें</button>
                </div>
                <a href="{{ route('yp.listing.save', $listing->id) }}" style="background-color: #28a745; color: white; padding: 10px 15px; font-size: 14px; border-radius: 5px; text-decoration: none; display: inline-block; cursor: pointer;">
                    सूची सहेजें
                </a>

            </div>
        </div>

        <!-- Main Content -->
        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <!-- Left Section -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <p style="font-size: 16px; color: #555;">आपकी लिस्टिंग के बारे में विस्तृत विवरण</p>
                <p style="font-size: 16px; color: #555; margin-top: 10px;">पता:<span style="color: #000;">{{ $listing->business_address ?? 'No Address' }}</span></p>
            </div>

            <!-- Business Hours Section -->
            <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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
      <form method="POST" action="{{ route('reviews.store', $listing->id) }}" enctype="multipart/form-data">
        @csrf
        <div style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 15px;">हमें रेटिंग दें और समीक्षा लिखें</h3>

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
@endsection
@push('scripts')

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
    <script>
        const shareButton = document.getElementById('shareButton');
        const shareModal = document.getElementById('shareModal');

        shareButton.addEventListener('click', () => {
            shareModal.style.display = 'block';
        });

        function closeModal() {
            shareModal.style.display = 'none';
        }

        function shareOnFacebook() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=your-url', '_blank');
            closeModal();
        }

        function shareOnInstagram() {
            alert('Instagram sharing is not directly supported from web.');
        }

        function shareOnWhatsApp() {
            window.open('https://api.whatsapp.com/send?text=your-url', '_blank');
            closeModal();
        }

        function shareOnLinkedIn() {
            window.open('https://www.linkedin.com/shareArticle?mini=true&url=your-url&title=Your-Title&summary=Your-Summary&source=Your-Source', '_blank');
            closeModal();
        }

    </script>
  @endpush



