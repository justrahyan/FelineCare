<?php

use App\Http\Controllers\Admin\BasisPengetahuanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\GejalaController;

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

    // CRUD Gejala
    Route::resource('/admin/gejala', GejalaController::class)->names([
        'index' => 'admin.gejala.index',
        'create' => 'admin.gejala.create',
        'store' => 'admin.gejala.store',
        'edit' => 'admin.gejala.edit',
        'update' => 'admin.gejala.update',
        'destroy' => 'admin.gejala.destroy',
    ]);

    // CRUD Basis Pengetahuan (Aturan/Rule)
    Route::resource('/admin/rules', BasisPengetahuanController::class)->names([
        'index' => 'admin.rules.index',
        'create' => 'admin.rules.create',
        'store' => 'admin.rules.store',
        'edit' => 'admin.rules.edit',
        'update' => 'admin.rules.update',
        'destroy' => 'admin.rules.destroy',
    ]);
});