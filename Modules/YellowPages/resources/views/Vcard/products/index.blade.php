@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.products'))
@section('content')
<div class="page-content">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div>
                    <h6 class="mb-0 text-uppercase">{{ __('yp.products') }}</h6>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('vCard.products.create') }}" class="btn btn-primary radius-30 px-4">
                        <i class="bx bx-plus"></i> {{ __('yp.add_product') }}
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                <div class="text-white">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>{{ __('yp.product_name') }}</th>
                            <th>{{ __('yp.business_listing') }}</th>
                            <th>{{ __('yp.price') }}</th>
                            <th>{{ __('yp.status') }}</th>
                            <th>{{ __('yp.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        <img src="{{ $product->image1 ? Storage::url($product->image1) : asset('assets/images/yplogo.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $product->product_name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->businessListing->listing_title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <div
                                    class="badge rounded-pill {{ $product->status ? 'text-success bg-light-success' : 'text-danger bg-light-danger' }} p-2 text-uppercase px-3">
                                    <i class="bx bxs-circle me-1"></i>{{ $product->status ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('vCard.products.edit', $product->id) }}"
                                        class="text-primary bg-light-primary border-0"><i class="bx bxs-edit"></i></a>
                                    <form action="{{ route('vCard.products.destroy', $product->id) }}" method="POST"
                                        class="ms-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger bg-light-danger border-0"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ __('yp.no_products_found') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection