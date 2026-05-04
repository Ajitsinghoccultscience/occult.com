@extends('layouts.app')

@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
      @include('pages.astrology.page-3-sections.herosection', [
          'ctaHref' => url('/astrology-checkout'),
          'date'    => 'Sat, 9th May, 2026',
          'time'    => '2:00 PM to 4:00 PM',
      ])
      @include('pages.astrology.page-3-sections.featured-media')
      @include('pages.astrology.page-3-sections.what-you-will-learn', ['ctaHref' => url('/astrology-checkout')])
      @include('pages.astrology.page-3-sections.transformation')
      @include('pages.astrology.page-3-sections.bouns', ['ctaHref' => url('/astrology-checkout')])
      @include('pages.astrology.page-3-sections.1200+-student')

      @include('pages.astrology.page-3-sections.snapshot')
      @include('pages.astrology.page-3-sections.register-webinar')
      @include('pages.astrology.page-3-sections.about')
      @include('pages.astrology.page-3-sections.reviews')
      @include('pages.astrology.page-3-sections.video-testimonals')
         @include('pages.astrology.page-3-sections.gold')
      @include('pages.astrology.page-3-sections.podcast')
     
       @include('pages.astrology.page-3-sections.testimonials')
      @include('pages.astrology.page-3-sections.faq')
      @include('pages.astrology.page-3-sections.end-section', ['ctaHref' => url('/astrology-checkout')])
      @include('pages.astrology.page-3-sections.sticky-bar', ['ctaHref' => url('/astrology-checkout')])

@endsection
