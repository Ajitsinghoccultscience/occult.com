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

<x-ui.navbar />

@php
    $ctaHref = url('/graphology-checkout');
    $date    = optional($webinar)->event_date ?? 'Wed, 20th May, 2026';
    $time    = trim(str_ireplace('IST', '', optional($webinar)->event_time ?? '11:00 AM to 1:00 PM'));
@endphp

<div style="font-family:'Open Sans',sans-serif;">

{{-- 1. Hero Section --}}
@include('pages.graphology.webinar4-sections.hero-banner', ['ctaHref' => $ctaHref, 'date' => $date, 'time' => $time])

{{-- 2. For Professionals --}}
@include('pages.graphology.webinar4-sections.professionals')

{{-- 3. Skills you built with us --}}
@include('pages.graphology.webinar4-sections.skills-built')

{{-- 4. How this Skill Earns --}}
@include('pages.graphology.webinar4-sections.income-boost')

{{-- 5. Google Reviews --}}
@include('pages.graphology.webinar4-sections.reviews')

{{-- 5b. Video Reviews --}}
@include('pages.graphology.webinar4-sections.video-testimonials')

{{-- 6. Bonus --}}
@include('pages.graphology.webinar4-sections.bonus', ['ctaHref' => $ctaHref])

{{-- 7. Trainer --}}
@include('pages.graphology.webinar4-sections.meet-trainer', ['ctaHref' => $ctaHref])

{{-- 8. About Institute --}}
@include('pages.graphology.webinar4-sections.about-institute', ['ctaHref' => $ctaHref])

{{-- 9. Featured In --}}
@include('pages.graphology.webinar4-sections.featured-in')

{{-- Text Testimonials --}}
@include('pages.graphology.webinar4-sections.testimonials')

{{-- Certified Students --}}
@include('pages.graphology.webinar4-sections.certified-students')

{{-- FAQ --}}
@include('pages.graphology.webinar4-sections.faq')

{{-- Sticky Bar --}}
@include('pages.graphology.webinar4-sections.sticky-bar', ['ctaHref' => $ctaHref])

</div>

@endsection
