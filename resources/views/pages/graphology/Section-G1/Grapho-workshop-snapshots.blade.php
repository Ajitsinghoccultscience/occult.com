@props([
    'title' => 'Snapshots of 11th Last Workshop',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'images' => [
        
        'image/astrology%20assests/snapshot%202.webp',
        
        'image/astrology%20assests/snapshot%204.webp',
       
        'image/astrology%20assests/snapshot%206.webp',
        'image/astrology%20assests/snapshot%207.webp',
        
    ],
])

<section class="w-full section-spacing section-spacing-after bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[140px] h-auto" aria-hidden="true">
        </div>

        {{-- Slider track --}}
        <div class="w-full overflow-x-auto scrollbar-hide" id="snapshot-slider">
            <div class="flex gap-4 w-max">
                @foreach($images as $img)
                    <div class="snapshot-slide shrink-0 w-[85vw] sm:w-[60vw] lg:w-[30vw] rounded-xl overflow-hidden shadow-drop aspect-[16/10]">
                        <img src="{{ asset($img) }}" alt="Workshop snapshot"
                             class="w-full h-full object-cover" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-5" id="snapshot-dots">
            @foreach($images as $i => $img)
                <button id="snap-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300 bg-neutral-h"></button>
            @endforeach
        </div>

    </div>
</section>

<script>window.__carousels.push({id:'snapshot-slider',slideClass:'.snapshot-slide',dotPrefix:'snap-dot-',dotActive:'#191F59',dotInactive:'',offsetPad:16,interval:2500});</script>


