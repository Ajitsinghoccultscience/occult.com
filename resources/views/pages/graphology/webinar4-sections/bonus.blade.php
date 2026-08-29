@php
    $giftImg   = 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/gift box.svg';

    $cards = [
        [
            'img'   => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/pdf notes.webp',
            'label' => 'PDF Notes',
            'text'  => 'Every trait and stroke from the session is available to you, whenever you need.',
        ],
        [
            'img'   => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/real case study.webp',
            'label' => 'Real Case Study',
            'text'  => 'Watch a real handwriting analysis solved step by step during the session.',
        ],
        [
            'img'   => 'image/graphology(HR) assests/graphology assests HR (mobile)/Bonus/live q & a.webp',
            'label' => 'Live Q & A',
            'text'  => 'Ask your doubts directly and learn how to take this skill forward as a paid service.',
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     BONUS MATERIAL
════════════════════════════════════ --}}

<section class="w-full" style="width:100vw;margin-left:calc(50% - 50vw);background-color:#FFFAF5;">

    <div class="max-w-[1340px] mx-auto section-px py-16 md:py-24">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="inline-block text-xl md:text-3xl font-bold text-neutral-b">
                What Stays With You After The Webinar
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
                    <p class="mt-1 text-xs md:text-sm text-neutral-b/70 leading-relaxed">{{ $card['text'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Special bonus banner --}}
        <div class="text-center mt-8 md:mt-10">
            <div class="flex items-center justify-center gap-4">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $giftImg)))) }}"
                     alt="" class="w-12 h-12 md:w-14 md:h-14 object-contain" aria-hidden="true">
                <h3 class="text-lg md:text-xl font-bold text-neutral-b leading-tight text-left">
                    Special Attendee Offers
                </h3>
            </div>
            <p class="mt-2 text-sm md:text-base text-neutral-b/70">
                Attend live to get access to limited rewards.
            </p>
        </div>

    </div>
</section>
