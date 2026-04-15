@props([
    'title' => 'Featured In',
])

@php
$assetsBase = 'image/astrology%20assests';
$publications = [
    ['logo' => "$assetsBase/the%20wire.svg",          'image' => "$assetsBase/the%20wire%20image.jpg",          'alt' => 'The Wire'],
    ['logo' => "$assetsBase/india.com.svg",            'image' => "$assetsBase/india.com%20image.jpg",            'alt' => 'India.com'],
    ['logo' => "$assetsBase/silicon%20india.svg",      'image' => "$assetsBase/silicon%20india%20image.jpg",      'alt' => 'Silicon India'],
    ['logo' => "$assetsBase/the%20print.svg",          'image' => "$assetsBase/the%20print%20image.jpg",          'alt' => 'The Print'],
    ['logo' => "$assetsBase/mid%20day.svg",            'image' => "$assetsBase/mid%20day%20image.jpg",            'alt' => 'Mid Day'],
    ['logo' => "$assetsBase/time%20of%20india.svg",    'image' => "$assetsBase/times%20of%20india%20image.jpg",   'alt' => 'Times of India'],
];
@endphp

<section class="w-full bg-white py-10 md:py-14">

    {{-- Scroll track — full width so overflow-x actually works --}}
    <div class="w-full overflow-x-auto scrollbar-hide" id="featured-slider">
        <div class="flex gap-6 px-4 md:px-6 lg:px-8 w-max">

            @foreach($publications as $pub)
            <div class="featured-slide flex flex-col items-center gap-5
                        w-[85vw] sm:w-[55vw] md:w-[45vw] lg:w-[30vw] max-w-none">

                {{-- Logo --}}
                <div class="h-10 flex items-center justify-center w-full">
                    <img src="{{ asset($pub['logo']) }}" alt="{{ $pub['alt'] }}"
                         class="max-h-10 max-w-full w-auto object-contain" loading="lazy">
                </div>

                {{-- Article screenshot --}}
                <div class="w-full rounded-2xl overflow-hidden shadow-[0_4px_24px_rgba(0,0,0,0.12)] border border-neutral-100">
                    <img src="{{ asset($pub['image']) }}" alt="{{ $pub['alt'] }} article"
                         class="w-full h-auto block" loading="lazy">
                </div>

            </div>
            @endforeach

        </div>
    </div>

</section>

<script defer>
(function () {
    const track  = document.getElementById('featured-slider');
    if (!track) return;

    let paused  = false;
    let current = 0;

    function getSlides() {
        return track.querySelectorAll('.featured-slide');
    }

    function slideTo(index) {
        const slides = getSlides();
        if (!slides.length) return;
        if (index >= slides.length) index = 0;
        current = index;
        const slide = slides[current];
        track.scrollTo({ left: slide.offsetLeft - 24, behavior: 'smooth' });
    }

    setInterval(() => { if (!paused) slideTo(current + 1); }, 2500);

    track.addEventListener('mouseenter', () => { paused = true; });
    track.addEventListener('mouseleave', () => { paused = false; });
    track.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    track.addEventListener('touchend',   () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });
})();
</script>
