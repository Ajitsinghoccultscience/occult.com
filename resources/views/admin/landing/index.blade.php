@extends('admin.layouts.app')

@section('title', 'My Landing Pages')
@section('page-title', 'My Landing Pages')
@section('page-subtitle', 'Create multiple shareable links, each with its own offer & timer')

@section('content')

@if(session('success'))
<div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">{{ session('success') }}</div>
@endif

<div class="max-w-3xl space-y-6">

    {{-- ── Existing links ── --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-100" style="background:linear-gradient(135deg,#fff,#fdf2f2);">
            <span class="w-11 h-11 rounded-full flex items-center justify-center text-white font-bold shrink-0"
                  style="background:linear-gradient(135deg,#8B0000,#c0392b);">{{ strtoupper(mb_substr($user->name, 0, 1)) }}</span>
            <div>
                <p class="text-sm font-bold text-slate-800">{{ $user->name }}</p>
                <p class="text-xs text-slate-400">{{ $links->count() }} link{{ $links->count() === 1 ? '' : 's' }}</p>
            </div>
        </div>

        <div class="p-6">
            @forelse($links as $link)
                @php $url = url('/admission-2026') . '?counsler=' . $link->slug; @endphp
                <div class="border border-gray-200 rounded-xl p-4 mb-3 last:mb-0">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-slate-800 truncate">{{ $link->label }}</p>
                            <p class="text-[11px] text-slate-400 mt-0.5">
                                @if($link->lp_price)₹{{ number_format($link->lp_price) }} @endif
                                @if($link->lp_discount) · {{ $link->lp_discount }} @endif
                                @if($link->lp_timer_minutes) · {{ $link->lp_timer_minutes }} min timer @endif
                            </p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="{{ route('admin.landing.edit', $link) }}"
                               class="text-xs font-semibold text-slate-600 px-3 py-1.5 rounded-lg border border-gray-200 hover:bg-gray-50 transition">Edit</a>
                            <form method="POST" action="{{ route('admin.landing.destroy', $link) }}"
                                  onsubmit="return confirm('Delete this link? This cannot be undone.');">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-xs font-semibold text-red-600 px-3 py-1.5 rounded-lg border border-red-200 hover:bg-red-50 transition">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mt-3">
                        <input type="text" readonly value="{{ $url }}"
                               class="my-url flex-1 min-w-0 border border-gray-200 rounded-lg px-3 py-2 text-xs text-slate-500 bg-slate-50 truncate">
                        <button type="button" onclick="copyUrl(this)"
                                class="text-xs font-semibold text-white px-3 py-2 rounded-lg hover:opacity-90 transition whitespace-nowrap inline-flex items-center gap-1.5"
                                style="background-color:#8B0000;">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span class="copy-label">Copy</span>
                        </button>
                        <a href="{{ $url }}" target="_blank" rel="noopener"
                           class="text-xs font-semibold text-slate-600 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition whitespace-nowrap">Open</a>
                    </div>
                </div>
            @empty
                <div class="px-3 py-2 rounded-lg bg-amber-50 border border-amber-200 text-xs text-amber-700">
                    You have no links yet. Create your first one below.
                </div>
            @endforelse
        </div>
    </div>

    {{-- ── Create new link ── --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <p class="text-sm font-bold text-slate-800">Create a new link</p>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('admin.landing.store') }}">
                @csrf

                @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
                @endif

                @include('admin.landing._fields', ['link' => null])

                <button type="submit"
                        class="mt-5 w-full text-white text-sm font-semibold py-3 rounded-xl hover:opacity-90 transition"
                        style="background:linear-gradient(135deg,#8B0000,#c0392b);box-shadow:0 4px 12px rgba(139,0,0,.2);">
                    Create link
                </button>
            </form>
        </div>
    </div>

</div>

<script>
function copyUrl(btn) {
    var input = btn.closest('.flex').querySelector('.my-url');
    navigator.clipboard.writeText(input.value).then(function () {
        var label = btn.querySelector('.copy-label');
        var prev = label.textContent;
        label.textContent = 'Copied!';
        setTimeout(function () { label.textContent = prev; }, 1500);
    });
}
</script>

@endsection
