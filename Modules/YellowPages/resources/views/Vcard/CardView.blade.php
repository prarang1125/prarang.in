<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="card" style="max-width: 600px;">
            <div class="card-body">
                <!-- Banner -->
                @if ($vcard->banner_img)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $vcard->banner_img) }}" alt="Cover Photo" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: auto;">
                    </div>
                @endif

                <!-- Logo -->
                @if ($vcard->logo)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $vcard->logo) }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                    </div>
                @endif

                <!-- Main Information -->
                <p><strong>Title:</strong> {{ $vcard->title }}</p>
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
</body>
</html>
