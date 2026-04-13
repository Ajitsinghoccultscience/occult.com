@props([
    'title' => 'Meet Your Trainer',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'trainerName' => 'Mr. Manmohan Tiwari',
    'trainerTitle' => 'Astrologer',
    'description' => [
        "We are honored to have Mr. Manmohan Tiwari as a faculty astrologer. He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience. He has authored books and published papers in reputed journals. Known for his passion and enthusiasm, he creates a comfortable learning environment. Currently, he continues his research at Kashi Hindu Vishwavidyalaya, Varanasi, Uttar Pradesh, and teaches excellence.",
    ],
    'ctaText' => 'Reserve My seat @₹49',
    'ctaPriceStruck' => '₹999',
    'ctaHref' => '#',
    'image' => 'images/astrology webinar/manmohan sir.png',
])

<!-- <section class="w-full section-spacing bg-neutral-bg "> -->
<section class="w-full section-spacing bg-white ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        {{-- Section title: hidden on mobile (shown inside card), visible on desktop --}}
        <div class="hidden lg:block text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        <x-ui.card variant="white" :padding="false" class="overflow-hidden w-full max-w-[1500px] mx-auto lg:h-[376px]">
            {{-- Mobile: stacked card layout --}}
            <div class="lg:hidden flex flex-col p-8 md:p-10">
                    {{-- Title inside card (mobile only) --}}
                    <h3 class="text-heading font-bold text-neutral-b text-center mb-6 tracking-[0.9px]">
                        {{ $title }}
                    </h3>

                    {{-- Trainer image (full, uncropped) --}}
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset($image) }}" alt="{{ $trainerName }}" class="w-full max-w-[280px] object-contain shrink-0" width="280" loading="lazy">
                    </div>

                    {{-- Name & profession centered --}}
                    <h4 class="text-xl font-bold text-neutral-b text-center mb-1 tracking-[0.9px]">
                        {{ $trainerName }}
                    </h4>
                    <p class="text-content text-neutral-b text-center mb-6 tracking-[0.48px]">({{ $trainerTitle }})</p>

                    {{-- Description left-aligned --}}
                    <div class="mb-8">
                        @foreach($description as $paragraph)
                            <p class="text-content text-neutral-b tracking-[0.48px] mb-4 text-left">{{ $paragraph }}</p>
                        @endforeach
                    </div>

                    {{-- CTA button --}}
                    <x-ui.button :href="$ctaHref" variant="primary" size="sm" :fullWidth="true">
                        {{ $ctaText }} <span class="text-lg line-through opacity-80 ml-1">{{ $ctaPriceStruck }}</span>
                    </x-ui.button>
            </div>

            {{-- Desktop: side-by-side layout --}}
            <div class="hidden lg:grid lg:grid-cols-[400px_1fr] gap-0 h-full">
                    {{-- Left: Trainer image --}}
                    <div class="flex items-center justify-center p-8 pb-8">
                        <img src="{{ asset($image) }}" alt="{{ $trainerName }}" class="w-full max-w-[338px] h-[332px] object-contain" width="338" height="332" loading="lazy">
                    </div>

                    {{-- Right: Content --}}
                    <div class="p-8 md:p-10 flex flex-col justify-center">
                        <h3 class="text-heading font-bold text-neutral-b mb-1 tracking-[0.9px]">
                            {{ $trainerName }}
                        </h3>
                        <p class="text-content text-neutral-b mb-6 tracking-[0.48px]">({{ $trainerTitle }})</p>

                        @foreach($description as $paragraph)
                            <p class="text-content text-neutral-b tracking-[0.48px] mb-4">{{ $paragraph }}</p>
                        @endforeach

                        <x-ui.button :href="$ctaHref" variant="primary" size="sm" :compact="true">
                            {{ $ctaText }} <span class="text-lg line-through opacity-80 ml-1">{{ $ctaPriceStruck }}</span>
                        </x-ui.button>
                    </div>
            </div>
        </x-ui.card>
    </div>
</section>
