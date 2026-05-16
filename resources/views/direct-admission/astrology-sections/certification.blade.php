@props([
    'image'       => 'image/astrology assests/Astrology certificate 1.webp',
    'title'       => 'Earn Certifications & Recognition',
    'description' => 'Successfully complete course to attain Advanced Certificate in Astrology from All India Institute of Occult Science',
    'bullets'     => [
        'Get Recognized as a Certified Astrologer, not just a learner',
        'Turn your knowledge into paid consultations and real income',
        'Build instant trust and credibility with clients',
        'Become part of our alumni network and receive ongoing learning and growth support.',
    ],
    'ctaText' => 'Apply Now',
    'ctaHref' => '#',
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        <div class="border border-neutral-200 rounded-2xl p-6 md:p-10 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 items-center">

                {{-- LEFT: Certificate image --}}
                <div class="flex justify-center">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $image)))) }}"
                         alt="Certificate"
                         class="w-full max-w-[320px] md:max-w-[360px] h-auto object-contain drop-shadow-lg rounded-lg"
                         loading="lazy">
                </div>

                {{-- RIGHT: Content --}}
                <div class="flex flex-col gap-5">

                    <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] leading-snug">{{ $title }}</h2>

                    <p class="text-sm text-neutral-e leading-relaxed">{{ $description }}</p>

                    <ul class="space-y-3">
                        @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-sm text-neutral-b">
                            <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            {{ $bullet }}
                        </li>
                        @endforeach
                    </ul>

                    <div>
                        <button onclick="openEnquiryModal()"
                                class="inline-flex items-center justify-center font-bold text-white text-base px-10 py-3.5 rounded-xl transition-colors duration-200 hover:opacity-90"
                                style="background-color:#8B0000;">
                            {{ $ctaText }}
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
