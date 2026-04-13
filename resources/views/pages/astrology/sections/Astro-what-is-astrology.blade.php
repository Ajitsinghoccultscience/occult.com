@props([
    'title' => 'What Is Astrology ?',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'description' => 'Astrology is one of the greatest subjects that helps you understand the language of stars and planets and effects in the birth chart. It helps you understand the nakshatras, the universe, analyzing and making birth charts,kundalis etc. It is also used for predicting life events, future etc.',
    'bullets' => [
        [
            'heading' => 'Learn Kundali Analysis:',
            'text' => 'Learning about the 12 Houses, 9 Planets, and 12 Signs to help people navigate life\'s challenges.',
        ],
        [
            'heading' => 'The 12 Houses and meaning',
            'text' => 'Help you understand about the 12 houses and their meaning. What each house tells and how planets impact them.',
        ],
        [
            'heading' => 'The Planets, Lords And Impacts:',
            'text' => 'You can learn about the 9 planets, their lords and how it impacts life. The effects of Shani, Rahu, Ketu in your life.',
        ],
        [
            'heading' => 'Predicting about future, events:',
            'text' => 'You will be able to predict about the future, suggest remedies and also tell about the best Muhurats, for starting anything new.',
        ],
    ],
    'image' => 'images/astrology webinar/gif 2_1 (2) 1.png',
])

<section class="w-full section-spacing pb-10 md:pb-16 bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto px-4 sm:px-6 md:px-10 lg:px-16 xl:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            {{-- 1. Title - Mobile: first, centered. Desktop: left col --}}
            <div class="order-1 lg:col-start-1 lg:row-start-1">
                <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px] text-center lg:text-left">{{ $title }}</h2>
                <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mx-auto lg:mx-0" aria-hidden="true">
            </div>

            {{-- 2. Image - Mobile: second. Desktop: right col --}}
            <div class="order-2 lg:col-start-2 lg:row-start-1 lg:row-span-2 lg:self-center">
                @if($image)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}" alt="" class="w-[220px] lg:w-full lg:max-w-[420px] h-auto mx-auto lg:mx-0 lg:ml-auto block" loading="lazy">
                @endif
            </div>

            {{-- 3. Description + Bullets - Mobile: third. Desktop: left col --}}
            <div class="order-3 lg:col-start-1 lg:row-start-2">
                <p class="text-content text-neutral-b tracking-[0.48px] mb-6">{{ $description }}</p>
                <ul class="space-y-4 text-content text-neutral-b tracking-[0.48px]">
                    @foreach($bullets as $bullet)
                        <li class="flex gap-2">
                            <span class="mt-1 shrink-0">•</span>
                            <span><span class="font-bold">{{ $bullet['heading'] }}</span><br>{{ $bullet['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
