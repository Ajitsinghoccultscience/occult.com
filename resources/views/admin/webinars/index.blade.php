@extends('admin.layouts.app')
@section('title','Webinar Settings')
@section('page-title','Webinar Settings')
@section('page-subtitle','Manage dates, times and community links for each webinar')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    @forelse($webinars as $w)
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        {{-- Header strip --}}
        <div class="px-6 py-4 flex items-center justify-between" style="background:linear-gradient(135deg,#8B0000,#c0392b);">
            <div>
                <p class="text-white font-bold text-base leading-tight">{{ $w->webinar_name }}</p>
                <p class="text-white/70 text-xs mt-0.5 uppercase tracking-widest">{{ $w->key }}</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                </svg>
            </div>
        </div>

        {{-- Details --}}
        <div class="px-6 py-4 flex flex-col gap-3">
            <div class="flex items-start gap-3">
                <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <div>
                    <p class="text-[11px] text-slate-400 font-medium uppercase tracking-wide">Date</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5">{{ $w->event_date }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-[11px] text-slate-400 font-medium uppercase tracking-wide">Time</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5">{{ $w->event_time }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                </svg>
                <div>
                    <p class="text-[11px] text-slate-400 font-medium uppercase tracking-wide">WhatsApp Community</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5 truncate max-w-[240px]">{{ $w->whatsapp_url }}</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <svg class="w-4 h-4 text-slate-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-[11px] text-slate-400 font-medium uppercase tracking-wide">Price</p>
                    <p class="text-sm font-semibold text-slate-800 mt-0.5">₹{{ $w->price }}</p>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
            <p class="text-[11px] text-slate-400">Last updated: {{ $w->updated_at->diffForHumans() }}</p>
            <a href="{{ route('admin.webinars.edit', $w->key) }}"
               class="inline-flex items-center gap-1.5 text-xs font-bold text-white px-4 py-2 rounded-lg transition hover:opacity-90"
               style="background:#8B0000;">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Settings
            </a>
        </div>
    </div>
    @empty
    <div class="col-span-2 bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-400 text-sm">
        No webinars configured yet.
    </div>
    @endforelse
</div>

@endsection
