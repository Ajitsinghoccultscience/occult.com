@php
    $base = 'image/graphology(HR) assests/graphology assests HR (Desktop)/news channels';
    $logos = [
        'zee news 1.webp',
        'the wire 2.webp',
        'india 3.webp',
        'abp news 4.webp',
        'TOI 5.webp',
        'dailyhunt 6.webp',
        'silicon 7.webp',
        'the print 8.webp',
        'mid day 9.webp',
    ];
@endphp

{{-- ═══════════════════════════════════
     FEATURED IN
════════════════════════════════════ --}}
<section class="py-12 md:py-16" style="width:100vw;margin-left:calc(50% - 50vw);overflow:hidden;">

    {{-- Heading --}}
    <div class="text-center mb-8 md:mb-12 section-px">
        <h2 class="inline-block text-2xl md:text-3xl font-bold text-neutral-b pb-1 border-b-[3px] border-[#ff9700]">
            Featured in
        </h2>
    </div>

    {{-- Full-bleed auto-scrolling logo carousel (seamless marquee) --}}
    <div class="flex w-max animate-marquee gap-4 md:gap-5">
        {{-- logos rendered twice for a seamless infinite loop --}}
        @foreach(array_merge($logos, $logos) as $logo)
            <div class="shrink-0 w-36 md:w-44 bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $base.'/'.$logo)))) }}"
                     alt="Featured news channel"
                     class="w-full h-auto object-contain"
                     loading="lazy">
            </div>
        @endforeach
    </div>

</section>
