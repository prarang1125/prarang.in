@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.support_title'))
@section('content')
@if (session('success'))
<div class="alert alert-success text-center">{{ session('success') }}</div>
@endif
<br>
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row w-100">
        <div class="col-lg-5 col-md-6 col-sm-10 mx-auto">
            <div class="border rounded p-3 shadow-sm bg-light">
                <!-- Smaller Form Box -->
                <h3 class="text-center mb-3 text-primary">{{ __('yp.contact_for_enquiry_msg') }}</h3>
                <form method="POST" action="{{ route('vCard.report-submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('formyp.name_label') }}</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_email" class="form-label">{{ __('formyp.business_email_label') }}</label>
                        <input type="email" name="business_email" id="business_email"
                            class="form-control form-control-sm" value="{{ old('business_email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">{{ __('formyp.phone_number_label') }}</label>
                        <input type="text" name="number" id="number" class="form-control form-control-sm"
                            value="{{ old('number') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('formyp.message_desc_label') }}</label>
                        <textarea name="message" id="message" class="form-control form-control-sm" rows="3"
                            required>{{ old('message') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">{{ __('formyp.attach_file_label') }}</label>
                        <input type="file" name="file" id="file" class="form-control form-control-sm">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">{{ __('formyp.submit_btn') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection