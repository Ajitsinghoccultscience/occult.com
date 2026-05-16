@push('head')
    <link rel="preload" as="image" href="{{ asset('image/astrology%20assests/hero%20section/bg.webp') }}" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('image/astrology%20assests/astro-webp/convo%201.webp') }}" fetchpriority="high">
@endpush

@props([
    'title'        => 'Become a Certified Astrology Expert & Start Earning From Your Skills',
    'bullets'      => [
        'Learn from beginner level to advance level',
        'Live Practical Session + Real Case Studies',
        'Get Certification + Earning Guidance',
        'Get ₹19,000+ Bonuses including Worksheets',
    ],
    'stats' => [
        ['icon' => 'students', 'value' => '97000+',      'label' => 'Students Trained'],
        ['icon' => 'star',     'value' => '10K Reviews',  'label' => '(4.5/5)'],
        ['icon' => 'iso',      'value' => 'ISO Certified','label' => 'Institute'],
    ],
    'startDate'    => '20 May',
    'duration'     => '2-3 Month',
    'sliderImages' => [
        ['src' => 'image/astrology assests/astro-webp/convo 1.webp', 'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 4.webp', 'caption' => 'Our Faculty at Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 7.webp', 'caption' => 'Founder Speech at Convocation 2025'],
    ],
    'ctaHref' => '#',
])

@php $sliderId = 'da-slider-' . uniqid(); @endphp

<div class="bg-white py-2 px-2 md:px-5 lg:px-8">
<section class="relative text-white rounded-2xl overflow-hidden w-full max-w-[1400px] mx-auto">

    {{-- Background --}}
    <picture class="absolute inset-0 w-full h-full pointer-events-none">
        <img src="{{ asset('image/astrology%20assests/hero%20section/bg.webp') }}"
             alt="" aria-hidden="true"
             class="w-full h-full object-cover"
             loading="eager" fetchpriority="high" decoding="async">
    </picture>

    <div class="relative z-10 section-px py-5 md:py-8 xl:py-10">

        {{-- Logo --}}
        <div class="flex justify-center mb-4 md:mb-6">
            <div class="flex items-center gap-3 bg-white rounded-full px-4 py-1.5 shadow-md">
                <img src="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}"
                     alt="All India Institute of Occult Science"
                     class="h-8 md:h-11 w-auto object-contain">
            </div>
        </div>

        {{-- ── MOBILE layout ── --}}
        <div class="flex flex-col gap-4 lg:hidden">

            <h1 class="text-hero font-bold text-white tracking-wide text-center leading-tight">{{ $title }}</h1>

            <ul class="space-y-2.5">
                @foreach($bullets as $bullet)
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
            <div class="flex items-stretch divide-x divide-white/20 bg-black/25 rounded-xl overflow-hidden">
                @foreach($stats as $stat)
                <div class="flex-1 flex flex-col items-center justify-center gap-0.5 py-3 px-2 text-center">
                    @if($stat['icon'] === 'students')
                        <svg class="w-5 h-5 text-white/80 mb-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                    @elseif($stat['icon'] === 'star')
                        <svg class="w-5 h-5 text-yellow-400 mb-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @else
                        <svg class="w-5 h-5 text-white/80 mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    @endif
                    <span class="text-white font-bold text-xs leading-tight">{{ $stat['value'] }}</span>
                    <span class="text-white/70 text-[10px] leading-tight">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>

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

            {{-- Date / Duration pills --}}
            <div class="flex gap-3">
                <div class="flex-1 bg-white rounded-xl px-4 py-2.5 text-center">
                    <span class="text-neutral-b font-semibold text-xs">Start Date: </span>
                    <span class="text-[#CC2200] font-bold text-xs">{{ $startDate }}</span>
                </div>
                <div class="flex-1 bg-white rounded-xl px-4 py-2.5 text-center">
                    <span class="text-neutral-b font-semibold text-xs">Duration: </span>
                    <span class="text-[#CC2200] font-bold text-xs">{{ $duration }}</span>
                </div>
            </div>

            <button onclick="openEnquiryModal()"
                    class="w-full font-bold text-white text-sm py-3.5 rounded-xl hover:opacity-90 transition"
                    style="background-color:#8B0000;">
                Enrol Now — Get Free Counselling
            </button>

        </div>

        {{-- ── DESKTOP layout ── --}}
        <div class="hidden lg:grid grid-cols-[1fr_42%] gap-8 xl:gap-12 items-center">

            {{-- LEFT --}}
            <div class="flex flex-col gap-5">

                <h1 class="text-hero font-bold text-white tracking-wide leading-tight">{{ $title }}</h1>

                <ul class="space-y-3">
                    @foreach($bullets as $bullet)
                    <li class="flex items-start gap-3 text-white">
                        <span class="w-6 h-6 rounded-full bg-white/20 border border-white/50 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>

                {{-- Stats row --}}
                <div class="flex items-stretch divide-x divide-white/20 bg-black/25 rounded-xl overflow-hidden w-fit">
                    @foreach($stats as $stat)
                    <div class="flex items-center gap-3 px-5 py-3">
                        @if($stat['icon'] === 'students')
                            <svg class="w-6 h-6 text-white/80 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                        @elseif($stat['icon'] === 'star')
                            <svg class="w-6 h-6 text-yellow-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @else
                            <svg class="w-6 h-6 text-white/80 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        @endif
                        <div class="flex flex-col">
                            <span class="text-white font-bold text-sm leading-tight">{{ $stat['value'] }}</span>
                            <span class="text-white/70 text-xs leading-tight">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Date / Duration pills --}}
                <div class="flex gap-3">
                    <div class="bg-white rounded-xl px-6 py-3">
                        <span class="text-neutral-b font-semibold text-sm">Start Date: </span>
                        <span class="text-[#CC2200] font-bold text-sm">{{ $startDate }}</span>
                    </div>
                    <div class="bg-white rounded-xl px-6 py-3">
                        <span class="text-neutral-b font-semibold text-sm">Duration: </span>
                        <span class="text-[#CC2200] font-bold text-sm">{{ $duration }}</span>
                    </div>
                </div>

                <button onclick="openEnquiryModal()"
                        class="w-fit font-bold text-white text-sm px-8 py-3.5 rounded-xl hover:opacity-90 transition"
                        style="background-color:#8B0000;">
                    Enrol Now — Get Free Counselling
                </button>

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
                                class="da-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/40' }}"
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
