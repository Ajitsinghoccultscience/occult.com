@php
    $base = 'images/graphology course icons';
    $items = [
        ['icon' => 'globally rec. certificate.svg', 'text' => 'Globally Recognised Certification'],
        ['icon' => 'placement supprt.svg',           'text' => '100% Placement Support'],
        ['icon' => 'lifetime growth support.svg',    'text' => 'Lifetime Growth Support'],
        ['icon' => 'real time learning.svg',         'text' => 'Real Time Learning'],
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
                    <img src="{{ asset($base . '/' . rawurlencode($item['icon'])) }}"
                         alt="" class="w-8 h-8 md:w-9 md:h-9 object-contain" loading="lazy">
                    <p class="text-xs md:text-sm font-semibold text-white leading-snug">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
