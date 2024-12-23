@extends('yellowpages::layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Review Management</h1>

    <!-- Display error or success messages -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Reviews Table -->
    <div class="card">
        <div class="card-header">All Reviews</div>
        <div class="card-body">
            @if($reviews->isEmpty())
                <p>No reviews found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Business Title</th>
                            <th>Cleanliness Rating</th>
                            <th>Service Rating</th>
                            <th>Ambience Rating</th>
                            <th>Price Rating</th>
                            <th>Comment</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name ?? 'N/A' }}</td>
                            <td>{{ $review->business_title ?? 'N/A' }}</td>
                            <td>{{ $review->cleanliness_rating ?? 'N/A' }}</td>
                            <td>{{ $review->service_rating ?? 'N/A' }}</td>
                            <td>{{ $review->ambience_rating ?? 'N/A' }}</td>
                            <td>{{ $review->price_rating ?? 'N/A' }}</td>
                            <td>{{ Str::limit($review->comment, 50) }}</td>
                            <td>
                                @if($review->image)
                                    <img src="{{ asset('storage/reviews/' . $review->image) }}" alt="Review Image" width="50" height="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $review->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <a href="{{ route('admin.review.edit', $review->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
