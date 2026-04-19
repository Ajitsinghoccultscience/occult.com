@extends('admin.layout')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('header-actions')
    <a href="{{ route('admin.pages.create') }}"
       class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
        + New Page
    </a>
@endsection

@section('content')

{{-- Stats row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

    <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center text-xl">🔗</div>
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Funnels</span>
        </div>
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $funnelCount }}</div>
        <a href="{{ route('admin.funnels.index') }}" class="text-xs text-red-500 hover:text-red-600 font-medium">View all →</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center text-xl">📄</div>
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pages</span>
        </div>
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $pageCount }}</div>
        <a href="{{ route('admin.pages.index') }}" class="text-xs text-red-500 hover:text-red-600 font-medium">View all →</a>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center text-xl">🧩</div>
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Sections</span>
        </div>
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ \App\Models\LandingPageSection::count() }}</div>
        <span class="text-xs text-gray-400 font-medium">Total sections</span>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center text-xl">🖼️</div>
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Images</span>
        </div>
        @php
            $imgDir = public_path('uploads/landing-pages');
            $imgCount = is_dir($imgDir) ? count(array_filter(scandir($imgDir), fn($f) => !in_array($f, ['.','..']))) : 0;
        @endphp
        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $imgCount }}</div>
        <a href="{{ route('admin.images.index') }}" class="text-xs text-red-500 hover:text-red-600 font-medium">View all →</a>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Quick actions --}}
    <div class="lg:col-span-1 bg-red-600 rounded-2xl p-6 text-white shadow-lg shadow-red-100">
        <h2 class="font-bold text-lg mb-1">Start Building</h2>
        <p class="text-red-100 text-sm mb-5">Create a new campaign from scratch</p>
        <div class="space-y-3">
            <a href="{{ route('admin.funnels.create') }}"
               class="flex items-center gap-3 bg-white/15 hover:bg-white/25 rounded-xl px-4 py-3 transition">
                <span class="text-xl">🔗</span>
                <div>
                    <div class="font-semibold text-sm">Create Funnel</div>
                    <div class="text-red-100 text-xs">Connect pages into a flow</div>
                </div>
            </a>
            <a href="{{ route('admin.pages.create') }}"
               class="flex items-center gap-3 bg-white/15 hover:bg-white/25 rounded-xl px-4 py-3 transition">
                <span class="text-xl">📄</span>
                <div>
                    <div class="font-semibold text-sm">Create Page</div>
                    <div class="text-red-100 text-xs">Add a new landing page</div>
                </div>
            </a>
            <a href="{{ route('admin.images.index') }}"
               class="flex items-center gap-3 bg-white/15 hover:bg-white/25 rounded-xl px-4 py-3 transition">
                <span class="text-xl">🖼️</span>
                <div>
                    <div class="font-semibold text-sm">Upload Image</div>
                    <div class="text-red-100 text-xs">Get a URL for your HTML</div>
                </div>
            </a>
        </div>
    </div>

    {{-- How it works --}}
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow">
        <h2 class="font-bold text-gray-900 mb-5">📋 How It Works</h2>
        <div class="space-y-5">
            <div class="flex gap-4">
                <div class="w-7 h-7 bg-red-600 text-white font-bold text-xs rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">1</div>
                <div>
                    <div class="font-semibold text-gray-800 text-sm">Upload Images</div>
                    <div class="text-gray-400 text-xs mt-0.5">Go to Image Library → upload your photos → copy the URL to use in ChatGPT</div>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-7 h-7 bg-red-600 text-white font-bold text-xs rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">2</div>
                <div>
                    <div class="font-semibold text-gray-800 text-sm">Create Pages & Add Sections</div>
                    <div class="text-gray-400 text-xs mt-0.5">Create a page → add sections → paste ChatGPT HTML for each section</div>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-7 h-7 bg-red-600 text-white font-bold text-xs rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">3</div>
                <div>
                    <div class="font-semibold text-gray-800 text-sm">Create a Funnel</div>
                    <div class="text-gray-400 text-xs mt-0.5">Connect your pages in order: Webinar → Checkout → Thank You</div>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-7 h-7 bg-gray-900 text-white font-bold text-xs rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">✓</div>
                <div>
                    <div class="font-semibold text-gray-800 text-sm">Use <code class="bg-gray-100 px-1.5 py-0.5 rounded text-red-600 text-xs">@{{next_url}}</code> in CTA buttons</div>
                    <div class="text-gray-400 text-xs mt-0.5">Auto-links to the next page in your funnel — no hardcoding needed</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent funnels --}}
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-900">🔗 Recent Funnels</h2>
            <a href="{{ route('admin.funnels.index') }}" class="text-xs text-red-500 hover:text-red-600 font-medium">View all</a>
        </div>
        @php $funnels = \App\Models\Funnel::with('steps.landingPage')->latest()->take(3)->get(); @endphp
        @if ($funnels->isEmpty())
            <p class="text-gray-400 text-sm">No funnels yet. <a href="{{ route('admin.funnels.create') }}" class="text-red-500 hover:text-red-600">Create one →</a></p>
        @else
            <div class="space-y-3">
                @foreach ($funnels as $funnel)
                <div class="border border-gray-100 hover:border-red-200 hover:bg-red-50/30 rounded-xl p-4 transition-all">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-semibold text-gray-800 text-sm">{{ $funnel->name }}</span>
                        <a href="{{ route('admin.funnels.show', $funnel) }}"
                           class="text-xs text-red-500 hover:text-red-600 font-medium">Manage →</a>
                    </div>
                    <div class="flex items-center gap-1.5 flex-wrap">
                        @foreach ($funnel->steps as $i => $step)
                            @if ($i > 0)<span class="text-gray-300 text-xs">→</span>@endif
                            <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-lg font-medium">
                                {{ $step->landingPage?->title ?? 'Deleted' }}
                            </span>
                        @endforeach
                        @if ($funnel->steps->isEmpty())
                            <span class="text-gray-400 text-xs italic">No pages added yet</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Recent pages --}}
    <div class="lg:col-span-1 bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-bold text-gray-900">📄 Recent Pages</h2>
            <a href="{{ route('admin.pages.index') }}" class="text-xs text-red-500 hover:text-red-600 font-medium">View all</a>
        </div>
        @php $pages = \App\Models\LandingPage::latest()->take(5)->get(); @endphp
        @if ($pages->isEmpty())
            <p class="text-gray-400 text-sm">No pages yet.</p>
        @else
            <div class="space-y-1">
                @foreach ($pages as $page)
                <div class="flex items-center justify-between py-2.5 border-b border-gray-50 last:border-0">
                    <div class="min-w-0">
                        <div class="text-sm font-semibold text-gray-800 truncate">{{ $page->title }}</div>
                        <div class="text-xs text-gray-400">/{{ $page->slug }}</div>
                    </div>
                    <span class="ml-2 flex-shrink-0 w-2 h-2 rounded-full {{ $page->is_active ? 'bg-red-500' : 'bg-gray-300' }}"></span>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
