@php
    $ctaHref     = $ctaHref     ?? '/graphology-checkout';
    $price       = $price       ?? '₹49';
    $oldPrice    = $oldPrice    ?? '₹199';
    $offerEndsAt = $offerEndsAt ?? null;
@endphp

{{-- ═══════════════════════════════════
     STICKY BAR
════════════════════════════════════ --}}
<div id="sticky-bar"
     class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-neutral-200 shadow-[0_-4px_20px_rgba(0,0,0,0.12)] py-2">

    <div class="max-w-335 mx-auto section-px py-2.5 flex items-center justify-between gap-3">

        {{-- Left: price + timer --}}
        <div class="min-w-0 flex-1">

            {{-- Price row --}}
            <div class="flex items-baseline gap-1.5 flex-wrap">
                <span class="text-xl sm:text-2xl font-extrabold leading-none" style="color:#ff9700;">{{ $price }}</span>
                <span class="text-xs sm:text-sm text-neutral-400 line-through leading-none">{{ $oldPrice }}</span>
            </div>

            {{-- Timer row --}}
            <div class="flex items-center gap-1 mt-0.5 flex-wrap">
                <span class="text-[14px] sm:text-xs font-semibold text-neutral-500 whitespace-nowrap">Offer Ends In</span>
                <span class="flex items-center text-[14px] sm:text-sm font-extrabold text-neutral-800 tabular-nums">
                    <span id="sb-hours">10</span><span class="text-neutral-400 mx-px">:</span><span id="sb-minutes">00</span><span class="text-neutral-400 mx-px">:</span><span id="sb-seconds">00</span>
                </span>
            </div>

        </div>

        {{-- Right: CTA button --}}
        <a href="{{ $ctaHref }}"
           class="shrink-0 inline-flex items-center justify-center font-bold text-white text-[16px] sm:text-lg px-5 sm:px-8 py-3 sm:py-5 rounded-xl hover:opacity-90 active:scale-95 transition-all whitespace-nowrap"
           style="background-color:#ff9700;box-shadow:0 0 18px rgba(255,151,0,0.5),0 4px 12px rgba(0,0,0,0.1);">
            Register Now
        </a>

    </div>
</div>

{{-- Spacer so fixed bar never covers page content --}}
<div id="sticky-bar-spacer" aria-hidden="true"></div>

{{-- ── Countdown Script (shared key with upcoming-webinar) ── --}}
<script>
(function () {
    var SHARED_KEY = 'w4_offer_end';
    var INIT_SECS  = 606;

    var stored  = sessionStorage.getItem(SHARED_KEY);
    var endTime = (stored && parseInt(stored) > Date.now())
                    ? parseInt(stored)
                    : Date.now() + INIT_SECS * 1000;
    sessionStorage.setItem(SHARED_KEY, endTime);

    var hoursEl   = document.getElementById('sb-hours');
    var minutesEl = document.getElementById('sb-minutes');
    var secondsEl = document.getElementById('sb-seconds');
    var bar       = document.getElementById('sticky-bar');
    var spacer    = document.getElementById('sticky-bar-spacer');

    function pad(n) { return String(n).padStart(2, '0'); }

    function syncSpacer() {
        if (bar && spacer) spacer.style.height = bar.offsetHeight + 'px';
    }

    function tick() {
        var remaining = Math.max(0, endTime - Date.now());
        var totalSec  = Math.floor(remaining / 1000);
        if (hoursEl)   hoursEl.textContent  = pad(Math.floor(totalSec / 3600));
        if (minutesEl) minutesEl.textContent = pad(Math.floor((totalSec % 3600) / 60));
        if (secondsEl) secondsEl.textContent = pad(totalSec % 60);
        if (remaining > 0) setTimeout(tick, 1000);
    }

    tick();
    syncSpacer();
    window.addEventListener('resize', syncSpacer);
})();
</script>
