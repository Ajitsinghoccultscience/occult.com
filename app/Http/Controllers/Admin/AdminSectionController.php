<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\LandingPageSection;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{
    public function create(LandingPage $page)
    {
        return view('admin.sections.form', ['page' => $page, 'section' => null]);
    }

    public function store(Request $request, LandingPage $page)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'html_content' => 'required|string',
        ]);

        $maxOrder = $page->sections()->max('sort_order') ?? -1;

        $page->sections()->create([
            'name'         => $data['name'],
            'html_content' => $data['html_content'],
            'sort_order'   => $maxOrder + 1,
            'is_active'    => true,
        ]);

        return redirect()->route('admin.pages.show', $page)->with('success', 'Section added!');
    }

    public function edit(LandingPage $page, LandingPageSection $section)
    {
        return view('admin.sections.form', compact('page', 'section'));
    }

    public function update(Request $request, LandingPage $page, LandingPageSection $section)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'html_content' => 'required|string',
        ]);

        $section->update($data);
        return redirect()->route('admin.pages.show', $page)->with('success', 'Section updated!');
    }

    public function destroy(LandingPage $page, LandingPageSection $section)
    {
        $section->delete();
        return redirect()->route('admin.pages.show', $page)->with('success', 'Section deleted.');
    }

    public function toggle(LandingPage $page, LandingPageSection $section)
    {
        $section->update(['is_active' => ! $section->is_active]);
        return back()->with('success', 'Section visibility updated.');
    }

    public function move(Request $request, LandingPage $page, LandingPageSection $section)
    {
        $direction = $request->input('direction'); // 'up' or 'down'
        $sections  = $page->sections()->orderBy('sort_order')->get();
        $index     = $sections->search(fn($s) => $s->id === $section->id);

        if ($direction === 'up' && $index > 0) {
            $swap = $sections[$index - 1];
        } elseif ($direction === 'down' && $index < $sections->count() - 1) {
            $swap = $sections[$index + 1];
        } else {
            return back();
        }

        [$section->sort_order, $swap->sort_order] = [$swap->sort_order, $section->sort_order];
        $section->save();
        $swap->save();

        return back();
    }
}
