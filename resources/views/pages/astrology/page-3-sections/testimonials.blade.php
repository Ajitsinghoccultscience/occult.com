@props([
    'title'        => 'Trusted experiences from our learning community',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'testimonials' => [
        [
            'name'   => 'Aditya',
            'role'   => 'Astrology Student',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'This professional astrology course completely transformed my understanding of planetary influences. Learning chart analysis helped me identify hidden personality traits with accuracy. I highly recommend this program for every aspiring astrologer seeking deep insights into human behavior and destiny.',
        ],
        [
            'name'   => 'Sneha',
            'role'   => 'Working Professional',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'The pre-recorded sessions were detailed and perfect for my busy schedule. Exploring planetary doshas and their remedies was truly fascinating. Now, I apply these astrological techniques daily to guide my clients and help them overcome life challenges.',
        ],
        [
            'name'   => 'Karan',
            'role'   => 'Entrepreneur',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'I gained immense value from the different levels of this astrology program. The experts explained complex concepts like house placements and planetary aspects in a simple way. This cost-effective tool for decoding life patterns through astrology has been a game changer for me.',
        ],
        [
            'name'   => 'Riddhi',
            'role'   => 'Teacher',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'Studying various astrological principles along with practical chart reading gave me a complete learning experience. I can now confidently create detailed birth chart reports. Enrolling in this online astrology course was one of the best decisions for my career.',
        ],
        [
            'name'   => 'Meena',
            'role'   => 'Homemaker',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'The live sessions were incredibly engaging and the faculty was always patient with our questions. I started from zero and now I can read birth charts confidently. This institute has truly changed my perspective on life and destiny.',
        ],
        [
            'name'   => 'Vikram',
            'role'   => 'Business Analyst',
            'avatar' => 'image/astrology%20assests/laxmi%20mam.webp',
            'rating' => 5,
            'text'   => 'Outstanding curriculum with practical application at every step. The blend of theory and real case studies made the learning experience extremely rewarding. I now use astrology to make better personal and professional decisions.',
        ],
    ],
])

@php
    $tsId  = 'trust-' . uniqid();
    $total = count($testimonials);
@endphp

