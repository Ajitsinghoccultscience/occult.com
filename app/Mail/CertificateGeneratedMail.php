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

    private const FROM_ADDRESS = 'admission@occultscience.in';
    private const FROM_NAME = 'Occult Science';

    public function __construct(
        public CertificateRequest $certificateRequest,
        private string $certificateJpeg,
        public string $certificateLabel,
        private string $notesPath,
        private string $notesFilename
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                self::FROM_ADDRESS,
                self::FROM_NAME
            ),
            subject: 'Your '.$this->certificateLabel.' Certificate'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.certificate-generated',
            text: 'emails.certificate-generated-text',
            with: [
                'certificateRequest' => $this->certificateRequest,
                'certificateLabel' => $this->certificateLabel,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn () => $this->certificateJpeg,
                (string) str($this->certificateLabel)->slug('-').'-certificate.jpg'
            )->withMime('image/jpeg'),
            Attachment::fromPath($this->notesPath)
                ->as($this->notesFilename)
                ->withMime('application/pdf'),
        ];
    }
}
