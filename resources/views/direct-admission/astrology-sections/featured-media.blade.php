@props([
    'title' => 'Featured by leading Media Voice',
    'base'  => 'image/graphology(HR) assests/graphology assests HR (Desktop)/news channels',
    'logos' => [
        'zee news 1.webp',
        'the wire 2.webp',
        'india 3.webp',
        'abp news 4.webp',
        'TOI 5.webp',
        'dailyhunt 6.webp',
    ],
])

<section class="w-full  bg-white py-2 md:py-8">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="bg-white rounded-2xl border border-neutral-200 shadow-sm p-6 md:p-8 overflow-hidden">

            {{-- Heading --}}
            <h2 class="text-center text-subheading font-bold text-neutral-b mb-6 md:mb-8">
                {{ $title }}
            </h2>

            {{-- Auto-scrolling logo marquee (seamless loop) --}}
            <div class="overflow-hidden">
                <div class="flex w-max animate-marquee gap-4 md:gap-5">
                    {{-- rendered twice for a seamless infinite loop --}}
                    @foreach(array_merge($logos, $logos) as $logo)
                        <div class="shrink-0 w-40 md:w-48 bg-white rounded-lg border border-neutral-100 shadow-sm overflow-hidden">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $base.'/'.$logo)))) }}"
                                 alt="Featured media coverage"
                                 class="w-full h-auto object-contain"
                                 loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</section>
