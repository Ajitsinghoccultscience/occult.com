@props([
    'title'        => 'Certificate for Participation',
    'body'         => 'You will receive a Certificate of Participation after attending the Astrology live webinar, empowering you to use this knowledge for both personal growth and professional practice.',
    'ctaHref'      => '#',
    'image'        => 'image/astrology%20assests/Astrology%20certificate%201.jpg',
])

<section class="w-full section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="bg-neutral-bg rounded-2xl shadow-sm px-8 py-10 md:px-12 md:py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                {{-- LEFT: Content --}}
                <div class="flex flex-col order-2 lg:order-1">
                    <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px] text-center lg:text-left">
                        {{ $title }}
                    </h2>
                    <p class="text-content text-neutral-b tracking-[0.48px] mb-8 text-center lg:text-left">{{ $body }}</p>
                    <div class="flex justify-center lg:justify-start">
                        <x-ui.button :href="$ctaHref" variant="grapho-cta" class="!min-w-0 !w-auto !px-8 !py-4 !rounded-xl !text-base tracking-wide">
                            Register Now at @₹49 
                        </x-ui.button>
                    </div>
                </div>

                {{-- RIGHT: Certificate image --}}
                <div class="flex items-center justify-center order-1 lg:order-2">
                    <img
                        src="{{ asset($image) }}"
                        alt="Certificate of Participation"
                        class="w-full max-w-[420px] h-auto object-contain drop-shadow-xl rounded-lg"
                        loading="lazy"
                    >
                </div>

            </div>
        </div>

    </div>
</section>
