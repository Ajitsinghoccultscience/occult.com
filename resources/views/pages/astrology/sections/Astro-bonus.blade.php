@props([
    'title'       => 'Exclusive Bonus',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'bonuses' => [
        [
            'label' => 'Bonus: 1',
            'title' => 'Certificate of Participation',
            'image' => 'image/astrology%20assests/Astrology%20certificate%201.jpg',
        ],
        [
            'label' => 'Bonus: 2',
            'title' => 'PDF Notes',
            'image' => 'image/astrology%20assests/pdf%20notes.jpg',
        ],
        [
            'label' => 'Bonus: 3',
            'title' => 'Live Q&A Session',
            'image' => 'image/astrology%20assests/live%20q%26a%20session.jpg',
        ],
    ],
])

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-12 section-px">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto" aria-hidden="true">
        </div>

        {{-- MOBILE: horizontal peek slider --}}
        <div class="md:hidden flex gap-4 overflow-x-auto scrollbar-hide pl-6 pr-4 pb-2 snap-x snap-mandatory">
            @foreach($bonuses as $bonus)
            <div class="bg-white rounded-2xl p-5 flex flex-col items-center gap-4 shadow-sm border border-neutral-100 shrink-0 w-[72%] snap-start">
                <div class="border-2 border-neutral-b rounded-full px-5 py-1.5">
                    <span class="text-sm font-semibold text-neutral-b">{{ $bonus['label'] }}</span>
                </div>
                <h3 class="text-base font-bold text-[#5E3592] text-center">{{ $bonus['title'] }}</h3>
                <div class="w-full flex items-center justify-center">
                    <img src="{{ asset($bonus['image']) }}" alt="{{ $bonus['title'] }}" class="w-full max-h-[160px] object-contain" loading="lazy">
                </div>
            </div>
            @endforeach
        </div>

        {{-- DESKTOP: 3-column grid --}}
        <div class="hidden md:grid grid-cols-3 gap-6 section-px">
            @foreach($bonuses as $bonus)
            <div class="bg-white rounded-2xl p-6 flex flex-col items-center gap-5 shadow-sm border border-neutral-100">
                <div class="border-2 border-neutral-b rounded-full px-6 py-1.5">
                    <span class="text-content font-semibold text-neutral-b">{{ $bonus['label'] }}</span>
                </div>
                <h3 class="text-subheading font-bold text-[#5E3592] text-center">{{ $bonus['title'] }}</h3>
                <div class="w-full flex items-center justify-center">
                    <img src="{{ asset($bonus['image']) }}" alt="{{ $bonus['title'] }}" class="w-full max-h-[200px] object-contain" loading="lazy">
                </div>
            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="flex justify-center mt-10 md:mt-12 section-px">
            <x-ui.button :href="$ctaHref" variant="astro-cta" class="!min-w-0 !py-4 !text-base font-bold w-full md:w-auto">
                Register Now @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
            </x-ui.button>
        </div>

    </div>
</section>
