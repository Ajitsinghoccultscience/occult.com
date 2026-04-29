@props([
    'rating' => 5,   // 1-5
    'size'   => 'md', // sm | md | lg
])

@php
    $sizeClass = match($size) {
        'sm'  => 'w-3.5 h-3.5',
        'lg'  => 'w-6 h-6',
        default => 'w-5 h-5',
    };
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-0.5']) }} role="img" aria-label="{{ $rating }} out of 5 stars">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= $rating)
            {{-- filled --}}
            <svg class="{{ $sizeClass }} text-[#F5A623]" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.287 3.957c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.175 0l-3.37 2.448c-.784.57-1.838-.197-1.539-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.063 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69L9.049 2.927z"/>
            </svg>
        @else
            {{-- empty --}}
            <svg class="{{ $sizeClass }} text-neutral-h" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.287 3.957c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.175 0l-3.37 2.448c-.784.57-1.838-.197-1.539-1.118l1.286-3.957a1 1 0 00-.364-1.118L2.063 9.384c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69L9.049 2.927z"/>
            </svg>
        @endif
    @endfor
</div>
