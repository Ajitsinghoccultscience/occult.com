@props([
    'text' => 'Unlock the hidden secrets in handwriting at our exclusive Graphology Webinar and discover what every stroke reveals about personality, emotions, and potential',
    'ctaText' => 'Enroll Now',
    'ctaHref' => '#',
])

<section class="w-full section-spacing py-10 md:py-12 pb-12 md:pb-16 bg-neutral-b">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px flex flex-col items-center text-center">
        <p class="text-content md:text-subheading text-neutral-i tracking-[0.48px] max-w-[800px] mb-8 md:mb-10">
            {{ $text }}
        </p>
        <x-ui.button :href="$ctaHref" variant="primary" >
            {{ $ctaText }}
        </x-ui.button>
    </div>
</section>
