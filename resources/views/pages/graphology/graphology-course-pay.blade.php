@extends('layouts.app')

@section('title', 'Graphology Course – All India Institute of Occult Science')
@section('description', 'Enroll in the Graphology Certificate Course by All India Institute of Occult Science. Learn to decode personalities through handwriting. Limited seats — offer ends soon.')

@push('head')
    <style>
        /* Ticket-style zigzag edges for the bonus banner */
        .gcp-zigzag {
            --z: 18px; /* zigzag width  */
            --h: 9px;  /* zigzag height */
            -webkit-mask:
                conic-gradient(from -45deg at bottom, #0000, #000 1deg 89deg, #0000 90deg) top/var(--z) var(--h) repeat-x,
                conic-gradient(from 135deg at top,    #0000, #000 1deg 89deg, #0000 90deg) bottom/var(--z) var(--h) repeat-x,
                linear-gradient(#000, #000) center/100% calc(100% - 2 * var(--h)) no-repeat;
            mask:
                conic-gradient(from -45deg at bottom, #0000, #000 1deg 89deg, #0000 90deg) top/var(--z) var(--h) repeat-x,
                conic-gradient(from 135deg at top,    #0000, #000 1deg 89deg, #0000 90deg) bottom/var(--z) var(--h) repeat-x,
                linear-gradient(#000, #000) center/100% calc(100% - 2 * var(--h)) no-repeat;
        }
        .gcp-flip {
            font-variant-numeric: tabular-nums;
            box-shadow: 0 4px 10px rgba(92, 20, 20, .25);
        }
    </style>
@endpush

@section('content')
@php
    $maroon      = '#5C1414';
    $logo        = 'image/compressed-images/logo300x111-removebg-preview.webp';
    $facultyPhotos = [
        ['src' => 'image/astrology assests/astro-webp/convo 4.webp', 'caption' => 'Our Faculty at Convocation 2025'],
        ['src' => 'image/astrology assests/astro-webp/convo 1.webp', 'caption' => 'Convocation 2025'],
    ];
    $mediaLogos  = [
        ['file' => 'images/media/Zee_news.svg 1.webp',                       'alt' => 'Zee News'],
        ['file' => 'images/media/logo_daily_hunt 1.webp',                    'alt' => 'Dailyhunt'],
        ['file' => 'images/media/The_Times_of_India_Logo 1.webp',            'alt' => 'Times of India'],
        ['file' => 'images/media/india.webp',                                'alt' => 'india.com'],
        ['file' => 'images/media/TV9TeluguLogo-removebg-preview 1.webp',     'alt' => 'TV9'],
        ['file' => 'images/media/Zee_Kannada_News 1.webp',                   'alt' => 'Zee Kannada News'],
    ];
    $features = [
        'Analysis of various signature styles.',
        "Able to predict someone's personality by their handwriting",
        'Suggest the right changes in their writing and signature for improvements.',
        'Tell if someone is faking their inner and outer personality.',
    ];
@endphp

<div class="min-h-screen bg-white overflow-x-clip">
    <div class="mx-auto max-w-[1600px] grid grid-cols-1 lg:grid-cols-2">

        {{-- ============================ LEFT COLUMN ============================ --}}
        <div class="min-w-0 px-5 sm:px-6 lg:px-8 py-6 lg:py-8">

            {{-- Logo --}}
            <img src="{{ asset($logo) }}" alt="All India Institute of Occult Science"
                 class="h-11 sm:h-12 w-auto object-contain mb-4">

            {{-- Title --}}
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Graphology Course</h1>
            <p class="mt-2 text-base sm:text-lg text-gray-400">Organised by All India Institute of Occult Science</p>

            {{-- Faculty photos --}}
            <div class="mt-4 grid grid-cols-2 gap-3 max-w-md">
                @foreach ($facultyPhotos as $photo)
                    <div class="relative rounded-xl overflow-hidden aspect-[4/3] bg-gray-100">
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $photo['src'])))) }}"
                             alt="{{ $photo['caption'] }}"
                             class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        <span class="absolute inset-x-0 bottom-0 bg-black/45 px-3 py-1.5 text-white text-xs font-semibold">{{ $photo['caption'] }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Featured-in media strip --}}
            <div class="mt-4 rounded-xl border border-gray-200 px-4 py-2.5">
                <div class="flex items-center justify-center sm:justify-between gap-x-4 gap-y-2 flex-wrap">
                    @foreach ($mediaLogos as $m)
                        <img src="{{ asset($m['file']) }}" alt="{{ $m['alt'] }}"
                             class="h-5 sm:h-6 w-auto max-w-[70px] object-contain" loading="lazy">
                    @endforeach
                </div>
            </div>

            {{-- Feature checklist --}}
            <ul class="mt-4 space-y-3">
                @foreach ($features as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 shrink-0 text-gray-900 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="9"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.5 12 2.5 2.5 4.5-5"/>
                        </svg>
                        <span class="text-gray-800 text-base leading-snug">{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>

            {{-- Rating --}}
            <div class="mt-4">
                <div class="flex items-center gap-1 text-[#F5A623]">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.28 3.94a1 1 0 0 0 .95.69h4.15c.97 0 1.37 1.24.59 1.81l-3.36 2.44a1 1 0 0 0-.36 1.12l1.28 3.94c.3.92-.75 1.69-1.54 1.12l-3.35-2.44a1 1 0 0 0-1.18 0l-3.35 2.44c-.79.57-1.84-.2-1.54-1.12l1.28-3.94a1 1 0 0 0-.36-1.12L2.33 9.37c-.78-.57-.38-1.81.59-1.81h4.15a1 1 0 0 0 .95-.69L9.05 2.93Z"/>
                        </svg>
                    @endfor
                </div>
                <p class="mt-2 text-sm font-semibold text-gray-800">1k+ reviews <span class="font-normal text-gray-500">(4.8 of 5)</span></p>
            </div>

            <hr class="my-5 border-gray-200">

            {{-- Offer expires (left) --}}
            <div>
                <p class="text-lg font-bold text-gray-900 mb-3">Offer Expires In :</p>
                <div class="flex items-center gap-2" data-gcp-flip>
                    <div class="gcp-flip rounded-md text-white text-2xl font-bold px-4 py-2.5 min-w-[56px] text-center" style="background:{{ $maroon }}">
                        <span data-gcp-hours>00</span>
                    </div>
                    <span class="text-2xl font-bold" style="color:{{ $maroon }}">:</span>
                    <div class="gcp-flip rounded-md text-white text-2xl font-bold px-4 py-2.5 min-w-[56px] text-center" style="background:{{ $maroon }}">
                        <span data-gcp-mins>44</span>
                    </div>
                    <span class="text-2xl font-bold" style="color:{{ $maroon }}">:</span>
                    <div class="gcp-flip rounded-md text-white text-2xl font-bold px-4 py-2.5 min-w-[56px] text-center" style="background:{{ $maroon }}">
                        <span data-gcp-secs>28</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================ RIGHT COLUMN ============================ --}}
        <div class="min-w-0 px-5 sm:px-6 lg:px-8 py-6 lg:py-8 bg-gray-50 lg:bg-white border-t lg:border-t-0 lg:border-l border-gray-100">

            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Complete your purchase by providing your payment details</h2>

            <form action="#" method="POST" class="mt-5" onsubmit="return false;">
                @csrf

                {{-- Billing card --}}
                <div class="rounded-2xl border border-gray-200 shadow-sm bg-white p-4 sm:p-5">
                    <h3 class="text-base font-bold text-gray-900 mb-3">Billing Information</h3>

                    <div class="rounded-xl border border-gray-200 divide-y divide-gray-200 overflow-hidden">
                        <input type="text" name="name" placeholder="Name"
                               class="w-full px-4 py-3.5 text-[15px] text-gray-700 placeholder-gray-400 focus:outline-none focus:bg-gray-50">
                        <input type="email" name="email" placeholder="Email"
                               class="w-full px-4 py-3.5 text-[15px] text-gray-700 placeholder-gray-400 focus:outline-none focus:bg-gray-50">
                        <div class="flex items-stretch">
                            <span class="flex items-center gap-2 px-4 py-3.5 text-[15px] text-gray-700 border-r border-gray-200 shrink-0">
                                <svg class="w-6 h-4 rounded-sm ring-1 ring-gray-200 shrink-0" viewBox="0 0 9 6" aria-hidden="true">
                                    <rect width="9" height="2" y="0" fill="#FF9933"/>
                                    <rect width="9" height="2" y="2" fill="#FFFFFF"/>
                                    <rect width="9" height="2" y="4" fill="#138808"/>
                                    <circle cx="4.5" cy="3" r="0.7" fill="none" stroke="#0a3d91" stroke-width="0.18"/>
                                </svg> +91
                            </span>
                            <input type="tel" name="phone" placeholder="Phone No." inputmode="numeric"
                                   class="w-full px-4 py-3.5 text-[15px] text-gray-700 placeholder-gray-400 focus:outline-none focus:bg-gray-50">
                        </div>
                        <div class="relative">
                            <select name="course"
                                    class="w-full appearance-none px-4 py-3.5 text-[15px] text-gray-400 bg-white focus:outline-none focus:bg-gray-50">
                                <option value="" selected disabled>Choose Your Course</option>
                                <option value="live-class" class="text-gray-800">Live Class</option>
                                <option value="recorded-class" class="text-gray-800">Recorded Class</option>
                            </select>
                            <svg class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Fee options --}}
                <div class="mt-4 rounded-xl border border-gray-200 bg-gray-50 divide-y divide-gray-200 overflow-hidden">
                    <label class="flex items-center justify-between gap-4 px-5 py-3.5 cursor-pointer">
                        <span class="text-base font-medium text-gray-900">Registration Fee</span>
                        <span class="flex items-center gap-3">
                            <span class="text-base font-semibold text-gray-900">₹2999</span>
                            <input type="radio" name="fee" value="2999"
                                   class="w-5 h-5 accent-[#5C1414] cursor-pointer">
                        </span>
                    </label>
                    <label class="flex items-center justify-between gap-4 px-5 py-3.5 cursor-pointer">
                        <span class="text-base font-medium text-gray-900">Full Course Fee</span>
                        <span class="flex items-center gap-3">
                            <span class="text-base font-semibold text-gray-900">₹7999</span>
                            <input type="radio" name="fee" value="7999"
                                   class="w-5 h-5 accent-[#5C1414] cursor-pointer">
                        </span>
                    </label>
                </div>

                {{-- Amount to be paid --}}
                <div class="mt-4 rounded-xl border border-gray-200 bg-white px-5 py-4 flex items-center justify-between">
                    <span class="text-base sm:text-lg font-bold text-gray-900">Amount to be Paid</span>
                    <span class="flex items-baseline gap-2">
                        <span class="text-gray-400 line-through text-sm sm:text-base">₹1,96000</span>
                        <span class="text-xl sm:text-2xl font-extrabold text-gray-900">₹77,000</span>
                    </span>
                </div>

                {{-- Offer countdown + seats --}}
                <div class="mt-4 flex flex-wrap items-center gap-x-2 gap-y-1">
                    <svg class="w-6 h-6 text-gray-800 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                    </svg>
                    <span class="text-base font-semibold text-gray-900">Offer Expires in</span>
                    <span class="text-base font-bold text-[#E8552B]" data-gcp-mmss>44 : 28</span>
                    <span class="text-base font-bold text-gray-900">(Only 18 Seats are Left)</span>
                </div>

                {{-- Bonus banner — acts as the submit button --}}
                <button type="submit"
                        class="mt-4 w-full text-white text-center py-6 px-4 bg-center bg-no-repeat bg-cover transition hover:opacity-95 active:scale-[.99] cursor-pointer"
                        style="background-image:url('{{ asset('image/news/rectangle_840x110.webp') }}')">
                    <span class="inline-flex items-center gap-3 text-2xl sm:text-3xl font-extrabold">
                        <span>🎁</span> Bonus Worth ₹9,999
                    </span>
                </button>

                {{-- Note --}}
                <p class="mt-4 text-sm text-gray-700 leading-relaxed">
                    (<span class="font-bold">Note :</span> Bonus worth ₹9,999 will no longer be available and price increases to
                    <span class="font-semibold">₹1,96,000</span> after the timer ends.)
                </p>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script defer>
