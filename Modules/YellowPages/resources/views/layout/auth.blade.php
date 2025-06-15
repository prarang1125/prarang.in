<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'देश का पहला हिंदी येलोपेज़!')</title>

    <meta name="description" content="@yield('meta_og_description', 'देश के पहले हिंदी येलोपेज़ पर अपना वेबपेज बनाएं और अपना बिज़नेस कार्ड प्रिंट करें!')">
    <meta name="keywords" content="@yield('meta_keywords', 'yellow pages, local directory, businesses')">

    <!-- Open Graph Meta Tags for SEO & Social Sharing -->
    <meta property="og:locale" content="en_IN">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="article">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta property="og:site_name" content="Yellow Pages">
    <meta property="og:title" content="@yield('meta_og_title', 'देश का पहला हिंदी येलोपेज़!')">
    <meta property="og:description" content="@yield('meta_og_description', 'देश के पहले हिंदी येलोपेज़ पर अपना वेबपेज बनाएं और अपना बिज़नेस कार्ड प्रिंट करें!')">
    <meta property="og:image" content="@yield('meta_og_image', 'https://i.ibb.co/tpxh7Vcf/Lucknow-yp-1200-630-still.png')">
    <meta property="og:url" content="{{ url()->current() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
