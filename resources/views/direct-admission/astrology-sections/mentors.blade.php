@props([
    'title'   => 'Our Astrology Mentors',
    'mentors' => [
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-6 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Cards: horizontal scroll on mobile, 4-col grid on desktop --}}
        <div class="flex gap-3 overflow-x-auto scrollbar-hide pb-2 md:grid md:grid-cols-2 md:overflow-visible lg:grid-cols-4">
            @foreach($mentors as $mentor)
            <div class="shrink-0 w-[78vw] sm:w-[60vw] md:w-auto bg-white border border-neutral-200 rounded-xl p-4 flex flex-col gap-3 shadow-sm hover:shadow-md transition-shadow duration-200">

                {{-- Avatar + Name --}}
                <div class="flex items-center gap-3">
                    <div class="shrink-0 w-12 h-12 rounded-full overflow-hidden border-2 border-neutral-200 bg-neutral-100">
                        <img
                            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $mentor['image'])))) }}"
                            alt="{{ $mentor['name'] }}"
                            class="w-full h-full object-cover object-top"
                            loading="lazy">
                    </div>
                    <div>
                        <p class="font-bold text-neutral-b text-sm leading-snug">{{ $mentor['name'] }}</p>
                        <p class="text-[11px] text-neutral-e leading-snug mt-0.5">({{ $mentor['role'] }})</p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-neutral-100"></div>

                {{-- Bullets --}}
                <ul class="space-y-2">
                    @foreach($mentor['bullets'] as $bullet)
                    <li class="flex items-start gap-1.5 text-xs text-neutral-b">
                        <span class="shrink-0 mt-0.5 w-3.5 h-3.5 rounded-full bg-neutral-b flex items-center justify-center">
                            <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <span>
                            @if($bullet['highlight'])
                                @php
                                    $parts = explode($bullet['highlight'], $bullet['text']);
                                @endphp
                                {{ $parts[0] }}<span class="text-[#CC2200] font-bold">{{ $bullet['highlight'] }}</span>{{ $parts[1] ?? '' }}
                            @else
                                {{ $bullet['text'] }}
                            @endif
                        </span>
                    </li>
                    @endforeach
                </ul>

            </div>
            @endforeach
        </div>

    </div>
</section>
