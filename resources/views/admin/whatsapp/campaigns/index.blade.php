@extends('admin.layouts.app')

@section('title', 'WA Campaigns')
@section('page-title', 'WhatsApp Campaigns')
@section('page-subtitle', 'Upload a sheet, pick a template, preview and send')

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
    @php
        $cards = [
            ['label' => 'Total',     'value' => $counts['total'],     'color' => '#0f172a'],
            ['label' => 'Draft',     'value' => $counts['draft'],     'color' => '#64748b'],
            ['label' => 'Sending',   'value' => $counts['sending'],   'color' => '#d97706'],
            ['label' => 'Completed', 'value' => $counts['completed'], 'color' => '#16a34a'],
        ];
    @endphp
    @foreach($cards as $card)
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $card['value'] }}</p>
        <p class="text-xs font-semibold mt-1" style="color:{{ $card['color'] }};">{{ $card['label'] }}</p>
    </div>
    @endforeach
</div>

<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-slate-500">{{ $campaigns->count() }} campaign{{ $campaigns->count() === 1 ? '' : 's' }}</p>
    <a href="{{ route('admin.whatsapp.campaigns.create') }}"
       class="text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-90 transition"
       style="background-color:#25D366;">
        + New Campaign
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                    <th class="px-4 py-3 text-left">Campaign</th>
                    <th class="px-4 py-3 text-left">Template</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Progress</th>
                    <th class="px-4 py-3 text-left">Launched</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($campaigns as $campaign)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-semibold text-gray-900">{{ $campaign->name }}</td>
                    <td class="px-4 py-3 text-gray-500 text-xs font-mono">{{ $campaign->template->meta_name ?? '—' }}</td>
                    <td class="px-4 py-3">
                        @php
                            $badgeClass = match($campaign->status) {
                                'draft'     => 'bg-slate-50 text-slate-500',
                                'sending'   => 'bg-yellow-50 text-yellow-700',
                                'completed' => 'bg-green-50 text-green-700',
                                'failed'    => 'bg-red-50 text-red-600',
                                default     => 'bg-gray-50 text-gray-500',
                            };
                        @endphp
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }}">
                            {{ ucfirst($campaign->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-xs text-gray-500">
                        @if($campaign->total_count > 0)
                            <span class="text-green-700 font-semibold">{{ $campaign->sent_count }}</span>
                            / {{ $campaign->total_count }}
                            @if($campaign->failed_count > 0)
                                <span class="text-red-500 ml-1">({{ $campaign->failed_count }} failed)</span>
                            @endif
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-400 text-xs whitespace-nowrap">
                        {{ $campaign->launched_at ? $campaign->launched_at->format('d M Y, h:i A') : '—' }}
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.whatsapp.campaigns.show', $campaign) }}"
                           class="text-xs bg-slate-50 text-slate-600 border border-slate-200 px-2.5 py-1 rounded-lg hover:bg-slate-100 transition">
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-16 text-center text-gray-400 text-sm">
                        No campaigns yet.
                        <a href="{{ route('admin.whatsapp.campaigns.create') }}" class="text-green-600 underline ml-1">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
