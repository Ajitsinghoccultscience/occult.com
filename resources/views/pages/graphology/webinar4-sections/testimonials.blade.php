@php
    $dBase = 'image/graphology(HR) assests/graphology assests HR (Desktop)/reviews ( desktop)';
    $mBase = 'image/graphology(HR) assests/graphology assests HR (mobile)/review';

    $desktop = ['review 1(desktop).webp', 'review 2 ( desktop).webp', 'review 3 (desktop).webp', 'review 4(desktop).webp'];
    $mobile  = ['review 1 (mobile).webp', 'review 2(mobile).webp', 'review 3(mobile).webp', 'review 4(mobile).webp'];
@endphp

{{-- ═══════════════════════════════════
     TESTIMONIALS (review images)
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Join 1200+ who’ve already transformed their lives
            </h2>
        </div>

        {{-- Desktop review slider with arrows --}}
        <div class="hidden md:block relative">
            <div id="reviews-slider-d" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
                @foreach($desktop as $img)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $dBase.'/'.$img)))) }}"
                         alt="Student review" loading="lazy"
                         class="shrink-0 snap-center w-[330px] h-auto object-contain rounded-xl shadow-md">
                @endforeach
            </div>

            {{-- Prev --}}
            <button type="button" onclick="document.getElementById('reviews-slider-d').scrollBy({left:-360,behavior:'smooth'})"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 w-11 h-11 rounded-full bg-white shadow-md flex items-center justify-center text-neutral-b hover:bg-neutral-100 transition-colors"
                    aria-label="Previous">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next --}}
            <button type="button" onclick="document.getElementById('reviews-slider-d').scrollBy({left:360,behavior:'smooth'})"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 w-11 h-11 rounded-full bg-white shadow-md flex items-center justify-center text-neutral-b hover:bg-neutral-100 transition-colors"
                    aria-label="Next">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Mobile review slider (manual swipe) --}}
        <div class="md:hidden">
            <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
                @foreach($mobile as $img)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $mBase.'/'.$img)))) }}"
                         alt="Student review" loading="lazy"
                         class="shrink-0 snap-center w-[210px] h-auto object-contain rounded-xl shadow-md">
                @endforeach
            </div>
        </div>

    </div>
</section>
