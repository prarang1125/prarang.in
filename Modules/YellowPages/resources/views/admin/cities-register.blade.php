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
                    <li class="breadcrumb-item"><a href="{{ url('admin/cities-listing')}}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">शहर रजिस्टर</li>
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
                <h6 class="mb-0 text-uppercase text-primary">नए शहर बनाएं</h6>
                <hr/>
                
                <form action="{{ route('admin.cities-store') }}" method="POST" enctype="multipart/form-data">
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
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="portal_id" class="form-label">पोर्टल</label>
                            <select class="form-control @error('portal_id') is-invalid @enderror" id="portal_id" name="portal_id">
                                <option value="" disabled selected>पोर्टल का चयन करें</option>
                                @foreach($portals as $portal)
                                    <option value="{{ $portal->id }}" {{ old('portal_id') == $portal->id ? 'selected' : '' }}>
                                        {{ $portal->city_name_local}}
                                    </option>
                                @endforeach
                            </select>
                            @error('portal_id')
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
