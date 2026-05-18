@extends('admin.layouts.app')

@section('title', $campaign->name)
@section('page-title', $campaign->name)
@section('page-subtitle', 'Campaign details and live delivery status')

@section('content')

{{-- Header --}}
<div class="flex items-center gap-3 mb-6">
    @php
        $badgeClass = match($campaign->status) {
            'draft'     => 'bg-slate-50 text-slate-500 border-slate-200',
            'sending'   => 'bg-yellow-50 text-yellow-700 border-yellow-200',
            'completed' => 'bg-green-50 text-green-700 border-green-200',
            'failed'    => 'bg-red-50 text-red-600 border-red-200',
            default     => 'bg-gray-50 text-gray-500 border-gray-200',
        };
    @endphp
    <span id="status-badge" class="text-xs font-bold px-3 py-1.5 rounded-full border {{ $badgeClass }}">
        {{ ucfirst($campaign->status) }}
    </span>
    <span class="text-xs text-slate-400">
        Template: <span class="font-mono font-semibold text-slate-600">{{ $campaign->template->meta_name ?? '—' }}</span>
    </span>
    @if($campaign->launched_at)
    <span class="text-xs text-slate-400">Launched {{ $campaign->launched_at->format('d M Y, h:i A') }}</span>
    @endif
</div>

{{-- Live Stats Cards --}}
<div class="grid grid-cols-4 gap-4 mb-4">
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $campaign->total_count }}</p>
        <p class="text-xs font-semibold mt-1 text-slate-500">Total</p>
    </div>
    <div class="bg-white border border-green-200 rounded-2xl px-5 py-4 shadow-sm">
        <p id="stat-sent" class="text-2xl font-extrabold text-green-700">{{ $campaign->sent_count }}</p>
        <p class="text-xs font-semibold mt-1 text-green-600">Sent ✓</p>
    </div>
    <div class="bg-white border border-red-200 rounded-2xl px-5 py-4 shadow-sm">
        <p id="stat-failed" class="text-2xl font-extrabold text-red-600">{{ $campaign->failed_count }}</p>
        <p class="text-xs font-semibold mt-1 text-red-500">Failed ✗</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p id="stat-pending" class="text-2xl font-extrabold text-slate-500">{{ $statusCounts['pending'] }}</p>
        <p class="text-xs font-semibold mt-1 text-slate-400">Pending</p>
    </div>
</div>

{{-- Progress Bar --}}
@if(in_array($campaign->status, ['sending', 'completed']))
<div class="bg-white border border-gray-200 rounded-2xl px-5 py-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-2">
        <p class="text-sm font-semibold text-slate-700">Progress</p>
        <div class="flex items-center gap-3 text-xs text-slate-500">
            <span id="progress-text">
                @php $done = $campaign->sent_count + $campaign->failed_count; @endphp
                {{ $done }} / {{ $campaign->total_count }} processed
            </span>
            <span id="percent-text" class="font-bold text-slate-700">
                @php $pct = $campaign->total_count > 0 ? round(($done / $campaign->total_count) * 100) : 0; @endphp
                {{ $pct }}%
            </span>
            @if($campaign->status === 'sending')
            <span class="flex items-center gap-1 text-yellow-600 font-semibold">
                <span id="live-dot" class="inline-block w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                Live
            </span>
            @endif
        </div>
    </div>

    {{-- Progress bar --}}
    <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
        <div class="h-full flex rounded-full overflow-hidden transition-all duration-500">
            <div id="bar-sent"
                 class="bg-green-500 transition-all duration-500"
                 style="width: {{ $campaign->total_count > 0 ? round(($campaign->sent_count / $campaign->total_count) * 100) : 0 }}%">
            </div>
            <div id="bar-failed"
                 class="bg-red-400 transition-all duration-500"
                 style="width: {{ $campaign->total_count > 0 ? round(($campaign->failed_count / $campaign->total_count) * 100) : 0 }}%">
            </div>
        </div>
    </div>

    {{-- Legend --}}
    <div class="flex items-center gap-4 mt-2 text-xs text-slate-400">
        <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-green-500 inline-block"></span> Sent</span>
        <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-red-400 inline-block"></span> Failed</span>
        <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-sm bg-gray-200 inline-block"></span> Pending</span>
    </div>
