@props([
    'title' => 'Featured in',
    'logos' => null,
])

@php
    $newsPath  = public_path('image/news');
    $mediaPath = public_path('images/media');
    if ($logos === null) {
        $files = [];
        foreach ([$newsPath, $mediaPath] as $dir) {
            if (is_dir($dir)) {
                $files = array_merge($files,
                    glob($dir . '/*.png')  ?: [],
                    glob($dir . '/*.jpg')  ?: [],
                    glob($dir . '/*.jpeg') ?: [],
                    glob($dir . '/*.svg')  ?: [],
                    glob($dir . '/*.webp') ?: []
                );
            }
        }
        $logos = array_map(fn($f) => str_replace(public_path() . '/', '', $f), $files);
        // keep only logo/vector files (exclude screenshot/article images)
        $logos = array_values(array_filter($logos, fn($f) =>
            preg_match('/logo|vector|Logo/i', basename($f))
        ));
        sort($logos);
    }
    $logos = $logos ?? [];
@endphp

<section class="w-full bg-neutral-bg shadow-drop">
    <div class="w-full overflow-hidden bg-white">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8 overflow-hidden py-5 md:py-6 section-px">
                <p class="text-[1.25rem] md:text-heading font-bold text-neutral-b tracking-[0.9px] shrink-0 text-center md:text-left">{{ $title }}</p>
                <div class="flex-1 min-w-0 overflow-hidden">
                    @if(count($logos) > 0)
                        <div class="flex animate-marquee w-max gap-8 md:gap-12">
                            @foreach(array_merge($logos, $logos) as $logo)
                                <img src="{{ asset($logo) }}" alt="" class="h-8 md:h-10 w-auto object-contain shrink-0" onerror="this.style.display='none'">
                            @endforeach
                        </div>
                    @else
                        <span class="text-sm text-neutral-e">Add images to public/images/media/</span>
                    @endif
                </div>
            </div>
        </div>
</section>
