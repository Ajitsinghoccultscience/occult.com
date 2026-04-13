@props([
    'title' => 'Hear straight from our Alumni',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'videos' => [
        ['youtube_id' => 'SMImDRJrCY0', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'RI637QVE648', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'mEcnaSkIVfY', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'GW4WpHXgb_4', 'name' => 'Alumni Review', 'attend_date' => ''],
        ['youtube_id' => 'o6lFa3_9oLg', 'name' => 'Alumni Review', 'attend_date' => ''],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        {{-- Title with wavy underline --}}
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true" loading="lazy">
        </div>

        {{-- Video cards: carousel/slider on all screen sizes --}}
        <x-ui.carousel variant="single" gridAt="none">
            @foreach($videos as $video)
                <x-ui.carousel-slide variant="single" gridAt="none" class="rounded-xl border-2 border-accent-gold overflow-hidden bg-neutral-e aspect-[358/543] relative">
                    @if(!empty($video['youtube_id']))
                        {{-- Lazy click-to-play thumbnail — no YouTube iframe on load --}}
                        <div
                            class="yt-facade absolute inset-0 w-full h-full cursor-pointer"
                            data-vid="{{ $video['youtube_id'] }}"
                        >
                            <img
                                src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg"
                                alt="Play testimonial from {{ $video['name'] }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                            {{-- Red play button overlay --}}
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div style="width:68px;height:48px;background:#FF0000;border-radius:12px;display:flex;align-items:center;justify-content:center;opacity:0.92;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @endif
                    {{-- Name & date overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 pointer-events-none">
                        <p class="text-content font-semibold text-white">{{ $video['name'] }}</p>
                        <p class="text-sm text-white/90">{{ $video['attend_date'] }}</p>
                    </div>
                </x-ui.carousel-slide>
            @endforeach
        </x-ui.carousel>
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
