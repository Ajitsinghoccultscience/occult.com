@props([
    'title'    => 'Your Journey with All India Institute of Occult Science',
    'subtitle' => 'From first step to confident expert',
    'steps'    => [
        [
            'label'       => 'Registration',
            'description' => 'Start your journey with a simple enrollment process. Get instant access to course materials, live session details, and your learning dashboard after registration.',
        ],
        [
            'label'       => 'Classes',
            'description' => 'Attend interactive live classes designed to simplify astrology concepts step by step. Learn through practical examples, charts, and real-life case studies.',
        ],
        [
            'label'       => 'Exam',
            'description' => 'Test your knowledge with assessments and practical evaluations. Build confidence by applying what you\'ve learned in real astrology scenarios.',
        ],
        [
            'label'       => 'Certification',
            'description' => 'Receive an industry-recognized certification after successful completion of the program. Showcase your expertise and build trust with future clients.',
        ],
        [
            'label'       => 'Personal Branding',
            'description' => 'Learn how to grow your presence as an astrologer on social media and online platforms. Build authority, attract clients, and create your unique identity.',
        ],
        [
            'label'       => 'Placement',
            'description' => 'Get career guidance, consultation opportunities, and support to start your professional astrology journey with confidence.',
        ],
    ],
    'footer' => 'Your connection with us does not end after the course. If you ever face doubts or need guidance– even years later– you can contact us and we will connect you with the right faculty.',
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1100px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-2">{{ $title }}</h2>
            <p class="text-sm text-neutral-e">{{ $subtitle }}</p>
        </div>

        {{-- Timeline --}}
        <div class="relative">

            {{-- Vertical dashed line (center) --}}
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 -translate-x-1/2 w-px border-l-2 border-dashed border-[#CC2200]/40 z-0"></div>

            {{-- Mobile vertical line (left offset) --}}
            <div class="md:hidden absolute left-5 top-0 bottom-0 w-px border-l-2 border-dashed border-[#CC2200]/40 z-0"></div>

            <div class="flex flex-col gap-8">
                @foreach($steps as $i => $step)
                @php $isOdd = ($i % 2 === 0); @endphp

                {{-- MOBILE: all left-aligned --}}
                <div class="md:hidden flex items-start gap-4 relative z-10">
                    {{-- Number badge --}}
                    <div class="shrink-0 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md z-10" style="background-color:#8B0000;">
                        {{ $i + 1 }}
                    </div>
                    {{-- Card --}}
                    <div class="flex-1 border border-neutral-200 rounded-2xl p-4 shadow-sm bg-white">
                        <span class="inline-block border border-neutral-300 rounded-full text-xs font-semibold text-neutral-b px-3 py-1 mb-2">{{ $step['label'] }}</span>
                        <p class="text-xs text-neutral-e leading-relaxed">{{ $step['description'] }}</p>
                    </div>
                </div>

                {{-- DESKTOP: alternating left / right --}}
                <div class="hidden md:flex items-center relative z-10 gap-0">

                    @if($isOdd)
                        {{-- Odd: card LEFT, number CENTER, empty RIGHT --}}
                        <div class="w-[calc(50%-28px)] flex justify-end pr-6">
                            {{-- empty --}}
                        </div>
                        <div class="shrink-0 w-14 h-14 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md z-10 mx-auto" style="background-color:#8B0000;">
                            {{ $i + 1 }}
                        </div>
                        <div class="w-[calc(50%-28px)] pl-6">
                            <div class="border border-neutral-200 rounded-2xl p-5 shadow-sm bg-white">
                                <span class="inline-block border border-neutral-300 rounded-full text-xs font-semibold text-neutral-b px-3 py-1 mb-3">{{ $step['label'] }}</span>
                                <p class="text-sm text-neutral-e leading-relaxed">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    @else
                        {{-- Even: empty LEFT, number CENTER, card RIGHT --}}
                        <div class="w-[calc(50%-28px)] flex justify-end pr-6">
                            <div class="border border-neutral-200 rounded-2xl p-5 shadow-sm bg-white w-full">
                                <span class="inline-block border border-neutral-300 rounded-full text-xs font-semibold text-neutral-b px-3 py-1 mb-3">{{ $step['label'] }}</span>
                                <p class="text-sm text-neutral-e leading-relaxed">{{ $step['description'] }}</p>
                            </div>
                        </div>
                        <div class="shrink-0 w-14 h-14 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md z-10 mx-auto" style="background-color:#8B0000;">
                            {{ $i + 1 }}
                        </div>
                        <div class="w-[calc(50%-28px)] pl-6">
                            {{-- empty --}}
                        </div>
                    @endif

                </div>
                @endforeach
            </div>
        </div>

        {{-- Footer note --}}
        <div class="mt-10 border border-neutral-200 rounded-2xl p-5 bg-neutral-50">
            <p class="text-xs text-neutral-e leading-relaxed">{{ $footer }}</p>
        </div>

    </div>
</section>
