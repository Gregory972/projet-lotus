<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubButtonController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pages utilisateur
Route::get('/inscriptions', [HomeController::class, 'showInscriptions'])->name('inscriptions');

// Page des bourses
Route::get('/bourses', [HomeController::class, 'showBourses'])->name('bourses');

// Page des orientations
Route::get('/orientations', [HomeController::class, 'showOrientations'])->name('orientations');

// Admin - Boutons principaux
Route::get('/admin', [AdminController::class, 'edit'])->name('admin.buttons.edit');
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.buttons.update');

// Admin - Sous-boutons
Route::get('/admin/subbuttons/{section}', [SubButtonController::class, 'edit'])->name('admin.subbuttons.edit');
Route::post('/admin/subbuttons/{section}', [SubButtonController::class, 'update'])->name('admin.subbuttons.update');

// Admin - Nouveau Bouton
Route::get('/admin/buttons/create-default', [AdminController::class, 'createDefaultButton'])->name('admin.buttons.create.default');
Route::post('/admin/buttons/create-default', [AdminController::class, 'createDefaultButton'])->name('admin.buttons.create.default');

// Admin - Suppression d'un bouton
Route::get('/admin/buttons/{id}', [AdminController::class, 'destroy'])->name('admin.buttons.destroy');
Route::delete('/admin/buttons/{id}', [AdminController::class, 'destroy'])->name('admin.buttons.destroy');

// Admin - Nouveau Sous-Bouton
Route::get('/admin/subButtons/create-default/{section}', [AdminController::class, 'createDefaultSubButton'])->name('admin.subButtons.create.default');
Route::post('/admin/subButtons/create-default/{section}', [AdminController::class, 'createDefaultSubButton'])->name('admin.subButtons.create.default');

// Admin - Suppression d'un sous-bouton
Route::get('/admin/subButtons/{id}', [AdminController::class, 'destroySub'])->name('admin.subButtons.destroy');
Route::delete('/admin/subButtons/{id}', [AdminController::class, 'destroySub'])->name('admin.subButtons.destroy');