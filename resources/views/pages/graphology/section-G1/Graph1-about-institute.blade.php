@props([
    'title' => 'About All India Institute Of Occult Science',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'subheading' => 'All India Institute of Occult Science: Running Since March 2004',
    'bullets' => [
        'One of the best leading institutes in India known for its occult education and training for its students.',
        'Globally recognized certification in Astrology, Numerology, Graphalogy, Vastu Shastra, Palmistry, Akashic records, Palmistry and Reiki .',
        'Many trained students from here are working as personal consultants or in big astrology firms.',
        'Best students support 24/7 with recorded classes available for our students.',
    ],
    'image' => 'images/assets desktop/full convo.webp',
])

<section class="w-full section-spacing bg-white ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Two-column layout: image left (~45%), content right (~55%) --}}
        <div class="grid grid-cols-1 lg:grid-cols-[45%_1fr] gap-8 lg:gap-12 items-start">
            {{-- Left: Image / placeholder --}}
            <div class="w-full aspect-[16/9] lg:aspect-[2/1] rounded-xl overflow-hidden bg-[#E0E0E0] flex items-center justify-center">
                @if($image)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}" alt="" class="w-full h-full object-cover" loading="lazy">
                @else
                    <div class="flex flex-col items-center justify-center gap-2 text-neutral-e">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                        </svg>
                        <span class="text-content font-medium">Image placeholder</span>
                    </div>
                @endif
            </div>

            {{-- Right: Subheading + bullet list --}}
            <div class="flex flex-col justify-center">
                <h4 class="text-subheading font-bold text-neutral-b mb-6 tracking-[0.9px]">
                    {{ $subheading }}
                </h4>
                <ul class="space-y-4 text-content text-neutral-b tracking-[0.48px] list-disc ms-6">
                    @foreach($bullets as $bullet)
                        <li>{{ $bullet }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
