@props([
    'instituteName' => 'An Institute Build on Global Standard and 22 Years of Expertise',
    'since'         => 'Running Since March 2004',
    'gallery' => [
        ['src' => 'image/astrology assests/institute/Lamp-lighting-event.webp', 'caption' => 'Lamp Lighting Ceremony'],
        ['src' => 'image/astrology assests/institute/convocation.webp',         'caption' => 'Convocation 2025'],
        ['src' => 'image/astrology assests/institute/MP-as_chief.webp',         'caption' => 'MP as a Chief guest at our Convocation'],
        ['src' => 'image/astrology assests/institute/LampLighting.webp',        'caption' => 'Lamp Lighting Ceremony'],
        ['src' => 'image/astrology assests/institute/Founder-speech.webp',      'caption' => 'Founder Speech at Annual Convocation'],
        ['src' => 'image/astrology assests/institute/Our-faculty.webp',         'caption' => 'Our Faculty'],
        ['src' => 'image/astrology assests/institute/Grand-convocation.webp',   'caption' => 'Grand Convocation Ceremony'],
        ['src' => 'image/astrology assests/institute/Trusted-by.webp',          'caption' => 'Annual Convocation'],
        ['src' => 'image/astrology assests/institute/intitute-event.webp',      'caption' => 'Institute Event'],
        ['src' => 'image/astrology assests/institute/Education-day.webp',       'caption' => 'Our Certified Students'],
    ],
    'stats' => [
        ['icon' => 'image/astrology assests/certified students.svg', 'value' => '97 K+',   'label' => 'Certified Students'],
        ['icon' => 'image/astrology assests/instagram.svg',          'value' => '52,000+', 'label' => 'Instagram Followers'],
        ['icon' => 'image/astrology assests/youtube.svg',            'value' => '15,400+', 'label' => 'Youtube Followers'],
    ],
    'bullets'       => [
        'Registered under the Government of NCT of Delhi and ISO certified.',
        'Trusted by 97,000+ students for consistency, credibility, and professional excellence',
        'Structured learning process with expert guidance',
        'Globally recognized certification after course completion.',
         '24/7 student support with full access to recorded classes',
        'Students trained here are working as professional consultants across globe.',
    ],
])

<section class="w-full   ">
    <div class="max-w-[1400px]   mx-auto section-px bg-[#FFEEEE] py-4 md:py-8 rounded-md">

        {{-- Mobile order: heading → image → badges/bullets. Desktop: text left, image right. --}}
        <div class="grid grid-cols-1 md:grid-cols-[1fr_40%] gap-x-8 md:gap-x-12 items-center">

            {{-- Heading --}}
            <div class="text-center md:text-left md:col-start-1 md:row-start-1">
                <h2 class="text-subheading font-bold text-neutral-b leading-snug">{{ $instituteName }}</h2>
                <p class="text-xs font-semibold text-[#8B0000] mt-1">{{ $since }}</p>
            </div>

            {{-- Image gallery slider with caption overlay (right column on desktop, spans both rows) --}}
            @php $galleryId = 'ai-gallery-' . uniqid(); @endphp
            <div class="relative rounded-2xl overflow-hidden shadow-md md:col-start-2 md:row-start-1 md:row-span-2 aspect-[4/3]" id="{{ $galleryId }}">
                @foreach($gallery as $i => $photo)
                @php $enc = implode('/', array_map('rawurlencode', explode('/', $photo['src']))); @endphp
                <img src="{{ asset($enc) }}"
                     alt="{{ $photo['caption'] }}"
                     class="ai-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     @if($i === 0) loading="eager" fetchpriority="high" @else loading="lazy" @endif>
                @endforeach

                {{-- Gradient + caption overlay (same as webinar gallery) --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 right-0 px-4 py-2">
                    @foreach($gallery as $i => $photo)
                    <p class="ai-cap text-white text-sm font-semibold leading-snug {{ $i === 0 ? '' : 'hidden' }}">{{ $photo['caption'] }}</p>
                    @endforeach
                </div>

                {{-- Dots --}}
                <div class="absolute top-2 right-2 flex gap-1.5">
                    @foreach($gallery as $i => $photo)
                    <span class="ai-dot w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-white scale-125' : 'bg-white/40' }}"></span>
                    @endforeach
                </div>
            </div>

            {{-- Badges + bullets --}}
            <div class="flex flex-col gap-5 md:col-start-1 md:row-start-2">

                {{-- Stat badges --}}
                <div class="flex items-stretch divide-x divide-neutral-200 border border-neutral-200 rounded-xl shadow-sm w-fit overflow-hidden">
                    @foreach($stats as $stat)
                    <div class="flex items-center gap-2.5 px-4 py-3">
                        <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $stat['icon'])))) }}"
                             alt="" aria-hidden="true" class="w-6 h-6 object-contain shrink-0">
                        <div class="flex flex-col leading-tight">
                            <span class="text-neutral-b font-bold text-sm">{{ $stat['value'] }}</span>
                            <span class="text-neutral-e text-[11px]">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <ul class="flex flex-col gap-3">
                    @foreach($bullets as $bullet)
                    <li class="flex items-start gap-3 text-sm text-neutral-b leading-relaxed">
                        <span class="shrink-0 mt-0.5 w-5 h-5 rounded-full flex items-center justify-center" style="background-color:#8B0000;">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>

    </div>
</section>

<script>
(function () {
    var root = document.getElementById(@json($galleryId));
    if (!root) return;
    var imgs = Array.prototype.slice.call(root.querySelectorAll('.ai-slide'));
    var caps = Array.prototype.slice.call(root.querySelectorAll('.ai-cap'));
    var dots = Array.prototype.slice.call(root.querySelectorAll('.ai-dot'));
    if (imgs.length < 2) return;
    var current = 0;
    function show(i) {
        imgs.forEach(function (el, n) { el.style.opacity = n === i ? '1' : '0'; });
        caps.forEach(function (el, n) { el.classList.toggle('hidden', n !== i); });
        dots.forEach(function (el, n) {
            el.classList.toggle('bg-white', n === i);
            el.classList.toggle('scale-125', n === i);
            el.classList.toggle('bg-white/40', n !== i);
        });
        current = i;
    }
    setInterval(function () { show((current + 1) % imgs.length); }, 3000);
}());
</script>
