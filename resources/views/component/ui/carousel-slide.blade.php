@props([
    /*
     * Must match parent carousel: 'peek' = responsive widths, always scroll
     * 'single' = one-at-a-time on mobile, grid item on sm+ or md+ (or always carousel if gridAt=none)
     */
    'variant' => 'single',
    'gridAt' => 'sm',
    'class' => '',
])

@php
    $isPeek = $variant === 'peek';
    $alwaysCarousel = ($gridAt ?? '') === 'none';

    $gridResetClasses = !$isPeek && !$alwaysCarousel
        ? ($gridAt === 'xl'
            ? 'xl:shrink xl:w-full xl:min-w-0 xl:max-w-none'
            : ($gridAt === 'lg'
                ? 'lg:shrink lg:w-full lg:min-w-0 lg:max-w-none'
                : ($gridAt === 'md'
                    ? 'md:shrink md:w-full md:min-w-0 md:max-w-none'
                    : 'sm:shrink sm:w-full sm:min-w-0 sm:max-w-none')))
        : '';

    $slideClasses = collect([
        'shrink-0 snap-center',
        $isPeek
            ? 'w-[85%] sm:w-[70%] md:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)]'
            : 'w-[92vw] min-w-[280px] max-w-[358px] ' . $gridResetClasses,
        $class,
    ])->filter()->implode(' ');
@endphp

<div {{ $attributes->except('class')->merge(['class' => $slideClasses]) }}>
    {{ $slot }}
</div>
