<?php

namespace App\Jobs;

use App\Mail\CertificateGeneratedMail;
use App\Models\CertificateRequest;
use App\Services\CertificateGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use RuntimeException;
use Throwable;

class SendCertificateMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $backoff = 30;

    public function __construct(public CertificateRequest $certificateRequest)
    {
    }

    public function handle(CertificateGenerator $certificateGenerator): void
    {
        $request = $this->certificateRequest;

        $certificateJpeg = $certificateGenerator->generateJpeg(
            $request->certificate_type,
            $request->name,
            optional($request->certificate_date)->format('d M Y')
        );

        $certificateLabel = $certificateGenerator->types()[$request->certificate_type] ?? 'Certificate';

        $notes = config("certificate_notes.webinars.{$request->certificate_type}");

        if (! $notes || ! file_exists($notes['path'])) {
            throw new RuntimeException(
                'Notes PDF missing for '.$request->certificate_type.'. Add it at: '.($notes['path'] ?? 'config/certificate_notes.php')
            );
        }

        Mail::mailer('admission')->to($request->email)->send(
            new CertificateGeneratedMail(
                $request,
                $certificateJpeg,
                $certificateLabel,
                $notes['path'],
                $notes['filename']
            )
        );

        $request->update([
            'mail_sent_at' => now(),
            'mail_error' => null,
        ]);
    }

    public function failed(Throwable $exception): void
    {
        $this->certificateRequest->update([
            'mail_error' => $exception->getMessage(),
        ]);
    }
}
