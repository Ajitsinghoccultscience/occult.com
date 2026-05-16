<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebinarSetting;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = WebinarSetting::all();
        return view('admin.webinars.index', compact('webinars'));
    }

    public function edit(string $key)
    {
        $webinar = WebinarSetting::where('key', $key)->firstOrFail();
        return view('admin.webinars.edit', compact('webinar'));
    }

    public function update(Request $request, string $key)
    {
        $webinar = WebinarSetting::where('key', $key)->firstOrFail();

        $data = $request->validate([
            'webinar_name'     => 'required|string|max:150',
            'event_date'       => 'required|string|max:50',
            'event_date_short' => 'required|string|max:30',
            'attend_date'      => 'required|string|max:30',
            'event_time'       => 'required|string|max:60',
            'whatsapp_url'     => 'required|url|max:255',
            'price'            => 'required|string|max:20',
            'description'      => 'nullable|string|max:255',
        ]);

        $webinar->update($data);

        return redirect()->route('admin.webinars.index')
                         ->with('success', ucfirst($key) . ' webinar settings updated successfully.');
    }
}
