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
        <div class="breadcrumb-title pe-3">वीकार्ड</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">वीकार्ड लिस्टिंग</li>
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
            <h6 class="mb-0 text-uppercase">वीकार्ड लिस्टिंग</h6>
            <hr/>
            <div class="card">
                <div class="card-body d-flex justify-content-end align-items-end">
                    <a href="{{route('vCard.createCard')}}" class="btn btn-primary">वीकार्ड संपादित करें</a>
                </div>
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">काउंटर</th>
                                <th scope="col">बैनर_छवि</th>
                                <th scope="col">लोगो</th>
                                <th scope="col">शीर्षक</th>
                                <th scope="col">विवरण</th>
                                <th scope="col">कुल स्कैन</th>
                                <th scope="col">रिपोर्ट तिथि</th>
                                <th scope="col">कार्रवाई</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($Vcard_list as $vcard)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $index }}</th> 
                                    <td class="align-middle">{{ $vcard->slug }}</td> 
                                    <td class="align-middle">
                                        <img src="{{ Storage::url($vcard->banner_img) }}" alt="File" style="max-width: 100px;">
                                    </td>
                                    <td class="align-middle">
                                    <img src="{{ Storage::url($vcard->logo) }}" alt="File" style="max-width: 100px;">
                                    </td>
                                    <td class="align-middle">{{ $vcard->title }}</td>
                                    <td class="align-middle">{{ $vcard->description }}</td>
                                    <td class="align-middle">{{ $vcard->scan_count }}</td>                         
                                    <td class="align-middle">{{ $vcard->created_at}}</td>
                                    <td class="align-middle"> 
                                        <a href="{{ route('vCard.vcard-edit', $vcard->id) }}" class="btn btn-sm btn-primary edit-user">संपादन करना</a>
                                        <form action="#" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger delete-user">मिटाना</button>
                                        </form>
                                        <a href="{{ route('vCard.view', ['vcard_id' => $vcard->id]) }}" class="btn btn-sm btn-primary edit-user">देखे</a>
                                    </div>
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



