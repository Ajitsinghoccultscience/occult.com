@props([
    'title'    => "Join 1200+ who've already transformed their lives",
    'subtitle' => 'Real students. Real results. See what they have to say.',
    'images'   => [
        'image/astrology assests/review 1.webp',
        'image/astrology assests/astrology google review 2.webp',
        'image/astrology assests/astrology google review 3.webp',
    ],
])

@php $rvId = 'rv-' . uniqid(); @endphp

<section class="w-full section-spacing">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <p class="text-content text-neutral-e max-w-xl mx-auto">{{ $subtitle }}</p>
        </div>

        {{-- Carousel --}}
        <div class="relative" id="{{ $rvId }}-root">

            {{-- Track wrapper --}}
            <div class="overflow-hidden" id="{{ $rvId }}-outer">
                <div id="{{ $rvId }}-track"
                     class="flex gap-5 transition-transform duration-500 ease-in-out will-change-transform">
                    @foreach($images as $img)
                    <div class="rv-slide shrink-0 w-full md:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)]">
                        <div class="rounded-2xl shadow-md border border-neutral-100 bg-white hover:-translate-y-1 transition-transform duration-300 p-3">
                            <div class="aspect-[4/5] flex items-center justify-center overflow-hidden rounded-xl bg-neutral-50">
                                <img src="{{ asset($img) }}" alt="Student Review" class="w-full h-full object-contain block" loading="lazy">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev button --}}
            <button type="button" id="{{ $rvId }}-prev"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-50 transition-colors z-10"
                aria-label="Previous">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next button --}}
            <button type="button" id="{{ $rvId }}-next"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-50 transition-colors z-10"
                aria-label="Next">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Dots --}}
            <div class="flex justify-center gap-2.5 mt-7">
                @foreach($images as $i => $_)
                <button type="button"
                    class="rv-dot rounded-full transition-all duration-300 h-2.5 {{ $i === 0 ? 'w-5 bg-[#5E3592]' : 'w-2.5 bg-neutral-300' }}"
                    data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                @endforeach
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    var ROOT = document.getElementById('{{ $rvId }}-root');
    if (!ROOT) return;

    var track   = ROOT.querySelector('#{{ $rvId }}-track');
    var outer   = ROOT.querySelector('#{{ $rvId }}-outer');
    var dots    = Array.prototype.slice.call(ROOT.querySelectorAll('.rv-dot'));
    var slides  = Array.prototype.slice.call(ROOT.querySelectorAll('.rv-slide'));
    var total   = slides.length;
    var current = 0;
    var paused  = false;
    var perView = 1;
    var maxIndex = 0;

    function calcPerView() {
        var w = outer.offsetWidth;
        if (w >= 1024)     perView = 3;
        else if (w >= 768) perView = 2;
        else               perView = 1;
        maxIndex = Math.max(0, total - perView);
    }

    function gap() { return 20; }

    function setDots(idx) {
        dots.forEach(function (d, i) {
            d.style.width           = i === idx ? '20px' : '8px';
            d.style.backgroundColor = i === idx ? '#5E3592' : '#d1d5db';
        });
    }

    function goTo(idx) {
        if (idx > maxIndex) idx = 0;
        if (idx < 0)        idx = maxIndex;
        current = idx;
        track.style.transform = 'translateX(-' + current * (slides[0].offsetWidth + gap()) + 'px)';
        setDots(current);
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    ROOT.querySelector('#{{ $rvId }}-next').addEventListener('click', function () {
        paused = true; next(); setTimeout(function () { paused = false; }, 5000);
    });
    ROOT.querySelector('#{{ $rvId }}-prev').addEventListener('click', function () {
        paused = true; prev(); setTimeout(function () { paused = false; }, 5000);
    });

    dots.forEach(function (d) {
        d.addEventListener('click', function () {
            paused = true;
            goTo(parseInt(d.dataset.index, 10));
            setTimeout(function () { paused = false; }, 5000);
        });
    });

    ROOT.addEventListener('mouseenter', function () { paused = true; });
    ROOT.addEventListener('mouseleave', function () { paused = false; });

    var touchX = 0;
    outer.addEventListener('touchstart', function (e) { touchX = e.touches[0].clientX; paused = true; }, { passive: true });
    outer.addEventListener('touchend', function (e) {
        var dx = touchX - e.changedTouches[0].clientX;
        if (Math.abs(dx) > 40) { dx > 0 ? next() : prev(); }
        setTimeout(function () { paused = false; }, 3000);
    }, { passive: true });

    setInterval(function () { if (!paused) next(); }, 3000);

    window.addEventListener('resize', function () { calcPerView(); goTo(Math.min(current, maxIndex)); });

    calcPerView();
    goTo(0);
}());
</script>
