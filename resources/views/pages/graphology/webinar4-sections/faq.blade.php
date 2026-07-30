@props([
    'title' => 'FAQ (Frequently Asked Questions)',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
     'items' => [
        [
            'question' => 'Is this webinar in Hindi or English?',
            'answer' => "The full session is in simple Hinglish language so there is no language barrier, anyone can follow along easily.",
        ],
        [
            'question' => 'Do I need any background in graphology to join?',
            'answer' => "None at all. It's built for complete beginners, you start from zero and come out reading handwriting the same day.",
        ],
        [
            'question' => "Can handwriting really reveal someone's personality?",
            'answer' => "Yes, slant, pressure and spacing show confidence, emotions and honesty. You'll practice it live on real samples.",
        ],
        [
            'question' => 'Can I spot if someone is lying or hiding something?',
            'answer' => "You'll learn to read signs of stress and hesitation, the same signs that HR and investigators trust on.",
        ],
        [
            'question' => 'Can I learn to read about my signature?',
            'answer' => "Yes, in the session we cover signature analysis and by the end you would be able to understand your signature.",
        ],
        [
            'question' => 'Can I actually earn from this skill?',
            'answer' => "Yes, many professionals offer paid handwriting readings as an add-on service after learning the basics.",
        ],
        [
            'question' => 'How do I join after registering?',
            'answer' => "You'll get the joining link on WhatsApp and email right after you register.",
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

