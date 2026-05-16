<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebinarController;

// Existing static pages
Route::get('/', fn() => redirect('/astrology-webinar-1'));
Route::get('/astrology-webinar-1', [PageController::class, 'index']);
Route::get('/astrology-webinar-2', [PageController::class, 'astrologyWebinar']);
Route::get('/astrology-webinar-3',[PageController::class, 'astrologyWebinar3']);



// Route::get('/graphology-webinar-1', [PageController::class, 'graphologyWebinar']);
Route::get('/graphology-webinar-2', [PageController::class, 'graphologyWebinarlvl1']);

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
    });
});
