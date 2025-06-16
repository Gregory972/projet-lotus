<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubButton;
use App\Models\Button;

class SubButtonSeeder extends Seeder
{
    public function run(): void
    {
        // Trouver un bouton existant (par exemple "Inscriptions scolaires")
        $button = Button::where('title', 'Inscriptions scolaires')->first();

        if (!$button) {
            $this->command->error('Bouton "Inscriptions scolaires" non trouvé.');
            return;
        }

        $subButtons = [
            [
                'section' => 'inscriptions-scolaires',
                'title' => 'École maternelle',
                'desc' => 'Première inscription à l’école maternelle',
                'icon' => '🧒',
                'url' => 'https://www.ac-martinique.fr/inscriptions-a-l-ecole-maternelle-121452',
            ],
            [
                'section' => 'inscriptions-scolaires',
                'title' => 'École primaire',
                'desc' => 'Nouvelle inscription ou changement d’école',
                'icon' => '🏫',
                'url' => 'https://www.ac-martinique.fr/l-inscription-a-l-ecole-elementaire-121454',
            ],
            [
                'section' => 'inscriptions-scolaires',
                'title' => 'Collège',
                'desc' => 'Affectation en 6e ou changement d’établissement',
                'icon' => '📚',
                'url' => 'https://www.ac-martinique.fr/l-inscription-au-college-121457',
            ],
            [
                'section' => 'inscriptions-scolaires',
                'title' => 'Lycée',
                'desc' => 'Inscription ou réorientation',
                'icon' => '🎓',
                'url' => 'https://www.ac-martinique.fr/l-inscription-au-lycee-121458',
            ],
        ];

        foreach ($subButtons as $data) {
            $button->subButtons()->create($data);
        }

        $this->command->info('Sous-boutons créés pour "Inscriptions scolaires".');
    }
}
