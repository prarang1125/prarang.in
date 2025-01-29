@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<br><br>
        <!-- Header with Background Color -->
        <div style="background-image: url('{{ Storage::url('categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; color: white; text-align: center;">
            <div style="display: flex; justify-content: flex-start;">
                <a href="{{ route('yp.home') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            
            @if(isset($city_name) && $city_name)
                <h1 style="padding-top: 20px;">
                    {{$city_name}} व्यवसाय
                </h1>
            @elseif(isset($city) && $city)
                <h1 style="padding-top: 20px;">
                    {{$city}} व्यवसाय
                </h1>
            @else
                <h1 style="padding-top: 20px;">
                    {{$category_name}}
                </h1>
            @endif
        </div>
        
        <!-- Listings Section -->
        <div style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
            {{-- <div style="font-size: 24px; margin-bottom: 20px;">
                सूची के लिए परिणाम
            </div> --}}
            <!-- Filters Section -->
<div style="display: flex; justify-content: space-evenly; align-items: center; margin-bottom: 20px; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <!-- Filter Options with Checkboxes -->
    {{-- <div>
        <label for="credit-cards" style="margin-right: 15px; padding: 10px 15px; border: 1px solid #ccc; border-radius: 20px; background-color: #fff; cursor: pointer;">
            <input type="checkbox" id="credit-cards" name="credit-cards" style="margin-right: 5px;"> Accepts Credit Cards
        </label>
        <label for="wireless-internet" style="padding: 10px 15px; border: 1px solid #ccc; border-radius: 20px; background-color: #fff; cursor: pointer;">
            <input type="checkbox" id="wireless-internet" name="wireless-internet" style="margin-right: 5px;"> Wireless Internet
        </label>
    </div> --}}

    <!-- Filter Buttons -->
    <div style="display: flex; gap: 10px;">
        {{-- <button style="padding: 10px 15px; border-radius: 20px; border: 1px solid ;  cursor: pointer;">
            Near Me
        </button>
        <button style="padding: 10px 15px; border-radius: 20px; border: 1px solid;  cursor: pointer;">
            Price
        </button> --}}
        {{-- <button style="padding: 10px 15px; border-radius: 20px; border: 1px solid;  cursor: pointer;">
            Open Now
        </button> --}}
        {{-- <button style="padding: 10px 15px; border-radius: 20px; border: 1px solid; cursor: pointer;">
            Best Match
        </button>
        <button style="padding: 10px 15px; border-radius: 20px; border: 1px solid; cursor: pointer;">
            Sort By
        </button> --}}
        
    </div>

    <!-- Sort By Buttons -->
   
        {{-- <div>
            <select 
                style="padding: 10px 15px; border-radius: 20px; border: 1px solid ; cursor: pointer; width: 100%; max-width: 300px;">
                @foreach($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>         --}}
</div>

<!-- Listings Grid -->
<div class="listings-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
    @foreach($listings as $listing)
        <a href="{{ route('yp.listing-details', ['city_slug' => $listing->city->name, 'listing_title' => $listing->listing_title, 'listing_id' => $listing->id]) }}" 
           style="display: block; background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center; text-decoration: none;">
           <img src="{{ Storage::url($listing->feature_img ?? 'default.jpg') }}" style="width: 200px; height: 200px; object-fit: cover;">
            <div style="padding: 20px;">
                <div style="background-color: {{ $listing->status === 'Closed' ? '#ff4d4d' : '#28a745' }}; color: white; padding: 5px; border-radius: 5px; font-size: 12px; display: inline-block; margin-bottom: 10px;">
                    {{ $listing->is_open ? 'Open' : 'Closed' }}
                </div>
                <h3 style="font-size: 18px; margin-bottom: 10px; color: #333;">{{ $listing->listing_title ?? 'No Title' }}</h3>
                <p style="text-decoration: none; color: #333; font-weight: bold;">{{ $listing->listing_title }}</p>
            </div>
        </a>
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
        
        <!-- Responsive Grid for Mobile -->
        <style>
            @media (max-width: 768px) {
                .listings-grid {
                    grid-template-columns: 1fr; /* One listing per row on small screens */
                }
            }
        </style>
  @endpush
