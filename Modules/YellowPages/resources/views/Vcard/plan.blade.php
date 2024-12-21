@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')

<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 10vh;">Active Subscription Plan</h2>

    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <!-- Subscription Details Section -->
        <div class="border p-4" style="width: 50%; border-radius: 8px;">
            <h3 class="mb-3 text-center">Your Active Plan</h3>
            @if($planHistory && $planDetails)
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Plan Name:</th>
                            <td>{{ $planDetails->name }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ ucfirst($planHistory->status) }}</td>
                        </tr>
                        <tr>
                            <th>Transaction ID:</th>
                            <td>{{ $planHistory->transaction_id }}</td>
                        </tr>
                        <tr>
                            <th>Amount:</th>
                            <td>₹{{ number_format($planHistory->amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Next Billing Date:</th>
                            <td>
                                @if($planDetails->duration)
                                    {{ \Carbon\Carbon::parse($planHistory->created_at)->addDays($planDetails->duration)->format('d-m-Y') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p class="text-center">You are not subscribed to any plan.</p>
            @endif
        </div>
    </div>
</div>

@endsection
