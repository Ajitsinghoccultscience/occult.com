@props([
    'title' => 'Featured In',
])

@php
$old  = 'image/astrology%20assests';
$news = 'image/news';
$publications = [
    ['logo' => "$old/the%20wire.svg",                       'image' => "$old/the%20wire%20image.webp",          'alt' => 'The Wire'],
    ['logo' => "$news/Zee_News_logo.svg.webp",              'image' => "$news/Z%20news%203.webp",               'alt' => 'Zee News'],
    ['logo' => "$old/india.com.svg",                        'image' => "$old/india.com%20image.webp",           'alt' => 'India.com'],
    ['logo' => "$news/ABP_News_logo.svg.webp",              'image' => "$news/ABP%20news.webp",                 'alt' => 'ABP News'],
    ['logo' => "$news/The_Times_of_India_Logo.webp",        'image' => "$news/TOI.webp",                        'alt' => 'Times of India'],
    ['logo' => "$news/dailyhunt%20logo.webp",               'image' => "$news/dailyhunt%203.webp",              'alt' => 'Dailyhunt'],
    ['logo' => "$news/daily%20jagran%20logo%20png.webp",    'image' => "$news/daily%20jagran%202.webp",         'alt' => 'Dainik Jagran'],
    ['logo' => "$news/indian%20express%20logo.webp",        'image' => "$news/indian%20express.webp",           'alt' => 'Indian Express'],
    ['logo' => "$news/news18-logo-vector.webp",             'image' => "$news/news%2018%202.webp",              'alt' => 'News18'],
    ['logo' => "$news/newsroom%20logo.webp",                'image' => "$news/newsroom.webp",                   'alt' => 'Newsroom'],
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

<script>window.__carousels.push({id:'featured-slider',slideClass:'.featured-slide',offsetPad:24,interval:2500});</script>
