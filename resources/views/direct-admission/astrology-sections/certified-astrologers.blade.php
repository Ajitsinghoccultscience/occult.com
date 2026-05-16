@props([
    'heading'    => 'Join 2400+ Astrologer',
    'subheading' => 'have reaped benefits from our programs',
    'students'   => [
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/laxmi mam.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2728',
            'course'    => 'Vedic Astrology',
        ],
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/laxmi mam.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2729',
            'course'    => 'Vedic Astrology',
        ],
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/laxmi mam.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2730',
            'course'    => 'Vedic Astrology',
        ],
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/laxmi mam.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2731',
            'course'    => 'Vedic Astrology',
        ],
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/laxmi mam.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2732',
            'course'    => 'Vedic Astrology',
        ],
        [
            'name'      => 'Aarti',
            'role'      => 'Astrologer',
            'image'     => 'image/astrology assests/manmohan sir.webp',
            'batch'     => '2024',
            'studentId' => 'AIIOS-2733',
            'course'    => 'Vedic Astrology',
        ],
    ],
])

<style>
.ca-track {
    display: flex;
    gap: 1rem;
    width: max-content;
    animation: ca-scroll 28s linear infinite;
}
.ca-track:hover { animation-play-state: paused; }
@keyframes ca-scroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Outer bordered container --}}
        <div class="border border-neutral-200 rounded-2xl p-6 md:p-8 overflow-hidden">

            {{-- Header --}}
            <div class="mb-6">
                <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">{{ $heading }}</h2>
                <p class="text-content text-neutral-e mt-1">{{ $subheading }}</p>
            </div>

            {{-- Auto-scroll track --}}
            <div class="overflow-hidden">
                <div class="ca-track">
                    {{-- Original set --}}
                    @foreach($students as $student)
                    <div class="shrink-0 w-[200px] bg-white border border-neutral-200 rounded-2xl p-4 flex flex-col gap-3 shadow-sm">
                        {{-- Image --}}
                        <div class="w-full aspect-[4/2.2] rounded-xl overflow-hidden bg-neutral-100">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $student['image'])))) }}"
                                 alt="{{ $student['name'] }}"
                                 class="w-full h-full object-cover object-top"
                                 loading="lazy">
                        </div>
                        {{-- Name + Role --}}
                        <div class="min-h-[36px]">
                            <p class="font-bold text-[#CC2200] text-sm leading-snug">{{ $student['name'] }}</p>
                            <p class="text-xs text-neutral-e mt-0.5">{{ $student['role'] }}</p>
                        </div>
                        {{-- Pills --}}
                        <div class="flex flex-col gap-1.5">
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 block">Batch: {{ $student['batch'] }}</span>
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 block">Student ID: {{ $student['studentId'] }}</span>
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 block">Course: {{ $student['course'] }}</span>
                        </div>
                    </div>
                    @endforeach

                    {{-- Duplicate set for seamless loop --}}
                    @foreach($students as $student)
                    <div class="shrink-0 w-[200px] bg-white border border-neutral-200 rounded-2xl p-4 flex flex-col gap-3 shadow-sm">
                        <div class="w-full aspect-[4/2.2] rounded-xl overflow-hidden bg-neutral-100">
                            <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $student['image'])))) }}"
                                 alt="{{ $student['name'] }}"
                                 class="w-full h-full object-cover object-top"
                                 loading="lazy">
                        </div>
                        <div>
                            <p class="font-bold text-[#CC2200] text-sm leading-snug">{{ $student['name'] }}</p>
                            <p class="text-xs text-neutral-e mt-0.5">{{ $student['role'] }}</p>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 w-fit">Batch: {{ $student['batch'] }}</span>
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 w-fit">Student ID: {{ $student['studentId'] }}</span>
                            <span class="text-xs text-neutral-b border border-neutral-200 rounded-full px-3 py-1 w-fit">Course: {{ $student['course'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
