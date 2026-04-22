@props([
    'title' => "Last workshop's snapshots",
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'images' => [
        'image/graphology assests/Grapho-snapshot/grapho-snapshot-1.webp',
        'image/graphology assests/Grapho-snapshot/grapho-snapshot-2.webp',
        'image/graphology assests/Grapho-snapshot/grapho-snapshot-3.webp',
        'image/graphology assests/Grapho-snapshot/grapho-snapshot-4.webp',
    ],
])

@php
    $u = fn($p) => asset(implode('/', array_map('rawurlencode', explode('/', $p))));
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- MOBILE: one image at a time slider --}}
        <div class="lg:hidden relative">
            <div class="overflow-hidden rounded-xl">
                <div id="snapshot-track" class="flex transition-transform duration-500 ease-in-out">
                    @foreach($images as $img)
                        <div class="w-full shrink-0 aspect-video">
                            <img src="{{ $u($img) }}" alt="Workshop snapshot" class="w-full h-full object-cover rounded-xl shadow-drop" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Prev / Next --}}
            <button onclick="snapshotSlide(-1)" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 shadow flex items-center justify-center">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button onclick="snapshotSlide(1)" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 shadow flex items-center justify-center">
                <svg class="w-4 h-4 text-neutral-b" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            {{-- Dots --}}
            <div class="flex justify-center gap-2 mt-3" id="snapshot-dots">
                @foreach($images as $i => $img)
                    <button onclick="snapshotGoTo({{ $i }})" class="w-2 h-2 rounded-full transition-colors {{ $i === 0 ? 'bg-neutral-b' : 'bg-neutral-b/30' }}" id="dot-{{ $i }}"></button>
                @endforeach
            </div>
        </div>

        {{-- DESKTOP: 2-column side-by-side --}}
        <div class="hidden lg:grid grid-cols-2 gap-4 items-stretch">
            @foreach($images as $img)
            <div class="rounded-xl overflow-hidden shadow-drop aspect-video">
                <img src="{{ $u($img) }}" alt="Workshop snapshot" class="w-full h-full object-cover" loading="lazy">
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
(function() {
    var current = 0;
    var total = {{ count($images) }};
    var timer = null;

    function update() {
        document.getElementById('snapshot-track').style.transform = 'translateX(-' + (current * 100) + '%)';
        for (var i = 0; i < total; i++) {
            var dot = document.getElementById('dot-' + i);
            if (dot) dot.className = 'w-2 h-2 rounded-full transition-colors ' + (i === current ? 'bg-neutral-b' : 'bg-neutral-b/30');
        }
    }

    function startAuto() {
        clearInterval(timer);
        timer = setInterval(function() {
            current = (current + 1) % total;
            update();
        }, 3000);
    }

    window.snapshotSlide = function(dir) {
        current = (current + dir + total) % total;
        update();
        startAuto();
    };

    window.snapshotGoTo = function(i) {
        current = i;
        update();
        startAuto();
    };

    update();
    startAuto();
})();
</script>
@endpush
