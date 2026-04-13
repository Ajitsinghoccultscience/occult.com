@props([
    'title' => 'How graphology works',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'steps' => [
        [
            'name' => 'Analysis',
            'icon' => 'Analysis.svg',
            'description' => 'You will be able to analyze various handwriting samples, various alphabets, signature styles and many other related things.',
        ],
        [
            'name' => 'Decode',
            'icon' => 'Decode.svg',
            'description' => 'Decode the hidden personality, mood, emotions behind the handwriting. Know what kind of curve tells about personality.',
        ],
        [
            'name' => 'Understand',
            'icon' => 'Understand.svg',
            'description' => 'You will be able to understand the patterns of writings done by criminals, non criminals, big officers , their mindset etc.',
        ],
        [
            'name' => 'Guidance',
            'icon' => 'Guidance.svg',
            'description' => 'You will be able to guide people by asking them for changes in their writing, signature etc for good results in their life.',
        ],
    ],
])

@php
    $title = $title ?? 'How graphology works';
    $steps = $steps ?? [];
    $iconsPath = 'images/Graphology (logo)/untitled folder 3';
    $total = count($steps);
@endphp

{{-- How graphology works Section --}}
<section class="w-full section-spacing bg-neutral-bg section-spacing-after">
    <div class="max-w-[1300px] mx-auto section-px">

        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Desktop Horizontal Flow --}}
        <div class="hidden lg:flex items-start justify-between">

            @foreach($steps as $index => $step)

                <div class="flex-1">

                    {{-- Top Row: Icon + Badge + Connector --}}
                    <div class="flex items-center w-full">

                        {{-- Icon --}}
                        <div class="w-14 h-14 rounded-full border-2 border-accent-gold bg-white 
                                    flex items-center justify-center shrink-0">
                            <img src="{{ asset($iconsPath.'/'.$step['icon']) }}" 
                                 alt="{{ $step['name'] }}" 
                                 class="w-7 h-7 object-contain">
                        </div>

                        {{-- Badge --}}
                        <div class="ml-4 shrink-0">
                            <x-ui.badge variant="outline">
                                {{ $step['name'] }}
                            </x-ui.badge>
                        </div>

                        {{-- Connector --}}
                        @if($index < $total - 1)
                            <div class="flex-1 h-px bg-neutral-b"></div>
                        @endif

                    </div>

                    {{-- Description --}}
                    <p class="mt-4 ml-[72px] text-content text-neutral-b tracking-[0.48px] max-w-[260px]">
                        {{ $step['description'] }}
                    </p>

                </div>

            @endforeach

        </div>


        {{-- Mobile Timeline Layout --}}
        <div class="lg:hidden mt-6 relative">

            {{-- Vertical Line --}}
            <div class="absolute left-[27px] top-0 bottom-0 w-[2px] bg-accent-gold"></div>

            <div class="flex flex-col gap-14 md:gap-16">

                @foreach($steps as $step)

                    <div class="flex items-start gap-5 relative">

                        {{-- Icon --}}
                        <div class="w-14 h-14 rounded-full border-2 border-accent-gold bg-white 
                                    flex items-center justify-center shrink-0 z-10">
                            <img src="{{ asset($iconsPath.'/'.$step['icon']) }}" 
                                 alt="{{ $step['name'] }}" 
                                 class="w-7 h-7 object-contain">
                        </div>

                        {{-- Content --}}
                        <div class="flex-1 pt-1">

                            <x-ui.badge variant="outline">
                                {{ $step['name'] }}
                            </x-ui.badge>

                            <p class="mt-2 text-content text-neutral-b tracking-[0.48px]">
                                {{ $step['description'] }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
</section>
