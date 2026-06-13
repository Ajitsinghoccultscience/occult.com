@php
    $ctaHref  = $ctaHref  ?? '/graphology-checkout';
    $price    = $price    ?? '₹99';
    $oldPrice = $oldPrice ?? '₹199';
    $seats    = $seats    ?? 'Only 7 seats are left';
@endphp

{{-- ═══════════════════════════════════
     STICKY BAR
════════════════════════════════════ --}}
<div class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-neutral-200 shadow-[0_-4px_20px_rgba(0,0,0,0.12)]">
    <div class="max-w-[1340px] mx-auto section-px py-3 flex items-center gap-4">

        {{-- Price --}}
        <div class="leading-tight">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl md:text-3xl font-extrabold" style="color:#ff9700;">{{ $price }}</span>
                <span class="text-sm md:text-base text-neutral-400 line-through">{{ $oldPrice }}</span>
            </div>
            <p class="text-xs md:text-sm font-bold text-neutral-b mt-0.5">({{ $seats }})</p>
        </div>

        {{-- CTA --}}
        <a href="{{ $ctaHref }}"
           class="ml-auto shrink-0 inline-flex items-center justify-center font-bold text-white text-sm md:text-base px-8 md:px-12 py-3 md:py-3.5 rounded-2xl hover:opacity-90 active:scale-95 transition"
           style="background-color:#ff9700;box-shadow:0 0 22px rgba(255,151,0,0.55),0 6px 16px rgba(0,0,0,0.12);">
            Register Now
        </a>
    </div>
</div>

{{-- Spacer so the fixed bar never covers page content --}}
<div class="h-20 md:h-24" aria-hidden="true"></div>
