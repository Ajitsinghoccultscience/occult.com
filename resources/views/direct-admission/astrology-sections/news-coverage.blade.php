@props([
    'title'  => 'Covered by News Channels',
    'images' => [
        ['src' => 'image/news/ABP news.webp',        'alt' => 'ABP News'],
        ['src' => 'image/news/TOI.webp',             'alt' => 'Times of India'],
        ['src' => 'image/news/news 18 2.webp',       'alt' => 'News18'],
        ['src' => 'image/news/daily jagran 2.webp',  'alt' => 'Dainik Jagran'],
        ['src' => 'image/news/dailyhunt 3.webp',     'alt' => 'Dailyhunt'],
        ['src' => 'image/news/newsroom.webp',        'alt' => 'Newsroom'],
    ],
])

@php $id = 'nc-' . uniqid(); @endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Carousel wrapper --}}
        <div class="relative">

            {{-- Prev arrow --}}
            <button id="{{ $id }}-prev"
                    class="hidden md:flex absolute -left-5 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full border border-neutral-200 bg-white shadow items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Previous">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Track --}}
            <div class="overflow-hidden">
                <div id="{{ $id }}-track" class="flex transition-transform duration-500 ease-in-out">
                    @foreach($images as $img)
                    <div class="shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <div class="rounded-2xl overflow-hidden border border-neutral-200 shadow-sm aspect-[16/9] bg-neutral-100">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img['src'])))) }}"
                                 alt="{{ $img['alt'] }}" class="w-full h-full object-cover" loading="lazy">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Next arrow --}}
            <button id="{{ $id }}-next"
                    class="hidden md:flex absolute -right-5 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full border border-neutral-200 bg-white shadow items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Next">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div id="{{ $id }}-dots" class="flex justify-center gap-2 mt-5"></div>

    </div>
</section>

<script>
(function () {
    const track  = document.getElementById('{{ $id }}-track');
    const dotsEl = document.getElementById('{{ $id }}-dots');
    const prevBtn = document.getElementById('{{ $id }}-prev');
    const nextBtn = document.getElementById('{{ $id }}-next');
    if (!track) return;

    const slides     = Array.from(track.children);
    const total      = slides.length;
    let perView      = window.innerWidth >= 768 ? 3 : window.innerWidth >= 640 ? 2 : 1;
    let pages        = Math.ceil(total / perView);
    let current      = 0;
    let dots         = [];
    let timer;

    function buildDots() {
        dotsEl.innerHTML = '';
        dots = [];
        pages = Math.ceil(total / perView);
        for (let i = 0; i < pages; i++) {
            const d = document.createElement('button');
            d.className = 'w-2 h-2 rounded-full transition-all duration-300';
            d.style.backgroundColor = i === 0 ? '#111' : '#d1d5db';
            d.style.transform = i === 0 ? 'scale(1.25)' : 'scale(1)';
            d.setAttribute('aria-label', 'Page ' + (i + 1));
            d.addEventListener('click', () => goTo(i));
            dotsEl.appendChild(d);
            dots.push(d);
        }
    }

    function updateDots(i) {
        dots.forEach((d, idx) => {
            d.style.backgroundColor = idx === i ? '#111' : '#d1d5db';
            d.style.transform = idx === i ? 'scale(1.25)' : 'scale(1)';
        });
    }

    function goTo(i) {
        current = (i + pages) % pages;
        const slideW = slides[0].offsetWidth;
        track.style.transform = 'translateX(-' + (current * perView * slideW) + 'px)';
        updateDots(current);
    }

    function setWidths() {
        perView = window.innerWidth >= 768 ? 3 : window.innerWidth >= 640 ? 2 : 1;
        slides.forEach(s => s.style.width = (100 / perView) + '%');
        buildDots();
        goTo(0);
    }

    setWidths();
    window.addEventListener('resize', () => { setWidths(); });

    if (prevBtn) prevBtn.addEventListener('click', () => { clearInterval(timer); goTo(current - 1); startTimer(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { clearInterval(timer); goTo(current + 1); startTimer(); });

    function startTimer() {
        timer = setInterval(() => goTo(current + 1), 4000);
    }
    startTimer();
})();
</script>
