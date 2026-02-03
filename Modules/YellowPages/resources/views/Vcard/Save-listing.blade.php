@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.business_listing'))

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
        <div class="breadcrumb-title pe-3">{{ __('yp.saved_business') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('vcard/cities-listing')}}"><i
                                class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('yp.saved_business_listing') }}</li>
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

            <!-- Error Message -->
            @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
            @endif

            <h6 class="mb-0 text-uppercase">{{ __('yp.business_listing_heading') }}</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <!-- Make the table scrollable on small screens -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('yp.listing_title') }}</th>
                                    <th scope="col">{{ __('yp.business_name') }}</th>
                                    <th scope="col">{{ __('yp.business_address') }}</th>
                                    <th scope="col">{{ __('yp.primary_phone') }}</th>
                                    <th scope="col">{{ __('yp.primary_contact_email') }}</th>
                                    <th scope="col">{{ __('yp.pincode') }}</th>
                                    <th scope="col">{{ __('yp.actions') }}</th>
                                </tr>
                            </thead>
                            @if($business_listing->isEmpty())
                            <div class="alert alert-warning">{{ __('yp.no_business_listing_found') }}</div>
                            @else
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
                                        <div class="d-flex flex-column flex-sm-row gap-2">
                                            <a href="{{ route('vCard.listing-edit', $business->id) }}"
                                                class="btn btn-sm btn-primary edit-user">{{ __('yp.edit') }}</a>
                                            <form action="{{ route('vCard.Savelisting-delete', $business->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger delete-user">{{
                                                    __('yp.delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php $index++; @endphp
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div> <!-- End table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection