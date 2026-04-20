@props([
    'title'       => 'Mega Graphology Webinar',
    'description' => 'Join the Graphology webinar by All India Institute of Occult Science to decode your handwriting and unlock powerful insights.',
    'bullets' => [
        'Understand personality through handwriting analysis',
        'Discover hidden traits and behavior patterns',
        'Decode emotions and mindset from writing style',
        'Gain clarity for better decisions ',
    ],
    'ctaHref' => '#',
    'videoId' => 'fFa65yCAfw8',
])

<section class="w-full bg-white section-spacing pb-10 md:pb-16">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_0.7fr] gap-6 lg:gap-16 items-center">

            {{-- Title: order-1 on mobile, part of left col on desktop --}}
            <h2 class="order-1 lg:hidden text-heading font-bold text-neutral-b tracking-[0.9px] text-center">{{ $title }}</h2>

            {{-- RIGHT: YouTube video — order-2 on mobile, right col on desktop --}}
            <div class="order-2 lg:order-3 w-full aspect-video rounded-2xl overflow-hidden relative shadow-lg bg-neutral-e">
                @if(!empty($videoId))
                    <div class="what-astro-yt-facade absolute inset-0 cursor-pointer" data-ytid="{{ $videoId }}">
                        <img
                            src="https://i.ytimg.com/vi/{{ $videoId }}/maxresdefault.jpg"
                            alt="Astrology webinar intro video"
                            class="w-full h-full object-cover"
                            loading="lazy"
                            onerror="this.src='https://i.ytimg.com/vi/{{ $videoId }}/hqdefault.jpg'"
                        >
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                            <div class="w-20 h-20 rounded-full bg-red-600 flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-200">
                                <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-neutral-c">
                        <svg class="w-14 h-14 opacity-40" fill="currentColor" viewBox="0 0 24 24"><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="text-sm font-medium">Intro Video</span>
                    </div>
                @endif
            </div>

            {{-- LEFT: content — order-3 on mobile, left col on desktop --}}
            <div class="order-3 lg:order-1 lg:row-span-1 flex flex-col gap-6">
                {{-- Title hidden on mobile (shown above), visible on desktop --}}
                <h2 class="hidden lg:block text-heading font-bold text-neutral-b tracking-[0.9px] text-center lg:text-left">{{ $title }}</h2>

                <p class="text-content font-bold text-neutral-b leading-relaxed tracking-[0.48px]">
                    {{ $description }}
                </p>

                <ul class="space-y-3 text-content text-neutral-b tracking-[0.48px]">
                    @foreach($bullets as $bullet)
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 shrink-0 w-5 h-5 rounded-full flex items-center justify-center" style="background-color: #191F59;">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="white" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>

                <div>
                    <x-ui.button :href="$ctaHref" variant="grapho-cta" class="!py-4 !text-base font-bold !min-w-0">
                        Reserve Seat @₹49 <span class="line-through opacity-70 ml-1">₹199</span>
                    </x-ui.button>
                </div>
            </div>

        </div>
    </div>
</section>

<script defer>
document.querySelectorAll('.what-astro-yt-facade').forEach(function(facade) {
    facade.addEventListener('click', function() {
        var id = this.dataset.ytid;
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0';
        iframe.title = 'What is Astrology';
        iframe.className = 'absolute inset-0 w-full h-full';
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
        iframe.allowFullscreen = true;
        this.innerHTML = '';
        this.style.cursor = 'default';
        this.appendChild(iframe);
    });
});
</script>
