@props([
    'image' => null,
    'title' => '',
    'description' => '',
    'quote' => '',
    'bullets' => [],
    'evidenceImages' => [],
    'footnote' => '',
])

<section class="w-full section-spacing bg-neutral-b pb-12 md:pb-16">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Top: Image left, Title + Description right --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-10 md:mb-12">

            {{-- Left: Image --}}
            <div class="w-full aspect-square max-h-[420px] bg-white rounded-10 overflow-hidden flex items-center justify-center">
                @if($image)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}" alt="" class="w-full h-full object-contain p-4">
                @else
                    <div class="flex flex-col items-center justify-center gap-2 text-neutral-e p-8">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                        </svg>
                        <span class="text-content font-medium">Image placeholder</span>
                    </div>
                @endif
            </div>

            {{-- Right: Title + Description --}}
            <div class="flex flex-col justify-center gap-4 text-center lg:text-left">
                <h2 class="text-heading font-bold text-accent-gold-light tracking-[0.9px] leading-snug">{{ $title }}</h2>
                <p class="text-content text-neutral-h leading-relaxed tracking-[0.48px]">{{ $description }}</p>
            </div>
        </div>

        {{-- Divider --}}
        <div class="border-t border-white/10 mb-8 md:mb-10"></div>

        {{-- Centered Quote --}}
        @if($quote)
        <div class="text-center mb-8 md:mb-10">
            <p class="text-subheading font-bold text-accent-gold-light italic tracking-[0.48px] max-w-[820px] mx-auto leading-snug">
                "{{ $quote }}"
            </p>
        </div>
        @endif

        {{-- 3-column Bullets --}}
        @if(count($bullets) > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 md:mb-12">
            @foreach($bullets as $bullet)
            <div class="flex items-start gap-3">
                <span class="text-accent-gold-light text-lg leading-none mt-0.5 shrink-0">•</span>
                <p class="text-content text-neutral-h leading-relaxed tracking-[0.48px]">{{ $bullet }}</p>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Evidence Images A / B / C --}}
        @if(count($evidenceImages) > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            @foreach($evidenceImages as $index => $evidence)
            <div class="flex flex-col items-center gap-2">
                {{-- Image only, no card bg --}}
                <div class="w-full relative">
                    {{-- Name label --}}
                    @if(!empty($evidence['name']))
                    <p class="text-center text-xs text-neutral-h italic mb-1 tracking-wide">{{ $evidence['name'] }}</p>
                    @endif
                    @if(!empty($evidence['image']))
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $evidence['image'])))) }}"
                             alt="{{ $evidence['name'] ?? '' }}"
                             class="w-full h-auto rounded-10 object-contain">
                    @else
                        <span class="text-neutral-e text-xs italic">Handwriting sample</span>
                    @endif
                </div>
                {{-- A / B / C label + selectable checkbox --}}
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-content font-semibold text-neutral-i">{{ chr(65 + $index) }}</span>
                    <input type="checkbox" class="w-4 h-4 rounded-sm border-2 border-neutral-h/60 bg-transparent cursor-pointer accent-accent-gold shrink-0">
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Footnote --}}
        @if($footnote)
        <p class="text-xs text-neutral-e italic text-center tracking-[0.48px]">{{ $footnote }}</p>
        @endif

    </div>
</section>
