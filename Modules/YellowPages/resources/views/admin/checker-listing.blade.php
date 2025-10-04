@extends('yellowpages::layout.admin.admin')
@section('title', 'Business Listing')

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
                    <li class="breadcrumb-item active" aria-current="page">व्यवसाय सूचीकरण</li>
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
            <h6 class="mb-0 text-uppercase">व्यवसाय सूचीकरण</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">सूची_शीर्षक</th>
                                <th scope="col">व्यवसाय का नाम</th>
                                <th scope="col">बिज़नेस_पता</th>
                                <th scope="col">फ़ोन</th>
                                <th scope="col">ईमेल</th>
                                <th scope="col">कार्रवाई</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($business_listing as $business)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $index }}</th> 
                                    <td class="align-middle">{{ $business->listing_title }}</td> 
                                    <td class="align-middle">{{ $business->business_name }}</td>
                                    <td class="align-middle">{{ $business->business_address }}</td>
                        
                                    @php
                                        $user = $users[$business->user_id] ?? null; // Fetch user by ID, or set null if not found
                                    @endphp
                                    
                                    <td class="align-middle">{{ $user ? $user->phone : 'N/A' }}</td>
                                    <td class="align-middle">{{ $user ? $user->email : 'N/A' }}</td>
                        
                                    <td class="align-middle">
                                        @if($business->is_active == 1)
                                            <a href="{{ route('checker.listing-approve', $business->id) }}" class="btn btn-sm btn-success edit-user">
                                                स्वीकृत
                                            </a>
                                        @else
                                            <a href="{{ route('checker.listing-approve', $business->id) }}" class="btn btn-sm btn-danger edit-user">
                                                देखे
                                            </a>
                                        @endif
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




