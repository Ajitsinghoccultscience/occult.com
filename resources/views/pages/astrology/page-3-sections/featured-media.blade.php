@php
$mediaCards = [
    [
        'name'    => 'Zee News',
        'logo'    => 'image/news/Zee_News_logo.svg.webp',
        'article' => 'image/news/Z%20news%203.webp',
    ],
    [
        'name'    => 'ABP News',
        'logo'    => 'image/news/ABP_News_logo.svg.webp',
        'article' => 'image/news/ABP%20news.webp',
    ],
    [
        'name'    => 'Times of India',
        'logo'    => 'image/news/The_Times_of_India_Logo.webp',
        'article' => 'image/news/TOI.webp',
    ],
    [
        'name'    => 'DailyHunt',
        'logo'    => 'image/news/dailyhunt%20logo.webp',
        'article' => 'image/news/dailyhunt%203.webp',
    ],
    [
        'name'    => 'Daily Jagran',
        'logo'    => 'image/news/daily%20jagran%20logo%20png.webp',
        'article' => 'image/news/daily%20jagran%202.webp',
    ],
    [
        'name'    => 'News18',
        'logo'    => 'image/news/news18-logo-vector.webp',
        'article' => 'image/news/news%2018%202.webp',
    ],
    [
        'name'    => 'Newsroom',
        'logo'    => 'image/news/newsroom%20logo.webp',
        'article' => 'image/news/newsroom.webp',
    ],
    [
        'name'    => 'Indian Express',
        'logo'    => 'image/news/indian%20express%20logo.webp',
        'article' => 'image/news/indian%20express.webp',
    ],
];
@endphp

<section class="w-full  bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto mt-8 md:mt-6 ">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-6">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">
                Featured by <span class="text-[#7C3AED] font-extrabold">leading Media Voice</span>
            </h2>
        </div>

        {{-- Outer carousel wrapper with soft shadow card --}}
        <div class="bg-neutral-i rounded-2xl shadow-card px-4 py-6 md:px-6 md:py-8 overflow-hidden"
             id="media-carousel-outer">

            {{-- Scrolling track — contains cards duplicated for seamless loop --}}
            <div class="flex gap-4 w-max animate-marquee"
                 id="media-carousel-track"
                 style="animation-duration: 40s;">

                @foreach([1, 2] as $_)
                    @foreach($mediaCards as $card)
                    <div class="media-card shrink-0 w-[220px] sm:w-[240px] lg:w-[260px]
                                bg-neutral-i rounded-2xl border border-neutral-h
                                overflow-hidden
                                transition-all duration-300 ease-in-out
                                hover:scale-105 hover:border-neutral-e cursor-default">

                        {{-- Logo area --}}
                        <div class="h-16 flex items-center justify-center px-4 border-b border-neutral-h">
                            <img src="{{ asset($card['logo']) }}"
                                 alt="{{ $card['name'] }} logo"
                                 class="max-h-10 max-w-[140px] w-auto object-contain"
                                 loading="lazy">
                        </div>

                        {{-- Article preview image --}}
                        <div class="w-full aspect-[4/3] overflow-hidden">
                            <img src="{{ asset($card['article']) }}"
                                 alt="{{ $card['name'] }} article"
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                 loading="lazy">
                        </div>

                    </div>
                    @endforeach
                @endforeach

            </div>
        </div>

    </div>
</section>

<script>
(function () {
    var outer = document.getElementById('media-carousel-outer');
    var track = document.getElementById('media-carousel-track');
    if (!outer || !track) return;

    // Pause on hover
    outer.addEventListener('mouseenter', function () {
        track.style.animationPlayState = 'paused';
    });
    outer.addEventListener('mouseleave', function () {
        track.style.animationPlayState = 'running';
    });

    // Touch swipe support
    var touchStartX = 0;
    var touchStartTime = 0;

    outer.addEventListener('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
        touchStartTime = Date.now();
        track.style.animationPlayState = 'paused';
    }, { passive: true });

    outer.addEventListener('touchend', function (e) {
        var deltaX = e.changedTouches[0].clientX - touchStartX;
        var deltaT = Date.now() - touchStartTime;
        // Resume after a short pause so user sees where they swiped to
        if (Math.abs(deltaX) < 5 && deltaT < 200) {
            track.style.animationPlayState = 'running';
        } else {
            setTimeout(function () {
                track.style.animationPlayState = 'running';
            }, 1500);
        }
    }, { passive: true });
}());
</script>
