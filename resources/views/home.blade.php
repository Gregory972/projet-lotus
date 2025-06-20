<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes démarches</title>
  <link rel="stylesheet" href="public/build/assets/app-CaP4jrzr.css">
  <script type="module" src="public/build/assets/app-nmLljNp0.js"></script>
</head>
<body>
  <div class="page-wrapper">

    <h1 class="page-title">Mes démarches</h1>
    <p class="page-subtitle">Accédez aux services administratifs en quelques clics</p>

    <div class="grid-wrapper">
      <!-- Colonne Espace tout public -->
      <div>
        <div class="header-orange">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
          </svg>
          Espace tout public
        </div>
        <div class="content-grid">
          @foreach ($buttons as $button)
              <a href="{{ $button->url }}" class="bloc">
                  <div class="icon">{{ $button->icon }}</div>
                  <h3 class="bloc-title">{{ $button->title }}</h3>
                  <p class="bloc-desc">{{ $button->desc }}</p>
              </a>
          @endforeach
        </div>
      </div>

      <!-- Colonne Espace personnels -->
      <div>
        <div class="header-blue">Espace personnels</div>
        <a href="{{ route('admin.buttons.edit') }}" class="no-underline text-inherit">
          <div class="personnel-box">
            <div class="icon">👤</div>
            <h3 class="bloc-title text-center mb-1">Gestion des personnels</h3>
            <p class="bloc-desc text-center">Accès réservé aux personnels pour les démarches RH, mobilité, carrière, etc.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>
</html>
