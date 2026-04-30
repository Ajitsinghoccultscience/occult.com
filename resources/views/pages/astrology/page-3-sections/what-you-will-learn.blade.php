@props([
    'title'       => 'Everything this webinar offers you',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'sessions'    => [
        [
            'hour'        => 'First Hour',
            'title'       => 'The Fundamentals of vedic Astrology',
            'subtitle'    => '',
            'bullets'     => [
                '9 planets and their nature',
                '12 Zodiac Signs',
                '12 Houses and what they tell about ',
                'Structure of a birth chart',
                
            ],
            'description' => '',
        ],
        [
            'hour'        => 'Second Hour',
            'title'       => 'Live kundali practice',
            'subtitle'    => "",
            'bullets'     => [
                'Live birth chart walkthrough ',
                'Planetary placement and their influence. ',
                'Guided worksheet to practice along ',
            ],
            'description' => '',
        ],
        [
            'hour'        => 'Third Hour',
            'title'       => 'Personalized doubt session ',
            'subtitle'    => '',
            'bullets'     => [
                'Live Q/A with faculty ',
                'Get clarity on concepts that you have doubts on.',
                'Leave the webinar with zero questions. ',
            ],
            'description' => '',
        ],
    ],
])

<section class="w-full bg-neutral-bg section-spacing">
    <div class="max-w-[75rem] xl:max-w-[87.5rem] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[7.5rem] h-auto" aria-hidden="true">
        </div>

        {{-- Cards Grid: 1-col mobile | 2-col tablet | 3-col desktop --}}
        @php
        $cardThemes = [
            ['bg' => '#E3F2F9', 'iconBg' => '#2D7DA0', 'border' => '#B3D9ED', 'badgeBorder' => '#7BC0DC', 'badgeText' => '#1A5F7A', 'icon' => 'image/astrology assests/what you will learn/concept learning.webp'],
            ['bg' => '#FDF1E3', 'iconBg' => '#C8945A', 'border' => '#EDD5B3', 'badgeBorder' => '#D9A870', 'badgeText' => '#8B5E2F', 'icon' => 'image/astrology assests/what you will learn/case study.webp'],
            ['bg' => '#EAF2E6', 'iconBg' => '#7A9E6E', 'border' => '#C2D9BB', 'badgeBorder' => '#95BC8B', 'badgeText' => '#3E6B33', 'icon' => 'image/astrology assests/what you will learn/live ques & ans.webp'],
        ];
        @endphp
        <div id="wl-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($sessions as $session)
            @php $theme = $cardThemes[$loop->index % 3]; @endphp
            <div class="wl-card w-full h-[21rem] md:h-[20rem] lg:h-[22rem]
                        rounded-2xl flex flex-col overflow-hidden bg-white
                        @if($loop->last && $loop->count % 2 !== 0) md:col-span-2 lg:col-span-1 md:[&]:max-w-[23.9rem] md:[&]:mx-auto @endif"
                 style="border: 1px solid {{ $theme['border'] }};">

                {{-- Header --}}
                <div class="flex items-center gap-4 px-6 py-5 shrink-0" style="background-color: {{ $theme['bg'] }};">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 overflow-hidden"
                         style="background-color: {{ $theme['iconBg'] }};">
                        <img src="{{ asset($theme['icon']) }}" alt="{{ $session['title'] }}" class="w-8 h-8 object-contain">
                    </div>
                    <h3 class="text-subheading font-semibold text-neutral-b leading-snug">{{ $session['title'] }}</h3>
                </div>

                {{-- Body --}}
                <div class="flex-1 overflow-y-auto px-6 py-5 space-y-4">

                    <!-- <span class="inline-block text-content font-medium rounded-full px-4 py-1"
                          style="border: 1px solid {{ $theme['badgeBorder'] }}; color: {{ $theme['badgeText'] }};">
                        {{ $session['hour'] }}
                    </span> -->

                    @if($session['subtitle'])
                        <p class="text-content font-semibold text-purple-700">{{ $session['subtitle'] }}</p>
                    @endif

                    @if(!empty($session['bullets']))
                        <ul class="space-y-2 !ml-0">
                            @foreach($session['bullets'] as $bullet)
                                <li class="flex items-start gap-2 text-content text-neutral-c">
                                    <span class="w-6 h-6 rounded-full flex items-center justify-center text-white text-xs shrink-0 mt-0.5"
                                          style="background-color: {{ $theme['iconBg'] }};">✔</span>
                                    {{ $bullet }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if($session['description'])
                        <p class="text-content text-neutral-c leading-relaxed">{{ $session['description'] }}</p>
                    @endif

                </div>

            </div>
            @endforeach

        </div>

        {{-- CTA --}}
        <div class="flex justify-center mt-10 md:mt-12">
            <x-ui.button :href="$ctaHref" variant="astro-red" class="!min-w-0 !py-4 !text-base font-bold">
                Reserve Seat @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
            </x-ui.button>
        </div>

    </div>
</section>

<style>
@media (max-width: 767px) {
    #wl-grid {
        display: flex;
        flex-direction: column;
        gap: 0;
        padding-bottom: 40vh;
    }
    #wl-grid + div {
        margin-top: -65vh;
        position: relative;
        z-index: 10;
    }
    .wl-card {
        position: sticky;
        top: 5vh;
        transform-origin: top center;
        flex-shrink: 0;
        margin-bottom: 30vh;
    }
    .wl-card:last-child {
        margin-bottom: 30vh;
    }
    .wl-card:nth-child(1) { z-index: 1; }
    .wl-card:nth-child(2) { z-index: 2; }
    .wl-card:nth-child(3) { z-index: 3; }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
(function () {
    gsap.registerPlugin(ScrollTrigger);

    gsap.matchMedia().add("(max-width: 767px)", function () {
        var cards = gsap.utils.toArray(".wl-card");

        cards.forEach(function (card, i) {
            if (i < cards.length - 1) {
                gsap.to(card, {
                    scale: 0.88,
                    ease: "none",
                    scrollTrigger: {
                        trigger: cards[i + 1],
                        start: "top 90%",
                        end: "top 5%",
                        scrub: 1,
                    }
                });
            }
        });

        return function () {
            ScrollTrigger.getAll().forEach(function (t) { t.kill(); });
        };
    });
}());
</script>