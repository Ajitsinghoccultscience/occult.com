@props([
    'title' => 'Who Uses Astrology ?',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'bgImage' => 'images/graphology image/who uses graphology.webp',
    'iconsPath' => 'images/astrology webinar',
    'items' => [
        [
            'icon' => 'executive coaches.svg',
            'title' => 'Executive Coaches',
            'titleLine1' => 'Executive',
            'titleLine2' => 'Coaches',
            'description' => 'Leadership consultants use birth charts to help bosses understand their management style. By looking at planetary positions, they can identify "blind spots" in decision-making and suggest the best timing for major business moves.',
        ],
        [
            'icon' => 'financial analysts.svg',
            'title' => 'Financial Analysts',
            'titleLine1' => 'Financial',
            'titleLine2' => 'Analysts',
            'description' => 'Specialised analysts study planetary cycles to find patterns in the stock market. They compare historical market crashes and booms with celestial movements to help predict periods of risk or economic growth.',
        ],
        [
            'icon' => 'relationship counselor.svg',
            'title' => 'Relationship Counselors',
            'titleLine1' => 'Relationship',
            'titleLine2' => 'Counselors',
            'description' => 'Counsellors compare the charts of two people to see where they naturally click and where they might clash. This helps couples understand each other\'s emotional needs and communication styles without feeling like one person is "wrong."',
        ],
        [
            'icon' => 'team builder.svg',
            'title' => 'Team Builders',
            'titleLine1' => 'Team',
            'titleLine2' => 'Builders',
            'description' => 'Some hiring managers use astrology to create a "balanced" team. They try to mix different personality types, like the practical "Earth" signs and the creative "Fire" signs, to make sure a department has both steady workers and big thinkers.',
        ],
        [
            'icon' => 'wellness.svg',
            'title' => 'Wellness Practitioners',
            'description' => 'Holistic health experts use astrology to understand how a person might respond to stress. By tracking the planets, they can suggest the best times for a client to focus on rest or start a new fitness routine based on their natural energy levels.',
        ],
        [
            'icon' => 'career guide.svg',
            'title' => 'Career Guides',
            'description' => 'Counsellors use specific points in a chart to help people find their "true calling." Instead of just finding any job, they help clients choose a career path that matches their natural talents and long-term life goals.',
        ],
    ],
])

<section class="w-full min-h-[42rem] bg-neutral-red relative">
    <div class="relative max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-12 md:py-16 flex flex-col justify-center">
        {{-- Title with wavy underline --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-button-gradient mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- MOBILE: 2-column grid of cards (icon + title only) --}}
        <div class="grid grid-cols-2 gap-4 md:hidden">
            @foreach($items as $item)
                <x-ui.card variant="white" :padding="false" class="flex flex-col items-center justify-center gap-3 p-4 text-center min-h-[9rem]">
                    <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="" class="w-[2.625rem] h-[2.625rem] object-contain shrink-0">
                    <h3 class="text-subheading font-bold text-neutral-b leading-snug">
                        @if(!empty($item['titleLine1']) && !empty($item['titleLine2']))
                            {{ $item['titleLine1'] }}<br>{{ $item['titleLine2'] }}
                        @else
                            {{ $item['title'] }}
                        @endif
                    </h3>
                </x-ui.card>
            @endforeach
        </div>

        {{-- DESKTOP: 2 columns, 3 items each (icon + title + description) --}}
        <div class="hidden md:grid grid-cols-2 gap-6 lg:gap-10">
            @foreach(array_chunk($items, 3) as $column)
                <div class="flex flex-col gap-6 lg:gap-8">
                    @foreach($column as $item)
                        <div class="flex items-center gap-4">
                            <div class="w-[6.625rem] h-[6.875rem] rounded-10 bg-white flex items-center justify-center shrink-0 p-4">
                                <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="" class="w-[2.625rem] h-[2.625rem] object-contain">
                            </div>
                            <div class="flex-1 min-w-0 flex flex-col gap-2">
                                <h3 class="text-subheading font-bold text-white">{{ $item['title'] }}</h3>
                                <p class="text-content text-neutral-h tracking-[0.48px]">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
