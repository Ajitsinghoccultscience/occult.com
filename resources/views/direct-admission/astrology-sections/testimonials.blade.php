@props([
    'title' => 'Join 1200+ who’ve already transformed their lives',
    'dir'   => 'image/astrology assests/DIRECT ADMISSION/REVIEWS(direct admission)',
    'count' => 6,
])

@php
    $enc = fn($p) => asset(implode('/', array_map('rawurlencode', explode('/', $p))));
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Review images (swipeable slider) --}}
        <div class="flex gap-4 md:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach(range(1, $count) as $i)
            <div class="snap-center shrink-0 w-[82%] sm:w-[calc(50%_-_0.75rem)] lg:w-[calc(33.333%_-_1rem)]">
                <img src="{{ $enc($dir.'/'.$i.'.webp') }}"
                     alt="Student review"
                     class="w-full h-auto object-contain rounded-2xl border border-neutral-200 shadow-sm"
                     loading="lazy">
            </div>
            @endforeach
        </div>

    </div>
</section>
