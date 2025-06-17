<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les sous-boutons</title>
  @vite('resources/css/app.css')
  @vite('resources/css/edit.css')
</head>
<body class="edit-buttons-body">
  <div class="edit-buttons-container">

    <!-- En-tête de la page -->
    <div class="edit-buttons-header">
      <h1 class="edit-buttons-title">Modifier les sous-boutons de : {{ ucfirst($section) }}</h1>
      <a href="{{ route('admin.buttons.edit') }}" class="edit-buttons-back">← Retour</a>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
      <div class="edit-buttons-success">
        {{ session('success') }}
      </div>
    @endif

    <!-- Formulaire de mise à jour -->
    <form method="POST" action="{{ route('admin.subbuttons.update', $section) }}">
      @csrf

      @foreach ($subButtons as $index => $sub)
        <div class="edit-button-card">
            <form method="POST" action="{{ route('admin.subButtons.destroy', $sub->id) }}" class="edit-buttons-delete-form" onsubmit="return confirm('Supprimer ce sous-bouton ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="edit-buttons-delete-button" title="Supprimer">
                    ✕
                </button>
            </form>
          <input type="hidden" name="subButtons[{{ $index }}][id]" value="{{ $sub->id }}">

          <label class="edit-buttons-label">Titre</label>
          <input type="text" name="subButtons[{{ $index }}][title }}" value="{{ $sub->title }}" class="edit-buttons-input" required>

          <label class="edit-buttons-label">Description</label>
          <input type="text" name="subButtons[{{ $index }}][desc }}" value="{{ $sub->desc }}" class="edit-buttons-input">

          <label class="edit-buttons-label">Icône</label>
          <input type="text" name="subButtons[{{ $index }}][icon }}" value="{{ $sub->icon }}" class="edit-buttons-input" required>

          <label class="edit-buttons-label">URL</label>
          <input type="text" name="subButtons[{{ $index }}][url }}" value="{{ $sub->url }}" class="edit-buttons-input" required>
        </div>
      @endforeach

      <button type="submit" class="edit-buttons-submit">
        Enregistrer les modifications
      </button>
    </form>
    <form method="POST" action="{{ route('admin.subButtons.create.default', $section) }}" class="add-button-form">
        @csrf
        <button type="submit" class="edit-buttons-secondary">
            ➕ Ajouter un sous-bouton
        </button>
    </form>
  </div>
</body>
</html>
