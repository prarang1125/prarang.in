@extends('yellowpages::layout.admin.admin')
@section('title', 'Purcahse Plan')
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4">भुगतान इतिहास</h2>
    <div class="d-flex justify-content-end"> <!-- Align to right -->
        <form method="GET" action="{{ route('admin.purachsePlan') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by Name" value="{{ request('search') }}" style="width: 150px;">
                <button class="btn btn-primary btn-sm" type="submit">Search</button>
            </div>
        </form>
    </div>

    @if($paymentHistories->isEmpty())
        <p class="text-center">कोई भुगतान इतिहास नहीं मिला.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>आईडी</th>
                    <th>लेन-देन आईडी</th>
                    <th>योजना का नाम</th>
                    <th>राशि (भारतीय रुपये)</th>
                    <th>अभिदाता</th>
                    <th>ख़रीदने की तिथि</th>
                    <th>कुल विजिट</th>
                    <th>कुल स्कैन</th>
                    <th>स्थिति</th>
                    <th>भुगतान तिथि</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentHistories as $history)
                    <tr>
                        <td>{{ $history->id }}</td>
                        <td>{{ $history->transaction_id }}</td>
                        <td>{{ $history->plan->name }}</td> <!-- Assuming 'plan' relationship is established -->
                        <td>₹{{ $history->amount }}</td>
                        <td>{{ $history->user ? $history->user->name : 'N/A' }}</td>
                        <td>{{ $history->purchased_at }}</td>
                        <td>{{ $history->expires_at }}</td>
                        <td>{{ $history->current_visits }}</td>
                        <td>{{ $history->current_qr_scan }}</td>
                        <td>{{ ucfirst($history->status) }}</td>
                        <td>{{ $history->created_at->format('d M, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
