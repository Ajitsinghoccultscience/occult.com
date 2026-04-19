@extends('admin.layout')
@section('title', $funnel->name)
@section('page-title', $funnel->name)
@section('breadcrumb', 'Funnels / ' . $funnel->name)

@section('header-actions')
    <a href="{{ route('admin.funnels.index') }}"
       class="text-sm text-slate-500 hover:text-slate-700 font-medium px-4 py-2 rounded-lg hover:bg-slate-100 transition">
        ← Back
    </a>
    <a href="{{ route('admin.funnels.edit', $funnel) }}"
       class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold px-4 py-2 rounded-lg transition">
        Rename
    </a>
@endsection

@section('content')

{{-- Info tip --}}
<div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 mb-6 flex gap-3 text-sm text-indigo-800">
    <span class="text-xl flex-shrink-0">💡</span>
    <div>
        In your page HTML, use <code class="bg-indigo-100 px-1.5 py-0.5 rounded font-mono text-xs">@{{next_url}}</code>
        as the button href. It automatically links to the <strong>next page</strong> in this funnel.
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Page flow --}}
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <h2 class="font-bold text-slate-800 mb-5">Page Flow</h2>

        @if ($funnel->steps->isEmpty())
            <div class="text-center py-10 text-slate-400">
                <div class="text-4xl mb-3">📭</div>
                <p class="text-sm">No pages added yet. Add pages from the panel on the right.</p>
            </div>
        @else
            <div class="space-y-3">
                @foreach ($funnel->steps as $i => $step)
                <div class="flex items-center gap-3">
                    {{-- Step number --}}
                    <div class="w-9 h-9 bg-indigo-600 text-white font-bold text-sm rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                        {{ $i + 1 }}
                    </div>

                    {{-- Page card --}}
                    <div class="flex-1 border border-slate-200 rounded-xl px-5 py-3.5 flex items-center justify-between gap-3 hover:border-indigo-300 transition">
                        <div>
                            <div class="font-semibold text-slate-800">{{ $step->landingPage?->title ?? '⚠ Deleted Page' }}</div>
                            @if ($step->landingPage)
                            <div class="flex items-center gap-3 mt-0.5">
                                <span class="text-xs font-mono text-slate-400">/{{ $step->landingPage->slug }}</span>
                                <a href="/{{ $step->landingPage->slug }}" target="_blank"
                                   class="text-xs text-indigo-400 hover:underline">Preview ↗</a>
                            </div>
                            @endif
                        </div>
                        <div class="flex items-center gap-1.5 flex-shrink-0">
                            @if ($step->landingPage)
                            <a href="{{ route('admin.pages.show', $step->landingPage) }}"
                               class="text-xs bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded-lg font-semibold transition">
                                Edit Sections
                            </a>
                            @endif
                            @if ($i > 0)
                            <form method="POST" action="{{ route('admin.funnels.steps.move', [$funnel, $step]) }}">
                                @csrf <input type="hidden" name="direction" value="up">
                                <button class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">↑</button>
                            </form>
                            @endif
                            @if ($i < $funnel->steps->count() - 1)
                            <form method="POST" action="{{ route('admin.funnels.steps.move', [$funnel, $step]) }}">
                                @csrf <input type="hidden" name="direction" value="down">
                                <button class="w-8 h-8 flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">↓</button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.funnels.steps.remove', [$funnel, $step]) }}"
                                  onsubmit="return confirm('Remove this page from the funnel?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition text-sm">✕</button>
                            </form>
                        </div>
                    </div>
                </div>

                @if ($i < $funnel->steps->count() - 1)
                <div class="flex items-center gap-3">
                    <div class="w-9 flex justify-center">
                        <div class="w-px h-6 bg-slate-200"></div>
                    </div>
                    <span class="text-xs text-slate-400">↓ visitor clicks CTA → goes here</span>
                </div>
                @endif
                @endforeach
            </div>
        @endif
    </div>

    {{-- Add page panel --}}
    <div class="space-y-4">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
            <h2 class="font-bold text-slate-800 mb-4">+ Add Page to Funnel</h2>
            @if ($pages->isEmpty())
                <p class="text-sm text-slate-400 mb-3">No pages yet.</p>
                <a href="{{ route('admin.pages.create') }}"
                   class="block text-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2.5 rounded-lg transition">
                    Create a Page First
                </a>
            @else
                <form method="POST" action="{{ route('admin.funnels.steps.add', $funnel) }}" class="space-y-3">
                    @csrf
                    <select name="landing_page_id" required
                        class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                        <option value="">Select a page...</option>
                        @foreach ($pages as $p)
                            <option value="{{ $p->id }}">{{ $p->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2.5 rounded-lg transition text-sm">
                        Add to Funnel
                    </button>
                </form>
                <div class="mt-3 pt-3 border-t border-slate-100">
                    <a href="{{ route('admin.pages.create') }}"
                       class="text-xs text-indigo-500 hover:underline">+ Create new page first</a>
                </div>
            @endif
        </div>

        {{-- Tip box --}}
        <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 text-xs text-amber-800">
            <strong class="block mb-1">💡 Tip</strong>
            Pages are added to the <strong>bottom</strong> of the funnel. Use ↑↓ to reorder after adding.
        </div>
    </div>

</div>
@endsection
