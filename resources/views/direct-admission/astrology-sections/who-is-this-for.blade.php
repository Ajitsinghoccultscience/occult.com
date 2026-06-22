@props([
    'title'    => 'Who is this Course for',
    'audience' => [
        [
            'title'       => 'Aspiring Professionals',
            'description' => 'Those who want to build a full-time career in occult science - starting consultations, growing a client base, and becoming a recognized name in the industry.
',
        ],
        [
            'title'       => 'Problem-Solution Seekers',
            'description' => 'Those facing real-life challenges in career, relationships, or health  and looking for practical Vedic guidance and remedies.
',
        ],
        [
            'title'       => 'Learning-Oriented Audience',
            'description' => 'Those who want to deepen their vedic understanding for self-awareness, better decisions, and a more meaningful life.',
        ],
        
       
    ],
])

<section class="w-full section-spacing bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Cards --}}
        <div class="grid grid-cols-1  lg:grid-cols-3 gap-5">
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
