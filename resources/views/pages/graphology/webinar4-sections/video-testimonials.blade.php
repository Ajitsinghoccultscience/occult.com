@php
    // YouTube IDs reused from the Alumni video-testimonials section
    $videos = [
        ['name' => 'Vaibhav Sharma', 'date' => '18-02-2026', 'video' => 'SMImDRJrCY0'],
        ['name' => 'Vaibhav Sharma', 'date' => '18-02-2026', 'video' => 'RI637QVE648'],
        ['name' => 'Vaibhav Sharma', 'date' => '18-02-2026', 'video' => 'mEcnaSkIVfY'],
        ['name' => 'Vaibhav Sharma', 'date' => '18-02-2026', 'video' => 'GW4WpHXgb_4'],
    ];
@endphp

{{-- ═══════════════════════════════════
     VIDEO TESTIMONIALS (YouTube — click to play inline)
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-[1340px] mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                Hear straight from our Webinar attendees
            </h2>
        </div>

        {{-- Video cards: swipeable horizontal slider --}}
        <div class="flex gap-5 md:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden" id="video-testimonials-slider">
            @foreach($videos as $v)
                <div class="snap-center shrink-0 w-[72%] sm:w-[calc(50%_-_0.625rem)] lg:w-[calc(25%_-_1.125rem)] relative rounded-xl overflow-hidden aspect-[3/4] bg-black shadow-md">

                    {{-- Lazy click-to-play facade — no iframe until clicked --}}
                    <div class="yt-facade absolute inset-0 w-full h-full cursor-pointer group"
                         data-vid="{{ $v['video'] }}">

                        <img src="https://i.ytimg.com/vi/{{ $v['video'] }}/hqdefault.jpg"
                             alt="Play testimonial from {{ $v['name'] }}"
                             class="w-full h-full object-cover"
                             loading="lazy">

                        {{-- Dark gradient for text readability --}}
                        <div class="absolute inset-0" style="background:linear-gradient(to bottom,rgba(0,0,0,0.15) 50%,rgba(0,0,0,0.75) 100%);"></div>

                        {{-- Red YouTube play button --}}
                        <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-transform group-hover:scale-110"
                              style="background-color:#ff0000;">
                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </span>

                        {{-- Name + date --}}
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white pointer-events-none">
                            <p class="text-sm font-semibold leading-tight">{{ $v['name'] }}</p>
                            <p class="text-xs text-white/80">Attend on {{ $v['date'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@push('scripts')
<script defer>
document.addEventListener('click', function (e) {
    var facade = e.target.closest('.yt-facade');
    if (!facade) return;
    var vid = facade.dataset.vid;
    var iframe = document.createElement('iframe');
    iframe.src = 'https://www.youtube.com/embed/' + vid + '?rel=0&autoplay=1';
    iframe.title = 'YouTube video';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
    iframe.allowFullscreen = true;
    iframe.referrerPolicy = 'strict-origin-when-cross-origin';
    iframe.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;';
    facade.replaceWith(iframe);
});
</script>
@endpush
