@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.reviewer'))
@section('content')
<br>

<div class="container mt-4">
    <h1 class="mb-4">{{ __('yp.review_management') }}</h1>

    <!-- Reviews Table -->
    <div class="card">
        <div class="card-header">{{ __('yp.all_reviews') }}</div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Added for responsiveness -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('yp.hash') }}</th>
                            <th>{{ __('yp.reviewer') }}</th>
                            <th>{{ __('yp.business_title_review') }}</th>
                            <th>{{ __('yp.cleanliness_rating') }}</th>
                            <th>{{ __('yp.service_rating') }}</th>
                            <th>{{ __('yp.ambience_rating') }}</th>
                            <th>{{ __('yp.price_rating') }}</th>
                            <th>{{ __('yp.comment') }}</th>
                            <th>{{ __('yp.image') }}</th>
                            <th>{{ __('yp.created_at_review') }}</th>
                        </tr>
                    </thead>
                    @if($reviews->isEmpty())
                    <div class="alert alert-warning text-center mt-2">{{ __('yp.no_reviews_found') }}</div>
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
                                <img src="{{ Storage::url($image) }}" alt="Review Image" class="img-thumbnail"
                                    width="50" height="50">
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