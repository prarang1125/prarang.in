@extends('yellowpages::layout.vcard.vcard')
@section('title', __('yp.edit_product'))
@section('content')
<div class="page-content">
    <div class="card radius-10">
        <div class="card-body">
            <h6 class="mb-3 text-uppercase">{{ __('yp.edit_product') }}</h6>
            <hr />
            <form action="{{ route('vCard.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('yp.select_listing') }}</label>
                        <select name="business_listing_id"
                            class="form-select @error('business_listing_id') is-invalid @enderror">
                            <option value="">{{ __('yp.select_listing') }}</option>
                            @foreach($businessListings as $listing)
                            <option value="{{ $listing->id }}" {{ (old('business_listing_id') ?? $product->
                                business_listing_id) == $listing->id ? 'selected' : '' }}>{{ $listing->listing_title }}
                            </option>
                            @endforeach
                        </select>
                        @error('business_listing_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __('yp.product_name') }}</label>
                        <input type="text" name="product_name"
                            class="form-control @error('product_name') is-invalid @enderror"
                            value="{{ old('product_name') ?? $product->product_name }}"
                            placeholder="{{ __('yp.product_name') }}">
                        @error('product_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('yp.price') }}</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') ?? $product->price }}" placeholder="{{ __('yp.price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __('yp.purchase_url') }}</label>
                        <input type="url" name="purchase_url"
                            class="form-control @error('purchase_url') is-invalid @enderror"
                            value="{{ old('purchase_url') ?? $product->purchase_url }}"
                            placeholder="https://example.com/buy">
                        @error('purchase_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('yp.description') }}</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3">{{ old('description') ?? $product->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    @for($i = 1; $i <= 3; $i++) <div class="col-md-4">
                        <label class="form-label">{{ __('yp.product_images') }} {{ $i }}</label>
                        <input type="file" name="image{{ $i }}"
                            class="form-control @error('image'.$i) is-invalid @enderror" accept="image/*"
                            onchange="previewImage(this, 'preview{{ $i }}')">
                        <div class="mt-2 text-center">
                            @php $imgPath = $product->{"image$i"}; @endphp
                            <img id="preview{{ $i }}"
                                src="{{ $imgPath ? Storage::url($imgPath) : asset('assets/images/yplogo.jpg') }}"
                                class="img-thumbnail" style="max-height: 150px; {{ $imgPath ? '' : 'display: none;' }}">
                        </div>
                        @error('image'.$i)
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                @endfor
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('vCard.products.index') }}" class="btn btn-secondary me-2 px-4 shadow-sm">{{ __('yp.back')
                }}</a>
            <button type="submit" class="btn btn-primary px-4 shadow-sm">{{ __('yp.product_updated_successfully')
                }}</button>
        </div>
        </form>
    </div>
</div>
</div>

<script>
    function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection