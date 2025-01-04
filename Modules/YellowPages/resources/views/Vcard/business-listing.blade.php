@extends('yellowpages::layout.vcard.vcard')
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
        <div class="breadcrumb-title pe-3">व्यवसाय</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('vcard/cities-listing')}}"><i class="bx bx-user"></i></a>
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
            <h6 class="mb-0 text-uppercase">बिजनेस लिस्टिंग</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">लिस्टिंग_शीर्षक</th>
                                <th scope="col">व्यवसाय_नाम</th>
                                <th scope="col">व्यवसाय_पता</th>
                                <th scope="col">प्राथमिक_फ़ोन</th>
                                <th scope="col">प्राथमिक_संपर्क_ईमेल</th>
                                <th scope="col">पिनकोड</th>
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
                                    <td class="align-middle">{{ $business->primary_phone }}</td>
                                    <td class="align-middle">{{ $business->primary_contact_email }}</td>
                                    <td class="align-middle">{{ $business->pincode }}</td> 
                                    <td class="align-middle"> 
                                        <a href="{{ route('vCard.listing-edit', $business->id) }}" class="btn btn-sm btn-primary edit-user">संपादन करना</a>
                                        <form action="{{ route('vCard.listing-delete', $business->id) }}" method="POST" style="display:inline;">
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
@endsection




