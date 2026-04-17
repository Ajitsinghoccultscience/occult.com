@props([
    'title' => 'Our Successfully Certified Students',
    'underlineWord' => 'Students',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'images' => [
        'image/astrology assests/certified g1.webp',
        'image/astrology assests/certified g 2.webp',
        'image/astrology assests/certified g 3.webp',
        'image/astrology assests/certified g 4.webp',
        'image/astrology assests/certified g 6.webp',
        'image/astrology assests/certified g 7.webp',
    ],
])

<section class="w-full section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">
                Our Certified
                <span class="relative inline-block">
                    {{ $underlineWord }}
                </span>
            </h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Image carousel --}}
        <div class="relative">
            <div class="flex gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden" id="graphologist-carousel">
                @foreach($images as $image)
                    <div class="flex-[0_0_100%] sm:flex-[0_0_calc(50%-1rem)] snap-center shrink-0">
                        <div class="rounded-xl overflow-hidden w-full max-w-[732px] aspect-[4/3] sm:aspect-[732/341] mx-auto shadow-drop bg-white">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}" alt="Certified Astrologer" class="w-full h-full object-cover" loading="lazy">
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Prev button --}}
            <button
                type="button"
                onclick="window.graphologistCarousel?.prev()"
                class="absolute left-0 top-1/2 -translate-y-1/2 translate-x-2 w-12 h-12 rounded-full bg-neutral-e/80 hover:bg-neutral-e flex items-center justify-center text-neutral-b transition-colors shadow-md"
                aria-label="Previous"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next button --}}
            <button
                type="button"
                onclick="window.graphologistCarousel?.next()"
                class="absolute right-0 top-1/2 -translate-y-1/2 -translate-x-2 w-12 h-12 rounded-full bg-neutral-e/80 hover:bg-neutral-e flex items-center justify-center text-neutral-b transition-colors shadow-md"
                aria-label="Next"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <script defer>
            window.graphologistCarousel = (function () {
                var el, paused = false;

                function getEl() {
                    return el || (el = document.getElementById('graphologist-carousel'));
                }

                function next() {
                    var c = getEl();
                    if (!c) return;
                    var atEnd = c.scrollLeft + c.clientWidth >= c.scrollWidth - 5;
                    c.scrollBy({ left: atEnd ? -c.scrollWidth : c.clientWidth, behavior: 'smooth' });
                }

                function prev() {
                    var c = getEl();
                    if (!c) return;
                    var atStart = c.scrollLeft <= 5;
                    c.scrollBy({ left: atStart ? c.scrollWidth : -c.clientWidth, behavior: 'smooth' });
                }

                // Auto-slide every 2.5s
                setInterval(function () { if (!paused) next(); }, 2500);

                // Pause on hover / touch
                document.addEventListener('DOMContentLoaded', function () {
                    var c = getEl();
                    if (!c) return;
                    c.addEventListener('mouseenter', function () { paused = true; });
                    c.addEventListener('mouseleave', function () { paused = false; });
                    c.addEventListener('touchstart', function () { paused = true; }, { passive: true });
                    c.addEventListener('touchend',   function () { setTimeout(function () { paused = false; }, 2000); }, { passive: true });
                });

                return { next: next, prev: prev };
            })();
        </script>
    </div>
</section>


