@php
    $methods = [
        [
            'title' => 'Scientific Method',
            'text'  => "This method studies handwriting in a systematic way to understand a person's personality, behavior, and habits.",
            'icon'  => '<circle cx="12" cy="12" r="3"/><path stroke-linecap="round" d="M12 2c4 2 4 18 0 20M12 2c-4 2-4 18 0 20M2 12h20"/>',
        ],
        [
            'title' => 'Forensic Method',
            'text'  => "This method helps identify fake handwriting or signatures. It's used in legal cases to check if documents are real.",
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>',
        ],
        [
            'title' => 'Psychological Method',
            'text'  => "This method focuses on how handwriting shows a person's mental state and emotions, helping you understand their personality and feelings.",
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 3a4 4 0 00-4 4c0 1-1 1.5-1 3a3 3 0 003 3v4a2 2 0 002 2h6a2 2 0 002-2v-4a3 3 0 003-3c0-1.5-1-2-1-3a4 4 0 00-4-4 4 4 0 00-3 1.5A4 4 0 009 3z"/>',
        ],
        [
            'title' => 'Integrative Method',
            'text'  => "We combine scientific, forensic, and psychological methods. This gives you a complete understanding of handwriting and how it reflects a person's mind.",
            'icon'  => '<rect x="4" y="4" width="16" height="6" rx="1"/><rect x="4" y="14" width="16" height="6" rx="1"/><path stroke-linecap="round" d="M12 10v4"/>',
        ],
        [
            'title' => 'Our Unique Method',
            'text'  => 'We combine theory with real practice, using live examples and case studies. This helps you learn and apply graphology in real situations.',
            'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2l2.9 6.6 7.1.6-5.4 4.7 1.6 7-6.2-3.8-6.2 3.8 1.6-7L2 9.2l7.1-.6L12 2z"/>',
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     OUR APPROACH
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16 bg-white">
    <div class="max-w-335 mx-auto section-px">

        <h2 class="text-xl md:text-2xl font-bold text-neutral-b text-center mb-8 md:mb-10">
            Our Approach to Teaching Graphology
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($methods as $method)
                <div class="rounded-2xl border border-neutral-100 shadow-sm p-6 flex flex-col items-center text-center gap-3">
                    <span class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color:#fff4e5;">
                        <svg class="w-6 h-6" fill="none" stroke="#ff9700" stroke-width="1.8" viewBox="0 0 24 24">
                            {!! $method['icon'] !!}
                        </svg>
                    </span>
                    <h3 class="font-bold text-neutral-b text-base">{{ $method['title'] }}</h3>
                    <p class="text-sm text-neutral-b/70 leading-relaxed">{{ $method['text'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
