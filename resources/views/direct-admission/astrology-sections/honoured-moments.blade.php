@props([
    'title'  => 'Honoured Moments with Eminent Personalities',
    'images' => [
        [
            'src'     => 'image/astrology assests/institute/MP-as_chief.webp',
            'caption' => 'Mr. Ram Kripal Yadav (Former Central Minister, Member of Parliament)',
        ],
        [
            'src'     => 'image/astrology assests/institute/convocation.webp',
            'caption' => 'Convocation 2025',
        ],
        [
            'src'     => 'image/astrology assests/institute/Grand-convocation.webp',
            'caption' => 'Grand Convocation Ceremony',
        ],
        [
            'src'     => 'image/astrology assests/institute/Founder-speech.webp',
            'caption' => 'Founder Speech at Annual Convocation',
        ],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Image slider (swipeable) --}}
        <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach($images as $img)
            <div class="snap-center shrink-0 w-[70%] sm:w-[45%] lg:w-[calc(25%_-_0.75rem)] relative rounded-xl overflow-hidden aspect-[4/3] group shadow-sm">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img['src'])))) }}"
                     alt="{{ $img['caption'] }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                     loading="lazy">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                    <p class="text-white text-[11px] font-medium leading-tight">{{ $img['caption'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
