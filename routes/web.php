<?php

use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'role:admin']);
Route::resource('dosen', DosenController::class)->middleware(['auth', 'role:admin']);
Route::resource('matakuliah', MataKuliahController::class)->middleware(['auth', 'role:admin']);
Route::resource('krs', KrsController::class)->parameters(['krs' => 'kr'])->middleware(['auth', 'role:admin']);
Route::resource('nilai', NilaiController::class)->middleware(['auth', 'role:admin']);

require __DIR__.'/auth.php';