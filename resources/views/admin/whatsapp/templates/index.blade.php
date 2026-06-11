@extends('admin.layouts.app')

@section('title', 'WA Templates')
@section('page-title', 'WhatsApp Templates')
@section('page-subtitle', 'Create templates in WATI, then Sync from WATI to import them here')

@section('content')

@if(session('warning'))
<div class="mb-4 px-4 py-3 bg-yellow-50 border border-yellow-200 rounded-xl text-sm text-yellow-700">
    {{ session('warning') }}
</div>
@endif
@if(session('error'))
<div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700">
    {{ session('error') }}
</div>
@endif

<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-500">{{ $templates->count() }} template{{ $templates->count() === 1 ? '' : 's' }}</p>
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.whatsapp.templates.sync-wati') }}"
           class="text-sm font-semibold px-5 py-2.5 rounded-xl border border-gray-300 text-slate-700 hover:bg-gray-50 transition">
            ⟳ Sync from WATI
        </a>
        <a href="{{ route('admin.whatsapp.templates.create') }}"
           class="text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:opacity-90 transition"
           style="background-color:#25D366;">
            + New Template
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Meta Name</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Variables</th>
                    <th class="px-4 py-3 text-left">Meta Status</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($templates as $tpl)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-semibold text-gray-900">{{ $tpl->name }}</td>
                    <td class="px-4 py-3 text-gray-500 font-mono text-xs">{{ $tpl->meta_name }}</td>
                    <td class="px-4 py-3 text-gray-500 text-xs">{{ $tpl->category ?? 'MARKETING' }}</td>
                    <td class="px-4 py-3">
                        @forelse($tpl->variables ?? [] as $var)
                            <span class="inline-block bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded-full mr-1">@php echo e('{{' . $var . '}}'); @endphp</span>
                        @empty
                            <span class="text-gray-300 text-xs">none</span>
                        @endforelse
                    </td>
                    <td class="px-4 py-3">
                        @php
                            $ms = $tpl->meta_status ?? 'PENDING';
                            $badgeClass = match($ms) {
                                'APPROVED' => 'bg-green-50 text-green-700 border border-green-200',
                                'REJECTED' => 'bg-red-50 text-red-600 border border-red-200',
                                default    => 'bg-yellow-50 text-yellow-700 border border-yellow-200',
                            };
                            $icon = match($ms) {
                                'APPROVED' => '✓',
                                'REJECTED' => '✗',
                                default    => '⏳',
                            };
                        @endphp
                        <div>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }}">
                                {{ $icon }} {{ $ms }}
                            </span>
                            @if($tpl->rejection_reason)
                            <p class="text-xs text-red-400 mt-1">{{ $tpl->rejection_reason }}</p>
                            @endif
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2 flex-wrap">
                            {{-- Refresh Status --}}
                            <form method="POST" action="{{ route('admin.whatsapp.templates.refresh-status', $tpl) }}">
                                @csrf
                                <button type="submit"
                                        class="text-xs bg-blue-50 text-blue-600 border border-blue-200 px-2.5 py-1 rounded-lg hover:bg-blue-100 transition whitespace-nowrap">
                                    ↻ Check Status
                                </button>
                            </form>
                            {{-- Force Approve only for Meta system templates like hello_world --}}
                            @if($tpl->meta_status !== 'APPROVED' && $tpl->meta_name === 'hello_world')
                            <form method="POST" action="{{ route('admin.whatsapp.templates.force-approve', $tpl) }}"
                                  onsubmit="return confirm('Mark hello_world as approved? This is a Meta system template that does not need submission.')">
                                @csrf
                                <button type="submit"
                                        class="text-xs bg-green-50 text-green-700 border border-green-200 px-2.5 py-1 rounded-lg hover:bg-green-100 transition whitespace-nowrap">
                                    ✓ Force Approve
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('admin.whatsapp.templates.edit', $tpl) }}"
                               class="text-xs bg-slate-50 text-slate-600 border border-slate-200 px-2.5 py-1 rounded-lg hover:bg-slate-100 transition">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.whatsapp.templates.destroy', $tpl) }}"
                                  onsubmit="return confirm('Delete this template?')">
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
                    <td colspan="6" class="px-4 py-16 text-center text-gray-400 text-sm">
                        No templates yet.
                        <a href="{{ route('admin.whatsapp.templates.create') }}" class="text-green-600 underline ml-1">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
