@extends('layouts.app')

@section('title', 'You\'re Registered! – Mega Astrology Webinar')
@section('description', 'Your seat has been reserved for the Mega Astrology Webinar by All India Institute of Occult Science.')

@section('content')
<script>
(function () {
    if (window.parent && window.parent !== window) {
        try { window.parent.postMessage({ type: 'zoho_form_submitted' }, '*'); } catch (e) {}
    }
    if (window.self !== window.top) {
        try { window.top.location.href = '{{ url("/astrology-thankyou") }}'; } catch (e) {}
    }
})();
</script>

<style>
@keyframes twinkle {
    0%, 100% { opacity: 0.2; transform: scale(0.8); }
    50%       { opacity: 1;   transform: scale(1.2); }
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-12px); }
}
@keyframes pulse-ring {
    0%   { transform: scale(0.9); opacity: 1; }
    70%  { transform: scale(1.35); opacity: 0; }
    100% { transform: scale(0.9); opacity: 0; }
}
@keyframes pop-in {
    0%   { transform: scale(0.6); opacity: 0; }
    70%  { transform: scale(1.08); }
    100% { transform: scale(1); opacity: 1; }
}
.star-twinkle { animation: twinkle var(--dur, 2s) ease-in-out infinite; }
.check-float  { animation: float 4s ease-in-out infinite; }
.pulse-ring   { animation: pulse-ring 2s ease-out infinite; }
.pop-in       { animation: pop-in 0.6s cubic-bezier(0.22,1,0.36,1) both; }

.step-card {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 16px;
    padding: 24px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    text-align: center;
    transition: background 0.2s;
}
.step-card:hover { background: rgba(255,255,255,0.1); }
</style>

