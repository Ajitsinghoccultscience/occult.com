@extends('layouts.app')



@section('title', 'All India Institute of Occult Science')
@section('description', 'Astrology Webinar - Your platform for webinars and live events.')

@section('content')
      @include('pages.astrology.page-3-sections.herosection')
            @include('pages.astrology.page-3-sections.featured-media')


      @include('pages.astrology.page-3-sections.what-you-will-learn')
      @include('pages.astrology.page-3-sections.bouns')
      @include('pages.astrology.page-3-sections.snapshot')
      @include('pages.astrology.page-3-sections.register-webinar')
      @include('pages.astrology.page-3-sections.about')
      @include('pages.astrology.page-3-sections.testimonials')
      @include('pages.astrology.page-3-sections.reviews')
      @include('pages.astrology.page-3-sections.faq')
      @include('pages.astrology.page-3-sections.end-section')

@endsection
