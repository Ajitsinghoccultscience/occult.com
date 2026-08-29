@props([
    'links' => [
        ['label' => 'Home',         'href' => '/'],
        ['label' => 'Course',       'href' => '/graphology-course'],
        ['label' => 'About Us',     'href' => '/about'],
        ['label' => 'Contact Us',   'href' => '/contact'],
    ],
    'announcement' => 'Celebrating 22 Years of Trust — Enrol Now and Get Exclusive Discounts!',
])

<header class="sticky top-0 z-50 font-open-sans" style="font-family:'Open Sans',sans-serif;">

    {{-- Announcement marquee bar --}}
    <div class="w-full overflow-hidden py-1.5" style="background-color:#ff9700;">
        <div class="flex w-max animate-marquee items-center gap-16">
            @foreach(array_fill(0, 6, $announcement) as $msg)
                <span class="shrink-0 text-xs sm:text-sm font-semibold text-white tracking-wide whitespace-nowrap">
                    {{ $msg }}
                </span>
            @endforeach
        </div>
    </div>

    {{-- Main navbar --}}
    <div class="w-full bg-white border-b border-neutral-200 shadow-sm">
        <div class="relative max-w-[1400px] mx-auto section-px py-2.5 flex items-center justify-between gap-6">

            {{-- Logo lockup --}}
            <a href="/" class="shrink-0">
                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', 'image/graphology assests/company-logo.png')))) }}"
                     alt="All India Institute of Occult Science"
                     class="h-10 sm:h-12 w-auto object-contain"
                     loading="eager">
            </a>

            {{-- Desktop nav links — true center of the bar --}}
            <nav class="hidden md:flex items-center gap-8 absolute left-1/2 -translate-x-1/2">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}"
                       class="text-sm font-semibold text-neutral-800 hover:text-[#ff9700] transition-colors">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Mobile menu button --}}
            <button type="button" id="navbar-menu-btn"
                    class="md:hidden ml-auto shrink-0 w-9 h-9 flex items-center justify-center rounded-lg hover:bg-neutral-100 transition-colors"
                    aria-label="Open menu" aria-expanded="false">
                <svg class="w-6 h-6 text-neutral-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile nav panel --}}
        <nav id="navbar-mobile-panel" class="hidden md:hidden border-t border-neutral-100 bg-white">
            <div class="flex flex-col section-px py-2">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}"
                       class="py-2.5 text-sm font-semibold text-neutral-800 border-b border-neutral-100 last:border-b-0">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>
    </div>

</header>

@once
@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    var btn   = document.getElementById('navbar-menu-btn');
    var panel = document.getElementById('navbar-mobile-panel');
    if (!btn || !panel) return;
    btn.addEventListener('click', function () {
        var isOpen = !panel.classList.contains('hidden');
        panel.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', String(!isOpen));
    });
});
</script>
@endpush
@endonce
