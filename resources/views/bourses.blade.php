<!-- resources/views/inscriptions.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bourses et aides financières</title>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>
<body class="bg-white text-gray-900 font-sans">
    <div class="container mx-auto p-4">

        <!-- Bouton retour -->
        <a href="/" class="inline-flex items-center text-blue-600 hover:underline mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Retour
        </a>

        <h1 class="text-3xl font-bold text-center mb-1">Bourses et aides financières</h1>
        <p class="text-center text-gray-600 mb-6">Choisissez le type de bourse ou aide financière souhaité</p>

        <div class="content-grid grid-cols-2 gap-4 max-w-screen-md mx-auto">
            @foreach([
                ['title' => 'Bourses scolaires', 'desc' => 'Collège et lycée – conditions et démarches', 'icon' => '💶', 'url' => 'https://www.education.gouv.fr/les-bourses-de-college-et-de-lycee-326728'],
                ['title' => 'Aides scolaires', 'desc' => 'Soutiens financiers divers pour les familles', 'icon' => '🧾', 'url' => 'https://www.education.gouv.fr/les-aides-scolaires-41564'],
            ] as $item)
                <a href="{{ $item['url'] }}" class="no-underline text-inherit">
                    <div class="bloc hover:shadow-lg transition">
                        <div class="icon">{{ $item['icon'] }}</div>
                        <h3 class="bloc-title">{{ $item['title'] }}</h3>
                        <p class="bloc-desc">{{ $item['desc'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
