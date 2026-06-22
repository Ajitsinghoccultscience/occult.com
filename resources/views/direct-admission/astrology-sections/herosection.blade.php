@push('head')
    <link rel="preload" as="image" href="{{ asset('image/astrology%20assests/hero%20section/bg.webp') }}" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('image/astrology%20assests/astro-webp/convo%201.webp') }}" fetchpriority="high">
@endpush

@props([
    'title'        => 'Become a Certified Expert & Start Earning From Your Skills',
    'bullets'      => [
        'Learn from beginner level to advance level',
        'Live Practical Session + Real Case Studies',
        'Get certification and placement guidance for your career growth ',
       
    ],
    'stats' => [
        ['icon' => 'students', 'value' => '97000+',      'label' => 'Students Trained'],
        ['icon' => 'star',     'value' => '10K Reviews',  'label' => '(4.5/5)'],
        ['icon' => 'iso',      'value' => 'ISO Certified','label' => 'Institute'],
    ],
    'sliderImages' => [
        ['src' => 'image/astrology assests/astro-webp/convo 1.webp', 'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 4.webp', 'caption' => 'Our Faculty at Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 7.webp', 'caption' => 'Founder Speech at Convocation 2025'],
    ],
    'ctaHref' => 'https://www.occultscience.in/payment-page/',
])

@php
    $sliderId = 'da-slider-' . uniqid();

    $statIconBase = 'image/astrology assests/DIRECT ADMISSION/icons hero sec';
    $statIconFiles = [
        'students' => 'trained students.svg',
        'star'     => 'reviws.svg',
        'iso'      => 'iso certified.svg',
    ];
    $statIconUrl = fn($key) => isset($statIconFiles[$key])
        ? asset(implode('/', array_map('rawurlencode', explode('/', $statIconBase.'/'.$statIconFiles[$key]))))
        : '';
@endphp

