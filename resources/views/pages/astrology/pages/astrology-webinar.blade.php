@extends('layouts.app')

@push('head')
    <link rel="preload" as="image"
          href="{{ asset('image/astrology%20assests/astro-webp/convo%201.webp') }}"
          fetchpriority="high">
@endpush

@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.astrology.sections.Astro-hero-section', ['ctaHref' => url('/astrology-checkout'), 'date' => optional($webinar)->event_date ?? 'Sat, 16th May, 2026', 'time' => optional($webinar)->event_time ?? '2:00 PM to 4:00 PM'])
    @include('pages.astrology.sections.Astro-featured-in')
    @include('pages.astrology.sections.Astro-what-you-will-learn', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-bonus', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-workshop-snapshots')
    @include('pages.astrology.sections.Astro-who-uses-graphology')
    @include('pages.astrology.sections.Astro-meet-trainer', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-video-testimonials')
    @include('pages.astrology.sections.Astro-certified-graphologist')
    @include('pages.astrology.sections.Astro-podcast')
    @include('pages.astrology.sections.Astro-testimonials')
    @include('pages.astrology.sections.Astro-faq')
    @include('pages.astrology.sections.Astro-end-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.sections.Astro-sticky-bar', ['ctaHref' => url('/astrology-checkout')])
@endsection
