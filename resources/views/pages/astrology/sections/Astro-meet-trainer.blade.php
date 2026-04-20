@props([
    'title'        => 'Meet Your Trainer & Institute',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'trainerName'  => 'Miss. Laxmi',
    'trainerTitle' => 'Astrologer',
    'trainerFaculty' => 'Faculty of All India Institute of Occult Science',
    'description'  => [
        "A B.Tech Computer Science Engineer and a Master's graduate in Astrology from the All India Institute of Occult Science, Delhi, Laxmi blends analytical thinking with spiritual wisdom.",
        "She is dedicated to guiding individuals toward self-awareness through the principles of Vedic astrology.",
    ],
    'ctaText'       => 'Reserve Seat @₹49',
    'ctaPriceStruck' => '₹199',
    'ctaHref'       => '#',
    'trainerImage'  => 'image/astrology%20assests/laxmi%20mam.png',
    'instituteSubheading' => 'All India Institute of Occult Science: Running Since March 2004',
    'instituteBullets' => [
        'One of the best leading institutes in India known for its occult education and training for its students.',
        'Globally recognized certification in Astrology, Numerology, Graphology, Vastu Shastra, Palmistry, Akashic records and Reiki.',
        'Many trained students from here are working as personal consultants or in big astrology firms.',
        'Best students support 24/7 with recorded classes available for our students.',
    ],
    'counters' => [
        ['icon' => 'image/astrology%20assests/instagram.svg', 'value' => '52,000+', 'label' => 'Instagram Followers'],
        ['icon' => 'image/astrology%20assests/youtube.svg',   'value' => '15,400+', 'label' => 'Youtube Followers'],
        ['icon' => null,                                       'value' => '97000+',   'label' => 'Certified Students'],
    ],
    'convocationGallery' => [
        ['src' => 'image/astrology assests/institute/convocation.jpg',          'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/institute/MP-as_chief.jpg',          'caption' => 'MP as a Chief guest at our Convocation'],
        ['src' => 'image/astrology assests/institute/LampLighting.jpg',         'caption' => 'Lamp Lighting Ceremony'],
        ['src' => 'image/astrology assests/institute/Founder-speech.jpg',       'caption' => 'Founder Speech at Annual Convocation'],
        ['src' => 'image/astrology assests/institute/Our-faculty.jpg',          'caption' => 'Our Faculty'],
        ['src' => 'image/astrology assests/institute/Grand-convocation.jpg',    'caption' => 'Grand Convocation Ceremony'],
        ['src' => 'image/astrology assests/institute/Trusted-by.jpg',           'caption' => 'Annual Convocation'],
        ['src' => 'image/astrology assests/institute/intitute-event.jpg',       'caption' => 'Institute Event'],
        ['src' => 'image/astrology assests/institute/Education-day.jpg',         'caption' => 'Our Certified Students'],
        ['src' => 'image/astrology assests/institute/Lamp-lighting-event.jpg',  'caption' => 'Lamp Lighting Ceremony'],
    ],
])

