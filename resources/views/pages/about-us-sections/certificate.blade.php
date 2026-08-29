@php
    $ctaHref = $ctaHref ?? url('/graphology-checkout');

    $points = [
        'Follows professional education standards',
        'Structured learning with quality training',
        'A mark that clients can see, verify, and trust from day one',
        'Trusted institute for certified occult education',
    ];
@endphp

{{-- ═══════════════════════════════════
     CERTIFICATE
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16 bg-white">
    <div class="max-w-335 mx-auto section-px">
        <div class="rounded-2xl border border-neutral-100 shadow-[0_10px_40px_rgba(0,0,0,0.06)] p-6 md:p-10" style="background-color:#FBFAF7;">
            <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-28 max-w-[1000px] mx-auto">

                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'images/aiios certificate.webp')))) }}"
                     alt="AIIOS ISO 21001:2018 Compliance Certificate"
                     class="w-full max-w-[220px] h-auto rounded-lg shadow-xl object-contain shrink-0"
                     loading="lazy">

                <div>
                    <p class="text-xs md:text-sm font-bold uppercase tracking-wide mb-2" style="color:#ff9700;">
                        ISO Certified Institute
                    </p>
                    <h2 class="text-xl md:text-2xl font-bold text-neutral-b mb-5">
                        Globally Valid Standard of Education
                    </h2>

                    <ul class="space-y-3 mb-7">
                        @foreach($points as $point)
                            <li class="flex items-start gap-3 text-sm md:text-base text-neutral-b/80">
                                <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                {{ $point }}
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ $ctaHref }}"
                       class="inline-flex items-center justify-center font-bold text-white text-sm md:text-base px-7 py-3 rounded-xl hover:opacity-90 active:scale-95 transition-all"
                       style="background-color:#ff9700;box-shadow:0 0 20px rgba(255,151,0,0.4);">
                        Join Our Webinar
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
