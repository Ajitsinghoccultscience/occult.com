@props([
    'title' => 'Hear straight from our Alumni',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'videos' => [
        ['youtube_id' => 'SMImDRJrCY0', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'RI637QVE648', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'mEcnaSkIVfY', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'GW4WpHXgb_4', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'o6lFa3_9oLg', 'name' => 'Alumni Review', 'attend_date' => ''],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Slider --}}
        <div class="relative" id="vt-root">

            {{-- Prev arrow --}}
            <button id="vt-prev" aria-label="Previous"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-5 z-10 w-9 h-9 rounded-full bg-white border border-neutral-200 shadow-md flex items-center justify-center hover:bg-neutral-50 transition disabled:opacity-30">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next arrow --}}
            <button id="vt-next" aria-label="Next"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-5 z-10 w-9 h-9 rounded-full bg-white border border-neutral-200 shadow-md flex items-center justify-center hover:bg-neutral-50 transition disabled:opacity-30">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Track container --}}
            <div class="overflow-hidden">
                <div id="vt-track" class="flex" style="gap:20px; transition: transform 0.45s ease;">
                    @foreach($videos as $video)
                    <div class="vt-slide shrink-0 rounded-xl overflow-hidden bg-neutral-100 aspect-[3/4] relative border border-neutral-200 shadow-sm">
                        @if(!empty($video['youtube_id']))
                            <div class="yt-facade absolute inset-0 cursor-pointer" data-ytid="{{ $video['youtube_id'] }}">
                                <img
                                    src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg"
                                    alt="{{ $video['name'] }}"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-200">
                                        <svg class="w-6 h-6 ml-0.5" fill="#191F59" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/75 to-transparent p-3 pointer-events-none">
                            <p class="text-sm font-semibold text-white">{{ $video['name'] }}</p>
                            @if(!empty($video['attend_date']))
                                <p class="text-xs text-white/80">{{ $video['attend_date'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Dots (max = total slides, extras hidden by JS) --}}
            <div id="vt-dots" class="flex justify-center items-center gap-2 mt-6">
                @foreach($videos as $i => $v)
                    <button class="vt-dot rounded-full transition-all duration-300" style="height:8px;width:8px;background:#d1d5db;" aria-label="Go to slide {{ $i + 1 }}"></button>
                @endforeach
            </div>

        </div>
    </div>
</section>

<script defer>
(function () {
    var root   = document.getElementById('vt-root');
    if (!root) return;

    var track  = document.getElementById('vt-track');
    var prev   = document.getElementById('vt-prev');
    var next   = document.getElementById('vt-next');
    var dotsEl = document.getElementById('vt-dots');
    var slides = Array.from(track.querySelectorAll('.vt-slide'));
    var dots   = Array.from(dotsEl.querySelectorAll('.vt-dot'));
    var total  = slides.length;
    var current = 0;
    var gap     = 20;

    function perPage() {
        return window.innerWidth >= 768 ? 3 : 1;
    }

    function maxIdx() {
        return Math.max(0, total - perPage());
    }

    function slideWidth() {
        var pp = perPage();
        return (track.parentElement.offsetWidth - gap * (pp - 1)) / pp;
    }

    function layout() {
        var w = slideWidth();
        slides.forEach(function (s) { s.style.width = w + 'px'; });
        current = Math.min(current, maxIdx());
        render();
    }

    function render() {
        var w      = slideWidth();
        var offset = current * (w + gap);
        track.style.transform = 'translateX(-' + offset + 'px)';

        var numDots = maxIdx() + 1;
        dots.forEach(function (d, i) {
            d.style.display          = i < numDots ? 'block' : 'none';
            d.style.backgroundColor  = i === current ? '#191F59' : '#d1d5db';
            d.style.width            = i === current ? '20px'    : '8px';
        });

        prev.disabled = current === 0;
        next.disabled = current === maxIdx();
    }

    function goTo(idx) {
        current = Math.max(0, Math.min(idx, maxIdx()));
        render();
    }

    prev.addEventListener('click', function () { goTo(current - 1); });
    next.addEventListener('click', function () { goTo(current + 1); });
    dots.forEach(function (d, i) { d.addEventListener('click', function () { goTo(i); }); });

    // Swipe support
    var touchStartX = 0;
    track.parentElement.addEventListener('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });
    track.parentElement.addEventListener('touchend', function (e) {
        var diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 40) goTo(current + (diff > 0 ? 1 : -1));
    }, { passive: true });

    // Play video on click
    slides.forEach(function (slide) {
        var facade = slide.querySelector('.yt-facade');
        if (!facade) return;
        facade.addEventListener('click', function () {
            var id     = this.dataset.ytid;
            var iframe = document.createElement('iframe');
            iframe.src            = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0';
            iframe.title          = 'YouTube video';
            iframe.className      = 'absolute inset-0 w-full h-full';
            iframe.allow          = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            this.innerHTML        = '';
            this.style.cursor     = 'default';
            this.appendChild(iframe);
        });
    });

    layout();
    window.addEventListener('resize', layout);
})();
</script>
