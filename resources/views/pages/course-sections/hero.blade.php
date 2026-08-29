@php
    $ctaHref = $ctaHref ?? url('/graphology-checkout');
    $date    = $date    ?? '31st July, 2026';
    $time    = $time    ?? '11:00 AM - 2:00 PM';
@endphp

{{-- ═══════════════════════════════════
     HERO (banner background)
════════════════════════════════════ --}}
<section class="relative overflow-hidden font-open-sans" style="width:100vw;margin-left:calc(50% - 50vw);font-family:'Open Sans',sans-serif;">

    <img src="{{ asset('images/banner graphology website.webp') }}"
         alt="" aria-hidden="true"
         class="absolute inset-0 w-full h-full object-cover"
         loading="eager" fetchpriority="high">

    <div class="relative z-10 max-w-335 mx-auto section-px py-16 md:py-24">
        <div class="max-w-xl">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight">
                Professional Graphology Certification Course
            </h1>

            <p class="mt-4 text-sm md:text-base text-white/80 leading-relaxed">
                Our industry-focused curriculum combines structured learning with practical handwriting analysis. Through live training, you will master letter formations, writing movement, pen pressure, slant and symbolic gestures and develop the expertise to conduct professional graphology consultations with confidence.
            </p>

            <div class="mt-6">
                <a href="{{ $ctaHref }}"
                   class="inline-flex items-center justify-center gap-2 font-bold text-white text-base px-8 py-3.5 rounded-2xl hover:opacity-90 active:scale-95 transition shrink-0"
                   style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
                    Register Now For Webinar @₹49
                    <span class="line-through opacity-70 font-normal text-sm">₹199</span>
                </a>
            </div>

            {{-- Date + Time --}}
            <div class="mt-6 inline-flex items-stretch gap-0 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.25)] border-b-2 border-[#ff9700] overflow-hidden divide-x divide-neutral-200">
                <div class="px-5 py-3.5">
                    <div class="flex items-center gap-2">
                        <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <p class="text-base font-bold text-neutral-b leading-none">Date</p>
                    </div>
                    <p class="mt-1.5 text-sm font-semibold text-neutral-b/80 leading-none">{{ $date }}</p>
                </div>
                <div class="px-5 py-3.5">
                    <div class="flex items-center gap-2">
                        <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round"/>
                            </svg>
                        </span>
                        <p class="text-base font-bold text-neutral-b leading-none">Time</p>
                    </div>
                    <p class="mt-1.5 text-sm font-semibold text-neutral-b/80 leading-none">{{ $time }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
