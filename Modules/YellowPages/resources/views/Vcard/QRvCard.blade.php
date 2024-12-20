@extends('yellowpages::layout.vcard.vcard')
@section('title', 'QR Code for VCard')
@section('content')

<div class="container my-5">
    <h2 class="d-flex justify-content-center align-items-center" style="height: 10vh;">QR Builder</h2>

    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
      
        <!-- QR Code Section -->
        <div class="text-center me-5 border " style="width: 45%; padding: 20px;">

            <!-- Heading for QR Code Section -->
            <h2 class="mb-2">QR Code for VCard</h2>
            <div class="mt-4">
                {!! $qrCode !!}
            </div>
        </div>

        <!-- Helpful Links Section -->
        <div class="text-start border " style="width: 45%; padding: 20px;">
            <!-- Heading for Helpful Links Section -->
            <h2 class="mb-2">Helpful Links</h2>
            <div class="mt-4">
                <ul class="list-unstyled">
                    {{-- <li>
                        <a href="#" class="d-flex align-items-center text-decoration-none">
                            <span class="me-3"><i class="fas fa-edit text-primary"></i></span>
                            <span style="font-size: 1.2rem;">Edit VCard</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="#" class="d-flex align-items-center text-decoration-none mt-2">
                            <span class="me-3"><i class="fas fa-download text-secondary"></i></span>
                            <span style="font-size: 1.2rem;">Download QR Code</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex align-items-center text-decoration-none mt-2">
                            <span class="me-3"><i class="fas fa-eye text-success"></i></span>
                            <span style="font-size: 1.2rem;">Live Preview</span>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>

@endsection
