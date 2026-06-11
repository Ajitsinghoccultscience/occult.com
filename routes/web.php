<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\WhatsApp\TemplateController;
use App\Http\Controllers\Admin\WhatsApp\CampaignController;
use App\Http\Controllers\Admin\WhatsApp\QuickSendController;
use App\Http\Controllers\Admin\TeamController;

// Existing static pages
Route::get('/', fn() => redirect('/astrology-webinar-1'));
Route::get('/astrology-webinar-1', [PageController::class, 'index']);
Route::get('/astrology-webinar-2', [PageController::class, 'astrologyWebinar']);
Route::get('/astrology-webinar-3',[PageController::class, 'astrologyWebinar3']);



// Route::get('/graphology-webinar-1', [PageController::class, 'graphologyWebinar']);
Route::get('/graphology-webinar-2', [PageController::class, 'graphologyWebinarlvl1']);
Route::get('/graphology-webinar-4', [PageController::class, 'graphologyWebinar4']);

// Unified checkout and thank you pages
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/thankyou', [PageController::class, 'thankyou'])->name('thankyou');

// Legacy redirects — 301 permanent for bookmarks and analytics
Route::redirect('/astrology-checkout', '/checkout?product=astrology', 301);
Route::redirect('/astrology-thankyou', '/thankyou?product=astrology', 301);
Route::redirect('/graphology-checkout', '/checkout?product=graphology', 301);
Route::redirect('/graphology-thankyou', '/thankyou?product=graphology', 301);





Route::get('/astrology-course', [PageController::class, 'astrologyCourse']);
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::prefix('admin')->name('admin.')->group(function () {
    // Public: login
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected: leads
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/webinars', [WebinarController::class, 'index'])->name('webinars.index');
        Route::get('/webinars/{key}/edit', [WebinarController::class, 'edit'])->name('webinars.edit');
        Route::put('/webinars/{key}', [WebinarController::class, 'update'])->name('webinars.update');
        Route::get('/leads', [LeadsController::class, 'index'])->name('leads');
        Route::patch('/leads/{enquiry}/status', [LeadsController::class, 'updateStatus'])->name('leads.status');
        Route::delete('/leads/{enquiry}', [LeadsController::class, 'destroy'])->name('leads.destroy');

        // Team management (admin only)
        Route::middleware('admin.role')->group(function () {
            Route::get('team',            [TeamController::class, 'index'])->name('team.index');
            Route::post('team',           [TeamController::class, 'store'])->name('team.store');
            Route::patch('team/{user}',   [TeamController::class, 'update'])->name('team.update');
            Route::delete('team/{user}',  [TeamController::class, 'destroy'])->name('team.destroy');
        });

        // WhatsApp
        Route::prefix('whatsapp')->name('whatsapp.')->group(function () {
            // Quick Send — all roles
            Route::get('send',  [QuickSendController::class, 'create'])->name('send.create');
            Route::post('send', [QuickSendController::class, 'send'])->name('send.store');

            // Admin-only WhatsApp features
            Route::middleware('admin.role')->group(function () {
                Route::get('templates/sync-wati', [TemplateController::class, 'syncFromWati'])->name('templates.sync-wati');
                Route::resource('templates', TemplateController::class)->except(['show']);
                Route::post('templates/{template}/refresh-status', [TemplateController::class, 'refreshStatus'])->name('templates.refresh-status');
                Route::post('templates/{template}/force-approve', [TemplateController::class, 'forceApprove'])->name('templates.force-approve');

                Route::get('campaigns',                              [CampaignController::class, 'index'])->name('campaigns.index');
                Route::get('campaigns/create',                       [CampaignController::class, 'create'])->name('campaigns.create');
                Route::post('campaigns',                             [CampaignController::class, 'store'])->name('campaigns.store');
                Route::get('campaigns/{campaign}',                   [CampaignController::class, 'show'])->name('campaigns.show');
                Route::get('campaigns/{campaign}/map',               [CampaignController::class, 'map'])->name('campaigns.map');
                Route::post('campaigns/{campaign}/preview',          [CampaignController::class, 'preview'])->name('campaigns.preview');
                Route::post('campaigns/{campaign}/launch',           [CampaignController::class, 'launch'])->name('campaigns.launch');
                Route::get('campaigns/{campaign}/stats',            [CampaignController::class, 'stats'])->name('campaigns.stats');
            });
        });
    });
});
