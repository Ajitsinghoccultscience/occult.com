@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of enquiries and leads')

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 mb-6">
    @php
        $cards = [
            ['label'=>'Total Leads',    'value'=>$counts['total'],          'color'=>'#0f172a', 'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ['label'=>'New',            'value'=>$counts['new'],            'color'=>'#2563eb', 'icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
            ['label'=>'Contacted',      'value'=>$counts['contacted'],      'color'=>'#d97706', 'icon'=>'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
            ['label'=>'Enrolled',       'value'=>$counts['enrolled'],       'color'=>'#16a34a', 'icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label'=>'Not Interested', 'value'=>$counts['not_interested'], 'color'=>'#dc2626', 'icon'=>'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
        ];
    @endphp
    @foreach($cards as $card)
    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:{{ $card['color'] }}18;">
                <svg class="w-4.5 h-4.5" style="color:{{ $card['color'] }};width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/>
                </svg>
            </div>
            <span class="text-[11px] font-semibold text-slate-400">{{ $loop->first ? 'All time' : '' }}</span>
        </div>
        <p class="text-2xl font-extrabold text-slate-900">{{ $card['value'] }}</p>
        <p class="text-xs text-slate-400 mt-1 font-medium">{{ $card['label'] }}</p>
    </div>
    @endforeach
</div>

{{-- Period cards --}}
<div class="grid grid-cols-3 gap-4 mb-6">
    @foreach([['Today', $todayCount, '#8B0000'], ['This Week', $weekCount, '#2563eb'], ['This Month', $monthCount, '#16a34a']] as [$lbl, $val, $clr])
    <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4 shadow-sm flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:{{ $clr }}18;">
            <svg class="w-5 h-5" style="color:{{ $clr }};" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-xl font-extrabold text-slate-900">{{ $val }}</p>
            <p class="text-xs text-slate-400 font-medium">{{ $lbl }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Charts --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-6">

    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <div>
                <p class="text-sm font-bold text-slate-800">Leads Overview</p>
                <p class="text-xs text-slate-400 mt-0.5">Last 7 days</p>
            </div>
            <span class="text-xs font-semibold px-3 py-1 rounded-lg" style="background:#8B000015;color:#8B0000;">
                Total: {{ array_sum($chartData) }}
            </span>
        </div>
        <canvas id="lineChart" height="100"></canvas>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col">
        <div class="mb-5">
            <p class="text-sm font-bold text-slate-800">Status Breakdown</p>
            <p class="text-xs text-slate-400 mt-0.5">All time</p>
        </div>
        <div class="flex-1 flex items-center justify-center">
            <canvas id="doughnutChart" style="max-height:180px;"></canvas>
        </div>
        <div class="mt-5 flex flex-col gap-2">
            @php $statusMeta = ['new'=>['New','#2563eb'],'contacted'=>['Contacted','#d97706'],'enrolled'=>['Enrolled','#16a34a'],'not_interested'=>['Not Interested','#dc2626']]; @endphp
            @foreach($statusMeta as $key => [$label, $color])
            <div class="flex items-center justify-between">
                <span class="flex items-center gap-2 text-xs text-slate-600">
                    <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background:{{ $color }};"></span>
                    {{ $label }}
                </span>
                <span class="text-xs font-bold text-slate-800">{{ $counts[$key] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Bottom --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- Recent leads --}}
    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <p class="text-sm font-bold text-slate-800">Recent Leads</p>
            <a href="{{ route('admin.leads') }}" class="text-xs font-semibold hover:underline" style="color:#8B0000;">View All →</a>
        </div>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 text-[11px] text-slate-400 uppercase tracking-wide border-b border-slate-100">
                    <th class="px-5 py-3 text-left">Name</th>
                    <th class="px-5 py-3 text-left">Phone</th>
                    <th class="px-5 py-3 text-left">Source</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($recentLeads as $lead)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-5 py-3 font-semibold text-slate-800 text-sm">{{ $lead->name }}</td>
                    <td class="px-5 py-3 text-slate-500 text-xs">{{ $lead->phone }}</td>
                    <td class="px-5 py-3">
                        @if($lead->source)
                        <span class="bg-slate-100 text-slate-500 text-[11px] px-2 py-0.5 rounded-full font-medium">{{ $lead->source }}</span>
                        @else <span class="text-slate-300 text-xs">—</span> @endif
                    </td>
                    <td class="px-5 py-3">
                        @php $sc=['new'=>'bg-blue-50 text-blue-700','contacted'=>'bg-yellow-50 text-yellow-700','enrolled'=>'bg-green-50 text-green-700','not_interested'=>'bg-red-50 text-red-600']; @endphp
                        <span class="text-[11px] px-2.5 py-1 rounded-lg font-semibold {{ $sc[$lead->status] ?? '' }}">
                            {{ ucfirst(str_replace('_',' ',$lead->status)) }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-slate-400 text-[11px]">{{ $lead->created_at->format('d M, h:i A') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-5 py-10 text-center text-slate-400 text-xs">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- By source --}}
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100">
            <p class="text-sm font-bold text-slate-800">Leads by Source</p>
            <p class="text-xs text-slate-400 mt-0.5">All time</p>
        </div>
        <div class="divide-y divide-slate-100 px-5">
            @forelse($bySources as $src)
            <div class="flex items-center justify-between py-3.5 gap-3">
                <span class="text-sm text-slate-700 capitalize font-medium">{{ $src->source }}</span>
                <div class="flex items-center gap-3 flex-1 justify-end">
                    <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full" style="background:#8B0000;width:{{ $counts['total']>0 ? round(($src->count/$counts['total'])*100) : 0 }}%"></div>
                    </div>
                    <span class="text-sm font-bold text-slate-800 w-5 text-right">{{ $src->count }}</span>
                </div>
            </div>
            @empty
            <p class="py-10 text-xs text-slate-400 text-center">No data yet.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: {!! json_encode($chartLabels) !!},
        datasets: [{
            label: 'Leads',
            data: {!! json_encode($chartData) !!},
            borderColor: '#8B0000',
            backgroundColor: 'rgba(139,0,0,0.06)',
            borderWidth: 2.5,
            pointBackgroundColor: '#fff',
            pointBorderColor: '#8B0000',
            pointBorderWidth: 2,
            pointRadius: 4,
            tension: 0.4,
            fill: true,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false }, tooltip: { backgroundColor: '#0f172a', titleColor:'#94a3b8', bodyColor:'#fff', padding: 10, cornerRadius: 8 } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize:1, precision:0, color:'#94a3b8', font:{size:11} }, grid: { color:'#f1f5f9', drawBorder:false } },
            x: { ticks: { color:'#94a3b8', font:{size:11} }, grid: { display:false } }
        }
    }
});

new Chart(document.getElementById('doughnutChart'), {
    type: 'doughnut',
    data: {
        labels: ['New','Contacted','Enrolled','Not Interested'],
        datasets: [{
            data: [{{ $counts['new'] }},{{ $counts['contacted'] }},{{ $counts['enrolled'] }},{{ $counts['not_interested'] }}],
            backgroundColor: ['#2563eb','#d97706','#16a34a','#dc2626'],
            borderWidth: 3,
            borderColor: '#fff',
            hoverOffset: 5,
        }]
    },
    options: {
        responsive: true,
        cutout: '72%',
        plugins: { legend: { display: false }, tooltip: { backgroundColor:'#0f172a', bodyColor:'#fff', padding:10, cornerRadius:8 } }
    }
});
</script>
@endpush
