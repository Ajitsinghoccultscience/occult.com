@php
    $exploreHref = $exploreHref ?? url('/graphology-course-pay');
@endphp

{{-- ═══════════════════════════════════
     EXPLORE FULL COURSE — solid footer-color bar
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);" class="font-open-sans">
    <a href="{{ $exploreHref }}"
       class="group block w-full transition-all hover:brightness-110"
       style="background-color:#2b2724;border-top:1px solid rgba(255,255,255,0.08);">
        <div class="max-w-335 mx-auto section-px py-4 md:py-5 flex flex-col sm:flex-row items-center justify-center sm:justify-between gap-3 md:gap-4 text-center sm:text-left">

            {{-- Left: icon + text --}}
            <div class="flex items-center gap-3 md:gap-4">
                <span class="hidden sm:flex shrink-0 w-10 h-10 rounded-full items-center justify-center" style="background-color:rgba(255,151,0,0.15);">
                    <svg class="w-5 h-5" style="color:#ff9700;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5C9.5 4.5 6.5 4 4 4.5v13c2.5-.5 5.5 0 8 2 2.5-2 5.5-2.5 8-2v-13c-2.5-.5-5.5 0-8 2Zm0 0v13"/>
                    </svg>
                </span>
                <span class="text-base md:text-xl font-extrabold tracking-tight leading-tight text-white">
                    Explore the Full Graphology Course
                </span>
            </div>

            {{-- Right: button --}}
            <span class="shrink-0 inline-flex items-center gap-2 text-white font-bold text-sm md:text-base px-5 md:px-7 py-2.5 md:py-3 rounded-full whitespace-nowrap transition-all group-hover:gap-3"
                  style="background-color:#ff9700;box-shadow:0 8px 20px -6px rgba(255,151,0,0.7);">
                Explore Now
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/>
                </svg>
            </span>

        </div>
    </a>
</section>
