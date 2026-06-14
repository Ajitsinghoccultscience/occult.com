@props([
    'title'   => 'Why Choose Astrology Course From All India Institute of Occult Science',
    'features' => [
        [
            'icon'        => 'monitor',
            'title'       => 'Live Classes + Doubt Sessions',
            'description' => 'Attend live classes with real-time interaction, where doubts are addressed instantly and concepts are explained with practical examples.',
        ],
        [
            'icon'        => 'award',
            'title'       => 'Trusted by thousands of students',
            'description' => 'Backed by thousands of genuine Google reviews from real students who have completed the course and built their astrology journey with us.',
        ],
        [
            'icon'        => 'graduation',
            'title'       => 'Experienced Faculty with Learning Flexibility',
            'description' => 'Learn from 21 expert teachers, each with 10+ years of experience. If needed, students can smoothly change batches or faculty to ensure comfort and better understanding–personally guided by our founder.',
        ],
        [
            'icon'        => 'clock',
            'title'       => 'Lifetime Learning & Practice Support',
            'description' => 'Even years after completion, students can attend doubt-solving sessions, refreshers, and practical classes–because astrology mastery is a continuous journey.',
        ],
        [
            'icon'        => 'rec',
            'title'       => 'Access to Class Recordings',
            'description' => 'Missed a session? No problem. Get full access to live recorded classes so learning never stops due to schedule or time constraints.',
        ],
        [
            'icon'        => 'group',
            'title'       => 'Small batch learning',
            'description' => 'Limited batch sizes ensure focused attention, better interaction, and a deeper learning experience for every student.',
        ],
    ],
])

@php
    $iconBase  = 'image/astrology assests/DIRECT ADMISSION/Why choose astrology icon';
    $iconFiles = [
        'monitor'    => 'LIVE class..svg',
        'award'      => 'trusted by thousands 1.svg',
        'graduation' => 'experienced faculty.svg',
        'clock'      => 'lifetime learning 1.svg',
        'rec'        => 'recordings.svg',
        'group'      => 'small batches 1.svg',
    ];
    $iconUrl = fn($key) => isset($iconFiles[$key])
        ? asset(implode('/', array_map('rawurlencode', explode('/', $iconBase.'/'.$iconFiles[$key]))))
        : '';
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3 max-w-2xl mx-auto leading-snug">{{ $title }}</h2>
        </div>

        {{-- ── MOBILE: centered card slider with dots ── --}}
        <div class="md:hidden">
            <div id="wc-slider" class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden pb-2">
                @foreach($features as $feature)
                <div class="snap-center shrink-0 w-[82%] rounded-2xl px-6 py-7 flex flex-col items-center text-center" style="background-color:#FCEDEC;">
                    <img src="{{ $iconUrl($feature['icon']) }}" alt="" aria-hidden="true" class="w-16 h-16 object-contain mb-4">
                    <h3 class="text-base font-bold text-neutral-b mb-2 leading-snug">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-neutral-e leading-relaxed">{{ $feature['description'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Dots --}}
            <div class="flex justify-center gap-2 mt-4" id="wc-dots">
                @foreach($features as $i => $feature)
                <button type="button" data-i="{{ $i }}"
                        class="wc-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'scale-125' : '' }}"
                        style="background-color:{{ $i === 0 ? '#8B0000' : '#d1d5db' }};"
                        aria-label="Slide {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>

        {{-- ── DESKTOP: 2-col grid ── --}}
        <div class="hidden md:grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">
            @foreach($features as $feature)
            <div class="flex items-start gap-5">

                {{-- Icon --}}
                <img src="{{ $iconUrl($feature['icon']) }}" alt="" aria-hidden="true" class="shrink-0 w-16 h-16 object-contain">

                {{-- Text --}}
                <div>
                    <h3 class="text-base font-bold text-neutral-b mb-2 leading-snug">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-neutral-e leading-relaxed">{{ $feature['description'] }}</p>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

<script>
(function () {
    const slider = document.getElementById('wc-slider');
    const dots   = Array.from(document.querySelectorAll('#wc-dots .wc-dot'));
    if (!slider || !dots.length) return;

    function activate(i) {
        dots.forEach((d, j) => {
            d.style.backgroundColor = j === i ? '#8B0000' : '#d1d5db';
            d.style.transform = j === i ? 'scale(1.25)' : 'scale(1)';
        });
    }

    // Update active dot on scroll
    slider.addEventListener('scroll', function () {
        const i = Math.round(slider.scrollLeft / (slider.scrollWidth / dots.length));
        activate(Math.min(i, dots.length - 1));
    }, { passive: true });

    // Click a dot to scroll to that card
    dots.forEach((d, i) => d.addEventListener('click', function () {
        const card = slider.children[i];
        if (card) slider.scrollTo({ left: card.offsetLeft - slider.offsetLeft, behavior: 'smooth' });
    }));
})();
</script>
