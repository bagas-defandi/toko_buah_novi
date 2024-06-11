<?php

use App\Http\Controllers\BuahController;
use App\Http\Controllers\PageGuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs.index')->middleware(['role:admin']);
    Route::get('/staffs/create', [StaffController::class, 'create'])->name('staffs.create')->middleware(['role:admin']);
    Route::post('/staffs', [StaffController::class, 'store'])->name('staffs.store')->middleware(['role:admin']);
    Route::delete('/staffs/{idStaff}', [StaffController::class, 'destroy'])
        ->name('staffs.destroy')->middleware(['role:admin']);

    Route::resource('buahs', BuahController::class)->middleware(['role:admin|staff']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-image', [ProfileController::class, 'ganti'])->name('profile.update-image');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::view('/', 'index')->name('index');
Route::get('/', [PageGuestController::class, 'index'])->name('index');
Route::get('/buahs', [PageGuestController::class, 'buahs'])->name('buahs');
Route::get('/buah/{idBuah}', [PageGuestController::class, 'buah'])->name('buah');
Route::view('/about', 'about')->name('about');

require __DIR__ . '/auth.php';