</div>
@endif

@if($campaign->isEditable() && $campaign->total_count > 0)
<div class="mb-5">
    <form method="POST" action="{{ route('admin.whatsapp.campaigns.launch', $campaign) }}">
        @csrf
        <button type="submit"
                onclick="return confirm('Send {{ $campaign->total_count }} messages?')"
                class="text-white text-sm font-bold px-6 py-2.5 rounded-xl hover:opacity-90 transition"
                style="background-color:#25D366;">
            Send {{ $campaign->total_count }} Messages
        </button>
    </form>
</div>
@endif

{{-- Contacts Table --}}
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
        <p class="text-sm font-semibold text-slate-700">Contacts</p>
        <button onclick="location.reload()"
                class="text-xs bg-slate-50 text-slate-500 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition">
            ↻ Refresh Table
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                    <th class="px-4 py-3 text-left">Phone</th>
                    @if(!empty($contacts->first()?->variables))
                    @foreach(array_keys($contacts->first()->variables ?? []) as $varKey)
                    <th class="px-4 py-3 text-left">{{ $varKey }}</th>
                    @endforeach
                    @endif
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Sent At</th>
                    <th class="px-4 py-3 text-left">Error</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-mono text-xs text-gray-700">{{ $contact->phone }}</td>
                    @foreach($contact->variables ?? [] as $val)
                    <td class="px-4 py-3 text-xs text-gray-500">{{ $val }}</td>
                    @endforeach
                    <td class="px-4 py-3">
                        @php
                            $sc = match($contact->status) {
                                'pending' => 'bg-slate-50 text-slate-500',
                                'sent'    => 'bg-green-50 text-green-700',
                                'failed'  => 'bg-red-50 text-red-600',
                                default   => 'bg-gray-50 text-gray-500',
                            };
                        @endphp
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $sc }}">
                            {{ ucfirst($contact->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs text-gray-400 whitespace-nowrap">
                        {{ $contact->sent_at ? $contact->sent_at->format('d M, h:i A') : '—' }}
                    </td>
                    <td class="px-4 py-3 text-xs text-red-500 max-w-xs truncate" title="{{ $contact->error_message }}">
                        {{ $contact->error_message ?: '—' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-4 py-12 text-center text-gray-400 text-sm">No contacts.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($contacts->hasPages())
    <div class="px-5 py-3 border-t border-gray-100 flex items-center justify-between">
        <p class="text-xs text-gray-400">
            Showing {{ $contacts->firstItem() }}–{{ $contacts->lastItem() }} of {{ $contacts->total() }}
        </p>
        {{ $contacts->links() }}
    </div>
    @endif
</div>

@push('scripts')
@if($campaign->status === 'sending')
<script>
const statsUrl = "{{ route('admin.whatsapp.campaigns.stats', $campaign) }}";
const total    = {{ $campaign->total_count }};

function updateStats(data) {
    document.getElementById('stat-sent').textContent    = data.sent;
    document.getElementById('stat-failed').textContent  = data.failed;
    document.getElementById('stat-pending').textContent = data.pending;

    const done    = data.sent + data.failed;
    const sentPct = total > 0 ? (data.sent / total * 100).toFixed(1) : 0;
    const failPct = total > 0 ? (data.failed / total * 100).toFixed(1) : 0;

    document.getElementById('bar-sent').style.width   = sentPct + '%';
    document.getElementById('bar-failed').style.width = failPct + '%';
    document.getElementById('progress-text').textContent = done + ' / ' + total + ' processed';
    document.getElementById('percent-text').textContent  = data.percent + '%';

    // Stop polling when done
    if (data.status === 'completed' || data.status === 'failed') {
        clearInterval(poller);
        document.getElementById('live-dot')?.remove();
        document.getElementById('status-badge').textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
    }
}

const poller = setInterval(async () => {
    try {
        const res  = await fetch(statsUrl);
        const data = await res.json();
        updateStats(data);
    } catch (e) {}
}, 4000); // poll every 4 seconds
</script>
@endif
@endpush

@endsection
