<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Administration - Modifier les boutons</title>
  @vite('resources/css/app.css')
  @vite('resources/css/style.css')
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Éditer les boutons</h1>
      <a href="/" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">← Retour à l'accueil</a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.buttons.update') }}">
      @csrf

        @php
            $sectionsWithSubbuttons = ['inscriptions', 'orientations', 'bourses'];
        @endphp

      @foreach ($buttons as $button)
        <div class="mb-4 border p-4 rounded bg-white shadow">
            <input type="hidden" name="buttons[{{ $button->id }}][id]" value="{{ $button->id }}">

            <label class="block font-semibold mb-1">Titre</label>
            <input type="text" name="buttons[{{ $button->id }}][title]" value="{{ $button->title }}" class="w-full border rounded p-2 mb-2" required>

            <label class="block font-semibold mb-1">Description</label>
            <input type="text" name="buttons[{{ $button->id }}][desc]" value="{{ $button->desc }}" class="w-full border rounded p-2 mb-2">

            <label class="block font-semibold mb-1">Icône</label>
            <input type="text" name="buttons[{{ $button->id }}][icon]" value="{{ $button->icon }}" class="w-full border rounded p-2 mb-2" required>

            <label class="block font-semibold mb-1">URL</label>
            <input type="text" name="buttons[{{ $button->id }}][url]" value="{{ $button->url }}" class="w-full border rounded p-2" required>
        
            @php
                $urlSection = ltrim($button['url'], '/');
            @endphp

            @if (in_array($urlSection, $sectionsWithSubbuttons))
                <a href="{{ route('admin.subbuttons.edit', Str::slug($button['title'])) }}"
                    class="inline-block mt-2 text-blue-600 hover:underline font-medium">
                    Modifier les sous-boutons
                </a>
            @endif

        </div>
        @endforeach


      <button type="submit" class="flex justify-center items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        💾 Enregistrer les modifications
      </button>
    </form>
  </div>
</body>
</html>
