@extends('yellowpages::layout.vcard.vcard')
@section('title', $vcard->title)

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">{{ $vcard->title }}</h2>
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <!-- Banner -->
            @if ($vcard->banner_img)
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . $vcard->banner_img) }}" alt="Banner" class="img-fluid rounded">
                </div>
            @endif

            <!-- Logo -->
            @if ($vcard->logo)
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . $vcard->logo) }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                </div>
            @endif

            <!-- Main Information -->
            <p><strong>Slug:</strong> {{ $vcard->slug }}</p>
            <p><strong>Title:</strong> {{ $vcard->title }}</p>
            <p><strong>Subtitle:</strong> {{ $vcard->subtitle }}</p>
            <p><strong>Description:</strong> {{ $vcard->description }}</p>

            <!-- Dynamic Fields -->
            @if ($vcard->dynamicFields)
                <h5>Additional Information</h5>
                <ul class="list-group">
                    @foreach ($vcard->dynamicFields as $field)
                        <li class="list-group-item">
                            <strong>{{ $field->title }}:</strong> {{ $field->data }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
