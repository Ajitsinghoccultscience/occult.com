@props([
    'ctaHref' => '/graphology-checkout',
    'links'   => [
        ['label' => 'Home',       'href' => '/'],
        ['label' => 'About Us',   'href' => '#about'],
        ['label' => 'Contact Us', 'href' => '/contact'],
    ],
])

@php
    $ctaHref = $ctaHref ?? '/graphology-checkout';
@endphp

<footer class="w-full font-open-sans" style="background-color:#2b2724;font-family:'Open Sans',sans-serif;">

    {{-- CTA banner --}}
    <div class="border-b border-white/10">
        <div class="max-w-[820px] mx-auto section-px py-16 md:py-20 text-center">
            <h2 class="text-2xl md:text-4xl font-bold text-white mb-5 leading-tight">
                Start Understanding People Beyond Words
            </h2>
            <p class="text-sm md:text-base text-white/70 max-w-[640px] mx-auto mb-8 leading-relaxed">
                Whether you are hiring, counseling, coaching, or training people, graphology can help
                you add a powerful personality observation skill to your professional journey.
            </p>
            <a href="{{ $ctaHref }}"
               class="inline-flex items-center gap-2 px-10 py-4 rounded-xl font-bold text-white text-base md:text-lg hover:opacity-90 active:scale-95 transition-all"
               style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.65),0 10px 30px -5px rgba(255,151,0,0.6);">
                Register Now @₹49
                <span class="line-through opacity-70 font-normal">₹199</span>
            </a>
        </div>
    </div>

    {{-- Footer columns --}}
    <div class="max-w-335 mx-auto section-px py-12 md:py-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- About / logo --}}
            <div>
                <div class="inline-block bg-white rounded-xl px-4 py-2.5 mb-4">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'image/graphology assests/company-logo.png')))) }}"
                         alt="All India Institute of Occult Science"
                         class="h-10 w-auto object-contain"
                         loading="lazy">
                </div>
                <p class="text-sm text-white/60 leading-relaxed max-w-xs">
                    India's trusted institute for Astrology, Vastu, Reiki, Palmistry, Numerology and Graphology courses — teaching since 2004.
                </p>
            </div>

            {{-- Quick links --}}
            <div>
                <h3 class="text-white font-bold text-sm uppercase tracking-wide mb-4">Quick Links</h3>
                <ul class="space-y-2.5">
                    @foreach($links as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="text-sm text-white/60 hover:text-[#ff9700] transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white font-bold text-sm uppercase tracking-wide mb-4">Contact</h3>
                <ul class="space-y-2.5 text-sm text-white/60">
                    <li>
                        <a href="tel:+919871923444" class="hover:text-[#ff9700] transition-colors">+91 9871-92-3444</a>
                    </li>
                    <li>
                        <a href="mailto:contact@occultscience.in" class="hover:text-[#ff9700] transition-colors">contact@occultscience.in</a>
                    </li>
                    <li class="leading-relaxed">
                        7/25, Plot- A, Kirti Nagar Industrial Area, Kirti Nagar, New Delhi- 110015
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-white/10">
        <div class="max-w-335 mx-auto section-px py-5 text-center">
            <p class="text-xs text-white/40">
                &copy; {{ date('Y') }} All India Institute of Occult Science. All rights reserved.
            </p>
        </div>
    </div>

</footer>
