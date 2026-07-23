@php
    $date    = $date    ?? 'Wed, 20th May, 2026';
    $time    = $time    ?? '11:00 AM to 1:00 PM';
    $ctaHref = $ctaHref ?? '/graphology-checkout';

    $trainerImgs = [
        'images/pawan sir 1.webp',
        'images/maager sir 1.webp',
        'image/Mukul JI.webp',
    ];
    $avatars  = [
        'image/graphology assests/alumni 1.webp',
        'image/graphology assests/alumni 2.webp',
        'image/graphology assests/alumni 3.webp',
    ];

    $bullets = [
        ['icon' => 'income',  'html' => 'Learn Graphology to <strong>Boost Your Income</strong>'],
        ['icon' => 'cert',    'html' => 'Get <strong>Bonus Worth ₹4,999</strong>'],
        ['icon' => 'shield',  'html' => 'Build<strong> Trust, Value & Recognition</strong>'],
    ];

    $icons = [
        'income' => '<path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" fill="currentColor" stroke="none"/>',
        'cert'   => '<circle cx="12" cy="9" r="6" fill="none"/><path d="M9 14.5V21l3-2 3 2v-6.5M9.5 9l1.7 1.7L15 7" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        'shield' => '<path d="M12 2l8 3v6c0 5-3.4 8.5-8 10-4.6-1.5-8-5-8-10V5l8-3z" fill="none"/><path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
    ];
@endphp

<section class="bg-neutral-50 py-3 md:py-3 font-open-sans" style="width:100vw;margin-left:calc(50% - 50vw);font-family:'Open Sans',sans-serif;">
    <div class="max-w-[1340px] mx-auto section-px">
        <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-neutral-100 py-6 md:p-10 lg:p-12 overflow-hidden">

            {{-- Company logo — centered top, all devices --}}
            <div class="flex justify-center mb-5 md:mb-7">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'image/graphology assests/company-logo.png')))) }}"
                     alt="All India Institute of Occult Science"
                     class="h-12 sm:h-14 md:h-16 w-auto object-contain"
                     loading="eager">
            </div>

            {{-- Mobile order: title → image → bullets/CTA.  Desktop: title + bullets/CTA left, image right. --}}
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-10 lg:items-center">

                {{-- ── TITLE ── --}}
                <div class="order-1 lg:col-start-1 lg:row-start-1 text-center lg:text-left">
                    <h1 class="text-[1.75rem] md:text-3xl xl:text-[2.3rem] font-bold text-neutral-b leading-tight">
                        <span style="color:#ff9700;">2-3X Your Salary</span> with a Practical Graphology Webinar
                    </h1>
                </div>

                {{-- ── BULLETS + CTA ── --}}
                <div class="order-3 lg:col-start-1 lg:row-start-2 text-start lg:text-left">

                    {{-- Bullets --}}
                    <ul class="inline-block text-left space-y-2 mb-7 md:mb-8">

                        <!-- for mobile view -->
                      <div class="md:hidden flex items-center justify-center mx-auto gap-2">
                            {{-- Avatars --}}
                            <div class="flex items-center">
                                @foreach($avatars as $av)
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $av)))) }}"
                                     alt="" aria-hidden="true"
                                     class="w-7 h-7 rounded-full object-cover object-top border-2 border-white -ml-2 first:ml-0">
                                @endforeach
                                <span class="w-7 h-7 rounded-full -ml-2 flex flex-col items-center justify-center text-white text-[6px] font-bold leading-none border-2 border-white" style="background-color:#ff9700;">
                                    20K+<span class="text-[6px]">Students</span>
                                </span>
                            </div>
                            {{-- Stars --}}
                            <div>
                                <div class="flex gap-0.5 ">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-[#ff9700]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-[10px] text-neutral-b  mt-0.5">10k+ reviews (4.9 of 5)</p>
                            </div>
                        </div>

                        @foreach($bullets as $b)
                        <li class="flex items-start  sm:items-start gap-2 text-neutral-b text-xs md:text-base ">
                            <span class="shrink-0 mt-0.5 w-7 h-7 rounded-full flex items-center justify-center" style="background-color:#ff9700;">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    {!! $icons[$b['icon']] !!}
                                </svg>
                            </span>
                            <span class="leading-tight text-[14px]  sm:text-lg mt-1.5 sm:mt-1">{!! $b['html'] !!}</span>
                        </li>
                        @endforeach
                    </ul>

                    {{-- CTA + social proof --}}
                    <div class="hidden md:flex items-center justify-start gap-5">
                        <a href="{{ $ctaHref }}"
                           class=" inline-flex items-center justify-center gap-2 font-bold text-white text-base px-8 py-3.5 rounded-2xl hover:opacity-90 active:scale-95 transition shrink-0"
                           style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
                            Register Now @₹49
                            <span class="line-through opacity-70 font-normal text-sm">₹199</span>
                        </a>

                        <div class=" flex items-center gap-3">
                            {{-- Avatars --}}
                            <div class="flex items-center">
                                @foreach($avatars as $av)
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $av)))) }}"
                                     alt="" aria-hidden="true"
                                     class="w-9 h-9 rounded-full object-cover object-top border-2 border-white -ml-2 first:ml-0">
                                @endforeach
                                <span class="w-9 h-9 rounded-full -ml-2 flex flex-col items-center justify-center text-white text-[8px] font-bold leading-none border-2 border-white" style="background-color:#ff9700;">
                                    20K+<span class="text-[6px] font-medium">Students</span>
                                </span>
                            </div>
                            {{-- Stars --}}
                            <div>
                                <div class="flex gap-0.5">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-[#ff9700]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <p class="text-xl  text-neutral-b  mt-0.5">10k reviews (4.9 of 5)</p>
                            </div>
                        </div>
                    </div>
                    








                </div>

                {{-- ── IMAGE ── --}}
                <div class="order-2 lg:col-start-2 lg:row-start-1 lg:row-span-2 flex flex-col items-center">
                    <div class="relative w-full max-w-50 sm:max-w-85 aspect-square" id="hero-trainer">
                        @foreach($trainerImgs as $i => $img)
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $img)))) }}"
                             alt="Graphology Trainer"
                             class="hero-trainer-img absolute inset-0 w-full h-full object-contain transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                             @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var box = document.getElementById('hero-trainer');
    if (!box) return;
    var imgs  = box.querySelectorAll('.hero-trainer-img');
    if (imgs.length < 2) return;
    var names = ['Pawan sir', 'Maager sir', 'Mukul ji'];
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
