@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')

    <br><br><br>
    <div
        style="font-family: Arial, sans-serif; margin: 20px; padding: 30px; border: 1px solid #ddd; background-color: #fafafa; border-radius: 8px;">
        <h2 style="font-size: 30px; color: #2c3e50; text-align: center; margin-bottom: 20px;">
            {{ __('yp.privacy_policy_title') }}</h2>

        <p style="font-size: 18px; color: #555; line-height: 1.8; text-align: justify;">
            <strong style="font-size: 20px; color: #333;">{{ __('yp.disclaimer') }}</strong><br><br>

            {{ __('yp.privacy_policy_content_1') }}<br><br>

            {{ __('yp.privacy_policy_content_2') }}<br><br>

            {{ __('yp.privacy_policy_content_3') }}<br><br>

            <strong style="font-size: 18px; color: #000;">{{ __('yp.please_note') }}</strong><br>
            {{ __('yp.privacy_policy_content_4') }}
        </p>
    </div>

@endsection
