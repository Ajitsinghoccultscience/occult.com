@php
    $ctaHref    = $ctaHref ?? '/graphology-checkout';
    $featherImg = 'image/graphology(HR) assests/graphology assests HR (mobile)/feather image.webp';
@endphp

{{-- ═══════════════════════════════════
     DARK INTRO
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-[1340px] mx-auto section-px py-12 md:py-16 text-center">

        {{-- Title with feathers --}}
        <div class="flex items-center justify-center gap-3 md:gap-6 mb-6">
            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $featherImg)))) }}"
                 alt="" aria-hidden="true"
                 class="w-12 md:w-20 h-auto object-contain shrink-0">

            <h2 class="font-playfair text-base md:text-3xl font-bold text-white leading-snug" style="font-family:'Playfair Display',serif;">
                Graphology: A Powerful Supportive Tool for<br>
                <span class="underline underline-offset-4 decoration-2">Personality Understanding</span>
            </h2>

            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $featherImg)))) }}"
                 alt="" aria-hidden="true"
                 class="w-12 md:w-20 h-auto object-contain shrink-0 -scale-x-100">
        </div>

        {{-- Paragraph --}}
        <p class="text-sm md:text-base text-white/70 max-w-[760px] mx-auto leading-relaxed mb-6">
            Graphology is the study of handwriting and its connection with personality traits and
            behavioral tendencies. It helps professionals understand how a person thinks, reacts,
            communicates, handles pressure, and expresses emotions.
        </p>

        {{-- Highlight line --}}
        <p class="text-sm md:text-base font-bold text-white mb-8">
            This webinar will teach you how to use graphology in a structured, ethical, and practical way
        </p>

        {{-- CTA --}}
        <a href="{{ $ctaHref }}"
           class="inline-flex items-center gap-2 px-9 py-3.5 rounded-xl font-bold text-white text-base md:text-lg hover:opacity-90 active:scale-95 transition-all"
           style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
            Get Started Today
        </a>

    </div>
</section>
