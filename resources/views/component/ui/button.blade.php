@props([
    'variant' => 'primary',  // primary | dark
    'size' => 'md',          // sm | md | lg
    'href' => null,
    'fullWidth' => false,
    'compact' => false,      // small width, fits content
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-bold text-sm md:text-[1.25rem] tracking-[0.6px] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    $sizeClasses = match($size) {
        'sm' => 'h-[52px] px-4 py-2 rounded-md',
        'md' => 'h-[66px] px-4 py-2 rounded-md md:h-[73px] md:rounded-lg',
        'lg' => 'h-[73px] px-4 py-2 rounded-lg',
        default => 'h-[66px] px-4 py-2 rounded-md md:h-[73px] md:rounded-lg',
    };
    $variantClasses = match($variant) {
        'primary' => 'text-neutral-b bg-button-gradient hover:opacity-95 focus:ring-neutral-b',
        'dark' => 'bg-neutral-b text-white hover:bg-neutral-a focus:ring-neutral-b',
        default => 'text-neutral-b [background-image:var(--gradient-button)] hover:opacity-95',
    };
    $widthClass = $fullWidth ? 'w-full' : ($compact ? 'w-fit min-w-0' : 'w-full md:w-auto min-w-[280px] md:min-w-[328px]');
    $classes = "$baseClasses $sizeClasses $variantClasses $widthClass";
@endphp

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $attributes->get('type', 'button') }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </button>
@endif
