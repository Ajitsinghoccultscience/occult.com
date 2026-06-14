@php $link = $link ?? null; @endphp

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Link name <span class="text-red-500">*</span></label>
        <input type="text" name="label" value="{{ old('label', $link->label ?? '') }}" placeholder="e.g. Reena Astrology"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
        <p class="text-[10px] text-slate-400 mt-1">A name to identify this link. The URL slug is generated from it automatically.</p>
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">URL slug <span class="text-slate-300">(optional)</span></label>
        <input type="text" name="slug" value="{{ old('slug', $link->slug ?? '') }}" placeholder="auto from name"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
        <p class="text-[10px] text-slate-400 mt-1">Leave blank to auto-generate. Lowercase, letters/numbers/dashes.</p>
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Offer timer</label>
        <div class="relative">
            <input type="number" name="lp_timer_minutes" value="{{ old('lp_timer_minutes', $link->lp_timer_minutes ?? '') }}" min="0" placeholder="30"
                   class="w-full border border-gray-200 rounded-lg pl-3 pr-12 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400">min</span>
        </div>
    </div>
    <div class="col-span-2">
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Course title</label>
        <input type="text" name="lp_course_name" value="{{ old('lp_course_name', $link->lp_course_name ?? '') }}" placeholder="Astrology Certificate Course"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Enrolled text</label>
        <input type="text" name="lp_enrolled" value="{{ old('lp_enrolled', $link->lp_enrolled ?? '') }}" placeholder="50,000+ enrolled"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Rating</label>
        <input type="text" name="lp_rating" value="{{ old('lp_rating', $link->lp_rating ?? '') }}" placeholder="4.9"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
    </div>
    <div class="col-span-2">
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Seats text</label>
        <input type="text" name="lp_seats" value="{{ old('lp_seats', $link->lp_seats ?? '') }}" placeholder="Limited seats left"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Price</label>
        <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">₹</span>
            <input type="number" name="lp_price" value="{{ old('lp_price', $link->lp_price ?? '') }}" min="0" placeholder="96000"
                   class="w-full border border-gray-200 rounded-lg pl-7 pr-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
        </div>
    </div>
    <div>
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Old price</label>
        <div class="relative">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-400">₹</span>
            <input type="number" name="lp_old_price" value="{{ old('lp_old_price', $link->lp_old_price ?? '') }}" min="0" placeholder="192000"
                   class="w-full border border-gray-200 rounded-lg pl-7 pr-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
        </div>
    </div>
    <div class="col-span-2">
        <label class="block text-[11px] font-semibold text-slate-500 mb-1">Discount label</label>
        <input type="text" name="lp_discount" value="{{ old('lp_discount', $link->lp_discount ?? '') }}" placeholder="50% OFF"
               class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 focus:border-[#8B0000]">
    </div>
</div>
