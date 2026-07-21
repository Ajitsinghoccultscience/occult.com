@props([
    'title' => 'Value Stack',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'pricingItems' => [
        ['label' => '2 Hour Live Training', 'price' => '₹379'],
        ['label' => 'Practice Worksheet',   'price' => '₹149'],
        ['label' => 'PDF Notes',            'price' => '₹79'],
        ['label' => 'Bonus Material',       'price' => '₹392'],
    ],
    'totalValue' => '₹999',
    'offerPrice' => '₹49',
    'originalPrice' => '₹999',
    'ctaText' => 'Register Now',
    'ctaHref' => '#',
    'iconsPath' => 'images/Graphology (logo)/untitled folder 3',
    'bonusItems' => [
        ['icon' => 'Practice worksheets.svg', 'label' => 'Practice Worksheets'],
        ['icon' => 'Pdf notes.svg', 'label' => 'PDF Notes'],
        ['icon' => 'Live Q&A.svg', 'label' => 'Live Q&A Access'],
    ],
    'countdown' => ['days' => '04', 'hours' => '00', 'min' => '00', 'sec' => '00'],
    'bgImage' => 'images/graphology image/value.webp',
    'bgImageMobile' => 'images/graphology image/value stack.webp',
])

<section class="w-full section-spacing">
    <div class="max-w-[93.75rem] mx-auto section-px">
        <div class="rounded-xl overflow-hidden relative w-full min-h-[42.25rem]">
            {{-- Mobile & Tablet background --}}
            <div class="lg:hidden absolute inset-0 bg-cover bg-center rounded-xl" style="background-image: url('{{ asset($bgImageMobile) }}');"></div>
            {{-- Desktop background --}}
            <div class="hidden lg:block absolute inset-0 bg-cover bg-center rounded-xl" style="background-image: url('{{ asset($bgImage) }}');"></div>
            <div class="absolute inset-0 bg-black/40 rounded-xl"></div>
            <div class="relative py-10 md:py-16 lg:py-20 xl:py-24 section-px flex flex-col items-center min-h-[42.25rem] lg:min-h-[48rem] transition-responsive">
                <div class="w-full max-w-full lg:max-w-[80%] grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center transition-responsive">
                    {{-- Value Stack title (mobile/tablet: centered gold) --}}
                    <div class="lg:hidden w-full text-center mb-2">
                        <h2 class="text-heading font-bold text-button-gradient mb-3">{{ $title }}</h2>
                        <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
                    </div>
                    {{-- Left: Pricing card + Secure Payment --}}
                    <div class="w-full max-w-[394px] shrink-0 mx-auto lg:mx-0 order-1">
                        <x-ui.card variant="white" class="rounded-10 shadow-card p-8 md:p-8 w-full max-w-[394px] min-h-0 md:h-[375px] flex flex-col justify-between">
                            <div class="space-y-5">
                                @foreach($pricingItems as $item)
                                    <div class="flex justify-between items-center">
                                        <span class="text-content font-medium text-neutral-b">{{ $item['label'] }}</span>
                                        <span class="text-content font-medium text-neutral-b ml-4 shrink-0">-&nbsp;&nbsp;{{ $item['price'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex justify-between items-center mt-8">
                                <span class="text-content font-bold text-secondary">Total Value:</span>
                                <span class="text-content font-bold text-secondary">{{ $totalValue }}</span>
                            </div>
                            <div class="mt-10 flex justify-center">
                                <x-ui.button :href="$ctaHref" variant="primary" :fullWidth="true" class="!min-w-0 !text-neutral-b !py-4 !px-8 rounded-lg md:!w-auto">
                                    {{ $ctaText }} &#64;{{ $offerPrice }} <span class="line-through opacity-90 ml-1">{{ $originalPrice }}</span>
                                </x-ui.button>
                            </div>
                        </x-ui.card>
                       
                    </div>

                    {{-- Right: Bonus Material + Countdown --}}
                    <div class="text-white flex flex-col space-y-8 md:space-y-10 items-start w-full max-w-[394px] mx-auto lg:mx-0 lg:max-w-none order-2">
                        <div class="w-full">
                            <h3 class="text-subheading font-bold text-button-gradient mb-6">Bonus Material</h3>
                            <ul class="space-y-5">
                                @foreach($bonusItems as $item)
                                    <li class="flex items-center gap-4">
                                        <span class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 p-2 bg-white">
                                            <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="" class="w-full h-full object-contain">
                                        </span>
                                        <span class="text-content font-bold text-white">{{ $item['label'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="w-full">
                            <h3 class="text-subheading font-bold text-button-gradient text-center md:text-left mb-6">Registration Closes in 52 Minutes!</h3>
                            <div class="flex items-center justify-center md:justify-start gap-3 md:gap-4 flex-wrap">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 flex items-center justify-center rounded-lg border-2 border-white/80 bg-black/30 md:bg-white md:border-transparent md:shadow-md">
                                        <span class="text-2xl font-bold text-white md:text-neutral-b" id="countdown-days">--</span>
                                    </div>
                                    <span class="text-sm mt-2 font-bold text-button-gradient">Days</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 flex items-center justify-center rounded-lg border-2 border-white/80 bg-black/30 md:bg-white md:border-transparent md:shadow-md">
                                        <span class="text-2xl font-bold text-white md:text-neutral-b" id="countdown-hours">--</span>
                                    </div>
                                    <span class="text-sm mt-2 font-bold text-button-gradient">Hour</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 flex items-center justify-center rounded-lg border-2 border-white/80 bg-black/30 md:bg-white md:border-transparent md:shadow-md">
                                        <span class="text-2xl font-bold text-white md:text-neutral-b" id="countdown-min">--</span>
                                    </div>
                                    <span class="text-sm mt-2 font-bold text-button-gradient">Min</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 flex items-center justify-center rounded-lg border-2 border-white/80 bg-black/30 md:bg-white md:border-transparent md:shadow-md">
                                        <span class="text-2xl font-bold text-white md:text-neutral-b" id="countdown-sec">--</span>
                                    </div>
                                    <span class="text-sm mt-2 font-bold text-button-gradient">Sec</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="countdown-initial" data-days="{{ $countdown['days'] }}" data-hours="{{ $countdown['hours'] }}" data-min="{{ $countdown['min'] }}" data-sec="{{ $countdown['sec'] }}" class="hidden"></div>
<script defer>
(function() {
    var daysEl  = document.getElementById('countdown-days');
    var hoursEl = document.getElementById('countdown-hours');
    var minEl   = document.getElementById('countdown-min');
    var secEl   = document.getElementById('countdown-sec');
    var initEl  = document.getElementById('countdown-initial');
    if (!daysEl || !hoursEl || !minEl || !secEl || !initEl) return;

    var d0 = parseInt(initEl.dataset.days,  10) || 0;
    var h0 = parseInt(initEl.dataset.hours, 10) || 0;
    var m0 = parseInt(initEl.dataset.min,   10) || 0;
    var s0 = parseInt(initEl.dataset.sec,   10) || 0;
    var TOTAL = d0 * 86400 + h0 * 3600 + m0 * 60 + s0;

    // Key includes TOTAL so changing props forces a fresh timer for all visitors
    var KEY = 'vs_timer_end_' + TOTAL;

    function pad(n) { return String(n).padStart(2, '0'); }

    function getEndTime() {
        var stored = localStorage.getItem(KEY);
        var now = Math.floor(Date.now() / 1000);
        if (stored) {
            var val = parseInt(stored);
            if (val > now && val <= now + TOTAL) return val;
        }
        var end = now + TOTAL;
        localStorage.setItem(KEY, end);
        return end;
    }

    var endTime = getEndTime();

    function tick() {
        var now = Math.floor(Date.now() / 1000);
        var remaining = endTime - now;
        if (remaining <= 0) {
            endTime = now + TOTAL;
            localStorage.setItem(KEY, endTime);
            remaining = TOTAL;
        }
        daysEl.textContent  = pad(Math.floor(remaining / 86400));
        hoursEl.textContent = pad(Math.floor((remaining % 86400) / 3600));
        minEl.textContent   = pad(Math.floor((remaining % 3600) / 60));
        secEl.textContent   = pad(remaining % 60);
    }

    tick();
    setInterval(tick, 1000);
})();
</script>
