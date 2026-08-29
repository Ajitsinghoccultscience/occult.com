@php
    $items = [
        ['icon' => 'certificate', 'text' => 'Globally Recognised Certification'],
        ['icon' => 'support',     'text' => '100% Placement Support'],
        ['icon' => 'growth',      'text' => 'Lifetime Growth Support'],
        ['icon' => 'live',        'text' => 'Real Time Learning'],
    ];

    $icons = [
        'certificate' => '<rect x="3" y="4" width="18" height="12" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 20h8M12 16v4"/>',
        'support'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2v4M8 4l1.5 3M16 4l-1.5 3"/><circle cx="12" cy="14" r="6"/><path stroke-linecap="round" d="M12 11v3l2 1"/>',
        'growth'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 17l6-6 4 4 8-8M21 7v6h-6"/>',
        'live'        => '<rect x="3" y="5" width="18" height="12" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8M12 17v4"/>',
    ];
@endphp

{{-- ═══════════════════════════════════
     TRUST STRIP
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-335 mx-auto section-px py-6 md:py-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-4">
            @foreach($items as $item)
                <div class="flex flex-col items-center text-center gap-2">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="#ff9700" stroke-width="1.8" viewBox="0 0 24 24">
                        {!! $icons[$item['icon']] !!}
                    </svg>
                    <p class="text-xs md:text-sm font-semibold text-white leading-snug">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
