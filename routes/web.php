<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Ruangan;
use App\Http\Controllers\Aset;
use App\Http\Controllers\Pengaturan;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Rute Halaman Utama

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/ruangan', [Ruangan::class, 'index'])->name('ruangan');
Route::get('/ruangan/create', [Ruangan::class, 'create'])->name('ruangan.create');
Route::get('/aset', [Aset::class, 'index'])->name('aset');
Route::get('/aset/create', [Aset::class, 'create'])->name('aset.create');
Route::get ('/pengaturan', [Pengaturan::class, 'index'])->name('pengaturan');



// Rute Login dan Autentikasi

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');








require __DIR__.'/auth.php';
