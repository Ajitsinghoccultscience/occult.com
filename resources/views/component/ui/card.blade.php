@props([
    'variant' => 'white',  // white | cream | dark
    'padding' => true,
    'accordion' => false,   // use overflow-visible for accordion/expandable content
])

@php
    $overflowClass = $accordion ? 'overflow-visible' : 'overflow-hidden';
    $baseClasses = 'rounded-10 shadow-drop ' . $overflowClass;
    $variantClasses = match($variant) {
        'white' => 'bg-white',
        'cream' => 'bg-[linear-gradient(to_bottom,#E3CD91_0%,#FFFFFF_100%)]',
        'dark' => 'bg-neutral-b text-white',
        default => 'bg-white',
    };
    $paddingClass = $padding ? 'p-6 md:p-8' : '';
    $classes = "$baseClasses $variantClasses $paddingClass";
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
