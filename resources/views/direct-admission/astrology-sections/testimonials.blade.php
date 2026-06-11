@props([
    'title'        => 'Trusted experiences from our learning community',
    'testimonials' => [
        [
            'text'   => 'This professional astrology course completely transformed my understanding of planetary influences. Learning chart analysis helped me identify hidden personality traits with accuracy. I highly recommend this program for every aspiring astrologer seeking deep insights into human behavior and destiny.',
            'name'   => 'Aditya',
            'image'  => 'image/astrology assests/alumni 1.webp',
            'rating' => 5,
        ],
        [
            'text'   => 'The pre-recorded sessions were detailed and perfect for my busy schedule. Exploring planetary doshas and their remedies was truly fascinating. Now, I apply these astrological techniques daily to guide my clients and help them overcome life challenges.',
            'name'   => 'Sneha',
            'image'  => 'image/astrology assests/alumni 2.webp',
            'rating' => 5,
        ],
        [
            'text'   => 'I gained immense value from the different levels of this astrology program. The experts explained complex concepts like house placements and planetary aspects in a simple way. This cost-effective course is a powerful tool for decoding life patterns through astrology.',
            'name'   => 'Karan',
            'image'  => 'image/astrology assests/alumni 3.webp',
            'rating' => 5,
        ],
        [
            'text'   => 'Studying various astrological principles along with practical chart reading gave me a complete learning experience. I can now confidently create detailed birth chart reports. Enrolling in this online astrology course was one of the best decisions for my career.',
            'name'   => 'Riddhi',
            'image'  => 'image/astrology assests/alumni 4.webp',
            'rating' => 5,
        ],
        [
            'text'   => 'The faculty is incredibly knowledgeable and patient. Every session was well-structured and easy to follow. I now use what I learned to help my family and friends navigate challenges with the wisdom of Vedic astrology.',
            'name'   => 'Priya',
            'image'  => 'image/astrology assests/laxmi mam.webp',
            'rating' => 5,
        ],
        [
            'text'   => 'An outstanding course that balances theory and practice beautifully. The live doubt sessions were extremely helpful and the certification gave a huge boost to my confidence as an astrologer.',
            'name'   => 'Rahul',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'rating' => 5,
        ],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Swipeable slider: 1 card mobile, 2 tablet, 4 desktop --}}
        <div class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
            @foreach($testimonials as $t)
            <div class="snap-center shrink-0 w-[85%] sm:w-[calc(50%_-_0.5rem)] lg:w-[calc(25%_-_0.75rem)] bg-white border border-neutral-200 rounded-2xl p-5 flex flex-col gap-4 shadow-sm">

                {{-- Quote icon --}}
                <div class="text-neutral-b">
                    <svg class="w-8 h-8 opacity-80" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                {{-- Review text --}}
                <p class="text-sm text-neutral-e leading-relaxed flex-1 italic">{{ $t['text'] }}</p>

                {{-- Avatar + name + stars --}}
                <div class="flex items-center gap-3 pt-2 border-t border-neutral-100">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $t['image'])))) }}"
                         alt="{{ $t['name'] }}"
                         class="w-10 h-10 rounded-full object-cover object-top shrink-0 border border-neutral-200"
                         loading="lazy">
                    <div>
                        <p class="font-semibold text-sm text-neutral-b">{{ $t['name'] }}</p>
                        <div class="flex gap-0.5 mt-0.5">
                            @for($s = 0; $s < $t['rating']; $s++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
