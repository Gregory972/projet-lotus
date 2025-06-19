<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les sous-boutons</title>
    @if(app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-ClxS7F0g.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/edit-B5HVm9Qo.css') }}">
    @else
        @vite(['resources/css/app.css', 'resources/css/edit.css'])
    @endif
</head>
<body class="edit-buttons-body">
  <div class="edit-buttons-container">

    <!-- En-tête -->
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

    <!-- Affichage des sous-boutons -->
    @foreach ($subButtons as $index => $sub)
      <div class="edit-button-card">

        <!-- Formulaire de suppression -->
        <div class="edit-buttons-delete-wrapper">
          <form method="POST" action="{{ route('admin.subButtons.destroy', $sub->id) }}" onsubmit="return confirm('Supprimer ce sous-bouton ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="edit-buttons-delete-button" title="Supprimer">✕</button>
          </form>
        </div>

        <!-- Formulaire de mise à jour (indépendant par carte) -->
        <form method="POST" action="{{ route('admin.subbuttons.update', $section) }}">
          @csrf

          <input type="hidden" name="subButtons[{{ $index }}][id]" value="{{ $sub->id }}">

          <label class="edit-buttons-label">Titre</label>
          <input type="text" name="subButtons[{{ $index }}][title]" value="{{ $sub->title }}" class="edit-buttons-input" required>

          <label class="edit-buttons-label">Description</label>
          <input type="text" name="subButtons[{{ $index }}][desc]" value="{{ $sub->desc }}" class="edit-buttons-input">

          <label class="edit-buttons-label">Icône</label>
          <input type="text" name="subButtons[{{ $index }}][icon]" value="{{ $sub->icon }}" class="edit-buttons-input" required>

          <label class="edit-buttons-label">URL</label>
          <input type="text" name="subButtons[{{ $index }}][url]" value="{{ $sub->url }}" class="edit-buttons-input" required>

          <button type="submit" class="edit-buttons-submit mt-4">💾 Enregistrer</button>
        </form>
      </div>
    @endforeach

    <!-- Formulaire pour ajouter un nouveau sous-bouton -->
    <form method="POST" action="{{ route('admin.subButtons.create.default', $section) }}" class="add-button-form mt-6">
      @csrf
      <button type="submit" class="edit-buttons-secondary">
        ➕ Ajouter un sous-bouton
      </button>
    </form>

  </div>
</body>
</html>
