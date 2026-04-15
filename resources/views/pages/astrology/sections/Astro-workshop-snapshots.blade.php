@props([
    'title' => 'Snapshots of Previous Webinar',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'images' => [
        
        'image/astrology%20assests/snapshot%202.png',
        
        'image/astrology%20assests/snapshot%204.png',
       
        'image/astrology%20assests/snapshot%206.png',
        'image/astrology%20assests/snapshot%207.png',
        
    ],
])

<section class="w-full section-spacing section-spacing-after bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[140px] h-auto" aria-hidden="true">
        </div>

        {{-- Slider track --}}
        <div class="w-full overflow-x-auto scrollbar-hide" id="snapshot-slider">
            <div class="flex gap-4 w-max">
                @foreach($images as $img)
                    <div class="snapshot-slide shrink-0 w-[85vw] sm:w-[60vw] lg:w-[30vw] rounded-xl overflow-hidden shadow-drop aspect-[16/10]">
                        <img src="{{ asset($img) }}" alt="Workshop snapshot"
                             class="w-full h-full object-cover" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-5" id="snapshot-dots">
            @foreach($images as $i => $img)
                <button id="snap-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300 bg-neutral-h"></button>
            @endforeach
        </div>

    </div>
</section>

<script>
(function () {
    const slider = document.getElementById('snapshot-slider');
    if (!slider) return;

    let current = 0;
    let paused  = false;
    const slides = slider.querySelectorAll('.snapshot-slide');
    const dots   = document.querySelectorAll('[id^="snap-dot-"]');
    const total  = slides.length;

    function goTo(index) {
        if (index >= total) index = 0;
        if (index < 0) index = total - 1;
        current = index;
        slider.scrollTo({ left: slides[current].offsetLeft - 16, behavior: 'smooth' });
        dots.forEach((d, i) => {
            d.style.backgroundColor = i === current ? '#5E3592' : '';
            d.classList.toggle('bg-[#5E3592]', i === current);
            d.classList.toggle('bg-neutral-h', i !== current);
        });
    }

    goTo(0);
    setInterval(() => { if (!paused) goTo(current + 1); }, 2500);

    slider.addEventListener('mouseenter', () => { paused = true; });
    slider.addEventListener('mouseleave', () => { paused = false; });
    slider.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    slider.addEventListener('touchend',   () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });

    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));
})();
</script>


