@extends('layouts.app')

@section('title', 'Graphology: A Powerful Tool for Personality Understanding – All India Institute of Occult Science')
@section('description', 'Learn how to 2-3X your salary through a practical graphology webinar. Join All India Institute of Occult Science.')

@push('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .font-open-sans{font-family:'Open Sans',sans-serif;}
        .font-playfair{font-family:'Playfair Display',serif;}
    </style>
@endpush

@section('content')

@php
    $ctaHref = url('/graphology-checkout');
    $date    = optional($webinar)->event_date ?? 'Wed, 20th May, 2026';
    $time    = optional($webinar)->event_time ?? '11:00 AM to 1:00 PM';
@endphp

<div style="font-family:'Open Sans',sans-serif;">

{{-- 1. Hero --}}
@include('pages.graphology.webinar4-sections.hero', ['ctaHref' => $ctaHref, 'date' => $date, 'time' => $time])

{{--  news --}}
@include('pages.graphology.webinar4-sections.news')

{{-- 2. Upcoming Webinar --}}
@include('pages.graphology.webinar4-sections.upcoming-webinar', ['ctaHref' => $ctaHref, 'date' => $date, 'time' => $time])



{{-- 4. For Professionals --}}
@include('pages.graphology.webinar4-sections.professionals')

{{-- 5. Dark Intro --}}
@include('pages.graphology.webinar4-sections.intro', ['ctaHref' => $ctaHref])

{{-- 3. Text Testimonials --}}
@include('pages.graphology.webinar4-sections.testimonials')

{{-- 6. Bonus Material --}}
@include('pages.graphology.webinar4-sections.bonus', ['ctaHref' => $ctaHref])

{{-- 7. Income Boost --}}
@include('pages.graphology.webinar4-sections.income-boost')

<!-- {{-- 8. After This Webinar --}}
@include('pages.graphology.webinar4-sections.after-webinar', ['ctaHref' => $ctaHref]) -->

{{-- 9. Video Testimonials --}}
@include('pages.graphology.webinar4-sections.video-testimonials')

{{-- 10. Why This Webinar Is Practical --}}
@include('pages.graphology.webinar4-sections.why-practical')

{{-- 11. About Institute --}}
@include('pages.graphology.webinar4-sections.about-institute', ['ctaHref' => $ctaHref])

{{-- 12. Featured In --}}
@include('pages.graphology.webinar4-sections.featured-in')



{{-- 13. Meet Trainer --}}
@include('pages.graphology.webinar4-sections.meet-trainer', ['ctaHref' => $ctaHref])

{{-- 14. Certified Students --}}
@include('pages.graphology.webinar4-sections.certified-students')

{{-- 15. FAQ --}}
@include('pages.graphology.webinar4-sections.faq')

{{-- 16. End CTA --}}
@include('pages.graphology.webinar4-sections.end-section', ['ctaHref' => $ctaHref])

{{-- 16b. Explore full course gradient bar --}}
@include('pages.graphology.webinar4-sections.explore-course-bar', ['exploreHref' => url('/graphology-course-pay')])

{{-- 17. Sticky Bar --}}
@include('pages.graphology.webinar4-sections.sticky-bar', ['ctaHref' => $ctaHref])

</div>

@endsection
