<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes démarches</title>
</head>
<body style="margin:0;padding:0;box-sizing:border-box;overflow-x:auto;font-family:'Instrument Sans', ui-sans-serif, system-ui, sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';background-color:#f9fafb;color:#374151;">

  <div style="display:flex;flex-direction:column;align-items:center;padding:2rem 1rem;max-width:1280px;margin:0 auto;min-height:100vh;">
    
    <div style="background-color:#f97316;color:#fff;padding:1rem;border-radius:0.5rem;box-shadow:0 10px 15px rgba(0,0,0,0.1);text-align:center;">
      Tailwind fonctionne proprement 🎉
    </div>

    <h1 style="font-size:1.875rem;font-weight:700;text-align:center;margin-bottom:0.25rem;">Mes démarches</h1>
    <p style="text-align:center;color:#6b7280;margin-bottom:2rem;">Accédez aux services administratifs en quelques clics</p>

    <div style="display:grid;width:100%;gap:2rem;grid-template-columns:1fr;">
      
      <!-- Colonne Espace tout public -->
      <div>
        <div style="font-weight:600;border-radius:0.5rem 0.5rem 0 0;padding:0.75rem 1rem;display:flex;align-items:center;gap:0.5rem;color:white;background-color:#f97316;">
          <svg xmlns="http://www.w3.org/2000/svg" style="height:1.25rem;width:1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
          </svg>
          Espace tout public
        </div>

        <div style="display:grid;grid-template-columns:1fr;gap:1rem;background-color:#f9fafb;padding:1rem;border-radius:0 0 0.5rem 0.5rem;">
          @foreach ($buttons as $button)
            <a href="{{ $button->url }}" style="background-color:#f3f4f6;border-radius:1rem;padding:1rem;text-align:center;transition:transform 0.2s ease, box-shadow 0.2s ease;box-shadow:0 4px 6px rgba(0,0,0,0.05);cursor:pointer;text-decoration:none;color:inherit;display:block;min-height:160px;">
              <div style="font-size:2.5rem;margin-bottom:0.5rem;">{{ $button->icon }}</div>
              <h3 style="font-weight:600;font-size:1.25rem;margin-bottom:0.25rem;">{{ $button->title }}</h3>
              <p style="font-size:0.9rem;color:#6b7280;">{{ $button->desc }}</p>
            </a>
          @endforeach
        </div>
      </div>

      <!-- Colonne Espace personnels -->
      <div>
        <div style="font-weight:600;border-radius:0.5rem 0.5rem 0 0;padding:0.75rem 1rem;display:flex;align-items:center;gap:0.5rem;color:white;background-color:#1e3a8a;">
          Espace personnels
        </div>

        <a href="{{ route('admin.buttons.edit') }}" style="text-decoration:none;color:inherit;display:block;">
          <div style="background-color:white;border:1px solid #e5e7eb;border-radius:0 0 0.5rem 0.5rem;padding:1rem;box-shadow:0 1px 1px 0 rgba(0,0,0,0.05);display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:160px;transition:transform 0.2s ease, background-color 0.2s ease;">
            <div style="font-size:2.5rem;margin-bottom:0.5rem;">👤</div>
            <h3 style="font-weight:600;font-size:1.25rem;text-align:center;margin-bottom:0.25rem;">Gestion des personnels</h3>
            <p style="font-size:0.9rem;color:#6b7280;text-align:center;">Accès réservé aux personnels pour les démarches RH, mobilité, carrière, etc.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>
</html>