@php $instSliderId = 'inst-slider-' . uniqid(); @endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px lg:px-[10%] xl:px-[10%]">

        {{-- Section heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- MOBILE (< lg): stacked --}}
        <div class="flex flex-col gap-8 lg:hidden">

            {{-- Trainer --}}
            <div class="flex flex-col items-center gap-4">
                <div class="bg-black rounded-3xl overflow-hidden w-52">
                    <img src="{{ asset($trainerImage) }}" alt="{{ $trainerName }}" class="w-full object-cover">
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-neutral-b">{{ $trainerName }} <span class="font-normal">({{ $trainerTitle }})</span></h3>
                    <p class="text-sm text-[#5E3592] font-medium mt-1">({{ $trainerFaculty }})</p>
                </div>
                @foreach($description as $para)
                    <p class="text-content text-neutral-b text-left">{{ $para }}</p>
                @endforeach
            </div>

            {{-- Institute image slider (mobile) --}}
            <div class="relative">
                <div id="{{ $instSliderId }}-m" class="flex gap-3 overflow-x-auto scrollbar-hide snap-x snap-mandatory pb-1">
                    @foreach($convocationGallery as $photo)
                    <div class="shrink-0 w-[80vw] snap-center relative rounded-xl overflow-hidden aspect-[4/3]">
                        <img
                            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $photo['src'])))) }}"
                            alt="{{ $photo['caption'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                            <p class="text-white text-sm font-medium">{{ $photo['caption'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Institute info --}}
            <div class="flex flex-col gap-5">
                <h4 class="text-subheading font-bold text-neutral-b leading-snug">{{ $instituteSubheading }}</h4>
                <ul class="space-y-3 text-content text-neutral-b">
                    @foreach($instituteBullets as $bullet)
                        <li class="flex items-start gap-2">
                            <span class="shrink-0 mt-0.5">•</span>
                            <span>{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>
                {{-- Counters --}}
                <div class="border-2 border-[#5E3592] rounded-2xl overflow-hidden">
                    <div class="grid grid-cols-3 divide-x divide-neutral-200">
                        @foreach($counters as $counter)
                        <div class="flex flex-col items-center justify-center gap-2 py-5 px-2 text-center">
                            @if($counter['icon'])
                                <img src="{{ asset($counter['icon']) }}" alt="{{ $counter['label'] }}" class="w-9 h-9 object-contain">
                            @else
                                <div class="w-9 h-9 rounded-full bg-green-500 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                                </div>
                            @endif
                            <p class="text-subheading font-bold text-neutral-b leading-none">{{ $counter['value'] }}</p>
                            <p class="text-xs text-neutral-e leading-tight">{{ $counter['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- DESKTOP (lg+) --}}
        <div class="hidden lg:flex flex-col gap-10">

            {{-- ROW 1: trainer image (small, left) + text (right) --}}
            <div class="flex gap-10 items-center justify-center">
                <div class="shrink-0 w-[320px] xl:w-[380px]">
                    <div class="bg-black rounded-3xl overflow-hidden max-h-[320px] xl:max-h-[360px]">
                        <img src="{{ asset($trainerImage) }}" alt="{{ $trainerName }}" class="w-full h-full object-cover object-top" loading="lazy">
                    </div>
                </div>
                <div class="flex flex-col gap-4 w-[40%] pt-2">
                    <div>
                        <h3 class="text-xl font-bold text-neutral-b">{{ $trainerName }} <span class="font-normal">({{ $trainerTitle }})</span></h3>
                        <p class="text-sm text-[#5E3592] font-medium mt-1">{{ $trainerFaculty }}</p>
                    </div>
                    <div class="flex flex-col gap-3 text-content text-neutral-b">
                        @foreach($description as $para)
                            <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ROW 2: institute image slider (3 visible, desktop) --}}
            <div class="relative">
                <div id="{{ $instSliderId }}-d" class="flex gap-4 overflow-hidden">
                    @foreach($convocationGallery as $photo)
                    <div class="inst-slide shrink-0 w-[calc(33.333%-11px)] relative rounded-xl overflow-hidden aspect-[4/3]">
                        <img
                            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $photo['src'])))) }}"
                            alt="{{ $photo['caption'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                            <p class="text-white text-sm font-medium">{{ $photo['caption'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Prev --}}
                <button type="button" id="{{ $instSliderId }}-prev"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-100 transition-colors"
                    aria-label="Previous">
                    <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                {{-- Next --}}
                <button type="button" id="{{ $instSliderId }}-next"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 rounded-full bg-white shadow-md border border-neutral-200 flex items-center justify-center hover:bg-neutral-100 transition-colors"
                    aria-label="Next">
                    <svg class="w-5 h-5 text-neutral-b" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            {{-- ROW 3: institute heading centered --}}
            <div class="text-center">
                <h4 class="text-subheading font-bold text-neutral-b leading-snug">{{ $instituteSubheading }}</h4>
            </div>

            {{-- ROW 4: bullets (left) + counters (right) --}}
            <div class="flex gap-10 items-start">
                <ul class="space-y-3 text-content text-neutral-b flex-1">
                    @foreach($instituteBullets as $bullet)
                        <li class="flex items-start gap-2">
                            <span class="shrink-0 mt-0.5">•</span>
                            <span>{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="shrink-0 w-[340px] xl:w-[380px] border-2 border-[#5E3592] rounded-2xl overflow-hidden">
                    <div class="grid grid-cols-3 divide-x divide-neutral-200">
                        @foreach($counters as $counter)
                        <div class="flex flex-col items-center justify-center gap-2 py-5 px-3 text-center">
                            @if($counter['icon'])
                                <img src="{{ asset($counter['icon']) }}" alt="{{ $counter['label'] }}" class="w-10 h-10 object-contain">
                            @else
                                <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                                </div>
                            @endif
                            <p class="text-subheading font-bold text-neutral-b leading-none">{{ $counter['value'] }}</p>
                            <p class="text-xs text-neutral-e leading-tight">{{ $counter['label'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ROW 5: CTA centered --}}
            <div class="flex justify-center">
                <x-ui.button :href="$ctaHref" variant="astro-cta" class="!py-4 !text-base font-bold !min-w-0">
                    {{ $ctaText }} <span class="line-through opacity-70 ml-1">{{ $ctaPriceStruck }}</span>
                </x-ui.button>
            </div>

        </div>

    </div>
</section>

<script>
(function () {
    var dId = '{{ $instSliderId }}-d';
    var mId = '{{ $instSliderId }}-m';
    var current = 0;
    var total = {{ count($convocationGallery) }};
    var perPage = 3;
    var paused = false;

    // Desktop slider
    function getDesktopSlider() { return document.getElementById(dId); }
    function getSlides() { return getDesktopSlider() ? getDesktopSlider().querySelectorAll('.inst-slide') : []; }

    function goTo(index) {
        var slides = getSlides();
        if (!slides.length) return;
        if (index > total - perPage) index = 0;
        if (index < 0) index = total - perPage;
        current = index;
        var offset = slides[current].offsetLeft;
        getDesktopSlider().scrollTo({ left: offset, behavior: 'smooth' });
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function init() {
        var nextBtn = document.getElementById('{{ $instSliderId }}-next');
        var prevBtn = document.getElementById('{{ $instSliderId }}-prev');
        if (nextBtn) nextBtn.addEventListener('click', function () { paused = true; next(); setTimeout(function(){ paused = false; }, 4000); });
        if (prevBtn) prevBtn.addEventListener('click', function () { paused = true; prev(); setTimeout(function(){ paused = false; }, 4000); });

        var d = getDesktopSlider();
        if (d) {
            d.addEventListener('mouseenter', function () { paused = true; });
            d.addEventListener('mouseleave', function () { paused = false; });
        }
    }

    // Mobile slider auto-advance
    var mCurrent = 0;
    var mTotal = {{ count($convocationGallery) }};

    function mobileNext() {
        var m = document.getElementById(mId);
        if (!m) return;
        var slides = m.querySelectorAll('.snap-center');
        if (!slides.length) return;
        mCurrent = (mCurrent + 1) % mTotal;
        m.scrollTo({ left: slides[mCurrent].offsetLeft, behavior: 'smooth' });
    }

    setInterval(function () { mobileNext(); }, 3000);

    // Desktop auto-advance every 3s
    setInterval(function () { if (!paused) next(); }, 3000);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
