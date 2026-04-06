<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PenyakitController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
Route::post('/diagnosa', [DiagnosaController::class, 'hitung'])->name('diagnosa.hitung');

// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD Penyakit
    Route::resource('/admin/penyakit', PenyakitController::class)->names([
        'index' => 'admin.penyakit.index',
        'create' => 'admin.penyakit.create',
        'store' => 'admin.penyakit.store',
        'edit' => 'admin.penyakit.edit',
        'update' => 'admin.penyakit.update',
        'destroy' => 'admin.penyakit.destroy',
    ]);
});