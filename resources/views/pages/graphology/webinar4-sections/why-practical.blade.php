@php
    $cards = [
        [
            'text' => 'Helps you build an additional income-oriented skill',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2m0-8c1.1 0 2.08.4 2.6 1M12 8V6m0 10v2m0-2c-1.1 0-2.08-.4-2.6-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        ],
        [
            'text' => 'Focused on real-life application, not only theory',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10"/>',
        ],
        [
            'text' => 'Includes practical handwriting examples',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
        ],
        [
            'text' => 'Easy-to-understand method for beginners',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 18h6M10 21h4M12 3a6 6 0 00-4 10.5c.6.6 1 1.4 1 2.2V16h6v-.3c0-.8.4-1.6 1-2.2A6 6 0 0012 3z"/>',
        ],
        [
            'text' => 'Useful for hiring, counseling, coaching, personality development',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20 7h-3V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2H4a2 2 0 00-2 2v9a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM9 7V5h6v2"/>',
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     WHY THIS WEBINAR IS PRACTICAL
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Why This Webinar Is Practical and Professional
            </h2>
        </div>

        {{-- Cards: slider on mobile, 3 on tablet, 5 on desktop --}}
        <div class="flex md:grid md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-5 overflow-x-auto md:overflow-visible snap-x snap-mandatory scroll-smooth pb-4 md:pb-0 [&::-webkit-scrollbar]:hidden">
            @foreach($cards as $card)
                <div class="shrink-0 w-[60%] sm:w-[42%] md:w-auto snap-center rounded-xl p-5 flex flex-col gap-4" style="background-color:#FFF6EC;">
                    {{-- Icon --}}
                    <span class="w-11 h-11 rounded-lg flex items-center justify-center" style="background-color:#FCE4C7;">
                        <svg class="w-6 h-6 text-[#ff9700]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            {!! $card['icon'] !!}
                        </svg>
                    </span>
                    {{-- Text --}}
                    <p class="text-sm text-neutral-b leading-snug">
                        {{ $card['text'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>
