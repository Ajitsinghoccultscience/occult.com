@extends('layouts.app')

@push('head')
    <link rel="preload" as="image"
          href="{{ asset('image/astrology%20assests/astro-webp/convo%201.webp') }}"
          fetchpriority="high">
@endpush

@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('direct-admission.astrology-sections.herosection', ['ctaHref' => 'https://www.occultscience.in/payment-page/'])
    @include('direct-admission.astrology-sections.featured-media')
    @include('direct-admission.astrology-sections.about-institute')
    @include('direct-admission.astrology-sections.iso-certified', ['ctaHref' => 'https://www.occultscience.in/payment-page/'])
    {{-- @include('direct-admission.astrology-sections.curriculum') --}}
    @include('direct-admission.astrology-sections.certification', ['ctaHref' => 'https://www.occultscience.in/payment-page/'])
    <!-- @include('direct-admission.astrology-sections.upcoming-batches', ['ctaHref' => 'https://www.occultscience.in/payment-page/']) -->
    @include('direct-admission.astrology-sections.mentors')
    <!-- @include('direct-admission.astrology-sections.life-after-course') -->




    @include('direct-admission.astrology-sections.who-is-this-for')
    <!-- @include('direct-admission.astrology-sections.certified-astrologers') -->
    <!-- @include('direct-admission.astrology-sections.why-choose') -->
    @include('direct-admission.astrology-sections.journey-timeline')
    @include('direct-admission.astrology-sections.honoured-moments')
    <!-- @include('direct-admission.astrology-sections.gold-medalists') -->
    @include('direct-admission.astrology-sections.news-coverage')
    <!-- @include('direct-admission.astrology-sections.podcast') -->
    @include('direct-admission.astrology-sections.testimonials')
    <!-- @include('direct-admission.astrology-sections.faq') -->
    @include('direct-admission.astrology-sections.sticky-bar', (isset($offer) && $offer) ? array_filter([
        'courseName'  => $offer['courseName'],
        'enrolled'    => $offer['enrolled'],
        'rating'      => $offer['rating'],
        'seats'       => $offer['seats'],
        'price'        => $offer['price'],
        'oldPrice'     => $offer['oldPrice'],
        'discount'     => $offer['discount'],
        'timerMinutes' => $offer['timerMinutes'],
        'timerKey'     => 'astro_offer_' . $offer['slug'] . '_' . $offer['timerMinutes'] . '_' . $offer['updatedAt'],
    ], fn($v) => $v !== null) : [])
@endsection
