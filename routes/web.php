<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubButtonController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages utilisateur
Route::get('/inscriptions', [HomeController::class, 'showInscriptions'])->name('inscriptions');
Route::get('/orientations', function () {
    return view('orientations');
});
Route::get('/bourses', function () {
    return view('bourses');
});

// Admin - Boutons principaux
Route::get('/admin', [AdminController::class, 'edit'])->name('admin.buttons.edit');
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.buttons.update');

// Admin - Sous-boutons
Route::get('/admin/subbuttons/{section}', [SubButtonController::class, 'edit'])->name('admin.subbuttons.edit');
Route::post('/admin/subbuttons/{section}', [SubButtonController::class, 'update'])->name('admin.subbuttons.update');
