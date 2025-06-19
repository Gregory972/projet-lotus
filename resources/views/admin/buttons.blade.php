<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les boutons</title>
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
      <h1 class="edit-buttons-title">Éditer les boutons</h1>
      <a href="/" class="edit-buttons-back">← Retour à l'accueil</a>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
      <div class="edit-buttons-success">
        {{ session('success') }}
      </div>
    @endif

    <!-- Affichage des boutons -->
    @foreach ($buttons as $button)

    @php
      $isInternal = Str::startsWith($button->url, '/');
    @endphp



      <div class="edit-button-card">

        <!-- Formulaire de suppression -->
        <div class="edit-buttons-delete-wrapper">
          <form method="POST" action="{{ route('admin.buttons.destroy', $button->id) }}" onsubmit="return confirm('Supprimer ce bouton ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="edit-buttons-delete-button" title="Supprimer">✕</button>
          </form>
        </div>

        <!-- Formulaire de mise à jour (indépendant par carte) -->
        <form method="POST" action="{{ route('admin.buttons.update') }}">
          @csrf

          <input type="hidden" name="buttons[{{ $button->id }}][id]" value="{{ $button->id }}">

          <label class="edit-buttons-label">Titre</label>
          <input type="text" name="buttons[{{ $button->id }}][title]" value="{{ $button->title }}" maxlength="50" class="edit-buttons-input" required>

          <label class="edit-buttons-label">Description</label>
          <input type="text" name="buttons[{{ $button->id }}][desc]" value="{{ $button->desc }}" class="edit-buttons-input">

          <label class="edit-buttons-label">Icône</label>
          <input type="text" name="buttons[{{ $button->id }}][icon]" value="{{ $button->icon }}" class="edit-buttons-input" required>

          <label class="edit-buttons-label">URL</label>
          <input type="text" name="buttons[{{ $button->id }}][url]" value="{{ $button->url }}" class="edit-buttons-input" required>


          @if ($isInternal)
            <a href="{{ route('admin.subbuttons.edit', Str::slug($button->title)) }}" class="edit-buttons-subbutton-link">
              Modifier les sous-boutons
            </a>
          @endif


          <button type="submit" class="edit-buttons-submit mt-4">💾 Enregistrer</button>
        </form>
      </div>
    @endforeach

    <!-- Formulaire pour ajouter un nouveau bouton -->
    <form method="POST" action="{{ route('admin.buttons.create.default') }}" class="add-button-form mt-6">
      @csrf
      <button type="submit" class="edit-buttons-secondary">
        ➕ Ajouter un bouton
      </button>
    </form>

  </div>
</body>
</html>
