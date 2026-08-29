@php
    $stats = [
        ['icon' => 'practice', 'text' => '30+ Years Of Practice In Occult Science'],
        ['icon' => 'convocation', 'text' => '22+ Convocations Guided By Gurudev Shrie'],
        ['icon' => 'award', 'text' => '8+ International Occult Awards'],
    ];

    $icons = [
        'practice' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5c-1.5-1.5-4-2-6-1v11c2-1 4.5-.5 6 1 1.5-1.5 4-2 6-1v-11c-2-1-4.5-.5-6 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5v11"/>',
        'convocation' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3L2 8l10 5 10-5-10-5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 10.5V16c0 1.5 2.7 3 6 3s6-1.5 6-3v-5.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M22 8v6"/>',
        'award' => '<circle cx="12" cy="8" r="5"/><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 12.5L7 21l5-2.5L17 21l-1.5-8.5"/>',
    ];
@endphp

{{-- ═══════════════════════════════════
     STATS BAR
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-335 mx-auto section-px py-8 md:py-10">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 sm:gap-6">
            @foreach($stats as $stat)
                <div class="flex flex-col items-center text-center gap-3">
                    <span class="shrink-0 w-11 h-11 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            {!! $icons[$stat['icon']] !!}
                        </svg>
                    </span>
                    <p class="text-sm md:text-base font-semibold text-white leading-snug max-w-[220px]">
                        {{ $stat['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
