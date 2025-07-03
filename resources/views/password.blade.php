<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion sécurisée</title>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
    @vite('resources/css/password.css')
</head>
<body>
<div class="login-card">
        <h2>🔐 Espace réservé</h2>
        <p>Veuillez entrer le mot de passe pour continuer</p>

        <form method="POST" action="{{ route('password.check') }}">
            @csrf
            <input type="password" name="password" placeholder="Mot de passe = demo123" class="input-password" required>

            @if($errors->any())
                <p class="error-message">{{ $errors->first('password') }}</p>
            @endif

            <button type="submit" class="btn">Valider</button>
        </form>

        <a href="{{ route('home') }}" class="btn-secondary">← Retour à l’accueil</a>
    </div>
</body>
</html>
