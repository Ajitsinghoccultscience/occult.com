<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Existing static pages
Route::get('/', fn() => redirect('/astrology-webinar-1'));
Route::get('/astrology-webinar-1', [PageController::class, 'index']);
Route::get('/astrology-webinar-2', [PageController::class, 'astrologyWebinar']);
Route::get('/graphology-webinar-1', [PageController::class, 'graphologyWebinar']);
Route::get('/graphology-webinar-2', [PageController::class, 'graphologyWebinarlvl1']);

// Unified checkout and thank you pages
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/thankyou', [PageController::class, 'thankyou'])->name('thankyou');

// Legacy redirects — 301 permanent for bookmarks and analytics
Route::redirect('/astrology-checkout', '/checkout?product=astrology', 301);
Route::redirect('/astrology-thankyou', '/thankyou?product=astrology', 301);
Route::redirect('/graphology-checkout', '/checkout?product=graphology', 301);
Route::redirect('/graphology-thankyou', '/thankyou?product=graphology', 301);
