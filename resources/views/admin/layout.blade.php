<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — OccultScience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #dc2626; border-radius: 4px; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<div class="flex min-h-screen">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="w-64 bg-white flex flex-col fixed top-0 left-0 h-full z-20 border-r border-gray-200 shadow-sm">

        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">🌙</div>
                <div>
                    <div class="font-bold text-gray-900 text-sm leading-tight">OccultScience</div>
                    <div class="text-gray-400 text-xs">Admin Panel</div>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-0.5">

            <div class="text-red-500 text-xs font-bold uppercase tracking-widest px-3 py-2">Main Menu</div>

            <a href="{{ route('admin.dashboard') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; transition:all 0.15s;
               {{ request()->routeIs('admin.dashboard') ? 'background:#fef2f2; color:#dc2626; border-left:3px solid #dc2626;' : 'color:#4b5563;' }}"
               onmouseover="if(!this.style.borderLeft) this.style.background='#f9fafb'"
               onmouseout="if(!this.style.borderLeft) this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">🏠</span>
                <span>Dashboard</span>
            </a>

            <div class="text-red-500 text-xs font-bold uppercase tracking-widest px-3 pt-4 pb-2">Pages</div>

            <a href="{{ route('admin.pages.index') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; transition:all 0.15s;
               {{ request()->routeIs('admin.pages*') || request()->routeIs('admin.sections*') ? 'background:#fef2f2; color:#dc2626; border-left:3px solid #dc2626;' : 'color:#4b5563;' }}"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="if(!{{ request()->routeIs('admin.pages*') || request()->routeIs('admin.sections*') ? 'true' : 'false' }}) this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">📄</span>
                <span style="flex:1;">All Pages</span>
                @php $pc = \App\Models\LandingPage::count(); @endphp
                @if($pc > 0)
                <span style="background:#dc2626; color:#fff; font-size:11px; padding:2px 8px; border-radius:20px; font-weight:600;">{{ $pc }}</span>
                @endif
            </a>

            <a href="{{ route('admin.pages.create') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; color:#4b5563; transition:all 0.15s;"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">➕</span>
                <span>New Page</span>
            </a>

            <div class="text-red-500 text-xs font-bold uppercase tracking-widest px-3 pt-4 pb-2">Funnels</div>

            <a href="{{ route('admin.funnels.index') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; transition:all 0.15s;
               {{ request()->routeIs('admin.funnels*') ? 'background:#fef2f2; color:#dc2626; border-left:3px solid #dc2626;' : 'color:#4b5563;' }}"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="if(!{{ request()->routeIs('admin.funnels*') ? 'true' : 'false' }}) this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">🔗</span>
                <span style="flex:1;">All Funnels</span>
                @php $fc = \App\Models\Funnel::count(); @endphp
                @if($fc > 0)
                <span style="background:#dc2626; color:#fff; font-size:11px; padding:2px 8px; border-radius:20px; font-weight:600;">{{ $fc }}</span>
                @endif
            </a>

            <a href="{{ route('admin.funnels.create') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; color:#4b5563; transition:all 0.15s;"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">✨</span>
                <span>New Funnel</span>
            </a>

            <div class="text-red-500 text-xs font-bold uppercase tracking-widest px-3 pt-4 pb-2">Media</div>

            <a href="{{ route('admin.images.index') }}"
               style="display:flex; align-items:center; gap:12px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:14px; font-weight:500; transition:all 0.15s;
               {{ request()->routeIs('admin.images*') ? 'background:#fef2f2; color:#dc2626; border-left:3px solid #dc2626;' : 'color:#4b5563;' }}"
               onmouseover="this.style.background='#f9fafb'"
               onmouseout="if(!{{ request()->routeIs('admin.images*') ? 'true' : 'false' }}) this.style.background='transparent'">
                <span style="font-size:18px; flex-shrink:0;">🖼️</span>
                <span>Image Library</span>
            </a>

        </nav>

        {{-- User + Logout --}}
        <div class="px-3 py-4 border-t border-gray-100">
            <div style="display:flex; align-items:center; gap:10px; padding:10px 12px; margin-bottom:4px;">
                <div style="width:34px; height:34px; background:#dc2626; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; color:#fff; flex-shrink:0;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div style="flex:1; min-width:0;">
                    <div style="color:#111827; font-size:13px; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ auth()->user()->name }}</div>
                    <div style="color:#9ca3af; font-size:11px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    style="display:flex; align-items:center; gap:12px; width:100%; padding:10px 12px; border-radius:10px; font-size:14px; font-weight:500; color:#dc2626; background:transparent; border:none; cursor:pointer; transition:all 0.15s; text-align:left;"
                    onmouseover="this.style.background='#fef2f2'"
                    onmouseout="this.style.background='transparent'">
                    <span style="font-size:18px;">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN AREA ===== --}}
    <div class="ml-64 flex-1 flex flex-col min-h-screen">

        {{-- Top bar --}}
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
            <div>
                <h1 class="text-lg font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                @hasSection('breadcrumb')
                    <div class="text-xs text-gray-400 mt-0.5">@yield('breadcrumb')</div>
                @endif
            </div>
            <div class="flex items-center gap-3">
                @yield('header-actions')
            </div>
        </header>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="mx-8 mt-5">
                <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
                    <span>✅</span> {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="mx-8 mt-5">
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
                    <span>❌</span> {{ session('error') }}
                </div>
            </div>
        @endif

        {{-- Page content --}}
        <main class="flex-1 px-8 py-6">
            @yield('content')
        </main>

        <footer class="px-8 py-4 text-xs text-gray-400 border-t border-gray-100">
            OccultScience Admin Panel
        </footer>
    </div>
</div>

</body>
</html>
