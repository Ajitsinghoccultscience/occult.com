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
        'logoClass' => 'max-h-16 max-w-[180px]',
    ],
    [
        'name'    => 'News18',
        'logo'    => 'image/news/news18-logo-vector.webp',
        'article' => 'image/news/news%2018%202.webp',
        'logoClass' => 'max-h-16 max-w-[180px]',
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

<section class="w-full bg-white py-6 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">
                Featured by <span class="text-[#7C3AED] font-extrabold">leading Media Voice</span>
            </h2>
        </div>

    </div>

    {{-- Outer card with marquee --}}
    <div class="bg-white rounded-3xl shadow-[0_4px_32px_rgba(0,0,0,0.10)] border border-neutral-100 mx-4 md:mx-8 xl:mx-16 px-4 py-6 md:px-6 md:py-8 overflow-hidden"
         id="media-carousel-outer">

        <div class="flex gap-4 w-max animate-marquee"
             id="media-carousel-track"
             style="animation-duration: 40s;">

            @foreach([1, 2] as $_)
                @foreach($mediaCards as $card)
                <div class="media-card shrink-0 w-[220px] sm:w-[240px] lg:w-[260px]
                            bg-white rounded-2xl border border-neutral-200 shadow-sm
                            overflow-hidden
                            transition-all duration-300 ease-in-out
                            hover:scale-105 hover:shadow-md cursor-default">

                    {{-- Logo --}}
                    <div class="h-20 flex items-center justify-center px-5 border-b border-neutral-100 bg-white">
                        <img src="{{ asset($card['logo']) }}"
                             alt="{{ $card['name'] }}"
                             class="w-auto object-contain {{ $card['logoClass'] ?? 'max-h-14 max-w-[150px]' }}"
                             loading="lazy">
                    </div>

                    {{-- Article --}}
                    <div class="w-full h-[160px] overflow-hidden">
                        <img src="{{ asset($card['article']) }}"
                             alt="{{ $card['name'] }} article"
                             class="w-full h-full object-cover object-top"
                             loading="lazy">
                    </div>

                </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section>

<script>
(function () {
    var outer = document.getElementById('media-carousel-outer');
    var track = document.getElementById('media-carousel-track');
    if (!outer || !track) return;

    outer.addEventListener('mouseenter', function () { track.style.animationPlayState = 'paused'; });
    outer.addEventListener('mouseleave', function () { track.style.animationPlayState = 'running'; });

    var touchStartX = 0;
    outer.addEventListener('touchstart', function (e) {
        touchStartX = e.touches[0].clientX;
        track.style.animationPlayState = 'paused';
    }, { passive: true });
    outer.addEventListener('touchend', function () {
        setTimeout(function () { track.style.animationPlayState = 'running'; }, 1500);
    }, { passive: true });
}());
</script>
