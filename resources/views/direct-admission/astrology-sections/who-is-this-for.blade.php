@props([
    'title'    => 'Who is this Course for',
    'audience' => [
        [
            'title'       => 'Curious Beginners',
            'description' => 'Curious beginners who want simple understanding of kundli, zodiac signs, and future predictions.',
        ],
        [
            'title'       => 'Career Aspirants',
            'description' => 'Those who want to build a professional career as a certified astrologer, consultant, or start their own astrology practice and earn from their skills.',
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

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($audience as $item)
            <div class="border border-neutral-200 rounded-2xl p-5 bg-white shadow-sm flex flex-col gap-3">
                {{-- Person icon --}}
                <div class="w-8 h-8 flex items-center justify-center" style="color:#8B0000;">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-neutral-b mb-1">{{ $item['title'] }}</p>
                    <p class="text-xs text-neutral-e leading-relaxed">{{ $item['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
