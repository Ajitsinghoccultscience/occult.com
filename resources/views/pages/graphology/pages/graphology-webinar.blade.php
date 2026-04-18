@extends('layouts.app')

@section('title', 'All India Institute of Occult Science')
@section('description', 'Graphology Webinar - Your platform for webinars and live events.')

@section('content')
    @include('pages.graphology.sections.hero-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.featured-in')
    @include('pages.graphology.sections.what-is-graphology', ['image' => 'images/assets desktop/DESKTOP WHAT IS GRAPHOLOGY.webp'])
    <!-- @include('pages.graphology.sections.card-with-image-left', [
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
    @include('pages.graphology.sections.what-you-will-learn')
    @include('pages.graphology.sections.how-graphology-works', ['bonusCtaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.certificate-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.workshop-snapshots', ['images' => ['images/12.webp', 'images/13.webp']])
    @include('pages.graphology.sections.graphology-steps')
    @include('pages.graphology.sections.who-uses-graphology')
    @include('pages.graphology.sections.video-testimonials')
    @include('pages.graphology.sections.about-institute')
    @include('pages.graphology.sections.meet-trainer', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.certified-graphologist')
    @include('pages.graphology.sections.news-article')
    @include('pages.graphology.sections.testimonials')
    @include('pages.graphology.sections.value-stack', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.faq')
    @include('pages.graphology.sections.end-section', ['ctaHref' => url('/graphology-checkout')])
    @include('pages.graphology.sections.sticky-bar', ['ctaHref' => url('/graphology-checkout')])
@endsection
