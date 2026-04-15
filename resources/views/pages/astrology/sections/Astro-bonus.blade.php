@props([
    'title'       => 'Bonus Material',
    'subtitle'    => 'Unlock Bonus Worth ₹999',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'bonuses' => [
        [
            'label' => 'Bonus: 1',
            'title' => 'Practice Worksheets',
            'image' => 'image/astrology%20assests/worksheet.jpg',
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
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto mb-4" aria-hidden="true">
            <p class="text-content font-semibold text-[#5E3592]">{{ $subtitle }}</p>
        </div>

        {{-- Bonus cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($bonuses as $bonus)
            <div class="bg-white rounded-2xl p-6 flex flex-col items-center gap-5 shadow-sm border border-neutral-100">

                {{-- Badge --}}
                <div class="border-2 border-neutral-b rounded-full px-6 py-1.5">
                    <span class="text-content font-semibold text-neutral-b">{{ $bonus['label'] }}</span>
                </div>

                {{-- Title --}}
                <h3 class="text-subheading font-bold text-[#5E3592] text-center">{{ $bonus['title'] }}</h3>

                {{-- Image --}}
                <div class="w-full flex items-center justify-center">
                    <img
                        src="{{ asset($bonus['image']) }}"
                        alt="{{ $bonus['title'] }}"
                        class="w-full max-h-[200px] object-contain"
                        loading="lazy"
                    >
                </div>

            </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="flex justify-center mt-10 md:mt-12">
            <x-ui.button :href="$ctaHref" variant="astro-cta" class="!min-w-0 !py-4 !text-base font-bold">
                Register Now at @₹49 <span class="line-through opacity-70 font-normal ml-1">₹999</span>
            </x-ui.button>
        </div>

    </div>
</section>


