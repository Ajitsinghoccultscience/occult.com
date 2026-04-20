@props([
    'title' => 'FAQ (Frequently Asked Questions)',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'items' => [
        [
            'question' => 'Is this webinar suitable for absolute beginners?',
            'answer' => "Yes, absolutely! This session is designed for people with zero prior knowledge. We break down complex concepts like planets, zodiac signs, and houses into simple, everyday language that anyone can understand and apply.",
        ],
        [
            'question' => 'Why is the fee only ₹49? Is there a catch?',
            'answer' => 'No catch at all. Our goal is to make authentic Vedic wisdom accessible to every household. The ₹49 fee is a "commitment fee" to ensure that only serious learners join the session, covering the basic administrative costs of the digital platform.',
        ],
        [
            'question' => 'Will I receive a certificate?',
            'answer' => "Yes! All participants who attend the live session will receive a Participation Certificate.",
        ],
        [
            'question' => 'Can I ask questions about my own birth chart?',
            'answer' => 'While we can\'t do full individual readings for everyone due to time, we have a dedicated Q&A session at the end. You will learn the specific "formula" to look at your own chart, and I will answer general queries about career, wealth, and health.',
        ],
        [
            'question' => 'What do I need to join the webinar?',
            'answer' => 'All you need is a smartphone or laptop, a stable internet connection, and an open mind! We highly recommend keeping a pen and notebook handy to jot down the "Wealth Timing" secrets we will reveal during the class.',
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


