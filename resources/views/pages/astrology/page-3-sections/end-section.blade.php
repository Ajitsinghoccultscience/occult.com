@props([
    'ctaText' => 'Reserve Seat @₹49',
    'ctaHref' => '#',
])

<section class="w-full section-spacing py-10 md:py-12 pb-12 md:pb-16 bg-astro-hero-gradient">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px flex flex-col items-center text-center">
        <p class="text-sm md:text-base font-semibold italic text-neutral-i/80 mb-4 tracking-wide">
            "Millionaires don't use astrology, billionaires do." — J.P. Morgan
        </p>
       
        <x-ui.button :href="$ctaHref" variant="astro">
            {{ $ctaText }} <span class="line-through opacity-70 ml-1">₹199</span>
        </x-ui.button>
    </div>
</section>
