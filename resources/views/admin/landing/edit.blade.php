@extends('admin.layouts.app')

@section('title', 'Edit Landing Page')
@section('page-title', 'Edit Landing Page')
@section('page-subtitle', 'Update this link\'s offer details and timer')

@section('content')

@php $url = url('/admission-2026') . '?counsler=' . $link->slug; @endphp

<div class="max-w-2xl">
    <a href="{{ route('admin.landing.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-700 mb-4">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Back to my links
    </a>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100" style="background:linear-gradient(135deg,#fff,#fdf2f2);">
            <p class="text-sm font-bold text-slate-800">{{ $link->label }}</p>
            <p class="text-xs text-slate-400 truncate">{{ $url }}</p>
        </div>

        <div class="p-6">
            {{-- Shareable link --}}
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

            <form method="POST" action="{{ route('admin.landing.update', $link) }}">
                @csrf @method('PUT')

                @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
                @endif

                @include('admin.landing._fields', ['link' => $link])

                <button type="submit"
                        class="mt-5 w-full text-white text-sm font-semibold py-3 rounded-xl hover:opacity-90 transition"
                        style="background:linear-gradient(135deg,#8B0000,#c0392b);box-shadow:0 4px 12px rgba(139,0,0,.2);">
                    Save changes
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
