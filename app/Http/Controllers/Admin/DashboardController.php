<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'total'          => Enquiry::count(),
            'new'            => Enquiry::where('status', 'new')->count(),
            'contacted'      => Enquiry::where('status', 'contacted')->count(),
            'enrolled'       => Enquiry::where('status', 'enrolled')->count(),
            'not_interested' => Enquiry::where('status', 'not_interested')->count(),
        ];

        $todayCount   = Enquiry::whereDate('created_at', today())->count();
        $weekCount    = Enquiry::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $monthCount   = Enquiry::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();

        // Last 7 days daily counts
        $daily = Enquiry::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count', 'date');

        $chartLabels = [];
        $chartData   = [];
        for ($i = 6; $i >= 0; $i--) {
            $date          = now()->subDays($i)->toDateString();
            $chartLabels[] = now()->subDays($i)->format('D d');
            $chartData[]   = $daily[$date] ?? 0;
        }

        // By source
        $bySources = Enquiry::select('source', DB::raw('COUNT(*) as count'))
            ->whereNotNull('source')
            ->groupBy('source')
            ->orderByDesc('count')
            ->get();

        $recentLeads = Enquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'counts', 'todayCount', 'weekCount', 'monthCount',
            'chartLabels', 'chartData', 'bySources', 'recentLeads'
        ));
    }
}
