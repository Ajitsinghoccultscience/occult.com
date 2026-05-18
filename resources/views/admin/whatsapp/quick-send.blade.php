@extends('admin.layouts.app')

@section('title', 'Send Message')
@section('page-title', 'Send Message')
@section('page-subtitle', 'Select a template and send to one or more numbers')

@section('content')

@if(session('error'))
<div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
    {{ session('error') }}
</div>
@endif

@php $selectedId = session('selected_template_id') ?? old('template_id'); @endphp

<div class="grid grid-cols-3 gap-6">

    {{-- Left: Form --}}
    <div class="col-span-2 space-y-4">

        {{-- Sender number info --}}
        @if($sender?->whatsapp_phone_number_id)
        <div class="bg-green-50 border border-green-200 rounded-2xl px-5 py-3 text-sm text-green-700 flex items-center gap-2">
            <span class="font-semibold">Sending from:</span>
            <span class="font-mono">{{ $sender->whatsapp_phone_number_id }}</span>
        </div>
        @elseif(config('whatsapp.phone_number_id'))
        <div class="bg-blue-50 border border-blue-200 rounded-2xl px-5 py-3 text-sm text-blue-700 flex items-center gap-2">
            <span class="font-semibold">Sending from:</span>
            <span class="font-mono">{{ config('whatsapp.phone_number_id') }}</span>
            <span class="text-blue-400">(main number)</span>
        </div>
        @else
        <div class="bg-red-50 border border-red-200 rounded-2xl px-5 py-3 text-sm text-red-700">
            No WhatsApp number assigned.
            @if(session('admin_role') === 'admin')
            Go to <a href="{{ route('admin.team.index') }}" class="underline font-semibold">Team settings</a> and set a Phone Number ID.
            @else
            Ask your admin to assign a WhatsApp number to your account.
            @endif
        </div>
        @endif

        {{-- No templates warning --}}
        @if($templates->isEmpty())
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl px-5 py-4 text-sm text-yellow-700">
            No approved templates yet.
            @if(session('admin_role') === 'admin')
            <a href="{{ route('admin.whatsapp.templates.create') }}" class="underline font-semibold ml-1">Create one →</a>
            @endif
        </div>
        @endif

        <form method="POST" action="{{ route('admin.whatsapp.send.store') }}" id="sendForm">
            @csrf

            {{-- Template Select --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Template</label>
                <select name="template_id" id="templateSelect" required
                        class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">— Select a template —</option>
                    @foreach($templates as $tpl)
                    <option value="{{ $tpl->id }}"
                            data-variables="{{ json_encode($tpl->variables ?? []) }}"
                            data-body="{{ $tpl->body }}"
                            {{ $selectedId == $tpl->id ? 'selected' : '' }}>
                        {{ $tpl->name }} ({{ $tpl->meta_name }})
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Dynamic Variable Fields --}}
            <div id="varFields" class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 {{ ($selectedId && $templates->firstWhere('id', $selectedId)?->variables) ? '' : 'hidden' }}">
                <p class="text-xs font-semibold text-slate-600 mb-3">Template Variables</p>
                <div id="varInputs" class="space-y-3">
                    {{-- Rendered on page load if results returned --}}
                    @if($selectedId)
                        @php $selTpl = $templates->firstWhere('id', $selectedId); @endphp
                        @foreach($selTpl?->variables ?? [] as $var)
                        <div>
                            <label class="block text-xs text-slate-500 mb-1">@php echo e('{{' . $var . '}}'); @endphp</label>
                            <input type="text" name="vars[{{ $var }}]"
                                   value="{{ old("vars.$var") }}"
                                   placeholder="{{ $var }}"
                                   class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Phone Numbers --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Phone Numbers</label>
                <textarea name="phones" rows="5" required
                          class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 font-mono"
                          placeholder="One number per line, e.g.&#10;9876543210&#10;7689096514">{{ old('phones') }}</textarea>
                <p class="text-xs text-slate-400 mt-1.5">Indian numbers without country code are fine — 91 is added automatically.</p>
            </div>

            <button type="submit"
                    class="w-full text-white text-sm font-bold py-3 rounded-xl hover:opacity-90 transition"
                    style="background-color:#25D366;">
                Send Messages
            </button>
        </form>
    </div>

    {{-- Right: Preview --}}
    <div class="col-span-1">
        <div class="sticky top-6">
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3">Preview</p>
            <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-200" style="background:#e5ddd5;">
                {{-- Phone top bar --}}
                <div class="flex items-center gap-2 px-3 py-2" style="background:#075E54;">
                    <div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center text-white text-xs font-bold">W</div>
                    <div>
                        <p class="text-white text-xs font-semibold leading-none">WhatsApp Business</p>
                        <p class="text-green-200 text-[10px]">online</p>
                    </div>
                </div>
                {{-- Message bubble --}}
                <div class="p-4 min-h-32 flex items-end">
                    <div class="bg-white rounded-2xl rounded-bl-sm px-3.5 py-2.5 shadow-sm max-w-full">
                        <p id="bubbleText" class="text-sm text-gray-800 whitespace-pre-wrap leading-relaxed">
                            {{ $selectedId ? ($templates->firstWhere('id', $selectedId)?->body ?? 'Select a template to preview') : 'Select a template to preview' }}
                        </p>
                        <p class="text-[10px] text-gray-400 text-right mt-1">{{ now()->format('h:i A') }} ✓✓</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Results Table --}}
