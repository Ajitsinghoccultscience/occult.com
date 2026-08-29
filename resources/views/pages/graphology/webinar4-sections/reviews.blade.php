@php
    $reviews = [
        ['name' => 'Rohit Sharma',    'role' => 'HR Executive',       'avatar' => 'images/assets desktop/Rohan_Verma.avif',   'text' => "I've sat through a lot of hiring, but I never knew handwriting could tell me this much. Used it in an interview last week and caught a confidence issue the CV completely hid. Worth every second."],
        ['name' => 'Dr. Anjali Mehta','role' => 'Psychologist',       'avatar' => 'images/assets desktop/Priya_Sharma.avif',  'text' => "I joined half-expecting it to be vague, and it wasn't. The pressure and slant markers actually add a real layer to my client assessments now. Practical lesson, loved it!"],
        ['name' => 'Kavita Nair',     'role' => 'School Teacher',     'avatar' => 'images/assets desktop/ishika.avif',        'text' => "I finally understand why some of my quiet students behave the way they do. Just reading their handwriting differently has changed how I guide them. Small session, big shift."],
        ['name' => 'Suresh Patel',    'role' => 'Life Coach',         'avatar' => 'images/assets desktop/Vikram_Singh.avif',  'text' => "Started offering handwriting readings as an add-on and my clients love it. It's already brought me three new referrals this month. Honestly, I didn't expect income from just a webinar."],
        ['name' => 'Neha Gupta',      'role' => 'College Student',    'avatar' => 'image/graphology assests/alumni 2.webp',   'text' => "Had zero background in this. By the end of the session I could actually read basic traits from my own writing. Simple enough for a beginner, and genuinely fun."],
        ['name' => 'Manish Verma',    'role' => 'Corporate Trainer',  'avatar' => 'images/assets desktop/Aryan_Mehta.avif',   'text' => "I added personality analysis to my training programs after this and it's become my most-asked-for module. Clients see the value instantly, and I've been able to raise my fee."],
        ['name' => 'Farhan Ali',      'role' => 'Freelance Recruiter','avatar' => 'image/graphology assests/alumni 3.webp',   'text' => "The live handwriting examples were the best part, I got to practice with the mentor support. I use it now to shortlist candidates faster. Practical from day one."],
    ];
@endphp

{{-- ═══════════════════════════════════
     REVIEWS
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16" style="background-color:#FFFAF5;">
    <div class="max-w-335 mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-9 md:mb-12">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b">
                What Attendees Are Saying
            </h2>
        </div>

        {{-- Slider --}}
        <div class="relative">
            <div id="reviews-text-slider" class="flex gap-5 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 [&::-webkit-scrollbar]:hidden">
                @foreach($reviews as $r)
                    <div class="shrink-0 snap-center w-[280px] sm:w-[320px] bg-white rounded-2xl border border-neutral-b/10 shadow-sm p-5 md:p-6 flex flex-col">
                        {{-- Stars --}}
                        <div class="flex gap-0.5 mb-3">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4" fill="#ff9700" viewBox="0 0 24 24">
                                    <path d="M12 2l2.9 6.6 7.1.6-5.4 4.7 1.6 7-6.2-3.8-6.2 3.8 1.6-7L2 9.2l7.1-.6L12 2z"/>
                                </svg>
                            @endfor
                        </div>

                        <p class="text-sm text-neutral-b/80 leading-relaxed mb-5 flex-1">
                            "{{ $r['text'] }}"
                        </p>

                        <div class="flex items-center gap-3 pt-4 border-t border-neutral-b/10">
                            <span class="shrink-0 w-10 h-10 rounded-full overflow-hidden ring-2 ring-[#ff9700]">
                                <img src="{{ asset(implode('/', array_map('rawurlencode', explode('/', $r['avatar'])))) }}"
                                     alt="{{ $r['name'] }}"
                                     class="w-full h-full object-cover"
                                     loading="eager">
                            </span>
                            <div>
                                <p class="text-sm font-bold text-neutral-b leading-tight">{{ $r['name'] }}</p>
                                <p class="text-xs text-neutral-b/60">{{ $r['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Prev --}}
            <button type="button" onclick="document.getElementById('reviews-text-slider').scrollBy({left:-340,behavior:'smooth'})"
                    class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-neutral-b hover:bg-neutral-100 transition-colors"
                    aria-label="Previous">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next --}}
            <button type="button" onclick="document.getElementById('reviews-text-slider').scrollBy({left:340,behavior:'smooth'})"
                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 w-11 h-11 rounded-full bg-white shadow-md items-center justify-center text-neutral-b hover:bg-neutral-100 transition-colors"
                    aria-label="Next">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

    </div>
</section>
