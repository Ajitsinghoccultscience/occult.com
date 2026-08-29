@php
    $facultyMembers = [
        [
            'img'  => 'image/graphology assests/pawan sir.webp',
            'name' => 'Pawan Kumar',
            'role' => '( Graphology Expert )',
            'subtitle' => '(Faculty of All India Institute of Occult Science)',
            'bio'  => [
                "BSc in Mathematics, Master's in Psychology",
                "Diploma and Master's in Graphology",
                'Known for making handwriting analysis simple for complete beginners',
            ],
        ],
        [
            'img'  => '/image/graphology assests/shivam sir (1).webp',
            'name' => 'Shivam Tripathi',
            'role' => '( Graphologist )',
            'subtitle' => '(Faculty of All India Institute of Occult Science)',
            'bio'  => [
                'Years of practice in handwriting and personality analysis',
                'Advanced qualifications in Graphology',
                'Has trained thousands of students across India',
            ],
        ],
        [
            'img'      => 'image/Mukul ji (webinar).webp',
            'name'     => 'Mukul Shrivastava',
            'role'     => '( Graphology Expert )',
            'subtitle' => '(Faculty of All India Institute of Occult Science)',
            'bio'  => [
                '4+ years of experience in handwriting analysis and personality assessment',
                'Trained and mentored 45,000+ students',
                'Works on making handwriting analysis a practical career skill for everyone',
            ],
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     MEET OUR FACULTY
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">

    {{-- Heading --}}
    <div class="text-center pt-8 md:pt-10">
        <h2 class="text-xl md:text-2xl font-bold text-white">
            Meet Our Faculty
        </h2>
    </div>

    {{-- Snap slider — each slide is the full-width trainer layout --}}
    <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden"
         id="faculty-slider">

        @foreach($facultyMembers as $i => $t)
            <div class="faculty-card snap-center shrink-0 w-full"
                 data-index="{{ $i }}">

                <div class="max-w-335 mx-auto section-px md:px-16 lg:px-24 py-8 md:py-10">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-20">

                        {{-- Text --}}
                        <div class="order-2 md:order-1 text-center md:text-left">
                            <p class="text-lg md:text-xl font-bold text-white mb-1">
                                Trainer : <span class="font-medium text-white/90">{{ $t['name'] }}</span>
                                <span class="font-medium text-white/90 text-sm md:text-base">{{ $t['role'] }}</span>
                            </p>
                            @if (!empty($t['subtitle']))
                                <p class="text-sm md:text-base font-bold text-white">{{ $t['subtitle'] }}</p>
                            @endif

                            <ul class="mt-3 space-y-1.5 text-sm md:text-[15px] text-white/75 leading-snug list-disc list-inside text-left inline-block">
                                @foreach($t['bio'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Image --}}
                        <div class="order-1 md:order-2 shrink-0">
                            <div class="w-32 h-32 md:w-52 md:h-52 rounded-full overflow-hidden ring-4 ring-[#ff9700] shadow-lg">
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $t['img'])))) }}"
                                     alt="{{ $t['name'] }} - Faculty"
                                     class="w-full h-full object-cover object-top"
                                     loading="lazy">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach

    </div>

    {{-- Dot navigation --}}
    <div class="flex items-center justify-center gap-2.5 pb-8 -mt-4" id="faculty-dots">
        @foreach($facultyMembers as $i => $t)
            <button type="button"
                    data-index="{{ $i }}"
                    aria-label="Go to faculty member {{ $i + 1 }}"
                    class="faculty-dot rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6 h-2.5 bg-[#ff9700]' : 'w-2.5 h-2.5 bg-white/40' }}">
            </button>
        @endforeach
    </div>

</section>

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    var slider = document.getElementById('faculty-slider');
    var dots   = document.querySelectorAll('.faculty-dot');
    var cards  = document.querySelectorAll('.faculty-card');
    if (!slider || !dots.length || !cards.length) return;

    function setActiveDot(index) {
        dots.forEach(function (dot, i) {
            if (i === index) {
                dot.classList.add('w-6', 'bg-[#ff9700]');
                dot.classList.remove('w-2.5', 'bg-white/40');
            } else {
                dot.classList.remove('w-6', 'bg-[#ff9700]');
                dot.classList.add('w-2.5', 'bg-white/40');
            }
        });
    }

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx  = parseInt(dot.dataset.index);
            var card = cards[idx];
            if (!card) return;
            slider.scrollTo({ left: card.offsetLeft, behavior: 'smooth' });
            setActiveDot(idx);
        });
    });

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                setActiveDot(parseInt(entry.target.dataset.index));
            }
        });
    }, { root: slider, threshold: 0.5 });

    cards.forEach(function (card) { observer.observe(card); });
});
</script>
@endpush
