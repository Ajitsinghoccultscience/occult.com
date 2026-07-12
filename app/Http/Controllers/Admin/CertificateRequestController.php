<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendCertificateMail;
use App\Models\CertificateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RuntimeException;

class CertificateRequestController extends Controller
{
    public function index()
    {
        $requests = CertificateRequest::latest()->paginate(20);
        $notesStatus = collect(config('certificate_notes.webinars', []))
            ->map(fn (array $notes) => file_exists($notes['path'] ?? ''))
            ->all();
        $counts = [
            'total' => CertificateRequest::count(),
            'pending' => CertificateRequest::whereNull('mail_sent_at')->count(),
            'sent' => CertificateRequest::whereNotNull('mail_sent_at')->count(),
            'failed' => CertificateRequest::whereNull('mail_sent_at')->whereNotNull('mail_error')->count(),
        ];

        return view('admin.certificate-requests.index', compact('requests', 'counts', 'notesStatus'));
    }

    public function updateNotes(Request $request)
    {
        $data = $request->validate([
            'certificate_type' => 'required|in:graphology,astrology',
            'notes_pdf' => 'required|file|mimes:pdf|max:20480',
        ]);

        $notes = config("certificate_notes.webinars.{$data['certificate_type']}");

        if (! $notes) {
            return back()->with('success', 'Invalid webinar type.');
        }

        File::ensureDirectoryExists(dirname($notes['path']));

        $request->file('notes_pdf')->move(dirname($notes['path']), basename($notes['path']));

        return back()->with('success', $notes['label'].' updated successfully.');
    }

    public function downloadNotes(string $type)
    {
        $notes = $this->notesFor($type);

        return response()->download($notes['path'], $notes['filename']);
    }

    public function previewNotes(string $type)
    {
        $notes = $this->notesFor($type);

        return response()->file($notes['path'], [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$notes['filename'].'"',
        ]);
    }

    public function updateDate(Request $request, CertificateRequest $certificateRequest)
    {
        $data = $request->validate([
            'certificate_date' => 'required|date',
        ]);

        $certificateRequest->update([
            'certificate_date' => $data['certificate_date'],
        ]);

        return back()->with('success', 'Certificate issue date updated.');
    }

    public function send(CertificateRequest $certificateRequest)
    {
        // Make sure the notes PDF exists before we queue, so we can warn the
        // admin immediately instead of failing silently in the background.
        $this->notesFor($certificateRequest->certificate_type);

        $certificateRequest->update(['mail_error' => null]);

        SendCertificateMail::dispatch($certificateRequest);

        return back()->with('success', 'Certificate queued — it will be emailed in the background.');
    }

    public function sendAll()
    {
        $pending = CertificateRequest::whereNull('mail_sent_at')->get();

        if ($pending->isEmpty()) {
            return back()->with('success', 'No pending certificates to send.');
        }

        foreach ($pending as $certificateRequest) {
            $certificateRequest->update(['mail_error' => null]);
            SendCertificateMail::dispatch($certificateRequest);
        }

        return back()->with('success', $pending->count().' certificate(s) queued — they will be emailed in the background.');
    }

    private function notesFor(string $certificateType): array
    {
        $notes = config("certificate_notes.webinars.{$certificateType}");

        if (! $notes || ! file_exists($notes['path'])) {
            throw new RuntimeException(
                'Notes PDF missing for '.$certificateType.'. Add it at: '.($notes['path'] ?? 'config/certificate_notes.php')
            );
        }

        return $notes;
    }
}