<section class="w-full section-spacing section-px bg-neutral-bg">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">

        {{-- ── HEADING ─────────────────────────────────────────────────── --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.5px] mb-3">
                {{ $title }}
            </h2>
            <img src="{{ asset($underlineSvg) }}" alt="" aria-hidden="true"
                 class="mx-auto w-[140px] h-auto">
        </div>

        {{-- ── CAROUSEL ─────────────────────────────────────────────────── --}}
        <div class="relative" id="{{ $tsId }}-root">

            {{-- Overflow clip --}}
            <div class="overflow-hidden -mx-3 px-3 md:-mx-4 md:px-4 pb-4" id="{{ $tsId }}-outer">

                {{-- Slide track --}}
                <div id="{{ $tsId }}-track"
                     class="flex gap-5 md:gap-6 transition-transform duration-500 ease-in-out will-change-transform">

                    @foreach($testimonials as $item)
                    <div class="ts-item shrink-0
                                w-full
                                md:w-[calc(50%-10px)]
                                lg:w-[calc(25%-15px)]">

                        {{-- TestimonialCard via x-ui.card --}}
                        <x-ui.card
                            variant="white"
                            class="!rounded-2xl !p-6 !shadow-none flex flex-col gap-4 h-full
                                   transition-all duration-300 hover:-translate-y-1 cursor-default">

                            {{-- Quote icon --}}
                            <div class="text-neutral-b opacity-80 leading-none select-none" aria-hidden="true">
                                <svg width="32" height="26" viewBox="0 0 32 26" fill="currentColor">
                                    <path d="M0 26V15.167C0 6.722 5.333 1.722 16 0l1.867 2.833C12.4 4.056 9.333 6.556 8.667 10.333H14V26H0Zm18 0V15.167C18 6.722 23.333 1.722 34 0l1.867 2.833C30.4 4.056 27.333 6.556 26.667 10.333H32V26H18Z"/>
                                </svg>
                            </div>

                            {{-- Testimonial text --}}
                            <p class="text-content text-neutral-c leading-relaxed flex-1">
                                {{ $item['text'] }}
                            </p>

                            {{-- Profile + stars --}}
                            <div class="flex items-center gap-3 pt-2 border-t border-neutral-h/50">
                                <x-ui.avatar
                                    :src="$item['avatar']"
                                    :alt="$item['name']"
                                    size="md"
                                />
                                <div class="min-w-0">
                                    <p class="font-semibold text-neutral-b text-[15px] leading-snug truncate">
                                        {{ $item['name'] }}
                                    </p>
                                    <x-ui.star-rating :rating="$item['rating']" size="sm" class="mt-0.5"/>
                                </div>
                            </div>

                        </x-ui.card>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- ── DOTS ─────────────────────────────────────────────────── --}}
            <div class="flex justify-center gap-2.5 mt-7" id="{{ $tsId }}-dots" aria-label="Carousel navigation">
                @foreach($testimonials as $i => $_)
                <button type="button"
                    class="ts-dot rounded-full transition-all duration-300 mb-2
                           {{ $i === 0
                               ? 'w-5 h-2.5 bg-neutral-b'
                               : 'w-2.5 h-2.5 bg-neutral-h' }}"
                    data-index="{{ $i }}"
                    aria-label="Go to slide {{ $i + 1 }}">
                </button>
                @endforeach
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    var ROOT = document.getElementById('{{ $tsId }}-root');
    if (!ROOT) return;

    var track  = ROOT.querySelector('#{{ $tsId }}-track');
    var outer  = ROOT.querySelector('#{{ $tsId }}-outer');
    var dots   = Array.prototype.slice.call(ROOT.querySelectorAll('.ts-dot'));
    var items  = Array.prototype.slice.call(ROOT.querySelectorAll('.ts-item'));
    var total  = {{ $total }};

    var current  = 0;
    var paused   = false;
    var perView  = 4;
    var maxIndex = 0;

    function calcPerView() {
        var w = outer.offsetWidth;
        if (w < 768)       perView = 1;
        else if (w < 1024) perView = 2;
        else               perView = 4;
        maxIndex = Math.max(0, total - perView);
    }

    function itemWidth() {
        return items[0] ? items[0].offsetWidth : 0;
    }

    function gap() {
        /* gap-5 = 20px mobile/tablet, gap-6 = 24px desktop */
        return outer.offsetWidth >= 1024 ? 24 : 20;
    }

    function updateDots(idx) {
        dots.forEach(function (d, i) {
            var active = i === idx;
            d.classList.toggle('w-5',      active);
            d.classList.toggle('h-2.5',    true);
            d.classList.toggle('w-2.5',    !active);
            d.classList.toggle('bg-neutral-b', active);
            d.classList.toggle('bg-neutral-h', !active);
        });
    }

    function goTo(idx) {
        if (idx > maxIndex) idx = 0;
        if (idx < 0)        idx = maxIndex;
        current = idx;
        track.style.transform = 'translateX(-' + current * (itemWidth() + gap()) + 'px)';
        updateDots(current);
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    /* dots */
    dots.forEach(function (d) {
        d.addEventListener('click', function () {
            paused = true;
            goTo(parseInt(d.dataset.index, 10));
            setTimeout(function () { paused = false; }, 6000);
        });
    });

    /* pause on hover */
    ROOT.addEventListener('mouseenter', function () { paused = true; });
    ROOT.addEventListener('mouseleave', function () { paused = false; });

    /* mouse drag */
    var dragStart = null;
    var wasDragging = false;
    outer.addEventListener('mousedown', function (e) {
        dragStart   = e.clientX;
        wasDragging = false;
        paused      = true;
        outer.style.cursor = 'grabbing';
        e.preventDefault();
    });
    window.addEventListener('mousemove', function (e) {
        if (dragStart === null) return;
        if (Math.abs(e.clientX - dragStart) > 6) wasDragging = true;
    });
    window.addEventListener('mouseup', function (e) {
        if (dragStart === null) return;
        var dx = dragStart - e.clientX;
        if (Math.abs(dx) > 50) { dx > 0 ? next() : prev(); }
        dragStart          = null;
        outer.style.cursor = '';
        setTimeout(function () { paused = false; }, 6000);
    });

    /* touch swipe */
    var touchX = 0;
    outer.addEventListener('touchstart', function (e) {
        touchX = e.touches[0].clientX;
        paused = true;
    }, { passive: true });
    outer.addEventListener('touchend', function (e) {
        var dx = touchX - e.changedTouches[0].clientX;
        if (Math.abs(dx) > 40) { dx > 0 ? next() : prev(); }
        setTimeout(function () { paused = false; }, 6000);
    }, { passive: true });

    /* auto slide */
    setInterval(function () { if (!paused) next(); }, 4000);

    /* resize */
    window.addEventListener('resize', function () {
        calcPerView();
        goTo(Math.min(current, maxIndex));
    });

    /* init */
    calcPerView();
    goTo(0);
}());
</script>
