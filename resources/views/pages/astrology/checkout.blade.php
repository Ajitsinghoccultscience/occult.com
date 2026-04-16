@extends('layouts.app')

@section('title', 'Register – Mega Astrology Webinar')
@section('description', 'Reserve your seat for the Mega Astrology Webinar by All India Institute of Occult Science.')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <header class="w-full bg-white border-b border-gray-200 py-3 px-5 flex items-center justify-between">
        <img src="{{ asset('image/astrology%20assests/logo%40300x%20%281%29.webp') }}"
             alt="All India Institute of Occult Science"
             class="h-12 w-auto object-contain">
        <div class="hidden sm:flex items-center gap-2 text-sm font-semibold text-gray-700">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm.5 5v5.25l4.5 2.67-.75 1.23L11 13V7h1.5z"/>
            </svg>
            Only a Few Seats Left
        </div>
    </header>

    {{-- Two-column layout --}}
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-10 md:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="flex flex-col gap-4 lg:gap-7">

                {{-- Webinar title + date/time --}}
                <div>
                    <h1 class="text-lg lg:text-2xl font-bold text-gray-900 mb-1">Mega Astrology Webinar</h1>
                    <p class="text-xs lg:text-sm text-gray-500">Sat, 18th April 2026 &nbsp;·&nbsp; 4:00 PM – 7:00 PM IST</p>
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-200"></div>

                {{-- What's included --}}
                <div>
                    <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">What's Included</h2>
                    <ul class="space-y-2">
                        @foreach([
                            ['3 Hour Live Training', '₹379'],
                            ['Practice Worksheet',   '₹149'],
                            ['PDF Notes',            '₹79'],
                            ['Bonus Material',       '₹392'],
                        ] as [$label, $price])
                        <li class="flex items-center justify-between">
                            <span class="flex items-center gap-2 text-xs lg:text-sm text-gray-700">
                                <span class="w-4 h-4 rounded-full bg-black flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                {{ $label }}
                            </span>
                            <span class="text-xs lg:text-sm font-medium text-gray-400 line-through">{{ $price }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-3 pt-3 border-t border-dashed border-gray-200 flex justify-between items-center">
                        <span class="text-xs lg:text-sm text-gray-500">Total Value</span>
                        <span class="text-xs lg:text-sm font-semibold text-gray-400 line-through">₹999</span>
                    </div>
                    <div class="mt-1.5 flex justify-between items-center">
                        <span class="text-sm lg:text-base font-bold text-gray-900">You Pay Today</span>
                        <span class="text-xl lg:text-2xl font-bold text-gray-900">₹49</span>
                    </div>
                </div>

                {{-- Divider (desktop only) --}}
                <div class="hidden lg:block border-t border-gray-200"></div>

                {{-- Trainer (desktop only) --}}
                <div class="hidden lg:flex items-center gap-4">
                    <img src="{{ asset('image/astrology%20assests/laxmi%20mam.png') }}"
                         alt="Miss. Laxmi"
                         class="w-16 h-16 rounded-full object-cover object-top shrink-0 border border-gray-200">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                        <h3 class="text-sm font-bold text-gray-900">Miss. Laxmi</h3>
                        <p class="text-xs text-gray-500">Astrologer · All India Institute of Occult Science</p>
                        <p class="text-xs text-gray-400 mt-1">B.Tech + Master's in Astrology — Vedic wisdom meets analytical thinking.</p>
                    </div>
                </div>

                {{-- Social proof (desktop only) --}}
                <div class="hidden lg:flex items-center gap-3">
                    <div class="flex -space-x-2">
                        @foreach(['alumni%201.jpg','alumni%202.jpg','alumni%203.jpg','alumni%204.jpg'] as $a)
                        <img src="{{ asset('image/astrology%20assests/'.$a) }}"
                             class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500">
                        <span class="font-bold text-gray-800">18,000+ alumni</span> have trained with us
                    </p>
                </div>

            </div>

            {{-- ===== RIGHT COLUMN — FORM ===== --}}
            <div>
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    {{-- Form header --}}
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-center gap-2">
                        <span class="text-sm font-semibold text-gray-600">⚡ Offer closes in</span>
                        <div class="flex items-center gap-1">
                            <div class="bg-gray-900 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-hours" class="text-white font-bold text-sm tabular-nums">06</span>
                            </div>
                            <span class="text-gray-500 font-bold text-sm">:</span>
                            <div class="bg-gray-900 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-mins" class="text-white font-bold text-sm tabular-nums">00</span>
                            </div>
                            <span class="text-gray-500 font-bold text-sm">:</span>
                            <div class="bg-gray-900 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-secs" class="text-white font-bold text-sm tabular-nums">00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Iframe — tall enough to show form fully, auto-grows via postMessage --}}
                    <iframe
                        id="zoho-form-iframe"
                        aria-label="Mega Astrology Webinar - Less than 10 seats left!!"
                        src="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/AstrologyWebinar/formperma/u5xhvCVVKohScA-mli9GWsWCKu3-geIGBrn83l2vn-Q"
                        frameborder="0"
                        scrolling="no"
                        allow="geolocation; microphone; camera; payment"
                        style="height:1100px; width:100%; border:none; display:block; overflow:hidden;"
                        title="Webinar Registration Form"
                        loading="eager"
                    ></iframe>

                    {{-- Trust badge --}}
                    <div class="px-6 py-3 border-t border-gray-100 flex items-center justify-center gap-2 text-xs text-gray-400">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        100% Secure · Powered by Zoho
                    </div>
                </div>
            </div>

        </div>

        {{-- Trainer + Alumni — mobile only, shown after the form --}}
        <div class="lg:hidden flex flex-col gap-5 mt-6">
            <div class="border-t border-gray-200"></div>
            <div class="flex items-center gap-4">
                <img src="{{ asset('image/astrology%20assests/laxmi%20mam.png') }}"
                     alt="Miss. Laxmi"
                     class="w-16 h-16 rounded-full object-cover object-top shrink-0 border border-gray-200">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                    <h3 class="text-sm font-bold text-gray-900">Miss. Laxmi</h3>
                    <p class="text-xs text-gray-500">Astrologer · All India Institute of Occult Science</p>
                    <p class="text-xs text-gray-400 mt-1">B.Tech + Master's in Astrology — Vedic wisdom meets analytical thinking.</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2">
                    @foreach(['alumni%201.jpg','alumni%202.jpg','alumni%203.jpg','alumni%204.jpg'] as $a)
                    <img src="{{ asset('image/astrology%20assests/'.$a) }}"
                         class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                    @endforeach
                </div>
                <p class="text-sm text-gray-500">
                    <span class="font-bold text-gray-800">18,000+ alumni</span> have trained with us
                </p>
            </div>
        </div>

    </div>
</div>

<script defer>
// Countdown timer — 6 hours
(function () {
    var TOTAL = 6 * 3600;
    var remaining = TOTAL;
    var elH = document.getElementById('co-hours');
    var elM = document.getElementById('co-mins');
    var elS = document.getElementById('co-secs');
    function pad(n) { return String(n).padStart(2, '0'); }
    function tick() {
        if (remaining <= 0) remaining = TOTAL;
        elH.textContent = pad(Math.floor(remaining / 3600));
        elM.textContent = pad(Math.floor((remaining % 3600) / 60));
        elS.textContent = pad(remaining % 60);
        remaining--;
    }
    tick();
    setInterval(tick, 1000);
})();

(function () {
    var iframe = document.getElementById('zoho-form-iframe');
    var THANK_YOU_URL = '{{ url("/astrology-thankyou") }}';
    var redirected = false;

    function doRedirect() {
        if (redirected) return;
        redirected = true;
        window.location.href = THANK_YOU_URL;
    }

    // Auto-resize iframe to full form height (no internal scroll)
    window.addEventListener('message', function (e) {
        if (!e.data) return;

        if (typeof e.data === 'object') {
            var d = e.data;
            if (d.action === 'setHeight' && d.height) {
                iframe.style.height = (parseInt(d.height, 10) + 40) + 'px';
            }
            if (
                d.type === 'zoho_form_submitted' ||
                d.action === 'zf_submitted' ||
                d.action === 'submitComplete' ||
                d.zf_event === 'formSubmit'
            ) { doRedirect(); }
        }

        if (typeof e.data === 'string') {
            var parts = e.data.split('|');
            if (parts[0] === 'zf-iframeResize' && parts[2]) {
                iframe.style.height = (parseInt(parts[2], 10) + 40) + 'px';
            }
            if (!isNaN(parseInt(e.data, 10)) && parts.length === 1) {
                iframe.style.height = (parseInt(e.data, 10) + 40) + 'px';
            }
            if (
                e.data === 'zf_submitted' ||
                e.data.indexOf('zf_submitted') !== -1 ||
                e.data.indexOf('submitComplete') !== -1 ||
                e.data.indexOf('formSubmit') !== -1
            ) { doRedirect(); }
        }
    }, false);

    var poll = setInterval(function () {
        try {
            var href = iframe.contentWindow.location.href;
            if (!href || href === 'about:blank') return;
            if (
                href.indexOf('zohopublic') === -1 ||
                href.indexOf('thankyou') !== -1 ||
                href.indexOf('thank-you') !== -1 ||
                href.indexOf('success') !== -1
            ) {
                clearInterval(poll);
                doRedirect();
            }
        } catch (e) {}
    }, 800);

    setTimeout(function () { clearInterval(poll); }, 30 * 60 * 1000);
})();
</script>

@endsection
