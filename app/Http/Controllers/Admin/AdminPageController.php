<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::withCount('sections')->latest()->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:landing_pages,slug|regex:/^[a-zA-Z0-9\-]+$/',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $page = LandingPage::create($data);
        return redirect()->route('admin.pages.show', $page)->with('success', 'Page created! Now add your sections.');
    }

    public function show(LandingPage $page)
    {
        $sections = $page->sections;
        return view('admin.pages.show', compact('page', 'sections'));
    }

    public function edit(LandingPage $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, LandingPage $page)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:landing_pages,slug,' . $page->id . '|regex:/^[a-zA-Z0-9\-]+$/',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $page->update($data);
        return redirect()->route('admin.pages.show', $page)->with('success', 'Page settings updated.');
    }

    public function destroy(LandingPage $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted.');
    }

    public function toggle(LandingPage $page)
    {
        $page->update(['is_active' => ! $page->is_active]);
        return back()->with('success', 'Page status updated.');
    }
}
