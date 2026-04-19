<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Funnel;
use App\Models\FunnelStep;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class AdminFunnelController extends Controller
{
    public function index()
    {
        $funnels = Funnel::with(['steps.landingPage'])->latest()->get();
        return view('admin.funnels.index', compact('funnels'));
    }

    public function create()
    {
        return view('admin.funnels.form', ['funnel' => null]);
    }

    public function store(Request $request)
    {
        $data   = $request->validate(['name' => 'required|string|max:255']);
        $funnel = Funnel::create($data);
        return redirect()->route('admin.funnels.show', $funnel)->with('success', 'Funnel created! Now add pages to it.');
    }

    public function show(Funnel $funnel)
    {
        $funnel->load('steps.landingPage');
        $pages = LandingPage::orderBy('title')->get();
        return view('admin.funnels.show', compact('funnel', 'pages'));
    }

    public function edit(Funnel $funnel)
    {
        return view('admin.funnels.form', compact('funnel'));
    }

    public function update(Request $request, Funnel $funnel)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $funnel->update($data);
        return redirect()->route('admin.funnels.show', $funnel)->with('success', 'Funnel updated.');
    }

    public function destroy(Funnel $funnel)
    {
        $funnel->delete();
        return redirect()->route('admin.funnels.index')->with('success', 'Funnel deleted.');
    }

    public function addStep(Request $request, Funnel $funnel)
    {
        $data = $request->validate(['landing_page_id' => 'required|exists:landing_pages,id']);
        $maxOrder = $funnel->steps()->max('step_order') ?? -1;
        $funnel->steps()->create([
            'landing_page_id' => $data['landing_page_id'],
            'step_order'      => $maxOrder + 1,
        ]);
        return back()->with('success', 'Page added to funnel.');
    }

    public function removeStep(Funnel $funnel, FunnelStep $step)
    {
        $step->delete();
        // Re-number remaining steps
        $funnel->steps()->orderBy('step_order')->each(function ($s, $i) {
            $s->update(['step_order' => $i]);
        });
        return back()->with('success', 'Step removed.');
    }

    public function moveStep(Request $request, Funnel $funnel, FunnelStep $step)
    {
        $direction = $request->input('direction');
        $steps     = $funnel->steps()->orderBy('step_order')->get();
        $index     = $steps->search(fn($s) => $s->id === $step->id);

        if ($direction === 'up' && $index > 0) {
            $swap = $steps[$index - 1];
        } elseif ($direction === 'down' && $index < $steps->count() - 1) {
            $swap = $steps[$index + 1];
        } else {
            return back();
        }

        [$step->step_order, $swap->step_order] = [$swap->step_order, $step->step_order];
        $step->save();
        $swap->save();

        return back();
    }
}
