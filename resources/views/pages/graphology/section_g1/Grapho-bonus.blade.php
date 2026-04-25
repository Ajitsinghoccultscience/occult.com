@props([
    'title'       => 'Bonus Material',
    'subtitle'    => 'Unlock Bonus Worth ₹999',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'bonuses' => [
        [
            'label' => 'Bonus: 1',
            'title' => 'Certificate of Participation',
            'image' => 'image/graphology%20assests/graphology%20certificate%201.webp',
            'price' => '₹199',
        ],
        [
            'label' => 'Bonus: 2',
            'title' => 'PDF Notes',
            'image' => 'image/astrology%20assests/pdf%20notes.webp',
            'price' => '₹199',
        ],
        [
            'label' => 'Bonus: 3',
            'title' => 'Live Q&A Session',
            'image' => 'image/astrology%20assests/live%20q%26a%20session.webp',
            'price' => '₹199',
        ],
    ],
])

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">
        <div class="text-center mb-8 md:mb-12 section-px">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto mb-4" aria-hidden="true">
            <p class="text-content font-semibold text-[#04043A]">{!! $subtitle !!}</p>
        </div>

        <div class="md:hidden grid grid-cols-3 gap-2 section-px">
            @foreach($bonuses as $bonus)
            <div class="bg-white rounded-xl p-2 flex flex-col items-center justify-between gap-2 shadow-sm border border-neutral-100 h-full">
                <h3 class="text-[10px] font-bold text-[#04043A] text-center leading-tight">{{ $bonus['title'] }}</h3>
                <div class="w-full flex items-center justify-center flex-1">
                    <img src="{{ asset($bonus['image']) }}" alt="{{ $bonus['title'] }}" class="w-full max-h-[70px] object-contain" loading="lazy">
                </div>
                <div class="flex items-center justify-center gap-1">
                    <span class="text-[10px] text-neutral-e line-through">{{ $bonus['price'] }}</span>
                    <span class="text-[10px] font-bold text-[#04043A]">Free</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="hidden md:grid grid-cols-3 gap-6 section-px">
            @foreach($bonuses as $bonus)
            <div class="bg-white rounded-2xl p-6 flex flex-col items-center justify-between gap-4 shadow-sm border border-neutral-100">
                <h3 class="text-subheading font-bold text-[#04043A] text-center">{{ $bonus['title'] }}</h3>
                <div class="w-full flex items-center justify-center flex-1">
                    <img src="{{ asset($bonus['image']) }}" alt="{{ $bonus['title'] }}" class="w-full max-h-[200px] object-contain" loading="lazy">
                </div>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-sm text-neutral-e line-through">{{ $bonus['price'] }}</span>
                    <span class="text-sm font-bold text-[#04043A]">Free</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-10 md:mt-12 section-px">
            <x-ui.button :href="$ctaHref" variant="grapho-cta" class="!min-w-0 !py-4 !text-base font-bold w-full md:w-auto">
                Reserve Seat ₹49 <span class="line-through opacity-70 ml-1">₹199</span>
            </x-ui.button>
        </div>
    </div>
</section>

