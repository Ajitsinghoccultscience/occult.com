@props([
    'title'        => 'Our 2025 Convocation',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'images' => [
        'image/astrology%20assests/convo%201.webp',
        'image/astrology%20assests/convo%202.webp',
        'image/astrology%20assests/convo%203.webp',
        'image/astrology%20assests/convo%204.webp',
        'image/astrology%20assests/convo%205.webp',
        'image/astrology%20assests/convo%206.webp',
        'image/astrology%20assests/convo%207.webp',
        'image/astrology%20assests/convo%208.webp',
        'image/astrology%20assests/convo%209.webp',
        'image/astrology%20assests/convo%2010.webp',
    ],
])

<section class="w-full bg-white section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[140px] h-auto" aria-hidden="true">
        </div>

        {{-- Slider --}}
        <div class="relative">
            <div class="w-full overflow-x-auto scrollbar-hide" id="convo-slider">
                <div class="flex gap-4 w-max">
                    @foreach($images as $img)
                        <div class="convo-slide shrink-0 w-[85vw] sm:w-[55vw] lg:w-[30vw] rounded-xl overflow-hidden shadow-drop aspect-[4/3]">
                            <img src="{{ asset($img) }}" alt="Convocation"
                                 class="w-full h-full object-cover" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev button --}}
            <button id="convo-prev"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-bg transition-colors z-10"
                aria-label="Previous">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next button --}}
            <button id="convo-next"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-neutral-bg transition-colors z-10"
                aria-label="Next">
                <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-5">
            @foreach($images as $i => $img)
                <button id="convo-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300 bg-neutral-h"></button>
            @endforeach
        </div>

    </div>
</section>

<script>window.__carousels.push({id:'convo-slider',slideClass:'.convo-slide',prevId:'convo-prev',nextId:'convo-next',dotPrefix:'convo-dot-',dotActive:'#5E3592',offsetPad:16,interval:2500});</script>


