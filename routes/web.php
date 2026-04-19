<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminFunnelController;

// Existing static pages
Route::get('/', fn() => redirect('/astrology-webinar-1'));
Route::get('/astrology-webinar-1', [PageController::class, 'index']);
Route::get('/astrology-webinar-2', [PageController::class, 'astrologyWebinar']);
Route::get('/astrology-checkout', [PageController::class, 'astrologyCheckout']);
Route::get('/astrology-thankyou', [PageController::class, 'astrologyThankyou']);
Route::get('/graphology-webinar-1', [PageController::class, 'graphologyWebinar']);
Route::get('/graphology-webinar-2', [PageController::class, 'graphologyWebinarlvl1']);
Route::get('/graphology-checkout', [PageController::class, 'graphologyCheckout']);
Route::get('/graphology-thankyou', [PageController::class, 'graphologyThankyou']);

// Admin auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('admin.logout');

// Admin panel (auth-protected)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Pages
    Route::get('pages', [AdminPageController::class, 'index'])->name('admin.pages.index');
    Route::get('pages/create', [AdminPageController::class, 'create'])->name('admin.pages.create');
    Route::post('pages', [AdminPageController::class, 'store'])->name('admin.pages.store');
    Route::get('pages/{page}', [AdminPageController::class, 'show'])->name('admin.pages.show');
    Route::get('pages/{page}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('pages/{page}', [AdminPageController::class, 'update'])->name('admin.pages.update');
    Route::delete('pages/{page}', [AdminPageController::class, 'destroy'])->name('admin.pages.destroy');
    Route::post('pages/{page}/toggle', [AdminPageController::class, 'toggle'])->name('admin.pages.toggle');

    // Sections
    Route::get('pages/{page}/sections/create', [AdminSectionController::class, 'create'])->name('admin.sections.create');
    Route::post('pages/{page}/sections', [AdminSectionController::class, 'store'])->name('admin.sections.store');
    Route::get('pages/{page}/sections/{section}/edit', [AdminSectionController::class, 'edit'])->name('admin.sections.edit');
    Route::put('pages/{page}/sections/{section}', [AdminSectionController::class, 'update'])->name('admin.sections.update');
    Route::delete('pages/{page}/sections/{section}', [AdminSectionController::class, 'destroy'])->name('admin.sections.destroy');
    Route::post('pages/{page}/sections/{section}/toggle', [AdminSectionController::class, 'toggle'])->name('admin.sections.toggle');
    Route::post('pages/{page}/sections/{section}/move', [AdminSectionController::class, 'move'])->name('admin.sections.move');

    // Funnels
    Route::get('funnels', [AdminFunnelController::class, 'index'])->name('admin.funnels.index');
    Route::get('funnels/create', [AdminFunnelController::class, 'create'])->name('admin.funnels.create');
    Route::post('funnels', [AdminFunnelController::class, 'store'])->name('admin.funnels.store');
    Route::get('funnels/{funnel}', [AdminFunnelController::class, 'show'])->name('admin.funnels.show');
    Route::get('funnels/{funnel}/edit', [AdminFunnelController::class, 'edit'])->name('admin.funnels.edit');
    Route::put('funnels/{funnel}', [AdminFunnelController::class, 'update'])->name('admin.funnels.update');
    Route::delete('funnels/{funnel}', [AdminFunnelController::class, 'destroy'])->name('admin.funnels.destroy');
    Route::post('funnels/{funnel}/steps', [AdminFunnelController::class, 'addStep'])->name('admin.funnels.steps.add');
    Route::delete('funnels/{funnel}/steps/{step}', [AdminFunnelController::class, 'removeStep'])->name('admin.funnels.steps.remove');
    Route::post('funnels/{funnel}/steps/{step}/move', [AdminFunnelController::class, 'moveStep'])->name('admin.funnels.steps.move');

    // Images
    Route::get('images', [AdminImageController::class, 'index'])->name('admin.images.index');
    Route::post('images', [AdminImageController::class, 'store'])->name('admin.images.store');
    Route::delete('images/{filename}', [AdminImageController::class, 'destroy'])->name('admin.images.destroy');
});

// Dynamic public landing pages — must be LAST
Route::get('/{slug}', [LandingPageController::class, 'show'])->where('slug', '[a-zA-Z0-9\-]+');
