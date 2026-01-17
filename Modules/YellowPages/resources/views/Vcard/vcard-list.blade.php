@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Business Listing')

{{-- @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif --}}




@section('content')
<!--start page wrapper -->
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ __('yp.vcard') }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="bx bx-user"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('yp.vcard_listing_title') }}</li>
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
            @if(session('errors_message'))
            <div class="alert alert-danger">
                {{ session('errors_message') }}
            </div>
            @endif


            <h6 class="mb-0 text-uppercase">{{ __('yp.vcard_listing_title') }}</h6>
            <hr />
            <div class="card">
                {{-- <div class="card-body d-flex justify-content-end align-items-center">
                    <a href="{{ route('vCard.createCard') }}" class="btn btn-primary">वीकार्ड संपादित करें</a>
                </div> --}}
                <div class="card-body">
                    <!-- Wrap the table in a responsive container -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('yp.counter') }}</th>
                                    <th scope="col">{{ __('yp.photo') }}</th>
                                    <th scope="col">{{ __('yp.color') }}</th>
                                    <th scope="col">{{ __('yp.city') }}</th>
                                    <th scope="col">{{ __('yp.category') }}</th>
                                    <th scope="col">{{ __('yp.report_date') }}</th>
                                    <th scope="col">{{ __('yp.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1; @endphp
                                @foreach($Vcard_list as $vcard)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $index }}</th>
                                    <td class="align-middle">{{ $vcard->user->name }}</td>
                                    <td class="align-middle">
                                        <img src="{{ $vcard->user->profile ? Storage::url($vcard->user->profile) : asset('images/default-profile.png') }}"
                                            alt="Profile Image" style="max-width: 100px;">
                                    </td>

                                    <td class="align-middle">{{ $vcard->color_code }}</td>
                                    <td class="align-middle">{{ $cities->get($vcard->city_id)->name ?? '' }}</td>
                                    <td class="align-middle">{{ $categories->get($vcard->category_id)->name ?? '' }}
                                    </td>
                                    <td class="align-middle">{{ $vcard->created_at }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('vCard.vcard-edit', $vcard->id) }}"
                                            class="btn btn-sm btn-primary"><i class="bx bx-edit"></i>{{ __('yp.edit')
                                            }}</a>

                                        @if($cities->has($vcard->city_id))
                                        @php
                                        $user = auth()->user()->load('city');
                                        $cityArr = $user->city->city_arr;
                                        @endphp
                                        <a target="_blank"
                                            href="{{ route('vCard.userPreview', ['city_arr' => Str::slug($cityArr), 'slug' => Str::slug($vcard->slug)]) }}"
                                            class="btn btn-sm btn-primary"><i class="bx bx-show"></i>{{
                                            __('yp.view_vcard') }}</a>

                                        @endif
                                        <form action="{{ route('vCard.vcard-delete', $vcard->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger ms-3"
                                                onclick="return confirm('{{ __('yp.delete_vcard_confirm') }}')"><i
                                                    class="bx bx-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                @php $index++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection