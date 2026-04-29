@props([
    'title'        => 'Learn to Read Your Kundli & Predict Your Future in Just 2 Hours',
    'bullets'      => [
        'Understand the meaning of all 12 houses in astrology',
        'Learn how zodiac signs influence your life',
        'Apply astrology concepts with real case studies in Webinar',
    ],
    'sliderImages' => [
        ['src' => 'image/astrology assests/astro-webp/convo 1.webp', 'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 4.webp', 'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 7.webp', 'caption' => 'Convocation 2025'],
    ],
    'date'         => 'Sun, 12th April, 2026',
    'time'         => '11:00 am',
    'alumniAvatars' => [
        'image/astrology assests/astro-webp/convo 1.webp',
        'image/astrology assests/astro-webp/convo 4.webp',
        'image/astrology assests/astro-webp/convo 7.webp',
    ],
    'alumniCount'  => '25k+',
    'rating'       => '4.5/5',
    'ratingCount'  => '8912 Ratings',
    'ctaHref'      => '#',
])

@php $sliderId = 'hero-slider-' . uniqid(); @endphp

{{-- Top Cream Marquee Bar --}}
<div class="w-full bg-accent-cream overflow-hidden py-1.5">
    <div class="flex animate-marquee w-max gap-16">
        @foreach(range(1, 6) as $i)
            <span class="text-neutral-b font-semibold text-xs md:text-sm tracking-wide whitespace-nowrap">
                Offer closing soon — after this, registration fee will be ₹199.
            </span>
        @endforeach
    </div>
</div>

