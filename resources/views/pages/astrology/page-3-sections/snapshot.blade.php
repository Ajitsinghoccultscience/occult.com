@props([
    'images' => [
        'image/astrology%20assests/snapshot-astro/1.webp',
        'image/astrology%20assests/snapshot-astro/2.webp',
        'image/astrology%20assests/snapshot-astro/3.webp',
        'image/astrology%20assests/snapshot-astro/4.webp',
    ],
])

<section class="w-full section-spacing section-spacing-after bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b mb-2 tracking-[0.9px]">
                A Glimpse of Our <span style="color: #7C3AED;">Previous Webinar</span>
            </h2>
            <p class="text-content text-neutral-c mt-1">
                (Conducted by the faculty of All India Institute of Occult Science)
            </p>
        </div>

        {{-- Images grid --}}
        <div class="hidden md:grid grid-cols-4 gap-4">
            @foreach($images as $img)
                <div class="rounded-xl overflow-hidden shadow-drop aspect-[16/10]">
                    <img src="{{ asset($img) }}" alt="Webinar snapshot"
                         class="w-full h-full object-cover" loading="lazy">
                </div>
            @endforeach
        </div>

        {{-- Mobile slider --}}
        <div class="md:hidden w-full overflow-x-auto scrollbar-hide" id="snapshot-slider">
            <div class="flex gap-4 w-max">
                @foreach($images as $img)
                    <div class="snapshot-slide shrink-0 w-[85vw] sm:w-[60vw] rounded-xl overflow-hidden shadow-drop aspect-[16/10]">
                        <img src="{{ asset($img) }}" alt="Webinar snapshot"
                             class="w-full h-full object-cover" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Mobile dots --}}
        <div class="flex md:hidden justify-center gap-2 mt-5" id="snapshot-dots">
            @foreach($images as $i => $img)
                <button id="snap-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300 bg-neutral-h"></button>
            @endforeach
        </div>

    </div>
</section>

<script>window.__carousels.push({id:'snapshot-slider',slideClass:'.snapshot-slide',dotPrefix:'snap-dot-',dotActive:'#7C3AED',dotInactive:'',offsetPad:16,interval:2500});</script>
