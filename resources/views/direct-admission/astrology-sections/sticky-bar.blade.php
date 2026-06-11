@props([
    'price'      => '₹96,000',
    'oldPrice'   => '₹1,92,000',
    'courseName' => 'Astrology Certificate Course',
    'enrolled'   => '50,000+ Students enrolled',
    'image'      => 'image/astrology assests/institute/Founder-speech.webp',
    'ctaLabel'   => 'Enrol Now',
])

{{-- ── Sticky bottom bar ── --}}
<div class="fixed bottom-0 left-0 right-0 z-50 shadow-[0_-4px_20px_rgba(0,0,0,0.15)]">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto">

        {{-- Top: price + CTA (dark) --}}
        <div class="flex items-center justify-between gap-3 px-4 md:px-6 py-3" style="background-color:#1a1817;">
            <div class="flex items-baseline gap-2">
                <span class="text-white font-bold text-xl md:text-2xl">{{ $price }}</span>
                <span class="text-white/50 line-through text-sm md:text-base">{{ $oldPrice }}</span>
            </div>
            <button type="button" onclick="openEnquiryModal()"
                    class="font-bold text-white text-sm md:text-base px-6 md:px-10 py-2.5 md:py-3 rounded-xl hover:opacity-90 active:scale-95 transition"
                    style="background-image:linear-gradient(to bottom,#D32F2F,#9E1212);box-shadow:0 4px 14px rgba(211,47,47,0.4);">
                {{ $ctaLabel }}
            </button>
        </div>

        {{-- Bottom: course info (cream) --}}
        <div class="flex items-center gap-3 px-4 md:px-6 py-2" style="background-color:#F5E7C8;">
            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                 alt="{{ $courseName }}"
                 class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover object-top shrink-0 border border-black/10"
                 loading="lazy">
            <div class="leading-tight">
                <p class="font-bold text-neutral-b text-sm md:text-base">{{ $courseName }}</p>
                <p class="text-xs md:text-sm text-neutral-e">{{ $enrolled }}</p>
            </div>
        </div>

    </div>
</div>

{{-- Spacer so the fixed bar never covers page content at the bottom --}}
<div class="h-28 md:h-32" aria-hidden="true"></div>
