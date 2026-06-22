@php
    $title  = $title  ?? 'Moments That Reflects Our Legacy';
    $images = $images ?? [
        'images/Our Guest/guest 1.webp',
        'images/Our Guest/guest2.webp',
        'images/Our Guest/guest3.webp',
        'images/Our Guest/guest4.webp',
        'images/Our Guest/guest5.webp',
        'images/Our Guest/guest6.webp',
        'images/Our Guest/guest7.webp',
        'images/Our Guest/guest8.webp',
        'images/Our Guest/guest9.webp',
        'images/Our Guest/guest10.webp',
        'images/Our Guest/guest11.webp',
        'images/Our Guest/guest12.webp',
        'images/Our Guest/guest13.webp',
    ];
    $enc = fn($p) => asset(implode('/', array_map('rawurlencode', explode('/', $p))));
    $uid = 'hm-' . uniqid();
@endphp

<section class="w-full section-spacing bg-[#FFEEEE] py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Carousel --}}
        <div class="relative">

            {{-- Prev --}}
            <button id="{{ $uid }}-prev"
                    class="absolute -left-4 md:-left-5 top-1/2 -translate-y-1/2 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full border border-neutral-200 bg-white shadow flex items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Previous">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <div class="overflow-hidden">
                <div id="{{ $uid }}-track" class="flex transition-transform duration-500 ease-in-out">
                    @foreach($images as $img)
                    <div class="shrink-0 px-2">
                        <img src="{{ $enc($img) }}"
                             alt="Honoured moment"
                             class="w-full h-auto object-contain rounded-xl shadow-sm"
                             loading="lazy">
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Next --}}
            <button id="{{ $uid }}-next"
                    class="absolute -right-4 md:-right-5 top-1/2 -translate-y-1/2 z-10 w-9 h-9 md:w-10 md:h-10 rounded-full border border-neutral-200 bg-white shadow flex items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Next">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div id="{{ $uid }}-dots" class="flex justify-center gap-2 mt-5"></div>

    </div>
</section>

<script>
(function () {
    const track   = document.getElementById('{{ $uid }}-track');
    const dotsEl  = document.getElementById('{{ $uid }}-dots');
    const prevBtn = document.getElementById('{{ $uid }}-prev');
    const nextBtn = document.getElementById('{{ $uid }}-next');
    if (!track) return;

    const slides = Array.from(track.children);
    const total  = slides.length;
    let perView, pages, current = 0, dots = [];

    function buildDots() {
        dotsEl.innerHTML = '';
        dots = [];
        pages = Math.ceil(total / perView);
        for (let i = 0; i < pages; i++) {
            const d = document.createElement('button');
            d.style.cssText = 'height:0.5rem;border-radius:9999px;transition:all 0.3s;background:' + (i === 0 ? '#111' : '#d1d5db') + ';width:' + (i === 0 ? '1rem' : '0.5rem');
            d.setAttribute('aria-label', 'Page ' + (i + 1));
            d.addEventListener('click', function () { goTo(i); });
            dotsEl.appendChild(d);
            dots.push(d);
        }
    }

    function updateDots(i) {
        dots.forEach(function (d, idx) {
            d.style.backgroundColor = idx === i ? '#111' : '#d1d5db';
            d.style.width = idx === i ? '1rem' : '0.5rem';
        });
    }

    function goTo(i) {
        current = (i + pages) % pages;
        track.style.transform = 'translateX(-' + (current * perView * slides[0].offsetWidth) + 'px)';
        updateDots(current);
    }

    function setWidths() {
        perView = window.innerWidth >= 1024 ? 4 : window.innerWidth >= 768 ? 3 : window.innerWidth >= 540 ? 2 : 1;
        slides.forEach(function (s) { s.style.width = (100 / perView) + '%'; });
        buildDots();
        goTo(0);
    }

    setWidths();
    window.addEventListener('resize', setWidths);
    prevBtn.addEventListener('click', function () { goTo(current - 1); });
    nextBtn.addEventListener('click', function () { goTo(current + 1); });
})();
</script>
