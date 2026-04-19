@extends('admin.layout')
@section('title', $section ? 'Edit Section' : 'Add Section')
@section('page-title', $section ? 'Edit Section' : 'Add New Section')
@section('breadcrumb', 'Pages / ' . $page->title . ' / ' . ($section ? 'Edit Section' : 'Add Section'))

@section('header-actions')
    <a href="{{ route('admin.pages.show', $page) }}"
       class="text-sm text-slate-500 hover:text-slate-700 font-medium px-4 py-2 rounded-lg hover:bg-slate-100 transition">
        ← Back to {{ $page->title }}
    </a>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Main form --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <form method="POST"
                  action="{{ $section
                    ? route('admin.sections.update', [$page, $section])
                    : route('admin.sections.store', $page) }}">
                @csrf
                @if ($section) @method('PUT') @endif

                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Section Name
                    </label>
                    <input type="text" name="name" value="{{ old('name', $section?->name) }}"
                        placeholder="e.g. Hero Banner, Testimonials, FAQ, CTA"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-sm font-semibold text-slate-700">
                            HTML Code
                        </label>
                        <span class="text-xs text-slate-400">Paste your ChatGPT code here ↓</span>
                    </div>
                    <textarea name="html_content" rows="30" required
                        placeholder="<!DOCTYPE html>&#10;<html>&#10;<head>&#10;  <style>&#10;    /* CSS here */&#10;  </style>&#10;</head>&#10;<body>&#10;  <!-- HTML here -->&#10;  <a href=&quot;@{{next_url}}&quot;>Register Now</a>&#10;</body>&#10;</html>"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-y transition bg-slate-50">{{ old('html_content', $section?->html_content) }}</textarea>
                    <p class="text-slate-400 text-xs mt-1.5">
                        💡 Use <code class="bg-slate-100 px-1.5 py-0.5 rounded font-mono text-indigo-600">@{{next_url}}</code> for CTA button links — auto-replaced with the next funnel page URL.
                    </p>
                    @error('html_content')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl transition text-sm shadow-sm">
                        ✅ Save Section
                    </button>
                    <a href="{{ route('admin.pages.show', $page) }}"
                       class="text-slate-500 hover:text-slate-700 font-medium px-4 py-3 text-sm">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Help panel --}}
    <div class="space-y-4">
        @if (!$section)
        <div class="bg-amber-50 border border-amber-100 rounded-2xl p-5">
            <h3 class="font-bold text-amber-800 mb-3">📋 Step-by-step</h3>
            <ol class="space-y-2 text-sm text-amber-700 list-decimal list-inside">
                <li>Open ChatGPT</li>
                <li>Ask it to write one section</li>
                <li>Copy the full HTML</li>
                <li>Paste it in the box</li>
                <li>Click Save ✅</li>
            </ol>
        </div>
        @endif

        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm">
            <h3 class="font-bold text-slate-700 mb-3">💬 ChatGPT Prompts</h3>
            <div class="space-y-3">
                <div class="bg-slate-50 rounded-xl p-3 text-xs text-slate-600">
                    <div class="font-semibold text-slate-700 mb-1">Hero Section</div>
                    <em>"Write a hero section in HTML+CSS with a headline, subtext, and a button linking to <code class="bg-white px-1 rounded">@{{next_url}}</code>. Include CSS in a style tag."</em>
                </div>
                <div class="bg-slate-50 rounded-xl p-3 text-xs text-slate-600">
                    <div class="font-semibold text-slate-700 mb-1">Testimonials</div>
                    <em>"Write an HTML testimonials section with 3 cards. Include inline CSS. Make it mobile responsive."</em>
                </div>
                <div class="bg-slate-50 rounded-xl p-3 text-xs text-slate-600">
                    <div class="font-semibold text-slate-700 mb-1">Image Carousel</div>
                    <em>"Write a carousel in HTML using Swiper.js CDN with 3 slides."</em>
                </div>
            </div>
        </div>

        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-5 text-xs text-indigo-800">
            <strong class="block mb-2">🖼️ Using Images?</strong>
            <a href="{{ route('admin.images.index') }}" target="_blank"
               class="text-indigo-600 hover:underline font-semibold">Go to Image Library →</a>
            <p class="mt-1 text-indigo-600">Upload → copy URL → paste URL into your ChatGPT prompt</p>
        </div>
    </div>

</div>
@endsection
