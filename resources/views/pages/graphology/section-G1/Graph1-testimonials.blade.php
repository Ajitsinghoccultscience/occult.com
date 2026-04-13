@props([
    'title' => 'Trusted experiences from our learning community',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'testimonials' => [
        [
            'quote' => 'This professional course completely transformed my understanding of the human mind. Learning signature analysis helped me identify hidden personality traits accurately. I highly recommend this program for every aspiring psychologist seeking deep behavioral insights.',
            'name' => 'Rohan Verma',
            'avatar' => 'images/assets desktop/Rohan_Verma.avif',
            'rating' => 5,
        ],
        [
            'quote' => 'The pre-recorded sessions were incredibly detailed and flexible for my busy schedule. Exploring criminality in handwriting was fascinating. Now, I use graphotherapy techniques daily to help my clients overcome their negative behavioral patterns.',
            'name' => 'Ishika',
            'avatar' => 'images/assets desktop/ishika.avif',
            'rating' => 5,
        ],
        [
            'quote' => 'I gained immense value from the Associate Degree Program levels. The experts provided deep insights into lowercase letter strokes. This cost-effective technique is truly a powerful tool for unlocking secrets of the written word.',
            'name' => 'Aryan Mehta',
            'avatar' => 'images/assets desktop/Aryan_Mehta.avif',
            'rating' => 5,
        ],
        [
            'quote' => 'Studying various psychological theories alongside handwriting analysis provided a comprehensive learning experience. I can now write detailed graphological reports professionally. Enrolling in this online course was definitely the best decision for my career.',
            'name' => 'Priya Sharma',
            'avatar' => 'images/assets desktop/Priya_Sharma.avif',
            'rating' => 5,
        ],
        [
            'quote' => 'The graphology techniques taught here are practical and easy to apply. I was amazed at how accurately handwriting reveals personality. This course has given me a unique edge in my counseling practice.',
            'name' => 'Rishika',
            'avatar' => 'images/assets desktop/Rishika.avif',
            'rating' => 5,
        ],
        [
            'quote' => 'An eye-opening journey into the science of handwriting. The content was well-structured and the instructor made complex concepts very approachable. I now use graphotherapy with my students for remarkable results.',
            'name' => 'Vikram Singh',
            'avatar' => 'images/assets desktop/Vikram_Singh.avif',
            'rating' => 5,
        ],
    ],
])

<section class="w-full section-spacing bg-white ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Testimonial cards: carousel/slider on all screen sizes --}}
        <x-ui.carousel variant="single" gridAt="none">
            @foreach($testimonials as $testimonial)
                <x-ui.carousel-slide variant="single" gridAt="none">
                <x-ui.card variant="white" class="flex flex-col h-full">
                    {{-- Large quotation mark --}}
                    <span class="text-5xl md:text-6xl font-serif text-neutral-b leading-none mb-4">"</span>

                    {{-- Testimonial text --}}
                    <p class="text-content text-neutral-b tracking-[0.48px] flex-1 mb-8">
                        {{ $testimonial['quote'] }}
                    </p>

                    {{-- User block: avatar + name + stars --}}
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full border border-neutral-h overflow-hidden shrink-0 bg-neutral-h/30 flex items-center justify-center">
                            @if($testimonial['avatar'])
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $testimonial['avatar'])))) }}" alt="{{ $testimonial['name'] }}" class="w-full h-full object-cover" loading="lazy">
                            @else
                                <span class="text-content font-semibold text-neutral-b">{{ substr($testimonial['name'], 0, 2) }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <span class="text-content font-semibold text-neutral-b">{{ $testimonial['name'] }}</span>
                            <div class="flex gap-0.5 mt-1">
                                @for($i = 0; $i < $testimonial['rating']; $i++)
                                    <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </x-ui.card>
                </x-ui.carousel-slide>
            @endforeach
        </x-ui.carousel>
    </div>
</section>
