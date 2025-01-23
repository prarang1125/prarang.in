@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<br><br><br><br>
<!-- Vcard Plans -->
<div class="row justify-content-center">
    <h2 style="text-align: center; font-size: 2.5em; margin-bottom: 40px; font-weight: bold; color: #333;">सदस्यता योजना</h2>
    @foreach ($plans as $index => $plan)
        <div class="col-lg-2 col-md-4 col-sm-6 text-center" style="margin-bottom: 30px; padding-top: 20px; padding-bottom: 20px;">
            <div class="plan-box" style="padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: {{ ['#FFA69E', '#4D7C8A', '#7F9C96', '#8FAD88', '#CBDF90'][$index % 5] }}; height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                <h2 style="font-size: 24px; font-weight: bold; color: #333;">{{ $plan->type }}</h2>
                <p style="font-size: 22px; color: #333;">{{ $plan->name }}</p>
                <p style="font-size: 20px; color: #333;">{{ '₹' . $plan->price }}</p>
                <p style="font-size: 16px; color: #555;">{{ $plan->description }}</p>
                <p style="font-size: 16px; color: #555;">अवधि: {{ $plan->duration }}</p>
                <ul style="list-style: none; padding: 0; margin-bottom: 20px; text-align: center;">
                </ul>
                <a href="{{ Auth::check() ? route('vCard.planDetails') : route('yp.newAccount') }}" style="background-color: #f9e79f; color: #fff; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">
                    योजना देखें
                </a>
            </div>
        </div>
    @endforeach
</div>


@endsection
