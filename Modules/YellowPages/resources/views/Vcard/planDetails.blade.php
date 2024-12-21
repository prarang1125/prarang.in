@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Active Subscription Plan')
@section('content')

<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 10vh;">Subscription Plans</h2>
    
    <!-- Plans Table -->
    <div class="table-responsive mt-5">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Plan Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td><strong>{{ $plan->name }}</strong></td>
                    <td>₹{{ $plan->price }}</td>
                    <td>{{ $plan->description }}Day's</td>
                    <td>₹{{ $plan->duration }}</td>
                    
                    <td>
                        <form action="{{ url('yellow-pages/vCard/purchase') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <button type="submit" class="btn btn-danger">
                                {{ $plan->is_active ? 'Current Plan' : 'Purchase Plan' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
