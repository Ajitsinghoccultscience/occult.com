@props([
    'title'        => 'Our 2025 Convocation',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'images' => [
        'image/astrology%20assests/convo%201.jpg',
        'image/astrology%20assests/convo%202.jpg',
        'image/astrology%20assests/convo%203.jpg',
        'image/astrology%20assests/convo%204.jpg',
        'image/astrology%20assests/convo%205.jpg',
        'image/astrology%20assests/convo%206.jpg',
        'image/astrology%20assests/convo%207.jpg',
        'image/astrology%20assests/convo%208.jpg',
        'image/astrology%20assests/convo%209.jpg',
        'image/astrology%20assests/convo%2010.jpg',
    ],
])

<section class="w-full bg-white section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[140px] h-auto" aria-hidden="true">
        </div>

        {{-- Slider --}}
        <div class="relative">
            <div class="w-full overflow-x-auto scrollbar-hide" id="convo-slider">
                <div class="flex gap-4 w-max">
                    @foreach($images as $img)
                        <div class="convo-slide shrink-0 w-[85vw] sm:w-[55vw] lg:w-[30vw] rounded-xl overflow-hidden shadow-drop aspect-[4/3]">
                            <img src="{{ asset($img) }}" alt="Convocation"
                                 class="w-full h-full object-cover" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev button --}}
            <button id="convo-prev"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-bg transition-colors z-10"
                aria-label="Previous">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next button --}}
            <button id="convo-next"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-bg transition-colors z-10"
                aria-label="Next">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-5">
            @foreach($images as $i => $img)
                <button id="convo-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300 bg-neutral-h"></button>
            @endforeach
        </div>

    </div>
</section>

<script>
(function () {
    const slider = document.getElementById('convo-slider');
    if (!slider) return;

    const slides = slider.querySelectorAll('.convo-slide');
    const dots   = document.querySelectorAll('[id^="convo-dot-"]');
    const total  = slides.length;
    let current  = 0;
    let paused   = false;

    function goTo(index) {
        if (index >= total) index = 0;
        if (index < 0) index = total - 1;
        current = index;
        slider.scrollTo({ left: slides[current].offsetLeft - 16, behavior: 'smooth' });
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === current ? '#5E3592' : '#d6d6d6';
        });
    }

    goTo(0);

    document.getElementById('convo-next')?.addEventListener('click', () => { paused = true; goTo(current + 1); setTimeout(() => paused = false, 3000); });
    document.getElementById('convo-prev')?.addEventListener('click', () => { paused = true; goTo(current - 1); setTimeout(() => paused = false, 3000); });
    dots.forEach((dot, i) => dot.addEventListener('click', () => { paused = true; goTo(i); setTimeout(() => paused = false, 3000); }));

    setInterval(() => { if (!paused) goTo(current + 1); }, 2500);

    slider.addEventListener('mouseenter', () => { paused = true; });
    slider.addEventListener('mouseleave', () => { paused = false; });
    slider.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    slider.addEventListener('touchend',   () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });
})();
</script>


