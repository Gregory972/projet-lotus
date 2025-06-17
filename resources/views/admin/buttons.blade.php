<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les boutons</title>
  @vite('resources/css/app.css')
  @vite('resources/css/edit.css')
</head>
<body class="edit-buttons-body">
  <div class="edit-buttons-container">

    <div class="edit-buttons-header">
      <h1 class="edit-buttons-title">Éditer les boutons</h1>
      <a href="/" class="edit-buttons-back">← Retour à l'accueil</a>
    </div>

    @if(session('success'))
      <div class="edit-buttons-success">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.buttons.update') }}">
      @csrf

      @php
        $sectionsWithSubbuttons = ['inscriptions', 'orientations', 'bourses'];
      @endphp

      @foreach ($buttons as $button)
        <div class="edit-button-card">
            <form method="POST" action="{{ route('admin.buttons.destroy', $button->id) }}" class="edit-buttons-delete-form" onsubmit="return confirm('Supprimer ce bouton ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="edit-buttons-delete-button" title="Supprimer">
                    ✕
                </button>
            </form>
            <input type="hidden" name="buttons[{{ $button->id }}][id]" value="{{ $button->id }}">
            
            <label class="edit-buttons-label">Titre</label>
            <input type="text" name="buttons[{{ $button->id }}][title]" value="{{ $button->title }}" maxlength="20" class="edit-buttons-input" required>
            
            <label class="edit-buttons-label">Description</label>
            <input type="text" name="buttons[{{ $button->id }}][desc]" value="{{ $button->desc }}" class="edit-buttons-input">
            
            <label class="edit-buttons-label">Icône</label>
            <input type="text" name="buttons[{{ $button->id }}][icon]" value="{{ $button->icon }}" class="edit-buttons-input" required>
            
            <label class="edit-buttons-label">URL</label>
            <input type="text" name="buttons[{{ $button->id }}][url]" value="{{ $button->url }}" class="edit-buttons-input" required>
            
            @php
            $urlSection = ltrim($button['url'], '/');
            @endphp
            
            @if (in_array($urlSection, $sectionsWithSubbuttons))
            <a href="{{ route('admin.subbuttons.edit', Str::slug($button['title'])) }}" class="edit-buttons-subbutton-link">
                Modifier les sous-boutons
            </a>
          @endif
        </div>
      @endforeach

      <button type="submit" class="edit-buttons-submit">
        Enregistrer les modifications
      </button>

      
    </form>
    <form method="POST" action="{{ route('admin.buttons.create.default') }}" class="add-button-form">
        @csrf
        <button type="submit" class="edit-buttons-secondary">
            ➕ Ajouter un bouton
        </button>
    </form>
  </div>
</body>
</html>
