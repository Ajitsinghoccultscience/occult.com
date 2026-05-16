@props([
    'title'   => 'Why Choose Astrology Course From All India Institute of Occult Science',
    'features' => [
        [
            'icon'        => 'monitor',
            'title'       => 'Live Classes + Doubt Sessions',
            'description' => 'Attend live classes with real-time interaction, where doubts are addressed instantly and concepts are explained with practical examples.',
        ],
        [
            'icon'        => 'award',
            'title'       => 'Trusted by thousands of students',
            'description' => 'Backed by thousands of genuine Google reviews from real students who have completed the course and built their astrology journey with us.',
        ],
        [
            'icon'        => 'graduation',
            'title'       => 'Experienced Faculty with Learning Flexibility',
            'description' => 'Learn from 21 expert teachers, each with 10+ years of experience. If needed, students can smoothly change batches or faculty to ensure comfort and better understanding–personally guided by our founder.',
        ],
        [
            'icon'        => 'clock',
            'title'       => 'Lifetime Learning & Practice Support',
            'description' => 'Even years after completion, students can attend doubt-solving sessions, refreshers, and practical classes–because astrology mastery is a continuous journey.',
        ],
        [
            'icon'        => 'rec',
            'title'       => 'Access to Class Recordings',
            'description' => 'Missed a session? No problem. Get full access to live recorded classes so learning never stops due to schedule or time constraints.',
        ],
        [
            'icon'        => 'group',
            'title'       => 'Small batch learning',
            'description' => 'Limited batch sizes ensure focused attention, better interaction, and a deeper learning experience for every student.',
        ],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3 max-w-2xl mx-auto leading-snug">{{ $title }}</h2>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">
            @foreach($features as $feature)
            <div class="flex items-start gap-5">

                {{-- Icon box --}}
                <div class="shrink-0 w-16 h-16 rounded-2xl flex items-center justify-center" style="background-color:#8B0000;">
                    @if($feature['icon'] === 'monitor')
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M7 8l3 3 5-5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @elseif($feature['icon'] === 'award')
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="9" r="6"/><path d="M9 22l3-3 3 3M9 13.13V22l3-1.5 3 1.5v-8.87" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @elseif($feature['icon'] === 'graduation')
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                        </svg>
                    @elseif($feature['icon'] === 'clock')
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @elseif($feature['icon'] === 'rec')
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <rect x="2" y="6" width="20" height="14" rx="2"/><circle cx="12" cy="13" r="3" fill="currentColor" stroke="none"/><path d="M8 3h8" stroke-linecap="round"/>
                        </svg>
                    @elseif($feature['icon'] === 'group')
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    @endif
                </div>

                {{-- Text --}}
                <div>
                    <h3 class="text-base font-bold text-neutral-b mb-2 leading-snug">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-neutral-e leading-relaxed">{{ $feature['description'] }}</p>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
