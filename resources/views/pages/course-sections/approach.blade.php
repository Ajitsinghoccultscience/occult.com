@php
    $base = 'images/graphology course icons';
    $methods = [
        [
            'title' => 'Scientific Method',
            'text'  => "This method studies handwriting in a systematic way to understand a person's personality, behavior, and habits.",
            'icon'  => 'Scientific method.svg',
        ],
        [
            'title' => 'Forensic Method',
            'text'  => "This method helps identify fake handwriting or signatures. It's used in legal cases to check if documents are real.",
            'icon'  => 'forensic method.svg',
        ],
        [
            'title' => 'Psychological Method',
            'text'  => "This method focuses on how handwriting shows a person's mental state and emotions, helping you understand their personality and feelings.",
            'icon'  => 'Psychological method.svg',
        ],
        [
            'title' => 'Integrative Method',
            'text'  => "We combine scientific, forensic, and psychological methods. This gives you a complete understanding of handwriting and how it reflects a person's mind.",
            'icon'  => 'integrative method.svg',
        ],
        [
            'title' => 'Our Unique Method',
            'text'  => 'We combine theory with real practice, using live examples and case studies. This helps you learn and apply graphology in real situations.',
            'icon'  => 'unique method.svg',
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
                    <img src="{{ asset($base . '/' . rawurlencode($method['icon'])) }}"
                         alt="" class="w-12 h-12 object-contain" loading="lazy">
                    <h3 class="font-bold text-neutral-b text-base">{{ $method['title'] }}</h3>
                    <p class="text-sm text-neutral-b/70 leading-relaxed">{{ $method['text'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>
