@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Review')
@section('content')
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row w-100">
            <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">नाम</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="business_email">व्यवसाय ईमेल</label>
                        <input type="email" name="business_email" id="business_email" class="form-control" value="{{ old('business_email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="number">फोन नंबर</label>
                        <input type="text" name="number" id="number" class="form-control" value="{{ old('number') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="message">संदेश/विवरण</label>
                        <textarea name="message" id="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">फाइल संलग्न करें</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">रिपोर्ट जमा करें</button>
                </form>
            </div>
        </div>
    </div>
@endsection
