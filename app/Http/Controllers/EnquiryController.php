<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'phone'  => 'required|string|max:15',
            'email'  => 'nullable|email|max:100',
            'source' => 'nullable|string|max:50',
            'notes'  => 'nullable|string|max:1000',
        ]);

        Enquiry::create($data);

        return response()->json(['success' => true]);
    }
}
