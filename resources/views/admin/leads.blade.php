@extends('admin.layouts.app')

@section('title', 'Leads')
@section('page-title', 'Enquiry Leads')
@section('page-subtitle', 'Manage and follow up on all enquiries')

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mb-6">
    @php
        $cards = [
            ['label'=>'Total',          'value'=>$counts['total'],          'color'=>'#0f172a'],
            ['label'=>'New',            'value'=>$counts['new'],            'color'=>'#2563eb'],
            ['label'=>'Contacted',      'value'=>$counts['contacted'],      'color'=>'#d97706'],
            ['label'=>'Enrolled',       'value'=>$counts['enrolled'],       'color'=>'#16a34a'],
            ['label'=>'Not Interested', 'value'=>$counts['not_interested'], 'color'=>'#dc2626'],
        ];
    @endphp
    @foreach($cards as $card)
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $card['value'] }}</p>
        <p class="text-xs font-semibold mt-1" style="color:{{ $card['color'] }};">{{ $card['label'] }}</p>
    </div>
    @endforeach
</div>

{{-- Filters --}}
<form method="GET" action="{{ route('admin.leads') }}" class="flex flex-wrap gap-3 mb-5">
    <input name="search" value="{{ request('search') }}" placeholder="Search name, phone, email…"
           class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm w-64 focus:outline-none focus:border-gray-400 bg-white">

    <select name="source" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-white focus:outline-none focus:border-gray-400">
        <option value="">All Sources</option>
        @foreach($sources as $src)
        <option value="{{ $src }}" {{ request('source') == $src ? 'selected' : '' }}>{{ $src }}</option>
        @endforeach
    </select>

    <select name="status" class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-white focus:outline-none focus:border-gray-400">
        <option value="">All Statuses</option>
        <option value="new"            {{ request('status') == 'new'            ? 'selected' : '' }}>New</option>
        <option value="contacted"      {{ request('status') == 'contacted'      ? 'selected' : '' }}>Contacted</option>
        <option value="enrolled"       {{ request('status') == 'enrolled'       ? 'selected' : '' }}>Enrolled</option>
        <option value="not_interested" {{ request('status') == 'not_interested' ? 'selected' : '' }}>Not Interested</option>
    </select>

    <button type="submit"
            class="text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-90 transition"
            style="background-color:#8B0000;">
        Filter
    </button>

    @if(request()->hasAny(['search','source','status']))
    <a href="{{ route('admin.leads') }}" class="text-sm text-gray-500 self-center hover:underline">Clear</a>
    @endif
</form>

{{-- Table --}}
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Source</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($leads as $lead)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $lead->id }}</td>
                    <td class="px-4 py-3">
                        <span class="font-semibold text-gray-900">{{ $lead->name }}</span>
                        @if($lead->notes)
                        <span class="block mt-0.5 text-xs text-gray-500 max-w-xs whitespace-normal">{{ $lead->notes }}</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-700">
                        <a href="tel:{{ $lead->phone }}" class="hover:underline">{{ $lead->phone }}</a>
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs">{{ $lead->email ?: '—' }}</td>
                    <td class="px-4 py-3">
                        @if($lead->source)
                        <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">{{ $lead->source }}</span>
                        @else <span class="text-gray-300">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <form method="POST" action="{{ route('admin.leads.status', $lead) }}">
                            @csrf @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                    class="text-xs rounded-lg px-2 py-1 border font-medium focus:outline-none cursor-pointer
                                    {{ $lead->status === 'new'            ? 'border-blue-200 bg-blue-50 text-blue-700'       : '' }}
                                    {{ $lead->status === 'contacted'      ? 'border-yellow-200 bg-yellow-50 text-yellow-700' : '' }}
                                    {{ $lead->status === 'enrolled'       ? 'border-green-200 bg-green-50 text-green-700'    : '' }}
                                    {{ $lead->status === 'not_interested' ? 'border-red-200 bg-red-50 text-red-600'          : '' }}">
                                <option value="new"            {{ $lead->status==='new'            ?'selected':'' }}>New</option>
                                <option value="contacted"      {{ $lead->status==='contacted'      ?'selected':'' }}>Contacted</option>
                                <option value="enrolled"       {{ $lead->status==='enrolled'       ?'selected':'' }}>Enrolled</option>
                                <option value="not_interested" {{ $lead->status==='not_interested' ?'selected':'' }}>Not Interested</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-3 text-gray-400 text-xs whitespace-nowrap">
                        {{ $lead->created_at->format('d M Y, h:i A') }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-1.5">
                            <a href="https://wa.me/91{{ $lead->phone }}" target="_blank"
                               class="inline-flex items-center gap-1 text-xs bg-green-50 text-green-700 border border-green-200 px-2.5 py-1 rounded-lg hover:bg-green-100 transition">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                WhatsApp
                            </a>
                            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" class="inline"
                                  onsubmit="return confirm('Delete this lead?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-xs bg-red-50 text-red-600 border border-red-200 px-2.5 py-1 rounded-lg hover:bg-red-100 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-16 text-center text-gray-400 text-sm">No leads found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($leads->hasPages())
    <div class="px-5 py-3 border-t border-gray-100 flex items-center justify-between">
        <p class="text-xs text-gray-400">
            Showing {{ $leads->firstItem() }}–{{ $leads->lastItem() }} of {{ $leads->total() }}
        </p>
        {{ $leads->links() }}
    </div>
    @endif
</div>

@endsection
