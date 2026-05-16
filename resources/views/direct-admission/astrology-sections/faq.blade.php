@props([
    'title' => 'Frequently Asked Questions (FAQ)',
    'faqs'  => [
        [
            'question' => 'Is this course suitable for absolute beginners?',
            'answer'   => 'Yes, absolutely! This course is designed to welcome students with zero prior knowledge of astrology. We start from the very basics — what astrology is, its roots, and foundational concepts — before gradually progressing to advanced topics like Kundali reading and Dasha predictions.',
        ],
        [
            'question' => 'What is the duration of the course?',
            'answer'   => 'The course spans several months and includes 2000+ hours of learning content. This includes live online classes, pre-recorded video lectures, case studies, and live projects so you get comprehensive hands-on experience.',
        ],
        [
            'question' => 'Will I receive a certificate after completing the course?',
            'answer'   => 'Yes! Upon successful completion, you will receive an internationally recognised certificate from All India Institute of Occult Science. Our certificates are ISO-certified and recognised by leading astrology bodies across India.',
        ],
        [
            'question' => 'Can I study at my own pace?',
            'answer'   => 'Yes. All sessions are recorded and available on-demand so you can learn at your own pace. Live classes are also scheduled regularly for interactive learning and doubt-clearing sessions.',
        ],
        [
            'question' => 'What topics are covered in the curriculum?',
            'answer'   => 'The curriculum covers Introduction to Astrology, Astronomy basics, Horoscope types, Bhava (Houses), Planets & Significance, Zodiac Signs, Dasha System, and Kundali Reading — along with practical case studies and Vedic tools.',
        ],
        [
            'question' => 'Is there any placement or career support after the course?',
            'answer'   => 'Yes! We provide career guidance, help you set up your own astrology practice, and connect you with our growing alumni network. Many of our graduates are now successful professional astrologers.',
        ],
        [
            'question' => 'How do I enrol in the course?',
            'answer'   => 'Simply click the "Enrol Now" button on this page, complete the registration form, and make the payment. Our team will reach out to you within 24 hours with login credentials and the course schedule.',
        ],
    ],
])

@php $faqId = 'faq-' . uniqid(); @endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- FAQ Accordion --}}
        <div class="max-w-[860px] mx-auto flex flex-col gap-3" id="{{ $faqId }}">
            @foreach($faqs as $i => $faq)
            <div class="border border-neutral-200 rounded-2xl overflow-hidden shadow-sm" data-faq-item>

                {{-- Question row --}}
                <button
                    class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left bg-white hover:bg-neutral-50 transition-colors duration-200"
                    onclick="toggleFaq(this)"
                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}">
                    <span class="font-semibold text-sm md:text-base text-neutral-b leading-snug">{{ $faq['question'] }}</span>
                    <span class="shrink-0 w-7 h-7 rounded-full border border-neutral-200 flex items-center justify-center transition-transform duration-300 {{ $i === 0 ? 'rotate-180' : '' }}" data-faq-icon>
                        <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </span>
                </button>

                {{-- Answer panel --}}
                <div class="{{ $i === 0 ? '' : 'hidden' }} px-5 pb-4 border-t border-neutral-100" data-faq-panel>
                    <p class="text-sm text-neutral-e leading-relaxed pt-3">{{ $faq['answer'] }}</p>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

<script>
function toggleFaq(btn) {
    const item  = btn.closest('[data-faq-item]');
    const panel = item.querySelector('[data-faq-panel]');
    const icon  = btn.querySelector('[data-faq-icon]');
    const isOpen = btn.getAttribute('aria-expanded') === 'true';

    if (isOpen) {
        panel.classList.add('hidden');
        icon.classList.remove('rotate-180');
        btn.setAttribute('aria-expanded', 'false');
    } else {
        panel.classList.remove('hidden');
        icon.classList.add('rotate-180');
        btn.setAttribute('aria-expanded', 'true');
    }
}
</script>
