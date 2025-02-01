@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')

<div class="container my-5">
    <br>
    <!-- Heading -->
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2>सक्रिय सदस्यता योजना</h2>
        </div>
    </div>
    
    <!-- Subscription Details Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
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
                                    <td>{{ $planHistory->status }}</td>
                                </tr>
                                <tr>
                                    <th>लेनदेन आईडी:</th>
                                    <td>{{ $planHistory->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>मात्रा:</th>
                                    <td>₹{{ number_format($purchasePlan->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>अगली बिलिंग तिथि:</th>
                                    <td>{{ $purchasePlan->expires_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">आपने किसी भी योजना की सदस्यता नहीं ली है।</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
