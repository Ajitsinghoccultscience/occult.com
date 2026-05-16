@extends('admin.layouts.app')
@section('title', 'Edit ' . ucfirst($webinar->key) . ' Webinar')
@section('page-title', 'Edit Webinar Settings')
@section('page-subtitle', $webinar->webinar_name)

@section('content')

<div class="max-w-2xl">

    {{-- Back --}}
    <a href="{{ route('admin.webinars.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 mb-6 transition font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Webinars
    </a>

    @if($errors->any())
    <div class="mb-5 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600">
        @foreach($errors->all() as $e) <p>{{ $e }}</p> @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('admin.webinars.update', $webinar->key) }}">
        @csrf @method('PUT')

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,#8B0000,#c0392b);">
                    <svg class="w-4.5 h-4.5 text-white" style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ ucfirst($webinar->key) }} Webinar</p>
                    <p class="text-xs text-slate-400">Changes apply instantly across all pages</p>
                </div>
            </div>

            {{-- Fields --}}
            <div class="px-6 py-6 flex flex-col gap-5">

                {{-- Webinar Name --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest">Webinar Name</label>
                    <input type="text" name="webinar_name" value="{{ old('webinar_name', $webinar->webinar_name) }}" required
                           placeholder="e.g. Mega Astrology Webinar"
                           class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                </div>

                <div class="h-px bg-slate-100"></div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest -mb-2">Date & Time</p>

                {{-- Event Date --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-600">Event Date <span class="text-slate-400 font-normal">(shown on hero & thank-you)</span></label>
                    <input type="text" name="event_date" value="{{ old('event_date', $webinar->event_date) }}" required
                           placeholder="e.g. Sat, 16th May 2026"
                           class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                    <p class="text-[11px] text-slate-400">Format: Day, DDth Month YYYY</p>
                </div>

                {{-- Event Date Short --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-600">Short Date <span class="text-slate-400 font-normal">(pills, CTAs)</span></label>
                        <input type="text" name="event_date_short" value="{{ old('event_date_short', $webinar->event_date_short) }}" required
                               placeholder="e.g. May 16th"
                               class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-600">Attend Date <span class="text-slate-400 font-normal">(thank-you page)</span></label>
                        <input type="text" name="attend_date" value="{{ old('attend_date', $webinar->attend_date) }}" required
                               placeholder="e.g. May 16th"
                               class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                    </div>
                </div>

                {{-- Event Time --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-600">Event Time</label>
                    <input type="text" name="event_time" value="{{ old('event_time', $webinar->event_time) }}" required
                           placeholder="e.g. 2:00 PM – 4:00 PM IST"
                           class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                </div>

                <div class="h-px bg-slate-100"></div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest -mb-2">Community & Price</p>

                {{-- WhatsApp URL --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-600">WhatsApp Community Link</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </span>
                        <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $webinar->whatsapp_url) }}" required
                               placeholder="https://chat.whatsapp.com/..."
                               class="w-full border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                    </div>
                    <p class="text-[11px] text-slate-400">Used on thank-you page and course pages</p>
                </div>

                {{-- Price --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-600">Price (₹)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">₹</span>
                        <input type="text" name="price" value="{{ old('price', $webinar->price) }}" required
                               placeholder="99"
                               class="w-full border border-slate-200 rounded-xl pl-8 pr-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                    </div>
                </div>

                {{-- Description --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-600">Short Description <span class="text-slate-400 font-normal">(thank-you page)</span></label>
                    <input type="text" name="description" value="{{ old('description', $webinar->description) }}"
                           placeholder="e.g. decode your cosmic blueprint"
                           class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:border-[#8B0000] focus:bg-white transition">
                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-3">
                <a href="{{ route('admin.webinars.index') }}"
                   class="text-sm text-slate-500 font-medium hover:text-slate-700 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 text-sm font-bold text-white px-6 py-2.5 rounded-xl transition hover:opacity-90"
                        style="background:linear-gradient(135deg,#8B0000,#c0392b);box-shadow:0 4px 12px rgba(139,0,0,.25);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Changes
                </button>
            </div>

        </div>
    </form>
</div>

@endsection
