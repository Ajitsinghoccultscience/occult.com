@php
    $title = $title ?? 'Join 1200+ who\'ve already transformed their lives';
    $dir   = $dir   ?? 'image/astrology assests/DIRECT ADMISSION/REVIEWS(direct admission)';
    $count = $count ?? 6;
    $enc = fn($p) => asset(implode('/', array_map('rawurlencode', explode('/', $p))));
    $uid = uniqid('ts_');
@endphp

<section class="w-full section-spacing bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Review images (swipeable slider) --}}
        <div id="{{ $uid }}" class="flex gap-4 md:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach(range(1, $count) as $i)
            <div class="snap-center shrink-0 w-[82%] sm:w-[calc(50%_-_0.75rem)] lg:w-[calc(33.333%_-_1rem)]">
                <img src="{{ $enc($dir.'/'.$i.'.webp') }}"
                     alt="Student review"
                     class="w-full h-auto object-contain rounded-2xl border border-neutral-200 shadow-sm"
                     loading="lazy">
            </div>
            @endforeach
        </div>

        {{-- Dot indicators --}}
        <div id="{{ $uid }}-dots" class="flex justify-center gap-2 mt-4">
            @foreach(range(1, $count) as $i)
            <button
                data-index="{{ $i - 1 }}"
                class="h-2 rounded-full transition-all duration-300 {{ $i === 1 ? 'w-4 bg-black' : 'w-2 bg-gray-700' }}"
                aria-label="Go to slide {{ $i }}">
            </button>
            @endforeach
        </div>

    </div>
</section>

<script>
(function () {
    const slider = document.getElementById('{{ $uid }}');
    const dotContainer = document.getElementById('{{ $uid }}-dots');
    if (!slider || !dotContainer) return;

    const dots = Array.from(dotContainer.children);
    const slides = Array.from(slider.children);

    function getActiveIndex() {
        const center = slider.getBoundingClientRect().left + slider.offsetWidth / 2;
        let closest = 0, minDist = Infinity;
        slides.forEach(function (slide, i) {
            const rect = slide.getBoundingClientRect();
            const dist = Math.abs(rect.left + rect.width / 2 - center);
            if (dist < minDist) { minDist = dist; closest = i; }
        });
        return closest;
    }

    function updateDots(active) {
        dots.forEach(function (dot, i) {
            if (i === active) {
                dot.classList.remove('w-2', 'bg-neutral-300');
                dot.classList.add('w-4', 'bg-amber-500');
            } else {
                dot.classList.remove('w-4', 'bg-amber-500');
                dot.classList.add('w-2', 'bg-neutral-300');
            }
        });
    }

    slider.addEventListener('scroll', function () {
        updateDots(getActiveIndex());
    }, { passive: true });

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            const idx = parseInt(dot.dataset.index, 10);
            slides[idx].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        });
    });
})();
</script>
