@php
    $certImg = 'image/graphology assests/graphology certificate 1.webp';

    $bullets = [
        'Certificate of Partcipation from a Government-recognized institute',
        'Adds credibility to your professional profile',
        'Helps build trust with clients and employers',
        'Shows your verified learning and participation',
    ];
@endphp

{{-- ═══════════════════════════════════
     AFTER THIS WEBINAR
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-[1040px] mx-auto section-px py-9 md:py-12">
        {{-- Mobile order: heading → image → bullets.  Desktop: certificate left, heading+bullets right. --}}
        <div class="grid grid-cols-1 lg:grid-cols-[36%_1fr] gap-6 lg:gap-10 lg:items-center">

            {{-- Heading --}}
            <div class="order-1 lg:col-start-2 lg:row-start-1 text-center lg:text-left">
                <h2 class="text-2xl md:text-[2rem] font-bold text-white pb-2 inline-block border-b-[3px] border-[#ff9700]">
                    After This Webinar
                </h2>
            </div>

            {{-- Certificate with orange border --}}
            <div class="order-2 lg:col-start-1 lg:row-start-1 lg:row-span-2 bg-white p-1.5 rounded-xl border-2 border-[#ff9700] shadow-lg w-full max-w-[420px] mx-auto lg:max-w-none lg:mx-0">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $certImg)))) }}"
                         alt="Graphology Certificate of Participation"
                         class="w-full h-auto object-contain"
                         loading="lazy">
                </div>
            </div>

            {{-- Bullets --}}
            <div class="order-3 lg:col-start-2 lg:row-start-2">
                <ul class="space-y-4 text-left">
                    @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3 text-white/85 text-sm md:text-base">
                            <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full border-2 border-[#ff9700] flex items-center justify-center">
                                <svg class="w-3 h-3 text-[#ff9700]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>
