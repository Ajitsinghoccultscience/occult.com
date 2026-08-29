@php
    $features = [
        ['title' => 'Live Interactive Classes',    'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Small Batches',                'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Recorded Sessions',            'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Doubt Support',                'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Globally Recog. Certificate',  'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Post-Course Support',          'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
    ];

    $icons = [
        '<rect x="3" y="4" width="18" height="14" rx="2"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8M12 18v3M8 9l3 3 5-5"/>',
        '<circle cx="8" cy="8" r="3"/><circle cx="16" cy="8" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 20c0-3 2.5-5 6-5s6 2 6 5M12 20c0-3 2.5-5 6-5s4 1 4 3"/>',
        '<rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="12" r="2"/><path stroke-linecap="round" d="M13 10h5M13 14h5"/>',
        '<circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M9.5 9a2.5 2.5 0 013.7-2.2c1 .6 1.3 1.9.6 2.9-.6.8-1.8 1-1.8 2.3M12 16h.01"/>',
        '<circle cx="12" cy="9" r="5"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 13.5L6 21l6-3 6 3-2-7.5"/>',
        '<path stroke-linecap="round" stroke-linejoin="round" d="M17 8V6a5 5 0 00-10 0v2"/><rect x="5" y="8" width="14" height="12" rx="2"/><path stroke-linecap="round" d="M12 12v3"/>',
    ];
@endphp

{{-- ═══════════════════════════════════
     WHY CHOOSE OUR GRAPHOLOGY COURSE
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16 bg-white">
    <div class="max-w-335 mx-auto section-px">

        <h2 class="text-xl md:text-2xl font-bold text-neutral-b text-center mb-4">
            Why Choose Our Graphology Course
        </h2>

        <p class="text-sm md:text-base text-neutral-b/70 leading-relaxed text-center max-w-[850px] mx-auto mb-10">
            All India Institute of Occult Science is an ISO Certified and Govt. registered institute teaching Graphology since 2004. The goal has stayed the same from the start, to make this knowledge accessible to everyone. For that, we have ensured to give you the best:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-8">
            @foreach($features as $i => $feature)
                <div class="flex items-start gap-3">
                    <span class="shrink-0 w-11 h-11 rounded-lg flex items-center justify-center" style="background-color:#ff9700;">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            {!! $icons[$i] !!}
                        </svg>
                    </span>
                    <div>
                        <h3 class="font-bold text-neutral-b text-sm md:text-base mb-1">{{ $feature['title'] }}</h3>
                        <p class="text-xs md:text-sm text-neutral-b/70 leading-relaxed">{{ $feature['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
