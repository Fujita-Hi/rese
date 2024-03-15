<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReseController;
use Illuminate\Support\Facades\Route;
use App\Models\Reservation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/done', [ReseController::class, 'done'])->middleware(['auth', 'verified']);

Route::get('/', [ReseController::class, 'home'])->middleware(['auth', 'verified']);

Route::get('/search', [ReseController::class, 'search']);

Route::post('/favorite_create', [ReseController::class, 'favorite_create'])->middleware(['auth', 'verified']);

Route::post('/favorite_delete', [ReseController::class, 'favorite_delete'])->middleware(['auth', 'verified']);

Route::get('/mypage', [ReseController::class, 'mypage'])->middleware(['auth', 'verified']);

Route::get('/detail', [ReseController::class, 'detail']);

Route::post('/reservation_create', [ReseController::class, 'reservation_create'])->middleware(['auth', 'verified']);

Route::post('/reservation_delete', [ReseController::class, 'reservation_delete'])->middleware(['auth', 'verified']);

Route::get('/owneredit', [ReseController::class, 'owneredit'])->middleware(['auth', 'verified', 'can:admin'])->name('/');

Route::post('/roleedit', [ReseController::class, 'roleedit'])->middleware(['auth', 'verified']);

Route::get('/ownerdashboard', [ReseController::class, 'ownerdashboard'])->middleware(['auth', 'verified', 'can:owner']);

Route::post('/restaurant_create', [ReseController::class, 'restaurant_create'])->middleware(['auth', 'verified', 'can:owner']);

Route::post('/restaurant_delete', [ReseController::class, 'restaurant_delete'])->middleware(['auth', 'verified', 'can:owner']);

Route::post('/restaurant_edit', [ReseController::class, 'restaurant_edit'])->middleware(['auth', 'verified', 'can:owner']);

Route::get('images/{filename}', [ReseController::class, 'showImage'])->name('show.image');

Route::post('/upload', [ReseController::class, 'upload'])->name('upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('qrcode/{reservationNumber}', function ($reservationNumber) {
    $reservation = Reservation::where('id', $reservationNumber)->get();
    return QrCode::size(300)->generate($reservation);
});

Route::view('/registered', 'auth.registered')->name('registered');