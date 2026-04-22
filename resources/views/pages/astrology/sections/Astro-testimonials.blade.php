@props([
    'title'    => 'Trusted experiences from our learning community',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'reviews'  => [
        [
            'name'   => 'Aditya',
            'stars'  => 5,
            'avatar' => 'images/assets desktop/Aryan_Mehta.avif',
            'text'   => 'This professional astrology course completely transformed my understanding of planetary influences. Learning chart analysis helped me identify hidden personality traits with accuracy. I highly recommend this program for every aspiring astrologer seeking deep insights into human behavior and destiny.',
        ],
        [
            'name'   => 'Rahul',
            'stars'  => 5,
            'avatar' => 'images/assets desktop/Rohan_Verma.avif',
            'text'   => 'The curriculum perfectly balances ancient Vedic knowledge with modern-day application. Understanding different planetary combinations has improved my decision-making and communication skills. This training is essential for anyone interested in professional astrology or spiritual growth.',
        ],
        [
            'name'   => 'Riddhi',
            'stars'  => 4,
            'avatar' => 'images/assets desktop/Rishika.avif',
            'text'   => 'Studying various astrological principles along with practical chart reading gave me a complete learning experience. I can now confidently create detailed birth chart reports. Enrolling in this online astrology course was one of the best decisions for my career.',
        ],
        [
            'name'   => 'Karan',
            'stars'  => 5,
            'avatar' => 'images/assets desktop/Vikram_Singh.avif',
            'text'   => 'I gained immense value from the different levels of this astrology program. The experts explained complex concepts like house placements and planetary aspects in a simple way. This cost-effective course is a powerful tool for decoding life patterns through astrology.',
        ],
        [
            'name'   => 'Sneha',
            'stars'  => 5,
            'avatar' => 'images/assets desktop/Priya_Sharma.avif',
            'text'   => 'The pre-recorded sessions were detailed and perfect for my busy schedule. Exploring planetary doshas and their remedies was truly fascinating. Now, I apply these astrological techniques daily to guide my clients and help them overcome life challenges.',
        ],
    ],
])

@php
function renderStars(int $count): string {
    $html = '';
    for ($i = 1; $i <= 5; $i++) {
        $color = $i <= $count ? '#FBBF24' : '#D1D5DB';
        $html .= '<svg class="w-4 h-4" fill="'.$color.'" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>';
    }
    return $html;
}
@endphp

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto" aria-hidden="true">
        </div>

        {{-- Carousel (all screens) --}}
        <div class="relative">
            {{-- Arrow Left --}}
            <button id="tes-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 bg-white border border-neutral-200 shadow rounded-full w-9 h-9 flex items-center justify-center hover:bg-purple-50 transition hidden md:flex" aria-label="Previous">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>

            {{-- Slider track --}}
            <div class="w-full overflow-hidden">
                <div id="testimonial-slider" class="flex gap-4 px-2 md:px-0 transition-transform duration-500 ease-in-out">
                    @foreach($reviews as $review)
                    <div class="testimonial-slide shrink-0 bg-white rounded-2xl p-6 flex flex-col gap-4 shadow-sm border border-neutral-100">
                        <span class="text-4xl text-neutral-300 font-serif leading-none">"</span>
                        <p class="text-content text-neutral-b leading-relaxed flex-1">{{ $review['text'] }}</p>
                        <div class="flex items-center gap-3 mt-2">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $review['avatar'])))) }}" alt="{{ $review['name'] }}" class="w-10 h-10 rounded-full object-cover shrink-0">
                            <div>
                                <p class="font-semibold text-neutral-b text-sm">{{ $review['name'] }}</p>
                                <div class="flex gap-0.5 mt-0.5">{!! renderStars($review['stars']) !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Arrow Right --}}
            <button id="tes-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 bg-white border border-neutral-200 shadow rounded-full w-9 h-9 flex items-center justify-center hover:bg-purple-50 transition hidden md:flex" aria-label="Next">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-6">
            @foreach($reviews as $i => $review)
                <button id="tes-dot-{{ $i }}" class="h-2 rounded-full transition-all duration-300 bg-neutral-300" style="width:8px"></button>
            @endforeach
        </div>

    </div>
</section>

<script defer>
(function () {
    const track  = document.getElementById('testimonial-slider');
    if (!track) return;
    const slides = Array.from(track.querySelectorAll('.testimonial-slide'));
    const dots   = Array.from(document.querySelectorAll('[id^="tes-dot-"]'));
    const prevBtn = document.getElementById('tes-prev');
    const nextBtn = document.getElementById('tes-next');
    const total  = slides.length;
    let current  = 0, paused = false, timer;

    function perView() { return window.innerWidth >= 768 ? 3 : 1; }

    function slideWidth() {
        const gap = 16;
        const pv  = perView();
        const gutter = window.innerWidth >= 768 ? 0 : 16;
        return (track.parentElement.clientWidth - gutter - gap * (pv - 1)) / pv;
    }

    function sizeSlides() {
        const w = slideWidth();
        slides.forEach(s => { s.style.width = w + 'px'; });
    }

    function setDots(idx) {
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === idx ? '#5E3592' : '#d1d5db';
            d.style.width = i === idx ? '20px' : '8px';
        });
    }

    function maxIndex() { return Math.max(0, total - perView()); }

    function goTo(index) {
        if (index > maxIndex()) index = 0;
        if (index < 0) index = maxIndex();
        current = index;
        const offset = (slideWidth() + 16) * current;
        track.style.transform = `translateX(-${offset}px)`;
        setDots(current);
    }

    function startTimer() {
        clearInterval(timer);
        timer = setInterval(() => { if (!paused) goTo(current + 1); }, 3000);
    }

    sizeSlides();
    goTo(0);
    startTimer();

    window.addEventListener('resize', () => { sizeSlides(); goTo(current); });

    if (prevBtn) prevBtn.addEventListener('click', () => { paused = true; goTo(current - 1); setTimeout(() => paused = false, 3000); });
    if (nextBtn) nextBtn.addEventListener('click', () => { paused = true; goTo(current + 1); setTimeout(() => paused = false, 3000); });

    track.addEventListener('mouseenter', () => { paused = true; });
    track.addEventListener('mouseleave', () => { paused = false; });
    track.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    track.addEventListener('touchend', () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });

    dots.forEach((dot, i) => dot.addEventListener('click', () => { paused = true; goTo(i); setTimeout(() => paused = false, 3000); }));

    // Touch swipe
    let touchX = 0;
    track.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', e => {
        const diff = touchX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) goTo(current + (diff > 0 ? 1 : -1));
    }, { passive: true });
})();
</script>
