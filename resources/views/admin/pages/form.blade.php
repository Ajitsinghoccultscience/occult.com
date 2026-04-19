@extends('admin.layout')
@section('title', $page ? 'Edit Page' : 'Create Page')
@section('page-title', $page ? 'Edit Page Settings' : 'Create New Page')
@section('breadcrumb', $page ? 'Pages / ' . $page->title . ' / Settings' : 'Pages / New Page')

@section('header-actions')
    <a href="{{ route('admin.pages.index') }}"
       class="text-sm text-slate-500 hover:text-slate-700 font-medium px-4 py-2 rounded-lg hover:bg-slate-100 transition">
        ← Back
    </a>
@endsection

@section('content')
<div class="max-w-xl">
    @if (!$page)
    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 mb-6 text-sm text-indigo-800 flex gap-3">
        <span class="text-xl">💡</span>
        <span>Give your page a name and URL slug. You'll add the HTML sections on the next screen.</span>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <form method="POST"
              action="{{ $page ? route('admin.pages.update', $page) : route('admin.pages.store') }}">
            @csrf
            @if ($page) @method('PUT') @endif

            <div class="mb-5">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Page Name <span class="text-slate-400 font-normal">(for your reference)</span>
                </label>
                <input type="text" name="title" value="{{ old('title', $page?->title) }}"
                    placeholder="e.g. Astrology Webinar Page"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    URL Slug <span class="text-slate-400 font-normal">(browser address bar)</span>
                </label>
                <div class="flex items-center border border-slate-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-transparent">
                    <span class="bg-slate-50 px-4 py-3 text-slate-400 text-sm border-r border-slate-200 whitespace-nowrap">
                        yoursite.com/
                    </span>
                    <input type="text" name="slug" value="{{ old('slug', $page?->slug) }}"
                        placeholder="astrology-webinar"
                        class="flex-1 px-4 py-3 text-sm focus:outline-none bg-white">
                </div>
                <p class="text-slate-400 text-xs mt-1.5">Only letters, numbers, and hyphens. No spaces.</p>
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <details class="mb-6 border border-slate-100 rounded-xl overflow-hidden">
                <summary class="px-4 py-3 text-sm font-semibold text-slate-500 cursor-pointer hover:bg-slate-50 select-none">
                    SEO Settings (optional)
                </summary>
                <div class="px-4 pb-4 pt-3 space-y-3 border-t border-slate-100">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $page?->meta_title) }}"
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Meta Description</label>
                        <textarea name="meta_description" rows="2"
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none">{{ old('meta_description', $page?->meta_description) }}</textarea>
                    </div>
                </div>
            </details>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl transition text-sm shadow-sm">
                    {{ $page ? 'Save Changes' : 'Create Page & Add Sections →' }}
                </button>
                <a href="{{ route('admin.pages.index') }}"
                   class="text-slate-500 hover:text-slate-700 font-medium px-4 py-3 text-sm">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
