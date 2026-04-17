@props([
    'title'        => 'Trusted experiences from our learning community',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'reviews'      => [
        [
            'text'   => 'This professional course completely transformed my understanding of the human mind. learning signature analysis helped me identify hidden personality traits accurately. i highly recommend this program for every aspiring psychologist seeking deep behavioral insights.',
            'name'   => 'Aarav',
            'avatar' => 'image/astrology%20assests/alumni%201.jpg',
            'rating' => 5,
        ],
        [
            'text'   => 'The pre-recorded sessions were incredibly detailed and flexible for my busy schedule. exploring criminality in handwriting was fascinating. now, i use graphotherapy techniques daily to help my clients overcome their negative behavioral patterns.',
            'name'   => 'Ishani',
            'avatar' => 'image/astrology%20assests/alumni%202.jpg',
            'rating' => 5,
        ],
        [
            'text'   => 'I gained immense value from the associate degree program levels. the experts provided deep insights into lowercase letter strokes. this cost-effective technique is truly a powerful tool for unlocking secrets of the written word.',
            'name'   => 'Rohan',
            'avatar' => 'image/astrology%20assests/alumni%203.jpg',
            'rating' => 5,
        ],
        [
            'text'   => 'Studying various psychological theories alongside handwriting analysis provided a comprehensive learning experience. i can now write detailed graphological reports professionally. enrolling in this online course was definitely the best decision for my career.',
            'name'   => 'Meera',
            'avatar' => 'image/astrology%20assests/alumni%204.jpg',
            'rating' => 5,
        ],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

    </div>

    {{-- Full-width scroll track --}}
    <div class="w-full overflow-x-auto scrollbar-hide" id="txt-review-track">
        <div class="flex gap-5 px-4 md:px-8 lg:px-16 w-max pb-2">

            @foreach($reviews as $review)
            <div class="txt-review-slide bg-white rounded-2xl border border-neutral-100 shadow-sm p-6 flex flex-col gap-4
                        w-[85vw] sm:w-[60vw] md:w-[38vw] lg:w-[28vw] xl:w-[24vw] max-w-[360px] shrink-0">

                {{-- Quote icon --}}
                <svg class="w-9 h-9 shrink-0" viewBox="0 0 40 40" fill="none">
                    <text x="0" y="36" font-size="48" font-family="Georgia, serif" fill="#191F59" opacity="0.85">"</text>
                </svg>

                {{-- Review text --}}
                <p class="text-sm text-neutral-600 leading-relaxed italic flex-1">{{ $review['text'] }}</p>

                {{-- Divider --}}
                <div class="border-t border-neutral-100"></div>

                {{-- Avatar + name + stars --}}
                <div class="flex items-center gap-3">
                    <img src="{{ asset($review['avatar']) }}" alt="{{ $review['name'] }}"
                         class="w-11 h-11 rounded-full object-cover shrink-0 border-2 border-neutral-200 hidden">
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-neutral-b text-sm">{{ $review['name'] }}</p>
                        <div class="flex gap-0.5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'text-yellow-400' : 'text-neutral-300' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>

<script defer>
(function () {
    var track   = document.getElementById('txt-review-track');
    if (!track) return;

    var slides  = track.querySelectorAll('.txt-review-slide');
    var total   = slides.length;
    var current = 0;
    var paused  = false;

    function slideTo(index) {
        if (index >= total) index = 0;
        if (index < 0)     index = total - 1;
        current = index;
        var slide = slides[current];
        track.scrollTo({ left: slide.offsetLeft - 16, behavior: 'smooth' });
    }

    setInterval(function () { if (!paused) slideTo(current + 1); }, 2800);

    track.addEventListener('mouseenter', function () { paused = true; });
    track.addEventListener('mouseleave', function () { paused = false; });
    track.addEventListener('touchstart', function () { paused = true; }, { passive: true });
    track.addEventListener('touchend',   function () { setTimeout(function () { paused = false; }, 2500); }, { passive: true });
})();
</script>
