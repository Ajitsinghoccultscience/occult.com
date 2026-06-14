<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Occult Science</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', system-ui, sans-serif; }
        body { background: #f1f5f9; }

        /* ── Sidebar ── */
        #sidebar {
            background: #fff;
            border-right: 1px solid #e8edf3;
            box-shadow: 4px 0 24px rgba(0,0,0,.04);
        }

        .brand-logo {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #8B0000 0%, #c0392b 100%);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 10px rgba(139,0,0,.30);
            flex-shrink: 0;
        }

        .nav-section {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #b0bac8;
            padding: 0 12px;
            margin: 22px 0 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            color: #64748b;
            text-decoration: none;
            transition: all .15s ease;
            position: relative;
        }
        .nav-link .icon-wrap {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            background: transparent;
            transition: background .15s;
            flex-shrink: 0;
        }
        .nav-link:hover { color: #1e293b; background: #f8fafc; }
        .nav-link:hover .icon-wrap { background: #f1f5f9; }

        .nav-link.active { color: #8B0000; background: #fff1f1; font-weight: 600; }
        .nav-link.active .icon-wrap { background: rgba(139,0,0,.10); }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 25%; bottom: 25%;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: #8B0000;
        }

        /* Badge */
        .nav-badge {
            margin-left: auto;
            background: #8B0000;
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 20px;
            line-height: 18px;
        }

        /* User card */
        .user-card {
            background: #f8fafc;
            border: 1px solid #e8edf3;
            border-radius: 12px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8B0000, #c0392b);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(139,0,0,.25);
        }

        /* Topbar */
        #topbar {
            background: #fff;
            border-bottom: 1px solid #e8edf3;
            box-shadow: 0 1px 4px rgba(0,0,0,.04);
        }

        /* Logout btn */
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 9px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            color: #94a3b8;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: background .15s, color .15s;
            margin-top: 6px;
        }
        .logout-btn:hover { background: #fff5f5; color: #8B0000; }
    </style>
</head>
<body class="min-h-screen">

{{-- Mobile overlay --}}
<div id="overlay" class="fixed inset-0 bg-black/40 z-20 lg:hidden backdrop-blur-sm" style="display:none" onclick="toggleSidebar()"></div>

{{-- ── SIDEBAR ── --}}
<aside id="sidebar" class="fixed top-0 left-0 h-full w-[248px] z-30 flex flex-col -translate-x-full lg:translate-x-0 transition-transform duration-300">

    {{-- Brand --}}
    <div class="flex items-center gap-3 px-5 py-5" style="border-bottom:1px solid #e8edf3;">
        <div class="brand-logo">
            <svg class="w-[18px] h-[18px] text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
            </svg>
        </div>
        <div>
            <p class="text-slate-800 text-sm font-bold leading-tight">Occult Science</p>
            <p class="text-slate-400 text-[11px] font-medium">Admin Panel</p>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-3 py-2 overflow-y-auto">

        <p class="nav-section">Overview</p>

        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10-3a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z"/>
                </svg>
            </span>
            Dashboard
        </a>

        @if(session('admin_role') === 'counsellor')
        <p class="nav-section">Landing Page</p>
        <a href="{{ route('admin.landing.index') }}" class="nav-link {{ request()->routeIs('admin.landing.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </span>
            My Landing Pages
        </a>
        @endif

        <p class="nav-section">Webinars</p>

        <a href="{{ route('admin.webinars.index') }}" class="nav-link {{ request()->routeIs('admin.webinars.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                </svg>
            </span>
            Webinar Settings
        </a>

        <p class="nav-section">CRM</p>

        <a href="{{ route('admin.leads') }}" class="nav-link {{ request()->routeIs('admin.leads') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </span>
            Enquiry Leads
            @php $newCount = \App\Models\Enquiry::where('status','new')->count(); @endphp
            @if($newCount > 0)
            <span class="nav-badge">{{ $newCount }}</span>
            @endif
        </a>

        @if(session('admin_role') !== 'counsellor')
        <p class="nav-section">WhatsApp</p>

        <a href="{{ route('admin.whatsapp.send.create') }}"
           class="nav-link {{ request()->routeIs('admin.whatsapp.send.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </span>
            Send Message
        </a>
        @endif

        @if(session('admin_role') === 'admin')
        <a href="{{ route('admin.whatsapp.campaigns.index') }}"
           class="nav-link {{ request()->routeIs('admin.whatsapp.campaigns.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </span>
            Campaigns
        </a>

        <a href="{{ route('admin.whatsapp.templates.index') }}"
           class="nav-link {{ request()->routeIs('admin.whatsapp.templates.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </span>
            Templates
        </a>

        <p class="nav-section">Team</p>

        <a href="{{ route('admin.team.index') }}"
           class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
            <span class="icon-wrap">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </span>
            Manage Team
        </a>
        @endif

    </nav>

    {{-- Footer --}}
    <div class="px-3 pb-4 pt-3" style="border-top:1px solid #e8edf3;">
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(session('admin_email','A'),0,1)) }}</div>
            <div class="min-w-0 flex-1">
                <p class="text-slate-700 text-xs font-semibold truncate">{{ session('admin_name', session('admin_email','Admin')) }}</p>
                <p class="text-slate-400 text-[10px] mt-0.5">{{ ucfirst(session('admin_role', 'admin')) }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Sign Out
            </button>
        </form>
    </div>

</aside>

{{-- ── MAIN ── --}}
<div class="lg:ml-[248px] min-h-screen flex flex-col">

    {{-- Topbar --}}
    <header id="topbar" class="sticky top-0 z-10 px-5 py-3.5 flex items-center gap-4">
        <button onclick="toggleSidebar()" class="lg:hidden w-8 h-8 flex items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div class="flex-1">
            <h1 class="text-sm font-bold text-slate-800">@yield('page-title','Dashboard')</h1>
            <p class="text-[11px] text-slate-400 mt-0.5">@yield('page-subtitle','')</p>
        </div>

        <div class="flex items-center gap-2">
            <span class="hidden sm:flex items-center gap-1.5 text-xs text-slate-500 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-lg font-medium">
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ now()->format('D, d M Y') }}
            </span>
        </div>
    </header>

    @if(session('success'))
    <div class="mx-5 mt-4 px-4 py-3 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700 flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <main class="flex-1 p-5 md:p-6">
        @yield('content')
    </main>

</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const isOpen  = !sidebar.classList.contains('-translate-x-full');
    sidebar.classList.toggle('-translate-x-full', isOpen);
    overlay.style.display = isOpen ? 'none' : 'block';
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('overlay').style.display = 'none';
    }
});
</script>

@stack('scripts')
</body>
</html>
