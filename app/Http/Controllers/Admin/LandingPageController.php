<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Show the logged-in counsellor's own landing-page settings editor.
     */
    public function edit()
    {
        $user = $this->counsellor();
        return view('admin.landing.edit', compact('user'));
    }

    /**
     * Save the logged-in counsellor's own landing-page settings.
     */
    public function update(Request $request)
    {
        $user = $this->counsellor();

        $request->validate([
            'slug'             => 'nullable|string|max:50|alpha_dash|unique:admin_users,slug,' . $user->id,
            'lp_price'         => 'nullable|integer|min:0',
            'lp_old_price'     => 'nullable|integer|min:0',
            'lp_discount'      => 'nullable|string|max:30',
            'lp_timer_minutes' => 'nullable|integer|min:0|max:100000',
        ]);

        $user->update([
            'slug'             => $request->slug ? strtolower(trim($request->slug)) : null,
            'lp_price'         => $request->lp_price ?: null,
            'lp_old_price'     => $request->lp_old_price ?: null,
            'lp_discount'      => $request->lp_discount ?: null,
            'lp_timer_minutes' => $request->lp_timer_minutes ?: null,
        ]);

        return back()->with('success', 'Your landing page settings have been saved.');
    }

    /**
     * Resolve the logged-in user and ensure they are a counsellor.
     */
    private function counsellor(): AdminUser
    {
        $user = AdminUser::find(session('admin_user_id'));
        abort_unless($user && $user->role === 'counsellor', 403, 'This page is for counsellors only.');
        return $user;
    }
}
