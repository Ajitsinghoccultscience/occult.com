@php
    $certImg = 'image/graphology assests/graphology certificate 1.webp';

    $bullets = [
        'Get Certificate of Participation',
        'Observe confidence, emotions, and behavior patterns more clearly',
        'Use graphology as a supportive tool in hiring and counseling',
        'Understand candidates, clients, and team members more deeply',
        'Add a unique skill to your professional profile',
    ];
@endphp

{{-- ═══════════════════════════════════
     AFTER THIS WEBINAR
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">
    <div class="max-w-[1040px] mx-auto section-px py-9 md:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-[36%_1fr] gap-6 lg:gap-10 items-center">

            {{-- Left: Certificate with orange border --}}
            <div class="bg-white p-1.5 rounded-xl border-2 border-[#ff9700] shadow-lg order-2 lg:order-1 w-full max-w-[340px] mx-auto lg:mx-0">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $certImg)))) }}"
                         alt="Graphology Certificate of Participation"
                         class="w-full h-auto object-contain"
                         loading="lazy">
                </div>
            </div>

            {{-- Right: heading + bullets --}}
            <div class="order-1 lg:order-2">
                <h2 class="text-2xl md:text-[2rem] font-bold text-white mb-5 pb-2 inline-block border-b-[3px] border-[#ff9700]">
                    After This Webinar
                </h2>

                <ul class="space-y-3">
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
