@props([
    'title' => 'Hear straight from our Previous Webinar attendees',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'videos' => [
        ['youtube_id' => 'sSqUxmlI11A', 'name' => 'Kunj Bihari Sharma', 'attend_date' => 'Astrology Webinar Review'],
        ['youtube_id' => 'B5nho9l1nXw', 'name' => 'Jatin Kashyap',      'attend_date' => 'Astrology Webinar Review'],
        ['youtube_id' => '8UuOQOnjRWE', 'name' => 'Piyush Ji',           'attend_date' => 'Astrology Webinar Review'],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        {{-- Heading centered --}}
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Videos: 1 at a time carousel on mobile, 3-column grid on desktop --}}
        <div id="testimonial-carousel" class="flex overflow-x-auto md:overflow-visible md:grid md:grid-cols-3 gap-6 -mx-4 md:mx-0 px-4 md:px-0 py-4 snap-x snap-mandatory scrollbar-hide">
            @foreach($videos as $video)
                <div class="shrink-0 md:shrink snap-center w-[92vw] md:w-full min-w-[280px] md:min-w-0 md:max-w-none max-w-[358px] rounded-xl border-2 border-primary overflow-hidden bg-neutral-e aspect-[358/543] relative">
                    @if(!empty($video['youtube_id']))
                        <div class="yt-facade absolute inset-0 cursor-pointer" data-ytid="{{ $video['youtube_id'] }}">
                            <img
                                src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg"
                                alt="Testimonial from {{ $video['name'] }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center shadow-lg hover:scale-110 transition-transform duration-200">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    @endif
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 pointer-events-none">
                        <p class="text-content font-semibold text-white">{{ $video['name'] }}</p>
                        <p class="text-sm text-white/90">{{ $video['attend_date'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script defer>
(function () {
    var carousel = document.getElementById('testimonial-carousel');
    var slides   = carousel ? carousel.querySelectorAll('.snap-center') : [];
    var total    = slides.length;
    var current  = 0;
    var paused   = false;
    var timer    = null;

    function isMobile() {
        return window.innerWidth < 768;
    }

    function goTo(index) {
        if (!isMobile() || !carousel) return;
        if (index >= total) index = 0;
        if (index < 0)     index = total - 1;
        current = index;
        carousel.scrollTo({ left: slides[current].offsetLeft - carousel.offsetLeft, behavior: 'smooth' });
    }

    function startAuto() {
        timer = setInterval(function () {
            if (!paused && isMobile()) goTo(current + 1);
        }, 2800);
    }

    startAuto();

    // Pause on touch
    if (carousel) {
        carousel.addEventListener('touchstart', function () { paused = true; }, { passive: true });
        carousel.addEventListener('touchend',   function () { setTimeout(function () { paused = false; }, 2500); }, { passive: true });
    }

    // Click to play — stops auto-scroll permanently for that session
    document.querySelectorAll('.yt-facade').forEach(function (facade) {
        facade.addEventListener('click', function () {
            paused = true;               // stop auto-scrolling when video plays
            clearInterval(timer);

            var id = this.dataset.ytid;
            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0';
            iframe.title = 'YouTube video';
            iframe.className = 'absolute inset-0 w-full h-full';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            this.innerHTML = '';
            this.style.cursor = 'default';
            this.appendChild(iframe);
        });
    });
})();
</script>


