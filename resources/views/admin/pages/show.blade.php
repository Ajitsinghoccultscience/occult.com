@extends('admin.layout')
@section('title', $page->title)
@section('page-title', $page->title)
@section('breadcrumb', 'Pages / ' . $page->title . ' / Sections')

@section('header-actions')
    <a href="{{ route('admin.pages.index') }}"
       class="text-sm text-slate-500 hover:text-slate-700 font-medium px-4 py-2 rounded-lg hover:bg-slate-100 transition">
        ← Back
    </a>
    <a href="/{{ $page->slug }}" target="_blank"
       class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold px-4 py-2 rounded-lg transition">
        👁 Preview
    </a>
    <a href="{{ route('admin.sections.create', $page) }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        + Add Section
    </a>
@endsection

@section('content')

{{-- How-to guide --}}
<div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-6 flex gap-3 text-sm text-blue-800">
    <span class="text-xl flex-shrink-0">📋</span>
    <div>
        <strong>How to add a section:</strong>
        Open ChatGPT → ask for an HTML section (e.g. <em>"Write a hero section with a button linking to <code class="bg-blue-100 px-1 rounded font-mono text-xs">@{{next_url}}</code>"</em>)
        → click <strong>+ Add Section</strong> → paste the code → Save.
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Sections list --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <span class="font-bold text-slate-800">Sections</span>
                    <span class="text-slate-400 font-normal text-sm ml-2">({{ $sections->count() }} total)</span>
                </div>
                <span class="text-xs text-slate-400">Use ↑↓ to reorder</span>
            </div>

            @if ($sections->isEmpty())
                <div class="px-6 py-14 text-center text-slate-400">
                    <div class="text-4xl mb-3">🧩</div>
                    <p class="text-sm font-medium mb-1">No sections yet</p>
                    <p class="text-xs mb-4">Each section is one part of your page (hero, testimonials, CTA, etc.)</p>
                    <a href="{{ route('admin.sections.create', $page) }}"
                       class="bg-indigo-600 text-white text-sm font-semibold px-5 py-2.5 rounded-lg">
                        + Add First Section
                    </a>
                </div>
            @else
                <div class="divide-y divide-slate-50">
                    @foreach ($sections as $i => $section)
                    <div class="flex items-center gap-4 px-6 py-4 hover:bg-slate-50/50 transition group">

                        {{-- Drag handle --}}
                        <span class="text-slate-200 group-hover:text-slate-400 transition text-lg select-none">≡</span>

                        {{-- Toggle --}}
                        <form method="POST" action="{{ route('admin.sections.toggle', [$page, $section]) }}">
                            @csrf
                            <button type="submit" title="{{ $section->is_active ? 'Click to hide' : 'Click to show' }}"
                                class="text-xl leading-none hover:scale-110 transition-transform">
                                {{ $section->is_active ? '🟢' : '⚫' }}
                            </button>
                        </form>

                        {{-- Name --}}
                        <div class="flex-1 min-w-0">
                            <span class="font-semibold text-slate-700">{{ $section->name }}</span>
                            @if (!$section->is_active)
                                <span class="text-xs text-slate-400 ml-2 bg-slate-100 px-2 py-0.5 rounded-full">hidden</span>
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="flex items-center gap-1 flex-shrink-0">
                            @if ($i > 0)
                            <form method="POST" action="{{ route('admin.sections.move', [$page, $section]) }}">
                                @csrf <input type="hidden" name="direction" value="up">
                                <button class="w-8 h-8 flex items-center justify-center text-slate-300 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition text-sm">↑</button>
                            </form>
                            @else <div class="w-8"></div> @endif

                            @if ($i < $sections->count() - 1)
                            <form method="POST" action="{{ route('admin.sections.move', [$page, $section]) }}">
                                @csrf <input type="hidden" name="direction" value="down">
                                <button class="w-8 h-8 flex items-center justify-center text-slate-300 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition text-sm">↓</button>
                            </form>
                            @else <div class="w-8"></div> @endif

                            <a href="{{ route('admin.sections.edit', [$page, $section]) }}"
                               class="text-xs bg-slate-100 text-slate-600 hover:bg-slate-200 px-3 py-1.5 rounded-lg font-semibold transition ml-1">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.sections.destroy', [$page, $section]) }}"
                                  onsubmit="return confirm('Delete this section?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center text-red-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition ml-1">
                                    🗑
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="{{ route('admin.sections.create', $page) }}"
                       class="text-sm text-indigo-600 hover:text-indigo-700 font-semibold">
                        + Add New Section
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Page info panel --}}
    <div class="space-y-4">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
            <h3 class="font-bold text-slate-800 mb-4">Page Info</h3>
            <div class="space-y-3 text-sm">
                <div>
                    <div class="text-xs text-slate-400 mb-1">Status</div>
                    <form method="POST" action="{{ route('admin.pages.toggle', $page) }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-xs font-semibold px-3 py-1.5 rounded-full transition
                                {{ $page->is_active
                                    ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200'
                                    : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                            {{ $page->is_active ? '🟢 Live' : '⚫ Off — click to enable' }}
                        </button>
                    </form>
                </div>
                <div>
                    <div class="text-xs text-slate-400 mb-1">Live URL</div>
                    <a href="/{{ $page->slug }}" target="_blank"
                       class="text-indigo-500 hover:underline font-mono text-xs break-all">
                        /{{ $page->slug }} ↗
                    </a>
                </div>
                <div>
                    <div class="text-xs text-slate-400 mb-1">Sections</div>
                    <span class="font-semibold text-slate-700">{{ $sections->count() }} total,
                        {{ $sections->where('is_active', true)->count() }} visible</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.pages.edit', $page) }}"
                   class="text-xs text-slate-500 hover:text-slate-700 hover:underline">⚙ Edit page settings →</a>
            </div>
        </div>

        <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 text-xs text-amber-800">
            <strong class="block mb-1">💡 Tips</strong>
            <ul class="space-y-1 list-disc list-inside text-amber-700">
                <li>🟢 = visible on live page</li>
                <li>⚫ = hidden (only in admin)</li>
                <li>Use ↑↓ to change section order</li>
                <li>Add <code class="bg-amber-100 px-1 rounded">@{{next_url}}</code> to button links</li>
            </ul>
        </div>
    </div>

</div>
@endsection
