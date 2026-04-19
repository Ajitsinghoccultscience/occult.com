<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\FunnelStep;

class LandingPageController extends Controller
{
    public function show(string $slug)
    {
        $page = LandingPage::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $sections = $page->sections()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Determine next_url from funnel (if this page is part of one)
        $nextUrl = '#';
        $step = FunnelStep::where('landing_page_id', $page->id)->first();
        if ($step) {
            $nextStep = FunnelStep::where('funnel_id', $step->funnel_id)
                ->where('step_order', $step->step_order + 1)
                ->with('landingPage')
                ->first();
            if ($nextStep && $nextStep->landingPage) {
                $nextUrl = url('/' . $nextStep->landingPage->slug);
            }
        }

        $html = $sections->pluck('html_content')->implode("\n");
        $html = str_replace('{{next_url}}', $nextUrl, $html);

        return response($html, 200)->header('Content-Type', 'text/html; charset=UTF-8');
    }
}
