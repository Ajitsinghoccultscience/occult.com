@props([
    'title'       => 'What you will learn in this webinar',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'ctaHref'     => '#',
    'sessions'    => [
        [
            'hour'        => 'First Hour',
            'title'       => 'Concept Learning',
            'subtitle'    => '',
            'bullets'     => [
                'Basics of Vedic Astrology',
                'Understanding of birth chart',
                'Understand 12 Houses and their meanings',
                'Learn Planets, Lord and their impacts',
                'Deep down into Lagna Chart',
            ],
            'description' => '',
        ],
        [
            'hour'        => 'Second Hour',
            'title'       => 'Practice with Case Study',
            'subtitle'    => "Don't just learn astrology concepts",
            'bullets'     => [],
            'description' => 'Practice them with guided Case studies that help you gain clarity and confidence.',
        ],
        [
            'hour'        => 'Third Hour',
            'title'       => 'Live Q&A Access',
            'subtitle'    => 'No confusion left',
            'bullets'     => [],
            'description' => 'Get real time clarity in the live Q&A session where you can ask your question, clear your doubts and gain deeper understanding.',
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
        <div id="wl-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($sessions as $session)
            <div class="wl-card w-full h-[23.9rem] md:h-[22rem] lg:h-[24rem]
                        rounded-2xl border border-purple-200 bg-neutral-i
                        flex flex-col overflow-hidden
                        @if($loop->last && $loop->count % 2 !== 0) md:col-span-2 lg:col-span-1 md:[&]:max-w-[23.9rem] md:[&]:mx-auto @endif">

                {{-- Header --}}
                <div class="flex items-center gap-4 bg-[#F6EFFE] px-6 py-5 shrink-0">
                    <div class="w-12 h-12 rounded-full bg-[#45287D] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-purple-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-subheading font-semibold text-neutral-b leading-snug">{{ $session['title'] }}</h3>
                </div>

                {{-- Body --}}
                <div class="flex-1 overflow-y-auto px-6 py-5 space-y-4">

                    <span class="inline-block text-content font-medium border border-purple-300 text-purple-700 rounded-full px-4 py-1">
                        {{ $session['hour'] }}
                    </span>

                    @if($session['subtitle'])
                        <p class="text-content font-semibold text-purple-700">{{ $session['subtitle'] }}</p>
                    @endif

                    @if(!empty($session['bullets']))
                        <ul class="space-y-2 !ml-0">
                            @foreach($session['bullets'] as $bullet)
                                <li class="flex items-start gap-2 text-content text-neutral-c">
                                    <span class="w-6 h-6 bg-[#45287D] rounded-full flex items-center justify-center text-neutral-i text-xs shrink-0 mt-0.5">✔</span>
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
            <x-ui.button :href="$ctaHref" variant="astro-cta" class="!min-w-0 !py-4 !text-base font-bold">
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