@php
    $base = 'images/graphology course icons';
    $features = [
        ['title' => 'Live Interactive Classes',    'icon' => 'live interactive class.svg',      'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Small Batches',                'icon' => 'live interactive class.svg',      'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Recorded Sessions',            'icon' => 'recorded session.   .svg',        'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Doubt Support',                'icon' => 'doubt support. .svg',             'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Globally Recog. Certificate',  'icon' => 'globally recog..svg',             'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
        ['title' => 'Post-Course Support',          'icon' => 'post course support.  .svg',      'text' => 'Attend live, interactive classes in small batches for personalized mentor guidance.'],
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
            @foreach($features as $feature)
                <div class="flex items-start gap-3">
                    <img src="{{ asset($base . '/' . rawurlencode($feature['icon'])) }}"
                         alt="" class="shrink-0 w-11 h-11 object-contain" loading="lazy">
                    <div>
                        <h3 class="font-bold text-neutral-b text-sm md:text-base mb-1">{{ $feature['title'] }}</h3>
                        <p class="text-xs md:text-sm text-neutral-b/70 leading-relaxed">{{ $feature['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
