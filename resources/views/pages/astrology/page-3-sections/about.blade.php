@props([
    'heading' => 'All India Institute Of Occult Science: (providing guidance since 2004 )',
    'instituteBullets' => [
        'Registered under the government of NCT of Delhi.',
        'Globally recognised certification in vedic astrology and more.',
        'Students trained here are working as professional consultants across India and abroad.',
        'Founded by Gurudev Shrie - practising Astrology for the last 40 years.',
    ],
    'counters' => [
        ['icon' => 'image/astrology%20assests/instagram.svg', 'value' => '52,000+', 'label' => 'Instagram Followers'],
        ['icon' => 'image/astrology%20assests/youtube.svg',   'value' => '15,400+', 'label' => 'Youtube Followers'],
        ['icon' => null,                                       'value' => '97,000+', 'label' => 'Certified Students'],
    ],
    'gallery' => [
        ['src' => 'image/astrology assests/institute/laxmi mam.webp',          'caption' => 'Our Trainer Laxmi Mam'],
        ['src' => 'image/astrology assests/institute/Lamp-lighting-event.webp', 'caption' => 'Lamp Lighting Ceremony'],
        ['src' => 'image/astrology assests/institute/convocation.webp',         'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/institute/MP-as_chief.webp',         'caption' => 'MP as a Chief guest at our Convocation'],
        ['src' => 'image/astrology assests/institute/LampLighting.webp',        'caption' => 'Lamp Lighting Ceremony'],
        ['src' => 'image/astrology assests/institute/Founder-speech.webp',      'caption' => 'Founder Speech at Annual Convocation'],
        ['src' => 'image/astrology assests/institute/Our-faculty.webp',         'caption' => 'Our Faculty'],
        ['src' => 'image/astrology assests/institute/Grand-convocation.webp',   'caption' => 'Grand Convocation Ceremony'],
        ['src' => 'image/astrology assests/institute/Trusted-by.webp',          'caption' => 'Annual Convocation'],
        ['src' => 'image/astrology assests/institute/intitute-event.webp',      'caption' => 'Institute Event'],
        ['src' => 'image/astrology assests/institute/Education-day.webp',       'caption' => 'Our Certified Students'],
    ],
])

@php
    $sliderId = 'about-slider-' . uniqid();
    $total    = count($gallery);
@endphp

