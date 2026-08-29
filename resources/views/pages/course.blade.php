@extends('layouts.app')

@section('title', 'Graphology Course Online with Certificate – All India Institute of Occult Science')
@section('description', 'Learn graphology online with a practical, certificate-backed course from All India Institute of Occult Science.')

@section('content')

<x-ui.navbar />

@php
    $ctaHref = url('/graphology-checkout');
    $date    = optional($webinar)->event_date ?? 'Wed, 20th May, 2026';
    $time    = trim(str_ireplace('IST', '', optional($webinar)->event_time ?? '11:00 AM to 1:00 PM'));
@endphp

<div style="font-family:'Open Sans',sans-serif;">

    {{-- 1. Hero --}}
    @include('pages.course-sections.hero', ['ctaHref' => $ctaHref, 'date' => $date, 'time' => $time])

    {{-- 2b. Built for Industry --}}
    @include('pages.course-sections.built-for-industry')

    {{-- 3. Why Graphology Is Valuable --}}
    @include('pages.course-sections.why-valuable')

    {{-- 4. What Will You Learn --}}
    @include('pages.graphology.webinar4-sections.skills-built', ['heading' => 'What Will You Learn ?'])

    {{-- 5. Certificate --}}
    @include('pages.course-sections.certificate', ['ctaHref' => $ctaHref])

    {{-- 6. Our Approach --}}
    @include('pages.course-sections.approach')

    {{-- 7. Trust Strip --}}
    @include('pages.course-sections.trust-strip')

    {{-- 8. Why Choose Our Graphology Course --}}
    @include('pages.course-sections.why-choose-us')

    {{-- 9. About Institute --}}
    @include('pages.graphology.webinar4-sections.about-institute')

    {{-- 10. What Our Students Say --}}
    @include('pages.graphology.webinar4-sections.reviews')

    {{-- 11. Watch Real Videos of Our Students Story --}}
    @include('pages.graphology.webinar4-sections.video-testimonials', ['heading' => 'Watch Real Videos of Our Students Story'])

    {{-- 12. FAQ --}}
    @include('pages.graphology.webinar4-sections.faq', [
        'title' => 'Frequently Asked Questions (FAQ)',
        'items' => [
            ['question' => 'What is Graphology and what will I learn to analyze?', 'answer' => 'Graphology is the study of handwriting to understand personality. You will learn to analyze slant, pressure, spacing, letter formation, and signatures to read traits like confidence, honesty, and emotional patterns.'],
            ['question' => 'How can Graphology be used in professional fields?', 'answer' => 'HR professionals, counsellors, psychologists, and coaches use Graphology to support hiring decisions, deepen client assessments, and add a practical, paid add-on service to their existing work.'],
            ['question' => 'What is Graphotherapy?', 'answer' => 'Graphotherapy is the next step after Graphology, where specific changes are suggested in a person\'s handwriting to help bring positive shifts in behaviour and mindset.'],
            ['question' => 'Can I identify criminal behavior through this course?', 'answer' => 'The course focuses on reading personality traits, stress signals, and honesty indicators from handwriting — the same signs used by HR teams and investigators, rather than definitive criminal profiling.'],
            ['question' => 'Will I receive a certificate for attending?', 'answer' => 'Yes, you receive a certificate after successful completion of the course, which is recognised and valuable across the world.'],
        ],
    ])

</div>

@endsection
