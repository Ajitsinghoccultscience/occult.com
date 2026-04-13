@props([
    'title' => 'What you will learn in this webinar',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'modules' => [
        [
            'name' => 'Module 1',
            'icon' => 'Analysis.svg',
            'points' => [
                'Understand what handwriting can reveal about.',
                'Learn the misconceptions regarding graphology.',
                'Exploring the complete history of graphology.',
                'Basic terminologies used during graphology studies.',
                'Know more about the handwriting analysis core concepts.',
            ],
        ],
        [
            'name' => 'Module 2',
            'icon' => 'Decode.svg',
            'points' => [
                'Know about the slant variations in handwriting styles.',
                'Also, analyse the baseline pattern in the written text',
                'Studying the usage of margins in the handwriting samples.',
                'Evaluate the space between words and the letters.',
                'Also, observe the consistency and rhythm in writing.',
            ],
        ],
        [
            'name' => 'Module 3',
            'icon' => 'Understand.svg',
            'points' => [
                'Understanding the relationship between graphology and modern psychology.',
                'Usage of graphology in social work.',
                'How important is graphology in medical fields?',
                'Practical applications in personality assessment techniques.',
                'Use of graphology in behavioural analysis contexts.',
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
