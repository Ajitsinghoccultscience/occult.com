@props([
    'price'      => '₹96,000',
    'oldPrice'   => '₹1,92,000',
    'discount'   => '50% OFF',
    'courseName' => 'Astrology Certificate Course',
    'enrolled'   => '50,000+ enrolled',
    'rating'     => '4.9',
    'seats'      => 'Limited seats left',
    'image'      => 'image/astrology assests/institute/Founder-speech.webp',
    'ctaLabel'   => 'Enrol Now',
    'timerMinutes' => null,
    'timerKey'     => 'astro_offer',
])

@php $img = asset(implode('/', array_map('rawurlencode', explode('/', $image)))); @endphp

{{-- ══════════════════════════════════════
     DESKTOP: full-width white sticky bar
═══════════════════════════════════════ --}}
<div class="hidden md:block fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-neutral-200 shadow-[0_-4px_24px_rgba(0,0,0,0.1)]">
    <div class="max-w-[1340px] mx-auto section-px py-3 flex items-center gap-5">

        {{-- Thumbnail --}}
        <img src="{{ $img }}" alt="{{ $courseName }}"
             class="w-12 h-12 rounded-xl object-cover object-top shrink-0 border border-neutral-200" loading="lazy">

        {{-- Course info --}}
        <div class="min-w-0">
            <p class="text-neutral-b font-bold text-base leading-tight truncate">{{ $courseName }}</p>
            <div class="flex items-center gap-2 mt-0.5 text-xs text-neutral-e">
                <span class="inline-flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>
                    {{ $rating }}
                </span>
                <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                <span>{{ $enrolled }}</span>
                <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                <span class="text-[#B71C1C] font-semibold">{{ $seats }}</span>
            </div>
        </div>

        {{-- Right group: timer + price + CTA --}}
        <div class="ml-auto flex items-center gap-5 shrink-0">

            {{-- Countdown --}}
            @if($timerMinutes)
            <div class="flex flex-col items-center leading-none">
                <span class="text-[10px] text-neutral-e font-medium mb-1">Offer ends in</span>
                <span class="sticky-cd font-extrabold text-[#B71C1C] text-lg tabular-nums">--:--:--</span>
            </div>
            <span class="w-px h-9 bg-neutral-200"></span>
            @endif

            {{-- Price --}}
            <div class="text-right leading-tight">
                <div class="flex items-center justify-end gap-2">
                    <span class="text-neutral-b font-extrabold text-2xl">{{ $price }}</span>
                    @if($oldPrice)<span class="text-neutral-400 line-through text-sm">{{ $oldPrice }}</span>@endif
                </div>
                @if($discount)<span class="inline-block text-[11px] font-bold text-green-600">{{ $discount }}</span>@endif
            </div>

            {{-- CTA --}}
            <button type="button" onclick="openEnquiryModal()"
                    class="font-bold text-white text-base px-9 py-3 rounded-xl hover:opacity-90 active:scale-95 transition"
                    style="background-image:linear-gradient(to bottom,#E23B3B,#9E1212);box-shadow:0 0 22px rgba(226,59,59,0.45),0 6px 16px rgba(0,0,0,0.18);">
                {{ $ctaLabel }}
            </button>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════
     MOBILE: full-width white slim bar
═══════════════════════════════════════ --}}
<div class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-neutral-200 shadow-[0_-4px_20px_rgba(0,0,0,0.12)]">
    <div class="flex items-center gap-3 px-4 py-2.5">
        <div class="leading-tight min-w-0">
            <div class="flex items-baseline gap-2">
                <span class="text-neutral-b font-extrabold text-lg">{{ $price }}</span>
                <span class="text-neutral-400 line-through text-xs">{{ $oldPrice }}</span>
                <span class="text-[10px] font-bold text-green-600">{{ $discount }}</span>
            </div>
            <p class="text-[10px] text-[#B71C1C] font-semibold truncate">
                @if($timerMinutes)
                    Offer ends in <span class="sticky-cd tabular-nums font-bold">--:--:--</span>
                @else
                    {{ $seats }} · {{ $enrolled }}
                @endif
            </p>
        </div>
        <button type="button" onclick="openEnquiryModal()"
                class="ml-auto shrink-0 font-bold text-white text-sm px-6 py-2.5 rounded-xl active:scale-95 transition"
                style="background-image:linear-gradient(to bottom,#E23B3B,#9E1212);box-shadow:0 0 18px rgba(226,59,59,0.4);">
            {{ $ctaLabel }}
        </button>
    </div>
</div>

@if($timerMinutes)
<script>
(function () {
    var key  = @json($timerKey);
    var mins = {{ (int) $timerMinutes }};
    var now  = Date.now();
    var stored = parseInt(localStorage.getItem(key) || '0', 10);
    var end;
    if (stored && !isNaN(stored)) {
        end = stored;                              // continue / keep expired
    } else {
        end = now + mins * 60000;                  // first visit for this visitor
        localStorage.setItem(key, String(end));
    }
    function pad(n) { return n < 10 ? '0' + n : '' + n; }
    function fmt(ms) {
        if (ms < 0) ms = 0;
        var s = Math.floor(ms / 1000);
        return pad(Math.floor(s / 3600)) + ':' + pad(Math.floor((s % 3600) / 60)) + ':' + pad(s % 60);
    }
    function tick() {
        var txt = fmt(end - Date.now());
        document.querySelectorAll('.sticky-cd').forEach(function (el) { el.textContent = txt; });
    }
    tick();
    setInterval(tick, 1000);
})();
</script>
@endif

{{-- Spacer so the fixed bar never covers page content --}}
<div class="h-20 md:h-24" aria-hidden="true"></div>
