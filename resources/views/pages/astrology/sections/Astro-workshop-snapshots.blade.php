@props([
    'title' => "Last workshop's snapshots",
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'images' => [
        'images/12.webp',
        'images/13.webp',
    ],
])

@php
    $images = $images ?? ['images/12.webp', 'images/13.webp'];
    $largeImage  = $images[0] ?? 'images/12.webp';
    $mediumImage = $images[1] ?? $images[0];
    $smallImage  = $images[0];
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Mobile: Auto-slide carousel --}}
        <div class="lg:hidden">
            <div class="relative overflow-hidden rounded-xl w-full">
                <div id="ws-track" class="flex transition-transform duration-700 ease-in-out w-full">
                    @foreach($images as $img)
                        <div class="w-full shrink-0" style="flex: 0 0 100%;">
                            <img src="{{ asset($img) }}" alt="Workshop snapshot" class="w-full object-cover rounded-xl shadow-drop" style="max-height:320px;" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center gap-2 mt-4">
                @foreach($images as $i => $img)
                    <button onclick="wsGoTo({{ $i }})" id="ws-dot-{{ $i }}" class="w-2.5 h-2.5 rounded-full transition-colors duration-300"></button>
                @endforeach
            </div>
        </div>

        {{-- Desktop: Side by side grid --}}
        <div class="hidden lg:grid grid-cols-2 gap-4">
            @foreach($images as $img)
                <div class="rounded-xl overflow-hidden shadow-drop">
                    <img src="{{ asset($img) }}" alt="Workshop snapshot" class="w-full h-full object-cover" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>

<script defer>
(function() {
    var track = document.getElementById('ws-track');
    var total = {{ count($images) }};
    var current = 0;

    function wsGoTo(index) {
        current = index;
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        document.querySelectorAll('[id^="ws-dot-"]').forEach(function(dot, i) {
            dot.style.backgroundColor = i === index ? '#840202' : '';
            dot.classList.toggle('bg-neutral-red', i === index);
            dot.classList.toggle('bg-neutral-e', i !== index);
        });
    }

    window.wsGoTo = wsGoTo;
    wsGoTo(0);
    setInterval(function() { wsGoTo((current + 1) % total); }, 3000);
})();
</script>
