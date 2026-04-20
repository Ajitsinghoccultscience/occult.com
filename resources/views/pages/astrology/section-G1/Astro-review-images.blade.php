@props([
    'title'    => "Join 1200+ who've already transformed their lives",
    'subtitle' => 'Real students. Real results. See what they have to say.',
    'images'   => [
        'image/astrology%20assests/review%201.jpg',
        'image/astrology%20assests/review%202.jpg',
        'image/astrology%20assests/review%203.png',
        'image/astrology%20assests/review%204.jpg',
        'image/astrology%20assests/review%205.jpg',
    ],
])

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <p class="text-content text-neutral-e">{{ $subtitle }}</p>
        </div>

        {{-- Desktop: 3-column masonry layout --}}
        <div class="hidden md:grid grid-cols-3 gap-4 items-start">

            {{-- Col 1: 1 tall image --}}
            <div class="flex flex-col gap-4">
                <div class="rounded-2xl overflow-hidden shadow-sm border border-neutral-200 bg-white">
                    <img src="{{ asset($images[0]) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                </div>
            </div>

            {{-- Col 2: 2 images stacked --}}
            <div class="flex flex-col gap-4">
                <div class="rounded-2xl overflow-hidden shadow-sm border border-neutral-200 bg-white">
                    <img src="{{ asset($images[1]) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm border border-neutral-200 bg-white">
                    <img src="{{ asset($images[2]) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                </div>
            </div>

            {{-- Col 3: 2 images stacked --}}
            <div class="flex flex-col gap-4">
                <div class="rounded-2xl overflow-hidden shadow-sm border border-neutral-200 bg-white">
                    <img src="{{ asset($images[3]) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                </div>
                <div class="rounded-2xl overflow-hidden shadow-sm border border-neutral-200 bg-white">
                    <img src="{{ asset($images[4]) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                </div>
            </div>

        </div>

        {{-- Mobile: slider --}}
        <div class="md:hidden w-full overflow-x-auto scrollbar-hide snap-x snap-mandatory" id="astro-review-slider">
            <div class="flex gap-3 w-max px-1">
                @foreach($images as $img)
                    <div class="astro-review-slide shrink-0 w-[85vw] snap-center rounded-2xl overflow-hidden shadow-md border border-neutral-200 bg-white">
                        <img src="{{ asset($img) }}" alt="Review" class="w-full h-auto block" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Mobile dots --}}
        <div class="flex md:hidden justify-center gap-2 mt-5">
            @foreach($images as $i => $img)
                <button id="ar-dot-{{ $i }}" class="w-2 h-2 rounded-full transition-colors duration-300 bg-neutral-300"></button>
            @endforeach
        </div>

    </div>
</section>

<script defer>
(function () {
    const slider = document.getElementById('astro-review-slider');
    if (!slider) return;
    const slides = slider.querySelectorAll('.astro-review-slide');
    const dots   = document.querySelectorAll('[id^="ar-dot-"]');
    const total  = slides.length;
    let current  = 0, paused = false, timer;

    function setDots(idx) {
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === idx ? '#04043A' : '#d1d5db';
            d.style.width = i === idx ? '20px' : '8px';
            d.style.borderRadius = '9999px';
            d.style.transition = 'all 0.3s ease';
        });
    }

    function goTo(index) {
        if (index >= total) index = 0;
        if (index < 0) index = total - 1;
        current = index;
        slider.scrollTo({ left: slides[current].offsetLeft - 4, behavior: 'smooth' });
        setDots(current);
    }

    function startTimer() {
        clearInterval(timer);
        timer = setInterval(() => { if (!paused) goTo(current + 1); }, 2500);
    }

    goTo(0);
    startTimer();

    slider.addEventListener('mouseenter', () => { paused = true; });
    slider.addEventListener('mouseleave', () => { paused = false; });
    slider.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    slider.addEventListener('touchend', () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });

    slider.addEventListener('scroll', () => {
        const center = slider.scrollLeft + slider.clientWidth / 2;
        let closest = 0, minDist = Infinity;
        slides.forEach((s, i) => {
            const dist = Math.abs(s.offsetLeft + s.offsetWidth / 2 - center);
            if (dist < minDist) { minDist = dist; closest = i; }
        });
        if (closest !== current) { current = closest; setDots(current); }
    }, { passive: true });

    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));
})();
</script>
