<!DOCTYPE html>
<html lang="en">
<head>
    {{-- charset MUST be first for correct parsing --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Google Tag Manager (async, won't block render) --}}
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KLJ823HM');</script>

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', '')">
    <link rel="icon" type="image/x-icon" href="{{ asset('image/astrology%20assests/favicon.ico') }}">

    {{-- Resource hints: establish connections early for external domains --}}
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.youtube.com">
    <link rel="preconnect" href="https://i.ytimg.com" crossorigin>
    <link rel="preconnect" href="https://chat.whatsapp.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    {{-- Page-specific preloads (hero images etc.) --}}
    @stack('head')

    {{-- Critical CSS + JS via Vite (has modulepreload built in) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Google Tag Manager (noscript fallback) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLJ823HM"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @yield('content')
</body>
</html>
