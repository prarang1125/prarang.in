@extends('yellowpages::layout.vcard.vcard')
@section('title', 'User Update')
@section('content')

<!-- Start page wrapper -->
<div class="page-content">
    <!-- Breadcrumb -->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">उपयोगकर्ता</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('vCard.passwordReset') }}"><i class="bx bx-user"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">पासवर्ड</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End breadcrumb -->

    <!-- Display Errors if any -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="row">
        <div class="card" style="padding-top: 15px;">
            <div class="mx-auto col-xl-9 w-100">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="mt-3 alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                    <form action="{{ route('vCard.passwordUpdate', $user->id) }}" method="POST" class="p-4 shadow-sm rounded" style="width: 450px; background: #fff;">
                        @csrf
                        @method('PUT')
                

                        <!-- New Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">नया पासवर्ड(New Password)</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">पासवर्ड पुष्टि करें(Confirm Password)</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">अद्यतन</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- End page wrapper -->

@endsection
