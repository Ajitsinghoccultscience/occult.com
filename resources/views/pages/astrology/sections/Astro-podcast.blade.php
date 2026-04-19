@props([
    'title'        => 'Benefits our Students get',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'videos'       => [
        ['youtube_id' => 'Y0JQ_Yg81WM'],
        ['youtube_id' => 'uJji0LqY-tw'],
        ['youtube_id' => 'F9f_p09W-JY'],
        ['youtube_id' => '4ckzcXkN6q8'],
        ['youtube_id' => 'YETAqFiklDw'],
    ],
])

<section class="w-full section-spacing  bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[130px] h-auto" aria-hidden="true">
        </div>

        {{-- DESKTOP: 3-at-a-time slider --}}
        <div class="hidden md:block relative">
            <div class="overflow-hidden" id="podcast-desktop-track-wrap">
                <div class="flex gap-5 transition-transform duration-500 ease-in-out" id="podcast-desktop-track">
                    @foreach($videos as $video)
                        <div class="podcast-desk-slide shrink-0 w-[calc(33.333%-14px)] rounded-2xl overflow-hidden shadow-sm border border-neutral-100 bg-neutral-900">
                            <div class="relative aspect-video cursor-pointer yt-pod-facade"
                                 data-ytid="{{ $video['youtube_id'] }}"
                                 data-si="{{ $video['si'] ?? '' }}">
                                <img
                                    src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/maxresdefault.jpg"
                                    alt="Podcast video"
                                    class="absolute inset-0 w-full h-full object-cover"
                                    loading="lazy"
                                    onerror="this.src='https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg'"
                                >
                                <div class="absolute inset-0 flex items-center justify-center bg-black/20 hover:bg-black/30 transition-colors">
                                    <div class="w-14 h-14 rounded-full bg-red-600 flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-200">
                                        <svg class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Prev --}}
            <button type="button" id="podcast-desk-prev"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-100 transition-colors z-10"
                aria-label="Previous">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            {{-- Next --}}
            <button type="button" id="podcast-desk-next"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-100 transition-colors z-10"
                aria-label="Next">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE: horizontal slider --}}
        <div class="md:hidden w-full overflow-x-auto scrollbar-hide snap-x snap-mandatory" id="podcast-slider">
            <div class="flex gap-3 w-max px-1">
                @foreach($videos as $video)
                    <div class="podcast-slide shrink-0 w-[85vw] snap-center rounded-2xl overflow-hidden shadow-sm border border-neutral-100 bg-neutral-900">
                        <div class="relative aspect-video cursor-pointer yt-pod-facade"
                             data-ytid="{{ $video['youtube_id'] }}"
                             data-si="{{ $video['si'] ?? '' }}">
                            <img
                                src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/maxresdefault.jpg"
                                alt="Podcast video"
                                class="absolute inset-0 w-full h-full object-cover"
                                loading="lazy"
                                onerror="this.src='https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg'"
                            >
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                <div class="w-14 h-14 rounded-full bg-red-600 flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Mobile dots --}}
        <div class="flex md:hidden justify-center gap-2 mt-5">
            @foreach($videos as $i => $video)
                <button id="pod-dot-{{ $i }}" class="h-2 rounded-full transition-all duration-300 bg-neutral-300" style="width:8px"></button>
            @endforeach
        </div>

    </div>
</section>

<script defer>
(function () {
    const slider = document.getElementById('podcast-slider');
    if (!slider) return;
    const slides = slider.querySelectorAll('.podcast-slide');
    const dots   = document.querySelectorAll('[id^="pod-dot-"]');
    const total  = slides.length;
    let current  = 0, paused = false;

    function setDots(idx) {
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === idx ? '#5E3592' : '#d1d5db';
            d.style.width = i === idx ? '20px' : '8px';
        });
    }

    function goTo(index) {
        if (index >= total) index = 0;
        if (index < 0) index = total - 1;
        current = index;
        slider.scrollTo({ left: slides[current].offsetLeft - 4, behavior: 'smooth' });
        setDots(current);
    }

    let videoPlaying = false;

    function getStep() { return window.innerWidth >= 768 ? 3 : 1; }

    setDots(0);
    setInterval(() => {
        if (!paused && !videoPlaying) {
            let next = current + getStep();
            if (next >= total) next = 0;
            goTo(next);
        }
    }, 3000);

    slider.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    slider.addEventListener('touchend',   () => { setTimeout(() => { if (!videoPlaying) paused = false; }, 2000); }, { passive: true });

    window.__podcastStopSlider = function () { videoPlaying = true; paused = true; };
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

// Desktop slider
(function () {
    var track = document.getElementById('podcast-desktop-track');
    if (!track) return;
    var slides = track.querySelectorAll('.podcast-desk-slide');
    var total = slides.length;
    var perPage = 3;
    var current = 0;
    var videoPlaying = false;
    var paused = false;

    function goTo(idx) {
        if (idx > total - perPage) idx = 0;
        if (idx < 0) idx = total - perPage;
        current = idx;
        var slideW = slides[0].offsetWidth + 20; // 20 = gap-5
        track.style.transform = 'translateX(-' + (current * slideW) + 'px)';
    }

    document.getElementById('podcast-desk-next').addEventListener('click', function () {
        paused = true; goTo(current + 1); setTimeout(function(){ paused = false; }, 4000);
    });
    document.getElementById('podcast-desk-prev').addEventListener('click', function () {
        paused = true; goTo(current - 1); setTimeout(function(){ paused = false; }, 4000);
    });

    var wrap = document.getElementById('podcast-desktop-track-wrap');
    if (wrap) {
        wrap.addEventListener('mouseenter', function(){ paused = true; });
        wrap.addEventListener('mouseleave', function(){ if (!videoPlaying) paused = false; });
    }

    window.__podcastDeskStopSlider = function () { videoPlaying = true; paused = true; };

    setInterval(function () { if (!paused && !videoPlaying) goTo(current + 1); }, 3000);
})();

document.querySelectorAll('.yt-pod-facade').forEach(function (facade) {
    facade.addEventListener('click', function () {
        if (window.__podcastStopSlider) window.__podcastStopSlider();
        if (window.__podcastDeskStopSlider) window.__podcastDeskStopSlider();
        var id = this.dataset.ytid;
        var si = this.dataset.si;
        var src = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0' + (si ? '&si=' + si : '');
        var iframe = document.createElement('iframe');
        iframe.src = src;
        iframe.title = 'YouTube video';
        iframe.className = 'absolute inset-0 w-full h-full';
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
        iframe.referrerPolicy = 'strict-origin-when-cross-origin';
        iframe.allowFullscreen = true;
        this.innerHTML = '';
        this.style.cursor = 'default';
        this.appendChild(iframe);
    });
});
</script>


