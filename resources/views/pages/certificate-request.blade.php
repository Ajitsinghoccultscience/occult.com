@extends('layouts.app')

@section('title', 'Student Review - All India Institute of Occult Science')
@section('description', 'Submit your review and contact details.')

@section('content')
<main class="min-h-screen bg-[#f7f4ef] px-4 py-8 sm:py-12">
    <section class="mx-auto grid w-full max-w-5xl overflow-hidden rounded-[28px] border border-[#eadfce] bg-white shadow-[0_24px_70px_rgba(30,24,18,0.12)] lg:grid-cols-[0.92fr_1.08fr]">
        <div class="relative hidden bg-[#211a16] p-9 text-white lg:block">
            <div class="absolute inset-0 opacity-20" style="background-image:radial-gradient(circle at 20% 15%, #f59e0b 0, transparent 28%), radial-gradient(circle at 80% 70%, #f97316 0, transparent 26%);"></div>
            <div class="relative flex h-full flex-col justify-between">
                <div>
                    <img src="{{ asset('image/graphology assests/company-logo.png') }}" alt="All India Institute of Occult Science" class="h-16 w-auto rounded-md bg-white/95 p-2">
                    <p class="mt-8 text-sm font-bold uppercase tracking-[0.22em] text-orange-200">Student Review</p>
                    <h1 class="mt-4 max-w-sm text-4xl font-extrabold leading-tight">Share your learning experience</h1>
                    <p class="mt-4 max-w-sm text-sm leading-6 text-white/72">Submit your review with the same name and email where you want to receive your certificate after admin approval.</p>
                </div>

                <div class="rounded-2xl border border-white/15 bg-white/10 p-5 backdrop-blur">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-400 text-[#211a16]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7 3h10a2 2 0 012 2v14l-3-2-3 2-3-2-3 2V5a2 2 0 012-2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Reviewed by admin</p>
                            <p class="mt-1 text-xs text-white/60">Certificate is sent to the submitted email.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 sm:p-9 lg:p-10">
            <div class="mb-7 lg:hidden">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-orange-500">Student Review</p>
                <h1 class="mt-3 text-3xl font-extrabold leading-tight text-slate-950">Share your learning experience</h1>
                <p class="mt-3 text-sm leading-6 text-slate-500">Submit your review and our team will email the certificate after approval.</p>
            </div>

            <div class="mb-7 hidden lg:block">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-orange-500">Review Details</p>
                <h2 class="mt-3 text-3xl font-extrabold text-slate-950">Student review form</h2>
            </div>

            @if(session('success'))
                <div class="mb-6 flex gap-3 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('certificate-request.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="mb-2 block text-sm font-bold text-slate-800">Full Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-base text-slate-950 outline-none transition focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-100"
                        placeholder="Enter name for certificate">
                    @error('name')
                        <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-bold text-slate-800">Email Address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-base text-slate-950 outline-none transition focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-100"
                            placeholder="you@example.com">
                        @error('email')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="mb-2 block text-sm font-bold text-slate-800">Phone Number</label>
                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            value="{{ old('phone') }}"
                            required
                            autocomplete="tel"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-base text-slate-950 outline-none transition focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-100"
                            placeholder="Enter phone number">
                        @error('phone')
                            <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="certificate_type" class="mb-2 block text-sm font-bold text-slate-800">Which Webinar Did You Join?</label>
                    <select
                        id="certificate_type"
                        name="certificate_type"
                        required
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-base text-slate-950 outline-none transition focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-100">
                        @foreach($certificateTypes as $value => $label)
                            <option value="{{ $value }}" {{ old('certificate_type', 'graphology') === $value ? 'selected' : '' }}>{{ $label }} Webinar</option>
                        @endforeach
                    </select>
                    @error('certificate_type')
                        <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="review_text" class="mb-2 block text-sm font-bold text-slate-800">Your Review</label>
                    <textarea
                        id="review_text"
                        name="review_text"
                        required
                        rows="5"
                        class="w-full resize-y rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-base text-slate-950 outline-none transition focus:border-orange-400 focus:bg-white focus:ring-4 focus:ring-orange-100"
                        placeholder="Write your experience with the session">{{ old('review_text') }}</textarea>
                    @error('review_text')
                        <p class="mt-1.5 text-xs font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#8B0000] px-5 py-4 text-base font-extrabold text-white shadow-[0_12px_26px_rgba(139,0,0,0.28)] ring-2 ring-[#8B0000]/10 transition hover:bg-[#a40000] active:scale-[0.99]">
                    Submit Review
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6l6 6-6 6"/>
                    </svg>
                </button>
            </form>
        </div>
    </section>
</main>
@endsection
