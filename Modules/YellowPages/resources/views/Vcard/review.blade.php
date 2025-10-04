@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Review')
@section('content')
<br>

<div class="container mt-4">
    <h1 class="mb-4">प्रबंधन की समीक्षा करें</h1>

    <!-- Reviews Table -->
    <div class="card">
        <div class="card-header">सभी समीक्षाएँ</div>
        <div class="card-body">
            <div class="table-responsive"> <!-- Added for responsiveness -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>समीक्षक(Reviewer)</th>
                            <th>व्यवसाय शीर्षक</th>
                            <th>स्वच्छता रेटिंग</th>
                            <th>सेवा रेटिंग</th>
                            <th>परिवेश रेटिंग</th>
                            <th>मूल्य रेटिंग</th>
                            <th>टिप्पणी</th>
                            <th>छवि</th>
                            <th>पर बनाया गया</th>
                        </tr>
                    </thead>
                    @if($reviews->isEmpty())
                        <div class="alert alert-warning text-center mt-2">कोई समीक्षा नहीं मिली।</div>
                    @else
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->title ?? 'N/A' }}</td>
                                <td>{{ $review->listing->business_name ?? 'N/A' }}</td>
                                <td>{{ $review->cleanliness ?? 'N/A' }}</td>
                                <td>{{ $review->service ?? 'N/A' }}</td>
                                <td>{{ $review->ambience ?? 'N/A' }}</td>
                                <td>{{ $review->price ?? 'N/A' }}</td>
                                <td>{{ Str::limit($review->review, 50) }}</td>
                                <td>
                                    @php
                                        $images = json_decode($review->image, true); 
                                    @endphp
                                    @if(!empty($images) && is_array($images))
                                        @foreach($images as $image)
                                            <img src="{{ Storage::url($image) }}" alt="Review Image" class="img-thumbnail" width="50" height="50">
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $review->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $reviews->links() }}
    </div>
</div>
@endif
@endsection
