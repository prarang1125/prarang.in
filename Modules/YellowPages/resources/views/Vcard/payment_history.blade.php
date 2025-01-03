@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Payment History')
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4">भुगतान इतिहास</h2>
    @if($paymentHistories->isEmpty())
        <p class="text-center">कोई भुगतान इतिहास नहीं मिला.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>लेन-देन आईडी</th>
                    <th>योजना का नाम</th>
                    <th>राशि (INR)</th>
                    <th>स्थिति</th>
                    <th>भुगतान तिथि</th>
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
