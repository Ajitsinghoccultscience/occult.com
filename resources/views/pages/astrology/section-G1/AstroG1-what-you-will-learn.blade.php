@props([
    'title' => 'What You Will Learn In This Webinar',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'modules' => [
        [
            'name' => 'Module 1',
            'icon' => 'Analysis.svg',
            'points' => [
                'Basics of Zodiacs and Planets',
                'Introduction to Twelve Astrology Houses',
                'Types of Kundalis',
                'Planet Exaltation and Debilitation Rules',
                'Mahadasha and Planetary Friendship Concepts',
            ],
        ],
        [
            'name' => 'Module 2',
            'icon' => 'Decode.svg',
            'points' => [
                'Ashtakoot Marriage Matching and Yoga',
                'Panchang Details and Tithi Lords',
                'Saturn Sadhesati and Dhaiyya Effects',
                'Planetary Strength Using Shadbala Exercise',
                'Vimshottari Dasha and Transit Results',
            ],
        ],
        [
            'name' => 'Module 3',
            'icon' => 'Understand.svg',
            'points' => [
                'Prashna Shastra Horary Query Analysis',
                'Timing Marriage and Business Events',
                'Career Determination in Agriculture Education',
                'Divisional Charts From D1 Shashtiamsha',
                'Raj Yog and Remedies Shastra',
            ],
        ],
    ],
])

@php
    $iconsPath = 'images/Graphology (logo)/untitled folder 3';
@endphp

{{-- What you will learn (Figma 283:398) --}}
<section class="w-full section-spacing section-spacing-after overflow-visible">
    <div class="max-w-[1100px] xl:max-w-[1280px] mx-auto section-px overflow-visible">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        <x-ui.carousel variant="peek">
            @foreach($modules as $module)
                <x-ui.carousel-slide variant="peek">
                    <x-ui.module-card :title="$module['name']" class="h-full">
                        @if(!empty($module['icon']))
                            <x-slot:icon>
                                <img src="{{ asset($iconsPath . '/' . $module['icon']) }}" alt="" class="w-10 h-10 object-contain">
                            </x-slot:icon>
                        @endif
                        @foreach($module['points'] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </x-ui.module-card>
                </x-ui.carousel-slide>
            @endforeach
        </x-ui.carousel>
    </div>
</section>
