@extends('layouts.app')

@php
    $hideFooter = true;
@endphp

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
    $time    = trim(str_ireplace('IST', '', optional($webinar)->event_time ?? '11:00 AM to 1:00 PM'));
@endphp

<div style="font-family:'Open Sans',sans-serif;">

{{-- 1. Hero --}}
@include('pages.graphology.webinar4-sections.hero', ['ctaHref' => $ctaHref, 'date' => $date, 'time' => $time])

{{--  news --}}
@include('pages.graphology.webinar4-sections.news')

{{-- 2. Skills you built with us --}}
@include('pages.graphology.webinar4-sections.skills-built')

{{-- 3. How This Skill Earns You Money --}}
@include('pages.graphology.webinar4-sections.income-boost')

{{-- 4. For Professionals --}}
@include('pages.graphology.webinar4-sections.professionals')

{{-- 5. Text Testimonials (Join 1200+...) --}}
@include('pages.graphology.webinar4-sections.testimonials')

{{-- 6. Bonus Material (What Stays With You After The Webinar) --}}
@include('pages.graphology.webinar4-sections.bonus', ['ctaHref' => $ctaHref])

{{-- 7. Meet Trainer --}}
@include('pages.graphology.webinar4-sections.meet-trainer', ['ctaHref' => $ctaHref])

{{-- 8. About Institute --}}
@include('pages.graphology.webinar4-sections.about-institute', ['ctaHref' => $ctaHref])

{{-- 9. Featured In --}}
@include('pages.graphology.webinar4-sections.featured-in')

{{-- 10. Video Testimonials --}}
@include('pages.graphology.webinar4-sections.video-testimonials')

{{-- 11. Reviews (See What Past Attendees Have To Say) --}}
@include('pages.graphology.webinar4-sections.reviews')

{{-- 12. Certified Students --}}
@include('pages.graphology.webinar4-sections.certified-students')

{{-- 13. FAQ --}}
@include('pages.graphology.webinar4-sections.faq')

{{-- 14. End CTA --}}
@include('pages.graphology.webinar4-sections.end-section', ['ctaHref' => $ctaHref])

{{-- 14b. Explore full course gradient bar --}}
@include('pages.graphology.webinar4-sections.explore-course-bar', ['exploreHref' => url('/graphology-course-pay')])

{{-- 15. Sticky Bar --}}
@include('pages.graphology.webinar4-sections.sticky-bar', ['ctaHref' => $ctaHref])

</div>

@endsection
