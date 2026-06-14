<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    /**
     * List all of the logged-in counsellor's landing-page links.
     */
    public function index()
    {
        $user = $this->counsellor();
        $links = $user->landingPages()->latest()->get();

        return view('admin.landing.index', compact('user', 'links'));
    }

    /**
     * Create a new landing-page link for the counsellor.
     */
    public function store(Request $request)
    {
        $user = $this->counsellor();
        $data = $this->validated($request);

        $data['slug'] = $this->resolveSlug($request->slug ?: $request->label);
        $data['admin_user_id'] = $user->id;

        LandingPage::create($data);

        return redirect()->route('admin.landing.index')
            ->with('success', 'New landing page link created.');
    }

    /**
     * Edit one of the counsellor's own links.
     */
    public function edit(LandingPage $landingPage)
    {
        $user = $this->counsellor();
        $this->authorizeOwner($landingPage, $user);

        return view('admin.landing.edit', ['user' => $user, 'link' => $landingPage]);
    }

    /**
     * Update one of the counsellor's own links.
     */
    public function update(Request $request, LandingPage $landingPage)
    {
        $user = $this->counsellor();
        $this->authorizeOwner($landingPage, $user);

        $data = $this->validated($request, $landingPage->id);
        $data['slug'] = $this->resolveSlug($request->slug ?: $request->label, $landingPage->id);

        $landingPage->update($data);

        return redirect()->route('admin.landing.index')
            ->with('success', 'Landing page link updated.');
    }

    /**
     * Delete one of the counsellor's own links.
     */
    public function destroy(LandingPage $landingPage)
    {
        $user = $this->counsellor();
        $this->authorizeOwner($landingPage, $user);

        $landingPage->delete();

        return redirect()->route('admin.landing.index')
            ->with('success', 'Landing page link deleted.');
    }

    /**
     * Shared validation for create/update.
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $request->validate([
            'label'            => 'required|string|max:120',
            'slug'             => 'nullable|string|max:60|alpha_dash|unique:counsellor_links,slug' . ($ignoreId ? ',' . $ignoreId : ''),
            'lp_course_name'   => 'nullable|string|max:120',
            'lp_enrolled'      => 'nullable|string|max:80',
            'lp_rating'        => 'nullable|string|max:20',
            'lp_seats'         => 'nullable|string|max:80',
            'lp_price'         => 'nullable|integer|min:0',
            'lp_old_price'     => 'nullable|integer|min:0',
            'lp_discount'      => 'nullable|string|max:30',
            'lp_timer_minutes' => 'nullable|integer|min:0|max:100000',
        ]);

        return [
            'label'            => trim($request->label),
            'lp_course_name'   => $request->lp_course_name ?: null,
            'lp_enrolled'      => $request->lp_enrolled ?: null,
            'lp_rating'        => $request->lp_rating ?: null,
            'lp_seats'         => $request->lp_seats ?: null,
            'lp_price'         => $request->lp_price ?: null,
            'lp_old_price'     => $request->lp_old_price ?: null,
            'lp_discount'      => $request->lp_discount ?: null,
            'lp_timer_minutes' => $request->lp_timer_minutes ?: null,
        ];
    }

    /**
     * Build a unique slug from the given text (auto from label, or a typed slug).
     */
    private function resolveSlug(?string $text, ?int $ignoreId = null): string
    {
        $base = Str::slug($text ?: 'link');
        if ($base === '') {
            $base = 'link';
        }

        $slug = $base;
        $i = 2;
        while (LandingPage::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
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

    /**
     * Ensure the link belongs to the logged-in counsellor.
     */
    private function authorizeOwner(LandingPage $landingPage, AdminUser $user): void
    {
        abort_unless($landingPage->admin_user_id === $user->id, 403, 'This link does not belong to you.');
    }
}
