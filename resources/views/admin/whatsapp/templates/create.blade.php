@extends('admin.layouts.app')

@section('title', isset($template) ? 'Edit Template' : 'New Template')
@section('page-title', isset($template) ? 'Edit Template' : 'New Template')
@section('page-subtitle', 'Submitted automatically to Meta for approval')

@section('content')

<div class="flex gap-6 items-start">

    {{-- ── FORM ── --}}
    <div class="flex-1 min-w-0">
        <form method="POST" enctype="multipart/form-data"
              action="{{ isset($template) ? route('admin.whatsapp.templates.update', $template) : route('admin.whatsapp.templates.store') }}">
            @csrf
            @if(isset($template)) @method('PUT') @endif

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-5">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Template Name</label>
                    <input type="text" name="name" value="{{ old('name', $template->name ?? '') }}"
                           placeholder="e.g. Webinar Reminder Day 1"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Meta Name --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Meta Template Name
                        <span class="font-normal text-slate-400 ml-1">— unique identifier sent to Meta</span>
                    </label>
                    <input type="text" name="meta_name" value="{{ old('meta_name', $template->meta_name ?? '') }}"
                           placeholder="webinar_reminder_day1"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:border-gray-400">
                    <p class="text-xs text-slate-400 mt-1">Lowercase letters, numbers and underscores only.</p>
                    @error('meta_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Language + Category --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Language</label>
                        <select name="language" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400 bg-white">
                            @php
                                $langs = ['en' => 'English', 'en_US' => 'English (US)', 'hi' => 'Hindi', 'mr' => 'Marathi'];
                                $selectedLang = old('language', $template->language ?? 'en');
                            @endphp
                            @foreach($langs as $code => $label)
                            <option value="{{ $code }}" {{ $selectedLang === $code ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Category</label>
                        <select name="category" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400 bg-white">
                            @php $selectedCat = old('category', $template->category ?? 'MARKETING'); @endphp
                            <option value="MARKETING"      {{ $selectedCat === 'MARKETING'      ? 'selected' : '' }}>Marketing</option>
                            <option value="UTILITY"        {{ $selectedCat === 'UTILITY'        ? 'selected' : '' }}>Utility</option>
                            <option value="AUTHENTICATION" {{ $selectedCat === 'AUTHENTICATION' ? 'selected' : '' }}>Authentication</option>
                        </select>
                    </div>
                </div>

                {{-- Header --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Header <span class="font-normal text-slate-400">(optional)</span></label>
                    @php $selectedHeader = old('header_type', $template->header_type ?? 'none'); @endphp

                    <div class="flex gap-2 mb-3">
                        @foreach(['none' => 'None', 'text' => 'Text', 'image' => 'Image', 'document' => 'PDF'] as $val => $label)
                        <label class="flex items-center gap-2 cursor-pointer border rounded-xl px-4 py-2.5 text-sm font-medium transition
                            {{ $selectedHeader === $val ? 'border-green-400 bg-green-50 text-green-700' : 'border-gray-200 text-slate-500 hover:border-gray-300' }}">
                            <input type="radio" name="header_type" value="{{ $val }}"
                                   {{ $selectedHeader === $val ? 'checked' : '' }}
                                   onchange="switchHeader('{{ $val }}')" class="hidden">
                            {{ $label }}
                        </label>
                        @endforeach
                    </div>

                    {{-- Text header input --}}
                    <div id="header-text-wrap" class="{{ $selectedHeader === 'text' ? '' : 'hidden' }}">
                        <input type="text" name="header_text"
                               value="{{ old('header_text', $template->header_text ?? '') }}"
                               placeholder="Your header text (max 60 chars)"
                               maxlength="60"
                               oninput="updatePreview()"
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-gray-400">
                        @error('header_text')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Image header input --}}
                    <div id="header-image-wrap" class="{{ $selectedHeader === 'image' ? '' : 'hidden' }}">
                        @if(isset($template) && $template->header_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $template->header_image) }}"
                                 class="h-24 rounded-xl object-cover border border-gray-200" alt="Current header">
                            <p class="text-xs text-slate-400 mt-1">Current image. Upload a new one to replace.</p>
                        </div>
                        @endif
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-gray-300 transition"
                             onclick="document.getElementById('header_image').click()">
                            <svg class="w-6 h-6 text-gray-300 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M13.5 10.5h.008v.008H13.5V10.5zm-7.5 9h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0021 4.5H6a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 006 19.5z"/>
                            </svg>
                            <p class="text-xs text-gray-400">Click to upload image <span class="font-semibold">JPG / PNG</span></p>
                            <p id="img-filename" class="text-xs text-green-600 font-semibold mt-1 hidden"></p>
                        </div>
                        <input type="file" id="header_image" name="header_image"
                               accept="image/jpeg,image/png"
                               class="hidden" onchange="previewImage(this)">
                        @error('header_image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Document (PDF) header input --}}
                    <div id="header-document-wrap" class="{{ $selectedHeader === 'document' ? '' : 'hidden' }}">
                        @if(isset($template) && $template->header_document)
                        <div class="mb-2 flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM8 17h8v1H8v-1zm0-3h8v1H8v-1zm0-3h5v1H8v-1z"/>
                            </svg>
                            <span class="text-xs text-slate-600 truncate">{{ basename($template->header_document) }}</span>
                            <a href="{{ asset('storage/' . $template->header_document) }}" target="_blank"
                               class="text-xs text-blue-600 underline ml-auto whitespace-nowrap">View</a>
                        </div>
                        <p class="text-xs text-slate-400 mb-2">Current PDF. Upload a new one to replace.</p>
                        @endif
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-gray-300 transition"
                             onclick="document.getElementById('header_document').click()">
                            <svg class="w-6 h-6 text-gray-300 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                            </svg>
                            <p class="text-xs text-gray-400">Click to upload <span class="font-semibold">PDF</span> (max 10MB)</p>
                            <p id="pdf-filename" class="text-xs text-green-600 font-semibold mt-1 hidden"></p>
                        </div>
                        <input type="file" id="header_document" name="header_document"
                               accept="application/pdf"
                               class="hidden" onchange="previewPdf(this)">
                        @error('header_document')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Body --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Message Body</label>
                    <textarea id="body" name="body" rows="5"
                              placeholder="Hi @{{name}}, your webinar is on @{{date}} at @{{time}}. Join here: @{{link}}"
                              class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-mono focus:outline-none focus:border-gray-400 resize-y"
                              oninput="detectVars(this.value); updatePreview()">{{ old('body', $template->body ?? '') }}</textarea>
                    @error('body')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    <div id="var-preview" class="mt-2 flex flex-wrap gap-1.5" style="min-height:20px;"></div>
                </div>

                {{-- Example Values --}}
                <div id="example-section" class="hidden">
                    <label class="block text-sm font-semibold text-slate-700 mb-1">
                        Example Values
                        <span class="font-normal text-slate-400 ml-1">— required by Meta</span>
                    </label>
                    <div id="example-inputs" class="space-y-2"></div>
                </div>

            </div>

            <div class="flex items-center gap-3 mt-5">
                <button type="submit"
                        class="text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:opacity-90 transition"
                        style="background-color:#25D366;">
                    {{ isset($template) ? 'Update & Re-submit to Meta' : 'Save & Submit to Meta' }}
                </button>
                <a href="{{ route('admin.whatsapp.templates.index') }}"
                   class="text-sm text-slate-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>

    {{-- ── PREVIEW ── --}}
    <div class="w-72 shrink-0 sticky top-24">
        <p class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-3">Live Preview</p>

        {{-- Phone mockup --}}
        <div class="bg-slate-800 rounded-[2rem] p-3 shadow-2xl" style="background:#1a1a2e;">
            <div class="bg-white rounded-[1.5rem] overflow-hidden" style="min-height:500px; background:#ece5dd;">

                {{-- WhatsApp top bar --}}
                <div class="flex items-center gap-2 px-3 py-2.5" style="background:#075e54;">
                    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white text-xs font-bold">B</div>
                    <div>
                        <p class="text-white text-xs font-semibold leading-tight">Business</p>
                        <p class="text-green-200 text-[10px]">online</p>
                    </div>
                </div>

                {{-- Chat area --}}
                <div class="p-3 space-y-2" style="min-height:420px; background-image: url('data:image/svg+xml,%3Csvg width=\'400\' height=\'400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3C/svg%3E');">

                    {{-- Message bubble --}}
                    <div class="ml-auto max-w-[85%]">
                        <div class="rounded-lg rounded-tr-none overflow-hidden shadow-sm" style="background:#dcf8c6;">

                            {{-- Header preview --}}
                            <div id="preview-header-image-wrap" class="{{ (isset($template) && $template->header_type === 'image' && $template->header_image) ? '' : 'hidden' }}">
                                <img id="preview-header-img"
                                     src="{{ isset($template) && $template->header_image ? asset('storage/' . $template->header_image) : '' }}"
                                     class="w-full object-cover" style="max-height:140px;" alt="">
                            </div>

                            <div id="preview-header-text-wrap"
                                 class="{{ (isset($template) && $template->header_type === 'text' && $template->header_text) ? '' : 'hidden' }} px-3 pt-2.5 pb-1">
                                <p id="preview-header-text" class="text-xs font-bold text-slate-800">{{ $template->header_text ?? '' }}</p>
                            </div>

                            {{-- Body --}}
                            <div class="px-3 py-2">
                                <p id="preview-body" class="text-xs text-slate-800 whitespace-pre-wrap leading-relaxed">{{ old('body', $template->body ?? 'Your message will appear here...') }}</p>
                            </div>

                            {{-- Tick --}}
                            <div class="flex justify-end px-2 pb-1.5">
                                <span class="text-[10px] text-slate-400">{{ now()->format('h:i A') }} ✓✓</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <p class="text-xs text-center text-slate-400 mt-2">Preview updates as you type</p>
    </div>

</div>

@push('scripts')
<script>
const existingExamples = @json($template->example_values ?? []);

// ── Header switcher ───────────────────────────────────────────
function switchHeader(type) {
    document.getElementById('header-text-wrap').classList.toggle('hidden', type !== 'text');
    document.getElementById('header-image-wrap').classList.toggle('hidden', type !== 'image');
    document.getElementById('header-document-wrap').classList.toggle('hidden', type !== 'document');

    // Update radio label styles
    document.querySelectorAll('[name="header_type"]').forEach(r => {
        const label = r.closest('label');
        const active = r.value === type;
        label.className = label.className
            .replace(/border-green-400 bg-green-50 text-green-700/g, '')
            .replace(/border-gray-200 text-slate-500 hover:border-gray-300/g, '')
            .trim();
        label.className += active
            ? ' border-green-400 bg-green-50 text-green-700'
            : ' border-gray-200 text-slate-500 hover:border-gray-300';
    });

    if (type !== 'image') document.getElementById('preview-header-image-wrap').classList.add('hidden');
    if (type !== 'text')  document.getElementById('preview-header-text-wrap').classList.add('hidden');
    if (type === 'document') {
        document.getElementById('preview-header-image-wrap').classList.remove('hidden');
        const img = document.getElementById('preview-header-img');
        img.src = '';
        img.alt = '📄 PDF Document';
        img.style.display = 'none';
        document.getElementById('preview-header-image-wrap').innerHTML =
            '<div class="flex items-center gap-2 bg-slate-100 rounded-t-2xl px-4 py-3">' +
            '<svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm-1 1.5L18.5 9H13V3.5z"/></svg>' +
            '<span class="text-xs text-slate-600 font-semibold" id="pdf-preview-name">PDF Document</span></div>';
    }

    updatePreview();
}

function previewPdf(input) {
    if (!input.files.length) return;
    const file = input.files[0];
    document.getElementById('pdf-filename').textContent = file.name;
    document.getElementById('pdf-filename').classList.remove('hidden');
    const nameEl = document.getElementById('pdf-preview-name');
    if (nameEl) nameEl.textContent = file.name;
}

// ── Image upload preview ──────────────────────────────────────
function previewImage(input) {
    if (!input.files.length) return;
    const file = input.files[0];
    document.getElementById('img-filename').textContent = file.name;
    document.getElementById('img-filename').classList.remove('hidden');

    const reader = new FileReader();
    reader.onload = e => {
        const img  = document.getElementById('preview-header-img');
        const wrap = document.getElementById('preview-header-image-wrap');
        img.src = e.target.result;
        wrap.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

// ── Variable detection ────────────────────────────────────────
function detectVars(text) {
    const matches = [...text.matchAll(/\{\{(\w+)\}\}/g)];
    const unique  = [...new Set(matches.map(m => m[1]))];

    const preview = document.getElementById('var-preview');
    preview.innerHTML = unique.length
        ? unique.map(v => `<span class="bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded-full">@{{` + v + `}}</span>`).join('')
        : '';

    const section = document.getElementById('example-section');
    const inputs  = document.getElementById('example-inputs');

    if (unique.length === 0) { section.classList.add('hidden'); return; }

    section.classList.remove('hidden');
    inputs.innerHTML = unique.map(v => `
        <div class="flex items-center gap-3">
            <span class="w-28 text-xs font-mono text-blue-700 shrink-0">@{{${v}}}</span>
            <input type="text" name="example_values[${v}]"
                   value="${existingExamples[v] ?? ''}"
                   placeholder="e.g. Rahul"
                   class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-gray-400">
        </div>
    `).join('');
}

// ── Live preview update ───────────────────────────────────────
function updatePreview() {
    // Body
    const body = document.getElementById('body').value || 'Your message will appear here...';
    document.getElementById('preview-body').textContent = body;

    // Header text
    const headerType = document.querySelector('[name="header_type"]:checked')?.value ?? 'none';
    if (headerType === 'text') {
        const txt = document.querySelector('[name="header_text"]').value;
        document.getElementById('preview-header-text').textContent = txt;
        document.getElementById('preview-header-text-wrap').classList.toggle('hidden', !txt);
        document.getElementById('preview-header-image-wrap').classList.add('hidden');
    }
}

// Init on load
detectVars(document.getElementById('body').value);
updatePreview();
</script>
@endpush

@endsection
