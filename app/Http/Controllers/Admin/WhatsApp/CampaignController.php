<?php

namespace App\Http\Controllers\Admin\WhatsApp;

use App\Http\Controllers\Controller;
use App\Jobs\SendWhatsAppMessage;
use App\Models\WhatsAppCampaign;
use App\Models\WhatsAppCampaignContact;
use App\Models\WhatsAppTemplate;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = WhatsAppCampaign::with('template')->latest()->get();

        $counts = [
            'total'     => $campaigns->count(),
            'draft'     => $campaigns->where('status', 'draft')->count(),
            'sending'   => $campaigns->where('status', 'sending')->count(),
            'completed' => $campaigns->where('status', 'completed')->count(),
        ];

        return view('admin.whatsapp.campaigns.index', compact('campaigns', 'counts'));
    }

    public function create()
    {
        $templates = WhatsAppTemplate::approved()->orderBy('name')->get();
        return view('admin.whatsapp.campaigns.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:150',
            'template_id' => 'required|exists:whatsapp_templates,id',
            'sheet'       => 'required|file|mimes:csv,xlsx,xls|max:5120',
        ]);

        $file     = $request->file('sheet');
        $path     = $file->store('whatsapp-uploads', 'local');
        $headers  = $this->parseHeaders($path, $file->getClientOriginalExtension());

        $campaign = WhatsAppCampaign::create([
            'name'        => $request->name,
            'template_id' => $request->template_id,
            'file_path'   => $path,
            'status'      => 'draft',
        ]);

        return redirect()->route('admin.whatsapp.campaigns.map', $campaign)
            ->with('headers', $headers);
    }

    public function map(WhatsAppCampaign $campaign)
    {
        if (!$campaign->isEditable()) {
            return redirect()->route('admin.whatsapp.campaigns.show', $campaign);
        }

        $ext     = pathinfo($campaign->file_path, PATHINFO_EXTENSION);
        $headers = $this->parseHeaders($campaign->file_path, $ext);
        $sample  = $this->parseRows($campaign->file_path, $ext, 1);
        $sample  = $sample[0] ?? [];

        $template = $campaign->template;

        return view('admin.whatsapp.campaigns.map', compact('campaign', 'template', 'headers', 'sample'));
    }

    public function preview(Request $request, WhatsAppCampaign $campaign)
    {
        $template  = $campaign->template;
        $variables = $template->variables ?? [];

        // Validate: phone column + one column per variable
        $rules = ['phone_col' => 'required|integer|min:0'];
        foreach ($variables as $var) {
            $rules["col_{$var}"] = 'required|integer|min:0';
        }
        $request->validate($rules);

        // Build column map: {varName => columnIndex}
        $columnMap = ['__phone' => (int) $request->phone_col];
        foreach ($variables as $var) {
            $columnMap[$var] = (int) $request->input("col_{$var}");
        }

        // Save column map
        $campaign->update(['column_map' => $columnMap]);

        // Parse all rows and create contact records (delete old ones first)
        $campaign->contacts()->delete();

        $ext  = pathinfo($campaign->file_path, PATHINFO_EXTENSION);
        $rows = $this->parseRows($campaign->file_path, $ext);

        $contacts    = [];
        $whatsApp    = app(WhatsAppService::class);
        $invalidRows = 0;

        foreach ($rows as $row) {
            $rawPhone = trim($row[$columnMap['__phone']] ?? '');
            if (empty($rawPhone)) {
                $invalidRows++;
                continue;
            }

            $resolvedVars = [];
            foreach ($variables as $var) {
                $resolvedVars[$var] = trim($row[$columnMap[$var]] ?? '');
            }

            $contacts[] = [
                'campaign_id' => $campaign->id,
                'phone'       => $rawPhone,
                'variables'   => json_encode($resolvedVars),
                'status'      => 'pending',
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        foreach (array_chunk($contacts, 500) as $chunk) {
            WhatsAppCampaignContact::insert($chunk);
        }

        $campaign->update(['total_count' => count($contacts)]);

        // First 5 previews
        $previews = WhatsAppCampaignContact::where('campaign_id', $campaign->id)
            ->limit(5)
            ->get()
            ->map(function ($c) use ($template) {
                $body = $template->body;
                foreach (($c->variables ?? []) as $var => $val) {
                    $body = str_replace("{{{$var}}}", $val, $body);
                }
                return ['phone' => $c->phone, 'message' => $body];
            });

        return view('admin.whatsapp.campaigns.preview', compact('campaign', 'template', 'previews', 'invalidRows'));
    }

    public function launch(WhatsAppCampaign $campaign)
    {
        if (!$campaign->isEditable()) {
            return redirect()->route('admin.whatsapp.campaigns.show', $campaign);
        }

        $campaign->update(['status' => 'sending', 'launched_at' => now()]);

        $contacts = WhatsAppCampaignContact::where('campaign_id', $campaign->id)
            ->where('status', 'pending')
            ->get();

        foreach ($contacts as $contact) {
            SendWhatsAppMessage::dispatch($contact)->onQueue('whatsapp');
        }

        return redirect()->route('admin.whatsapp.campaigns.show', $campaign)
            ->with('success', "Campaign launched — {$contacts->count()} messages queued.");
    }

    public function stats(WhatsAppCampaign $campaign)
    {
        $total   = $campaign->total_count;
        $sent    = $campaign->contacts()->where('status', 'sent')->count();
        $failed  = $campaign->contacts()->where('status', 'failed')->count();
        $pending = $campaign->contacts()->where('status', 'pending')->count();
        $done    = $sent + $failed;
        $percent = $total > 0 ? round(($done / $total) * 100) : 0;

        return response()->json([
            'status'   => $campaign->status,
            'total'    => $total,
            'sent'     => $sent,
            'failed'   => $failed,
            'pending'  => $pending,
            'percent'  => $percent,
        ]);
    }

    public function show(WhatsAppCampaign $campaign)
    {
        $campaign->load('template');

        $statusCounts = [
            'pending' => $campaign->contacts()->where('status', 'pending')->count(),
            'sent'    => $campaign->contacts()->where('status', 'sent')->count(),
            'failed'  => $campaign->contacts()->where('status', 'failed')->count(),
        ];

        $contacts = $campaign->contacts()->latest()->paginate(20);

        return view('admin.whatsapp.campaigns.show', compact('campaign', 'statusCounts', 'contacts'));
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function parseHeaders(string $storagePath, string $ext): array
    {
        $fullPath = Storage::disk('local')->path($storagePath);

        if (strtolower($ext) === 'csv') {
            $handle  = fopen($fullPath, 'r');
            $headers = $handle ? array_values(fgetcsv($handle) ?? []) : [];
            if ($handle) fclose($handle);
            return array_map('strval', $headers);
        }

        // Excel — read first row only
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fullPath);
        $sheet       = $spreadsheet->getActiveSheet();
        $headers     = [];
        foreach ($sheet->getRowIterator(1, 1) as $row) {
            foreach ($row->getCellIterator() as $cell) {
                $headers[] = (string) $cell->getValue();
            }
        }
        return $headers;
    }

    private function parseRows(string $storagePath, string $ext, int $limit = 0): array
    {
        $fullPath = Storage::disk('local')->path($storagePath);

        if (strtolower($ext) === 'csv') {
            return $this->parseCsv($fullPath, $limit);
        }

        return $this->parseExcel($fullPath, $limit);
    }

    private function parseCsv(string $path, int $limit): array
    {
        $rows = [];
        $skip = true; // skip header row

        if (($handle = fopen($path, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                if ($skip) { $skip = false; continue; } // skip header
                $rows[] = array_values($row);
                if ($limit > 0 && count($rows) >= $limit) break;
            }
            fclose($handle);
        }

        return $rows;
    }

    private function parseExcel(string $path, int $limit): array
    {
        $rows        = [];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $sheet       = $spreadsheet->getActiveSheet();
        $first       = true;

        foreach ($sheet->getRowIterator() as $row) {
            if ($first) { $first = false; continue; } // skip header

            $cellIter = $row->getCellIterator();
            $cellIter->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIter as $cell) {
                $rowData[] = (string) $cell->getValue();
            }

            $rows[] = $rowData;
            if ($limit > 0 && count($rows) >= $limit) break;
        }

        return $rows;
    }

    public function headers(WhatsAppCampaign $campaign)
    {
        $ext     = pathinfo($campaign->file_path, PATHINFO_EXTENSION);
        $fullPath = Storage::disk('local')->path($campaign->file_path);

        if (strtolower($ext) === 'csv') {
            $handle = fopen($fullPath, 'r');
            $headers = $handle ? array_values(fgetcsv($handle) ?? []) : [];
            if ($handle) fclose($handle);
        } else {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fullPath);
            $sheet       = $spreadsheet->getActiveSheet();
            $headers     = [];
            foreach ($sheet->getRowIterator(1, 1) as $row) {
                foreach ($row->getCellIterator() as $cell) {
                    $headers[] = (string) $cell->getValue();
                }
            }
        }

        return response()->json(['headers' => $headers]);
    }
}