@isset($results)
<div class="mt-8 bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
        <p class="text-sm font-semibold text-slate-700">Results</p>
        <div class="flex items-center gap-3 text-xs">
            <span class="text-green-600 font-semibold">✓ {{ collect($results)->where('success', true)->count() }} sent</span>
            <span class="text-red-500 font-semibold">✗ {{ collect($results)->where('success', false)->count() }} failed</span>
        </div>
    </div>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                <th class="px-4 py-3 text-left">Phone</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Error</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($results as $r)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3 font-mono text-xs text-gray-700">{{ $r['phone'] }}</td>
                <td class="px-4 py-3">
                    @if($r['success'])
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-green-50 text-green-700">✓ Sent</span>
                    @else
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-red-50 text-red-600">✗ Failed</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-xs text-red-400">{{ $r['error'] ?: '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endisset

@push('scripts')
<script>
const select     = document.getElementById('templateSelect');
const varFields  = document.getElementById('varFields');
const varInputs  = document.getElementById('varInputs');
const bubbleText = document.getElementById('bubbleText');

let currentBody = bubbleText.textContent.trim();
let currentVars = {};

function renderVars(variables, body) {
    currentBody = body;
    currentVars = {};

    if (!variables.length) {
        varFields.classList.add('hidden');
        varInputs.innerHTML = '';
        updatePreview();
        return;
    }

    varFields.classList.remove('hidden');
    varInputs.innerHTML = variables.map(v => {
        const label = '{{' + v + '}}';
        return `<div>
            <label class="block text-xs text-slate-500 mb-1">${label}</label>
            <input type="text" name="vars[${v}]" placeholder="${v}"
                   data-var="${v}"
                   class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                   oninput="updateVar('${v}', this.value)">
        </div>`;
    }).join('');

    updatePreview();
}

function updateVar(name, value) {
    currentVars[name] = value;
    updatePreview();
}

function updatePreview() {
    let text = currentBody;
    for (const [k, v] of Object.entries(currentVars)) {
        text = text.replaceAll('{{' + k + '}}', v || '{{' + k + '}}');
    }
    bubbleText.textContent = text || 'Select a template to preview';
}

select.addEventListener('change', function () {
    const opt = this.options[this.selectedIndex];
    if (!opt.value) {
        varFields.classList.add('hidden');
        varInputs.innerHTML = '';
        bubbleText.textContent = 'Select a template to preview';
        return;
    }
    const variables = JSON.parse(opt.dataset.variables || '[]');
    const body      = opt.dataset.body || '';
    renderVars(variables, body);
});

// Trigger on page load if template already selected (after results returned)
if (select.value) {
    const opt = select.options[select.selectedIndex];
    const variables = JSON.parse(opt.dataset.variables || '[]');
    const body      = opt.dataset.body || '';
    currentBody = body;
    updatePreview();
}
</script>
@endpush

@endsection
