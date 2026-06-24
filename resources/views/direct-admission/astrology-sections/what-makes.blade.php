<!-- C:\Users\pandat\Desktop\Office\occult.com\occult.com\public\images\About us (Bivs)\live class.webp -->
@props([
    'title' => 'What Makes All India Institute of Occult Science  The Best Choice',
    'features' => [
   
        [
            'icon'  => 'live class.webp',
            'title' => 'Live Classes + Small Batches',
            'desc'  => 'Attend live, two-way interactive classes with a maximum of 15 students per batch, so you get real attention from the real mentor.',
        ],
        [
            'icon'  => 'featured on.svg',
            'title' => 'Featured on National Media',
            'desc'  => 'Recognized by Zee News, Aaj Tak, Times Now, and other leading platforms built on real trust of voices across the country.',
        ],
        [
            'icon'  => 'notes.svg',
            'title' => 'Notes Sourced from Vedas & Shastras',
            'desc'  => 'Every note is built from real Vedic texts, backed by Gurudev Shrie Kashyap\'s 24 years of research.',
        ],
        [
            'icon'  => 'learning flexibility.svg',
            'title' => 'Ultimate Learning Flexibility',
            'desc'  => 'Switch your batch timing or faculty anytime; your learning never has to stop or be waited for.',
        ],
        [
            'icon'  => 'doubt support.svg',
            'title' => 'Lifetime Doubt Support',
            'desc'  => 'Even years after your course, you can still join doubt sessions, practicals, and refresher classes — our support doesn\'t end with your certificate.',
        ],
        [
            'icon'  => 'placement suppot.svg',
            'title' => 'Direct Platform Placement Support',
            'desc'  => 'Get listed directly as a consultant on our own platform; we give you your first earning opportunity before you even start looking for clients.',
        ],
    ],
])

@php
    $iconBase = 'images/About us (Bivs)';
    $iconUrl  = fn($file) => asset(implode('/', array_map('rawurlencode', explode('/', $iconBase . '/' . $file))));
    $sliderId = 'wm-' . uniqid();
@endphp

<section class="w-full py-2 md:py-8 bg-white">
    <div class="max-w-335 mx-auto section-px">

        {{-- Heading --}}
        <h2 class="text-center text-xl md:text-2xl lg:text-[1.9rem] font-bold text-neutral-900 leading-snug mb-8 md:mb-10">
            {{ $title }}
        </h2>

        {{-- ── DESKTOP (md+): 2-column grid ── --}}
        <div class="hidden md:grid grid-cols-2 gap-x-10 gap-y-8 lg:gap-x-16 lg:gap-y-10">
            @foreach($features as $f)
            <div class="flex items-start gap-4">
                {{-- Icon box --}}
                <div class="shrink-0 w-20 h-20 rounded-md flex items-center justify-center" style="background-color:#8B0000;">
                    <img src="{{ $iconUrl($f['icon']) }}"
                         alt="{{ $f['title'] }}"
                         class="w-15 h-10 object-contain"
                         style="filter:brightness(0) invert(1);"
                         loading="lazy">
                </div>
                {{-- Text --}}
                <div class="min-w-0">
                    <h3 class="font-bold text-neutral-900 text-base lg:text-lg leading-snug mb-1">{{ $f['title'] }}</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">{{ $f['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── MOBILE: snap slider with dot navigation ── --}}
        <div class="md:hidden">
            {{-- Slider track --}}
            <div id="{{ $sliderId }}"
                 class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth gap-4 pb-2 [&::-webkit-scrollbar]:hidden"
                 style="-ms-overflow-style:none;scrollbar-width:none;">
                @foreach($features as $i => $f)
                <div class="snap-start shrink-0 w-[78vw] max-w-75 rounded-2xl p-6 flex flex-col items-center gap-4 text-center" style="background-color:#fdf0f0;">
                    {{-- Icon --}}
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center shrink-0" style="background-color:#8B0000;">
                        <img src="{{ $iconUrl($f['icon']) }}"
                             alt="{{ $f['title'] }}"
                             class="w-8 h-8 object-contain"
                             style="filter:brightness(0) invert(1);"
                             loading="lazy">
                    </div>
                    {{-- Text --}}
                    <div>
                        <h3 class="font-bold text-neutral-900 text-base leading-snug mb-2">{{ $f['title'] }}</h3>
                        <p class="text-sm text-neutral-600 leading-relaxed">{{ $f['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Dot navigation --}}
            <div class="flex justify-center gap-2 mt-5" id="{{ $sliderId }}-dots">
                @foreach($features as $i => $f)
                <button class="wm-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-[#8B0000] scale-125' : 'bg-neutral-300' }}"
                        data-index="{{ $i }}"
                        aria-label="Feature {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>

    </div>
</section>

<script>
(function () {
    var track = document.getElementById('{{ $sliderId }}');
    var dotsEl = document.getElementById('{{ $sliderId }}-dots');
    if (!track || !dotsEl) return;

    var dots = Array.from(dotsEl.querySelectorAll('.wm-dot'));
    var cards = Array.from(track.children);
    var current = 0;

    function setDot(idx) {
        dots.forEach(function (d, i) {
            d.classList.toggle('bg-[#8B0000]', i === idx);
            d.classList.toggle('scale-125',    i === idx);
            d.classList.toggle('bg-neutral-300', i !== idx);
        });
        current = idx;
    }

    // Dot click → scroll to card
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx = parseInt(this.dataset.index, 10);
            cards[idx].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
            setDot(idx);
        });
    });

    // Scroll → update active dot
    var ticking = false;
    track.addEventListener('scroll', function () {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(function () {
            var mid = track.scrollLeft + track.clientWidth / 2;
            var closest = 0;
            cards.forEach(function (card, i) {
                var cardMid = card.offsetLeft + card.offsetWidth / 2;
                if (Math.abs(cardMid - mid) < Math.abs(cards[closest].offsetLeft + cards[closest].offsetWidth / 2 - mid)) {
                    closest = i;
                }
            });
            setDot(closest);
            ticking = false;
        });
    });
})();
</script>
