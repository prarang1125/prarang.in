@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Business Listing')

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

@section('content')
<!--start page wrapper -->
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">पूछताछ(Support)</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class="bx bx-user"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">पूछताछ लिस्टिंग</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-xl-9 mx-auto w-100">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success text-center mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <h6 class="mb-0 text-uppercase">अपनी पूछताछ की स्थिति जानें।</h6>
            <hr/>

            <div class="card">
                <div class="card-body d-flex justify-content-end align-items-end">
                    <a href="{{ route('vCard.report') }}" class="btn btn-primary">पूछताछ के लिए संपर्क करें।</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">  <!-- Added for responsiveness -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">नाम</th>
                                    <th scope="col">ईमेल</th>
                                    <th scope="col">फोन नंबर</th>
                                    <th scope="col">संदेश/विवरण</th>
                                    <th scope="col">फाइल</th>
                                    <th scope="col">स्थिति</th>
                                    <th scope="col">रिपोर्ट तिथि</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1; @endphp
                                @foreach($report_list as $report)
                                    <tr>
                                        <th scope="row" class="align-middle">{{ $index }}</th> 
                                        <td class="align-middle">{{ $report->name }}</td> 
                                        <td class="align-middle text-break">{{ $report->business_email }}</td> 
                                        <td class="align-middle">{{ $report->number }}</td>
                                        <td class="align-middle text-break" style="max-width: 200px;">{{ $report->message }}</td> 
                                        <td class="align-middle">
                                            <img src="{{ Storage::url($report->file) }}" alt="File" class="img-fluid rounded" style="max-width: 100px;">
                                        </td>                                    
                                        <td class="align-middle">
                                            @if($report->status == 0)
                                                <span class="badge bg-warning text-dark">लंबित(Pending)</span>  <!-- Pending -->
                                            @elseif($report->status == 1)
                                                <span class="badge bg-info text-white">प्रोसेस(Process)</span>  <!-- In Process -->
                                            @elseif($report->status == 2)
                                                <span class="badge bg-success text-white">सफल(Successful)</span>  <!-- Successful -->
                                            @else
                                                <span class="badge bg-secondary text-white">अज्ञात स्थिति(Unknown Status)</span>  <!-- Unknown Status -->
                                            @endif
                                        </td>                                    
                                        <td class="align-middle">{{ $report->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                    @php $index++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- End of card-body -->
            </div> <!-- End of card -->
        </div> <!-- End of col-xl-9 -->
    </div> <!-- End of row -->
</div> <!-- End of page-content -->
@endsection
