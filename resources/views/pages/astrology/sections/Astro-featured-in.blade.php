@props([
    'title' => 'Featured In',
])

@php
$assetsBase = 'image/astrology%20assests';
$news = 'image/news';
$publications = [
    ['logo' => "$assetsBase/the%20wire.svg",                'image' => "$assetsBase/the%20wire%20image.webp",          'alt' => 'The Wire'],
    ['logo' => "$assetsBase/india.com.svg",                 'image' => "$assetsBase/india.com%20image.webp",           'alt' => 'India.com'],
    ['logo' => "$assetsBase/silicon%20india.svg",           'image' => "$assetsBase/silicon%20india%20image.webp",     'alt' => 'Silicon India'],
    ['logo' => "$assetsBase/the%20print.svg",               'image' => "$assetsBase/the%20print%20image.webp",         'alt' => 'The Print'],
    ['logo' => "$assetsBase/mid%20day.svg",                 'image' => "$assetsBase/mid%20day%20image.webp",           'alt' => 'Mid Day'],
    ['logo' => "$assetsBase/time%20of%20india.svg",         'image' => "$assetsBase/times%20of%20india%20image.webp",  'alt' => 'Times of India'],
    ['logo' => "$news/Zee_News_logo.svg.webp",              'image' => "$news/Z%20news%203.webp",                     'alt' => 'Zee News'],
    ['logo' => "$news/ABP_News_logo.svg.webp",              'image' => "$news/ABP%20news.webp",                       'alt' => 'ABP News'],
    ['logo' => "$news/The_Times_of_India_Logo.webp",        'image' => "$news/TOI.webp",                              'alt' => 'Times of India'],
    ['logo' => "$news/dailyhunt%20logo.webp",               'image' => "$news/dailyhunt%203.webp",                    'alt' => 'Dailyhunt'],
    ['logo' => "$news/daily%20jagran%20logo%20png.webp",    'image' => "$news/daily%20jagran%202.webp",               'alt' => 'Dainik Jagran'],
    ['logo' => "$news/indian%20express%20logo.webp",        'image' => "$news/indian%20express.webp",                 'alt' => 'Indian Express'],
    ['logo' => "$news/news18-logo-vector.webp",             'image' => "$news/news%2018%202.webp",                    'alt' => 'News18'],
    ['logo' => "$news/newsroom%20logo.webp",                'image' => "$news/newsroom.webp",                         'alt' => 'Newsroom'],
];
@endphp

<section class="w-full bg-white py-10 md:py-14">

    {{-- Title --}}
    <div class="text-center mb-8 section-px">
        <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">{{ $title }}</h2>
    </div>

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
                <div class="w-full rounded-2xl overflow-hidden border border-neutral-300 aspect-[4/3]">
                    <img src="{{ asset($pub['image']) }}" alt="{{ $pub['alt'] }} article"
                         class="w-full h-full object-cover object-top block" loading="lazy">
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
