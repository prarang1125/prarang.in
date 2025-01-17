@extends('yellowpages::layout.vcard.vcard')
@section('title', 'User upadte')
@section('content')

<!--start page wrapper -->
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">उपयोगकर्ता</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('yellow-pages/vCard/user-edit/' . Auth::id()) }}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">उपयोगकर्ता संपादन </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="card" style="padding-top: 15px;">
            <div class="col-xl-9 mx-auto w-100">
                <div class="col-xl-9 mx-auto w-100">
                <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                <h6 class="mb-0 text-uppercase">उपयोगकर्ता संपादन</h6>
                <hr/>
                <form  action="{{ route('vCard.userUpdate', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">नाम</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name', $user->name) }}" >
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">ईमेल</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">पासवर्ड</label>
                            @php
                            $userPassword =  $user->empPassword
                            @endphp
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" value="{{ old('password', $user->password) }}">
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">स्थिति</label>
                            <select id="is_active" class="form-select @error('is_active') is-invalid @enderror" name="is_active">
                                <option disabled>Choose...</option>
                                <option value="1" {{ old('is_active', $user->is_active) == '1' ? 'selected' : '' }}>सक्रिय</option>
                                <option value="0" {{ old('is_active', $user->is_active) == '0' ? 'selected' : '' }}>अक्रिय</option>
                            </select>
                            @error('is_active')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">अद्यतन</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
