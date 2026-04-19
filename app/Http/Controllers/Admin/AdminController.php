<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\Funnel;

class AdminController extends Controller
{
    public function index()
    {
        $pageCount   = LandingPage::count();
        $funnelCount = Funnel::count();
        return view('admin.dashboard', compact('pageCount', 'funnelCount'));
    }
}
