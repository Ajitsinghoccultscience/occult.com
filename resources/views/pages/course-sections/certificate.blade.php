@php
    $ctaHref = $ctaHref ?? url('/graphology-checkout');

    $points = [
        'Industry-Recognized Certification to validate your Graphology skills.',
        'Enhance Your Professional Profile in HR, counselling, and psychology.',
        'Build Credibility & Confidence as a trained Graphology professional.',
        'Showcase Your Graphology Expertise with professional certification.',
        'Expand Career Opportunities across people-focused professions.',
    ];
@endphp

{{-- ═══════════════════════════════════
     CERTIFICATE
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-335 mx-auto section-px">

        <h2 class="text-xl md:text-2xl font-bold text-neutral-b text-center mb-8 md:mb-10">
            Get Certified by an ISO-Certified &amp; Government-Recognised Institute
        </h2>

        <div class="bg-white rounded-2xl border border-neutral-100 shadow-[0_10px_40px_rgba(0,0,0,0.06)] p-6 md:p-10">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-14">

                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'images/graphology certificate.webp')))) }}"
                     alt="AIIOS Graphology Webinar Certificate"
                     class="w-full max-w-[300px] h-auto rounded-lg shadow-xl object-contain shrink-0 border-2 border-[#ff9700]/40"
                     loading="lazy">

                <div class="flex-1 md:max-w-xl">
                    <p class="text-base md:text-lg font-semibold text-neutral-b mb-5 leading-relaxed">
                        Earn a Valuable Certificate from All India Institute of Occult Science to Start Your Graphology Journey Today.
                    </p>

                    <ul class="space-y-3 mb-7">
                        @foreach($points as $point)
                            <li class="flex items-start gap-3 text-sm md:text-base text-neutral-b/80">
                                <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                <span class="leading-relaxed">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ $ctaHref }}"
                       class="inline-flex items-center justify-center font-bold text-white text-sm md:text-base px-7 py-3 rounded-xl hover:opacity-90 active:scale-95 transition-all"
                       style="background-color:#ff9700;box-shadow:0 0 20px rgba(255,151,0,0.4);">
                        Reserve Your Seat For Webinar
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
