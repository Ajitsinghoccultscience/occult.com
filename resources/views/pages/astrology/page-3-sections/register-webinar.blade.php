@props([
    'title'       => 'Register for this webinar if you are',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'items' => [
        [
            'title'       => 'Curious Beginners',
            'description' => 'Curious beginners who want simple understanding of kundli, zodiac signs, and future predictions.',
        ],
        [
            'title'       => 'Problem-Solution Seekers',
            'description' => 'People facing real-life problems who seek practical guidance and remedies (upay) through astrology.',
        ],
        [
            'title'       => 'Learning-Oriented Audience',
            'description' => 'These are individuals who want to learn astrology seriously, either for personal growth or as a career option.',
        ],
    ],
])

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[130px] h-auto" aria-hidden="true">
        </div>

        {{-- 3 cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($items as $item)
            <div class="bg-white rounded-2xl p-6 flex flex-col gap-3 shadow-sm border border-neutral-100">

                {{-- Purple person icon --}}
                <div class="w-9 h-9 rounded-full bg-[#EDE7F6] flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#5E3592]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>

                {{-- Title --}}
                <h3 class="text-content font-bold text-neutral-b">{{ $item['title'] }}</h3>

                {{-- Description --}}
                <p class="text-content text-neutral-b leading-relaxed">{{ $item['description'] }}</p>

            </div>
            @endforeach
        </div>

    </div>
</section>