(function () {
    // 44 min 28 sec urgency countdown, persisted per-browser
    var KEY = 'graphology_course_pay_timer_end';
    var DURATION = (44 * 60 + 28) * 1000;
    var now = Date.now();
    var end = parseInt(localStorage.getItem(KEY), 10);
    if (!end || end <= now) { end = now + DURATION; localStorage.setItem(KEY, end); }

    var hEl  = document.querySelector('[data-gcp-hours]');
    var mEl  = document.querySelector('[data-gcp-mins]');
    var sEl  = document.querySelector('[data-gcp-secs]');
    var mmss = document.querySelector('[data-gcp-mmss]');

    function pad(n) { return String(n).padStart(2, '0'); }

    function tick() {
        var rem = Math.max(0, Math.floor((end - Date.now()) / 1000));
        if (rem <= 0) { end = Date.now() + DURATION; localStorage.setItem(KEY, end); rem = DURATION / 1000; }
        var h = Math.floor(rem / 3600);
        var m = Math.floor((rem % 3600) / 60);
        var s = rem % 60;
        if (hEl) hEl.textContent = pad(h);
        if (mEl) mEl.textContent = pad(m);
        if (sEl) sEl.textContent = pad(s);
        if (mmss) mmss.textContent = pad(m) + ' : ' + pad(s);
    }
    tick();
    setInterval(tick, 1000);
})();
</script>
@endpush
@endsection
