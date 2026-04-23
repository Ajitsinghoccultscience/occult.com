@props([
    'title' => 'MEGA GRAPHOLOGY WEBINAR',
    'subtitle' => "Enroll in the best graphology course to predict someone's personality using their signature and way of writing.",
    'bullets' => [
        'Analysis of various signature styles.',
        "Able to predict someone's personality by their handwriting",
        'Suggest the right changes in their writing and signature for improvements.',
        'Tell if someone is faking their inner and outer personality.',
    ],
    'sliderImages' => [
        'image/astrology assests/astro-webp/convo 1.webp',
        'image/astrology assests/astro-webp/convo 4.webp',
        'image/astrology assests/astro-webp/convo 7.webp',
    ],
    'date' => 'Sun, 26 April, 2026',
    'time' => '1:00 PM to 3:00 PM',
    'duration' => '2 hours',
    'platform' => 'Zoom Call',
    'ctaHref' => '#',
])

@php
$iconsPath = 'images/icons';
$sliderId = 'slider-' . uniqid();
@endphp

{{-- Top Cream Marquee Bar --}}
<div class="w-full bg-accent-cream overflow-hidden py-1.5">
    <div class="flex animate-marquee w-max gap-16">
        @foreach(range(1, 4) as $i)
            <a href="{{ url('/checkout') }}" class="text-neutral-b font-semibold text-xs md:text-sm tracking-wide whitespace-nowrap hover:underline">
                Join Early Bird Discounted Webinar &nbsp;|&nbsp; Reserve Your Seat Now ₹49 Only!
            </a>
        @endforeach
    </div>
</div>


<section class="bg-astro-hero-gradient text-white transition-[padding,gap] duration-300 ease-in-out">

<div class="max-w-[1400px] mx-auto section-px py-5 xl:py-10 transition-[padding,gap,max-width] duration-300 ease-in-out">

{{-- MOBILE & TABLET (< 1280px): Stacked layout --}}
<div class="flex flex-col gap-6 xl:hidden transition-all duration-300 ease-in-out">
{{-- Badge --}}
<div class="flex justify-center">
    <div class="flex items-center px-3 py-1.5 rounded-full shadow-md bg-white">
        <img src="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}" alt="Logo" width="300" height="111" class="h-14 w-auto object-contain">
    </div>
</div>
<h1 class="text-hero font-bold text-white tracking-wide text-center">{{ $title }}</h1>

{{-- Image Slider (mobile) --}}
@php $mSliderId = $sliderId . '-m'; @endphp
<div id="{{ $mSliderId }}" class="w-full rounded-xl overflow-hidden shadow-2xl relative aspect-[4/3]">
    @foreach($sliderImages as $i => $img)
        <img
            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img)))) }}"
            alt="Webinar photo {{ $i + 1 }}"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
            @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif
        >
    @endforeach
    {{-- Dot indicators --}}
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
        @foreach($sliderImages as $i => $img)
            <button
                onclick="astroSliderGoTo('{{ $mSliderId }}', {{ $i }})"
                class="w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/50' }}"
                aria-label="Slide {{ $i + 1 }}"
            ></button>
        @endforeach
    </div>
</div>

<ul class="list-disc pl-6 space-y-3 text-neutral-i text-sm mb-2 text-left w-full">
@foreach($bullets as $bullet)<li>{{ $bullet }}</li>@endforeach
</ul>

