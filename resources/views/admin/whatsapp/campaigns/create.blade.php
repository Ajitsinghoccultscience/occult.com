@extends('admin.layouts.app')

@section('title', 'New Campaign')
@section('page-title', 'New WhatsApp Campaign')
@section('page-subtitle', 'Upload your contact sheet and select a template')

@section('content')

<div class="max-w-xl">
    <form method="POST" action="{{ route('admin.whatsapp.campaigns.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-5">

            {{-- Campaign Name --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Campaign Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="e.g. May Webinar Blast"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Template --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Message Template</label>
                @if($templates->isEmpty())
                    <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 text-sm px-4 py-3 rounded-xl">
                        No approved templates found.
                        <a href="{{ route('admin.whatsapp.templates.create') }}" class="underline font-semibold">Create one first.</a>
                    </div>
                @else
                    <select name="template_id" id="template_id" onchange="showPreview(this.value)"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400 bg-white">
                        <option value="">— Select template —</option>
                        @foreach($templates as $tpl)
                        <option value="{{ $tpl->id }}"
                                data-body="{{ e($tpl->body) }}"
                                data-vars="{{ implode(', ', $tpl->variables ?? []) }}"
                                {{ old('template_id') == $tpl->id ? 'selected' : '' }}>
                            {{ $tpl->name }}
                        </option>
                        @endforeach
                    </select>
                    {{-- Template preview --}}
                    <div id="tpl-preview" class="hidden mt-3 bg-slate-50 border border-slate-200 rounded-xl p-4">
                        <p class="text-xs font-semibold text-slate-500 mb-1">Message Preview</p>
                        <p id="tpl-body" class="text-sm text-slate-700 whitespace-pre-wrap"></p>
                        <p class="text-xs text-slate-400 mt-2">Variables: <span id="tpl-vars" class="font-mono"></span></p>
                    </div>
                @endif
                @error('template_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Sheet Upload --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Contact Sheet</label>
                <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-gray-300 transition cursor-pointer"
                     onclick="document.getElementById('sheet').click()">
                    <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                    </svg>
                    <p class="text-sm text-gray-400">Click to upload <span class="font-semibold text-gray-600">CSV or Excel</span></p>
                    <p class="text-xs text-gray-300 mt-1">Max 5 MB. First row must be column headers.</p>
                    <p id="file-name" class="text-xs text-green-600 font-semibold mt-2 hidden"></p>
                </div>
                <input type="file" id="sheet" name="sheet" accept=".csv,.xlsx,.xls"
                       class="hidden" onchange="showFilename(this)">
                @error('sheet')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

        </div>

        <div class="flex items-center gap-3 mt-5">
            <button type="submit"
                    class="text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:opacity-90 transition"
                    style="background-color:#25D366;">
                Continue →
            </button>
            <a href="{{ route('admin.whatsapp.campaigns.index') }}"
               class="text-sm text-slate-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function showFilename(input) {
    const el = document.getElementById('file-name');
    if (input.files.length) {
        el.textContent = input.files[0].name;
        el.classList.remove('hidden');
    }
}

function showPreview(templateId) {
    const opt = document.querySelector(`#template_id option[value="${templateId}"]`);
    const box = document.getElementById('tpl-preview');
    if (!opt || !templateId) { box.classList.add('hidden'); return; }
    document.getElementById('tpl-body').textContent = opt.dataset.body;
    document.getElementById('tpl-vars').textContent = opt.dataset.vars || 'none';
    box.classList.remove('hidden');
}

// Trigger on load if old value
const sel = document.getElementById('template_id');
if (sel && sel.value) showPreview(sel.value);
</script>
@endpush

@endsection
