@props([
    'variant' => 'outline',  // outline | filled | step (gold border, matches button)
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold text-[18px] md:text-[20px] tracking-[0.6px] rounded-full px-6 py-2.5';
    $variantClasses = match($variant) {
        'outline' => 'border-2 border-neutral-b text-neutral-b bg-transparent',
        'filled' => 'bg-neutral-b text-white border-2 border-neutral-b',
        'step' => 'border-2 border-accent-gold text-neutral-b bg-white',
        default => 'border-2 border-neutral-b text-neutral-b bg-transparent',
    };
    $classes = "$baseClasses $variantClasses";
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
