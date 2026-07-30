@php
    /*
     * SVG viewBox="0 0 100 360", justify-around 7 items, y-axis max = 80%
     * x centres = 7.14, 21.43, 35.71, 50, 64.29, 78.57, 92.86
     * y = 360 - (pct/80 * 360)
     */
    $bars = [
        ['pct'=>10, 'x'=>7.14,  'y'=>315],
        ['pct'=>12, 'x'=>21.43, 'y'=>306],
        ['pct'=>18, 'x'=>35.71, 'y'=>279],
        ['pct'=>25, 'x'=>50,    'y'=>247.5],
        ['pct'=>33, 'x'=>64.29, 'y'=>211.5],
        ['pct'=>50, 'x'=>78.57, 'y'=>135],
        ['pct'=>68, 'x'=>92.86, 'y'=>54],
    ];
    $trendPoints = implode(' ', array_map(fn($b) => $b['x'].','.$b['y'], $bars));
    $lastBar     = end($bars);

    $checklist = [
        'Handwriting and signature analysis for individuals',
        'Candidate screening support for companies and HR teams',
        'Career guidance for students and parents',
        'Compatibility analysis before marriage or business partnerships',
        'Personality reports as an add-on to your existing counselling, coaching or training work',
    ];
@endphp

{{-- ═══════════════════════════════════
     HOW THIS SKILL EARNS YOU MONEY
════════════════════════════════════ --}}
<section class="w-full py-12 md:py-16">
    <div class="max-w-335 mx-auto section-px">

        {{-- Heading --}}
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-2xl md:text-[2rem] font-bold text-neutral-b mb-3">
                How This Skill Earns You Money
            </h2>
            <p class="text-sm md:text-base text-neutral-b/70 max-w-[700px] mx-auto">
                Graphology is a paid professional service. Once you learn it, you can charge for:
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-14 lg:items-center">

            {{-- Left: checklist + result --}}
            <div class="order-1">
                <ul class="space-y-4 mb-6">
                    @foreach($checklist as $item)
                        <li class="flex items-start gap-3">
                            <span class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center mt-0.5" style="background-color:#ff9700;">
                                <svg viewBox="0 0 12 12" class="w-3 h-3" fill="none">
                                    <path d="M2.5 6.5L4.75 8.75L9.5 3.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="text-sm md:text-base text-neutral-b/80 leading-relaxed">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="rounded-lg p-4 text-sm md:text-base text-neutral-b/80 leading-relaxed"
                     style="background-color:#FBEBD7;">
                    <span class="font-bold text-neutral-b">Result:</span>
                    Better decisions, better client value, stronger professional positioning, and
                    <strong>higher income opportunity.</strong>
                </div>
            </div>

            {{-- Right: chart --}}
            <div class="order-2" id="ib-wrap">
                <div class="rounded-2xl p-5 pt-6 select-none" style="background:linear-gradient(135deg,#1a1a2e 0%,#2b2724 100%);">

                    <div class="flex gap-2">

                        {{-- Y-axis ticks --}}
                        <div class="flex flex-col justify-between text-right shrink-0 w-8" style="height:360px;">
                            @foreach(['80%','70%','60%','50%','40%','30%','20%','10%','0%'] as $tick)
                                <span class="text-[9px] text-white/40 leading-none">{{ $tick }}</span>
                            @endforeach
                        </div>

                        {{-- Chart area --}}
                        <div class="relative flex-1" style="height:360px;" id="ib-chart">

                            {{-- Grid lines --}}
                            <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                                @foreach(range(0, 8) as $_)
                                    <div class="border-t border-white/10 w-full"></div>
                                @endforeach
                            </div>

                            {{-- Bars --}}
                            <div class="absolute inset-0 flex items-end justify-around" id="ib-bars">
                                @foreach($bars as $idx => $b)
                                    <div class="ib-col flex flex-col items-center justify-end h-full"
                                         data-pct="{{ ($b['pct'] / 80) * 100 }}"
                                         data-value="{{ $b['pct'] }}%"
                                         data-idx="{{ $idx }}"
                                         style="flex:1;cursor:pointer;">
                                        <div class="ib-bar w-4/5 rounded-t-md"
                                             style="height:0;
                                                    background:linear-gradient(to top,#c96f00,#ff9700,#ffb940);
                                                    box-shadow:0 0 10px rgba(255,151,0,0.3);
                                                    transition:height 0.9s cubic-bezier(.22,.61,.36,1),filter 0.2s,box-shadow 0.2s;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- SVG: trend line + cursor + traveling dot --}}
                            <svg id="ib-svg"
                                 class="absolute inset-0 w-full h-full overflow-visible pointer-events-none"
                                 viewBox="0 0 100 360"
                                 preserveAspectRatio="none">

                                <defs>
                                    <linearGradient id="ibAreaGrad" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#ff9700" stop-opacity="0.20"/>
                                        <stop offset="100%" stop-color="#ff9700" stop-opacity="0"/>
                                    </linearGradient>
                                    <filter id="ibGlow">
                                        <feGaussianBlur stdDeviation="1.5" result="blur"/>
                                        <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                                    </filter>
                                </defs>

                                {{-- Area fill --}}
                                <polygon id="ib-area"
                                         points="{{ $trendPoints }} {{ $lastBar['x'] }},360 {{ $bars[0]['x'] }},360"
                                         fill="url(#ibAreaGrad)" opacity="0"
                                         style="transition:opacity 0.6s ease 1.4s;"/>

                                {{-- Static trend line --}}
                                <polyline id="ib-trend"
                                          points="{{ $trendPoints }}"
                                          fill="none" stroke="#ff9700" stroke-width="0.6"
                                          stroke-linecap="round" stroke-linejoin="round"
                                          stroke-dasharray="200" stroke-dashoffset="200"
                                          opacity="0.5"
                                          style="transition:stroke-dashoffset 1.4s ease 0.5s;"/>

                                {{-- Data-point circles --}}
                                @foreach($bars as $idx => $b)
                                    <circle class="ib-dot"
                                            cx="{{ $b['x'] }}" cy="{{ $b['y'] }}"
                                            r="1.2" fill="#ff9700"
                                            style="opacity:0;transition:opacity 0.3s ease {{ 800 + $idx * 150 }}ms;"/>
                                @endforeach

                                {{-- Vertical cursor line --}}
                                <line id="ib-cursor"
                                      x1="{{ $bars[0]['x'] }}" y1="0"
                                      x2="{{ $bars[0]['x'] }}" y2="360"
                                      stroke="#ff9700" stroke-width="0.5"
                                      stroke-dasharray="3,2" opacity="0"/>

                                {{-- Traveling dot (on top) --}}
                                <circle id="ib-dot-travel"
                                        cx="{{ $bars[0]['x'] }}" cy="{{ $bars[0]['y'] }}"
                                        r="2" fill="#fff"
                                        stroke="#ff9700" stroke-width="0.6"
                                        filter="url(#ibGlow)"
                                        opacity="0"/>
                            </svg>

                            {{-- HTML tooltip (follows cursor) --}}
                            <div id="ib-tooltip"
                                 class="absolute pointer-events-none z-10 -translate-x-1/2 -translate-y-full"
                                 style="opacity:0;transition:opacity 0.2s;top:0;left:0;">
                                <div class="text-[10px] sm:text-xs font-bold text-white rounded px-2 py-0.5 whitespace-nowrap"
                                     style="background:#ff9700;box-shadow:0 2px 8px rgba(255,151,0,0.5);">
                                    <span id="ib-tooltip-val">10%</span>
                                </div>
                                <div class="w-2 h-2 mx-auto -mt-px" style="background:#ff9700;clip-path:polygon(0 0,100% 0,50% 100%);"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
