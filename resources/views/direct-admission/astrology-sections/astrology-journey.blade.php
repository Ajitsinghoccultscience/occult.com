@props([
    'title'         => 'Start Your Journey Today',
    'subtitle'      => 'Grow Personally & Financially',
    'chartImage'    => '/images/direct-admission/graph.png',
    'ctaHref'       => 'https://www.occultscience.in/payment-page/',
    'bullets'       => [
        '100% placement guarantee - start your career with us just after finishing your course.',
        'Start earning from real consultations on our platform from day one. We also host daily meetings to make you fully market-ready and help you improve your skills.',
        'As you gain experience, your earnings start growing, just like 95,000+ students who have already scaled their income.',
        'Consult from anywhere, anytime on your own flexible timings.',
        'Get featured on platforms like Zee News, Aaj Tak, and Times Now. So, while you\'re earning, you\'re also becoming a recognized name in the industry.',
    ],
    'mobileBullets' => [
        'Start offering basic Astrology consultations',
        'Build a career by guiding others',
        'Work from anywhere, anytime',
        'Earn as your skills grow',
        'Gain financial freedom with purpose',
    ],
])

@php
    $chartSrc = asset(implode('/', array_map('rawurlencode', explode('/', $chartImage))));
@endphp
<!-- C:\Users\pandat\Desktop\Office\occult.com\occult.com\public\images\direct-admission\graph.png -->

<section class="w-full py-2 md:py-8 bg-white">
    <div class="max-w-[1400px] mx-auto section-px">

        {{-- Section heading — centered, all devices --}}
        <div class="text-center mb-8 md:mb-10">
            {{-- Desktop: two lines --}}
            <h2 class="hidden md:block text-2xl lg:text-[2rem] xl:text-[2.25rem] font-bold text-neutral-900 leading-tight">
                {{ $title }}<br>{{ $subtitle }}
            </h2>
            {{-- Mobile: single sentence --}}
            <h2 class="md:hidden text-xl font-bold text-neutral-900 leading-snug">
                {{ $title }} – {{ $subtitle }}
            </h2>
        </div>

        {{-- ── DESKTOP layout (md+): chart left | bullets right ── --}}
        <div class="hidden md:grid grid-cols-[50%_50%] lg:grid-cols-[48%_52%] gap-8 lg:gap-12 items-center">

            {{-- Chart image — flush left, fills its column --}}
            <div class="w-full">
                <img src="{{ $chartSrc }}"
                     alt="Astrology income growth chart"
                     class="w-full h-auto object-contain"
                     loading="lazy">
            </div>

            {{-- Detailed bullets — vertically centered, left-aligned --}}
            <ul class="flex flex-col gap-4 lg:gap-5 pl-2 lg:pl-4">
                @foreach($bullets as $bullet)
                <li class="flex items-start gap-3 text-sm lg:text-base text-neutral-700 leading-relaxed">
                    <span class="shrink-0 mt-1 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    {{ $bullet }}
                </li>
                @endforeach
            </ul>

        </div>

        {{-- ── MOBILE layout: chart → short bullets ── --}}
        <div class="md:hidden flex flex-col gap-6">

            {{-- Chart image --}}
            <div class="flex justify-center">
                <img src="{{ $chartSrc }}"
                     alt="Astrology income growth chart"
                     class="w-full max-w-xs object-contain"
                     loading="lazy">
            </div>

            {{-- Short bullets --}}
            <ul class="flex flex-col gap-3">
                @foreach($mobileBullets as $bullet)
                <li class="flex items-center gap-3 text-sm text-neutral-700 leading-relaxed">
                    <span class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    {{ $bullet }}
                </li>
                @endforeach
            </ul>

        </div>

    </div>
</section>
