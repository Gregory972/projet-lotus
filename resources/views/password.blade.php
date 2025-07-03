<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion sécurisée</title>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>
<body>
<div class="page-wrapper">
    <h2 class="page-title">Espace réservé</h2>
    <p class="page-subtitle">Veuillez entrer le mot de passe</p>

    <form method="POST" action="{{ route('password.check') }}" class="form-box">
        @csrf
        <input type="password" name="password" placeholder="Mot de passe" class="input-password" required>
        <button type="submit" class="btn">Valider</button>
    </form>

    @if($errors->any())
        <p class="error-message">{{ $errors->first('password') }}</p>
    @endif
</div>
</body>
</html>
