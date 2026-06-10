<?php

namespace App\Http\Controllers\Admin\WhatsApp;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\WhatsAppTemplate;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class QuickSendController extends Controller
{
    public function create()
    {
        $templates = WhatsAppTemplate::approved()->orderBy('name')->get();
        $sender    = AdminUser::find(session('admin_user_id'));
        return view('admin.whatsapp.quick-send', compact('templates', 'sender'));
    }

    public function send(Request $request, WhatsAppService $whatsApp)
    {
        $request->validate([
            'template_id' => 'required|exists:whatsapp_templates,id',
            'phones'      => 'required|string',
            'vars'        => 'nullable|array',
        ]);

        $template = WhatsAppTemplate::findOrFail($request->template_id);
        $sender   = AdminUser::find(session('admin_user_id'));

        $phones = array_filter(
            array_map('trim', explode("\n", $request->phones)),
            fn($p) => $p !== ''
        );

        if (empty($phones)) {
            return back()->with('error', 'Please enter at least one phone number.')->withInput();
        }

        $vars = $request->input('vars', []);
        $namedVars = [];
        foreach ($template->variables ?? [] as $varName) {
            $namedVars[$varName] = $vars[$varName] ?? '';
        }

        $results = [];
        foreach ($phones as $phone) {
            $result = $whatsApp->sendTemplate($phone, $template->meta_name, $template->language, $namedVars);
            $results[] = [
                'phone'   => $phone,
                'success' => $result['success'],
                'error'   => $result['error'] ?? null,
            ];
        }

        $templates = WhatsAppTemplate::approved()->orderBy('name')->get();

        return view('admin.whatsapp.quick-send', compact('templates', 'sender', 'results'))
            ->with('selected_template_id', $template->id);
    }
}
