@extends('layouts.app')

@section('title', 'Thank You - Registration Complete')
@section('description', 'Your webinar registration is complete.')

@section('content')
<script>
    (function () {
        var THANK_YOU_URL = '{{ url("/graphology-thankyou") }}';

        // Method 1 — postMessage: signal the parent checkout page
        if (window.parent && window.parent !== window) {
            try {
                window.parent.postMessage({ type: 'zoho_form_submitted' }, '*');
            } catch (e) {}
        }

        // Method 2 — window.top: directly navigate the top frame
        if (window.self !== window.top) {
            try {
                window.top.location.href = THANK_YOU_URL;
            } catch (e) {}
        }
    })();
</script>
{{-- Top cream bar --}}
<div class="w-full h-[24px] bg-accent-cream"></div>

<section class="min-h-screen bg-neutral-b text-white flex items-center justify-center py-16 md:py-24">
    <div class="max-w-[620px] mx-auto section-px text-center flex flex-col items-center gap-6">

        {{-- Checkmark icon --}}
        <div class="w-20 h-20 rounded-full bg-accent-gold/20 flex items-center justify-center shrink-0">
            <svg class="w-10 h-10 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        {{-- Heading --}}
        <h1 class="text-hero font-bold text-button-gradient uppercase tracking-wide leading-tight">Thank You!</h1>
        <img src="{{ asset('images/graphology image/underline 9.svg') }}" alt="" class="w-[157px] h-[14px]" aria-hidden="true">

        {{-- Confirmation message --}}
        <p class="text-subheading font-semibold text-accent-gold-light">
            Your seat has been reserved for the Mega Graphology Webinar!
        </p>
        <p class="text-content text-neutral-h leading-relaxed tracking-[0.48px]">
            We have received your registration. Check your email for the webinar details and joining link.
            In the meantime, join our WhatsApp community to get updates, resources, and connect with fellow participants.
        </p>

        {{-- Divider --}}
        <div class="w-full border-t border-white/10"></div>

        {{-- WhatsApp CTA --}}
        <div class="flex flex-col items-center gap-3 w-full">
            <p class="text-content font-semibold text-neutral-h uppercase tracking-[0.9px]"> Next Mandatory Step</p>
            <a href="https://chat.whatsapp.com/F0VdT9ljhv2BbHsWJmbq3c" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#1ebe5d] text-white font-bold text-base md:text-lg px-8 py-4 rounded-10 transition-colors duration-200 w-full sm:w-auto">
                {{-- WhatsApp icon --}}
                <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Join Our WhatsApp Community
            </a>
            <p class="text-xs text-neutral-e">Get webinar updates, study material &amp; community support</p>
        </div>

        {{-- Divider --}}
        <div class="w-full border-t border-white/10"></div>

        {{-- Back to home --}}
        <x-ui.button href="/" variant="primary" class="!min-w-0">
            Back to Home
        </x-ui.button>

    </div>
</section>
@endsection
