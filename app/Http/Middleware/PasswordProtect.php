<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordProtect
{
    public function handle(Request $request, Closure $next)
    {
        // Si l'utilisateur n'est pas déjà "authentifié", rediriger vers la page de mot de passe
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('password.form');
        }

        return $next($request);
    }
}
