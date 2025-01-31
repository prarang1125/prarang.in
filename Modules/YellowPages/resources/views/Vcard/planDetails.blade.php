@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plans')
@section('content')
<style>
    /* By default, hide the sidebar on mobile */
    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }

        .sidebar.show {
            display: block;
        }
    }
</style>
<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 20vh;">सदस्यता योजनाएँ</h2>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Plans Cards -->
    <div class="row mt-5">
        @foreach($plans as $plan)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header text-center">
                    <h5><strong>{{ $plan->name }}</strong></h5>
                </div>
                <div class="card-body text-center d-flex flex-column">
                    <p class="card-text"><strong>कीमत:</strong> ₹{{ $plan->price }}</p>
                    <p class="card-text"><strong>विवरण:</strong> {{ $plan->description }}</p>
                    <p class="card-text"><strong>अवधि:</strong> {{ $plan->duration }} दिन</p>
                    <p class="card-text"><strong>प्रकार:</strong> {{ $plan->type }}</p>

                    <div class="mt-auto">
                        <form action="{{ route('vcard.stripeCheckout') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <input type="hidden" name="price" value="{{ $plan->price }}">
                    
                            <!-- Check if the current plan is active for the user by iterating through active plans -->
                            @foreach($purchasePlans as $activePlan)
                                @if($activePlan->plan_id == $plan->id)
                                    <button type="button" class="btn btn-success">वर्तमान योजना</button>
                                    @break
                                @endif
                            @endforeach
                    
                            <!-- If no active plan matches, allow the user to purchase -->
                            @if(!isset($activePlan) || $activePlan->plan_id != $plan->id)
                                <form action="{{ url('yellow-pages/vCard/purchase') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="btn btn-danger">खरीद योजना</button>
                                </form>
                            @endif
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
<script>
    document.getElementById('sidebar-toggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
</script>
