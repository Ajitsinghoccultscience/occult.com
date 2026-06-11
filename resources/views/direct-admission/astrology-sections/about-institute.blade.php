@props([
    'instituteName' => 'All India Institute of Occult Science',
    'since'         => 'Running Since March 2004',
    'image'         => 'image/astrology assests/institute/MP-as_chief.webp',
    'imageCaption'  => 'MP at our Grand Convocation',
    'stats' => [
        ['icon' => 'image/astrology assests/certified students.svg', 'value' => '97 K+',   'label' => 'Certified Students'],
        ['icon' => 'image/astrology assests/instagram.svg',          'value' => '52,000+', 'label' => 'Instagram Followers'],
        ['icon' => 'image/astrology assests/youtube.svg',            'value' => '15,400+', 'label' => 'Youtube Followers'],
    ],
    'bullets'       => [
        'One of the best leading institutes in India known for its occult education and training for its students.',
        'Globally recognized certification in Astrology, Numerology, Graphology, Vastu Shastra, Palmistry, Akashic records, Palmistry and Reiki.',
        'Many trained students from here are working as personal consultants or in big astrology firms.',
        'Best students support 24/7 with recorded classes available for our students.',
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Mobile order: heading → image → badges/bullets. Desktop: text left, image right. --}}
        <div class="grid grid-cols-1 md:grid-cols-[1fr_40%] gap-x-8 md:gap-x-12 gap-y-6 items-center">

            {{-- Heading --}}
            <div class="text-center md:text-left md:col-start-1 md:row-start-1">
                <h2 class="text-subheading font-bold text-neutral-b leading-snug">{{ $instituteName }}</h2>
                <p class="text-xs text-neutral-e mt-1">{{ $since }}</p>
            </div>

            {{-- Image with caption (right column on desktop, spans both rows) --}}
            <div class="relative rounded-2xl overflow-hidden shadow-md md:col-start-2 md:row-start-1 md:row-span-2">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                     alt="{{ $instituteName }}"
                     class="w-full h-full object-cover aspect-[4/3]">
                @if($imageCaption)
                <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-black/40">
                    <p class="text-white text-xs font-medium">{{ $imageCaption }}</p>
                </div>
                @endif
            </div>

            {{-- Badges + bullets --}}
            <div class="flex flex-col gap-5 md:col-start-1 md:row-start-2">

                {{-- Stat badges --}}
                <div class="flex items-stretch divide-x divide-neutral-200 border border-neutral-200 rounded-xl shadow-sm w-fit overflow-hidden">
                    @foreach($stats as $stat)
                    <div class="flex items-center gap-2.5 px-4 py-3">
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $stat['icon'])))) }}"
                             alt="" aria-hidden="true" class="w-6 h-6 object-contain shrink-0">
                        <div class="flex flex-col leading-tight">
                            <span class="text-neutral-b font-bold text-sm">{{ $stat['value'] }}</span>
                            <span class="text-neutral-e text-[11px]">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                    @endforeach
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

        </div>

    </div>
</section>
