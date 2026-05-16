@props([
    'title'    => 'Our Podcast Insight',
    'episodes' => [
        ['thumbnail' => 'image/astrology assests/snapshot 1.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
        ['thumbnail' => 'image/astrology assests/snapshot 2.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
        ['thumbnail' => 'image/astrology assests/snapshot 3.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
        ['thumbnail' => 'image/astrology assests/snapshot 4.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
        ['thumbnail' => 'image/astrology assests/snapshot 5.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
        ['thumbnail' => 'image/astrology assests/snapshot 6.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => '#'],
    ],
])

@php $id = 'pc-' . uniqid(); @endphp

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
                    @foreach($episodes as $ep)
                    <div class="shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <a href="{{ $ep['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="border border-neutral-200 rounded-2xl overflow-hidden shadow-sm bg-white hover:shadow-md transition-shadow duration-200 block">
                            <div class="w-full aspect-[16/9] bg-neutral-100">
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $ep['thumbnail'])))) }}"
                                     alt="{{ $ep['title'] }}" class="w-full h-full object-cover" loading="lazy">
                            </div>
                            <div class="flex items-center gap-3 p-3 md:p-4">
                                <div class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center" style="background-color:#CC2200;">
                                    <svg class="w-3.5 h-3.5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-neutral-b leading-tight">{{ $ep['title'] }}</p>
                                    <p class="text-xs text-[#CC2200] font-medium mt-0.5 uppercase tracking-wide">{{ $ep['subtitle'] }}</p>
                                </div>
                            </div>
                        </a>
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
    const track   = document.getElementById('{{ $id }}-track');
    const dotsEl  = document.getElementById('{{ $id }}-dots');
    const prevBtn = document.getElementById('{{ $id }}-prev');
    const nextBtn = document.getElementById('{{ $id }}-next');
    if (!track) return;

    const slides = Array.from(track.children);
    const total  = slides.length;
    let perView  = window.innerWidth >= 768 ? 3 : window.innerWidth >= 640 ? 2 : 1;
    let pages    = Math.ceil(total / perView);
    let current  = 0;
    let dots     = [];
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
