<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', config('site.name') . ' — visa assistance, flight and hotel bookings, study abroad support and holiday packages. ' . config('site.tagline'))">
    <meta name="keywords" content="travel agency, visa assistance, study abroad, flight booking, hotel reservation, holiday packages, Dubai tour, Nigeria travel agent">
    <meta name="robots" content="max-image-preview:large">
    <meta property="og:title" content="@yield('title', 'Home') | {{ config('site.name') }}">
    <meta property="og:description" content="{{ config('site.tagline') }}">
    <meta property="og:image" content="{{ asset('website/images/slide-bg1.jpg') }}">
    <!-- Page Title -->
    <title>@yield('title', 'Home') | {{ config('site.name') }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/images/favicon.png') }}">
    <!-- Bootstrap Css Link -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('website/css/swiper-bundle.min.css') }}">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{ asset('website/css/mousecursor.css') }}">
    <!-- Magnific Popup Css File -->
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}">
    <!-- Font Awesome 7.1.0 (same version as website/css/all.min.css). Loaded from the CDN because the
         template's local webfonts folder is missing. If you add public/website/webfonts, you can switch back. -->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/all.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{ asset('website/css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Animation On Scroll Css File -->
    <link href="{{ asset('website/css/aos.css') }}" rel="stylesheet">
    <!-- Google Fonts: Lexend (headings), Onest (body), Great Vibes (signature) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Onest:wght@100..900&family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Main Custom Css -->
    <link href="{{ asset('website/css/custom.css') }}" rel="stylesheet" media="screen">
    <!-- Victory Journey Masters additions -->
    <link href="{{ asset('website/css/victory.css') }}" rel="stylesheet" media="screen">
</head>
<body>
    @php
        $navServices = config('site.services');
        $isActive = fn (...$names) => request()->routeIs(...$names) ? 'active' : '';
    @endphp
    <!-- Header Start -->
    <header id="sisf-page-header" class="sisf-main-header sis-br-radius mt-3 sisf-standerd-header">
        <div id="sisf-page-header-inner" class="sisf-skin--light position-relative d-flex align-items-center">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand sisf-header-logo-link mobile-block" href="{{ route('home') }}">
                    <img src="{{ asset('website/images/logo-victory.svg') }}" alt="{{ config('site.name') }}">
                </a>
                <!-- Logo End -->
                <div class="sisf-centered-header-wrapper sisf--header d-flex justify-content-between align-items-center">
                    <!-- Logo Start -->
                    <a class="navbar-brand sisf-header-logo-link" href="{{ route('home') }}">
                        <img src="{{ asset('website/images/logo-victory.svg') }}" alt="{{ config('site.name') }}">
                    </a>
                    <!-- Logo End -->
                    <nav class="navbar navbar-expand-lg ms-auto me-4">
                        <!-- Main Menu Start -->
                        <div class="collapse navbar-collapse sis-main-menu">
                            <div class="nav-menu-wrapper">
                                <ul class="navbar-nav" id="menu">
                                    <li class="nav-item {{ $isActive('home') }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                                    <li class="nav-item {{ $isActive('web.about') }}"><a class="nav-link" href="{{ route('web.about') }}">About Us</a></li>
                                    <li class="nav-item submenu {{ $isActive('web.services', 'web.service') }}">
                                        <a class="nav-link" href="{{ route('web.services') }}">Services<i class="fas fa-chevron-down custom-toggle-icon ps-2"></i></a>
                                        <ul class="sub-menu">
                                            @foreach ($navServices as $item)
                                                <li class="nav-item"><a class="nav-link" href="{{ route('web.service', $item['slug']) }}">{{ $item['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item {{ $isActive('web.destinations', 'web.destination') }}"><a class="nav-link" href="{{ route('web.destinations') }}">Destinations</a></li>
                                    <li class="nav-item {{ $isActive('web.tours', 'web.tour') }}"><a class="nav-link" href="{{ route('web.tours') }}">Tours</a></li>
                                    <li class="nav-item submenu {{ $isActive('web.blog', 'web.post', 'web.faq', 'web.gallery', 'web.testimonials') }}">
                                        <a class="nav-link" href="#">More<i class="fas fa-chevron-down custom-toggle-icon ps-2"></i></a>
                                        <ul class="sub-menu">
                                            <li class="nav-item"><a class="nav-link" href="{{ route('web.blog') }}">Travel Guides</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('web.faq') }}">FAQs</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('web.gallery') }}">Gallery</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('web.testimonials') }}">Testimonials</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item {{ $isActive('web.contact') }}"><a class="nav-link" href="{{ route('web.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Main Menu End -->
                    </nav>
                    <div class="sisf-widget-holder sisf--two d-flex align-items-center">
                        <div class="header-btn">
                            <a href="{{ route('web.contact') }}" class="sis-btn-default">Start Your Journey<i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
                <div class="responsive-menu"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
