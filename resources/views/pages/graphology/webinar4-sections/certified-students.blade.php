@php
    $images = [
        'image/astrology assests/certified g1.webp',
        'image/astrology assests/certified g 2.webp',
        'image/astrology assests/certified g 3.webp',
        'image/astrology assests/certified g 4.webp',
        'image/astrology assests/certified g 6.webp',
        'image/astrology assests/certified g 7.webp',
    ];
@endphp

{{-- ═══════════════════════════════════
     CERTIFIED STUDENTS
════════════════════════════════════ --}}
<section class="w-full py-14 md:py-20">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-2xl md:text-4xl font-bold text-neutral-b">
                Our Successfully certified Students
            </h2>
        </div>

        {{-- Image carousel --}}
        <div class="flex gap-5 md:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden" id="certified-students-carousel">
            @foreach($images as $image)
                <div class="snap-center shrink-0 w-full sm:w-[calc(50%_-_0.625rem)] lg:w-[calc(33.333%_-_0.84rem)]">
                    {{-- White card: small inner space (padding) then orange border --}}
                    <div class="bg-white p-1.5 rounded-2xl border-[3px] border-[#ff9700] shadow-sm">
                        <div class="rounded-xl overflow-hidden aspect-[16/10]">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                                 alt="Certified Graphology Student"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script>window.__carousels.push({id:'certified-students-carousel',type:'scrollby',name:'certifiedStudentsCarousel',interval:2800});</script>
    </div>
</section>
