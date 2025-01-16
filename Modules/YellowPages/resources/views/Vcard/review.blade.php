@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Review')
@section('content')

<div class="container mt-4">
    <h1 class="mb-4">प्रबंधन की समीक्षा करें</h1>

    <!-- Display error or success messages -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Reviews Table -->
    <div class="card">
        <div class="card-header">सभी समीक्षाएँ</div>
        <div class="card-body">
            @if($reviews->isEmpty())
                <p>कोई समीक्षा नहीं मिली.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>उपयोगकर्ता</th>
                            <th>व्यवसाय शीर्षक</th>
                            <th>स्वच्छता रेटिंग</th>
                            <th>सेवा रेटिंग</th>
                            <th>परिवेश रेटिंग</th>
                            <th>मूल्य रेटिंग</th>
                            <th>टिप्पणी</th>
                            <th>छवि</th>
                            <th>पर बनाया गया</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->name ?? 'N/A' }}</td>
                            <td>{{ $review->listing->business_name?? 'N/A' }}</td>
                             <td>{{ $review->cleanliness ?? 'N/A' }}</td>
                            <td>{{ $review->service ?? 'N/A' }}</td>
                            <td>{{ $review->ambience ?? 'N/A' }}</td>
                            <td>{{ $review->price ?? 'N/A' }}</td>
                            <td>{{ Str::limit($review->review, 50) }}</td>
                            <td>
                                @php
                                    $images = json_decode($review->image, true); // Decode JSON into an array
                                @endphp

                                @if(!empty($images) && is_array($images))
                                    @foreach($images as $image)
                                        <img src="{{ Storage::url($image) }}" alt="Review Image" width="50" height="50">
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>{{ $review->created_at->format('d M Y, h:i A') }}</td>
                            {{-- <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            </td> --}}
                        </tr>

                        @empty
                        <tr>
                            <td colspan="11">No reviews found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $reviews->links() }}
    </div>
</div>
@endsection