{{-- 2x2 Info Cards --}}
<div class="grid grid-cols-2 gap-3 w-full">
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/Date.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Date</p>
        </div>
        <p class="font-bold text-accent-cream text-sm">{{ $date }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/time.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Time</p>
        </div>
        <p class="font-bold text-accent-cream text-sm">{{ $time }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/duration.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Duration</p>
        </div>
        <p class="font-bold text-accent-cream text-sm">2 Hours Live Webinar</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5zm0 0M5 16l.75 2.25L8 19l-2.25.75L5 22l-.75-2.25L2 19l2.25-.75zm14 0l.75 2.25L22 19l-2.25.75L19 22l-.75-2.25L16 19l2.25-.75z"/></svg>
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Platform</p>
        </div>
        <p class="font-bold text-accent-cream text-sm">Live Webinar on Zoom</p>
    </div>
</div>

<x-ui.button :href="$ctaHref" variant="astro" class="w-full !py-4 !text-base font-bold">
    Reserve Seat ₹49 <span class="line-through opacity-70 ml-1">₹199</span>
</x-ui.button>
</div>

{{-- DESKTOP (1280px+): 2-column layout --}}
<div class="hidden xl:flex flex-col gap-6 transition-all duration-300 ease-in-out">
{{-- Badge centered above both columns --}}
<div class="flex justify-center">
    <div class="flex items-center px-4 py-2 rounded-full shadow-md bg-white">
        <img src="{{ asset('image/compressed-images/logo300x111-removebg-preview.webp') }}" alt="Logo" width="300" height="111" class="h-16 w-auto object-contain">
    </div>
</div>
{{-- Two columns --}}
<div class="flex gap-4 items-start">
{{-- LEFT SIDE --}}
<div class="w-[55%] shrink-0">
<h1 class="text-2xl font-bold text-white tracking-wide mb-4">{{ $title }}</h1>
<ul class="list-disc pl-6 space-y-3 text-neutral-i mb-8">
@foreach($bullets as $bullet)<li>{{ $bullet }}</li>@endforeach
</ul>

{{-- 2x2 Info Cards --}}
<div class="grid grid-cols-2 gap-3 mb-8">
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/Date.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Date</p>
        </div>
        <p class="font-bold text-accent-cream text-base">{{ $date }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/time.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Time</p>
        </div>
        <p class="font-bold text-accent-cream text-base">{{ $time }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/duration.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Duration</p>
        </div>
        <p class="font-bold text-accent-cream text-base">2 Hours Live Webinar</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5zm0 0M5 16l.75 2.25L8 19l-2.25.75L5 22l-.75-2.25L2 19l2.25-.75zm14 0l.75 2.25L22 19l-2.25.75L19 22l-.75-2.25L16 19l2.25-.75z"/></svg>
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Platform</p>
        </div>
        <p class="font-bold text-accent-cream text-base">Live Webinar on Zoom</p>
    </div>
</div>

<x-ui.button :href="$ctaHref" variant="astro" class="!py-4 !text-base font-bold !min-w-0">
    Reserve Seat ₹49 <span class="line-through opacity-70 ml-1">₹199</span>
</x-ui.button>
</div>
{{-- RIGHT SIDE --}}
@php $dSliderId = $sliderId . '-d'; @endphp
<div class="flex-1 flex flex-col gap-4 mt-4">
<div id="{{ $dSliderId }}" class="w-full aspect-[4/3] min-h-[17rem] rounded-l-10 rounded-r-none overflow-hidden relative">
    @foreach($sliderImages as $i => $img)
        <img
            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img)))) }}"
            alt="Webinar photo {{ $i + 1 }}"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
            @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif
        >
    @endforeach
    {{-- Dot indicators --}}
    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
        @foreach($sliderImages as $i => $img)
            <button
                onclick="astroSliderGoTo('{{ $dSliderId }}', {{ $i }})"
                class="w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/50' }}"
                aria-label="Slide {{ $i + 1 }}"
            ></button>
        @endforeach
    </div>
</div>
</div>
</div>
</div>

</div>

</div>

</section>

<script>
(function () {
    const sliders = {};

    window.astroSliderGoTo = function (id, index) {
        const s = sliders[id];
        if (!s) return;
        clearInterval(s.timer);
        setSlide(s, index);
        s.timer = setInterval(() => advance(s), 4000);
    };

    function setSlide(s, index) {
        s.imgs.forEach((img, i) => {
            img.style.opacity = i === index ? '1' : '0';
        });
        s.dots.forEach((dot, i) => {
            dot.style.opacity = i === index ? '1' : '0.5';
            dot.style.transform = i === index ? 'scale(1.25)' : 'scale(1)';
        });
        s.current = index;
    }

    function advance(s) {
        setSlide(s, (s.current + 1) % s.imgs.length);
    }

    function initSlider(id) {
        const el = document.getElementById(id);
        if (!el) return;
        const imgs = Array.from(el.querySelectorAll('img'));
        const dots = Array.from(el.querySelectorAll('button'));
        if (imgs.length < 2) return;
        const s = { imgs, dots, current: 0, timer: null };
        sliders[id] = s;
        s.timer = setInterval(() => advance(s), 4000);
    }

    function init() {
        initSlider('{{ $mSliderId }}');
        initSlider('{{ $dSliderId }}');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
