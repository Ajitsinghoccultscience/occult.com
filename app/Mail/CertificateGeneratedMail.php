<?php

namespace App\Mail;

use App\Models\CertificateRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificateGeneratedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public CertificateRequest $certificateRequest,
        private string $certificateSvg,
        public string $certificateLabel,
        private string $notesPath,
        private string $notesFilename
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mail.admission_from.address'),
                config('mail.admission_from.name')
            ),
            subject: 'Your '.$this->certificateLabel.' Certificate'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.certificate-generated'
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn () => $this->certificateSvg,
                (string) str($this->certificateLabel)->slug('-').'-certificate.svg'
            )->withMime('image/svg+xml'),
            Attachment::fromPath($this->notesPath)
                ->as($this->notesFilename)
                ->withMime('application/pdf'),
        ];
    }
}
