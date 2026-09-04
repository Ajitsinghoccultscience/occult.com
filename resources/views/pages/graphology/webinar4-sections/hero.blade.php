@php
    $date    = $date    ?? '31st July, 2026';
    $time    = $time    ?? '11:00 AM - 2:00 PM';
    $ctaHref = $ctaHref ?? '/graphology-checkout';

    $trainerImgs = [
        'image/Mukul JI.webp',
        'images/pawan sir 1.webp',
        'images/maager sir 1.webp',
    ];
    $trainerNames = ['Mukul Shrivastava', 'Pawan Sir', 'Tripathi Sir'];
@endphp

<section class="bg-neutral-50 py-3 md:py-3 font-open-sans" style="width:100vw;margin-left:calc(50% - 50vw);font-family:'Open Sans',sans-serif;">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Company logo — centered, above the card --}}
        <div class="flex justify-center relative z-10 -mb-6 md:-mb-8">
            <div class="bg-white rounded-full shadow-[0_4px_20px_rgba(0,0,0,0.08)] px-5 py-2 flex items-center justify-center">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'image/graphology assests/company-logo.png')))) }}"
                     alt="All India Institute of Occult Science"
                     class="h-10 sm:h-12 md:h-14 w-auto object-contain"
                     loading="eager">
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-neutral-100 overflow-hidden">
            <div class="pt-10 md:pt-12 p-6 md:p-10 lg:p-12">

                <div class="grid lg:grid-cols-2 gap-4 lg:gap-4 lg:items-center">

                    {{-- ── LEFT: content ── --}}
                    <div class="order-2 lg:order-1 text-center lg:text-left">

                        <h1 class="text-[1.75rem] md:text-3xl xl:text-[2.1rem] font-bold text-neutral-b leading-tight lg:whitespace-nowrap">
                            Boost Your Income With <span style="color:#ff9700;">Graphology</span>
                        </h1>

                        <p class="mt-3 text-neutral-b/80 text-sm md:text-base leading-relaxed">
                            Attend a 2 hour live session and learn to read anyone's personality from their handwriting.
                        </p>

                        {{-- Date + Time --}}
                        <div class="mt-5 inline-flex md:flex items-stretch gap-0 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.08)] border-b-2 border-[#ff9700] overflow-hidden divide-x divide-neutral-200">
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

                        <p class="mt-5 text-neutral-b/70 text-sm md:text-[15px] leading-relaxed max-w-xl mx-auto lg:mx-0">
                            Graphology is trusted by companies, courts and hiring experts to read a person's behaviour from their handwriting. Become an expert in human psychology with handwriting analysis and add a skill that helps you grow your career.
                        </p>

                        <div class="mt-6 flex justify-center lg:justify-start">
                            <a href="{{ $ctaHref }}"
                               class="inline-flex items-center justify-center gap-2 font-bold text-white text-base px-8 py-3.5 rounded-2xl hover:opacity-90 active:scale-95 transition shrink-0"
                               style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
                                Register Now Free
                                <span class="line-through opacity-70 font-normal text-sm">₹199</span>
                            </a>
                        </div>
                    </div>

                    {{-- ── RIGHT: trainer image ── --}}
                    <div class="order-1 lg:order-2 flex flex-col items-center lg:translate-x-4 xl:translate-x-8">
                        <div class="relative w-full max-w-[220px] sm:max-w-[280px] lg:max-w-[320px] aspect-square flex items-center justify-center">
                            <div class="relative w-full h-full" id="hero-trainer">
                                @foreach($trainerImgs as $i => $img)
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img)))) }}"
                                     alt="Graphology Trainer"
                                     class="hero-trainer-img absolute inset-0 w-full h-full object-contain object-bottom transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                                     @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                                @endforeach
                            </div>
                            <span class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center">
                                <svg class="w-5 h-5 text-neutral-b" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 3L1 8l11 5 9-4.09V17h2V8L12 3zm-7 8.18v3.63C5 17.5 8.13 19 12 19s7-1.5 7-4.19v-3.63l-7 3.18-7-3.18z"/>
                                </svg>
                            </span>
                        </div>
                        <p id="hero-trainer-name" class="mt-1 font-bold text-neutral-b text-base md:text-lg">{{ $trainerNames[0] }}</p>
                        <p class="text-neutral-b/60 text-sm">Graphologist</p>
                    </div>

                </div>
            </div>

            {{-- ── BOTTOM STATS BAR ── --}}
            @php
                $statBarItems = [
                    '20,000+ students trained',
                    '10k+ reviews (4.9/5)',
                    'Bonus worth ₹4,999 on registration',
                ];
            @endphp

            {{-- Desktop / tablet: 3 equal columns, divided --}}
            <div class="hidden sm:grid grid-cols-3 divide-x divide-white/40 py-3 px-4" style="background-color:#ff9700;">
                @foreach($statBarItems as $item)
                <span class="text-center text-white font-semibold text-sm px-2">{{ $item }}</span>
                @endforeach
            </div>

            {{-- Mobile: auto-sliding carousel, one item at a time --}}
            <div class="sm:hidden relative overflow-hidden py-3 px-4 h-11" id="hero-stat-slider" style="background-color:#ff9700;">
                @foreach($statBarItems as $i => $item)
                <span class="hero-stat-slide absolute inset-0 flex items-center justify-center text-center text-white font-semibold text-xs px-6 transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var box = document.getElementById('hero-stat-slider');
    if (!box) return;
    var slides = box.querySelectorAll('.hero-stat-slide');
    if (slides.length < 2) return;
    var i = 0;
    setInterval(function () {
        slides[i].style.opacity = '0';
        i = (i + 1) % slides.length;
        slides[i].style.opacity = '1';
    }, 2500);
})();
</script>

<script>
(function () {
    var box = document.getElementById('hero-trainer');
    if (!box) return;
    var imgs  = box.querySelectorAll('.hero-trainer-img');
    if (imgs.length < 2) return;
    var names = ['Mukul Shrivastava', 'Pawan Sir', 'Tripathi Sir'];
    var nameEl = document.getElementById('hero-trainer-name');
    var i = 0;
    setInterval(function () {
        imgs[i].style.opacity = '0';
        i = (i + 1) % imgs.length;
        imgs[i].style.opacity = '1';
        if (nameEl && names[i]) nameEl.textContent = names[i];
    }, 3000);
})();
</script>
