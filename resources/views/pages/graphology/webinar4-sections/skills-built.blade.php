@php
    $skills = [
        ['title' => 'The Foundation of Graphology', 'text' => 'Understand what handwriting reveals about a person and why it works, the base every reading is built on.'],
        ['title' => 'Read the Slant',               'text' => "Learn what left, right and no slant say about a person's emotions and how they connect with others."],
        ['title' => 'Understand the Baseline',       'text' => 'Rising, falling, straight or wavy, see how the baseline exposes a person\'s mood, drive and stability.'],
        ['title' => 'Letter Shapes & Spacing',       'text' => 'Read confidence, honesty and thinking style from the size, spacing and pressure of everyday writing.'],
        ['title' => 'The Famous "K" and "G"',        'text' => 'Master the two most talked-about letters in graphology and the strong traits they reveal about a person.'],
        ['title' => 'Signature Analysis',            'text' => "Learn what a signature says about a person's self-image, ego and the face they show the world."],
    ];
@endphp

{{-- ═══════════════════════════════════
     SKILLS YOU BUILT WITH US
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-335 mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Skills you built with us
            </h2>
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            @foreach($skills as $skill)
                <div class="rounded-xl p-5 md:p-6 bg-white border border-neutral-b/10 shadow-sm">
                    <h3 class="text-base md:text-lg font-bold text-neutral-b mb-2">
                        {{ $skill['title'] }}
                    </h3>
                    <p class="text-sm text-neutral-b/70 leading-relaxed">
                        {{ $skill['text'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>
