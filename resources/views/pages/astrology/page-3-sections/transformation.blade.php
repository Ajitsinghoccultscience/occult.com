@props([
    'title'      => 'The Transformation After This Session',
    'beforeTitle' => 'Before the Webinar',
    'afterTitle'  => 'After the Webinar',
    'rows' => [
        ['before' => 'Astrology feels scattered',           'after' => 'You have a clear foundation'],
        ['before' => 'Planets and houses make no sense',    'after' => 'You know exactly what each one means'],
        ['before' => 'A birth chart feels overwhelming',    'after' => 'You can begin reading one yourself'],
        ['before' => 'Learning online feels incomplete',    'after' => 'You have learned from a trustful source'],
        ['before' => 'Questions remain unanswered',         'after' => 'Every doubt cleared live'],
    ],
])

<section class="w-full bg-neutral-bg section-spacing">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px]">{{ $title }}</h2>
            <div class="mt-3 mx-auto w-16 h-1 rounded-full bg-[#5E3592]"></div>
        </div>

        {{-- Two cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 max-w-3xl mx-auto">

            {{-- Before card --}}
            <div class="bg-white rounded-2xl border border-red-100 shadow-sm overflow-hidden">
                <div class="bg-red-50 px-6 py-4 flex items-center gap-3 border-b border-red-100">
                    <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-red-600 tracking-wide">{{ $beforeTitle }}</h3>
                </div>
                <ul class="px-6 py-5 space-y-4">
                    @foreach($rows as $row)
                    <li class="flex items-start gap-3">
                        <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full bg-red-100 flex items-center justify-center">
                            <svg class="w-3 h-3 text-red-500" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </span>
                        <span class="text-content text-neutral-b leading-snug">{{ $row['before'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- After card --}}
            <div class="bg-white rounded-2xl border border-green-100 shadow-sm overflow-hidden">
                <div class="bg-green-50 px-6 py-4 flex items-center gap-3 border-b border-green-100">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-green-700 tracking-wide">{{ $afterTitle }}</h3>
                </div>
                <ul class="px-6 py-5 space-y-4">
                    @foreach($rows as $row)
                    <li class="flex items-start gap-3">
                        <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <span class="text-content text-neutral-b leading-snug">{{ $row['after'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>
