


@props([
    'ctaHref' => '#',
    'ctaText' => 'Reserve Seat @₹49',
    'seats'   => '7',
    'hours'   => 0,
    'minutes' => 45,
    'seconds' => 0,
])

<div id="sticky-offer-bar" class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t-2 border-neutral-200 shadow-[0_-4px_20px_rgba(0,0,0,0.10)]">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-3 flex items-center justify-between gap-4">

        {{-- Left: label + timer + seats --}}
        <div class="flex flex-col gap-1.5">
            {{-- "OFFER ENDS IN" --}}
            <span class="text-[11px] md:text-xs font-bold uppercase tracking-widest text-primary flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse shrink-0"></span>
                Offer Ends In
            </span>

            {{-- Timer boxes --}}
            <div class="flex items-center gap-1">
                @foreach([
                    ['id' => 'sb-hours', 'val' => $hours,   'label' => 'Hours'],
                    ['id' => 'sb-mins',  'val' => $minutes, 'label' => 'Min'],
                    ['id' => 'sb-secs',  'val' => $seconds, 'label' => 'Sec'],
                ] as $i => $unit)
                    @if($i > 0)
                        <span class="text-neutral-b font-bold text-base leading-none mb-4 px-0.5">:</span>
                    @endif
                    <div class="flex flex-col items-center gap-0.5">
                        <div class="border border-neutral-300 rounded px-2 py-1 min-w-[40px] md:min-w-[46px] text-center bg-white">
                            <span id="{{ $unit['id'] }}" class="text-neutral-b font-bold text-sm md:text-base leading-none tabular-nums">{{ str_pad($unit['val'], 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <span class="text-neutral-e text-[9px] md:text-[10px] leading-none">{{ $unit['label'] }}</span>
                    </div>
                @endforeach
            </div>

            
        </div>

        {{-- Right: CTA button --}}
        <a href="{{ $ctaHref }}"
           class="shrink-0 inline-flex items-center justify-center whitespace-nowrap font-bold text-sm md:text-base px-6 md:px-10 py-3 md:py-3.5 rounded-lg text-white transition-all duration-200 hover:opacity-90 active:scale-95"
           style="background-color: #191F59;">
            {{ $ctaText }} <span class="line-through opacity-70 ml-1">₹199</span>
        </a>

    </div>
</div>

{{-- Push page content above the sticky bar --}}
<div class="h-[80px] md:h-[88px]"></div>

<script defer>
(function () {
    const TOTAL = {{ ($hours * 3600) + ($minutes * 60) + $seconds }};
    const KEY = 'graphology_offer_timer_end';

    let endTime = parseInt(localStorage.getItem(KEY) || '0', 10);
    if (!endTime || endTime <= Date.now()) {
        endTime = Date.now() + TOTAL * 1000;
        localStorage.setItem(KEY, endTime);
    }

    const elH = document.getElementById('sb-hours');
    const elM = document.getElementById('sb-mins');
    const elS = document.getElementById('sb-secs');

    const vsD = document.getElementById('countdown-days');
    const vsH = document.getElementById('countdown-hours');
    const vsM = document.getElementById('countdown-min');
    const vsS = document.getElementById('countdown-sec');

    function pad(n) { return String(n).padStart(2, '0'); }

    function tick() {
        let remaining = Math.max(0, Math.floor((endTime - Date.now()) / 1000));
        if (remaining <= 0) {
            endTime = Date.now() + TOTAL * 1000;
            localStorage.setItem(KEY, endTime);
            remaining = TOTAL;
        }

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
    }

    tick();
    setInterval(tick, 1000);
})();
</script>
