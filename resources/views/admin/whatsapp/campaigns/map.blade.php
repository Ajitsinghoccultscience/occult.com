@extends('admin.layouts.app')

@section('title', 'Map Columns')
@section('page-title', 'Map Sheet Columns')
@section('page-subtitle', 'Tell us which column corresponds to each template variable')

@section('content')

<div class="max-w-2xl">

    {{-- Progress steps --}}
    <div class="flex items-center gap-2 mb-6 text-xs font-semibold text-slate-400">
        <span class="text-green-600">1. Upload</span>
        <span>→</span>
        <span class="text-slate-800">2. Map Columns</span>
        <span>→</span>
        <span>3. Preview</span>
        <span>→</span>
        <span>4. Send</span>
    </div>

    <form method="POST" action="{{ route('admin.whatsapp.campaigns.preview', $campaign) }}">
        @csrf

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">

            <p class="text-sm font-semibold text-slate-700 mb-1">
                Template: <span class="text-green-700">{{ $template->name }}</span>
            </p>
            <p class="text-xs text-slate-400 mb-5">
                Map each variable below to the correct column in your uploaded sheet.
                @if(!empty($sample))
                    Row 1 sample values are shown for reference.
                @endif
            </p>

            {{-- Phone column --}}
            <div class="mb-5 pb-5 border-b border-gray-100">
                <div class="flex items-start gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">
                            Phone Number Column <span class="text-red-500">*</span>
                        </label>
                        <p class="text-xs text-slate-400 mb-2">The column containing mobile numbers</p>
                    </div>
                    <div class="w-52">
                        <select name="phone_col"
                                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-gray-400 bg-white">
                            @foreach($headers as $idx => $header)
                            <option value="{{ $idx }}">Col {{ $idx + 1 }}{{ $header ? ' — ' . $header : '' }}</option>
                            @endforeach
                        </select>
                        @if(!empty($sample))
                        <p class="text-xs text-slate-400 mt-1 font-mono">
                            Sample: {{ $sample[0] ?? '' }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Variable columns --}}
            @foreach($template->variables ?? [] as $var)
            <div class="flex items-start gap-4 py-3 border-b border-gray-50 last:border-0">
                <div class="flex-1">
                    <p class="text-sm font-semibold text-slate-700">
                        <span class="bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded-full font-mono">@php echo e('{{' . $var . '}}'); @endphp</span>
                    </p>
                </div>
                <div class="w-52">
                    <select name="col_{{ $var }}"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-gray-400 bg-white"
                            onchange="updateSample(this, '{{ $var }}')">
                        @foreach($headers as $idx => $header)
                        <option value="{{ $idx }}">Col {{ $idx + 1 }}{{ $header ? ' — ' . $header : '' }}</option>
                        @endforeach
                    </select>
                    <p id="sample_{{ $var }}" class="text-xs text-slate-400 mt-1 font-mono">
                        @if(!empty($sample)) Sample: {{ $sample[0] ?? '' }} @endif
                    </p>
                </div>
            </div>
            @endforeach

            @if(empty($template->variables))
            <p class="text-sm text-slate-400 py-4 text-center">This template has no variables — only the phone column is needed.</p>
            @endif

        </div>

        <div class="flex items-center gap-3 mt-5">
            <button type="submit"
                    class="text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:opacity-90 transition"
                    style="background-color:#25D366;">
                Preview Messages →
            </button>
            <a href="{{ route('admin.whatsapp.campaigns.index') }}"
               class="text-sm text-slate-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
const sample = @json($sample);

function updateSample(select, varName) {
    const idx = parseInt(select.value);
    const el  = document.getElementById('sample_' + varName);
    if (el && sample.length > 0) {
        el.textContent = 'Sample: ' + (sample[idx] ?? '');
    }
}
</script>
@endpush

@endsection
