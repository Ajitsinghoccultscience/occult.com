@php
    $date    = $date    ?? '31st July, 2026';
    $time    = $time    ?? '11:00 AM - 2:00 PM';
    $ctaHref = $ctaHref ?? '/graphology-checkout';

    $trainerImgs  = [
        'image/graphology assests/shivam sir (1).webp',
        'image/Mukul ji (webinar).webp',
        'image/graphology assests/pawan sir.webp',
    ];
    $trainerNames = ['Shivam Tripathi', 'Mukul Shrivastava', 'Pawan Kumar'];
@endphp

{{-- ═══════════════════════════════════
     HERO (banner background)
════════════════════════════════════ --}}
<section class="relative overflow-hidden font-open-sans" style="width:100vw;margin-left:calc(50% - 50vw);font-family:'Open Sans',sans-serif;">

    {{-- Background collage image --}}
    <img src="{{ asset('images/banner graphology website.webp') }}"
         alt="" aria-hidden="true"
         class="absolute inset-0 w-full h-full object-cover"
         loading="eager" fetchpriority="high">

    {{-- Dark overlay for readability --}}
    <div class="absolute inset-0" style="background:linear-gradient(90deg,rgba(0,0,0,0.85) 0%,rgba(0,0,0,0.65) 45%,rgba(0,0,0,0.35) 100%);"></div>

    <div class="relative z-10 max-w-[1340px] mx-auto section-px py-14 md:py-20">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-8 items-stretch">

            {{-- ── LEFT: content ── --}}
            <div class="order-2 lg:order-1 text-center lg:text-left">

                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight">
                    Mega <span style="color:#ff9700;">Graphology</span> Webinar
                </h1>

                <p class="mt-3 text-white/90 text-sm md:text-base leading-relaxed max-w-lg mx-auto lg:mx-0">
                    Attend a 2 hour live session and learn to read anyone's personality from their handwriting.
                </p>

                <p class="mt-4 text-white/70 text-sm md:text-[15px] leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Graphology is trusted by companies, courts and hiring experts to read a person's behaviour from their handwriting. Become an expert in human psychology with handwriting analysis and add a skill that helps you grow your career.
                </p>

                <div class="mt-6 flex justify-center lg:justify-start">
                    <a href="{{ $ctaHref }}"
                       class="inline-flex items-center justify-center gap-2 font-bold text-white text-base px-8 py-3.5 rounded-2xl hover:opacity-90 active:scale-95 transition shrink-0"
                       style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
                        Register Now @₹49
                        <span class="line-through opacity-70 font-normal text-sm">₹199</span>
                    </a>
                </div>

                {{-- Date + Time --}}
                <div class="mt-6 inline-flex items-stretch gap-0 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.25)] border-b-2 border-[#ff9700] overflow-hidden divide-x divide-neutral-200">
                    <div class="px-5 py-3.5">
                        <div class="flex items-center gap-2">
                            <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <p class="text-base font-bold text-neutral-b leading-none">Date</p>
                        </div>
                        <p class="mt-1.5 text-sm font-semibold text-neutral-b/80 leading-none">{{ $date }}</p>
                    </div>
                    <div class="px-5 py-3.5">
                        <div class="flex items-center gap-2">
                            <span class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <p class="text-base font-bold text-neutral-b leading-none">Time</p>
                        </div>
                        <p class="mt-1.5 text-sm font-semibold text-neutral-b/80 leading-none">{{ $time }}</p>
                    </div>
                </div>
            </div>

            {{-- ── RIGHT: trainer photo ── --}}
            <div class="order-1 lg:order-2 flex flex-col items-center justify-start pt-0 h-full">
                <div id="hero-banner-trainer">
                    @foreach($trainerImgs as $i => $img)
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img)))) }}"
                             alt="{{ $trainerNames[$i] }} - Graphologist"
                             class="hero-banner-trainer-img {{ $i === 0 ? 'is-active' : '' }}"
                             @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                    @endforeach
                </div>
                <p id="hero-banner-trainer-name" class="mt-4 font-bold text-white text-lg md:text-xl text-center">{{ $trainerNames[0] }} <span class="font-medium text-white/80">(Graphologist)</span></p>
            </div>

        </div>
    </div>
</section>

<style>
#hero-banner-trainer {
    position: relative;
    width: 11rem;
    height: 11rem;
    border-radius: 9999px;
    overflow: hidden;
    border: 4px solid #ff9700;
    box-shadow: 0 10px 30px rgba(0,0,0,0.35);
    background-color: #ffffff;
}
@media (min-width: 640px)  { #hero-banner-trainer { width: 14rem; height: 14rem; } }
@media (min-width: 768px)  { #hero-banner-trainer { width: 18rem; height: 18rem; } }
@media (min-width: 1024px) { #hero-banner-trainer { width: 20rem; height: 20rem; } }

.hero-banner-trainer-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: bottom;
    opacity: 0;
    transition: opacity 0.7s ease;
}
.hero-banner-trainer-img.is-active { opacity: 1; }
</style>

<script>
(function () {
    var box = document.getElementById('hero-banner-trainer');
    if (!box) return;
    var imgs = box.querySelectorAll('.hero-banner-trainer-img');
    if (imgs.length < 2) return;
    var names = @json($trainerNames);
    var nameEl = document.getElementById('hero-banner-trainer-name');
    var i = 0;
    setInterval(function () {
        imgs[i].classList.remove('is-active');
        i = (i + 1) % imgs.length;
        imgs[i].classList.add('is-active');
        if (nameEl && names[i]) nameEl.innerHTML = names[i] + ' <span class="font-medium text-white/80">(Graphologist)</span>';
    }, 3000);
})();
</script>
