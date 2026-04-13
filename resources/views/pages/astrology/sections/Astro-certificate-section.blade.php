@props([
    'title' => 'Certificate for participation',
    'body' => 'You will receive a Certificate of Participation after attending the Astrology live webinar, empowering you to use this knowledge for both personal growth and professional practice.',
    'ctaHref' => '#',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'image' => 'images/Astrology certificate.webp',
])

<section class="w-full section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <x-ui.card variant="cream" class="overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-center">
                {{-- Mobile: image first, Desktop: image on right --}}
                <div class="flex items-center justify-center order-1 lg:order-2">
                    <img src="{{ asset($image) }}" alt="Certificate of participation" class="w-full max-w-[500px] h-auto object-contain drop-shadow-lg" loading="lazy">
                </div>

                {{-- Content: below image on mobile, left on desktop --}}
                <div class="flex flex-col order-2 lg:order-1">
                    <h2 class="text-heading font-bold text-neutral-b mb-4 md:mb-2 tracking-[0.9px] text-center md:text-left">{{ $title }}</h2>
                    <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mb-6 mx-auto md:mx-0" aria-hidden="true">
                    <p class="text-content text-neutral-b tracking-[0.48px] mb-8">{{ $body }}</p>
                    <div class="flex justify-center md:justify-start">
                        <x-ui.button :href="$ctaHref" variant="dark" :compact="true" class="!min-w-0">
                            Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
                        </x-ui.button>
                    </div>
                </div>
            </div>
        </x-ui.card>
    </div>
</section>
