@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.payment_history_title'))
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4">{{ __('yp.payment_history_title') }}</h2>
    @if($paymentHistories->isEmpty())
    <p class="text-center">{{ __('yp.no_payment_history') }}</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('yp.transaction_id') }}</th>
                <th>{{ __('yp.plan_name') }}</th>
                <th>{{ __('yp.amount') }} (INR)</th>
                <th>{{ __('yp.status') }}</th>
                <th>{{ __('yp.payment_date') }}</th>
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