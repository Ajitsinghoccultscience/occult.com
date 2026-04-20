@props([
    'title'       => 'How Astrology helps you to understand your life better',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'points' => [
        'It reveals hidden patterns in your career, money, and relationships.',
        'It shows you the right timing for important decisions.',
        'Astrology doesn\'t just predict... it helps you make better choices.',
        'It gives you direction — with clarity, not guesswork.',
    ],
])

<section class="w-full bg-neutral-bg section-spacing section-spacing-after">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3 max-w-xl mx-auto">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[120px] h-auto" aria-hidden="true">
        </div>

        {{-- 4 point cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($points as $point)
            <div class="flex items-start gap-3 bg-white border border-neutral-200 rounded-xl px-5 py-5 shadow-sm">
                {{-- Sparkle icon --}}
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


