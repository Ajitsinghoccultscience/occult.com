@php
    $trainers = [
        [
            'img'  => 'image/graphology assests/pawan sir.webp',
            'name' => 'Pawan Kumar',
            'role' => '( Graphologist )',
            'bio'  => [
                'Pawan Kumar is one of the recognized Graphology teachers known for his teaching and training students in Graphology.',
                'He belongs to Kota, holds a BSc in Mathematics and a Master\'s in Psychology. He has earned a Diploma and a Master\'s in Graphology, shaping his expertise in handwriting analysis.',
                'Known for his adaptability, trustworthiness, and adventurous spirit, he now teaches Graphology at the All India Institute of Occult Science.',
            ],
        ],
        [
            'img'  => '/image/graphology assests/manager sir.webp',
            'name' => 'Shivam Tripathi',
            'role' => '( Graphologist )',
            'bio'  => [
                'Shivam Tripathi Sir is a highly experienced Graphology expert with years of dedicated practice in handwriting analysis and personality assessment.',
                'He holds advanced qualifications in Graphology and has trained thousands of students across India, helping them unlock the power of handwriting.',
                'With his deep knowledge and passion for the subject, he continues to inspire learners at the All India Institute of Occult Science.',
            ],
        ],
    ];
@endphp

{{-- ═══════════════════════════════════
     MEET THE TRAINER
════════════════════════════════════ --}}
<section style="width:100vw;margin-left:calc(50% - 50vw);background-color:#2b2724;">

    {{-- Snap slider — each slide is the full-width trainer layout --}}
    <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth [&::-webkit-scrollbar]:hidden"
         id="mt-slider">

        @foreach($trainers as $i => $t)
            <div class="mt-card snap-center shrink-0 w-full"
                 data-index="{{ $i }}">

                <div class="max-w-335 mx-auto section-px py-12 md:py-16">
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">

                        {{-- Text --}}
                        <div class="flex-1 order-2 md:order-1 text-center md:text-left">
                            <p class="text-xl md:text-2xl font-bold text-white mb-1">
                                Trainer : <span class="font-medium text-white/90">{{ $t['name'] }}</span>
                            </p>
                            <p class="text-sm md:text-base text-white/90 mb-5">
                                {{ $t['role'] }}
                            </p>

                            <div class="space-y-3 text-sm md:text-[15px] text-white/75 leading-relaxed">
                                @foreach($t['bio'] as $para)
                                    <p>{{ $para }}</p>
                                @endforeach
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="order-1 md:order-2 shrink-0">
                            <div class="w-44 h-44 md:w-60 md:h-60 rounded-full overflow-hidden ring-4 ring-[#ff9700] shadow-lg">
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $t['img'])))) }}"
                                     alt="{{ $t['name'] }} - Graphology Trainer"
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
    <div class="flex items-center justify-center gap-2.5 pb-8 -mt-4" id="mt-dots">
        @foreach($trainers as $i => $t)
            <button type="button"
                    data-index="{{ $i }}"
                    aria-label="Go to trainer {{ $i + 1 }}"
                    class="mt-dot rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6 h-2.5 bg-[#ff9700]' : 'w-2.5 h-2.5 bg-white/40' }}">
            </button>
        @endforeach
    </div>

</section>

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function () {
    var slider = document.getElementById('mt-slider');
    var dots   = document.querySelectorAll('.mt-dot');
    var cards  = document.querySelectorAll('.mt-card');
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

    // Dot click → scroll to that trainer
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx  = parseInt(dot.dataset.index);
            var card = cards[idx];
            if (!card) return;
            slider.scrollTo({ left: card.offsetLeft, behavior: 'smooth' });
            setActiveDot(idx);
        });
    });

    // Scroll → sync active dot
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
