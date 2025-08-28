<?php
// resources/views/components/layout.blade.php
?>

@props(['title' => 'Home', 'description' => '', 'keywords' => '', 'ogImage' => null, 'canonical' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>{{ $title }} - {{ config('app.name', 'DevDiaries') }}</title>
    <meta name="description"
        content="{{ $description ?: 'Discover the latest fashion trends and must-have styles at our premium fashion store.' }}">
    <meta name="keywords" content="{{ $keywords ?: 'fashion, clothing, style, trends, shopping' }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ config('app.name') }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $canonical ?: request()->url() }}">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }} - {{ config('app.name') }}">
    <meta property="og:description"
        content="{{ $description ?: 'Discover the latest fashion trends and must-have styles.' }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    @if ($ogImage)
        <meta property="og:image" content="{{ asset($ogImage) }}">
        <meta property="og:image:alt" content="{{ $title }}">
    @endif

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }} - {{ config('app.name') }}">
    <meta name="twitter:description"
        content="{{ $description ?: 'Discover the latest fashion trends and must-have styles.' }}">
    @if ($ogImage)
        <meta name="twitter:image" content="{{ asset($ogImage) }}">
    @endif


    <meta charset="utf-8">
    <meta name="author" content="Shahriyar Tarnasi">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fonts/font-icons.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon-circle.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon-circle.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon-circle.png') }}">

</head>

<body class="{{ $attributes->get('body-class', '') }}">
    {{-- Skip to main content for accessibility --}}
    <a class="skip-link screen-reader-text" href="#main">{{ __('Skip to main content') }}</a>

    <main id="main" role="main">
        {{ $slot }}
    </main>

    {{-- JavaScript --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    @stack('scripts')
    @stack('modals')

    <!-- Javascript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/lazysize.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/count-down.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/multiple-modal.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/sibforms.js" defer></script>
    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
        window.LOCALE = 'en';
        window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE =
            "The information provided is invalid. Please review the field format and try again.";

        window.REQUIRED_ERROR_MESSAGE = "This field cannot be left blank. ";

        window.GENERIC_INVALID_MESSAGE =
            "The information provided is invalid. Please review the field format and try again.";

        window.translation = {
            common: {
                selectedList: '{quantity} list selected',
                selectedLists: '{quantity} lists selected'
            }
        };

        var AUTOHIDE = Boolean(0);
    </script>

    {{-- Structured Data for SEO --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{ config('app.name') }}",
        "url": "{{ config('app.url') }}",
        "description": "{{ $description ?: 'Premium fashion store with the latest trends' }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ config('app.url') }}/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    {{-- Google Analytics or other tracking scripts --}}
    @if (config('services.google_analytics.id'))
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics.id') }}');
        </script>
    @endif
</body>

</html>
