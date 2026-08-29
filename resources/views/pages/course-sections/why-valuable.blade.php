@php
    $skills = [
        ['title' => 'Decode Handwriting Patterns',            'text' => 'Learn to analyse slant, baseline, spacing, margins, pressure, size and speed to understand patterns within handwriting.'],
        ['title' => 'Understand Letters & Writing Zones',     'text' => 'Study letter formations, writing zones, connections and key letters to interpret handwriting in greater detail.'],
        ['title' => 'Analyse Signatures',                     'text' => "Learn how to examine signature style, structure and its relationship with the writer's overall handwriting."],
        ['title' => 'Read Behavioural Indicators',            'text' => 'Identify handwriting patterns associated with emotions, fears, behavioural tendencies and other personality indicators.'],
        ['title' => 'Conduct a Complete Handwriting Analysis','text' => 'Learn how to collect handwriting samples, follow the right analysis process and combine multiple observations into one structured reading.'],
        ['title' => 'Learn Graphotherapy',                    'text' => 'Understand how specific changes in handwriting are used in Graphotherapy to work on behavioural and personality patterns.'],
    ];
@endphp

{{-- ═══════════════════════════════════
     WHY GRAPHOLOGY IS BECOMING A PROFESSIONAL TREND
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-335 mx-auto section-px">

        <h2 class="text-xl md:text-2xl font-bold text-neutral-b text-center mb-2">
            Why Graphology Is Becoming a Professional Trend
        </h2>
        <p class="text-sm md:text-base text-neutral-b/70 text-center mb-8 md:mb-10">
            Skills you will build
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
            @foreach($skills as $skill)
                <div class="rounded-xl p-5 bg-white border-2 border-[#ff9700]/60">
                    <h3 class="font-bold text-neutral-b text-base mb-1.5">{{ $skill['title'] }}</h3>
                    <p class="text-sm text-neutral-b/70 leading-relaxed">{{ $skill['text'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
