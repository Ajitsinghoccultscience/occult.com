@props([
    'title'      => 'Honoured Moments with Eminent Personalities',
    'desktopDir' => 'image/astrology assests/DIRECT ADMISSION/guests/Desktop',
    'mobileDir'  => 'image/astrology assests/DIRECT ADMISSION/guests/Mobile',
    'count'      => 9,
])

@php
    $enc = fn($p) => asset(implode('/', array_map('rawurlencode', explode('/', $p))));
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Desktop slider --}}
        <div class="hidden md:flex gap-5 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach(range(1, $count) as $i)
            <div class="snap-center shrink-0 w-[32%] lg:w-[calc(25%_-_0.94rem)]">
                <img src="{{ $enc($desktopDir.'/'.$i.'.webp') }}"
                     alt="Honoured guest" class="w-full h-auto object-contain rounded-xl shadow-sm" loading="lazy">
            </div>
            @endforeach
        </div>

        {{-- Mobile slider --}}
        <div class="md:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach(range(1, $count) as $i)
            <div class="snap-center shrink-0 w-[58%]">
                <img src="{{ $enc($mobileDir.'/'.$i.'.webp') }}"
                     alt="Honoured guest" class="w-full h-auto object-contain rounded-xl shadow-sm" loading="lazy">
            </div>
            @endforeach
        </div>

    </div>
</section>
