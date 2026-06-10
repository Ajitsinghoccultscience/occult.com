@php
    $ctaHref = $ctaHref ?? '/graphology-checkout';
@endphp

{{-- ═══════════════════════════════════
     END CTA SECTION
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-[820px] mx-auto section-px py-16 md:py-20 text-center">

        {{-- Title --}}
        <h2 class="text-2xl md:text-4xl font-bold text-white mb-5 leading-tight">
            Start Understanding People Beyond Words
        </h2>

        {{-- Subtitle --}}
        <p class="text-sm md:text-base text-white/70 max-w-[640px] mx-auto mb-8 leading-relaxed">
            Whether you are hiring, counseling, coaching, or training people, graphology can help
            you add a powerful personality observation skill to your professional journey.
        </p>

        {{-- CTA --}}
        <a href="{{ $ctaHref }}"
           class="inline-flex items-center gap-2 px-10 py-4 rounded-xl font-bold text-white text-base md:text-lg hover:opacity-90 active:scale-95 transition-all"
           style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
            Register Now @₹99
            <span class="line-through opacity-70 font-normal">₹199</span>
        </a>

    </div>
</section>
