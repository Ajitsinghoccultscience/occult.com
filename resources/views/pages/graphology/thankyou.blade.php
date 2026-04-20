@extends('layouts.app')

@section('title', 'You\'re Registered! – Mega Graphology Webinar')
@section('description', 'Your seat has been reserved for the Mega Graphology Webinar by All India Institute of Occult Science.')

@section('content')
<script>
(function () {
    if (window.parent && window.parent !== window) {
        try { window.parent.postMessage({ type: 'zoho_form_submitted' }, '*'); } catch (e) {}
    }
    if (window.self !== window.top) {
        try { window.top.location.href = '{{ url("/graphology-thankyou") }}'; } catch (e) {}
    }
})();
</script>

<style>
@keyframes pop-in {
    0%   { transform: scale(0.5); opacity: 0; }
    70%  { transform: scale(1.1); }
    100% { transform: scale(1);   opacity: 1; }
}
@keyframes pulse-ring {
    0%   { transform: scale(1);    opacity: 0.6; }
    100% { transform: scale(1.5);  opacity: 0; }
}
.pop-in      { animation: pop-in 0.55s cubic-bezier(0.22,1,0.36,1) both; }
.pulse-ring  { animation: pulse-ring 1.8s ease-out infinite; }
</style>

<div class="min-h-screen bg-white flex flex-col">

    {{-- Header --}}
    <header class="w-full py-4 border-b border-gray-100 flex justify-center">
        <img src="{{ asset('image/graphology assests/logo (2) 1.svg') }}"
             alt="All India Institute of Occult Science"
             class="h-14 w-auto object-contain">
    </header>

    {{-- Main --}}
    <main class="flex-1 flex items-center justify-center px-5 py-12 md:py-16">
        <div class="w-full max-w-[560px] flex flex-col items-center gap-8 text-center">

            {{-- Success checkmark --}}
            <div class="pop-in relative flex items-center justify-center">
                <div class="pulse-ring absolute w-24 h-24 rounded-full bg-green-100"></div>
                <div class="relative w-20 h-20 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            {{-- Heading --}}
            <div class="flex flex-col items-center gap-2">
                <p class="text-xs font-bold uppercase tracking-[3px] text-gray-400">Registration Confirmed</p>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900">You're In! </h1>
                <p class="text-base text-gray-500 mt-1">Your seat is reserved for the <span class="font-semibold text-gray-700">Mega Graphology Webinar</span></p>
            </div>

            {{-- Event pills --}}
            <div class="flex flex-wrap justify-center gap-3">
                <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-gray-50 border border-gray-200 text-sm font-medium text-gray-700">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                    Sun, 26 April 2026
                </div>
                <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-gray-50 border border-gray-200 text-sm font-medium text-gray-700">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm.5 5v5.25l4.5 2.67-.75 1.23L11 13V7h1.5z"/>
                    </svg>
                    1:00 PM – 3:00 PM IST
                </div>
            </div>

            <div class="w-full border-t border-gray-100"></div>

            {{-- Steps --}}
            <div class="w-full flex flex-col gap-4">

                {{-- Step 1 — Join WhatsApp (PRIMARY) --}}
                <div class="w-full rounded-2xl border-2 border-green-400 bg-green-50 p-5 flex flex-col items-center gap-4">
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center shrink-0 text-white font-bold text-sm">1</div>
                        <div class="text-left">
                            <p class="font-bold text-gray-900 text-base">Join Our WhatsApp Community</p>
                            <p class="text-sm text-gray-500 mt-0.5">You'll receive the webinar joining link inside the group</p>
                        </div>
                    </div>
                    <a href="https://chat.whatsapp.com/F0VdT9ljhv2BbHsWJmbq3c"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-3 w-full max-w-xs mx-auto py-4 rounded-xl font-bold text-white text-base transition-all duration-200 hover:opacity-90 active:scale-95 shadow-md"
                       style="background:#25D366;">
                        <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Join WhatsApp Community Now
                    </a>
                    <p class="text-xs text-green-700 font-medium">⚡ Webinar link will be shared in this group</p>
                </div>

                {{-- Step 2 — Attend --}}
                <div class="w-full rounded-2xl border border-gray-200 bg-gray-50 p-5 flex items-start gap-4 text-left">
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center shrink-0 text-gray-600 font-bold text-sm">2</div>
                    <div>
                        <p class="font-bold text-gray-900 text-base">Attend Live on April 26th</p>
                        <p class="text-sm text-gray-500 mt-0.5">Join at 1:00 PM IST and decode personalities through handwriting live</p>
                    </div>
                </div>

            </div>

            {{-- Social proof --}}
            <div class="flex flex-col items-center gap-2 pt-2">
                <div class="flex -space-x-2.5">
                    @foreach(['alumni 1.jpg','alumni 2.jpg','alumni 3.jpg','alumni 4.jpg'] as $a)
                    <img src="{{ asset('image/graphology assests/'.$a) }}"
                         class="w-9 h-9 rounded-full border-2 border-white object-cover shadow-sm" alt="">
                    @endforeach
                </div>
                <p class="text-sm text-gray-500">Joining <span class="font-semibold text-gray-800">18,000+ alumni</span> who've transformed with us</p>
                <div class="flex gap-0.5">
                    @for($i=0;$i<5;$i++)
                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                    <span class="text-gray-400 text-xs ml-1 self-center">4.5/5 (8912 ratings)</span>
                </div>
            </div>

            <div class="w-full border-t border-gray-100"></div>

            {{-- Back to home --}}
            <a href="/" class="text-gray-400 hover:text-gray-600 text-sm transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>

        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full py-4 text-center text-gray-300 text-xs border-t border-gray-100">
        © {{ date('Y') }} All India Institute of Occult Science. All rights reserved.
    </footer>

</div>
@endsection
