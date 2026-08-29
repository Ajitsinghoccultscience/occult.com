@php
    $reasons = [
        'Helps understand personality and behavioural patterns through handwriting.',
        'Supports HR professionals in better candidate and employee understanding.',
        'Helps counsellors gain insights into individual behaviour and communication style.',
        'Strengthens observation, analysis, and interpretation skills.',
        'Helps in better understanding of people, behaviour, and communication.',
        'Adds a specialized professional skill that supports career growth.',
    ];
@endphp

{{-- ═══════════════════════════════════
     WHY GRAPHOLOGY IS BECOMING A PROFESSIONAL TREND
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-335 mx-auto section-px">

        <h2 class="text-xl md:text-2xl font-bold text-neutral-b text-center mb-8 md:mb-10">
            Why Graphology Is Becoming a Professional Trend
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">
            @foreach($reasons as $reason)
                <div class="rounded-xl p-4 md:p-5 bg-white border-2 border-[#ff9700]/60">
                    <p class="text-sm text-neutral-b/80 leading-relaxed">{{ $reason }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
