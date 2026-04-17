@props([
    'title' => 'Featured In',
])

@php
$old  = 'image/astrology%20assests';
$news = 'image/news';
$publications = [
    ['logo' => "$old/the%20wire.svg",                       'image' => "$old/the%20wire%20image.jpg",           'alt' => 'The Wire'],
    ['logo' => "$news/Zee_News_logo.svg.png",               'image' => "$news/Z%20news%203.png",                'alt' => 'Zee News'],
    ['logo' => "$old/india.com.svg",                        'image' => "$old/india.com%20image.jpg",            'alt' => 'India.com'],
    ['logo' => "$news/ABP_News_logo.svg.png",               'image' => "$news/ABP%20news.png",                  'alt' => 'ABP News'],
    ['logo' => "$old/time%20of%20india.svg",                'image' => "$old/times%20of%20india%20image.jpg",   'alt' => 'Times of India'],
    ['logo' => "$news/The_Times_of_India_Logo.png",         'image' => "$news/TOI.png",                         'alt' => 'Times of India'],
    ['logo' => "$news/dailyhunt%20logo.png",                'image' => "$news/dailyhunt%203.png",               'alt' => 'Dailyhunt'],
    ['logo' => "$old/silicon%20india.svg",                  'image' => "$old/silicon%20india%20image.jpg",      'alt' => 'Silicon India'],
    ['logo' => "$old/the%20print.svg",                      'image' => "$old/the%20print%20image.jpg",          'alt' => 'The Print'],
    ['logo' => "$old/mid%20day.svg",                        'image' => "$old/mid%20day%20image.jpg",            'alt' => 'Mid Day'],
    ['logo' => "$news/daily%20jagran%20logo%20png.png",     'image' => "$news/daily%20jagran%202.png",          'alt' => 'Dainik Jagran'],
    ['logo' => "$news/indian%20express%20logo.avif",        'image' => "$news/indian%20express.png",            'alt' => 'Indian Express'],
    ['logo' => "$news/news18-logo-vector.png",              'image' => "$news/news%2018%202.png",               'alt' => 'News18'],
    ['logo' => "$news/newsroom%20logo.png",                 'image' => "$news/newsroom.png",                    'alt' => 'Newsroom'],
];
@endphp

<section class="w-full bg-white py-10 md:py-14">

    {{-- Scroll track — full width so overflow-x actually works --}}
    <div class="w-full overflow-x-auto scrollbar-hide" id="featured-slider">
        <div class="flex gap-6 px-4 md:px-6 lg:px-8 w-max">

            @foreach($publications as $pub)
            <div class="featured-slide flex flex-col items-center gap-5
                        w-[85vw] sm:w-[55vw] md:w-[45vw] lg:w-[30vw] max-w-none">

                {{-- Logo — fixed height box so all logos appear same size --}}
                <div class="h-12 w-full flex items-center justify-center bg-white px-4">
                    <img src="{{ asset($pub['logo']) }}" alt="{{ $pub['alt'] }}"
                         class="h-10 w-auto max-w-[160px] object-contain" loading="lazy">
                </div>

                {{-- Article screenshot — fixed aspect so all cards are identical height --}}
                <div class="w-full rounded-2xl overflow-hidden border border-neutral-300 aspect-[4/3]">
                    <img src="{{ asset($pub['image']) }}" alt="{{ $pub['alt'] }} article"
                         class="w-full h-full object-cover block" loading="lazy">
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
    let timer   = null;

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

    function startTimer() {
        if (timer) return;
        current = 0;
        track.scrollTo({ left: 0, behavior: 'instant' });
        timer = setInterval(() => { if (!paused) slideTo(current + 1); }, 2500);
    }

    // Only start scrolling once the section is visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { startTimer(); observer.disconnect(); } });
    }, { threshold: 0.2 });
    observer.observe(track);

    track.addEventListener('mouseenter', () => { paused = true; });
    track.addEventListener('mouseleave', () => { paused = false; });
    track.addEventListener('touchstart', () => { paused = true; }, { passive: true });
    track.addEventListener('touchend',   () => { setTimeout(() => { paused = false; }, 2000); }, { passive: true });
})();
</script>
