<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token()}}">
	<meta charset="UTF-8">    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Yellow Pages')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:site_name" content="{{ $post['siteName'] ?? 'Prarang' }}" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $post['title'] ?? 'Default Title' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ $post['imageUrl'] ?? 'default-image-url.jpg' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ $post['description'] ?? 'Default description for the post.' }}" />
	<!--favicon-->
	{{-- <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" /> --}}
	<!--plugins-->
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    {{-- <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" /> --}}
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom/login.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom/ckeditor.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/ckeditor/contents.css') }}"> --}}
	{{-- <title>Prarang Admin Home</title> --}}
    <title>@yield('title', 'Login')</title>

</head>
<body>
