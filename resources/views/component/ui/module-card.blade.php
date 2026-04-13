@props([
    'title' => 'Module',
    'icon' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-10 overflow-hidden h-full flex flex-col shadow-drop']) }}>
    {{-- Header with icon and badge - mobile: same line, all left-aligned --}}
    <div class="p-6 md:p-8 pb-4">
        <div class="flex flex-row items-center gap-4 lg:flex-col lg:items-center lg:gap-0">
            @if($icon)
                <div class="shrink-0 lg:mb-4">
                    <div class="w-14 h-14 lg:w-16 lg:h-16 rounded-full border-2 border-[#ECCB66] flex items-center justify-center p-2 [&_img]:w-8 [&_img]:h-8 lg:[&_img]:w-10 lg:[&_img]:h-10">
                        {{ $icon }}
                    </div>
                </div>
            @endif
            <div class="flex-1 lg:flex-initial flex justify-start lg:justify-center">
                <span class="inline-flex items-center justify-center font-medium text-[18px] md:text-content text-neutral-b border-2 border-[#ECCB66] rounded-full px-6 py-2.5">
                    {{ $title }}
                </span>
            </div>
        </div>
    </div>

    {{-- Content (bullet list) --}}
    <div class="px-6 md:px-8 pb-6 md:pb-8 flex-1">
        <ul class="space-y-4 text-neutral-b text-content tracking-[0.48px] list-disc ms-6 text-left">
            {{ $slot }}
        </ul>
    </div>
</div>
