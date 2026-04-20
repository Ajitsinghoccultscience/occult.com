@props([
    'text' => 'Unlock the hidden secrets of the stars in our exclusive Astrology Webinar and discover what every planet reveals about your personality, emotions, and life potential',
    'ctaText' => 'Reserve Seat @₹49',
    'ctaHref' => '#',
])

<section class="w-full section-spacing py-10 md:py-12 pb-12 md:pb-16 bg-astro-hero-gradient-red">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px flex flex-col items-center text-center">
        <p class="text-content md:text-subheading text-neutral-i tracking-[0.48px] max-w-[800px] mb-8 md:mb-10">
            {{ $text }}
        </p>
        <x-ui.button :href="$ctaHref" variant="astro">
            {{ $ctaText }} <span class="line-through opacity-70 ml-1">₹199</span>
        </x-ui.button>
    </div>
</section>
