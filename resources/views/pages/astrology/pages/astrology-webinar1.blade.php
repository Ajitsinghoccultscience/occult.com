@extends('layouts.app')

@push('head')
    {{-- Preload LCP hero image so it loads as early as possible --}}
    <link rel="preload" as="image"
          href="{{ asset('image/astrology%20assests/hero%20section.webp') }}"
          fetchpriority="high">
@endpush

@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.astrology.section-G1.Astro-hero-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.Astro-featured-in')
    @include('pages.astrology.section-G1.Astro-what-you-will-learn', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.Astro-bonus', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.Astro-workshop-snapshots')
    @include('pages.astrology.section-G1.Astro-who-uses-graphology')
    @include('pages.astrology.section-G1.Astro-meet-trainer', ['ctaHref' => url('/astrology-checkout')])

    @include('pages.astrology.section-G1.Astro-video-testimonials')
    @include('pages.astrology.section-G1.Astro-certified-graphologist')
    @include('pages.astrology.section-G1.Astro-podcast')
    @include('pages.astrology.section-G1.Astro-testimonials')

    @include('pages.astrology.section-G1.Astro-faq')
    @include('pages.astrology.section-G1.Astro-end-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.Astro-sticky-bar', ['ctaHref' => url('/astrology-checkout')])
@endsection
