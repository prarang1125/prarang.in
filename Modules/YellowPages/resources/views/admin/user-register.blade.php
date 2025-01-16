@extends('yellowpages::layout.admin.admin')
@section('title', 'User Register')

@section('content')
<!--start page wrapper -->
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">व्यवस्थापक</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('admin/user-listing')}}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">उपयोगकर्ता रजिस्टर</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="card" style="padding-top: 15px;">
            <div class="col-xl-9 mx-auto w-100">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <h6 class="mb-0 text-uppercase text-primary">नया उपयोगकर्ता बनाएं</h6>
                <hr/>
                
                <form  action="{{ route('admin.users-store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">नाम</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="inputFirstName" name="name" value="{{ old('name') }}" >
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">ईमेल</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">पासवर्ड</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" >
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="inputRole" class="form-label">भूमिका</label>
                            <select id="inputRole" class="form-select @error('role') is-invalid @enderror" name="role">
                                <option selected disabled>चुनना...</option>
                                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>व्यवस्थापक</option>
                                <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>ग्राहक</option>
                            </select>                            
                            @error('role')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">बनाएं</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
