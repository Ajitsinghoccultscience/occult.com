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

        // Use user's own Phone Number ID if set, else fall back to .env
        $phoneNumberId = $sender?->whatsapp_phone_number_id
            ?: config('whatsapp.phone_number_id');

        if (!$phoneNumberId) {
            return back()->with('error', 'No WhatsApp sender number configured. Ask admin to assign one in Team settings.')->withInput();
        }

        $phones = array_filter(
            array_map('trim', explode("\n", $request->phones)),
            fn($p) => $p !== ''
        );

        if (empty($phones)) {
            return back()->with('error', 'Please enter at least one phone number.')->withInput();
        }

        $vars = $request->input('vars', []);
        $orderedVars = [];
        foreach ($template->variables ?? [] as $varName) {
            $orderedVars[] = $vars[$varName] ?? '';
        }

        $results = [];
        foreach ($phones as $phone) {
            $result = $whatsApp->sendTemplateFrom($phoneNumberId, $phone, $template->meta_name, $template->language, $orderedVars);
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
