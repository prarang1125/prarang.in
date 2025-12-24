<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $portal->city_name ?? 'Prarang' }} Portal | Prarang" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $portal->city_name ?? 'Default Title' }} Portal | Prarang" />
    <meta property="og:image" content="{{ asset('assets/images/portal_meta_image.webp') }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $portal->city_slogan ?? '' }}" />

    <title>{{ $portal->city_name ?? '' }} Portal | Prarang</title>

    <!-- UI/UX and Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="{{ asset('assets/portal/css/style.css') }}" id="lsvr-townpress-demo-style-css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/portal/css/stylec.css') }}" id="lsvr-townpress-demo-style-css" media="all"
        rel="stylesheet" type="text/css" />

    <link
        href="//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C400italic%2C600%2C600italic%2C700%2C700italic&amp;ver=6.4.5"
        id="lsvr-townpress-google-fonts-css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {!! $portal->header_scripts ?? '' !!}
</head>

<body
    class="home page-template page-template-page-templates page-template-not-boxed page-template-page-templatesnot-boxed-php page page-id-207 wp"
    data-rsssl="1">
    {{ $slot }}

    {!! $portal->footer_scripts ?? '' !!}
</body>

</html>
