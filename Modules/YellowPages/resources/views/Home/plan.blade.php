@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<br><br><br><br>
<!-- Vcard Plans -->
<div class="row justify-content-center">
    @foreach ($plans as $index => $plan)
        <div class="col-lg-2 col-md-4 col-sm-6 text-center" style="margin-bottom: 30px; padding-top: 20px; padding-bottom: 20px;">
            <div class="plan-box" style="padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); background-color: {{ ['#b3fff0', ' #ffb3ff', '#ffe0b2', '#d1c4e9', '#c8e6c9'][$index % 5] }}; height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                <h2 style="font-size: 24px; font-weight: bold; color: #333;">{{ $plan->type }}</h2>
                <p style="font-size: 22px; color: #333;">{{ $plan->name }}</p>
                <p style="font-size: 20px; color: #333;">{{ '₹' . $plan->price }}</p>
                <p style="font-size: 16px; color: #555;">{{ $plan->description }}</p>
                <p style="font-size: 16px; color: #555;">Duration: {{ $plan->duration }}</p>
                <ul style="list-style: none; padding: 0; margin-bottom: 20px; text-align: center;">
                    <!-- You can add any list items here if needed -->
                </ul>
                <!-- Single button for all plans -->
                <a href="#" style="background-color: #007bff; color: #fff; padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block;">View Plan</a>
            </div>
        </div>
    @endforeach
</div>


@endsection
