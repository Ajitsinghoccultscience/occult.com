@props([
    'image'       => 'image/astrology assests/DIRECT ADMISSION/certificate (AIIOS).webp',
    'title'       => 'Certificate for Your Professional Growth',
    'description' => 'Issued by an ISO-Certified & Government Recognised institute, built to open your income doors.',
    'bullets'     => [
        'Get placed directly as a consultant on our platform, your first earning opportunity is ready before you even start looking.',
        'Run your own practice and charge for private consultations',
        'Build instant trust and credibility with clients',
        'Join Occult institutes or wellness centres as a certified practitioner',
    ],
    'ctaText' => 'Apply Now',
    'ctaHref' => 'https://www.occultscience.in/payment-page/',
])

@php
    $certSrc = asset(implode('/', array_map('rawurlencode', explode('/', $image))));
@endphp

<section class="w-full py-2 md:py-8 bg-white">
    <div class="max-w-335 mx-auto section-px">

        <div class="border border-neutral-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- ── MOBILE (< lg): title → description → image → bullets → button ── --}}
            <div class="lg:hidden flex flex-col items-center gap-5 px-6 py-8 text-center">

                <div>
                    <h2 class="text-xl font-bold text-neutral-900 leading-snug mb-2">{{ $title }}</h2>
                    <p class="text-sm text-neutral-500 leading-relaxed">{{ $description }}</p>
                </div>

                <img src="{{ $certSrc }}"
                     alt="Certificate"
                     class="w-full max-w-xs h-auto object-contain drop-shadow-lg rounded-lg"
                     loading="lazy">

                <ul class="flex flex-col gap-3 text-left w-full">
                    @foreach($bullets as $bullet)
                    <li class="flex items-start gap-3 text-sm text-neutral-700 leading-relaxed">
                        <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ $ctaHref }}"
                   class="inline-flex items-center justify-center font-bold text-white text-sm px-10 py-3 rounded-xl hover:opacity-90 active:scale-95 transition"
                   style="background-color:#8B0000;">
                    {{ $ctaText }}
                </a>

            </div>

            {{-- ── DESKTOP (lg+): image left | content right ── --}}
            <div class="hidden lg:grid grid-cols-2 items-stretch">

                {{-- Certificate image panel --}}
                <div class="flex items-center justify-center px-8 py-10 ">
                    <img src="{{ $certSrc }}"
                         alt="Certificate"
                         class="w-full max-w-sm xl:max-w-md h-auto object-contain drop-shadow-lg rounded-lg"
                         loading="lazy">
                </div>

                {{-- Content --}}
                <div class="flex flex-col justify-center gap-5 px-10 xl:px-14 py-10">

                    <div>
                        <h2 class="text-2xl xl:text-[1.9rem] font-bold text-neutral-900 leading-snug mb-2">{{ $title }}</h2>
                        <p class="text-sm text-neutral-500 leading-relaxed">{{ $description }}</p>
                    </div>

                    <ul class="flex flex-col gap-3">
                        @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-base text-neutral-700 leading-relaxed">
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
                        <a href="{{ $ctaHref }}"
                           class="inline-flex items-center justify-center font-bold text-white text-base px-10 py-3.5 rounded-xl hover:opacity-90 active:scale-95 transition"
                           style="background-color:#8B0000;">
                            {{ $ctaText }}
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
