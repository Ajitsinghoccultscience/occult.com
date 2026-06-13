@extends('admin.layouts.app')

@section('title', 'My Landing Page')
@section('page-title', 'My Landing Page')
@section('page-subtitle', 'Set your astrology course price, discount and offer timer')

@section('content')

@if(session('success'))
<div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">{{ session('success') }}</div>
@endif

@php $url = $user->slug ? url('/astrology-course') . '?product=astrology&counsler=' . $user->slug : null; @endphp

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-100" style="background:linear-gradient(135deg,#fff,#fdf2f2);">
            <span class="w-11 h-11 rounded-full flex items-center justify-center text-white font-bold shrink-0"
                  style="background:linear-gradient(135deg,#8B0000,#c0392b);">{{ strtoupper(mb_substr($user->name, 0, 1)) }}</span>
            <div>
                <p class="text-sm font-bold text-slate-800">{{ $user->name }}</p>
                <p class="text-xs text-slate-400">Astrology Certificate Course</p>
            </div>
        </div>

        <div class="p-6">

            {{-- Shareable link --}}
            @if($url)
            <label class="block text-xs font-semibold text-slate-500 mb-1.5">Your page link</label>
            <div class="flex items-center gap-2 mb-6">
                <input id="my-url" type="text" readonly value="{{ $url }}"
                       class="flex-1 min-w-0 border border-gray-200 rounded-lg px-3 py-2 text-xs text-slate-500 bg-slate-50 truncate">
                <button type="button" onclick="copyMyUrl(this)"
                        class="text-xs font-semibold text-white px-3 py-2 rounded-lg hover:opacity-90 transition whitespace-nowrap inline-flex items-center gap-1.5"
                        style="background-color:#8B0000;">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <span class="copy-label">Copy</span>
                </button>
                <a href="{{ $url }}" target="_blank" rel="noopener"
                   class="text-xs font-semibold text-slate-600 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition whitespace-nowrap">Open</a>
            </div>
            @else
            <div class="mb-6 px-3 py-2 rounded-lg bg-amber-50 border border-amber-200 text-xs text-amber-700">
                Set a URL slug below and save to generate your shareable page link.
            </div>
            @endif

            {{-- Settings form --}}
            <form method="POST" action="{{ route('admin.landing.update') }}">
                @csrf @method('PUT')

                @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">URL slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $user->slug) }}" placeholder="reena"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
                        <p class="text-[10px] text-slate-400 mt-1">Lowercase, letters/numbers/dashes only.</p>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Offer timer</label>
                        <div class="relative">
                            <input type="number" name="lp_timer_minutes" value="{{ old('lp_timer_minutes', $user->lp_timer_minutes) }}" min="0" placeholder="30"
                                   class="w-full border border-gray-200 rounded-lg pl-3 pr-12 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">min</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">₹</span>
                            <input type="number" name="lp_price" value="{{ old('lp_price', $user->lp_price) }}" min="0" placeholder="96000"
                                   class="w-full border border-gray-200 rounded-lg pl-7 pr-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Old price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">₹</span>
                            <input type="number" name="lp_old_price" value="{{ old('lp_old_price', $user->lp_old_price) }}" min="0" placeholder="192000"
                                   class="w-full border border-gray-200 rounded-lg pl-7 pr-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Discount label</label>
                        <input type="text" name="lp_discount" value="{{ old('lp_discount', $user->lp_discount) }}" placeholder="50% OFF"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
                    </div>
                </div>

                <button type="submit"
                        class="mt-5 w-full text-white text-sm font-semibold py-3 rounded-xl hover:opacity-90 transition"
                        style="background:linear-gradient(135deg,#8B0000,#c0392b);box-shadow:0 4px 12px rgba(139,0,0,.2);">
                    Save my settings
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function copyMyUrl(btn) {
    var input = document.getElementById('my-url');
    navigator.clipboard.writeText(input.value).then(function () {
        var label = btn.querySelector('.copy-label');
        var prev = label.textContent;
        label.textContent = 'Copied!';
        setTimeout(function () { label.textContent = prev; }, 1500);
    });
}
</script>

@endsection
