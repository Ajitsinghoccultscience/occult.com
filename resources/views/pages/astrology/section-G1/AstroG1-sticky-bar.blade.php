@props([
    'ctaHref' => '#',
    'ctaText' => 'Reserve My Seat @₹49',
    'seats'   => '7',
    'hours'   => 96,
    'minutes' => 0,
    'seconds' => 0,
])

{{-- Sticky bottom offer bar --}}
<div id="sticky-offer-bar" class="fixed bottom-0 left-0 right-0 z-50 bg-button-gradient shadow-[0_-2px_16px_rgba(0,0,0,0.25)]">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-2.5 md:py-3 flex flex-row items-center justify-between gap-3 md:gap-6">

        {{-- Left: label on top, timer boxes below --}}
        <div class="flex flex-col items-start gap-1.5 w-full sm:w-auto">

            {{-- Text --}}
            <div class="flex items-baseline gap-1.5 whitespace-nowrap">
                <span class="font-bold text-neutral-b text-xs md:text-base uppercase tracking-wide leading-none">Early Bird Offer Ends In:</span>
            </div>

            {{-- Timer boxes --}}
            <div class="flex items-end gap-1">
                {{-- Hours --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-hours" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($hours, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Hours</span>
                </div>

                <span class="text-neutral-b font-bold text-base md:text-2xl mb-3 leading-none">:</span>

                {{-- Minutes --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-mins" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($minutes, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Min</span>
                </div>

                <span class="text-neutral-b font-bold text-base md:text-2xl mb-3 leading-none">:</span>

                {{-- Seconds --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-secs" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Sec</span>
                </div>
            </div>
        </div>

        {{-- Right: CTA button --}}
        <a href="{{ $ctaHref }}"
           class="bg-neutral-red text-neutral-i font-bold text-xs md:text-base px-3 md:px-8 py-2.5 md:py-3 rounded-10 whitespace-nowrap hover:bg-neutral-a transition-colors duration-200 shrink-0 text-center">
            {{ $ctaText }}
        </a>

    </div>
</div>

{{-- Push page content above the sticky bar --}}
<div class="h-[76px] md:h-[80px]"></div>

<script defer>
(function () {
    const TOTAL = {{ ($hours * 3600) + ($minutes * 60) + $seconds }};
    let remaining = TOTAL;

    // Sticky bar elements
    const elH = document.getElementById('sb-hours');
    const elM = document.getElementById('sb-mins');
    const elS = document.getElementById('sb-secs');

    // Value stack elements
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

        // Sticky bar (total hours, no days display)
        if (elH) elH.textContent = pad(Math.floor(remaining / 3600));
        if (elM) elM.textContent = pad(m);
        if (elS) elS.textContent = pad(s);

        // Value stack
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
