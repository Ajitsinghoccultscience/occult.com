@php
    $base = 'image/graphology(HR) assests/graphology assests HR (mobile)/professional icons';

    $items = [
        ['icon' => 'hr.svg',           'title' => 'HR Professionals',     'text' => 'Understand confidence, stress, and communication before hiring.'],
        ['icon' => 'trainer 1.svg',    'title' => 'Trainers & Consultants','text' => 'Surface hidden feelings through handwriting in counseling.'],
        ['icon' => 'psychologist.svg', 'title' => 'Psychologist',          'text' => 'Make sessions deeper through handwriting insights.'],
        ['icon' => 'counsellor.svg',   'title' => 'Counsellors',           'text' => 'Surface hidden feelings through handwriting in counseling.'],
        ['icon' => 'career coach.svg', 'title' => 'Career Coaches',        'text' => 'Make sessions deeper through handwriting insights.'],
        ['icon' => 'analysist.svg',    'title' => 'Behavioural Analysts',  'text' => 'Understand behavior through handwriting clues'],
    ];
@endphp

{{-- ═══════════════════════════════════
     FOR PROFESSIONALS
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                For Professionals Reading People Better
            </h2>
        </div>

        {{-- Grid: 2 cols mobile, 3 cols desktop --}}
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-6 md:gap-x-12 gap-y-8 md:gap-y-10">
            @foreach($items as $item)
                <div class="flex flex-col">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 mb-3">
                        {{-- Icon tile --}}
                        <span class="shrink-0 w-14 h-14 rounded-lg flex items-center justify-center" style="background-color:#ff9700;">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $base.'/'.$item['icon'])))) }}"
                                 alt="" aria-hidden="true" class="w-8 h-8 object-contain">
                        </span>
                        <h3 class="text-base md:text-lg font-bold text-neutral-b leading-tight">
                            {{ $item['title'] }}
                        </h3>
                    </div>
                    <p class="text-sm text-neutral-b/70 leading-relaxed">
                        {{ $item['text'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>
