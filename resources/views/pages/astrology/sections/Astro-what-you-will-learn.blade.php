@props([
    'title'       => ' Everything this webinar offers you ',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'sessions' => [
        [
            'label'    => 'Session 1',
            'title'    => 'The Fundamentals of vedic Astrology ',
            'subtitle' => '',
            'bullets'  => [
                '9 planets and their nature',
                '12 Zodiac Signs',
                '12 Houses and what they tell about ',
                'Structure of a birth chart',
            ],
            'description' => '',
        ],
        [
            'label'    => 'Session 2',
            'title'    => 'Live kundali practice ',
            'subtitle' => [],
            'bullets'  => [
                'Live birth chart walkthrough',
                'Planetary placement and their influence.',
                'Guided worksheet to practice along',
            ],
            'description' => 'Practice them with guided worksheets that help you gain clarity and confidence.',
        ],
        [
            'label'    => 'Session 3',
            'title'    => 'Personalized doubt session',
            'subtitle' => [],
            'bullets'  => [
                'Live Q/A with faculty',
                'Get clarity on concepts that you have doubts on.',
                'Leave the webinar with zero questions.',
            ],
            'description' => '',
        ],
    ],
])

<section class="w-full bg-neutral-bg section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto" aria-hidden="true">
        </div>

        {{-- Session cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($sessions as $session)
            <div class="bg-white rounded-2xl p-6 flex flex-col gap-4 shadow-sm border border-neutral-100">

                {{-- Pill with title --}}
                <div class="inline-flex">
                    <span class="bg-[#EDE7F6] text-[#5E3592] font-semibold text-sm px-5 py-1.5 rounded-full">
                        {{ $session['title'] }}
                    </span>
                </div>

                {{-- Subtitle (purple) --}}
                @if($session['subtitle'])
                    <p class="text-[#5E3592] text-content font-medium -mt-2">{{ $session['subtitle'] }}</p>
                @endif

                {{-- Bullets --}}
                @if(!empty($session['bullets']))
                    <ul class="space-y-2 text-content text-neutral-b">
                        @foreach($session['bullets'] as $bullet)
                            <li class="flex items-start gap-2">
                                <span class="shrink-0 mt-0.5">•</span>
                                <span>{{ $bullet }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- Description --}}
                @if($session['description'])
                    <p class="text-content text-neutral-b leading-relaxed">{{ $session['description'] }}</p>
                @endif

            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="flex justify-center mt-10 md:mt-12">
            <x-ui.button :href="$ctaHref" variant="astro-cta" class="!min-w-0 !py-4 !text-base font-bold">
                Reserve Seat @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
            </x-ui.button>
        </div>

    </div>
</section>


