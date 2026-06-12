@props([
    'title' => 'FAQ (Frequently Asked Questions)',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
     'items' => [
        [
            'question' => 'Is prior knowledge of graphology required to attend this webinar ? ',
            'answer' => "No, this webinar is designed to be simple and easy to follow, even if you are a beginner you can come and start your journey with us.",
        ],
        [
            'question' => 'What is the difference between Graphology and Graphotherapy?  ',
            'answer' => [
                'Graphology is the understanding of a person\'s personality through their handwriting.',
                'Graphotherapy is the next step, where specific changes are suggested in writing to bring positive shifts in behaviour and mindset. Both are covered in this webinar.',
            ],
        ],
        [
            'question' => 'Will I be able to apply this after just one session?',
            'answer' => "Absolutely. By practicing live on real handwriting samples during the session, you will walk away with the practical confidence to start analyzing writing the very same day. ",
        ],
        [
            'question' => 'What does the Certificate of Participation offer professionally?',
            'answer' => " It is issued by the All India Institute of Occult Science (Govt. Regd. & ISO Certified). This adds professional credibility to your profile in fields like HR, Counselling, and Education. ",
        ],
        [
            'question' => 'What level of understanding can one expect to gain from this webinar?',
            'answer' => " This webinar is a strong and complete starting point. By the end of the session, you will be able to read handwriting with intention, identify personality traits with confidence.",
        ],
    ],
])

<section class="w-full pt-6 md:pt-8 pb-12 md:pb-16 bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">{{ $title }}</h2>
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
                            @if(is_array($item['answer']))
                                <ul class="text-content text-neutral-b tracking-[0.48px] pt-3 space-y-2">
                                    @foreach($item['answer'] as $point)
                                        <li class="flex items-start gap-2">
                                            <span class="shrink-0 mt-0.5">•</span>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-content text-neutral-b tracking-[0.48px] pt-3">
                                    {{ $item['answer'] }}
                                </p>
                            @endif
                        </div>
                    </details>
                </x-ui.card>
            @endforeach
        </div>
    </div>
</section>


