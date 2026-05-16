@props([
    'instituteName' => 'All India Institute of Occult Science',
    'since'         => 'Running Since March 2004',
    'image'         => 'image/astrology assests/manmohan sir.webp',
    'imageCaption'  => 'MP at our Grand Convocation',
    'bullets'       => [
        'One of the best leading institutes in India known for its occult education and training for its students.',
        'Globally recognized certification in Astrology, Numerology, Graphology, Vastu Shastra, Palmistry, Akashic records, Palmistry and Reiki.',
        'Many trained students from here are working as personal consultants or in big astrology firms.',
        'Best students support 24/7 with recorded classes available for our students.',
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">

            {{-- Left: text --}}
            <div class="flex flex-col gap-5">
                <div>
                    <h2 class="text-subheading font-bold text-neutral-b leading-snug">{{ $instituteName }}</h2>
                    <p class="text-xs text-neutral-e mt-1">{{ $since }}</p>
                </div>

                <ul class="flex flex-col gap-3">
                    @foreach($bullets as $bullet)
                    <li class="flex items-start gap-3 text-sm text-neutral-b leading-relaxed">
                        <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Right: image with caption --}}
            <div class="relative rounded-2xl overflow-hidden shadow-md">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                     alt="{{ $instituteName }}"
                     class="w-full h-full object-cover aspect-[4/3]">
                @if($imageCaption)
                <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-black/40">
                    <p class="text-white text-xs font-medium">{{ $imageCaption }}</p>
                </div>
                @endif
            </div>

        </div>

    </div>
</section>
