@props([
    'bonusTitle' => 'Bonus Material',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'bonusSubtitle' => 'Unlock Bonus Worth ₹999',
    'bonusItems' => [
        ['name' => 'Practice Worksheets', 'line1' => 'Practice', 'line2' => 'Worksheets', 'icon' => 'Practice worksheets.svg'],
        ['name' => 'PDF Notes', 'line1' => 'PDF', 'line2' => 'Notes', 'icon' => 'Pdf notes.svg'],
        ['name' => 'Live Q&A Access', 'line1' => 'Live Q&A', 'line2' => 'Access', 'icon' => 'Live Q&A.svg'],
    ],
    'bonusCtaText' => 'Unlock Bonus',
    'bonusCtaHref' => '#',
])

@php
    $bonusTitle = $bonusTitle ?? 'Bonus Material';
    $bonusSubtitle = $bonusSubtitle ?? 'Unlock Bonus Worth ₹999';
    $bonusItems = $bonusItems ?? [
        ['name' => 'Practice Worksheets', 'line1' => 'Practice', 'line2' => 'Worksheets', 'icon' => 'Practice worksheets.svg'],
        ['name' => 'PDF Notes', 'line1' => 'PDF', 'line2' => 'Notes', 'icon' => 'Pdf notes.svg'],
        ['name' => 'Live Q&A Access', 'line1' => 'Live Q&A', 'line2' => 'Access', 'icon' => 'Live Q&A.svg'],
    ];
    $bonusCtaText = $bonusCtaText ?? 'Unlock Bonus';
    $bonusCtaHref = $bonusCtaHref ?? '#';
    $iconsPath = 'images/Graphology (logo)/untitled folder 3';
    $bonusBgImage = 'images/graphology image/bonus material.webp';
@endphp

{{-- Bonus Material Section (first) --}}
<section class="w-full  py-10 md:py-12 bg-neutral-b bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($bonusBgImage) }}');">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-2">
            <h2 class="text-heading font-bold text-button-gradient mb-3 tracking-[0.9px]">{{ $bonusTitle }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>
        <p class="text-content md:text-subheading text-neutral-i text-center mb-8 md:mb-10 tracking-[0.48px]">
            {{ $bonusSubtitle }}
        </p>

        {{-- MOBILE: Horizontal carousel, icon on top, text below, golden border --}}
        <div class="flex md:hidden overflow-x-auto gap-2 py-4 -mx-4 md:-mx-6 lg:-mx-8 px-4 md:px-6 lg:px-8 scroll-smooth scrollbar-hide snap-x snap-mandatory items-center justify-center">
            @foreach($bonusItems as $item)
                <div class="shrink-0 w-[30%] min-w-[85px] max-w-[105px] snap-center flex justify-center">
                    <div class="rounded-10 p-[2px] bg-button-gradient h-full w-full">
                        <div class="bg-white rounded-[8px] p-3 flex flex-col items-center justify-center gap-2 text-center min-h-[130px]">
                            <div class="w-11 h-11 rounded-full bg-white border border-neutral-h/30 shadow-sm flex items-center justify-center shrink-0">
                                <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="{{ $item['name'] }}" class="w-6 h-6 object-contain">
                            </div>
                            <span class="text-[10px] font-semibold text-neutral-b tracking-[0.48px] leading-tight">
                                <span class="block">{{ $item['line1'] ?? explode(' ', $item['name'], 2)[0] }}</span>
                                <span class="block">{{ $item['line2'] ?? (explode(' ', $item['name'], 2)[1] ?? '') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- DESKTOP: 3-column grid, icon + text side by side --}}
        <div class="hidden md:grid grid-cols-3 gap-4 md:gap-6 justify-items-center">
            @foreach($bonusItems as $item)
                <div class="rounded-xl p-[2px] bg-button-gradient max-w-[280px] w-full">
                    <x-ui.card variant="white" :padding="false" class="flex flex-row items-center gap-3 p-4 md:p-5 rounded-inner !shadow-none">
                        <div class="w-11 h-11 rounded-full border border-neutral-h bg-white flex items-center justify-center shrink-0">
                            <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="{{ $item['name'] }}" class="w-5 h-5 object-contain">
                        </div>
                        <span class="text-content font-semibold text-neutral-b tracking-[0.48px]">{{ $item['name'] }}</span>
                    </x-ui.card>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8 md:mt-10">
            <x-ui.button :href="$bonusCtaHref" variant="primary" size="sm"  class="!text-sm">
                {{ $bonusCtaText }}
            </x-ui.button>
        </div>
    </div>
</section>