@php
    $title  = $title  ?? 'Covered by News Channels';
    $videos = $videos ?? [
        ['url' => 'https://youtu.be/uJji0LqY-tw'],
        ['url' => 'https://youtu.be/F9f_p09W-JY'],
        ['url' => 'https://youtu.be/4ckzcXkN6q8'],
    ];
    $id = 'nc-' . uniqid();
@endphp

<section class="w-full section-spacing bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Carousel wrapper --}}
        <div class="relative">

            {{-- Prev arrow --}}
            <!-- <button id="{{ $id }}-prev"
                    class="hidden md:flex absolute -left-5 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full border border-neutral-200 bg-white shadow items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Previous">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button> -->

            {{-- Track --}}
            <div class="overflow-hidden">
                <div id="{{ $id }}-track" class="flex transition-transform duration-500 ease-in-out">
                    @foreach($videos as $v)
                    @php $videoId = basename(parse_url($v['url'], PHP_URL_PATH)); @endphp
                    <div class="shrink-0 w-full sm:w-1/2 md:w-1/3 px-2">
                        <div class="nc-facade rounded-2xl overflow-hidden border border-neutral-200 shadow-sm aspect-video bg-black relative cursor-pointer group"
                             data-vid="{{ $videoId }}">
                            <img src="https://i.ytimg.com/vi/{{ $videoId }}/hqdefault.jpg"
                                 alt="News video"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 loading="lazy">
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition">
                                <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 ml-1" style="color:#CC2200;" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Next arrow --}}
            <!-- <button id="{{ $id }}-next"
                    class="hidden md:flex absolute -right-5 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full border border-neutral-200 bg-white shadow items-center justify-center hover:bg-neutral-50 transition"
                    aria-label="Next">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button> -->
        </div>

        {{-- Dots --}}
        <div id="{{ $id }}-dots" class=" md:hidden flex justify-center gap-2 mt-5"></div>

    </div>
</section>

<script>
(function () {
    // ── Inline play ───────────────────────────────────────────
    document.querySelectorAll('.nc-facade[data-vid]').forEach(function (facade) {
        facade.addEventListener('click', function () {
            var vid = facade.dataset.vid;
            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/' + vid + '?autoplay=1&rel=0';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;';
            facade.innerHTML = '';
            facade.appendChild(iframe);
            facade.style.cursor = 'default';
            facade.classList.remove('nc-facade');
        });
    });

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

    if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });
})();
</script>
