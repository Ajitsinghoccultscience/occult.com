@props([
    'title'        => 'Story of Webinar Attendees',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'reviews' => [
        [
            'name'   => 'Sunita Trivedi',
            'role'   => 'Delhi',
            'avatar' => 'image/astrology assests/alumni 1.webp',
            'rating' => 5,
            'text'   => 'Hi, I am Sunita. Before this webinar, I was a homemaker with zero knowledge of astrology. I joined just out of curiosity, but soon I was reading kundalis for my family and friends. Within just two months, I actually started getting paid for my readings! It\'s a modest start, but knowing I earned it myself feels amazing. It all truly started with this one session.',
        ],
        [
            'name'   => 'Ramesh Kumar',
            'role'   => 'Lucknow',
            'avatar' => 'image/astrology assests/manmohan sir.webp',
            'rating' => 5,
            'text'   => 'I\'m Ramesh, and though I\'ve practiced astrology before, I usually felt more confused than confident. I\'d taken other courses, but nothing felt right until this webinar. The step-by-step breakdown of kundali reading made everything finally fall into place. For the first time, I can actually look at a chart and read it with clarity. Honestly, I just wish I had found this sooner.',
        ],
        [
            'name'   => 'Arvind Malhotra',
            'role'   => 'Mumbai',
            'avatar' => 'image/astrology assests/alumni 3.webp',
            'rating' => 5,
            'text'   => 'I\'m Arvind, a businessman. I was doubtful at first. But after this webinar, I looked at my own kundali with a fresh perspective. Understanding my planetary positions helped me realize why certain decisions hadn\'t been working out. I actually made a key business move based on what I learned, and it really paid off. I can\'t explain the how fully, but the results are there, and I\'m very grateful.',
        ],
    ],
])

@php $rvId = 'rv-' . uniqid(); @endphp

<section class="w-full section-spacing section-px bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.5px] mb-3">
                {{ $title }}
            </h2>
            <img src="{{ asset($underlineSvg) }}" alt="" aria-hidden="true"
                 class="mx-auto w-[140px] h-auto">
        </div>

        {{-- Carousel --}}
        <div class="relative" id="{{ $rvId }}-root">

            {{-- Clip --}}
            <div class="overflow-hidden" id="{{ $rvId }}-outer">
                <div id="{{ $rvId }}-track"
                     class="flex gap-5 md:gap-6 transition-transform duration-500 ease-in-out will-change-transform">

                    @foreach($reviews as $review)
                    <div class="rv-item shrink-0 w-full md:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)]">

                        <div class="rounded-2xl p-6 flex flex-col gap-5 h-full bg-[#F6EFFE]
                                    transition-all duration-300 hover:-translate-y-1">

                            {{-- Profile --}}
                            <div class="flex items-center gap-3">
                                <x-ui.avatar
                                    :src="$review['avatar']"
                                    :alt="$review['name']"
                                    size="lg"
                                />
                                <div>
                                    <p class="font-semibold text-neutral-b text-[15px] leading-snug">
                                        {{ $review['name'] }}
                                    </p>
                                    <p class="text-sm text-neutral-c">({{ $review['role'] }})</p>
                                </div>
                            </div>

                            {{-- Review text --}}
                            <p class="text-content text-neutral-c leading-relaxed flex-1 text-justify">
                                {{ $review['text'] }}
                            </p>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Dots --}}
            <div class="flex justify-center gap-2.5 mt-7" id="{{ $rvId }}-dots">
                @foreach($reviews as $i => $_)
                <button type="button"
                    class="rv-dot rounded-full transition-all duration-300
                           {{ $i === 0
                               ? 'w-5 h-2.5 bg-[#7C3AED]'
                               : 'w-2.5 h-2.5 bg-[#C7B6E8]' }}"
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
    var ROOT = document.getElementById('{{ $rvId }}-root');
    if (!ROOT) return;

    var track  = ROOT.querySelector('#{{ $rvId }}-track');
    var outer  = ROOT.querySelector('#{{ $rvId }}-outer');
    var dots   = Array.prototype.slice.call(ROOT.querySelectorAll('.rv-dot'));
    var items  = Array.prototype.slice.call(ROOT.querySelectorAll('.rv-item'));
    var total  = {{ count($reviews) }};

    var current  = 0;
    var paused   = false;
    var maxIndex = 0;

    function calcMax() {
        var w = outer.offsetWidth;
        var perView = w >= 1024 ? 3 : w >= 768 ? 2 : 1;
        maxIndex = Math.max(0, total - perView);
    }

    function gap() { return outer.offsetWidth >= 768 ? 24 : 20; }

    function goTo(idx) {
        if (idx > maxIndex) idx = 0;
        if (idx < 0)        idx = maxIndex;
        current = idx;
        track.style.transform = 'translateX(-' + current * (items[0].offsetWidth + gap()) + 'px)';
        dots.forEach(function (d, i) {
            var a = i === current;
            d.className = d.className
                .replace(/w-5|w-2\.5|bg-\[#7C3AED\]|bg-\[#C7B6E8\]/g, '').trim();
            d.classList.add(a ? 'w-5' : 'w-2.5');
            d.classList.add(a ? 'bg-[#7C3AED]' : 'bg-[#C7B6E8]');
        });
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    dots.forEach(function (d) {
        d.addEventListener('click', function () {
            paused = true;
            goTo(parseInt(d.dataset.index, 10));
            setTimeout(function () { paused = false; }, 6000);
        });
    });

    ROOT.addEventListener('mouseenter', function () { paused = true; });
    ROOT.addEventListener('mouseleave', function () { paused = false; });

    var dragStart = null;
    outer.addEventListener('mousedown', function (e) {
        dragStart = e.clientX; paused = true;
        outer.style.cursor = 'grabbing'; e.preventDefault();
    });
    window.addEventListener('mousemove', function () {});
    window.addEventListener('mouseup', function (e) {
        if (dragStart === null) return;
        var dx = dragStart - e.clientX;
        if (Math.abs(dx) > 50) { dx > 0 ? next() : prev(); }
        dragStart = null; outer.style.cursor = '';
        setTimeout(function () { paused = false; }, 6000);
    });

    var touchX = 0;
    outer.addEventListener('touchstart', function (e) {
        touchX = e.touches[0].clientX; paused = true;
    }, { passive: true });
    outer.addEventListener('touchend', function (e) {
        var dx = touchX - e.changedTouches[0].clientX;
        if (Math.abs(dx) > 40) { dx > 0 ? next() : prev(); }
        setTimeout(function () { paused = false; }, 6000);
    }, { passive: true });

    setInterval(function () { if (!paused) next(); }, 4500);

    window.addEventListener('resize', function () {
        calcMax(); goTo(Math.min(current, maxIndex));
    });

    calcMax();
    goTo(0);
}());
</script>