<script defer>
(function () {
    var wrap = document.getElementById('ib-wrap');
    if (!wrap) return;

    /* ── elements ── */
    var bars      = wrap.querySelectorAll('.ib-bar');
    var cols      = wrap.querySelectorAll('.ib-col');
    var trendLine = document.getElementById('ib-trend');
    var area      = document.getElementById('ib-area');
    var dots      = wrap.querySelectorAll('.ib-dot');
    var cursor    = document.getElementById('ib-cursor');
    var travelDot = document.getElementById('ib-dot-travel');
    var tooltip   = document.getElementById('ib-tooltip');
    var tipVal    = document.getElementById('ib-tooltip-val');
    var chartEl   = document.getElementById('ib-chart');

    /* ── data points (SVG viewBox 0 0 100 240) ── */
    var PTS = [
        {x:7.14,  y:315,   value:'10%'},
        {x:21.43, y:306,   value:'12%'},
        {x:35.71, y:279,   value:'18%'},
        {x:50,    y:247.5, value:'25%'},
        {x:64.29, y:211.5, value:'33%'},
        {x:78.57, y:135,   value:'50%'},
        {x:92.86, y:54,    value:'68%'},
    ];

    var TRAVEL_MS = 5000;   // full traversal
    var PAUSE_MS  = 1800;   // hold at last point
    var TOTAL_MS  = TRAVEL_MS + PAUSE_MS;

    var rafId     = null;
    var startTs   = null;
    var hoveredIdx = -1;    // -1 = auto mode
    var initDone  = false;

    /* ── interpolate position ── */
    function getPosAtT(t) {
        t = Math.max(0, Math.min(t, PTS.length - 1));
        var seg = Math.min(Math.floor(t), PTS.length - 2);
        var f   = t - seg;
        return {
            x:    PTS[seg].x + (PTS[seg+1].x - PTS[seg].x) * f,
            y:    PTS[seg].y + (PTS[seg+1].y - PTS[seg].y) * f,
            near: Math.round(t),
        };
    }

    /* ── move cursor + tooltip to SVG position ── */
    function moveTo(pos) {
        cursor.setAttribute('x1', pos.x);
        cursor.setAttribute('x2', pos.x);
        travelDot.setAttribute('cx', pos.x);
        travelDot.setAttribute('cy', pos.y);

        /* convert SVG coords → % of chart container */
        var xPct = pos.x;                        /* viewBox x is 0-100 */
        var yPct = (pos.y / 360) * 100;          /* viewBox y is 0-360 */

        tooltip.style.left = xPct + '%';
        tooltip.style.top  = yPct + '%';
        tipVal.textContent = PTS[pos.near].value;

        /* highlight active bar, dim rest */
        cols.forEach(function (col, i) {
            var bar = col.querySelector('.ib-bar');
            if (i === pos.near) {
                bar.style.filter     = 'brightness(1.3)';
                bar.style.boxShadow  = '0 0 18px rgba(255,151,0,0.7)';
            } else {
                bar.style.filter     = 'brightness(0.65)';
                bar.style.boxShadow  = '0 0 10px rgba(255,151,0,0.2)';
            }
        });
    }

    /* ── animation loop ── */
    function loop(ts) {
        if (hoveredIdx >= 0) { rafId = requestAnimationFrame(loop); return; }
        if (!startTs) startTs = ts;

        var elapsed = (ts - startTs) % TOTAL_MS;
        var t = elapsed < TRAVEL_MS
            ? (elapsed / TRAVEL_MS) * (PTS.length - 1)
            : PTS.length - 1;

        moveTo(getPosAtT(t));
        rafId = requestAnimationFrame(loop);
    }

    /* ── initial one-time entry animation ── */
    function initAnimate() {
        if (initDone) return;
        initDone = true;

        /* grow bars */
        bars.forEach(function (bar, i) {
            var pct = bar.parentElement.dataset.pct;
            setTimeout(function () { bar.style.height = pct + '%'; }, i * 130);
        });

        /* draw trend line + area */
        setTimeout(function () {
            trendLine.style.strokeDashoffset = '0';
            area.style.opacity = '1';
        }, 400);

        /* show data dots */
        dots.forEach(function (d) { d.style.opacity = '1'; });

        /* after bars finish → start cursor loop */
        setTimeout(function () {
            cursor.setAttribute('opacity', '1');
            travelDot.setAttribute('opacity', '1');
            tooltip.style.opacity = '1';
            startTs = null;
            rafId = requestAnimationFrame(loop);
        }, bars.length * 130 + 600);
    }

    /* ── hover: pause on a specific bar ── */
    cols.forEach(function (col) {
        col.addEventListener('mouseenter', function () {
            hoveredIdx = parseInt(col.dataset.idx);
            moveTo({x: PTS[hoveredIdx].x, y: PTS[hoveredIdx].y, near: hoveredIdx});
        });
        col.addEventListener('mouseleave', function () {
            hoveredIdx = -1;
            startTs = null; /* restart cycle from current position */
        });
    });

    /* ── IntersectionObserver ── */
    new IntersectionObserver(function (entries, obs) {
        if (entries[0].isIntersecting) {
            initAnimate();
            obs.disconnect();
        }
    }, { threshold: 0.3 }).observe(wrap);
})();
</script>
@endpush
