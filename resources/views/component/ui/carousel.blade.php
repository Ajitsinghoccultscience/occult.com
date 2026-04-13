@props([
    /*
     * Variant: 'peek' = always horizontal scroll with responsive card widths (85%→70%→50%→33%),
     *         'single' = one card at a time on mobile, grid on breakpoint (or always carousel if gridAt=none)
     */
    'variant' => 'single',
    'gap' => 'gap-6 md:gap-8',
    /* When variant=single: 'sm', 'md', 'lg', 'xl' - breakpoint to switch from carousel to grid; 'none' = always carousel */
    'gridAt' => 'sm',
    /* Grid columns when in grid mode: '2-4' (default), '3' */
    'gridCols' => '2-4',
])

@php
    $isPeek = $variant === 'peek';
    $alwaysCarousel = ($gridAt ?? '') === 'none';

    $gridColsClass = ($gridCols ?? '2-4') === '3'
        ? ($gridAt === 'xl' ? 'xl:grid-cols-3' : ($gridAt === 'lg' ? 'lg:grid-cols-3' : ($gridAt === 'md' ? 'md:grid-cols-3' : 'sm:grid-cols-3')))
        : ($gridAt === 'xl' ? 'xl:grid-cols-2 2xl:grid-cols-4' : ($gridAt === 'lg' ? 'lg:grid-cols-2 xl:grid-cols-4' : ($gridAt === 'md' ? 'md:grid-cols-2 lg:grid-cols-4' : 'sm:grid-cols-2 lg:grid-cols-4')));

    $gridClasses = !$isPeek && !$alwaysCarousel
        ? ($gridAt === 'xl'
            ? 'xl:grid ' . $gridColsClass . ' xl:overflow-visible xl:py-0'
            : ($gridAt === 'lg'
                ? 'lg:grid ' . $gridColsClass . ' lg:overflow-visible lg:py-0'
                : ($gridAt === 'md'
                    ? 'md:grid ' . $gridColsClass . ' md:overflow-visible md:py-0'
                    : 'sm:grid ' . $gridColsClass . ' sm:overflow-visible sm:py-0')))
        : '';

    $edgeClasses = $isPeek || $alwaysCarousel
        ? '-mx-4 md:-mx-6 lg:-mx-8 px-4 md:px-6 lg:px-8'
        : ($gridAt === 'xl' ? '-mx-4 xl:mx-0 px-4 xl:px-0' : ($gridAt === 'lg' ? '-mx-4 lg:mx-0 px-4 lg:px-0' : ($gridAt === 'md' ? '-mx-4 md:mx-0 px-4 md:px-0' : '-mx-4 sm:mx-0 px-4 sm:px-0')));

    $wrapperClasses = collect([
        'flex overflow-x-auto scroll-smooth scrollbar-hide snap-x snap-mandatory transition-responsive',
        $gap,
        'py-4 pb-4',
        $edgeClasses,
        $gridClasses,
        $isPeek ? 'items-start' : '',
    ])->filter()->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => $wrapperClasses]) }}>
    {{ $slot }}
</div>
