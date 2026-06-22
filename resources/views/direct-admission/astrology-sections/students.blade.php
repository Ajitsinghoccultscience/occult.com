@php
    $videos = [
        ['name' => 'Somya Shukla', 'date' => '18-02-2026', 'video' => 'https://youtu.be/zwUe8SgZGmg?si=tOxxzRA-C2Ql0GEc'],
        ['name' => 'Manisha Rani', 'date' => '18-02-2026', 'video' => 'https://youtu.be/n9B8nT7ldJQ?si=r4Bjq7hmMxX3V8ou'],
        ['name' => 'Manjit Sandhu', 'date' => '18-02-2026', 'video' => 'https://youtu.be/M_Gbf9D-5Vc?si=vepIHpMN2a1D3gNo'],
        ['name' => 'Arati Mishra', 'date' => '18-02-2026', 'video' => 'https://youtu.be/0DpttQyjszI?si=7dcXTcxAQZSERu24'],
        ['name' => 'Dr Geet S Thakkar', 'date' => '18-02-2026', 'video' => 'https://youtu.be/wqwuZUQ6elg?si=J2YkRo1b6rWwqjly'],
        ['name' => 'Sidhart Mahajan', 'date' => '18-02-2026', 'video' => 'https://youtu.be/cV_0iReFvzA?si=IdQ4Q348GleP0zgT'],
    ];
@endphp

{{-- ═══════════════════════════════════
     VIDEO TESTIMONIALS (YouTube — click to play inline)
════════════════════════════════════ --}}
<section class="w-full py-2 md:py-8">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Hear straight from our Webinar attendees
            </h2>
        </div>

        {{-- Video cards: swipeable horizontal slider --}}
        <div class="flex gap-5 md:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden"
             id="vt-slider">
            @foreach($videos as $i => $v)
                @php $videoId = basename(parse_url($v['video'], PHP_URL_PATH)); @endphp
                <div class="vt-card snap-center shrink-0 w-[72%] sm:w-[calc(50%-0.625rem)] lg:w-[calc(25%-1.125rem)] relative rounded-xl overflow-hidden aspect-3/4 bg-black shadow-md"
                     data-index="{{ $i }}">

                    <div class="yt-facade absolute inset-0 w-full h-full cursor-pointer group"
                         data-vid="{{ $videoId }}">

                        <img src="https://i.ytimg.com/vi/{{ $videoId }}/hqdefault.jpg"
                             alt="Play testimonial from {{ $v['name'] }}"
                             class="w-full h-full object-cover"
                             loading="lazy">

                        <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(0,0,0,0.15) 50%,rgba(0,0,0,0.75) 100%);"></div>

                        <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-transform group-hover:scale-110"
                              style="background-color:#ff0000;">
                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </span>

                        <!-- <div class="absolute bottom-0 left-0 right-0 p-4 text-white pointer-events-none">
                            <p class="text-sm font-semibold leading-tight">{{ $v['name'] }}</p>
                            <p class="text-xs text-white/80">Attend on {{ $v['date'] }}</p>
                        </div> -->
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Dot navigation --}}
        <div class="flex items-center justify-center gap-2 mt-5" id="vt-dots">
            @foreach($videos as $i => $v)
                <button type="button"
                        data-index="{{ $i }}"
                        aria-label="Go to video {{ $i + 1 }}"
                        class="vt-dot rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6 h-2.5 bg-black' : 'w-2.5 h-2.5 bg-gray-700' }}">
                </button>
            @endforeach
        </div>

    </div>
</section>

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {

    // ── Click-to-play YouTube facade ──
    document.addEventListener('click', function (e) {
        var facade = e.target.closest('.yt-facade');
        if (!facade) return;
        var vid = facade.dataset.vid;
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube.com/embed/' + vid + '?rel=0&autoplay=1';
        iframe.title = 'YouTube video';
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
        iframe.allowFullscreen = true;
        iframe.referrerPolicy = 'strict-origin-when-cross-origin';
        iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;';
        facade.replaceWith(iframe);
    });

    // ── Dot navigation ──
    var slider = document.getElementById('vt-slider');
    var dots   = document.querySelectorAll('.vt-dot');
    var cards  = document.querySelectorAll('.vt-card');
    if (!slider || !dots.length || !cards.length) return;

    function setActiveDot(index) {
        dots.forEach(function (dot, i) {
            if (i === index) {
                dot.classList.add('w-6', 'bg-[#ff9700]');
                dot.classList.remove('w-2.5', 'bg-neutral-300');
            } else {
                dot.classList.remove('w-6', 'bg-[#ff9700]');
                dot.classList.add('w-2.5', 'bg-neutral-300');
            }
        });
    }

    // Scroll to card when dot is clicked
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx  = parseInt(dot.dataset.index);
            var card = cards[idx];
            if (!card) return;
            var offset = card.offsetLeft - (slider.offsetWidth - card.offsetWidth) / 2;
            slider.scrollTo({ left: offset, behavior: 'smooth' });
            setActiveDot(idx);
        });
    });

    // Update active dot on scroll using IntersectionObserver
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                var idx = parseInt(entry.target.dataset.index);
                setActiveDot(idx);
            }
        });
    }, { root: slider, threshold: 0.5 });

    cards.forEach(function (card) { observer.observe(card); });
});
</script>
@endpush
