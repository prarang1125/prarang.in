@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')

<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 10vh;">सक्रिय सदस्यता योजना</h2>

    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <!-- Subscription Details Section -->
        <div class="border p-4" style="width: 50%; border-radius: 8px;">
            <h3 class="mb-3 text-center">आपकी सक्रिय योजना</h3>
            @if($planHistory && $planDetails)
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>योजना का नाम:</th>
                            <td>{{ $planDetails->name }}</td>
                        </tr>
                        <tr>
                            <th>स्थिति:</th>
                            <td>{{ ucfirst($planHistory->status) }}</td>
                        </tr>
                        <tr>
                            <th>लेनदेन आईडी:</th>
                            <td>{{ $planHistory->transaction_id }}</td>
                        </tr>
                        <tr>
                            <th>मात्रा:</th>
                            <td>₹{{ number_format($planHistory->amount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>अगली बिलिंग तिथि:</th>
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
                <p class="text-center">आपने किसी भी योजना की सदस्यता नहीं ली है।</p>
            @endif
        </div>
    </div>
</div>

@endsection
