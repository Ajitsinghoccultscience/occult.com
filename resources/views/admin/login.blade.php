<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Occult Science</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .brand-panel {
            background: linear-gradient(145deg, #1a0000 0%, #5a0000 45%, #8B0000 100%);
        }
        .input-field {
            background: #f8f9fb;
            border: 1.5px solid #e8eaed;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }
        .input-field:focus {
            outline: none;
            background: #fff;
            border-color: #8B0000;
            box-shadow: 0 0 0 3px rgba(139,0,0,.10);
        }
        .btn-signin {
            background: linear-gradient(135deg, #8B0000 0%, #6e0000 100%);
            box-shadow: 0 4px 14px rgba(139,0,0,.35);
            transition: opacity .2s, transform .15s, box-shadow .2s;
        }
        .btn-signin:hover {
            opacity: .93;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(139,0,0,.45);
        }
        .btn-signin:active { transform: translateY(0); }
        .dot { animation: pulse 2s ease-in-out infinite; }
        .dot:nth-child(2) { animation-delay: .4s; }
        .dot:nth-child(3) { animation-delay: .8s; }
        @keyframes pulse {
            0%,100% { opacity: .3; transform: scale(1); }
            50%      { opacity: 1;  transform: scale(1.4); }
        }
    </style>
</head>
<body class="min-h-screen flex bg-[#f5f6f8]">

{{-- Left brand panel (hidden on small screens) --}}
<div class="hidden lg:flex lg:w-[52%] brand-panel flex-col justify-between p-12 relative overflow-hidden">

    {{-- Decorative circles --}}
    <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full opacity-10" style="background:radial-gradient(circle, #fff 0%, transparent 70%)"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full opacity-[.07]" style="background:radial-gradient(circle, #fff 0%, transparent 70%)"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full opacity-[.04]" style="background:radial-gradient(circle, #fff 0%, transparent 70%)"></div>

    {{-- Brand --}}
    <div class="relative z-10">
        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-base leading-tight">Occult Science</p>
                <p class="text-white/50 text-xs">Admin Portal</p>
            </div>
        </div>
    </div>

    {{-- Center content --}}
    <div class="relative z-10 flex flex-col gap-6">
        <div>
            <h2 class="text-white text-4xl font-extrabold leading-tight tracking-tight">
                Welcome<br>Back 👋
            </h2>
            <p class="text-white/60 text-base mt-3 leading-relaxed max-w-xs">
                Manage leads, track enquiries, and grow your institute from one place.
            </p>
        </div>

        {{-- Feature pills --}}
        <div class="flex flex-col gap-2.5">
            @foreach(['View & manage all enquiry leads', 'Update lead status in one click', 'Track daily & monthly growth'] as $feat)
            <div class="flex items-center gap-3">
                <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="text-white/75 text-sm">{{ $feat }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Footer dots --}}
    <div class="relative z-10 flex items-center gap-2">
        <span class="dot w-2 h-2 rounded-full bg-white inline-block"></span>
        <span class="dot w-2 h-2 rounded-full bg-white inline-block"></span>
        <span class="dot w-2 h-2 rounded-full bg-white inline-block"></span>
    </div>
</div>

{{-- Right login panel --}}
<div class="flex-1 flex items-center justify-center p-6 sm:p-12">
    <div class="w-full max-w-[400px]">

        {{-- Mobile brand --}}
        <div class="flex items-center gap-3 mb-10 lg:hidden">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:#8B0000;">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold text-gray-900 text-sm">Occult Science</p>
                <p class="text-xs text-gray-400">Admin Portal</p>
            </div>
        </div>

        {{-- Heading --}}
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Sign in to Admin</h1>
            <p class="text-sm text-gray-400 mt-1.5">Enter your credentials to continue</p>
        </div>

        {{-- Error --}}
        @if($errors->any())
        <div class="mb-5 flex items-start gap-3 px-4 py-3.5 bg-red-50 border border-red-200 rounded-2xl">
            <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm text-red-600 font-medium">{{ $errors->first() }}</p>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="flex flex-col gap-5">
            @csrf

            {{-- Email --}}
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-gray-500 uppercase tracking-widest" for="email">Email Address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                       placeholder="admin@occultscience.in"
                       class="input-field w-full rounded-2xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400">
            </div>

            {{-- Password --}}
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-gray-500 uppercase tracking-widest" for="password">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                           placeholder="••••••••"
                           class="input-field w-full rounded-2xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 pr-12">
                    <button type="button" onclick="togglePwd()" tabindex="-1"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                        <svg id="eye-show" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg id="eye-hide" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-signin w-full font-bold text-white py-4 rounded-2xl text-sm mt-1">
                Sign In →
            </button>
        </form>

        <p class="text-center text-xs text-gray-400 mt-8">
            All India Institute of Occult Science &copy; {{ date('Y') }}
        </p>
    </div>
</div>

</body>
<script>
function togglePwd() {
    const input = document.getElementById('password');
    const show  = document.getElementById('eye-show');
    const hide  = document.getElementById('eye-hide');
    if (input.type === 'password') {
        input.type = 'text';
        show.classList.add('hidden');
        hide.classList.remove('hidden');
    } else {
        input.type = 'password';
        show.classList.remove('hidden');
        hide.classList.add('hidden');
    }
}
</script>
</html>
