<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes démarches</title>
  <style>
    :root {
      --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
      --main-bg: #f9fafb;
      --primary: #f97316;
      --secondary: #1e3a8a;
      --text-gray: #374151;
      --light-gray: #f3f4f6;
      --gray-500: #6b7280;
    }

    html, body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      overflow-x: auto;
      font-family: var(--font-sans);
      background-color: var(--main-bg);
      color: var(--text-gray);
    }

    .page-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem 1rem;
      max-width: 1280px;
      margin: 0 auto;
      min-height: 100vh;
    }

    .page-title {
      font-size: 1.875rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 0.25rem;
    }

    .page-subtitle {
      text-align: center;
      color: var(--gray-500);
      margin-bottom: 2rem;
    }

    .grid-wrapper {
      display: grid;
      width: 100%;
      gap: 2rem;
      grid-template-columns: 1fr;
    }

    @media (min-width: 1024px) {
      .grid-wrapper {
        grid-template-columns: 1fr 1fr;
        align-items: stretch;
      }

      body {
        height: 100vh;
        overflow: auto;
      }

      .page-wrapper {
        justify-content: center;
        padding: 0 2rem;
      }
    }

    .header-orange,
    .header-blue {
      font-weight: 600;
      border-radius: 0.5rem 0.5rem 0 0;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: white;
    }

    .header-orange {
      background-color: var(--primary);
    }

    .header-blue {
      background-color: var(--secondary);
    }

    .content-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
      background-color: var(--main-bg);
      padding: 1rem;
      border-radius: 0 0 0.5rem 0.5rem;
    }

    @media (min-width: 640px) {
      .content-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .bloc {
      background-color: var(--light-gray);
      border-radius: 1rem;
      padding: 1rem;
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      cursor: pointer;
      text-decoration: none;
      color: inherit;
      min-height: 160px;
    }

    .bloc:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .icon {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }

    .bloc-title {
      font-weight: 600;
      font-size: 1.25rem;
      margin-bottom: 0.25rem;
    }

    .bloc-desc {
      font-size: 0.9rem;
      color: var(--gray-500);
    }

    .personnel-box {
      background-color: white;
      border: 1px solid #e5e7eb;
      border-radius: 0 0 0.5rem 0.5rem;
      padding: 1rem;
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 160px;
      transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .personnel-box:hover {
      background-color: #f3f4f6;
      transform: scale(1.01);
    }

    .bg-primary {
      background-color: var(--primary);
    }

    .text-white {
      color: #fff;
    }

    .p-4 {
      padding: 1rem;
    }

    .rounded-lg {
      border-radius: 0.5rem;
    }

    .shadow-lg {
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .text-center {
      text-align: center;
    }

    .mb-1 {
      margin-bottom: 0.25rem;
    }

    .no-underline {
      text-decoration: none;
    }

    .text-inherit {
      color: inherit;
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <div class="bg-primary text-white p-4 rounded-lg shadow-lg text-center">
        Tailwind fonctionne proprement 🎉
    </div>

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
