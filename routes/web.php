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

// Fonction de protection centralisée
function protect(Closure $callback, Request $request) {
    if (!$request->session()->get('authenticated')) {
        return redirect()->route('password.form');
    }
    return $callback($request);
}

// 🔐 Admin - Boutons principaux
Route::get('/admin', fn(Request $request) => protect(fn() =>
    app(AdminController::class)->edit($request), $request)
)->name('admin.buttons.edit');

Route::post('/admin/update', fn(Request $request) => protect(fn() =>
    app(AdminController::class)->update($request), $request)
)->name('admin.buttons.update');

// 🔐 Admin - Sous-boutons
Route::get('/admin/subbuttons/{section}', fn(Request $request, $section) =>
    protect(fn() => app(SubButtonController::class)->edit($request, $section), $request)
)->name('admin.subbuttons.edit');

Route::post('/admin/subbuttons/{section}', fn(Request $request, $section) =>
    protect(fn() => app(SubButtonController::class)->update($request, $section), $request)
)->name('admin.subbuttons.update');

// 🔐 Admin - Nouveau Bouton
Route::get('/admin/buttons/create-default', fn(Request $request) =>
    protect(fn() => app(AdminController::class)->createDefaultButton($request), $request)
)->name('admin.buttons.create.default');

Route::post('/admin/buttons/create-default', fn(Request $request) =>
    protect(fn() => app(AdminController::class)->createDefaultButton($request), $request)
)->name('admin.buttons.create.default');

// 🔐 Admin - Suppression d'un bouton
Route::get('/admin/buttons/{id}', fn(Request $request, $id) =>
    protect(fn() => app(AdminController::class)->destroy($id), $request)
)->name('admin.buttons.destroy');

Route::delete('/admin/buttons/{id}', fn(Request $request, $id) =>
    protect(fn() => app(AdminController::class)->destroy($id), $request)
)->name('admin.buttons.destroy');

// 🔐 Admin - Nouveau Sous-Bouton
Route::get('/admin/subButtons/create-default/{section}', fn(Request $request, $section) =>
    protect(fn() => app(AdminController::class)->createDefaultSubButton($request, $section), $request)
)->name('admin.subButtons.create.default');

Route::post('/admin/subButtons/create-default/{section}', fn(Request $request, $section) =>
    protect(fn() => app(AdminController::class)->createDefaultSubButton($request, $section), $request)
)->name('admin.subButtons.create.default');

// 🔐 Admin - Suppression d'un sous-bouton
Route::get('/admin/subButtons/{id}', fn(Request $request, $id) =>
    protect(fn() => app(AdminController::class)->destroySub($request, $id), $request)
)->name('admin.subButtons.destroy');

Route::delete('/admin/subButtons/{id}', fn(Request $request, $id) =>
    protect(fn() => app(AdminController::class)->destroySub($request, $id), $request)
)->name('admin.subButtons.destroy');

// 🔐 Espace personnel (page maquette)
Route::get('/personnel', fn(Request $request) =>
    protect(fn() => view('personnel'), $request)
)->name('personnel.index');

// 🔐 Page de mot de passe
Route::get('/password', fn() => view('password'))->name('password.form');

Route::post('/password', function (Request $request) {
    if ($request->input('password') === env('PERSONNEL_PASSWORD')) {
        $request->session()->put('authenticated', true);
        return redirect()->route('admin.buttons.edit');
    }
    return back()->withErrors(['password' => 'Mot de passe incorrect']);
})->name('password.check');

// 🔐 Déconnexion
Route::post('/logout', fn(Request $request) => tap($request->session()->forget('authenticated'), fn() =>
    redirect('/')))->name('logout');

// Pages publiques (à garder en dernier)
Route::get('/{slug}', [PublicPageController::class, 'show'])->where('slug', '^[a-z0-9\-]+$');