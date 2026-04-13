@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Graphology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.graphology.section-G1.Graph1-hero-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-featured-in')
    @include('pages.graphology.section-G1.Graph1-what-is-graphology', ['image' => 'images/assets desktop/DESKTOP WHAT IS GRAPHOLOGY.webp'])
    <!-- @include('pages.graphology.section-G1.Graph1-card-with-image-left', [
        'image' => 'images/assets desktop/Artboard 1 copy.webp',
        'title' => "Who Burglarized Grandma Bessie's Home?",
        'description' => "After the death of her husband, Bessie Ostler, 78 years old, was living alone for the first time in almost fifty years. Because she had poor hearing and was aware of rising crime, Bessie decided that, even though it was expensive, she would feel more secure having an alarm system installed in her home and a security company keeping an eye on her. She soon signed up with High-Tech Armed Patrol Security Company. They had an alarm system installed and then added her home onto one of their patrol routes, Route 13 of the Greenfield area. Bessie immediately felt much safer. Some months later, Bessie became a grandmother for the eighth time and decided to go visit her newest relative the following weekend. She alerted High-Tech Security that she would be away. When Bessie returned from her trip, she was horrified to discover that she had been burglarized while she was gone.",
        'quote' => "For a normal person it's just handwriting, but as a Graphologist You Can Decode the clues hidden in handwriting — unmask the burglar with precision analysis.",
        'bullets' => [
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
        ],
        'evidenceImages' => [
            ['name' => 'Davis',   'image' => 'images/assets desktop/1.svg'],
            ['name' => 'Nicholas','image' => 'images/assets desktop/2.svg'],
            ['name' => 'Carter',  'image' => 'images/assets desktop/3.svg'],
        ],
        'footnote' => '(Lorem ipsum dolor sit amet consectetur. Id amet sed urna habitant enim sit pulvinar. Aliquam consequat sagittis fusce quis sed.)',
    ]) -->
    @include('pages.graphology.section-G1.Graph1-what-you-will-learn')
    @include('pages.graphology.section-G1.Graph1-how-graphology-works', ['bonusCtaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-certificate-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-workshop-snapshots', ['images' => ['images/12.webp', 'images/13.webp']])
    @include('pages.graphology.section-G1.Graph1-graphology-steps')
    @include('pages.graphology.section-G1.Graph1-who-uses-graphology')
    @include('pages.graphology.section-G1.Graph1-video-testimonials')
    @include('pages.graphology.section-G1.Graph1-about-institute')
    @include('pages.graphology.section-G1.Graph1-meet-trainer', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-certified-graphologist')
    @include('pages.graphology.section-G1.Graph1-news-article')
    @include('pages.graphology.section-G1.Graph1-testimonials')
    @include('pages.graphology.section-G1.Graph1-value-stack', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-faq')
    @include('pages.graphology.section-G1.Graph1-end-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.section-G1.Graph1-sticky-bar', ['ctaHref' => url('/graphology-checkout')])
@endsection
