@extends('layouts.app')

@push('head')
    {{-- Preload LCP hero image so it loads as early as possible --}}
    <link rel="preload" as="image"
          href="{{ asset('image/astrology%20assests/hero%20section.png') }}"
          fetchpriority="high">
@endpush

@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.astrology.sections.Astro-hero-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-featured-in')
    @include('pages.astrology.sections.Astro-what-you-will-learn', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-bonus', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-workshop-snapshots')
    @include('pages.astrology.sections.Astro-who-uses-graphology')
    @include('pages.astrology.sections.Astro-video-testimonials')
    @include('pages.astrology.sections.Astro-certified-graphologist')
    @include('pages.astrology.sections.Astro-testimonials')
    @include('pages.astrology.sections.Astro-podcast')
    @include('pages.astrology.sections.Astro-meet-trainer', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-faq')
    @include('pages.astrology.sections.Astro-end-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-sticky-bar', ['ctaHref' => url('/astrology-checkout')])
@endsection
