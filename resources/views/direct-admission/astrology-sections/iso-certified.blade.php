@props([
    'badge'       => 'ISO Certified Institute',
    'title'       => 'You are joining an Institute that follows global standards, not guesswork teaching',
    'bullets'     => [
        'ISO Certified Institute ensuring high quality education standards',
        'Follows structured and globally recognized processes for learning',
        'Trusted by 97K+ students for consistency, credibility & professional excellence',
    ],
    'ctaLabel'    => 'Register Now',
    'ctaHref'     => 'https://www.occultscience.in/payment-page/',
    'certImage'   => 'images/All India Institute of Occult Science - 21001_page-0001 1.png',
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="border border-neutral-200 rounded-2xl p-6 md:p-8 shadow-sm bg-white">
            <div class="grid grid-cols-1 md:grid-cols-[340px_1fr] gap-7 md:gap-10 items-center">

                {{-- Certificate image --}}
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $certImage)))) }}"
                         alt="ISO Certificate"
                         class="w-[260px] md:w-[320px] object-contain drop-shadow-md"
                         loading="lazy">
                </div>

                {{-- Content --}}
                <div class="flex flex-col gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest mb-2" style="color:#8B0000;">{{ $badge }}</p>
                        <h2 class="text-subheading font-bold text-neutral-b leading-snug">{{ $title }}</h2>
                    </div>

                    <ul class="flex flex-col gap-2.5">
                        @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-sm text-neutral-b leading-relaxed">
                            <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            {{ $bullet }}
                        </li>
                        @endforeach
                    </ul>

                    <div>
                        <a href="{{ $ctaHref }}"
                           class="inline-flex items-center gap-2 font-bold text-white text-sm px-8 py-3.5 rounded-xl transition-colors duration-200 hover:opacity-90"
                           style="background-color:#8B0000;">
                            {{ $ctaLabel }}
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
