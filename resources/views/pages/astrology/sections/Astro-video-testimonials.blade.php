@props([
    'title' => 'Hear straight from our Alumni',
    'underlineSvg' => 'image/astrology assests/unerline 2 3.svg',
    'videos' => [
        ['youtube_id' => 'sSqUxmlI11A', 'name' => 'Kunj Bihari Sharma', 'attend_date' => 'Astrology Webinar Review'],
        ['youtube_id' => 'B5nho9l1nXw', 'name' => 'Jatin Kashyap',      'attend_date' => 'Astrology Webinar Review'],
        ['youtube_id' => '8UuOQOnjRWE', 'name' => 'Piyush Ji',           'attend_date' => 'Astrology Webinar Review'],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="flex flex-col md:flex-row md:items-center md:gap-12 lg:gap-16">

            {{-- Left: Title & supporting text --}}
            <div class="md:w-[32%] lg:w-[30%] shrink-0 mb-12 md:mb-0 text-center md:text-left">
                <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
                <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mx-auto md:mx-0" aria-hidden="true">
            </div>

            {{-- Right: Video carousel --}}
            <div class="flex-1 min-w-0">
        <x-ui.carousel variant="single" gridAt="none">
            @foreach($videos as $video)
                <x-ui.carousel-slide variant="single" gridAt="none" class="rounded-xl border-2 border-accent-gold overflow-hidden bg-neutral-e aspect-[358/543] relative">
                    @if(!empty($video['youtube_id']))
                        {{-- Lazy YouTube: show thumbnail, load iframe only on click --}}
                        <div class="yt-facade absolute inset-0 cursor-pointer" data-ytid="{{ $video['youtube_id'] }}">
                            <img
                                src="https://i.ytimg.com/vi/{{ $video['youtube_id'] }}/hqdefault.jpg"
                                alt="Testimonial from {{ $video['name'] }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 rounded-full bg-red-600/90 flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
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
            </div>{{-- end right --}}

        </div>{{-- end flex row --}}
    </div>
</section>

<script defer>
document.querySelectorAll('.yt-facade').forEach(function(facade) {
    facade.addEventListener('click', function() {
        var id = this.dataset.ytid;
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube.com/embed/' + id + '?autoplay=1';
        iframe.title = 'YouTube video';
        iframe.className = 'absolute inset-0 w-full h-full';
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
        iframe.allowFullscreen = true;
        this.replaceWith(iframe);
    });
});
</script>