<div class="bg-white py-2 md:py-8 px-2 md:px-5 lg:px-8">
<section class="relative text-white rounded-2xl overflow-hidden w-full max-w-[1400px] mx-auto"
         style="background-color:#9E1212;background-image:radial-gradient(circle at 30% 20%, #C01818 0%, #9E1212 45%, #7A0E0E 100%);">

    {{-- Background texture (faint, over the red) --}}
    <picture class="absolute inset-0 w-full h-full pointer-events-none">
        <img src="{{ asset('image/astrology%20assests/hero%20section/bg.webp') }}"
             alt="" aria-hidden="true"
             class="w-full h-full object-cover opacity-20 mix-blend-overlay"
             loading="eager" fetchpriority="high" decoding="async">
    </picture>

    <div class="relative z-10 section-px py-4 md:py-6 xl:py-7">

        {{-- Logo --}}
        <div class="flex justify-center mb-4 md:mb-6">
            <div class="flex items-center gap-3 bg-white rounded-full px-4 py-1.5 shadow-md">
                <img src="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}"
                     alt="All India Institute of Occult Science"
                     class="h-8 md:h-11 w-auto object-contain">
            </div>
        </div>

        {{-- ── MOBILE layout ── --}}
        <div class="flex flex-col gap-3 lg:hidden">

            <h1 class="text-xl font-bold text-white tracking-wide text-center leading-tight">{{ $title }}</h1>


                    {{-- Slider --}}
            @php $mId = $sliderId . '-m'; @endphp
            <div class="relative w-full rounded-xl overflow-hidden aspect-[16/9]" id="{{ $mId }}">
                @foreach($sliderImages as $i => $slide)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $slide['src'])))) }}"
                         alt="{{ $slide['caption'] }}"
                         class="da-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                         @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                @endforeach
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-4 py-3">
                    @foreach($sliderImages as $i => $slide)
                        <span class="da-cap text-white text-sm font-medium {{ $i === 0 ? '' : 'hidden' }}">{{ $slide['caption'] }}</span>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center gap-2 -mt-1">
                @foreach($sliderImages as $i => $slide)
                    <button onclick="daGoTo('{{ $mId }}', {{ $i }})"
                            class="da-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/40' }}"
                            aria-label="Slide {{ $i + 1 }}"></button>
                @endforeach
            </div>

            <ul class="space-y-2">
                @foreach($bullets as $bullet)
                @continue(str_contains($bullet, 'Bonuses including Worksheets'))
                <li class="flex items-start gap-2.5 text-white text-sm">
                    <span class="w-5 h-5 rounded-full bg-white/20 border border-white/50 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    {{ $bullet }}
                </li>
                @endforeach
            </ul>

            {{-- Stats --}}
            <div class="flex items-stretch divide-x  divide-black/20  bg-[#F9E7C5] rounded-xl overflow-hidden">
                @foreach($stats as $stat)
                <div class="flex-1 flex flex-col items-center justify-center gap-0.5 py-3 px-2 text-center">
                    <img src="{{ $statIconUrl($stat['icon']) }}" alt="" aria-hidden="true" class="w-5 h-5 object-contain mb-1" style="filter:brightness(0);">

                    <span class="text-[#141313] font-bold text-xs leading-tight">{{ $stat['value'] }}</span>
                    <span class="text-[#141313] text-[12px] font-semibold leading-tight">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>

    

        </div>

        {{-- ── DESKTOP layout ── --}}
        <div class="hidden lg:grid grid-cols-[1fr_42%] gap-6 xl:gap-9 items-center">

            {{-- LEFT --}}
            <div class="flex flex-col gap-3.5">

                <h1 class="text-2xl xl:text-[1.9rem] font-bold text-white tracking-wide leading-tight">{{ $title }}</h1>

                <ul class="space-y-2.5 ml-0">
                    @foreach($bullets as $bullet)
                    @continue(str_contains($bullet, 'Bonuses including Worksheets'))
                    <li class="flex items-start gap-3 text-white">
                        <span class="w-6 h-6 rounded-full bg-white/20 border border-white/50 flex items-center justify-center shrink-0 mt-0.5 ml-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>

                {{-- Stats row --}}
                <div class="flex items-stretch divide-x divide-black/20  bg-[#FAF4E8] rounded-xl overflow-hidden w-fit">
                    @foreach($stats as $stat)
                    <div class="flex items-center gap-3 px-5 py-3">
                        <img src="{{ $statIconUrl($stat['icon']) }}" alt="" aria-hidden="true" class="w-6 h-6 object-contain shrink-0" style="filter:brightness(0);">

                        <div class="flex flex-col">
                            <span class="text-[#161414] font-bold text-sm leading-tight">{{ $stat['value'] }}</span>
                            <span class="text-[#161414] text-xs font-semibold  leading-tight">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- CTA + Price row --}}
                <div class="flex items-center gap-5 mt-3">
                    <a href="{{ $ctaHref }}"
                       class="font-bold text-neutral-900 text-base px-8 py-3.5 rounded-full hover:opacity-90 active:scale-95 transition whitespace-nowrap"
                       style="background-color:#f5ede0;">
                        REGISTER NOW
                    </a>
                    <div class="leading-tight">
                        <div class="flex items-baseline gap-2">
                            <span class="text-[#FAFAFA] font-extrabold text-xl">₹96,000</span>
                            <span class="text-[#FAFAFA] line-through text-sm">₹1,92,000</span>
                        </div>
                        <p class="text-[#FAFAFA] text-xs font-semibold tracking-wide">LIMITED TIME OFFER</p>
                    </div>
                </div>

            </div>

            {{-- RIGHT: Image slider --}}
            @php $dId = $sliderId . '-d'; @endphp
            <div class="flex flex-col gap-3">
                <div class="relative w-full rounded-2xl overflow-hidden aspect-[16/10]" id="{{ $dId }}">
                    @foreach($sliderImages as $i => $slide)
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $slide['src'])))) }}"
                             alt="{{ $slide['caption'] }}"
                             class="da-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                             width="1280" height="800"
                             @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                    @endforeach
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-4 py-3">
                        @foreach($sliderImages as $i => $slide)
                            <span class="da-cap text-white text-sm font-medium {{ $i === 0 ? '' : 'hidden' }}">{{ $slide['caption'] }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center gap-2">
                    @foreach($sliderImages as $i => $slide)
                        <button onclick="daGoTo('{{ $dId }}', {{ $i }})"
                                class="da-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-[#F9E7C5] {{ $i === 0 ? 'bg-[#F9E7C5] scale-125' : 'bg-[#F9E7C5]' }}"
                                aria-label="Slide {{ $i + 1 }}"></button>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</section>
</div>

<script>
(function () {
    const sliders = {};

    window.daGoTo = function (id, index) {
        const s = sliders[id];
        if (!s) return;
        clearInterval(s.timer);
        setSlide(s, index);
        s.timer = setInterval(() => advance(s), 4000);
    };

    function setSlide(s, index) {
        s.imgs.forEach((img, i) => img.style.opacity = i === index ? '1' : '0');
        s.dots.forEach((dot, i) => {
            dot.style.opacity = i === index ? '1' : '0.4';
            dot.style.transform = i === index ? 'scale(1.3)' : 'scale(1)';
        });
        s.caps.forEach((cap, i) => cap.classList.toggle('hidden', i !== index));
        s.current = index;
    }

    function advance(s) { setSlide(s, (s.current + 1) % s.imgs.length); }

    function initSlider(id) {
        const el = document.getElementById(id);
        if (!el) return;
        const imgs = Array.from(el.querySelectorAll('.da-img'));
        const dots = Array.from(el.parentElement.querySelectorAll('.da-dot'));
        const caps = Array.from(el.querySelectorAll('.da-cap'));
        if (imgs.length < 2) return;
        const s = { imgs, dots, caps, current: 0, timer: null };
        sliders[id] = s;
        s.timer = setInterval(() => advance(s), 4000);
    }

    function init() {
        document.querySelectorAll('[id^="da-slider-"]').forEach(el => initSlider(el.id));
    }

    document.readyState === 'complete' ? init() : window.addEventListener('load', init, { once: true });
})();
</script>
