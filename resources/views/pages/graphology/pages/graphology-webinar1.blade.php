@extends('layouts.app')

@section('title', 'All India Institute of Occult Science')
@section('description', 'Graphology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.graphology.Section-G1.Grapho-hero-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.Section-G1.Grapho-featured-in')
    @include('pages.graphology.Section-G1.Grapho-what-you-will-learn', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.Section-G1.Grapho-bonus', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.Section-G1.Grapho-workshop-snapshots')
    @include('pages.graphology.Section-G1.Grapho-who-uses-graphology')
    @include('pages.graphology.Section-G1.Grapho-meet-trainer', ['ctaHref' => url('/graphology-checkout')])

    @include('pages.graphology.Section-G1.Grapho-video-testimonials')
    @include('pages.graphology.Section-G1.Grapho-certified-graphologist')
        @include('pages.graphology.Section-G1.Grapho-testimonials')

    @include('pages.astrology.sections.Astro-podcast')

    @include('pages.graphology.Section-G1.Grapho-faq')
    @include('pages.graphology.Section-G1.Grapho-end-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.Section-G1.Grapho-sticky-bar', ['ctaHref' => url('/graphology-checkout')])
@endsection
