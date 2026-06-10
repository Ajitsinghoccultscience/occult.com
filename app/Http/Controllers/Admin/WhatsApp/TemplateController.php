<?php

namespace App\Http\Controllers\Admin\WhatsApp;

use App\Http\Controllers\Controller;
use App\Models\WhatsAppTemplate;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = WhatsAppTemplate::latest()->get();
        return view('admin.whatsapp.templates.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.whatsapp.templates.create');
    }

    public function store(Request $request, WhatsAppService $whatsApp)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:100',
            'meta_name'        => 'required|string|max:100|unique:whatsapp_templates,meta_name|regex:/^[a-z0-9_]+$/',
            'language'         => 'required|string|max:10',
            'category'         => 'required|in:MARKETING,UTILITY,AUTHENTICATION',
            'header_type'      => 'required|in:none,text,image,document',
            'header_text'      => 'nullable|string|max:60|required_if:header_type,text',
            'header_image'     => 'nullable|file|mimes:jpeg,jpg,png|max:5120|required_if:header_type,image',
            'header_document'  => 'nullable|file|mimes:pdf|max:10240|required_if:header_type,document',
            'body'             => 'required|string',
            'example_values'   => 'nullable|array',
        ]);

        if ($request->hasFile('header_image')) {
            $data['header_image'] = $request->file('header_image')->store('whatsapp-headers', 'public');
        }

        if ($request->hasFile('header_document')) {
            $data['header_document'] = $request->file('header_document')->store('whatsapp-documents', 'public');
        }

        preg_match_all('/\{\{(\w+)\}\}/', $data['body'], $matches);
        $data['variables']   = array_values(array_unique($matches[1]));
        $data['status']      = 'draft';
        $data['meta_status'] = 'PENDING';

        $template = WhatsAppTemplate::create($data);

        $result = $whatsApp->submitToMeta($template);

        if ($result['success']) {
            return redirect()->route('admin.whatsapp.templates.index')
                ->with('success', 'Template created and submitted to Meta for approval.');
        }

        return redirect()->route('admin.whatsapp.templates.index')
            ->with('warning', 'Template saved but Meta submission failed: ' . $result['error']);
    }

    public function edit(WhatsAppTemplate $template)
    {
        return view('admin.whatsapp.templates.create', compact('template'));
    }

    public function update(Request $request, WhatsAppTemplate $template, WhatsAppService $whatsApp)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:100',
            'meta_name'        => 'required|string|max:100|regex:/^[a-z0-9_]+$/|unique:whatsapp_templates,meta_name,' . $template->id,
            'language'         => 'required|string|max:10',
            'category'         => 'required|in:MARKETING,UTILITY,AUTHENTICATION',
            'header_type'      => 'required|in:none,text,image,document',
            'header_text'      => 'nullable|string|max:60|required_if:header_type,text',
            'header_image'     => 'nullable|file|mimes:jpeg,jpg,png|max:5120',
            'header_document'  => 'nullable|file|mimes:pdf|max:10240',
            'body'             => 'required|string',
            'example_values'   => 'nullable|array',
        ]);

        if ($request->hasFile('header_image')) {
            if ($template->header_image) {
                Storage::disk('public')->delete($template->header_image);
            }
            $data['header_image'] = $request->file('header_image')->store('whatsapp-headers', 'public');
        }

        if ($request->hasFile('header_document')) {
            if ($template->header_document) {
                Storage::disk('public')->delete($template->header_document);
            }
            $data['header_document'] = $request->file('header_document')->store('whatsapp-documents', 'public');
        }

        preg_match_all('/\{\{(\w+)\}\}/', $data['body'], $matches);
        $data['variables']   = array_values(array_unique($matches[1]));
        $data['status']      = 'draft';
        $data['meta_status'] = 'PENDING';

        $template->update($data);

        $result = $whatsApp->submitToMeta($template);

        if ($result['success']) {
            return redirect()->route('admin.whatsapp.templates.index')
                ->with('success', 'Template updated and re-submitted to Meta for approval.');
        }

        return redirect()->route('admin.whatsapp.templates.index')
            ->with('warning', 'Template saved but Meta submission failed: ' . $result['error']);
    }

    public function refreshStatus(WhatsAppTemplate $template, WhatsAppService $whatsApp)
    {
        $result = $whatsApp->checkTemplateStatus($template);

        if (!$result['success']) {
            return back()->with('error', 'Could not check status: ' . $result['error']);
        }

        $metaStatus = $result['meta_status'];

        if ($metaStatus === 'APPROVED') {
            return back()->with('success', "Template \"{$template->name}\" is approved and ready to use.");
        }

        if ($metaStatus === 'REJECTED') {
            return back()->with('error', "Template rejected by Meta. Reason: " . ($result['reason'] ?? 'Not specified'));
        }

        return back()->with('success', "Status: {$metaStatus} — Meta is still reviewing.");
    }

    /**
     * Import all templates from the WATI dashboard into the local table.
     */
    public function syncFromWati(WhatsAppService $whatsApp)
    {
        $result = $whatsApp->fetchTemplates();

        if (!$result['success']) {
            return back()->with('error', 'Could not fetch templates from WATI: ' . $result['error']);
        }

        $created = 0;
        $updated = 0;

        foreach ($result['templates'] as $data) {
            if (empty($data['meta_name'])) {
                continue;
            }

            $existing = WhatsAppTemplate::where('meta_name', $data['meta_name'])->first();

            if ($existing) {
                $existing->update($data);
                $updated++;
            } else {
                WhatsAppTemplate::create(array_merge(['header_type' => 'none'], $data));
                $created++;
            }
        }

        return back()->with('success', "Synced from WATI: {$created} added, {$updated} updated.");
    }

    public function forceApprove(WhatsAppTemplate $template)
    {
        $template->update(['status' => 'approved', 'meta_status' => 'APPROVED', 'rejection_reason' => null]);
        return back()->with('success', "Template \"{$template->name}\" marked as approved and ready to use.");
    }

    public function destroy(WhatsAppTemplate $template)
    {
        if ($template->campaigns()->exists()) {
            return back()->with('error', 'Cannot delete — template is used in campaigns.');
        }

        if ($template->header_image)    Storage::disk('public')->delete($template->header_image);
        if ($template->header_document) Storage::disk('public')->delete($template->header_document);

        $template->delete();
        return back()->with('success', 'Template deleted.');
    }
}
