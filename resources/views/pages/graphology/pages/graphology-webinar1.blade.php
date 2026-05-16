@extends('layouts.app')

@push('head')
    <link rel="preload" as="image"
          href="{{ asset('image/astrology%20assests/astro-webp/convo%201.webp') }}"
          fetchpriority="high">
@endpush

@section('title', 'All India Institute of Occult Science')
@section('description', 'Graphology Webinar - Your platform for webinars and live events.')

@section('content')

   @include('pages.graphology.section_g1.grapho-hero-section', ['ctaHref' => url('/graphology-checkout'), 'date' => optional($webinar)->event_date ?? 'Wed, 20th May, 2026', 'time' => optional($webinar)->event_time ?? '11:00 AM to 1:00 PM'])
    @include('pages.graphology.section_g1.Grapho-featured-in')
    @include('pages.graphology.section_g1.Grapho-what-you-will-learn', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section_g1.Grapho-bonus', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section_g1.Grapho-workshop-snapshots')
    @include('pages.graphology.section_g1.Grapho-who-uses-graphology')
    @include('pages.graphology.section_g1.Grapho-meet-trainer', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section_g1.Grapho-video-testimonials')
    @include('pages.graphology.section_g1.Grapho-certified-graphologist')
    @include('pages.graphology.section_g1.Grapho-testimonials')
    @include('pages.astrology.sections.Astro-podcast')
    @include('pages.graphology.section_g1.Grapho-faq')
    @include('pages.graphology.section_g1.Grapho-end-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section_g1.Grapho-sticky-bar', ['ctaHref' => url('/graphology-checkout')])
@endsection
