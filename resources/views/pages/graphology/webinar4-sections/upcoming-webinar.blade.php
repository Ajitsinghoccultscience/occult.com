@php
    $ctaHref = $ctaHref ?? '/graphology-checkout';
    $date    = $date    ?? '12th April, 2026';
    $time    = $time    ?? '11:00 Am - 2:00 Pm';

    $base       = 'image/graphology(HR) assests/graphology assests HR (mobile)/Upcoming Webinar';
    $dateIcon   = $base.'/date (upcoming).svg';
    $timeIcon   = $base.'/time(upcoming).svg';
    $webinarImg = $base.'/webinar 1.webp';
@endphp

{{-- ═══════════════════════════════════
     UPCOMING WEBINAR
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-[1340px] mx-auto section-px">

        <div class="bg-white rounded-3xl shadow-lg p-6 md:p-8">
            {{-- Mobile order: title+badge → image → timer.  Desktop: left col = title/badge + timer, right col = image --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-x-10 lg:gap-y-6 lg:items-center">

                {{-- Title + Badge --}}
                <div class="text-center lg:text-left lg:col-start-1 lg:row-start-1">
                    <h2 class="text-xl md:text-2xl font-bold text-neutral-b mb-4 pb-1 inline-block border-b-[3px] border-[#ff9700]">
                        Upcoming Webinar on
                    </h2>

                    {{-- Date / Time pill --}}
                    <div class="flex justify-center lg:justify-start">
                        <div class="inline-flex items-stretch rounded-2xl border-b-[3px] border-[#ff9700] shadow-md overflow-hidden">
                            <div class="px-5 py-3 text-left">
                                <div class="flex items-center gap-2.5 mb-1.5">
                                    <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $dateIcon)))) }}" alt="" class="w-4 h-4 object-contain" aria-hidden="true">
                                    </span>
                                    <p class="text-base font-bold text-neutral-b">Date</p>
                                </div>
                                <p class="text-sm md:text-base text-neutral-b/80">{{ $date }}</p>
                            </div>
                            <div class="w-px bg-neutral-300"></div>
                            <div class="px-5 py-3 text-left">
                                <div class="flex items-center gap-2.5 mb-1.5">
                                    <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $timeIcon)))) }}" alt="" class="w-4 h-4 object-contain" aria-hidden="true">
                                    </span>
                                    <p class="text-base font-bold text-neutral-b">Time</p>
                                </div>
                                <p class="text-sm md:text-base text-neutral-b/80">{{ $time }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Webinar image (right column on desktop, spans both rows) --}}
                <div class="lg:col-start-2 lg:row-start-1 lg:row-span-2 flex items-center">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $webinarImg)))) }}"
                         alt="Live webinar session"
                         class="w-full h-auto object-contain rounded-xl"
                         loading="lazy">
                </div>

                {{-- Registration + countdown --}}
                <div class="text-center lg:text-left lg:col-start-1 lg:row-start-2">
                    <h3 class="text-base md:text-lg font-bold text-neutral-b mb-3 pb-1 inline-block border-b-[3px] border-[#ff9700]">
                        Registration in :
                    </h3>
                    <div class="flex justify-center lg:justify-start items-center gap-2 mb-3" id="reg-countdown" data-minutes="10" data-seconds="6">
                        <span class="cd-unit w-12 h-12 md:w-14 md:h-14 rounded-lg flex items-center justify-center text-lg md:text-xl font-bold text-white" style="background-color:#ff9700;" data-cd="hh">00</span>
                        <span class="text-xl font-bold text-[#ff9700]">:</span>
                        <span class="cd-unit w-12 h-12 md:w-14 md:h-14 rounded-lg flex items-center justify-center text-lg md:text-xl font-bold text-white" style="background-color:#ff9700;" data-cd="mm">10</span>
                        <span class="text-xl font-bold text-[#ff9700]">:</span>
                        <span class="cd-unit w-12 h-12 md:w-14 md:h-14 rounded-lg flex items-center justify-center text-lg md:text-xl font-bold text-white" style="background-color:#ff9700;" data-cd="ss">06</span>
                    </div>
                    <p class="text-xs md:text-sm text-neutral-b/60">To Unlock Bonus Worth ₹4,999/-</p>
                </div>

            </div>
        </div>

    </div>
</section>

@push('scripts')
<script defer>
(function () {
    var el = document.getElementById('reg-countdown');
    if (!el) return;
    var total = (parseInt(el.dataset.minutes || '10', 10) * 60) + parseInt(el.dataset.seconds || '0', 10);
    var hh = el.querySelector('[data-cd=hh]'),
        mm = el.querySelector('[data-cd=mm]'),
        ss = el.querySelector('[data-cd=ss]');
    function pad(n) { return n < 10 ? '0' + n : '' + n; }
    function tick() {
        var h = Math.floor(total / 3600),
            m = Math.floor((total % 3600) / 60),
            s = total % 60;
        hh.textContent = pad(h); mm.textContent = pad(m); ss.textContent = pad(s);
        if (total > 0) { total--; }
    }
    tick();
    setInterval(tick, 1000);
})();
</script>
@endpush
