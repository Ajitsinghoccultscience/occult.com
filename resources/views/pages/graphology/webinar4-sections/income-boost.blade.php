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

        {{-- Mobile order: orange line → chart → result.  Desktop: text left, chart right. --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-14 lg:items-center">

            {{-- Text top (extras desktop-only) --}}
            <div class="order-1 lg:col-start-1 lg:row-start-1 text-center lg:text-left">
                <h3 class="hidden lg:inline-block text-lg md:text-xl font-bold text-neutral-b mb-5 pb-1 border-b-[3px] border-[#ff9700]">
                    After Learning Graphology
                </h3>

                <p class="lg:mb-5">
                    <span class="hidden lg:inline text-lg md:text-xl font-bold text-neutral-b">Potential Income Boost</span>
                    <span class="text-base text-[#ff9700] font-semibold lg:ml-1">( 30% – 70% Extra Earning Opportunity )</span>
                </p>

                <div class="hidden lg:block space-y-4 text-sm md:text-base text-neutral-b/80 leading-relaxed mt-5">
                    <p>
                        You can observe deeper personality patterns through handwriting and add an
                        extra layer of clarity to your professional work.
                    </p>
                    <p>
                        This helps you make better assessments, improve client results, increase trust,
                        and offer graphology as a premium add-on service.
                    </p>
                </div>
            </div>

            {{-- Chart --}}
            <div class="order-2 lg:col-start-2 lg:row-start-1 lg:row-span-2">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $graphImg)))) }}"
                     alt="Income growth chart after learning graphology"
                     class="w-full h-auto object-contain rounded-lg"
                     loading="lazy">
            </div>

            {{-- Result box --}}
            <div class="order-3 lg:col-start-1 lg:row-start-2">
                <div class="rounded-lg p-4 text-sm md:text-base text-neutral-b/80 leading-relaxed text-center lg:text-left" style="background-color:#FBEBD7;">
                    <span class="font-bold text-neutral-b">Result:</span>
                    Better decisions, better client value, stronger professional positioning, and
                    <strong>higher income opportunity.</strong>
                </div>
            </div>

        </div>
    </div>
</section>