{{-- Hero outer wrapper with rounded card look --}}
<div class="bg-white py-2 px-2 md:px-5 lg:px-8">
<section class=" bg-[linear-gradient(to_bottom,#1C023F_0%,#5E3592_100%)]  text-white rounded-2xl overflow-hidden w-full max-w-[1400px] mx-auto">
<div class="section-px py-3 md:py-5 xl:py-6">

    {{-- Logo badge (centered) --}}
    <div class="flex justify-center mb-3 md:mb-6">
        <div class="flex items-center gap-3 bg-white rounded-full px-4 py-1.5 shadow-md">
            <img src="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}"
                 alt="All India Institute of Occult Science" class="h-8 md:h-11 w-auto object-contain">
        </div>
    </div>

    {{-- MOBILE (< 1024px): stacked --}}
    <div class="flex flex-col gap-3 lg:hidden">

        <h1 class="text-subheading md:text-hero font-bold text-white tracking-wide text-center leading-tight">{{ $title }}</h1>

        {{-- Slider --}}
        @php $mId = $sliderId . '-m'; @endphp
        <div class="relative w-full rounded-xl overflow-hidden aspect-[16/8]" id="{{ $mId }}">
            @foreach($sliderImages as $i => $slide)
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $slide['src'])))) }}"
                     alt="Slide {{ $i + 1 }}"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
            @endforeach
            {{-- Caption --}}
            <div class="absolute bottom-0 left-0 right-0 bg-black/50 px-4 py-2">
                <span class="text-white text-sm font-medium">{{ $sliderImages[0]['caption'] }}</span>
            </div>
        </div>

        {{-- Bullets --}}
        <ul class="space-y-2">
            @foreach($bullets as $bullet)
            <li class="flex items-start gap-2 text-white text-sm">
                <span class="w-4 h-4 rounded-full bg-white/20 border border-white/50 flex items-center justify-center shrink-0 mt-0.5">
                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </span>
                {{ $bullet }}
            </li>
            @endforeach
        </ul>

        {{-- Date + Time --}}
        <div class="grid grid-cols-2 gap-2">
            <div class="border border-white/30 rounded-lg px-3 py-2 flex flex-col gap-0.5">
                <div class="flex items-center gap-1 text-white/70 text-xs font-semibold uppercase tracking-wide">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    Date
                </div>
                <span class="text-white font-bold text-xs">{{ $date }}</span>
            </div>
            <div class="border border-white/30 rounded-lg px-3 py-2 flex flex-col gap-0.5">
                <div class="flex items-center gap-1 text-white/70 text-xs font-semibold uppercase tracking-wide">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    Time
                </div>
                <span class="text-white font-bold text-xs">{{ $time }}</span>
            </div>
        </div>

        {{-- CTA + Alumni + Rating --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 w-full">
        <a href="{{ $ctaHref }}"
           class="shrink-0 text-center bg-[#CC2200] hover:bg-[#b31e00] text-white font-bold py-3 px-5 rounded-xl text-sm transition-colors duration-200 whitespace-nowrap">
            Reserve Seat @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
        </a>

        <div class="flex items-center gap-3 flex-wrap sm:justify-end sm:ml-auto">
            <div class="flex items-center -space-x-2">
                @foreach(array_slice($alumniAvatars, 0, 3) as $avatar)
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $avatar)))) }}"
                     class="w-8 h-8 rounded-full border-2 border-white object-cover" loading="lazy" alt="">
                @endforeach
            </div>
            <span class="text-white/80 text-sm font-medium">Join {{ $alumniCount }} Alumni Network</span>
            <span class="text-white/40">|</span>
            <div class="flex items-center gap-1.5">
                <div class="flex text-yellow-400">
                    @foreach(range(1,5) as $s)<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endforeach
                </div>
                <span class="text-white text-sm font-semibold">{{ $rating }}</span>
                <span class="text-white/60 text-xs">({{ $ratingCount }})</span>
            </div>
        </div>
        </div>

    </div>

    {{-- DESKTOP (1024px+): two columns --}}
    <div class="hidden lg:flex gap-8 xl:gap-12 items-start">

        {{-- LEFT --}}
        <div class="flex-1 flex flex-col gap-6">

            <h1 class="text-hero font-bold text-white tracking-wide leading-tight">{{ $title }}</h1>

            <ul class="space-y-4">
                @foreach($bullets as $bullet)
                <li class="flex items-start gap-3 text-white">
                    <span class="w-6 h-6 rounded-full bg-white/20 border border-white/50 flex items-center justify-center shrink-0 mt-0.5">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    {{ $bullet }}
                </li>
                @endforeach
            </ul>

            {{-- Date + Time --}}
            <div class="flex gap-4">
                <div class="border border-white/30 rounded-xl px-5 py-3 flex flex-col gap-0.5">
                    <div class="flex items-center gap-1.5 text-white/70 text-xs font-semibold uppercase tracking-wide mb-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        Date
                    </div>
                    <span class="text-white font-bold text-base">{{ $date }}</span>
                </div>
                <div class="border border-white/30 rounded-xl px-5 py-3 flex flex-col gap-0.5">
                    <div class="flex items-center gap-1.5 text-white/70 text-xs font-semibold uppercase tracking-wide mb-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        Time
                    </div>
                    <span class="text-white font-bold text-base">{{ $time }}</span>
                </div>
            </div>

        </div>

        {{-- RIGHT --}}
        @php $dId = $sliderId . '-d'; @endphp
        <div class="w-[40%] xl:w-[38%] shrink-0 flex flex-col gap-3">

            {{-- Image slider --}}
            <div class="relative w-full rounded-xl overflow-hidden aspect-[16/10]" id="{{ $dId }}">
                @foreach($sliderImages as $i => $slide)
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $slide['src'])))) }}"
                         alt="Slide {{ $i + 1 }}"
                         class="hs-img absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                         @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                @endforeach

                {{-- Caption overlay --}}
                <div class="hs-caption absolute bottom-0 left-0 right-0 bg-black/50 px-4 py-2 transition-all duration-300">
                    @foreach($sliderImages as $i => $slide)
                        <span class="hs-cap-text text-white text-sm font-medium {{ $i === 0 ? '' : 'hidden' }}"
                              data-index="{{ $i }}">{{ $slide['caption'] }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Dots --}}
            <div class="flex justify-center gap-2">
                @foreach($sliderImages as $i => $slide)
                    <button onclick="hsGoTo('{{ $dId }}', {{ $i }})"
                            class="hs-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/40' }}"
                            aria-label="Slide {{ $i + 1 }}"></button>
                @endforeach
            </div>


        </div>
    </div>

    {{-- DESKTOP full-width CTA + Alumni + Rating (outside 2-col) --}}
    <div class="hidden lg:flex items-center justify-between gap-4 w-full mt-6">
        <a href="{{ $ctaHref }}"
           class="shrink-0 text-center bg-[#CC2200] hover:bg-[#b31e00] text-white font-bold py-4 px-8 rounded-xl text-lg transition-colors duration-200 whitespace-nowrap">
            Reserve Seat @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
        </a>

        <div class="flex items-center gap-3 flex-wrap justify-end ml-auto">
            <div class="flex items-center -space-x-2">
                @foreach(array_slice($alumniAvatars, 0, 3) as $avatar)
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $avatar)))) }}"
                     class="w-8 h-8 rounded-full border-2 border-white object-cover" loading="lazy" alt="">
                @endforeach
            </div>
            <span class="text-white/80 text-sm font-medium">Join {{ $alumniCount }} Alumni Network</span>
            <span class="text-white/40">|</span>
            <div class="flex items-center gap-1.5">
                <div class="flex text-yellow-400">
                    @foreach(range(1,5) as $s)<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endforeach
                </div>
                <span class="text-white text-sm font-semibold">{{ $rating }}</span>
                <span class="text-white/60 text-xs">({{ $ratingCount }})</span>
            </div>
        </div>
    </div>

</div>
</section>
</div>

<script>
(function () {
    const sliders = {};

    window.hsGoTo = function (id, index) {
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
        if (s.caps) {
            s.caps.forEach((cap, i) => cap.classList.toggle('hidden', i !== index));
        }
        s.current = index;
    }

    function advance(s) { setSlide(s, (s.current + 1) % s.imgs.length); }

    function initSlider(id) {
        const el = document.getElementById(id);
        if (!el) return;
        const imgs = Array.from(el.querySelectorAll('img'));
        const dots = Array.from(el.querySelectorAll('button.hs-dot'));
        const caps  = Array.from(el.querySelectorAll('.hs-cap-text'));
        if (imgs.length < 2) return;
        const s = { imgs, dots, caps, current: 0, timer: null };
        sliders[id] = s;
        s.timer = setInterval(() => advance(s), 4000);
    }

    function init() {
        document.querySelectorAll('[id^="hero-slider-"]').forEach(el => initSlider(el.id));
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();
})();
</script>
