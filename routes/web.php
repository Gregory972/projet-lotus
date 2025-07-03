<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubButtonController;
use App\Http\Controllers\PublicPageController;
use App\Http\Middleware\PasswordProtect;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// // Pages utilisateur
// Route::get('/inscriptions', [HomeController::class, 'showInscriptions'])->name('inscriptions');

// // Page des bourses
// Route::get('/bourses', [HomeController::class, 'showBourses'])->name('bourses');

// // Page des orientations
// Route::get('/orientations', [HomeController::class, 'showOrientations'])->name('orientations');

/////////////////////////////////////////////

// Admin - Boutons principaux
// Route::get('/admin', [AdminController::class, 'edit'])->name('admin.buttons.edit');
// Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.buttons.update');

// Route protégée : édition
Route::get('/admin', function (Request $request) {
    if (!$request->session()->get('authenticated')) {
        return redirect()->route('password.form');
    }
    return app(AdminController::class)->edit($request);
})->name('admin.buttons.edit');

// Route protégée : mise à jour
Route::post('/admin/update', function (Request $request) {
    if (!$request->session()->get('authenticated')) {
        return redirect()->route('password.form');
    }
    return app(AdminController::class)->update($request);
})->name('admin.buttons.update');


/////////////////////////////////////////////

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



// Page de mot de passe
Route::get('/password', function () {
    return view('password');
})->name('password.form');

// Traitement du mot de passe
Route::post('/password', function (Request $request) {
    if ($request->input('password') === env('PERSONNEL_PASSWORD')) {
        $request->session()->put('authenticated', true);
        return redirect()->route('admin.buttons.edit'); // vers la vraie page
    }
    
    return back()->withErrors(['password' => 'Mot de passe incorrect']);
})->name('password.check');

// Route protégée manuellement
Route::get('/personnel', function (Request $request) {
    if (!$request->session()->get('authenticated')) {
        return redirect()->route('password.form');
    }
    
    return view('personnel'); // ta page maquette
})->name('personnel.index');

// Route pour la déconnexion
Route::post('/logout', function (Request $request) {
    $request->session()->forget('authenticated');
    return redirect('/');
})->name('logout');

// Pages publiques
Route::get('/{slug}', [PublicPageController::class, 'show'])->where('slug', '^[a-z0-9\-]+$');
