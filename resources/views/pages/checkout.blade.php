@extends('layouts.app')

@section('title', 'Register – ' . $config['webinar_name'])
@section('description', 'Reserve your seat for the ' . $config['webinar_name'] . ' by All India Institute of Occult Science.')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <header class="w-full bg-white border-b border-gray-200 py-3 px-5 flex items-center justify-between">
        <img src="{{ asset($config['logo']) }}"
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
                    <h1 class="text-lg lg:text-2xl font-bold text-gray-900 mb-1">{{ $config['webinar_name'] }}</h1>
                    <p class="text-xs lg:text-sm text-gray-500">{{ $config['event_date'] }} &nbsp;·&nbsp; {{ $config['event_time'] }}</p>
                </div>

                {{-- Divider (desktop only) --}}
                <div class="hidden lg:block border-t border-gray-200"></div>

                {{-- Trainer (desktop only) --}}
                <div class="hidden lg:flex items-center gap-4">
                    <img src="{{ asset($config['trainer_image']) }}"
                         alt="{{ $config['trainer'] }}"
                         class="w-16 h-16 rounded-full object-cover object-top shrink-0 border border-gray-200">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                        <h3 class="text-sm font-bold text-gray-900">{{ $config['trainer'] }}</h3>
                        <p class="text-xs text-gray-500">{{ $config['trainer_role'] }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $config['trainer_bio'] }}</p>
                    </div>
                </div>

                {{-- Social proof (desktop only) --}}
                <div class="hidden lg:flex items-center gap-3">
                    <div class="flex -space-x-2">
                        @foreach($config['alumni_files'] as $a)
                        <img src="{{ asset($config['alumni_path'] . $a) }}"
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
                                <span id="co-mins" class="text-white font-bold text-sm tabular-nums">45</span>
                            </div>
                            <span class="text-gray-500 font-bold text-sm">:</span>
                            <div class="bg-gray-900 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-secs" class="text-white font-bold text-sm tabular-nums">00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Iframe --}}
                    <iframe
                        id="zoho-form-iframe"
                        aria-label="{{ $config['webinar_name'] }}"
                        src="{{ $config['zoho_form'] }}"
                        frameborder="0"
                        scrolling="no"
                        allow="geolocation; microphone; camera; payment"
                        style="height:{{ $config['form_height'] }}; width:100%; border:none; display:block; overflow:hidden;"
                        class="md:!h-[1100px]"
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
                <img src="{{ asset($config['trainer_image']) }}"
                     alt="{{ $config['trainer'] }}"
                     class="w-16 h-16 rounded-full object-cover object-top shrink-0 border border-gray-200">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                    <h3 class="text-sm font-bold text-gray-900">{{ $config['trainer'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $config['trainer_role'] }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $config['trainer_bio'] }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2">
                    @foreach($config['alumni_files'] as $a)
                    <img src="{{ asset($config['alumni_path'] . $a) }}"
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
// Countdown timer — 45 min, persists across page refreshes via localStorage
(function () {
    var DURATION = 45 * 60 * 1000;
    var KEY = '{{ $config['timer_key'] }}';
    var now = Date.now();
    var end = parseInt(localStorage.getItem(KEY), 10);
    if (!end || end <= now) {
        end = now + DURATION;
        localStorage.setItem(KEY, end);
    }
    var elM = document.getElementById('co-mins');
    var elS = document.getElementById('co-secs');
    function pad(n) { return String(n).padStart(2, '0'); }
    function tick() {
        var remaining = Math.max(0, Math.floor((end - Date.now()) / 1000));
        if (remaining <= 0) {
            end = Date.now() + DURATION;
            localStorage.setItem(KEY, end);
            remaining = DURATION / 1000;
        }
        elM.textContent = pad(Math.floor(remaining / 60));
        elS.textContent = pad(remaining % 60);
    }
    tick();
    setInterval(tick, 1000);
})();

(function () {
    var iframe = document.getElementById('zoho-form-iframe');
    var THANK_YOU_URL = '{{ url("/thankyou?product=" . $product) }}';
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
