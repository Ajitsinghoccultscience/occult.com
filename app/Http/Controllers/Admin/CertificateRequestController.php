<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CertificateGeneratedMail;
use App\Models\CertificateRequest;
use App\Services\CertificateGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Throwable;

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

    public function send(CertificateRequest $certificateRequest, CertificateGenerator $certificateGenerator)
    {
        $certificateJpeg = $certificateGenerator->generateJpeg(
            $certificateRequest->certificate_type,
            $certificateRequest->name,
            optional($certificateRequest->certificate_date)->format('d M Y')
        );
        $certificateLabel = $certificateGenerator->types()[$certificateRequest->certificate_type] ?? 'Certificate';

        try {
            $notes = $this->notesFor($certificateRequest->certificate_type);

            Mail::mailer('admission')->to($certificateRequest->email)->send(
                new CertificateGeneratedMail(
                    $certificateRequest,
                    $certificateJpeg,
                    $certificateLabel,
                    $notes['path'],
                    $notes['filename']
                )
            );

            $certificateRequest->update([
                'mail_sent_at' => now(),
                'mail_error' => null,
            ]);

            return back()->with('success', 'Certificate sent successfully.');
        } catch (Throwable $exception) {
            report($exception);

            $certificateRequest->update([
                'mail_error' => $exception->getMessage(),
            ]);

            return back()->with('success', 'Email sending failed. Please check mail settings.');
        }
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
