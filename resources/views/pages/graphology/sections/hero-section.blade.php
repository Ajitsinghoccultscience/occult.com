@props([
    'title' => 'MEGA GRAPHOLOGY WEBINAR',
    'subtitle' => "Enroll in the best graphology course to predict someone's personality using their signature and way of writing.",
    'bullets' => [
        'Analysis of various signature styles.',
        "Able to predict someone's personality by their handwriting",
        'Suggest the right changes in their writing and signature for improvements.',
        'Tell if someone is faking their inner and outer personality.',
    ],
    'date' => 'Sat, 11 April, 2026',
    'time' => '08:00 PM',
    'duration' => '2 hours',
    'alumniCount' => '18k+',
    'rating' => '4.5/5 (8912 ratings)',
    'videoPlaceholder' => 'images/assets desktop/convo graphology1.webp',
    'ctaHref' => '#',
])

@php
$iconsPath = 'images/icons';
@endphp


{{-- Top Cream Marquee Bar --}}
<div class="w-full bg-accent-cream overflow-hidden py-1.5">
    <div class="flex animate-marquee w-max gap-16">
        @foreach(range(1, 4) as $i)
            <a href="{{ url('/checkout') }}" class="text-neutral-b font-semibold text-xs md:text-sm tracking-wide whitespace-nowrap hover:underline">
                🎯 Join Early Bird Discounted Webinar &nbsp;|&nbsp; Reserve Your Seat Now @₹49 Only!
            </a>
        @endforeach
    </div>
</div>


<section class="bg-neutral-b text-white transition-[padding,gap] duration-300 ease-in-out">

<div class="max-w-[1400px] mx-auto section-px py-5 xl:py-10 transition-[padding,gap,max-width] duration-300 ease-in-out">

{{-- MOBILE & TABLET (1024px): Stacked layout --}}
<div class="flex flex-col gap-6 xl:hidden transition-all duration-300 ease-in-out">
{{-- Badge --}}
<div class="flex justify-center">
    <div class="flex items-center gap-2 px-4 py-1.5 rounded-full shadow-md bg-white">
        <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo" class="w-7 h-7 object-contain rounded-full">
        <span class="text-neutral-b font-semibold text-xs tracking-wide whitespace-nowrap">All India Institute of Occult Science</span>
    </div>
</div>
<h1 class="text-hero font-bold text-button-gradient uppercase tracking-wide text-center">{{ $title }}</h1>
<div class="w-full aspect-[4/3] min-h-[14rem] bg-neutral-e rounded-10 overflow-hidden flex items-center justify-center">
    @if($videoPlaceholder)
        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $videoPlaceholder)))) }}" alt="Webinar preview" class="w-full h-full object-cover" loading="eager" fetchpriority="high">
    @else
        <div class="flex flex-col items-center justify-center gap-3 text-neutral-i/60">
            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            <span class="text-sm">Loading...</span>
        </div>
    @endif
