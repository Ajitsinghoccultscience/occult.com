@props([
    'ctaHref'    => '#',
    'ctaText'    => 'Register Now',
    'price'      => '₹49',
    'priceOld'   => '₹199',
    'seatsLeft'  => '7',
    'minutes'    => 4,
    'seconds'    => 40,
])

{{-- Sticky bar --}}
<div id="sticky-bar"
     class="fixed bottom-0 left-0 right-0 z-50 transition-transform duration-300"
     style="transform: translateY(100%);">

    {{-- Red countdown strip --}}
    <div class="bg-[#CC2200] px-4 py-1.5 text-center">
        <p class="text-white font-bold text-sm md:text-base tracking-widest uppercase">
            OFFER ENDS IN &nbsp;
            <span id="sb-timer" class="font-extrabold tabular-nums">30: 00</span>
        </p>
    </div>

    {{-- Main bar --}}
    <div class="bg-[#1C023F]/90 backdrop-blur-sm px-4 py-3 md:px-8 flex items-center justify-between gap-4">

        {{-- Price + seats --}}
        <div class="flex flex-col leading-tight">
            <div class="flex items-center gap-2">
                <span class="text-white/60 line-through text-sm md:text-base">{{ $priceOld }}</span>
                <span class="text-white font-extrabold text-base md:text-xl">{{ $price }}</span>
            </div>
            <span class="text-white/70 text-xs md:text-sm">(Only {{ $seatsLeft }} seats are left)</span>
        </div>

        {{-- CTA --}}
        <a href="{{ $ctaHref }}"
           class="shrink-0 bg-[#CC2200] hover:bg-[#b31e00] text-white font-bold px-6 py-3 rounded-xl text-sm md:text-base transition-colors duration-200 whitespace-nowrap">
            {{ $ctaText }}
        </a>

    </div>
</div>

<script>
(function () {
    var bar    = document.getElementById('sticky-bar');
    var timer  = document.getElementById('sb-timer');
    var shown  = false;

    // Show bar after scrolling 300px
    window.addEventListener('scroll', function () {
        if (window.scrollY > 300 && !shown) {
            bar.style.transform = 'translateY(0)';
            shown = true;
        }
    }, { passive: true });

    // Countdown — persists across refreshes via localStorage (30-min window)
    var DURATION = 30 * 60;
    var KEY = 'sb_expiry';
    var now = Math.floor(Date.now() / 1000);
    var stored = localStorage.getItem(KEY);
    var expiry;

    if (!stored || parseInt(stored, 10) <= now) {
        expiry = now + DURATION;
        localStorage.setItem(KEY, expiry);
    } else {
        expiry = parseInt(stored, 10);
    }

    function pad(n) { return n < 10 ? '0' + n : '' + n; }

    function tick() {
        var remaining = expiry - Math.floor(Date.now() / 1000);
        if (remaining <= 0) { clearInterval(iv); timer.textContent = '00: 00'; return; }
        var h = Math.floor(remaining / 3600);
        var m = Math.floor((remaining % 3600) / 60);
        var s = remaining % 60;
        timer.textContent = (h > 0 ? pad(h) + ': ' : '') + pad(m) + ': ' + pad(s);
    }

    tick();
    var iv = setInterval(tick, 1000);
}());
</script>
