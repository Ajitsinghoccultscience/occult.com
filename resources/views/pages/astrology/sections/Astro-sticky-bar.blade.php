@props([
    'ctaHref' => '#',
    'ctaText' => 'Reserve My Seat @₹49',
    'seats'   => '7',
    'hours'   => 48,
    'minutes' => 9,
    'seconds' => 48,
])

{{-- Sticky bottom offer bar --}}
<div id="sticky-offer-bar" class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-neutral-200 shadow-[0_-2px_12px_rgba(0,0,0,0.08)]">

    {{-- MOBILE layout --}}
    <div class="md:hidden px-3 py-2 flex items-center justify-between gap-2">

        {{-- Left: label + timer stacked --}}
        <div class="flex flex-col gap-1 min-w-0">
            <span class="flex items-center gap-1 text-[9px] font-bold uppercase tracking-wider text-neutral-b">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse shrink-0"></span>
                Offer Ends In
            </span>
            <div class="flex items-center gap-1">
                @foreach([['id'=>'sb-hours','val'=>$hours,'label'=>'Hrs'],['id'=>'sb-mins','val'=>$minutes,'label'=>'Min'],['id'=>'sb-secs','val'=>$seconds,'label'=>'Sec']] as $i => $unit)
                    @if($i > 0)<span class="text-[#5E3592] font-bold text-xs leading-none mb-2.5">:</span>@endif
                    <div class="flex flex-col items-center gap-0.5">
                        <div class="bg-[#5E3592] rounded px-1.5 py-0.5 min-w-[26px] text-center">
                            <span id="{{ $unit['id'] }}" class="text-white font-bold text-xs leading-none tabular-nums">{{ str_pad($unit['val'], 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <span class="text-neutral-e text-[7px] leading-none">{{ $unit['label'] }}</span>
                    </div>
                @endforeach
            </div>
            <span class="text-neutral-e text-[8px] leading-none">(Only {{ $seats }} seats left)</span>
        </div>

        {{-- Right: CTA --}}
        <x-ui.button :href="$ctaHref" variant="astro-cta" compact="true" class="!px-4 !py-2.5 !rounded-lg !text-xs !tracking-wide shrink-0 whitespace-nowrap">
            {{ $ctaText }}
        </x-ui.button>
    </div>

    {{-- DESKTOP layout --}}
    <div class="hidden md:flex max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-2.5 items-center justify-between gap-5">

        <div class="flex items-center gap-4">
            {{-- Label --}}
            <div class="flex flex-col gap-0.5">
                <span class="flex items-center gap-1.5 text-xs font-bold uppercase tracking-widest text-neutral-b whitespace-nowrap">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse shrink-0"></span>
                    Offer Ends In
                </span>
                <span class="text-[10px] text-neutral-e whitespace-nowrap">(Only {{ $seats }} seats are left)</span>
            </div>

            <div class="w-px h-8 bg-neutral-200 shrink-0"></div>

            {{-- Timer --}}
            <div class="flex items-center gap-1.5">
                @foreach([['id'=>'sb-hours','val'=>$hours,'label'=>'Hours'],['id'=>'sb-mins','val'=>$minutes,'label'=>'Min'],['id'=>'sb-secs','val'=>$seconds,'label'=>'Sec']] as $i => $unit)
                    @if($i > 0)<span class="text-[#5E3592] font-bold text-lg leading-none pb-3">:</span>@endif
                    <div class="flex flex-col items-center gap-0.5">
                        <div class="bg-[#5E3592] rounded-md px-3.5 py-1.5 min-w-[46px] text-center shadow-sm">
                            <span id="{{ $unit['id'] }}" class="text-white font-bold text-base leading-none tabular-nums">{{ str_pad($unit['val'], 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <span class="text-neutral-e text-[9px] font-medium leading-none">{{ $unit['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <x-ui.button :href="$ctaHref" variant="astro-cta" compact="true" class="!px-8 !py-3 !rounded-lg !text-sm !tracking-wide shrink-0 whitespace-nowrap">
            {{ $ctaText }}
        </x-ui.button>

    </div>
</div>

{{-- Push page content above the sticky bar --}}
<div class="h-[72px] md:h-[72px]"></div>

<script defer>
(function () {
    const TOTAL = {{ ($hours * 3600) + ($minutes * 60) + $seconds }};
    let remaining = TOTAL;

    const elH = document.getElementById('sb-hours');
    const elM = document.getElementById('sb-mins');
    const elS = document.getElementById('sb-secs');

    // Value stack elements (if present on page)
    const vsD = document.getElementById('countdown-days');
    const vsH = document.getElementById('countdown-hours');
    const vsM = document.getElementById('countdown-min');
    const vsS = document.getElementById('countdown-sec');

    function pad(n) { return String(n).padStart(2, '0'); }

    function tick() {
        if (remaining <= 0) remaining = TOTAL;
        const d = Math.floor(remaining / 86400);
        const h = Math.floor((remaining % 86400) / 3600);
        const m = Math.floor((remaining % 3600) / 60);
        const s = remaining % 60;

        if (elH) elH.textContent = pad(Math.floor(remaining / 3600));
        if (elM) elM.textContent = pad(m);
        if (elS) elS.textContent = pad(s);

        if (vsD) vsD.textContent = pad(d);
        if (vsH) vsH.textContent = pad(h);
        if (vsM) vsM.textContent = pad(m);
        if (vsS) vsS.textContent = pad(s);

        remaining--;
    }

    tick();
    setInterval(tick, 1000);
})();
</script>
