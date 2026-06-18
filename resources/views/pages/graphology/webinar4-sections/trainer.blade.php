
@php
    $trainers = [
        [
            'img'   => 'images/pawan sir 1.webp',
            'name'  => 'Pawan Kumar',
            'role'  => '( Graphologist )',
            'bio'   => [
                'Pawan Kumar is one of the recognized Graphology teachers known for his teaching and training students in Graphology.',
                'He belongs to Kota, holds a BSc in Mathematics and a Master\'s in Psychology. He has earned a Diploma and a Master\'s in Graphology, shaping his expertise in handwriting analysis.',
                'Known for his adaptability, trustworthiness, and adventurous spirit, he now teaches Graphology at the All India Institute of Occult Science.',
            ],
        ],
        [
            'img'   => '/image/graphology assests/manager sir.webp',
            'name'  => 'Maager Sir',
            'role'  => '( Graphologist )',
            'bio'   => [
                'Maager Sir is a highly experienced Graphology expert with years of dedicated practice in handwriting analysis and personality assessment.',
                'He holds advanced qualifications in Graphology and has trained thousands of students across India, helping them unlock the power of handwriting.',
                'With his deep knowledge and passion for the subject, he continues to inspire learners at the All India Institute of Occult Science.',
            ],
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     TRAINER SLIDER
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-335 mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Meet Your Trainers
            </h2>
        </div>

        {{-- Slider --}}
        <div class="relative">
            <div class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden"
                 id="trainer-slider">

                @foreach($trainers as $i => $t)
                    <div class="trainer-card snap-center shrink-0 w-full sm:w-[70%] md:w-[55%] lg:w-[45%] mx-auto"
                         data-index="{{ $i }}">

                        {{-- Dark card --}}
                        <div class="rounded-2xl px-8 py-10 flex flex-col items-center text-center"
                             style="background-color:#2b2724;">

                            {{-- Circular photo --}}
                            <div class="w-36 h-36 md:w-44 md:h-44 rounded-full overflow-hidden mb-6 shrink-0"
                                 style="border: 4px solid #ff9700;">
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $t['img'])))) }}"
                                     alt="{{ $t['name'] }}"
                                     class="w-full h-full object-cover object-top"
                                     loading="lazy">
                            </div>

                            {{-- Name + role --}}
                            <p class="text-lg md:text-xl font-bold text-white mb-1">
                                Trainer :&nbsp;<span class="font-medium">{{ $t['name'] }}</span>
                            </p>
                            <p class="text-sm text-white/70 mb-6">{{ $t['role'] }}</p>

                            {{-- Bio --}}
                            <div class="space-y-3 text-sm md:text-[15px] text-white/75 leading-relaxed">
                                @foreach($t['bio'] as $para)
                                    <p>{{ $para }}</p>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Dot navigation --}}
        <div class="flex items-center justify-center gap-2.5 mt-7" id="trainer-dots">
            @foreach($trainers as $i => $t)
                <button type="button"
                        data-index="{{ $i }}"
                        aria-label="Go to trainer {{ $i + 1 }}"
                        class="trainer-dot rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6 h-2.5 bg-[#ff9700]' : 'w-2.5 h-2.5 bg-neutral-300' }}">
                </button>
            @endforeach
        </div>

    </div>
</section>

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    var slider = document.getElementById('trainer-slider');
    var dots   = document.querySelectorAll('.trainer-dot');
    var cards  = document.querySelectorAll('.trainer-card');
    if (!slider || !dots.length || !cards.length) return;

    function setActiveDot(index) {
        dots.forEach(function (dot, i) {
            if (i === index) {
                dot.classList.add('w-6', 'bg-[#ff9700]');
                dot.classList.remove('w-2.5', 'bg-neutral-300');
            } else {
                dot.classList.remove('w-6', 'bg-[#ff9700]');
                dot.classList.add('w-2.5', 'bg-neutral-300');
            }
        });
    }

    // Dot click → scroll to card
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx  = parseInt(dot.dataset.index);
            var card = cards[idx];
            if (!card) return;
            var offset = card.offsetLeft - (slider.offsetWidth - card.offsetWidth) / 2;
            slider.scrollTo({ left: offset, behavior: 'smooth' });
            setActiveDot(idx);
        });
    });

    // Scroll → update active dot
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
