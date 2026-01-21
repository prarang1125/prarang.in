@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.business_listing'))

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <!--start page wrapper -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ __('yp.business') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('vcard/cities-listing') }}"><i class="bx bx-user"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('yp.business_listing') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-9 mx-auto w-100">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                <h6 class="mb-0 text-uppercase">{{ __('yp.business_listing_heading') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body d-flex justify-content-end align-items-end">
                        <a href="{{ route('vCard.business-listing-register') }}"
                            class="btn btn-primary">{{ __('yp.create_new_listing') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- This makes the table scrollable on small screens -->
                            <table class="table mb-0 table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('yp.listing_title') }}</th>
                                        <th scope="col">{{ __('yp.business_name') }}</th>
                                        <th scope="col">{{ __('yp.business_address') }}</th>
                                        <th scope="col">{{ __('yp.primary_phone') }}</th>
                                        <th scope="col">{{ __('yp.primary_contact_email') }}</th>
                                        <th scope="col">{{ __('yp.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1; @endphp
                                    @foreach ($business_listing as $business)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $index }}</th>
                                            <td class="align-middle">{{ $business->listing_title }}</td>
                                            <td class="align-middle">{{ $business->business_name }}</td>
                                            <td class="align-middle">{{ $business->business_address }}</td>
                                            <td class="align-middle">{{ $user->phone }}</td>
                                            <td class="align-middle">{{ $user->email }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex flex-column flex-sm-row gap-2">
                                                    <a href="{{ route('vCard.listing-edit', $business->id) }}"
                                                        class="btn btn-sm btn-primary edit-user">{{ __('yp.edit') }}</a>
                                                    <form action="{{ route('vCard.listing-delete', $business->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger delete-user">{{ __('yp.delete') }}</button>
                                                    </form>
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
    </div>
@endsection
