<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")
                  ->orWhere('phone', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%");
            });
        }

        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $leads   = $query->paginate(20)->withQueryString();
        $sources = Enquiry::select('source')->distinct()->whereNotNull('source')->pluck('source');
        $counts  = [
            'total'          => Enquiry::count(),
            'new'            => Enquiry::where('status', 'new')->count(),
            'contacted'      => Enquiry::where('status', 'contacted')->count(),
            'enrolled'       => Enquiry::where('status', 'enrolled')->count(),
            'not_interested' => Enquiry::where('status', 'not_interested')->count(),
        ];

        return view('admin.leads', compact('leads', 'sources', 'counts'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $request->validate(['status' => 'required|in:new,contacted,enrolled,not_interested']);
        $enquiry->update(['status' => $request->status]);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return back()->with('success', 'Lead deleted.');
    }
}
