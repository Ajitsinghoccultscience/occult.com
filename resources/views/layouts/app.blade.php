<!DOCTYPE html>
<html lang="en">
<head>
    {{-- charset MUST be first for correct parsing --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Early connection hints — fire before anything else --}}
    <link rel="preconnect" href="https://forms.zohopublic.in" crossorigin>
    <link rel="dns-prefetch" href="https://forms.zohopublic.in">

    {{-- CSS/JS first — render-blocking, so earlier discovery = faster FCP --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Inline critical CSS: hero backgrounds + marquee paint before app.css finishes --}}
    <style>
        .bg-astro-hero-gradient-red { background-image: linear-gradient(to bottom, #810202 0%, #630101 100%); }
        .bg-astro-hero-gradient     { background-image: linear-gradient(to bottom, #1C023F 0%, #5E3592 100%); }
        .bg-grapho-hero-gradient    { background-image: linear-gradient(to bottom, #04043A 0%, #202763 100%); }
        .bg-accent-cream { background-color: #f4e8ca; }
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-marquee { animation: marquee 25s linear infinite; }
        .text-white { color: #ffffff; }
        .section-px { padding-left: 1rem; padding-right: 1rem; }
        @media (min-width: 768px)  { .section-px { padding-left: 1.5rem;  padding-right: 1.5rem;  } }
        @media (min-width: 1024px) { .section-px { padding-left: 1.75rem; padding-right: 1.75rem; } }
        @media (min-width: 1280px) { .section-px { padding-left: 2rem;    padding-right: 2rem;    } }
    </style>

    {{-- Preload logo — first visible element in both hero sections --}}
    <link rel="preload" as="image"
          href="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}">

    {{-- Queue inits must be synchronous so component scripts can register before Vite bundle runs --}}
    <script>window.dataLayer = window.dataLayer || []; window.__carousels = [];</script>

    <title>@yield('title', 'All India Institute of Occult Science')</title>
    <meta name="description" content="@yield('description', '')">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon (1).ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon (1).ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon (1).ico') }}">

    {{-- Open Graph (WhatsApp / social sharing) --}}
    <meta property="og:title"       content="@yield('title', 'All India Institute of Occult Science')">
    <meta property="og:description" content="@yield('description', '')">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:site_name"   content="All India Institute of Occult Science">
    <meta name="twitter:card"       content="summary">
    <meta name="twitter:title"      content="@yield('title', 'All India Institute of Occult Science')">
    <meta name="twitter:description" content="@yield('description', '')">

    {{-- Resource hints --}}
    <link rel="dns-prefetch" href="https://www.youtube.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">

    {{-- Page-specific preloads (LCP images etc.) --}}
    @stack('head')
</head>
<body>
    @yield('content')

    @unless($hideFooter ?? false)
        <x-ui.footer />
    @endunless

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

    {{-- Page-specific scripts (video facade, countdown, etc.) --}}
    @stack('scripts')
</body>
</html>
