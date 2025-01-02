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
                    <li class="breadcrumb-item"><a href="{{ url('admin/categories-listing')}}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">श्रेणियाँ रजिस्टर</li>
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
                <h6 class="mb-0 text-uppercase text-primary">नई श्रेणियाँ बनाएँ</h6>
                <hr/>
                
                <form action="{{ route('admin.categories-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">नाम</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputFirstName" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <label for="slug" class="form-label">काउंटर</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="inputFirstName" name="slug" value="{{ old('slug') }}">
                            @error('slug')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="inputimage" class="form-label">छवि</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputimage" name="image">
                            @error('image')
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
