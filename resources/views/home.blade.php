<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes démarches</title>
  @vite('resources/css/app.css')
  @vite('resources/css/style.css')
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
          @foreach ([
            ['title' => 'Inscriptions scolaires', 'desc' => 'École, collège, lycée', 'icon' => '🏫', 'url' => '/inscriptions'],
            ['title' => 'Instruction en famille', 'desc' => 'Demande d’autorisation', 'icon' => '🏠', 'url' => 'https://www.ac-martinique.fr/instruction-en-famille-instruction-simple-ou-avec-le-cned-reglemente-122240'],
            ['title' => 'Élèves allophones', 'desc' => 'Accueil et accompagnement', 'icon' => '🌐', 'url' => 'https://www.ac-martinique.fr/l-inscription-au-lycee-121458'],
            ['title' => 'Bourses et aides financières', 'desc' => 'Aides disponibles', 'icon' => '💰', 'url' => '/bourses'],
            ['title' => 'Examens et diplômes', 'desc' => 'Calendriers, modalités', 'icon' => '🎓', 'url' => 'https://www.ac-martinique.fr/examens-et-diplomes-121876'],
            ['title' => 'Orientation et affectation', 'desc' => 'Collège, lycée, etc.', 'icon' => '🧭', 'url' => '/orientations'],
            ['title' => 'Signalements', 'desc' => '', 'icon' => '⚠️', 'url' => 'https://www.ac-martinique.fr/lutte-contre-le-harcelement-122146'],
          ] as $item)
            <a href="{{ $item['url'] }}" class="bloc">
              <div class="icon">{{ $item['icon'] }}</div>
              <h3 class="bloc-title">{{ $item['title'] }}</h3>
              <p class="bloc-desc">{{ $item['desc'] }}</p>
            </a>
          @endforeach
        </div>
      </div>

      <!-- Colonne Espace personnels -->
      <div>
        <div class="header-blue">Espace personnels</div>
        <div class="personnel-box">
          <div class="icon">👤</div>
          <h3 class="bloc-title text-center mb-1">Gestion des personnels</h3>
          <p class="bloc-desc text-center">Accès réservé aux personnels pour les démarches RH, mobilité, carrière, etc.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