{{-- No bg on section — parent adds background image --}}
<section class="w-full section-spacing  section-spacing-after px-2 md:px-6">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">

        {{-- ── OUTER CARD ─────────────────────────────────────────────────── --}}
        <x-ui.card variant="purple" class="!rounded-3xl !p-6 md:!p-8 xl:!p-10 space-y-7">

            {{-- Heading --}}
            <h2 class="text-heading font-bold text-white text-center leading-snug tracking-[0.5px]">
                {{ $heading }}
            </h2>

            {{-- ── IMAGE SLIDER ─────────────────────────────────────────── --}}
            <div class="relative group bg-white px-2 py-2 rounded-2xl" id="{{ $sliderId }}-wrap">

                {{-- Track --}}
                <div id="{{ $sliderId }}"
                     class="flex gap-3 md:gap-4 overflow-hidden">
                    @foreach($gallery as $photo)
                    @php
                        $encoded = implode('/', array_map('rawurlencode', explode('/', $photo['src'])));
                    @endphp
                    <div class="about-slide shrink-0
                                w-[78vw] sm:w-[55vw] md:w-[calc(25%-9px)]
                                relative rounded-xl overflow-hidden aspect-[4/3]">
                        <img
                            src="{{ asset($encoded) }}"
                            alt="{{ $photo['caption'] }}"
                            width="800" height="600"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent pointer-events-none"></div>
                        <p class="absolute bottom-0 left-0 right-0 px-3 py-2
                                  text-white text-sm font-semibold leading-snug">
                            {{ $photo['caption'] }}
                        </p>
                    </div>
                    @endforeach
                </div>

                {{-- Prev button --}}
                <button type="button" id="{{ $sliderId }}-prev"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 z-10
                           w-9 h-9 rounded-full bg-white border border-neutral-200
                           flex items-center justify-center
                           opacity-0 group-hover:opacity-100 transition-opacity duration-200
                           hover:bg-neutral-50 focus:outline-none"
                    aria-label="Previous slide">
                    <svg class="w-4 h-4 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                {{-- Next button --}}
                <button type="button" id="{{ $sliderId }}-next"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 z-10
                           w-9 h-9 rounded-full bg-white border border-neutral-200
                           flex items-center justify-center
                           opacity-0 group-hover:opacity-100 transition-opacity duration-200
                           hover:bg-neutral-50 focus:outline-none"
                    aria-label="Next slide">
                    <svg class="w-4 h-4 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            {{-- ── BOTTOM ROW ────────────────────────────────────────────── --}}
            <div class="flex flex-col lg:flex-row gap-7 lg:gap-10 items-start">

                {{-- Bullets --}}
                <ul class="flex-1 space-y-3">
                    @foreach($instituteBullets as $bullet)
                    <li class="flex items-start gap-2.5 text-content text-white/90 leading-relaxed">
                        <span class="shrink-0 mt-[6px] w-1.5 h-1.5 rounded-full bg-white/70 inline-block"></span>
                        <span>{{ $bullet }}</span>
                    </li>
                    @endforeach
                </ul>

                {{-- Stats card --}}
                <div class="shrink-0 w-full lg:w-[340px] xl:w-[380px]
                            rounded-2xl bg-white overflow-hidden
                            border-2 border-[#800202]">
                    <div class="grid grid-cols-3 divide-x divide-neutral-200">
                        @foreach($counters as $counter)
                        <div class="flex flex-col items-center justify-center gap-2
                                    py-5 px-2 sm:px-3 text-center">
                            @if($counter['icon'])
                                <img src="{{ asset($counter['icon']) }}"
                                     alt="{{ $counter['label'] }}"
                                     class="w-9 h-9 sm:w-10 sm:h-10 object-contain">
                            @else
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-green-500
                                            flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                                    </svg>
                                </div>
                            @endif
                            <p class="text-subheading font-bold text-neutral-b leading-none">
                                {{ $counter['value'] }}
                            </p>
                            <p class="text-xs text-neutral-e leading-tight">
                                {{ $counter['label'] }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </x-ui.card>
        {{-- /OUTER CARD --}}

    </div>
</section>

<script>
(function () {
    var id      = '{{ $sliderId }}';
    var total   = {{ $total }};
    var current = 0;
    var paused  = false;
    var touchX  = 0;

    function track()  { return document.getElementById(id); }
    function slides() { return track() ? Array.prototype.slice.call(track().querySelectorAll('.about-slide')) : []; }

    function perPage() {
        var s = slides();
        var t = track();
        if (!s.length || !t) return 4;
        return Math.max(1, Math.round(t.offsetWidth / (s[0].offsetWidth + 16)));
    }

    function goTo(idx) {
        var s = slides();
        var t = track();
        if (!s.length || !t) return;
        var max = Math.max(0, total - perPage());
        if (idx > max) idx = 0;
        if (idx < 0)   idx = max;
        current = idx;
        t.scrollTo({ left: s[current].offsetLeft, behavior: 'smooth' });
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function init() {
        var t    = track();
        var nBtn = document.getElementById(id + '-next');
        var pBtn = document.getElementById(id + '-prev');
        if (!t) return;

        if (nBtn) nBtn.addEventListener('click', function () { paused = true; next(); setTimeout(function () { paused = false; }, 5000); });
        if (pBtn) pBtn.addEventListener('click', function () { paused = true; prev(); setTimeout(function () { paused = false; }, 5000); });

        t.addEventListener('mouseenter', function () { paused = true; });
        t.addEventListener('mouseleave', function () { paused = false; });

        t.addEventListener('touchstart', function (e) { touchX = e.touches[0].clientX; paused = true; }, { passive: true });
        t.addEventListener('touchend', function (e) {
            var dx = touchX - e.changedTouches[0].clientX;
            if (dx > 40) next();
            else if (dx < -40) prev();
            setTimeout(function () { paused = false; }, 5000);
        }, { passive: true });

        var scrollTimer;
        t.addEventListener('scroll', function () {
            paused = true;
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function () {
                var s = slides();
                if (s.length) {
                    current = Math.round(t.scrollLeft / (s[0].offsetWidth + 16));
                    current = Math.max(0, Math.min(current, total - 1));
                }
                paused = false;
            }, 600);
        }, { passive: true });
    }

    setInterval(function () { if (!paused) next(); }, 4000);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}());
</script>
