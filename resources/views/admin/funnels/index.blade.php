@extends('admin.layout')
@section('title', 'Funnels')
@section('page-title', 'Funnels')
@section('breadcrumb', 'Connect your pages into a flow')

@section('header-actions')
    <a href="{{ route('admin.funnels.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        + New Funnel
    </a>
@endsection

@section('content')
@if ($funnels->isEmpty())
    <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-16 text-center">
        <div class="text-5xl mb-4">🔗</div>
        <p class="text-slate-500 mb-2 font-medium">No funnels yet</p>
        <p class="text-slate-400 text-sm mb-6">Create a funnel to connect pages: Webinar → Checkout → Thank You</p>
        <a href="{{ route('admin.funnels.create') }}"
           class="bg-indigo-600 text-white text-sm font-semibold px-5 py-2.5 rounded-lg">
            + Create Funnel
        </a>
    </div>
@else
    <div class="space-y-4">
        @foreach ($funnels as $funnel)
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:border-indigo-200 transition">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-xl">🔗</div>
                    <div>
                        <div class="font-bold text-slate-800">{{ $funnel->name }}</div>
                        <div class="text-xs text-slate-400">{{ $funnel->steps->count() }} pages in funnel</div>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.funnels.show', $funnel) }}"
                       class="text-xs bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-lg font-semibold transition">
                        Manage
                    </a>
                    <a href="{{ route('admin.funnels.edit', $funnel) }}"
                       class="text-xs bg-slate-100 text-slate-600 hover:bg-slate-200 px-3 py-2 rounded-lg font-semibold transition">
                        Rename
                    </a>
                    <form method="POST" action="{{ route('admin.funnels.destroy', $funnel) }}"
                          onsubmit="return confirm('Delete this funnel?')">
                        @csrf @method('DELETE')
                        <button class="text-xs bg-red-50 text-red-400 hover:bg-red-100 px-3 py-2 rounded-lg font-semibold transition">🗑</button>
                    </form>
                </div>
            </div>

            {{-- Flow visualization --}}
            @if ($funnel->steps->isNotEmpty())
            <div class="bg-slate-50 rounded-xl p-4">
                <div class="flex items-center gap-2 flex-wrap">
                    @foreach ($funnel->steps as $i => $step)
                        @if ($i > 0)
                            <div class="flex items-center">
                                <div class="w-6 h-px bg-indigo-300"></div>
                                <span class="text-indigo-400 text-sm">▶</span>
                            </div>
                        @endif
                        <div class="bg-white border border-indigo-100 rounded-xl px-4 py-2.5 shadow-sm">
                            <div class="text-xs text-slate-400 mb-0.5">Step {{ $i + 1 }}</div>
                            <div class="font-semibold text-slate-700 text-sm">{{ $step->landingPage?->title ?? '⚠ Deleted' }}</div>
                            @if ($step->landingPage)
                            <div class="text-xs text-indigo-400 font-mono">/{{ $step->landingPage->slug }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @else
                <div class="bg-slate-50 rounded-xl p-4 text-center text-sm text-slate-400 italic">
                    No pages added yet.
                    <a href="{{ route('admin.funnels.show', $funnel) }}" class="text-indigo-500 hover:underline">Add pages →</a>
                </div>
            @endif
        </div>
        @endforeach
    </div>
@endif
@endsection
