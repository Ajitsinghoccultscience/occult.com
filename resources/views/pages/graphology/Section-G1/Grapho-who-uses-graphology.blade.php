@props([
    'title'       => 'Who is this Webinar for',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'items' => [
        [
            'title'       => 'Curious Beginners',
            'description' => 'Curious beginners who want a simple understanding of handwriting analysis, personality traits, and behavior patterns.',
        ],
        [
            'title'       => 'Learning-Oriented Audience',
            'description' => 'These are individuals who want to learn graphology seriously, either for personal growth or as a career option.',
        ],
        [
            'title'       => 'Counselors',
            'description' => 'Counselors use graphology to help people understand their strengths and weaknesses, build self-awareness, and choose better career paths.',
        ],
         [
            'title'       => 'HR professionals',
            'description' => 'HR and recruiters use handwriting analysis to understand a candidate’s mindset, energy level, leadership qualities,and overall personality.',
        ],
        [
            'title'       => 'Psychologists',
            'description' => 'Clinical psychologists use handwriting as a tool to understand a patient’s subconscious and track progress during therapy.',
        ],
        [
            'title'       => 'FBI investigators',
            'description' => 'FBI investigators analyze ransom notes and threats to understand a suspect’s personality and emotional state, helping narrow down leads.',
        ]
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
                    <svg class="w-5 h-5 text-[#04043A]" fill="currentColor" viewBox="0 0 24 24">
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


