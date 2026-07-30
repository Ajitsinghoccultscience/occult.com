@php
    $base = 'image/graphology(HR) assests/graphology assests HR (mobile)/professional icons';

    $items = [
        ['icon' => 'hr.svg',           'title' => 'HR Professionals',       'text' => 'Read confidence, honesty and stability from handwriting. The people-reading skill that gets HR noticed at top MNCs.'],
        ['icon' => 'trainer 1.svg',    'title' => 'Trainers & Consultants', 'text' => 'Add personality analysis to your programs. A premium service that raises your value and your income.'],
        ['icon' => 'psychologist.svg', 'title' => 'Psychologist',           'text' => 'Understand your clients needs deeper and add a powerful tool into your session that helps you increase your charges.'],
        ['icon' => 'counsellor.svg',   'title' => 'Counsellors',            'text' => 'Read what clients cannot say through their handwriting. Deeper understanding means better outcomes and more referrals.'],
        ['icon' => 'career coach.svg', 'title' => 'Career & Life Coaches',  'text' => "See your client's real strengths and direction. Better results bring more referrals and a higher-value coaching offer."],
        ['icon' => 'analysist.svg',    'title' => 'Teacher',                'text' => "Understand each student's real nature from their writing. Become the teacher that everyone every school looks for."],
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
