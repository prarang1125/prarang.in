@extends('yellowpages::layout.admin.admin')
@section('title', 'Payment History')
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4">Payment History</h2>

    @if($paymentHistories->isEmpty())
        <p class="text-center">No payment history found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Plan Name</th>
                    <th>Amount (INR)</th>
                    <th>Status</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentHistories as $history)
                    <tr>
                        <td>{{ $history->transaction_id }}</td>
                        <td>{{ $history->plan->name }}</td> <!-- Assuming 'plan' relationship is established -->
                        <td>₹{{ $history->amount }}</td>
                        <td>{{ ucfirst($history->status) }}</td>
                        <td>{{ $history->created_at->format('d M, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
