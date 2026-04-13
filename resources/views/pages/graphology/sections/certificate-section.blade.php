@props([
    'title' => 'Certificate for participation',
    'body' => 'You will get a certificate of participation after attending the graphology live webinar, which you can use both personally and professionally.',
    'ctaHref' => '#',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'image' => 'images/graphology certificate.webp',
])

<section class="w-full section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <x-ui.card variant="cream" class="overflow-hidden">
            {{-- Mobile layout: heading → image → body → button (flex-col) --}}
            {{-- Desktop layout: 2-col grid (content left, image right) --}}

            {{-- MOBILE: stacked (hidden on desktop) --}}
            <div class="flex flex-col gap-5 lg:hidden">
                <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] text-center">{{ $title }}</h2>
                <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mx-auto" aria-hidden="true">
                <div class="flex justify-center">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                         alt="Certificate of participation"
                         class="w-full max-w-[320px] h-auto object-contain rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.18)]"
                         loading="lazy">
                </div>
                <p class="text-content text-neutral-b tracking-[0.48px] text-center">{{ $body }}</p>
                <div class="flex justify-center">
                    <x-ui.button :href="$ctaHref" variant="dark" :compact="true" class="!min-w-0">
                        Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
                    </x-ui.button>
                </div>
            </div>

            {{-- DESKTOP: 2-col grid (hidden on mobile) --}}
            <div class="hidden lg:grid grid-cols-2 gap-8 items-center">
                <div class="flex flex-col">
                    <h2 class="text-heading font-bold text-neutral-b mb-2 tracking-[0.9px]">{{ $title }}</h2>
                    <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mb-6" aria-hidden="true">
                    <p class="text-content text-neutral-b tracking-[0.48px] mb-8">{{ $body }}</p>
                    <x-ui.button :href="$ctaHref" variant="dark" :compact="true" class="!min-w-0 self-start">
                        Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
                    </x-ui.button>
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                         alt="Certificate of participation"
                         class="w-full max-w-[420px] h-auto object-contain rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.18)] hover:scale-105 transition-transform duration-300"
                         loading="lazy">
                </div>
            </div>
        </x-ui.card>
    </div>
</section>
