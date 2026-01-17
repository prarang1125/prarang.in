@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<br><br>
<!-- Header Section -->
<div
    style="position: relative; background-image: url('{{ Storage::url('categories/cate_bg.jpg') }}'); background-size: cover; background-position: center; padding: 60px; text-align: center; color: white;">
    <!-- Optional Overlay for better text visibility -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
    <h1 style="position: relative; z-index: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);">{{
        __('yp.choose_your_plan') }}</h1>
</div>

<!-- Info Section -->
<div style="text-align: center; padding: 20px;">
    <h6 style="color: #d9534f; font-weight: revert;">
        {{ __('yp.listing_warning_message') }}
    </h6>
    <br><br>
    <!-- Tabs Section -->
    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
        <button class="btn btn-primary" style="margin-right: 5px;"
            onclick="window.location.href='{{ url('yellow-pages/listing_plan') }}'">{{ __('yp.business_plans')
            }}</button>
        <button class="btn btn-outline-primary" style="margin-right: 5px;"
            onclick="window.location.href='{{ url('yellow-pages/bazzar_plan') }}'">{{ __('yp.bazaar_plans') }}</button>
        <button class="btn btn-outline-primary" onclick="window.location.href='{{ url('yellow-pages/vcard') }}'">{{
            __('yp.get_vcard') }}</button>
    </div>
</div>

<!-- Plans Section -->
<div style="display: flex; gap: 20px; justify-content: center; margin: 20px auto;">
    <!-- Free Plan Box -->
    <div
        style="width: 250px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; text-align: center;">
        <div style="background-color: #000; color: #fff; padding: 20px 10px;">
            <h3
                style="margin: 0; font-size: 13px; font-weight: normal; border: 2px solid #fff; padding: 3px 15px; border-radius: 15px; text-transform: uppercase; color: #fff;">
                {{ __('yp.business_listing') }}
            </h3>
            <div style="font-size: 36px; font-weight: bold;">Free</div>
            <small>{{ __('yp.per_listing') }}</small>
        </div>
        <ul style="padding: 20px; text-align: left; list-style: none; margin: 0;">
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.duration_unlimited') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.map_display') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.contact_display') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.image_gallery') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.business_tagline') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.location') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.website') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.social_links') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.faq') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.tags_keywords') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.business_hours') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.deals_offers') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.lead_form') }}</li>
        </ul>
        <button
            style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;"
            onclick="window.location.href='{{ route('yp.getLocationData') }}'">{{ __('yp.continue') }}</button>

        {{-- <button
            style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;">Continue</button>
        --}}

    </div>

    <!-- Featured Plan Box -->
    <div
        style="width: 250px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden; text-align: center;">
        <div style="background-color: #000; color: #fff; padding: 20px 10px;">
            <h6
                style="margin: 0; font-size: 13px; font-weight: normal; border: 2px solid #fff; padding: 3px 15px; border-radius: 15px; text-transform: uppercase; color: #fff;">
                {{ __('yp.business_listing_featured') }}
            </h6>
            <div style="font-size: 36px; font-weight: bold;">₹35.40</div>
            <small>{{ __('yp.per_listing') }}</small>
            <div
                style="background-color: #e74c3c; color: #fff; padding: 5px 10px; font-size: 12px; border-radius: 3px; margin-top: 10px; display: inline-block;">
                {{ __('yp.fresh') }}</div>
        </div>
        <ul style="padding: 20px; text-align: left; list-style: none; margin: 0;">
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.duration_15_days') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.map_display') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.contact_display') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.image_gallery') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.video') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.business_tagline') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.location') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.website') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.social_links') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.price_range') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.tags_keywords') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.business_hours') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.menu') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.announcement') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.deals_offers') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.events') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.bookings') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.lead_form') }}</li>
            <li style="margin: 10px 0; padding-left: 24px; position: Relative;">{{ __('yp.vcard') }}</li>
        </ul>
        <button
            style="padding: 15px; font-size: 16px; color: #fff; background-color: #000; border: none; cursor: pointer; width: 100%;"
            onclick="window.location.href='{{ route('yp.getLocationData') }}'">{{ __('yp.continue') }}</button>
    </div>
</div>

@endsection
@push('scripts')
@endpush