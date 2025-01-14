@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')
<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 20vh;">सदस्यता योजनाएँ</h2>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
      @endif
    <!-- Plans Table -->
    <div class="table-responsive mt-5">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>योजना का नाम</th>
                    <th>कीमत</th>
                    <th>विवरण</th>
                    <th>अवधि</th>
                    <th></th>
                    <th>कार्रवाई</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td><strong>{{ $plan->name }}</strong></td>
                    <td>₹{{ $plan->price }}</td>
                    <td>{{ $plan->description }}</td>
                    <td>{{ $plan->duration }}दिन</td>
                    <td>{{ $plan->type }}</td>
                    <td>
                        <form action="{{ route('vcard.stripeCheckout') }}" method="POST" nctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <input type="hidden" name="price" value="{{ $plan->price }}">
                            {{-- <button type="submit" class="btn btn-danger">Purchase</button> --}}
                                @if($userPlanId == $plan->id)
                                    <button type="button" class="btn btn-success">वर्तमान योजना</button>
                                @else
                                    <form action="{{ url('yellow-pages/vCard/purchase') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <button type="submit" class="btn btn-danger">खरीद योजना</button>
                                    </form>
                                @endif
                        
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
