@props([
    'title' => 'FAQ (Frequently Asked Questions)',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'items' => [
        [
            'question' => 'Is prior knowledge of astrology required to attend this webinar ? ',
            'answer' => " No, this webinar is designed to be simple and easy to follow, even if you are a beginner you can come and start your astrology journey with us. ",
        ],
        [
            'question' => 'Does learning astrology require a background in mathematics or astronomy ? ',
            'answer' => 'Not at all ! Our session focuses on helping you understand planets, houses and zodiac signs and the connection between them to develop the skills to read kundali.',
        ],
        [
            'question' => 'What level of understanding  can one expect to gain from this webinar ? ',
            'answer' => "This webinar is the perfect first step. You’ll walk away with a solid understanding of how a birth chart works and the confidence to start reading one.",
        ],
        [
            'question' => 'How is this webinar different from astrology content freely available online? ',
            'answer' => 'Most online information is random facts.This webinar gives you a solid foundation taught by professionals. We teach everything in the correct order so you can truly understand how it works. ',
        ],
     
    ],
])

<section class="w-full section-spacing section-spacing-after bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- FAQ accordion cards --}}
        <div class="flex flex-col gap-3 md:gap-4">
            @foreach($items as $item)
                <x-ui.card variant="white" :padding="false" :accordion="true">
                    <details class="group">
                        <summary class="flex items-center justify-between gap-4 cursor-pointer list-none p-4 md:p-5">
                            <span class="text-content text-neutral-b tracking-[0.48px] flex-1 text-left pr-4">
                                {{ $item['question'] }}
                            </span>
                            <span class="shrink-0 w-6 h-6 flex items-center justify-center transition-transform duration-200 group-open:rotate-180">
                                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </span>
                        </summary>
                        <div class="px-4 md:px-5 pb-4 md:pb-5 pt-0 border-t border-neutral-h/50">
                            <p class="text-content text-neutral-b tracking-[0.48px] pt-3">
                                {{ $item['answer'] }}
                            </p>
                        </div>
                    </details>
                </x-ui.card>
            @endforeach
        </div>
    </div>
</section>


