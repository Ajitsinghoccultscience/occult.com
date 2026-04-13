<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);
Route::get('/astrology-webinar', [PageController::class, 'astrologyWebinar']);
Route::get('/graphology-webinar', [PageController::class, 'graphologyWebinar']);
Route::get('/graphology-webinarlvl1', [PageController::class, 'graphologyWebinar']);




Route::get('/astrology-checkout', [PageController::class, 'astrologyCheckout']);
Route::get('/astrology-thankyou', [PageController::class, 'astrologyThankyou']);

Route::get('/graphology-checkout', [PageController::class, 'graphologyCheckout']);
Route::get('/graphology-thankyou', [PageController::class, 'graphologyThankyou']);