<!DOCTYPE html>
<html lang="en">
<head>
    {{-- charset MUST be first for correct parsing --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Queue inits must be synchronous so component scripts can register before Vite bundle runs --}}
    <script>window.dataLayer = window.dataLayer || []; window.__carousels = [];</script>

    <title>@yield('title', 'All India Institute of Occult Science')</title>
    <meta name="description" content="@yield('description', '')">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Open Graph (WhatsApp / social sharing) --}}
    <meta property="og:title"       content="@yield('title', 'All India Institute of Occult Science')">
    <meta property="og:description" content="@yield('description', '')">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:site_name"   content="All India Institute of Occult Science">
    <meta name="twitter:card"       content="summary">
    <meta name="twitter:title"      content="@yield('title', 'All India Institute of Occult Science')">
    <meta name="twitter:description" content="@yield('description', '')">

    {{-- Resource hints: establish connections early for external domains --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.youtube.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=optional"></noscript>

    {{-- Page-specific preloads (hero images etc.) --}}
    @stack('head')

    {{-- Critical CSS + JS via Vite (has modulepreload built in) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')

    {{-- GTM loads after window.load so it doesn't block LCP/TBT --}}
    <script>
    window.addEventListener('load', function () {
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KLJ823HM');
    });
    </script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLJ823HM"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</body>
</html>
