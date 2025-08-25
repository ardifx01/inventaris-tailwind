<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Ruangan;
use App\Http\Controllers\Aset;
use App\Http\Controllers\Pengaturan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/ruangan', [Ruangan::class, 'index'])->name('ruangan');
Route::get('/ruangan/create', [Ruangan::class, 'create'])->name('ruangan.create');
Route::get('/aset', [Aset::class, 'index'])->name('aset');
Route::get('/aset/create', [Aset::class, 'create'])->name('aset.create');
Route::get ('/pengaturan', [Pengaturan::class, 'index'])->name('pengaturan');



require __DIR__.'/auth.php';
