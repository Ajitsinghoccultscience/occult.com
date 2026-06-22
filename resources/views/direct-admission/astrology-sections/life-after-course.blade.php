@props([
    'graphImage'  => 'image/astrology assests/income-growth-graph.webp',
    'title'       => 'Life after completing course',
    'subtitle'    => 'Start your astrology journey today and unlock a path to financial freedom and personal growth!',
    'bullets'     => [
        'Opportunity to begin offering basic Astrology Consultations to clients',
        'Build a successful career helping others with astrology insights.',
        'Enjoy the flexibility of working from anywhere, anytime.',
        'Earn steadily as you grow your expertise and client base.',
        'Gain financial freedom while making a meaningful impact on others\' lives.',
    ],
])

<section class="w-full  bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="border border-neutral-200 rounded-2xl p-6 md:p-10 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                {{-- LEFT: Graph image --}}
                <div class="flex justify-center">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $graphImage)))) }}"
                         alt="Income Growth Graph"
                         class="w-full max-w-[480px] h-auto object-contain rounded-lg"
                         loading="lazy">
                </div>

                {{-- RIGHT: Content --}}
                <div class="flex flex-col gap-5">

                    <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] leading-snug">{{ $title }}</h2>

                    <p class="text-sm font-semibold text-[#CC2200] leading-relaxed">{{ $subtitle }}</p>

                    <ul class="space-y-3.5">
                        @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-sm text-neutral-b">
                            <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            {{ $bullet }}
                        </li>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>

    </div>
</section>
