@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.astrology.section-G1.AstroG1-hero-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-featured-in')
    @include('pages.astrology.section-G1.AstroG1-what-is-astrology')
    @include('pages.astrology.section-G1.AstroG1-what-you-will-learn')
    @include('pages.astrology.section-G1.AstroG1-how-graphology-works', ['bonusCtaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-certificate-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-workshop-snapshots', [
        'images' => [
            'image/astrology%20assests/snapshot%202.png',
            'image/astrology%20assests/snapshot%204.png',
            'image/astrology%20assests/snapshot%206.png',
            'image/astrology%20assests/snapshot%207.png',
        ]
    ])
    @include('pages.astrology.section-G1.AstroG1-graphology-steps')
    @include('pages.astrology.section-G1.AstroG1-who-uses-graphology')
    @include('pages.astrology.section-G1.AstroG1-video-testimonials')
    @include('pages.astrology.section-G1.AstroG1-about-institute')
    @include('pages.astrology.section-G1.AstroG1-meet-trainer', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-certified-graphologist', [
        'images' => [
            'image/astrology%20assests/certified%20g1.webp',
            'image/astrology%20assests/certified%20g%202.webp',
            'image/astrology%20assests/certified%20g%203.webp',
            'image/astrology%20assests/certified%20g%204.webp',
            'image/astrology%20assests/certified%20g%206.webp',
            'image/astrology%20assests/certified%20g%207.webp',
        ]
    ])
    @include('pages.astrology.section-G1.AstroG1-news-article')
    @include('pages.astrology.section-G1.AstroG1-testimonials')
    @include('pages.astrology.section-G1.AstroG1-value-stack', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-faq')
    @include('pages.astrology.section-G1.AstroG1-end-section', ['ctaHref' => url('/astrology-checkout')])
    @include('pages.astrology.section-G1.AstroG1-sticky-bar', ['ctaHref' => url('/astrology-checkout')])
@endsection