</div>
@php
$ratingParts = preg_split('/\s+(?=\()/', $rating, 2);
$ratingValue = $ratingParts[0] ?? $rating;
$ratingCount = $ratingParts[1] ?? '';
@endphp
<div class="grid grid-cols-[1fr_auto_1fr] gap-0 items-center w-full">
<div class="flex flex-col items-center justify-center gap-2 py-2">
<div class="flex -space-x-3">
<img src="{{ asset('images/assets%20desktop/Aryan_Mehta.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Priya_Sharma.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Rishika.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Vikram_Singh.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
</div>
<p class="text-neutral-i font-semibold text-center text-sm leading-tight">Join {{ $alumniCount }} Alumni<br>Network</p>
</div>
<div class="w-px self-stretch bg-neutral-i/40 min-h-[3rem] shrink-0"></div>
<div class="flex flex-col items-center justify-center gap-2 py-2">
<div class="flex gap-0.5">@for($i=1;$i<=5;$i++)<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>@endfor</div>
<p class="text-neutral-i font-semibold text-center text-sm leading-tight"><span class="block">{{ $ratingValue }}</span><span class="block">{{ $ratingCount }}</span></p>
</div>
</div>
<p class="text-neutral-i text-sm text-left">{{ $subtitle }}</p>
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
        <p class="font-bold text-accent-gold-light text-sm">{{ $date }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/time.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Time</p>
        </div>
        <p class="font-bold text-accent-gold-light text-sm">{{ $time }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/duration.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Duration</p>
        </div>
        <p class="font-bold text-accent-gold-light text-sm">3 Hours Live Webinar</p>
    </div>
    <div class="border border-white/40 rounded-xl p-3 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Bonus</p>
        </div>
        <p class="font-bold text-accent-gold-light text-sm">Free Bonus Worth ₹999</p>
    </div>
</div>

<x-ui.button :href="$ctaHref" variant="primary" class="w-full !py-4 !text-base font-bold">
    Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
</x-ui.button>
</div>

{{-- DESKTOP (1280px+): 2-column layout --}}
<div class="hidden xl:flex flex-col gap-6 transition-all duration-300 ease-in-out">
{{-- Badge centered above both columns --}}
<div class="flex justify-center">
    <div class="flex items-center gap-3 px-5 py-2.5 rounded-full shadow-md bg-white">
        <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo" class="w-10 h-10 object-contain rounded-full">
        <span class="text-neutral-b font-semibold text-sm md:text-base tracking-wide whitespace-nowrap">All India Institute of Occult Science</span>
    </div>
</div>
{{-- Two columns --}}
<div class="grid grid-cols-[0.4fr_0.6fr] gap-4 items-start">
{{-- LEFT SIDE --}}
<div>
<h1 class="text-hero font-bold text-button-gradient uppercase tracking-wide mb-4 whitespace-nowrap">{{ $title }}</h1>
<p class="text-neutral-i text-lg max-w-xl mb-6">{{ $subtitle }}</p>
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
        <p class="font-bold text-accent-gold-light text-base">{{ $date }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/time.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Time</p>
        </div>
        <p class="font-bold text-accent-gold-light text-base">{{ $time }}</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <img src="{{ asset($iconsPath.'/duration.svg') }}" class="w-4 h-4 shrink-0">
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Duration</p>
        </div>
        <p class="font-bold text-accent-gold-light text-base">3 Hours Live Webinar</p>
    </div>
    <div class="border border-white/40 rounded-xl p-4 flex flex-col gap-1">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>
            <p class="text-xs text-neutral-i/80 uppercase font-semibold tracking-wide">Bonus</p>
        </div>
        <p class="font-bold text-accent-gold-light text-base">Free Bonus Worth ₹999</p>
    </div>
</div>

<x-ui.button :href="$ctaHref" variant="primary" class="!py-4 !text-base font-bold !min-w-0">
    Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
</x-ui.button>
</div>
{{-- RIGHT SIDE --}}
<div class="flex flex-col gap-4 mt-10">
<div class="w-full aspect-[4/3] min-h-[22rem] bg-neutral-e rounded-10 overflow-hidden flex items-center justify-center ml-8">
    @if($videoPlaceholder)
        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $videoPlaceholder)))) }}" alt="Webinar preview" class="w-full h-full object-cover" loading="eager" fetchpriority="high">
    @else
        <div class="flex flex-col items-center justify-center gap-3 text-neutral-i/60">
            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            <span class="text-sm">Loading...</span>
        </div>
    @endif
</div>
<div class="flex flex-nowrap items-center gap-6">
<div class="flex -space-x-3 shrink-0">
<img src="{{ asset('images/assets%20desktop/Aryan_Mehta.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Priya_Sharma.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Rishika.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
<img src="{{ asset('images/assets%20desktop/Vikram_Singh.avif') }}" alt="" class="w-9 h-9 rounded-full border-2 border-neutral-b object-cover">
</div>
<p class="text-neutral-i font-semibold whitespace-nowrap shrink-0">Join {{ $alumniCount }} Alumni Network</p>
<div class="w-px h-6 bg-neutral-i/40 shrink-0"></div>
<div class="flex items-center gap-2">
<div class="flex gap-1 shrink-0">@for($i=1;$i<=5;$i++)<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>@endfor</div>
<p class="font-semibold text-neutral-i whitespace-nowrap shrink-0">{{ $rating }}</p>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

</section>