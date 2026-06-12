@php
    $graphImg = 'image/graphology(HR) assests/graphology assests HR (mobile)/graph image.webp';
@endphp

{{-- ═══════════════════════════════════
     INCOME BOOST
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b mb-3">
                Your Income Can Grow - Starting Month One
            </h2>
            <p class="text-sm md:text-base text-neutral-b/70 max-w-[700px] mx-auto">
                Professionals who applied graphology after this webinar reported significant income boosts within 30 days.
            </p>
        </div>

        {{-- Two-column: text left, chart right --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-center">

            {{-- Left: content --}}
            <div class="text-center lg:text-left">
                <h3 class="text-lg md:text-xl font-bold text-neutral-b mb-5 pb-1 inline-block border-b-[3px] border-[#ff9700]">
                    After Learning Graphology
                </h3>

                <p class="mb-5">
                    <span class="text-lg md:text-xl font-bold text-neutral-b">Potential Income Boost</span>
                    <span class="text-sm md:text-base text-[#ff9700] font-medium ml-1">( 30% – 70% Extra Earning Opportunity )</span>
                </p>

                <div class="space-y-4 text-sm md:text-base text-neutral-b/80 leading-relaxed mb-6">
                    <p>
                        You can observe deeper personality patterns through handwriting and add an
                        extra layer of clarity to your professional work.
                    </p>
                    <p>
                        This helps you make better assessments, improve client results, increase trust,
                        and offer graphology as a premium add-on service.
                    </p>
                </div>

                {{-- Result box --}}
                <div class="rounded-lg p-4 text-sm md:text-base text-neutral-b/80 leading-relaxed" style="background-color:#FBEBD7;">
                    <span class="font-bold text-neutral-b">Result:</span>
                    Better decisions, better client value, stronger professional positioning, and
                    <strong>higher income opportunity.</strong>
                </div>
            </div>

            {{-- Right: chart --}}
            <div>
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $graphImg)))) }}"
                     alt="Income growth chart after learning graphology"
                     class="w-full h-auto object-contain rounded-lg"
                     loading="lazy">
            </div>

        </div>
    </div>
</section>
