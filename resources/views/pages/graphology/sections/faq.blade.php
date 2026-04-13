@props([
    'title' => 'FAQ (Frequently Asked Questions)',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'items' => [
        [
            'question' => 'What is Graphology and what will I learn to analyze?',
            'answer' => "Graphology is the study of handwriting to understand the human mind. In this webinar, you will learn to analyze slant variations, margins, spacing, and lowercase letter strokes (like 'i' and 't') to decode a person's hidden personality, moods, and emotions.",
        ],
        [
            'question' => 'How can Graphology be used in professional fields? ',
            'answer' => "It is a versatile tool used by HR professionals for recruitment, FBI investigators to create behavioral profiles, and psychologists to uncover a patient’s subconscious conflicts. It is also used by judges in forensic cases to evaluate a defendant's mental state.",
        ],
        [
            'question' => 'What is Graphotherapy?',
            'answer' => "Graphotherapy is a corrective method where you suggest specific changes to a person’s handwriting or signature. This technique helps individuals overcome negative personality traits and habits, fostering personal growth and betterment.",
        ],
        [
            'question' => 'Can I identify criminal behavior through this course?',
            'answer' => " Yes. The curriculum includes studying the writing patterns of both criminals and non-criminals. You will learn to spot signs of deviance, aggression, and instability to build comprehensive psychological portraits.",
        ],
        [
            'question' => 'Will I receive a certificate for attending?',
            'answer' => "Yes. After attending the live webinar, you will receive a Certificate of Participation from the All India Institute of Occult Science, which can be utilized for both personal and professional advancement.",
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
