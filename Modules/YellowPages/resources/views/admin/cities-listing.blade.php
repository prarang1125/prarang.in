@extends('yellowpages::layout.admin.admin')
@section('title', 'User Listing')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                    <li class="breadcrumb-item active" aria-current="page">शहरों की सूची</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-9 mx-auto w-100">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-0 text-uppercase">शहरों की सूची</h6>
            <hr/>
            <div class="card">
                <div class="card-body d-flex justify-content-end align-items-end">
                    <a href="{{ url('/yellow-pages/cities-register') }}" class="btn btn-primary">नया शहर जोड़ें</a>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">नाम</th>
                                <th scope="col">छवि</th>
                                <th scope="col">कार्रवाई </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($cities as $city)
                            <tr>
                                <th scope="row" class="align-middle">{{ $index }}</th>
                                <td class="align-middle">{{ $city->name }}</td>
                                <td class="align-middle">
                                    @if($city->cities_url)
                                        <img src="{{ Storage::url($city->cities_url) }}" alt="{{ $city->name }}" style="width: 100px; height: 100px;">
                                    @else
                                        चित्र उपलब्द नहीं है
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.cities-edit', $city->id) }}" class="btn btn-sm btn-primary edit-user">संपादन करना</a>
                                    <form action="{{ route('admin.cities-delete', $city->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger delete-user">मिटाना</button>
                                    </form>
                                </td>
                            </tr>
                            @php $index++; @endphp
                        @endforeach
                        
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection




