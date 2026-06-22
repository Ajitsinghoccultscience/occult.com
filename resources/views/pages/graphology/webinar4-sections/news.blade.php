@php
    $base  = 'images/media';
    $logos = [
        ['file' => 'Zee_news.svg 1.webp',                                                                     'alt' => 'Zee News'],
        ['file' => 'logo_daily_hunt 1.webp',                                                                   'alt' => 'Dailyhunt'],
        ['file' => 'The_Times_of_India_Logo 1.webp',                                                           'alt' => 'Times of India'],
        ['file' => 'india.webp',                                                                               'alt' => 'India.com'],
        ['file' => 'TV9TeluguLogo-removebg-preview 1.webp',                                                    'alt' => 'TV9'],
        ['file' => 'Zee_Kannada_News 1.webp',                                                                  'alt' => 'Zee Kannada News'],
        ['file' => 'msn.webp',                                                                                 'alt' => 'MSN'],
        ['file' => 'newindianexpress_2024-01_a61ffc16-2665-48df-a970-53cb4a6acbc2_TNIE_logo (1) 1.webp',       'alt' => 'New Indian Express'],
    ];
@endphp

{{-- ═══════════════════════════════════
     NEWS / AS-SEEN-IN STRIP
════════════════════════════════════ --}}
<section class="max-w-[1290px] mx-auto my-2  ">
    <div class="section-px overflow-hidden rounded-md shadow-md py-3 sm:py-4  mx-4 md:mx-3">

    <div class="flex w-max animate-marquee items-center gap-8 sm:gap-12 md:gap-16">

        {{-- Render twice for seamless infinite loop --}}
        @foreach(array_merge($logos, $logos) as $logo)

            <div class="shrink-0 flex items-center justify-center">
                <img src="{{ asset($base . '/' . rawurlencode($logo['file'])) }}"
                     alt="{{ $logo['alt'] }}"
                     class="h-8 sm:h-10 md:h-12 w-auto object-contain"
                     loading="lazy">
            </div>

            <span class="shrink-0 w-1 h-1 rounded-full " aria-hidden="true"></span>

        @endforeach

    </div>

    </div>
</section>
