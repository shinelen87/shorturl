<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

// Маршрут для відображення форми створення скороченого посилання
Route::get('/create-short-link', function () {
    return view('create_short_link');
})->name('short-links.create');
Route::get('/', function () {
    return view('create_short_link');
})->name('short-links.create');

Route::get('/shortened/{code}', [ShortLinkController::class, 'show'])->name('short-links.show');
Route::get('/{code}', [ShortLinkController::class, 'redirect']);
Route::post('/short-links', [ShortLinkController::class, 'store'])->name('short-links.store');
Route::get('/stats/{code}',  [ShortLinkController::class, 'stats'])->name('stats');;
