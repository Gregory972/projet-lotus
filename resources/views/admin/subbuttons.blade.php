<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les sous-boutons</title>
  @vite('resources/css/app.css')
  @vite('resources/css/style.css')
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">🧩 Modifier les sous-boutons de : {{ ucfirst($section) }}</h1>
      <a href="{{ route('admin.buttons.edit') }}" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">← Retour</a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.subbuttons.update', $section) }}">
      @csrf

      @foreach ($subButtons as $index => $sub)
        <div class="mb-4 border p-4 rounded bg-white shadow">
          <input type="hidden" name="subButtons[{{ $index }}][id]" value="{{ $sub->id }}">

          <label class="block font-semibold mb-1">Titre</label>
          <input type="text" name="subButtons[{{ $index }}][title]" value="{{ $sub->title }}" class="w-full border rounded p-2 mb-2" required>

          <label class="block font-semibold mb-1">Description</label>
          <input type="text" name="subButtons[{{ $index }}][desc]" value="{{ $sub->desc }}" class="w-full border rounded p-2 mb-2">

          <label class="block font-semibold mb-1">Icône</label>
          <input type="text" name="subButtons[{{ $index }}][icon]" value="{{ $sub->icon }}" class="w-full border rounded p-2 mb-2" required>

          <label class="block font-semibold mb-1">URL</label>
          <input type="text" name="subButtons[{{ $index }}][url]" value="{{ $sub->url }}" class="w-full border rounded p-2" required>
        </div>
      @endforeach

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        💾 Enregistrer les modifications
      </button>
    </form>
  </div>
</body>
</html>
