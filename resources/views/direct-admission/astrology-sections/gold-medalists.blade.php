@props([
    'title'  => 'Our Gold Medalist Students',
    'images' => [
        'image/astrology assests/convo 1.webp',
        'image/astrology assests/convo 2.webp',
        'image/astrology assests/convo 3.webp',
        'image/astrology assests/convo 4.webp',
        'image/astrology assests/convo 5.webp',
        'image/astrology assests/convo 6.webp',
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Carousel --}}
        <div class="relative">
            {{-- Scroll track --}}
            <div id="gm-track" class="flex gap-4 overflow-x-auto scrollbar-hide snap-x snap-mandatory pb-2">
                @foreach($images as $src)
                <div class="shrink-0 w-[85vw] sm:w-[60vw] md:w-[calc(33.333%-11px)] snap-start rounded-xl overflow-hidden aspect-[4/3] shadow-sm">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $src)))) }}"
                         alt="Gold Medalist Student"
                         class="w-full h-full object-cover"
                         loading="lazy">
                </div>
                @endforeach
            </div>

            {{-- Prev button --}}
            <button id="gm-prev"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 w-10 h-10 rounded-full bg-white border border-neutral-200 shadow-md items-center justify-center hover:bg-neutral-50 transition-colors z-10"
                aria-label="Previous">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next button --}}
            <button id="gm-next"
                class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 w-10 h-10 rounded-full bg-white border border-neutral-200 shadow-md items-center justify-center hover:bg-neutral-50 transition-colors z-10"
                aria-label="Next">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div id="gm-dots" class="flex justify-center gap-2 mt-4">
            @foreach($images as $i => $src)
            <button class="gm-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-neutral-b scale-125' : 'bg-neutral-300' }}"
                    aria-label="Slide {{ $i + 1 }}"></button>
            @endforeach
        </div>

<script>
(function () {
    const track = document.getElementById('gm-track');
    const dots  = document.querySelectorAll('.gm-dot');
    const prev  = document.getElementById('gm-prev');
    const next  = document.getElementById('gm-next');
    if (!track) return;

    const slides = track.querySelectorAll(':scope > div');
    let current = 0;

    function goTo(index) {
        current = Math.max(0, Math.min(index, slides.length - 1));
        track.scrollTo({ left: slides[current].offsetLeft, behavior: 'smooth' });
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === current ? '#111' : '#d1d5db';
            d.style.transform = i === current ? 'scale(1.25)' : 'scale(1)';
        });
    }

    if (prev) prev.addEventListener('click', () => goTo(current - 1));
    if (next) next.addEventListener('click', () => goTo(current + 1));
    dots.forEach((d, i) => d.addEventListener('click', () => goTo(i)));

    // Sync dot on manual scroll
    let scrollTimer;
    track.addEventListener('scroll', () => {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(() => {
            const idx = Array.from(slides).findIndex(s =>
                Math.abs(s.offsetLeft - track.scrollLeft) < s.offsetWidth / 2
            );
            if (idx >= 0) goTo(idx);
        }, 100);
    }, { passive: true });

    // Auto-advance every 4s
    setInterval(() => goTo((current + 1) % slides.length), 4000);
})();
</script>

    </div>
</section>
