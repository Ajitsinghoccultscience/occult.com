@extends('layouts.app')

@section('title', 'Contact Us – All India Institute of Occult Science')
@section('description', '7/25, Plot- A, Kirti Nagar Industrial Area, Kirti Nagar, New Delhi- 110015 | contact@occultscience.in')

@section('content')

<x-ui.navbar />

<div style="font-family:'Open Sans',sans-serif;">

    {{-- ═══════════════════════════════════
         BANNER
    ════════════════════════════════════ --}}
    <section class="w-full py-10 md:py-14" style="background-color:#2b2724;">
        <div class="max-w-335 mx-auto section-px">
            <h1 class="text-2xl md:text-3xl font-bold text-white">Need Help?</h1>
            <nav class="mt-2 flex items-center gap-2 text-sm text-white/70">
                <a href="/" class="hover:text-[#ff9700] transition-colors flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L1 8l3 1.35V19h6v-6h4v6h6V9.35L23 8z"/>
                    </svg>
                    Home
                </a>
                <span>/</span>
                <span class="text-white">Contact Us</span>
            </nav>
        </div>
    </section>

    {{-- ═══════════════════════════════════
         MAP + WEBINAR REGISTER CTA
    ════════════════════════════════════ --}}
    <section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
        <div class="max-w-335 mx-auto section-px">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 rounded-2xl overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-neutral-100">

                {{-- Map --}}
                <div class="min-h-[320px] lg:min-h-full">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.328503224852!2d77.1462447!3d28.649881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d02eae1524b9d%3A0xbf8a760478fbe2fc!2sAll%20India%20Institute%20of%20Occult%20Science!5e0!3m2!1sen!2sin!4v1746525957683!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;min-height:320px;display:block;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                {{-- Register CTA --}}
                <div class="bg-white p-6 md:p-10 flex flex-col items-center justify-center text-center gap-5">
                    <h2 class="text-xl md:text-2xl font-bold text-neutral-b">Join Our Graphology Webinar</h2>
                    <p class="text-sm md:text-base text-neutral-b/70 max-w-sm">
                        Reserve your seat for the Mega Graphology Webinar and learn to read anyone's personality from their handwriting.
                    </p>
                    <a href="{{ url('/graphology-checkout') }}"
                       class="inline-flex items-center justify-center gap-2 font-bold text-white text-base px-10 py-4 rounded-xl hover:opacity-90 active:scale-95 transition-all"
                       style="background-color:#ff9700;box-shadow:0 0 25px rgba(255,151,0,0.4);">
                        Register Now @₹49
                        <span class="line-through opacity-70 font-normal text-sm">₹199</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════
         CONTACT INFO CARDS
    ════════════════════════════════════ --}}
    <section class="w-full py-12 md:py-16 bg-white">
        <div class="max-w-335 mx-auto section-px">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="rounded-2xl border border-neutral-100 shadow-sm p-6 flex flex-col items-center text-center gap-3">
                    <span class="w-14 h-14 rounded-full flex items-center justify-center" style="background-color:#fff4e5;">
                        <svg class="w-7 h-7" fill="none" stroke="#ff9700" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </span>
                    <h3 class="font-bold text-neutral-b text-lg">Call Us 24x7</h3>
                    <div class="text-sm text-neutral-b/80 space-y-1">
                        <p><a href="tel:+919871923444" class="hover:text-[#ff9700] transition-colors">+91 9871-92-3444</a></p>
                        <p><a href="tel:+919871743444" class="hover:text-[#ff9700] transition-colors">+91 9871-74-3444</a></p>
                    </div>
                </div>

                <div class="rounded-2xl border border-neutral-100 shadow-sm p-6 flex flex-col items-center text-center gap-3">
                    <span class="w-14 h-14 rounded-full flex items-center justify-center" style="background-color:#fff4e5;">
                        <svg class="w-7 h-7" fill="none" stroke="#ff9700" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </span>
                    <h3 class="font-bold text-neutral-b text-lg">Head Office</h3>
                    <p class="text-sm text-neutral-b/80">
                        <a href="https://www.google.com/maps/place/All+India+Institute+of+Occult+Science"
                           target="_blank" rel="noopener" class="hover:text-[#ff9700] transition-colors">
                            7/25, Plot- A, Kirti Nagar Industrial Area, Kirti Nagar, New Delhi- 110015
                        </a>
                    </p>
                </div>

                <div class="rounded-2xl border border-neutral-100 shadow-sm p-6 flex flex-col items-center text-center gap-3">
                    <span class="w-14 h-14 rounded-full flex items-center justify-center" style="background-color:#fff4e5;">
                        <svg class="w-7 h-7" fill="none" stroke="#ff9700" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <h3 class="font-bold text-neutral-b text-lg">Write Us</h3>
                    <p class="text-sm text-neutral-b/80">
                        <a href="mailto:contact@occultscience.in" class="hover:text-[#ff9700] transition-colors">contact@occultscience.in</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════
         GRAPHOLOGY WEBINAR FAQ
    ════════════════════════════════════ --}}
    @include('pages.graphology.webinar4-sections.faq')

</div>

@endsection
