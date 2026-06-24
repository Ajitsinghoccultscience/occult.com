@props([
    'title'   => 'Our Upcoming Batches',
    'ctaHref' => 'https://www.occultscience.in/payment-page/',
    'batches' => [
        [
            'course'    => 'Advance Certificate Course in Astrology',
            'batch'     => 'Batch - 1209',
            'startDate' => '10 May 2026',
        ],
        [
            'course'    => 'Advance Certificate Course in Astrology',
            'batch'     => 'Batch - 1209',
            'startDate' => '20 May 2026',
        ],
        [
            'course'    => 'Advance Certificate Course in Astrology',
            'batch'     => 'Batch - 1209',
            'startDate' => '10 April 2026',
        ],
        [
            'course'    => 'Advance Certificate Course in Astrology',
            'batch'     => 'Batch - 1209',
            'startDate' => '15 April 2026',
        ],
    ],
])

<section class="w-full section-spacing bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-6 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- Cards --}}
        <div class="flex gap-6 overflow-x-auto scrollbar-hide pb-2 md:grid md:grid-cols-2 md:gap-6 md:overflow-visible lg:grid-cols-4">
            @foreach($batches as $batch)
            <div class="shrink-0 w-[78vw] sm:w-[60vw] md:w-auto bg-white border border-neutral-200 rounded-2xl p-7 flex flex-col gap-5 shadow-sm">

                {{-- Course title --}}
                <h3 class="text-subheading font-bold text-neutral-b leading-snug">{{ $batch['course'] }}</h3>

                {{-- Batch pill --}}
                <div class="flex flex-col gap-2">
                    <span class="inline-flex items-center self-start border border-[#CC2200]/40 text-neutral-b text-sm font-medium px-4 py-1.5 rounded-full bg-white">
                        {{ $batch['batch'] }}
                    </span>
                    <span class="inline-flex items-center self-start border border-[#CC2200]/40 text-neutral-b text-sm font-medium px-4 py-1.5 rounded-full bg-white">
                        Start Date : {{ $batch['startDate'] }}
                    </span>
                </div>

                {{-- CTA --}}
                <a href="{{ $ctaHref }}"
                   class="w-full text-center bg-[#8B0000] hover:bg-[#6e0000] text-white font-bold py-3 px-5 rounded-xl text-sm transition-colors duration-200">
                    Register Now
                </a>

                {{-- Footer note --}}
                <p class="text-center text-sm font-semibold text-neutral-b">Limited Seat Only</p>

            </div>
            @endforeach
        </div>

    </div>
</section>
