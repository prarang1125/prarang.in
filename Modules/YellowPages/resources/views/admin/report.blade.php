@extends('yellowpages::layout.admin.admin')
@section('title', 'Report')

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
        <div class="breadcrumb-title pe-3">रिपोर्ट</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('admin/cities-listing')}}"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">रिपोर्ट विवरण</li>
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
            <h6 class="mb-0 text-uppercase">रिपोर्ट विवरण</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">नाम</th>
                                <th scope="col">व्यवसाय ईमेल</th>
                                <th scope="col">फोन नंबर</th>
                                <th scope="col">संदेश/विवरण</th>
                                <th scope="col">फाइल</th>
                                <th scope="col">रिपोर्ट तिथि</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach($reports as $report)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $index }}</th> 
                                    <td class="align-middle">{{ $report->name }}</td> 
                                    <td class="align-middle">{{ $report->business_email }}</td>
                                    <td class="align-middle">{{ $report->number }}</td>
                                    <td class="align-middle">{{ $report->message }}</td>
                                    <td class="align-middle">
                                        @if($report->file)
                                            <img src="{{ Storage::url($report->file) }}" alt="{{ $report->name }}" style="width: 100px; height: 100px;">
                                        @else
                                            <p>कोई छवि उपलब्ध नहीं</p>
                                        @endif
                                    </td>   
                                    <td class="align-middle">{{ $report->created_at }}</td> 
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




