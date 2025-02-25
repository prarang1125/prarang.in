<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token()}}">
	<meta charset="UTF-8">    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', 'Yellow Pages - Find Businesses & Services')</title>
    
    <meta name="description" content="@yield('meta_description', 'Discover local businesses, services, and more.')">
    <meta name="keywords" content="@yield('meta_keywords', 'yellow pages, local directory, businesses')">
    
    <meta property="og:locale" content="en_IN" />
    <meta name="robots" content="index, follow" />
    <meta property="og:type" content="article" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:site_name" content="Yellow Pages"/>

    <meta property="og:title" content="@yield('meta_og_title', 'Yellow Pages - Business Directory')">
    <meta property="og:description" content="@yield('meta_og_description', 'Find the best businesses and services near you.')">
    <meta property="og:image" content="@yield('meta_og_image', asset('assets/images/yp_logo_img.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
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
    @livewireStyles
</head>
<body>
