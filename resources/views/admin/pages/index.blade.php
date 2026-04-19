@extends('admin.layout')
@section('title', 'Landing Pages')
@section('page-title', 'Landing Pages')
@section('breadcrumb', 'Manage all your landing pages')

@section('header-actions')
    <a href="{{ route('admin.pages.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        + New Page
    </a>
@endsection

@section('content')
@if ($pages->isEmpty())
    <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-16 text-center">
        <div class="text-5xl mb-4">📄</div>
        <p class="text-slate-500 mb-2 font-medium">No pages yet</p>
        <p class="text-slate-400 text-sm mb-6">Create your first landing page to get started</p>
        <a href="{{ route('admin.pages.create') }}"
           class="bg-indigo-600 text-white text-sm font-semibold px-5 py-2.5 rounded-lg">
            + Create Page
        </a>
    </div>
@else
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="text-left px-6 py-3.5 font-semibold text-slate-600">Page Name</th>
                    <th class="text-left px-6 py-3.5 font-semibold text-slate-600">URL</th>
                    <th class="text-center px-6 py-3.5 font-semibold text-slate-600">Sections</th>
                    <th class="text-center px-6 py-3.5 font-semibold text-slate-600">Status</th>
                    <th class="text-right px-6 py-3.5 font-semibold text-slate-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach ($pages as $page)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-800">{{ $page->title }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/{{ $page->slug }}" target="_blank"
                           class="text-indigo-500 hover:text-indigo-700 hover:underline font-mono text-xs bg-indigo-50 px-2 py-1 rounded-lg">
                            /{{ $page->slug }} ↗
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-slate-100 text-slate-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                            {{ $page->sections_count }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form method="POST" action="{{ route('admin.pages.toggle', $page) }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-xs font-semibold px-3 py-1.5 rounded-full transition
                                    {{ $page->is_active
                                        ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200'
                                        : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                {{ $page->is_active ? '🟢 Live' : '⚫ Off' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.pages.show', $page) }}"
                               class="text-xs bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded-lg font-semibold transition">
                                🧩 Sections
                            </a>
                            <a href="{{ route('admin.pages.edit', $page) }}"
                               class="text-xs bg-slate-100 text-slate-600 hover:bg-slate-200 px-3 py-1.5 rounded-lg font-semibold transition">
                                ⚙ Edit
                            </a>
                            <form method="POST" action="{{ route('admin.pages.destroy', $page) }}"
                                  onsubmit="return confirm('Delete this page and all its sections?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-xs bg-red-50 text-red-400 hover:bg-red-100 px-3 py-1.5 rounded-lg font-semibold transition">
                                    🗑
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($pages->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $pages->links() }}
            </div>
        @endif
    </div>
@endif
@endsection
