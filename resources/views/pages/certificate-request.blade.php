@extends('layouts.app')

@section('title', 'Student Review - All India Institute of Occult Science')
@section('description', 'Submit your review and contact details.')

@section('content')
<main class="min-h-screen bg-[#f8f2ea] px-4 py-8 text-slate-950 sm:py-12">
    <section class="mx-auto w-full max-w-6xl overflow-hidden rounded-[24px] border border-[#eadbc5] bg-white shadow-[0_28px_80px_rgba(62,39,20,0.13)]">
        <div class="grid lg:grid-cols-[0.9fr_1.1fr]">
            <aside class="relative px-6 py-8 text-white sm:px-8 lg:min-h-[680px] lg:px-10 lg:py-10" style="background:#2c1712;">
                <div class="absolute inset-0 opacity-30" style="background-image: linear-gradient(135deg, rgba(245,158,11,.35), transparent 42%), linear-gradient(315deg, rgba(139,0,0,.55), transparent 48%);"></div>

                <div class="relative flex h-full flex-col justify-between gap-10">
                    <div>
                        <img src="{{ asset('image/graphology assests/company-logo.png') }}" alt="All India Institute of Occult Science" class="h-14 w-auto rounded-md bg-white p-2 sm:h-16">
                        <p class="mt-9 text-xs font-extrabold uppercase tracking-[0.24em] text-[#f8c784]">Graphology Webinar</p>
                        <h1 class="mt-4 max-w-md text-3xl font-black leading-tight text-white sm:text-4xl lg:text-5xl">Submit your review</h1>
                        <p class="mt-5 max-w-md text-sm leading-7 text-white">Use the same name and email that should appear on your certificate. After admin approval, your certificate and webinar notes will be sent to your email.</p>
                    </div>

                    <div class="grid gap-3 text-sm text-white">
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#f8c784] text-[#2c1712]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>Review is checked by admin before sending.</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#f8c784] text-[#2c1712]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7l8 6 8-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <span>Certificate and notes arrive on the submitted email.</span>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="px-5 py-7 sm:px-8 sm:py-10 lg:px-12 lg:py-12">
                <div class="mb-8">
                    <p class="text-xs font-extrabold uppercase tracking-[0.22em] text-[#8B0000]">Student Details</p>
                    <h2 class="mt-3 text-2xl font-black leading-tight text-slate-950 sm:text-3xl">Graphology review form</h2>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-500">Fill this form carefully. The certificate name and email will be taken from these details.</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 flex gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('certificate-request.store') }}"
                    class="space-y-5"
                    onsubmit="this.querySelector('[data-submit-text]').classList.add('hidden'); this.querySelector('[data-loading-text]').classList.remove('hidden'); this.querySelector('[data-loading-text]').classList.add('flex'); this.querySelector('button[type=submit]').disabled = true;">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-extrabold text-slate-800">Full Name</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#8B0000] focus:ring-4 focus:ring-[#8B0000]/10"
                            placeholder="Enter name for certificate">
                        @error('name')
                            <p class="mt-1.5 text-xs font-bold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="email" class="mb-2 block text-sm font-extrabold text-slate-800">Email Address</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#8B0000] focus:ring-4 focus:ring-[#8B0000]/10"
                                placeholder="you@example.com">
                            @error('email')
                                <p class="mt-1.5 text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="mb-2 block text-sm font-extrabold text-slate-800">Phone Number</label>
                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                value="{{ old('phone') }}"
                                required
                                autocomplete="tel"
                                inputmode="tel"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#8B0000] focus:ring-4 focus:ring-[#8B0000]/10"
                                placeholder="Enter phone number">
                            @error('phone')
                                <p class="mt-1.5 text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="certificate_type" class="mb-2 block text-sm font-extrabold text-slate-800">Webinar Joined</label>
                        <select
                            id="certificate_type"
                            name="certificate_type"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base font-semibold text-slate-950 shadow-sm outline-none transition focus:border-[#8B0000] focus:ring-4 focus:ring-[#8B0000]/10">
                            @foreach($certificateTypes as $value => $label)
                                <option value="{{ $value }}" {{ old('certificate_type', 'graphology') === $value ? 'selected' : '' }}>{{ $label }} Webinar</option>
                            @endforeach
                        </select>
                        @error('certificate_type')
                            <p class="mt-1.5 text-xs font-bold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="review_text" class="mb-2 block text-sm font-extrabold text-slate-800">Your Review</label>
                        <textarea
                            id="review_text"
                            name="review_text"
                            required
                            rows="6"
                            class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base leading-7 text-slate-950 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-[#8B0000] focus:ring-4 focus:ring-[#8B0000]/10"
                            placeholder="Write your experience with the graphology webinar">{{ old('review_text') }}</textarea>
                        @error('review_text')
                            <p class="mt-1.5 text-xs font-bold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="flex min-h-14 w-full items-center justify-center gap-2 rounded-xl bg-[#8B0000] px-5 py-4 text-base font-black text-white shadow-[0_16px_34px_rgba(139,0,0,0.28)] transition hover:bg-[#a40000] focus:outline-none focus:ring-4 focus:ring-[#8B0000]/20 active:scale-[0.99] disabled:cursor-not-allowed disabled:opacity-75">
                        <span data-submit-text class="flex items-center justify-center gap-2">
                            Submit Review
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.6" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6"/>
                            </svg>
                        </span>
                        <span data-loading-text class="hidden items-center justify-center gap-2">
                            <svg class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                            Submitting...
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
