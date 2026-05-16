@props([
    'title'       => 'What will you learn?',
    'description' => 'Astrology Course taught by leading faculty of All India Institute of Occult Science in the form of online classes, recorded video lectures, case studies and live projects.',
    'stats'       => [
        ['value' => '2000+', 'label' => 'Hours of Learning'],
        ['value' => '5+',    'label' => 'Vedic Tools'],
        ['value' => '20+',   'label' => 'Experienced Faculty'],
        ['value' => '20+',   'label' => 'Case Studies'],
    ],
    'modules' => [
        [
            'module' => 'Module 1',
            'title'  => 'Introduction to Astrology',
            'topics' => [
                'What is Astrology',
                'Vedang Astrology',
                'Salient Features of Indian Astrology',
                'Concept of Indian Astrology',
                'Roots of Indian Astrology',
            ],
        ],
        [
            'module' => 'Module 2',
            'title'  => 'Introduction to Astronomy',
            'topics' => [
                'Astronomy as Geocentric and Heliocentric',
                'Position of Rahu and Ketu in the Universe',
                'Orbit order according to Astrology and Science',
                'Concept of Indian Astrology',
            ],
        ],
        [
            'module' => 'Module 3',
            'title'  => 'Horoscope',
            'topics' => [
                'Introduction of horoscope',
                'Different type of horoscope',
            ],
        ],
        [
            'module' => 'Module 4',
            'title'  => 'Bhava',
            'topics' => [
                'Topics to be considered from Houses',
                'Significator of Houses',
                'Classification of Houses',
            ],
        ],
        [
            'module' => 'Module 5',
            'title'  => 'Planets & Their Significance',
            'topics' => [
                'Nature of planets',
                'Friendly and enemy planets',
                'Exaltation and debilitation',
                'Planetary aspects',
            ],
        ],
        [
            'module' => 'Module 6',
            'title'  => 'Zodiac Signs',
            'topics' => [
                'Introduction to 12 zodiac signs',
                'Characteristics of each sign',
                'Sign lords and their effects',
            ],
        ],
        [
            'module' => 'Module 7',
            'title'  => 'Dasha System',
            'topics' => [
                'Vimshottari Dasha',
                'Mahadasha & Antardasha',
                'How to predict using Dasha',
            ],
        ],
        [
            'module' => 'Module 8',
            'title'  => 'Kundali Reading',
            'topics' => [
                'Reading a birth chart',
                'Identifying strengths & weaknesses',
                'Practical case studies',
                'Making accurate predictions',
            ],
        ],
    ],
    'syllabusHref' => '#',
    'syllabusLabel' => 'Full Syllabus',
])

@php
    $visible = 4;
    $hasMore = count($modules) > $visible;
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-8 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
            <p class="text-sm text-neutral-e max-w-2xl mx-auto leading-relaxed">{{ $description }}</p>
        </div>

        {{-- Stats bar --}}
        <div class="rounded-xl overflow-hidden mb-8" style="background-color:#8B0000;">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/20">
                @foreach($stats as $stat)
                <div class="flex flex-col items-center justify-center py-4 px-3 text-center">
                    <p class="text-white font-bold text-base md:text-lg leading-tight">
                        <span class="font-extrabold">{{ $stat['value'] }}</span> {{ $stat['label'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Module cards grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" id="curriculum-grid">
            @foreach($modules as $i => $mod)
            <div class="border border-neutral-200 rounded-2xl p-5 flex flex-col gap-3 bg-white shadow-sm {{ $i >= $visible ? 'hidden' : '' }}" data-module-card>
                {{-- Module label --}}
                <div>
                    <span class="text-sm font-bold text-neutral-b">{{ $mod['module'] }}</span>
                    <p class="text-sm font-semibold text-neutral-b mt-0.5">{{ $mod['title'] }}</p>
                </div>

                <div class="border-t border-neutral-100"></div>

                {{-- Topics --}}
                <div>
                    <p class="text-sm font-semibold text-neutral-b mb-2">Topics</p>
                    <ul class="space-y-2">
                        @foreach($mod['topics'] as $topic)
                        <li class="flex items-start gap-2 text-xs text-neutral-b">
                            <span class="shrink-0 mt-0.5 w-4 h-4 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                                <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            {{ $topic }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Syllabus / Show More button --}}
        <div class="flex justify-center mt-8">
            @if($hasMore)
            <button id="curriculum-toggle"
                    onclick="toggleModules()"
                    class="inline-flex items-center gap-2 font-bold text-white text-sm px-8 py-3.5 rounded-xl transition-colors duration-200 hover:opacity-90"
                    style="background-color:#8B0000;"
                    data-show-more="true">
                <svg id="curriculum-icon" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
                {{ $syllabusLabel }}
            </button>
            @else
            <a href="{{ $syllabusHref }}"
               class="inline-flex items-center gap-2 font-bold text-white text-sm px-8 py-3.5 rounded-xl transition-colors duration-200 hover:opacity-90"
               style="background-color:#8B0000;">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zm-8 2V5h2v6h1.17L12 13.17 9.83 11H11zm-6 7h14v2H5v-2z"/>
                </svg>
                {{ $syllabusLabel }}
            </a>
            @endif
        </div>

    </div>
</section>

@if($hasMore)
<script>
function toggleModules() {
    const cards  = document.querySelectorAll('[data-module-card]');
    const btn    = document.getElementById('curriculum-toggle');
    const icon   = document.getElementById('curriculum-icon');
    const isMore = btn.dataset.showMore === 'true';

    cards.forEach((c, i) => {
        if (i >= {{ $visible }}) c.classList.toggle('hidden', isMore ? false : true);
    });

    if (isMore) {
        btn.dataset.showMore = 'false';
        btn.innerHTML = '<svg id="curriculum-icon" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg> Show Less';
    } else {
        btn.dataset.showMore = 'true';
        btn.innerHTML = '<svg id="curriculum-icon" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg> {{ $syllabusLabel }}';
    }
}
</script>
@endif
