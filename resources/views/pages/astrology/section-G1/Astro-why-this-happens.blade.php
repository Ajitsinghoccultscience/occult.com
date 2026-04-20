@props([
    'eyebrow'      => 'Have you ever think',
    'title'        => 'Why does this keep happening to me?',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'cards' => [
        'You give your best..par results fir bhi nahi dikhta',
        'You earn well..par paisa tikta ya grow nahi karta.',
        'Everything feels right..phir bhi relationship work nahi karta.',
    ],
    'footerText' => 'Every answer you are looking for could be in your Kundali',
    'ctaText'    => 'Reserve Seat @₹49',
    'ctaHref'    => '#',
    'helpsTitle' => 'How Astrology helps you to understand your life better',
    'points' => [
        'It reveals hidden patterns in your career, money, and relationships.',
        'It shows you the right timing for important decisions.',
        'Astrology doesn\'t just predict... it helps you make better choices.',
        'It gives you direction — with clarity, not guesswork.',
    ],
])

<section class="w-full bg-neutral-bg section-spacing pb-4">
    <div class="max-w-[1100px] xl:max-w-[1280px] mx-auto section-px">

        {{-- ── PART 1: Why this happens ── --}}
        <div class="text-center mb-10">
            <p class="text-content text-neutral-e font-medium mb-3 tracking-wide">{{ $eyebrow }}</p>
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">{{ $title }}</h2>
        </div>

        {{-- 3 question cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
            @foreach($cards as $card)
            <div class="flex items-center gap-4 bg-white border border-neutral-200 rounded-xl px-6 py-5 shadow-sm">
                <div class="shrink-0 w-11 h-11 rounded-full bg-[#5E3592] flex items-center justify-center">
                    <span class="text-white font-bold text-lg leading-none">?</span>
                </div>
                <p class="text-content text-neutral-b leading-relaxed">{{ $card }}</p>
            </div>
            @endforeach
        </div>

        <p class="text-center text-content text-neutral-b font-medium mb-6">{{ $footerText }}</p>

        <div class="flex justify-center mb-14">
            <x-ui.button :href="$ctaHref" variant="astro-dark-red" class="!min-w-0 !w-auto !px-12 !py-4 !rounded-xl !text-base tracking-wide">
                {{ $ctaText }} <span class="line-through opacity-70 ml-1">₹199</span>
            </x-ui.button>
        </div>

    </div>
</section>

{{-- ── PART 2: How astrology helps — white bg ── --}}
<section class="w-full bg-white py-10 md:py-14">
    <div class="max-w-[1100px] xl:max-w-[1280px] mx-auto section-px">

        <div class="text-center mb-8">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3 max-w-lg mx-auto">{{ $helpsTitle }}</h2>
        </div>

        {{-- 4 point cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            @foreach($points as $point)
            <div class="flex items-start gap-3 bg-neutral-bg border border-neutral-200 rounded-lg px-4 py-4 shadow-sm">
                <div class="shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-[#5E3592]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l1.5 6.5L20 10l-6.5 1.5L12 18l-1.5-6.5L4 10l6.5-1.5z"/>
                    </svg>
                </div>
                <p class="text-content text-neutral-b leading-snug">{{ $point }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>


