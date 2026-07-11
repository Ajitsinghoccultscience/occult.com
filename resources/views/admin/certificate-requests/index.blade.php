@extends('admin.layouts.app')

@section('title', 'Review Submissions')
@section('page-title', 'Review Submissions')
@section('page-subtitle', 'Review student feedback, set issue dates, preview certificates, and send email')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
        $cards = [
            ['label' => 'Total Reviews', 'value' => $counts['total'], 'color' => '#0f172a'],
            ['label' => 'Pending Send', 'value' => $counts['pending'], 'color' => '#d97706'],
            ['label' => 'Sent', 'value' => $counts['sent'], 'color' => '#16a34a'],
            ['label' => 'Failed', 'value' => $counts['failed'], 'color' => '#dc2626'],
        ];
    @endphp

    @foreach($cards as $card)
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm">
        <p class="text-2xl font-extrabold text-slate-900">{{ $card['value'] }}</p>
        <p class="text-xs font-semibold mt-1" style="color:{{ $card['color'] }};">{{ $card['label'] }}</p>
    </div>
    @endforeach
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100">
        <h2 class="text-sm font-extrabold text-slate-900">Webinar Notes</h2>
        <p class="text-xs text-slate-400 mt-1">Upload once per webinar. These PDFs are attached automatically when you send mail.</p>
    </div>

    <div class="grid gap-4 p-5 lg:grid-cols-2">
        @foreach(config('certificate_notes.webinars', []) as $type => $notes)
        @php
            $isReady = $notesStatus[$type] ?? false;
        @endphp
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-sm font-extrabold text-slate-900">{{ $notes['label'] }}</p>
                    <p class="text-xs text-slate-400 mt-1">{{ $notes['filename'] }}</p>
                </div>
                @if($isReady)
                    <span class="shrink-0 rounded-full bg-green-50 text-green-700 border border-green-100 text-xs font-bold px-3 py-1">Ready</span>
                @else
                    <span class="shrink-0 rounded-full bg-red-50 text-red-600 border border-red-100 text-xs font-bold px-3 py-1">Missing</span>
                @endif
            </div>

            <form method="POST" action="{{ route('admin.certificate-requests.notes.update') }}" enctype="multipart/form-data" class="mt-4 flex flex-col sm:flex-row gap-2">
                @csrf
                <input type="hidden" name="certificate_type" value="{{ $type }}">
                <input
                    type="file"
                    name="notes_pdf"
                    accept="application/pdf"
                    required
                    class="min-w-0 flex-1 rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-1.5 file:text-xs file:font-bold file:text-slate-700">
                <button type="submit"
                        class="rounded-xl bg-slate-900 px-4 py-2 text-xs font-bold text-white hover:bg-slate-700">
                    Upload
                </button>
            </form>

            @if($isReady)
            <div class="mt-3 flex flex-wrap gap-3">
                <a href="{{ route('admin.certificate-requests.notes.preview', $type) }}" target="_blank"
                   class="inline-flex text-xs font-bold text-purple-700 hover:text-purple-900 hover:underline">
                    Preview notes PDF
                </a>
                <a href="{{ route('admin.certificate-requests.notes.download', $type) }}"
                   class="inline-flex text-xs font-bold text-slate-600 hover:text-slate-900 hover:underline">
                    Download current notes
                </a>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-sm font-extrabold text-slate-900">Student Reviews</h2>
            <p class="text-xs text-slate-400 mt-1">Use preview to verify the certificate before sending. Notes are attached automatically by webinar type.</p>
        </div>
        <a href="{{ route('certificate-request.create') }}" target="_blank"
           class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-100">
            Open Public Form
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm align-top">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 text-xs uppercase tracking-wide">
                    <th class="px-4 py-3 text-left">Student</th>
                    <th class="px-4 py-3 text-left">Review</th>
                    <th class="px-4 py-3 text-left">Webinar</th>
                    <th class="px-4 py-3 text-left">Issue Date</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($requests as $request)
                <tr class="hover:bg-gray-50/70 transition">
                    <td class="px-4 py-4 min-w-[230px]">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-orange-50 text-orange-700 border border-orange-100 flex items-center justify-center text-sm font-extrabold shrink-0">
                                {{ strtoupper(substr($request->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="font-extrabold text-slate-900 leading-tight">{{ $request->name }}</p>
                                <a href="mailto:{{ $request->email }}" class="block text-xs text-slate-500 hover:underline mt-1 truncate">{{ $request->email }}</a>
                                <a href="tel:{{ $request->phone }}" class="block text-xs text-slate-400 hover:underline mt-0.5">{{ $request->phone }}</a>
                                <p class="text-[11px] text-slate-300 mt-1">Submitted {{ $request->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-4 min-w-[300px] max-w-[420px]">
                        <div class="rounded-xl bg-slate-50 border border-slate-100 px-3 py-2.5">
                            <p class="text-xs leading-5 text-slate-600">{{ $request->review_text ?: 'No review text' }}</p>
                        </div>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center rounded-full bg-purple-50 text-purple-700 border border-purple-100 text-xs font-bold px-3 py-1">
                            {{ ucfirst($request->certificate_type) }}
                        </span>
                        @if($notesStatus[$request->certificate_type] ?? false)
                            <p class="mt-2 text-[11px] font-semibold text-green-600">Notes ready</p>
                        @else
                            <p class="mt-2 text-[11px] font-semibold text-red-500">Notes missing</p>
                        @endif
                    </td>

                    <td class="px-4 py-4 min-w-[230px]">
                        <form method="POST" action="{{ route('admin.certificate-requests.date', $request) }}" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <input
                                type="date"
                                name="certificate_date"
                                value="{{ optional($request->certificate_date)->format('Y-m-d') }}"
                                class="w-36 rounded-xl border border-gray-200 bg-white px-3 py-2 text-xs font-semibold text-gray-700 focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100">
                            <button type="submit"
                                    class="text-xs bg-white text-slate-700 border border-slate-200 px-3 py-2 rounded-xl hover:bg-slate-50 transition font-bold">
                                Save
                            </button>
                        </form>
                    </td>

                    <td class="px-4 py-4 min-w-[150px]">
                        @if($request->mail_sent_at)
                            <span class="inline-flex rounded-full bg-green-50 text-green-700 border border-green-100 text-xs font-bold px-3 py-1">
                                Sent
                            </span>
                            <p class="text-[11px] text-slate-400 mt-1">{{ $request->mail_sent_at->format('d M Y, h:i A') }}</p>
                        @elseif($request->mail_error)
                            <span class="inline-flex rounded-full bg-red-50 text-red-600 border border-red-100 text-xs font-bold px-3 py-1">
                                Failed
                            </span>
                            <p class="text-[11px] text-red-400 mt-1 max-w-[180px] truncate" title="{{ $request->mail_error }}">{{ $request->mail_error }}</p>
                        @else
                            <span class="inline-flex rounded-full bg-yellow-50 text-yellow-700 border border-yellow-100 text-xs font-bold px-3 py-1">
                                Pending
                            </span>
                        @endif
                    </td>

                    <td class="px-4 py-4 min-w-[220px]">
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ URL::signedRoute('certificate-request.certificate', $request) }}" target="_blank"
                               class="inline-flex items-center justify-center text-xs bg-purple-50 text-purple-700 border border-purple-200 px-3 py-2 rounded-xl hover:bg-purple-100 transition font-bold">
                                Preview
                            </a>
                            <form
                                method="POST"
                                action="{{ route('admin.certificate-requests.send', $request) }}"
                                onsubmit="this.querySelector('[data-send-text]').classList.add('hidden'); this.querySelector('[data-sending-text]').classList.remove('hidden'); this.querySelector('[data-sending-text]').classList.add('inline-flex'); this.querySelector('button[type=submit]').disabled = true;">
                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center justify-center min-w-[96px] text-xs bg-green-600 text-white border border-green-600 px-3 py-2 rounded-xl hover:bg-green-700 transition font-bold disabled:cursor-not-allowed disabled:opacity-75">
                                    <span data-send-text>Send Mail</span>
                                    <span data-sending-text class="hidden items-center justify-center gap-1.5">
                                        <svg class="h-3.5 w-3.5 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                        Sending...
                                    </span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-16 text-center">
                        <p class="text-sm font-semibold text-gray-500">No review submissions found.</p>
                        <p class="text-xs text-gray-400 mt-1">New submissions from the public review form will appear here.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($requests->hasPages())
    <div class="px-5 py-3 border-t border-gray-100">
        {{ $requests->links() }}
    </div>
    @endif
</div>
@endsection