<div class="min-h-screen relative overflow-hidden bg-astro-hero-gradient">

    {{-- Decorative stars --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden">
        <div class="absolute star-twinkle" style="top:8%;left:6%;--dur:0.6s"><svg width="14" height="14" viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:15%;left:22%;--dur:1.2s"><svg width="8"  height="8"  viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:5%;left:50%;--dur:0.9s"><svg width="10" height="10" viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:12%;right:10%;--dur:1.5s"><svg width="12" height="12" viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:30%;right:4%;--dur:0.7s"><svg width="7"  height="7"  viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:55%;left:3%;--dur:1.1s"><svg width="9"  height="9"  viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:70%;right:6%;--dur:0.5s"><svg width="11" height="11" viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:80%;left:15%;--dur:1.3s"><svg width="8"  height="8"  viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:90%;right:20%;--dur:0.8s"><svg width="10" height="10" viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
        <div class="absolute star-twinkle" style="top:45%;left:88%;--dur:1.6s"><svg width="6"  height="6"  viewBox="0 0 24 24" fill="#f5c518"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg></div>
    </div>

    {{-- Header --}}
    <header class="w-full py-5 flex justify-center border-b border-white/10 relative z-10">
        <img src="{{ asset('image/astrology%20assests/logo%40300x%20%281%29.webp') }}"
             alt="All India Institute of Occult Science"
             class="h-14 w-auto object-contain">
    </header>

    {{-- Main content --}}
    <main class="relative z-10 max-w-[700px] mx-auto px-5 py-12 md:py-20 flex flex-col items-center gap-8 text-center text-white">

        {{-- Animated checkmark --}}
        <div class="check-float pop-in relative flex items-center justify-center">
            {{-- Pulse ring --}}
            <div class="pulse-ring absolute w-28 h-28 rounded-full" style="background:rgba(245,197,24,0.25);"></div>
            {{-- Gold circle --}}
            <div class="relative w-24 h-24 rounded-full flex items-center justify-center shadow-2xl"
                 style="background:linear-gradient(135deg,#f5c518 0%,#e6a800 100%);">
                <svg class="w-12 h-12" fill="none" stroke="#1a0533" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>

        {{-- Heading --}}
        <div class="flex flex-col items-center gap-2">
            <p class="text-xs font-bold uppercase tracking-[3px] text-accent-gold opacity-80">Registration Confirmed</p>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight" style="background:linear-gradient(135deg,#fff 0%,#f5c518 60%,#fff 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                You're In!
            </h1>
            <img src="{{ asset('image/astrology%20assests/unerline%202%203.svg') }}"
                 alt="" class="w-36 h-auto mt-1" aria-hidden="true">
        </div>

        {{-- Confirmation text --}}
        <p class="text-base md:text-lg text-white/80 leading-relaxed max-w-[520px]">
            Your seat is <span class="text-accent-gold font-semibold">officially reserved</span> for the
            <strong class="text-white">Mega Astrology Webinar</strong>. Get ready to decode the universe!
        </p>

        {{-- Event details pill --}}
        <div class="flex flex-wrap justify-center gap-3 w-full">
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full border border-white/20 bg-white/5 text-sm font-semibold">
                <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                </svg>
                Sat, 18th April 2026
            </div>
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full border border-white/20 bg-white/5 text-sm font-semibold">
                <svg class="w-4 h-4 text-accent-gold shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm.5 5v5.25l4.5 2.67-.75 1.23L11 13V7h1.5z"/>
                </svg>
                4:00 PM – 7:00 PM IST
            </div>
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full border border-white/20 bg-white/5 text-sm font-semibold">
                <svg class="w-4 h-4 text-accent-gold shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.87v6.26a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                </svg>
                Live on Zoom / WhatsApp
            </div>
        </div>

        {{-- Divider --}}
        <div class="w-full flex items-center gap-4">
            <div class="flex-1 border-t border-white/10"></div>
            <span class="text-white/30 text-xs uppercase tracking-widest shrink-0">Your Next Steps</span>
            <div class="flex-1 border-t border-white/10"></div>
        </div>

        {{-- 3 Steps --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">

            {{-- Step 1 --}}
            <div class="step-card">
                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                     style="background:rgba(94,53,146,0.5);border:1.5px solid rgba(245,197,24,0.4);">
                    <svg class="w-6 h-6 text-accent-gold" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-accent-gold font-bold text-sm uppercase tracking-wider mb-1">Step 1</p>
                    <p class="text-white font-semibold text-sm">Check Your Email</p>
                    <p class="text-white/50 text-xs mt-1 leading-relaxed">Webinar link & joining instructions sent to your inbox</p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="step-card" style="border-color:rgba(37,211,102,0.3);background:rgba(37,211,102,0.08);">
                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                     style="background:rgba(37,211,102,0.2);border:1.5px solid rgba(37,211,102,0.5);">
                    <svg class="w-6 h-6" fill="#25D366" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm uppercase tracking-wider mb-1" style="color:#25D366;">Step 2</p>
                    <p class="text-white font-semibold text-sm">Join WhatsApp Group</p>
                    <p class="text-white/50 text-xs mt-1 leading-relaxed">Get live updates, reminders & study material</p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="step-card">
                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                     style="background:rgba(245,197,24,0.15);border:1.5px solid rgba(245,197,24,0.4);">
                    <svg class="w-6 h-6 text-accent-gold" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-accent-gold font-bold text-sm uppercase tracking-wider mb-1">Step 3</p>
                    <p class="text-white font-semibold text-sm">Attend Live on Apr 18</p>
                    <p class="text-white/50 text-xs mt-1 leading-relaxed">Show up at 4 PM sharp and unlock your cosmic blueprint</p>
                </div>
            </div>

        </div>

        {{-- WhatsApp CTA (Primary Action) --}}
        <div class="flex flex-col items-center gap-3 w-full">
            <p class="text-xs font-bold uppercase tracking-[2.5px] text-white/50">Mandatory — Don't Skip This Step</p>
            <a href="https://chat.whatsapp.com/BhTfKJeONzQ64s8WCFZfg2"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center justify-center gap-3 text-white font-bold text-base md:text-lg px-8 py-4 rounded-xl transition-all duration-200 hover:opacity-90 active:scale-95 shadow-xl w-full sm:w-auto"
               style="background:linear-gradient(135deg,#25D366 0%,#1aad52 100%);">
                <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Join Our WhatsApp Community
            </a>
            <p class="text-xs text-white/40">Webinar updates, study material &amp; exclusive content</p>
        </div>

        {{-- Social proof --}}
        <div class="flex flex-col items-center gap-3 pt-2">
            <div class="flex -space-x-3">
                @foreach(['alumni%201.jpg','alumni%202.jpg','alumni%203.jpg','alumni%204.jpg'] as $a)
                <img src="{{ asset('image/astrology%20assests/'.$a) }}"
                     class="w-10 h-10 rounded-full border-2 object-cover"
                     style="border-color:rgba(245,197,24,0.5);"
                     alt="alumni">
                @endforeach
            </div>
            <p class="text-white/50 text-sm">Join <span class="text-white font-semibold">18,000+ alumni</span> who've already transformed their lives</p>
            <div class="flex gap-1">
                @for($i=0;$i<5;$i++)
                <svg class="w-4 h-4" fill="#f5c518" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.49 8.719c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/>
                </svg>
                @endfor
                <span class="text-white/40 text-xs ml-1 self-center">4.5/5 rating</span>
            </div>
        </div>

        {{-- Divider --}}
        <div class="w-full border-t border-white/10"></div>

        {{-- Back to home --}}
        <a href="/"
           class="text-white/40 hover:text-white/70 text-sm transition-colors duration-200 flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Home
        </a>

    </main>

    {{-- Footer --}}
    <footer class="relative z-10 w-full py-5 text-center text-white/20 text-xs border-t border-white/10">
        © {{ date('Y') }} All India Institute of Occult Science. All rights reserved.
    </footer>

</div>
@endsection
