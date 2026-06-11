@props([
    'title'   => 'Our Astrology Mentors',
    'mentors' => [
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
        [
            'name'   => 'Manmohan Tiwari',
            'role'   => 'Faculty of All India Institute of Occult Science',
            'image'  => 'image/astrology assests/manmohan sir.webp',
            'bullets' => [
                ['text' => 'Trained under The Guidance of Gurudev Shri Kashyap', 'highlight' => null],
                ['text' => 'Mentored Over __900+__ Learners', 'highlight' => '900+'],
                ['text' => 'He is a research scholar in astrology at Banaras Hindu University and brings over 12 years of dedicated experience.', 'highlight' => null],
            ],
        ],
    ],
])

<section class="w-full mt-8 md:mt-12 pt-6 md:pt-8 pb-12 md:pb-16" style="background-color:#FCEDEC;">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-6 md:mb-10">
            <h2 class="text-heading font-bold text-neutral-b tracking-[0.9px] mb-3">{{ $title }}</h2>
        </div>

        {{-- ── MOBILE: simple slider (photo left, name + Read More right) ── --}}
        <div class="md:hidden flex items-stretch gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide [&::-webkit-scrollbar]:hidden pb-2">
            @foreach($mentors as $mentor)
            <div class="snap-center shrink-0 w-[82%] bg-white rounded-2xl shadow-md px-4 py-6 flex items-center gap-4">
                <div class="shrink-0 w-20 h-20 rounded-full overflow-hidden border-2 border-[#8B0000] bg-neutral-100">
                    <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $mentor['image'])))) }}"
                         alt="{{ $mentor['name'] }}"
                         class="w-full h-full object-cover object-top" loading="lazy">
                </div>
                <div class="flex flex-col">
                    <p class="font-bold text-neutral-b text-base leading-snug">{{ $mentor['name'] }}</p>
                    <p class="text-xs text-neutral-e leading-snug mt-1">({{ $mentor['role'] }})</p>
                    <button type="button" onclick="openMentorModal({{ $loop->index }})"
                            class="text-[#CC2200] font-semibold text-sm mt-3 self-start">
                        Read More....
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── DESKTOP: detailed cards grid ── --}}
        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($mentors as $mentor)
            <div class="shrink-0 w-[78vw] sm:w-[60vw] md:w-auto bg-white border border-neutral-200 rounded-xl p-4 flex flex-col gap-3 shadow-sm hover:shadow-md transition-shadow duration-200">

                {{-- Avatar + Name --}}
                <div class="flex items-center gap-3">
                    <div class="shrink-0 w-12 h-12 rounded-full overflow-hidden border-2 border-neutral-200 bg-neutral-100">
                        <img
                            src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $mentor['image'])))) }}"
                            alt="{{ $mentor['name'] }}"
                            class="w-full h-full object-cover object-top"
                            loading="lazy">
                    </div>
                    <div>
                        <p class="font-bold text-neutral-b text-sm leading-snug">{{ $mentor['name'] }}</p>
                        <p class="text-[11px] text-neutral-e leading-snug mt-0.5">({{ $mentor['role'] }})</p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-neutral-100"></div>

                {{-- Bullets --}}
                <ul class="space-y-2">
                    @foreach($mentor['bullets'] as $bullet)
                    <li class="flex items-start gap-1.5 text-xs text-neutral-b">
                        <span class="shrink-0 mt-0.5 w-3.5 h-3.5 rounded-full bg-neutral-b flex items-center justify-center">
                            <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <span>
                            @if($bullet['highlight'])
                                @php
                                    $parts = explode($bullet['highlight'], $bullet['text']);
                                @endphp
                                {{ $parts[0] }}<span class="text-[#CC2200] font-bold">{{ $bullet['highlight'] }}</span>{{ $parts[1] ?? '' }}
                            @else
                                {{ $bullet['text'] }}
                            @endif
                        </span>
                    </li>
                    @endforeach
                </ul>

            </div>
            @endforeach
        </div>

    </div>

    {{-- ── Mentor detail popup ── --}}
    <div id="mentor-modal" class="fixed inset-0 z-[60] hidden items-center justify-center p-4"
         onclick="if(event.target===this) closeMentorModal()">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-md max-h-[85vh] overflow-y-auto p-6">

            {{-- Close --}}
            <button type="button" onclick="closeMentorModal()"
                    class="absolute top-3 right-3 w-8 h-8 rounded-full bg-neutral-100 flex items-center justify-center text-neutral-b hover:bg-neutral-200"
                    aria-label="Close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Header --}}
            <div class="flex flex-col items-center text-center mb-4">
                <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-[#8B0000] bg-neutral-100 mb-3">
                    <img id="mentor-modal-img" src="" alt="" class="w-full h-full object-cover object-top">
                </div>
                <h3 id="mentor-modal-name" class="text-lg font-bold text-neutral-b"></h3>
                <p id="mentor-modal-role" class="text-xs text-neutral-e mt-1"></p>
            </div>

            {{-- Bullets --}}
            <ul id="mentor-modal-bullets" class="space-y-2.5"></ul>
        </div>
    </div>
</section>

@php
    $mentorData = collect($mentors)->map(function ($m) {
        return [
            'name'  => $m['name'],
            'role'  => $m['role'],
            'image' => asset(implode('/', array_map('rawurlencode', explode('/', $m['image'])))),
            'bullets' => collect($m['bullets'])->map(function ($b) {
                if (!empty($b['highlight'])) {
                    $parts = explode($b['highlight'], $b['text']);
                    return e($parts[0] ?? '') . '<span class="text-[#CC2200] font-bold">' . e($b['highlight']) . '</span>' . e($parts[1] ?? '');
                }
                return e($b['text']);
            })->values(),
        ];
    })->values();
@endphp

<script>
    window.__mentors = @json($mentorData);

    function openMentorModal(index) {
        var m = window.__mentors[index];
        if (!m) return;
        document.getElementById('mentor-modal-img').src   = m.image;
        document.getElementById('mentor-modal-img').alt   = m.name;
        document.getElementById('mentor-modal-name').textContent = m.name;
        document.getElementById('mentor-modal-role').textContent = '(' + m.role + ')';

        var ul = document.getElementById('mentor-modal-bullets');
        ul.innerHTML = m.bullets.map(function (html) {
            return '<li class="flex items-start gap-2 text-sm text-neutral-b">' +
                   '<span class="shrink-0 mt-0.5 w-4 h-4 rounded-full flex items-center justify-center" style="background-color:#8B0000;">' +
                   '<svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>' +
                   '</span><span>' + html + '</span></li>';
        }).join('');

        var modal = document.getElementById('mentor-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeMentorModal() {
        var modal = document.getElementById('mentor-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }
</script>
