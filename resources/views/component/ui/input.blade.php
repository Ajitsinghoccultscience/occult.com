@props([
    'type' => 'text',
    'name' => '',
    'id' => null,
    'placeholder' => '',
    'value' => '',
    'error' => false,
    'pill' => false,  // rounded-full for search-style inputs
])

@php
    $inputId = $id ?? $name;
    $baseClasses = 'w-full bg-white text-neutral-b placeholder-neutral-e border-2 border-neutral-b rounded-10 px-4 py-3 text-base tracking-[0.48px] transition-colors focus:outline-none focus:ring-2 focus:ring-neutral-b focus:ring-offset-2';
    $roundedClass = $pill ? 'rounded-full' : 'rounded-10';
    $errorClass = $error ? 'border-secondary focus:ring-secondary' : '';
@endphp

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $inputId }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->merge(['class' => "$baseClasses $roundedClass $errorClass"]) }}
>
