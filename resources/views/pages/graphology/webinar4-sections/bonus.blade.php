@php
    $bgImg     = 'image/graphology(HR) assests/graphology assests HR (Desktop)/bonus (desktop).webp';
    $mobileImg = 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/Bonu ( Mobile).webp';
    $giftImg   = 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/gift box.svg';

    $cards = [
        ['img' => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/pdf notes.webp',      'label' => 'PDF Notes'],
        ['img' => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/real case study.webp', 'label' => 'Real Case Study'],
        ['img' => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/live q & a.webp',       'label' => 'Live Q & A'],
    ];
@endphp

{{-- ═══════════════════════════════════
     BONUS MATERIAL
════════════════════════════════════ --}}

<section class="relative overflow-hidden" style="width:100vw;margin-left:calc(50% - 50vw);">

    {{-- Background frame (stretched to fill) — mobile + desktop versions --}}
    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $mobileImg)))) }}"
         alt="" aria-hidden="true"
         class="md:hidden absolute inset-0 w-full h-full" style="object-fit:fill;">
    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $bgImg)))) }}"
         alt="" aria-hidden="true"
         class="hidden md:block absolute inset-0 w-full h-full" style="object-fit:fill;">

    <div class="relative z-10 max-w-[1340px] mx-auto section-px py-16 md:py-24">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="inline-block text-xl md:text-3xl font-bold text-neutral-b">
                Bonus Material You Will Get After The Webinar
            </h2>
        </div>

        {{-- 3 cards — slider on mobile, grid on tablet/desktop --}}
        <div class="flex sm:grid sm:grid-cols-3 gap-5 md:gap-6 max-w-[760px] mx-auto overflow-x-auto sm:overflow-visible snap-x snap-mandatory scroll-smooth pb-4 sm:pb-0 [&::-webkit-scrollbar]:hidden">
            @foreach($cards as $card)
                <div class="text-center shrink-0 w-[68%] sm:w-auto snap-center">
                    {{-- Image with orange border --}}
                    <div class="bg-white p-1.5 rounded-xl border-2 border-[#ff9700] shadow-md">
                        <div class="rounded-lg overflow-hidden aspect-square bg-white flex items-center justify-center">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $card['img'])))) }}"
                                 alt="{{ $card['label'] }}"
                                 class="w-full h-full object-contain"
                                 loading="lazy">
                        </div>
                    </div>
                    <p class="mt-3 text-sm md:text-base font-medium text-neutral-b">{{ $card['label'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Special bonus banner --}}
        <div class="flex items-center justify-center gap-4 mt-8 md:mt-10">
            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $giftImg)))) }}"
                 alt="" class="w-12 h-12 md:w-14 md:h-14 object-contain" aria-hidden="true">
            <p class="text-lg md:text-2xl font-bold text-neutral-b leading-tight">
                And Get Special<br>
                Bonus Worth <span style="color:#ff9700;">₹4,999</span>
            </p>
        </div>

    </div>
</section>
