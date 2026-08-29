@extends('layouts.app')

@section('title', 'About Us – All India Institute of Occult Science')
@section('description', 'All India Institute of Occult Science (AIIOS), founded by Gurudev Shrie, has been dedicated to spreading knowledge in occult sciences since 2004.')

@section('content')

<x-ui.navbar />

<div style="font-family:'Open Sans',sans-serif;">

    {{-- 1. Hero --}}
    @include('pages.about-us-sections.hero')

    {{-- 2. About --}}
    @include('pages.about-us-sections.about')

    {{-- 2b. Mission & Vision --}}
    @include('pages.about-us-sections.mission-vision')

    {{-- 3. Gurudev Shrie --}}
    @include('pages.about-us-sections.gurudev')

    {{-- 4. Stats Bar --}}
    @include('pages.about-us-sections.stats-bar')

    {{-- 5. Certificate --}}
    @include('pages.about-us-sections.certificate')

    {{-- 6. Meet Our Faculty --}}
    @include('pages.about-us-sections.faculty')

    {{-- 7. What Our Students Say --}}
    @include('pages.graphology.webinar4-sections.reviews')

    {{-- 8. FAQ --}}
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
