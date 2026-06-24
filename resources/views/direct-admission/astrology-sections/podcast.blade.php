@php
    $title    = $title    ?? 'Our Podcast Insight';
    $episodes = $episodes ?? [
        ['thumbnail' => 'image/astrology assests/snapshot 1.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=PGaCb5ioBfM'],
        ['thumbnail' => 'image/astrology assests/snapshot 2.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=eP7N3hanpxI'],
        ['thumbnail' => 'image/astrology assests/snapshot 3.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=NM6Yuytte_Y'],
        ['thumbnail' => 'image/astrology assests/snapshot 4.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=0yDeIwbys70'],
        ['thumbnail' => 'image/astrology assests/snapshot 2.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=eP7N3hanpxI'],
        ['thumbnail' => 'image/astrology assests/snapshot 3.webp', 'title' => 'Numerology Podcast', 'subtitle' => 'FT.SUVIDHA BERRY', 'url' => 'https://www.youtube.com/watch?v=NM6Yuytte_Y'],
    ];
@endphp

@php $id = 'pc-' . uniqid(); @endphp

{{-- Video Modal --}}
<div id="{{ $id }}-modal"
     class="fixed inset-0 z-999 hidden items-center justify-center bg-black/80 p-4"
     role="dialog" aria-modal="true">
    <div class="relative w-full max-w-3xl mx-auto">
        {{-- Close button --}}
        <button id="{{ $id }}-close"
                class="absolute -top-10 right-0 text-white hover:text-neutral-300 transition"
                aria-label="Close video">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        {{-- Responsive iframe wrapper --}}
        <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-2xl">
            <iframe id="{{ $id }}-iframe"
                    class="w-full h-full"
                    frameborder="0"
                    allow="autoplay; encrypted-media; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<section class="w-full section-spacing bg-white py-2 md:py-8">
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
                    @php
                        parse_str(parse_url($ep['url'], PHP_URL_QUERY), $q);
                        $videoId  = $q['v'] ?? '';
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId . '?autoplay=1&rel=0';
                        $ytThumb  = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                    @endphp
                    <div class="shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <button type="button"
                                data-embed="{{ $embedUrl }}"
                                data-modal="{{ $id }}-modal"
                                data-iframe="{{ $id }}-iframe"
                                class="podcast-card w-full text-left border border-neutral-200 rounded-2xl overflow-hidden shadow-sm bg-white hover:shadow-md transition-shadow duration-200 block cursor-pointer group">
                            <div class="w-full aspect-video relative overflow-hidden">
                                <img src="{{ $ytThumb }}"
                                     alt="{{ $ep['title'] }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition">
                                    <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-[#CC2200] ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
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
                        </button>
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
    // ── Carousel ──────────────────────────────────────────────
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
            d.addEventListener('click', function () { goTo(i); });
            dotsEl.appendChild(d);
            dots.push(d);
        }
    }

    function updateDots(i) {
        dots.forEach(function (d, idx) {
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
        slides.forEach(function (s) { s.style.width = (100 / perView) + '%'; });
        buildDots();
        goTo(0);
    }

    setWidths();
    window.addEventListener('resize', setWidths);

    if (prevBtn) prevBtn.addEventListener('click', function () { clearInterval(timer); goTo(current - 1); startTimer(); });
    if (nextBtn) nextBtn.addEventListener('click', function () { clearInterval(timer); goTo(current + 1); startTimer(); });

    function startTimer() { timer = setInterval(function () { goTo(current + 1); }, 4000); }
    startTimer();

    // ── Video Modal ───────────────────────────────────────────
    const modal    = document.getElementById('{{ $id }}-modal');
    const iframe   = document.getElementById('{{ $id }}-iframe');
    const closeBtn = document.getElementById('{{ $id }}-close');

    function openModal(embedUrl) {
        iframe.src = embedUrl;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        iframe.src = '';
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.podcast-card[data-modal="{{ $id }}-modal"]').forEach(function (card) {
        card.addEventListener('click', function () {
            openModal(card.dataset.embed);
        });
    });

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });
})();
</script>
