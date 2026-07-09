<?php

namespace App\Http\Controllers;

use App\Models\CertificateRequest;
use App\Services\CertificateGenerator;
use Illuminate\Http\Request;

class CertificateRequestController extends Controller
{
    public function create(CertificateGenerator $certificateGenerator)
    {
        return view('pages.certificate-request', [
            'certificateTypes' => array_intersect_key($certificateGenerator->types(), ['graphology' => true]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'required|email|max:100',
            'phone'       => 'required|string|max:15',
            'certificate_type' => 'required|in:graphology',
            'review_text' => 'required|string|min:10|max:1000',
        ]);

        $certificateRequest = CertificateRequest::create([
            'name'             => $data['name'],
            'email'            => $data['email'],
            'phone'            => $data['phone'],
            'certificate_type' => $data['certificate_type'],
            'review_text'      => $data['review_text'],
            'certificate_date' => now()->toDateString(),
        ]);

        return back()
            ->with('success', 'Thank you for sharing your review. Your certificate will be emailed after admin approval.');
    }

    public function certificate(CertificateRequest $certificateRequest, CertificateGenerator $certificateGenerator)
    {
        $date = optional($certificateRequest->certificate_date)->format('d M Y')
            ?: $certificateRequest->created_at?->format('d M Y');

        return response($certificateGenerator->generateJpeg($certificateRequest->certificate_type, $certificateRequest->name, $date), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline; filename="certificate-'.$certificateRequest->id.'.jpg"',
        ]);
    }
}
