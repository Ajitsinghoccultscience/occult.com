@php
    $instituteImg = 'image/graphology(HR) assests/graphology assests HR (mobile)/About Institute/institute image 1.webp';
    $instaIcon = 'image/graphology assests/instagram.svg';
    $ytIcon    = 'image/graphology assests/youtube.svg';

    $bullets = [
        'Trusted institute for occult science learning',
        '97,000+ students trained across the world',
        'Expert mentors with practical teaching experience',
        'Live online classes with doubt support',
        'Certification and lifetime learning guidance',
        'Courses in astrology, vastu, Reiki, Palmistry, numerology, and more',
    ];
@endphp

{{-- ═══════════════════════════════════
     ABOUT INSTITUTE
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#FFFAF5;">
    <div class="max-w-[1340px] mx-auto section-px py-10 md:py-12">

        {{-- Heading (2 lines) --}}
        <div class="text-center mb-7 md:mb-9">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b leading-tight">
                All India Institute of Occult Science:<br>
                Running Since March 2004
            </h2>
        </div>

        {{-- Two-column: image left, content right --}}
        <div class="grid grid-cols-1 lg:grid-cols-[44%_1fr] gap-8 lg:gap-14 items-center">

            {{-- Left: Image with orange border --}}
            <div class="bg-white p-1.5 rounded-xl border-2 border-[#ff9700] shadow-sm">
                <div class="rounded-lg overflow-hidden aspect-[16/9]">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $instituteImg)))) }}"
                         alt="All India Institute of Occult Science"
                         class="w-full h-full object-cover"
                         loading="lazy">
                </div>
            </div>

            {{-- Right: bullets + stats --}}
            <div>
                <ul class="space-y-3 mb-6">
                    @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-black text-sm md:text-base">
                            <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full border-2 border-[#ff9700] flex items-center justify-center">
                                <svg class="w-3 h-3 text-[#ff9700]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="text-black">{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>

                {{-- Stat blocks --}}
                <div class="flex flex-wrap items-center justify-between sm:justify-start gap-6 md:gap-8 lg:ml-3">

                    {{-- Instagram --}}
                    <div class="flex flex-col">
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $instaIcon)))) }}"
                             alt="Instagram" class="w-7 h-7 object-contain mb-2">
                        <span class="text-base md:text-lg font-bold text-neutral-b leading-none">52,000+</span>
                        <span class="text-[10px] sm:text-xs text-center text-black mt-0.5">Instagram Followers</span>
                    </div>

                    {{-- YouTube --}}
                    <div class="flex flex-col">
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $ytIcon)))) }}"
                             alt="YouTube" class="w-7 h-7 object-contain mb-2">
                        <span class="text-base md:text-lg font-bold text-neutral-b leading-none">15,400+</span>
                        <span class=" text-[10px] sm:text-xs text-black mt-0.5">Youtube Followers</span>
                    </div>

                    {{-- Certified --}}
                    <div class="flex flex-col">
                        <span class="w-7 h-7 rounded-lg flex items-center justify-center mb-2" style="background-color:#16a34a;">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1 3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1.2 14.3-3.5-3.5 1.4-1.4 2.1 2.1 4.6-4.6 1.4 1.4-6 6z"/>
                            </svg>
                        </span>
                        <span class="text-base md:text-lg font-bold text-neutral-b leading-none">2400+</span>
                        <span class="text-[10px] sm:text-xs text-black mt-0.5">Certified Students</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
