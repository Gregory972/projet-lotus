<!-- resources/views/inscriptions.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>
<body class="bg-white text-gray-900 font-sans">
    <div class="container mx-auto p-4">

        <div class="flex items-center mb-6">
            <a href="/" class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400">← Retour à l'accueil</a>
        </div>

        <h1 class="text-3xl font-bold text-center mb-1">{{ $title }}</h1>
        <p class="text-center text-gray-600 mb-6">{{ $desc }}</p>

        <div class="content-grid grid-cols-2 gap-4 max-w-screen-md mx-auto">
            @foreach ($subButtons as $item)
                <a href="{{ $item->url }}" class="no-underline text-inherit">
                    <div class="bloc hover:shadow-lg transition">
                        <div class="icon">{{ $item->icon ?? '🔗' }}</div>
                        <h3 class="bloc-title">{{ $item->title }}</h3>
                        <p class="bloc-desc">{{ $item->desc ?? '' }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
