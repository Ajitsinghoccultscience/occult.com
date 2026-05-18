@extends('admin.layouts.app')

@section('title', 'Preview Campaign')
@section('page-title', 'Preview Messages')
@section('page-subtitle', 'Check how messages will look before sending')

@section('content')

{{-- Progress steps --}}
<div class="flex items-center gap-2 mb-6 text-xs font-semibold text-slate-400">
    <span class="text-green-600">1. Upload</span>
    <span>→</span>
    <span class="text-green-600">2. Map Columns</span>
    <span>→</span>
    <span class="text-slate-800">3. Preview</span>
    <span>→</span>
    <span>4. Send</span>
</div>

{{-- Stats bar --}}
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $campaign->total_count }}</p>
        <p class="text-xs font-semibold mt-1 text-slate-500">Total Contacts</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $template->meta_name }}</p>
        <p class="text-xs font-semibold mt-1 text-slate-500">Template</p>
    </div>
    @if($invalidRows > 0)
    <div class="bg-red-50 border border-red-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-red-600">{{ $invalidRows }}</p>
        <p class="text-xs font-semibold mt-1 text-red-500">Rows Skipped (no phone)</p>
    </div>
    @else
    <div class="bg-green-50 border border-green-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-green-700">0</p>
        <p class="text-xs font-semibold mt-1 text-green-600">Invalid Rows</p>
    </div>
    @endif
</div>

{{-- Previews --}}
<div class="mb-6">
    <h2 class="text-sm font-bold text-slate-700 mb-3">Sample Messages (first {{ $previews->count() }})</h2>

    <div class="space-y-3">
        @foreach($previews as $preview)
        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm flex gap-4">
            <div class="flex-shrink-0">
                <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs text-slate-400 font-mono mb-1">To: {{ $preview['phone'] }}</p>
                <p class="text-sm text-slate-700 whitespace-pre-wrap">{{ $preview['message'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Actions --}}
<div class="flex items-center gap-4">
    <form method="POST" action="{{ route('admin.whatsapp.campaigns.launch', $campaign) }}">
        @csrf
        <button type="submit"
                onclick="return confirm('Send {{ $campaign->total_count }} messages? This cannot be undone.')"
                class="text-white text-sm font-bold px-7 py-3 rounded-xl hover:opacity-90 transition shadow-sm"
                style="background-color:#25D366;">
            Confirm & Send {{ $campaign->total_count }} Messages
        </button>
    </form>
    <a href="{{ route('admin.whatsapp.campaigns.map', $campaign) }}"
       class="text-sm text-slate-500 hover:underline">← Re-map columns</a>
</div>

@endsection
