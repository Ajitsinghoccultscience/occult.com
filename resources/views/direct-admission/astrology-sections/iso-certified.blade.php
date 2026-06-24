@props([
    'badge'     => 'ISO Certified Institute',
    'title'     => 'Globally Valid Standard of Education',
    'bullets'   => [
        'Follows professional education standards',
        'Structured learning with quality training',
        'Trusted institute for certified occult education',
    ],
    'ctaLabel'  => 'Register Now',
    'ctaHref'   => 'https://www.occultscience.in/payment-page/',
    'certImage' => 'images/All India Institute of Occult Science - 21001_page-0001 1.png',
])

@php
    $certSrc = asset(implode('/', array_map('rawurlencode', explode('/', $certImage))));
@endphp

<section class="w-full   bg-white py-2 md:py-8">
    <div class="max-w-335 mx-auto section-px">

        <div class="bg-white border border-neutral-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- ── MOBILE layout (< md): badge → title → image → bullets → centered button ── --}}
            <div class="md:hidden flex flex-col items-center gap-5 px-6 py-8 text-center">

                <div>
                    <p class="text-sm font-semibold mb-1.5" style="color:#8B0000;">{{ $badge }}</p>
                    <h2 class="text-xl font-bold text-neutral-900 leading-tight">{{ $title }}</h2>
                </div>

                <img src="{{ $certSrc }}"
                     alt="ISO 9001:2015 Certificate"
                     class="w-44 object-contain drop-shadow"
                     loading="lazy">

                <ul class="flex flex-col gap-2.5 text-left w-full">
                    @foreach($bullets as $bullet)
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

                <a href="{{ $ctaHref }}"
                   class="inline-flex items-center justify-center font-bold text-white text-sm px-10 py-3 rounded-xl hover:opacity-90 active:scale-95 transition"
                   style="background-color:#8B0000;">
                    {{ $ctaLabel }}
                </a>

            </div>

            {{-- ── DESKTOP layout (md+): image left | content right ── --}}
            <div class="hidden md:block max-w-215 mx-auto">
                <div class="grid grid-cols-[240px_1fr] items-center">

                    {{-- Certificate image --}}
                    <div class="flex items-center justify-center px-8 py-10 ">
                        <img src="{{ $certSrc }}"
                             alt="ISO 9001:2015 Certificate"
                             class="w-full max-w-44 object-contain drop-shadow"
                             loading="lazy">
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col gap-4 px-10 py-10">

                        <div>
                            <p class="text-sm font-semibold mb-1.5" style="color:#8B0000;">{{ $badge }}</p>
                            <h2 class="text-2xl lg:text-[1.75rem] font-bold text-neutral-900 leading-tight">{{ $title }}</h2>
                        </div>

                        <ul class="flex flex-col gap-3">
                            @foreach($bullets as $bullet)
                            <li class="flex items-center gap-3 text-base text-neutral-700 leading-relaxed">
                                <span class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                {{ $bullet }}
                            </li>
                            @endforeach
                        </ul>

                        <div class="mt-1">
                            <a href="{{ $ctaHref }}"
                               class="inline-flex items-center justify-center font-bold text-white text-base px-10 py-3.5 rounded-xl hover:opacity-90 active:scale-95 transition"
                               style="background-color:#8B0000;">
                                {{ $ctaLabel }}
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
