@props([
    'title'      => 'About All India Institute of Occult Science',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'subheading' => 'All India Institute of Occult Science: Running Since March 2004',
    'bullets' => [
        'One of the best leading institutes in India known for its occult education and training for its students.',
        'Globally recognized certification in Astrology, Numerology, Graphology, Vastu Shastra, Palmistry, Akashic records and Reiki.',
        'Many trained students from here are working as personal consultants or in big astrology firms.',
        'Best students support 24/7 with recorded classes available for our students.',
    ],
    'counters' => [
        [
            'icon'  => 'image/astrology%20assests/instagram.svg',
            'value' => '52,000+',
            'label' => 'Instagram Followers',
        ],
        [
            'icon'  => 'image/astrology%20assests/youtube.svg',
            'value' => '15,400+',
            'label' => 'Youtube Followers',
        ],
        [
            'icon'  => null,
            'value' => '2400+',
            'label' => 'Certified Students',
        ],
    ],
    'image' => 'image/astrology%20assests/convo%201.webp',
])

<section class="w-full section-spacing  bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Two-column layout --}}
        <div class="grid grid-cols-1 md:grid-cols-[50%_1fr] gap-8 md:gap-10 items-center">

            {{-- LEFT: Image --}}
            <div class="w-full rounded-2xl overflow-hidden shadow-sm">
                <img src="{{ asset($image) }}" alt="About Institute"
                     class="w-full h-full object-cover" loading="lazy">
            </div>

            {{-- RIGHT: Content --}}
            <div class="flex flex-col gap-5">

                {{-- Subheading --}}
                <h4 class="text-subheading font-bold text-neutral-b leading-snug">
                    {{ $subheading }}
                </h4>

                {{-- Bullet points --}}
                <ul class="space-y-3 text-content text-neutral-b tracking-[0.48px]">
                    @foreach($bullets as $bullet)
                        <li class="flex items-start gap-2">
                            <span class="shrink-0 mt-0.5">•</span>
                            <span>{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>

                {{-- Counters card --}}
                <div class="border-2 border-[#5E3592] rounded-2xl overflow-hidden mt-2">
                    <div class="grid grid-cols-3 divide-x divide-neutral-200">
                        @foreach($counters as $counter)
                        <div class="flex flex-col items-center justify-center gap-2 py-5 px-3 text-center">

                            {{-- Icon --}}
                            @if($counter['icon'])
                                <img src="{{ asset($counter['icon']) }}" alt="{{ $counter['label'] }}"
                                     class="w-10 h-10 object-contain">
                            @else
                                {{-- Graduation cap icon --}}
                                <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                                    </svg>
                                </div>
                            @endif

                            {{-- Value --}}
                            <p class="text-subheading font-bold text-neutral-b leading-none">{{ $counter['value'] }}</p>

                            {{-- Label --}}
                            <p class="text-xs text-neutral-e leading-tight">{{ $counter['label'] }}</p>

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


