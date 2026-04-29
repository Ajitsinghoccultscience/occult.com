@props([
    'src'  => '',
    'alt'  => '',
    'size' => 'md',  // sm | md | lg | xl
])

@php
    $sizeClass = match($size) {
        'sm'  => 'w-8 h-8',
        'lg'  => 'w-16 h-16',
        'xl'  => 'w-20 h-20',
        default => 'w-11 h-11',
    };
@endphp

<img
    src="{{ asset($src) }}"
    alt="{{ $alt }}"
    {{ $attributes->merge(['class' => "$sizeClass rounded-full object-cover shrink-0"]) }}
    loading="lazy"
>
