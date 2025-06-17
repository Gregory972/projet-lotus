<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Button;
use App\Models\SubButton;

class SubButtonSeeder extends Seeder
{
    public function run(): void
    {
        // Liste des sous-boutons regroupés par section (clé = titre exact du bouton principal)
        $allSubButtons = [
            'Inscriptions scolaires' => [
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
            ],
            'Bourses et aides financières' => [
                [
                    'section' => 'bourses-et-aides-financieres',
                    'title' => 'Bourses scolaires',
                    'desc' => 'Collège et lycée – conditions et démarches',
                    'icon' => '💶',
                    'url' => 'https://www.education.gouv.fr/les-bourses-de-college-et-de-lycee-326728',
                ],
                [
                    'section' => 'bourses-et-aides-financieres',
                    'title' => 'Aides scolaires',
                    'desc' => 'Soutiens financiers divers pour les familles',
                    'icon' => '🧾',
                    'url' => 'https://www.education.gouv.fr/les-aides-scolaires-41564',
                ],
            ],
            // Tu peux en ajouter d'autres ici : 'Orientation et affectation' => [ ... ]
        ];

        foreach ($allSubButtons as $mainTitle => $subButtons) {
            $button = Button::where('title', $mainTitle)->first();

            if (!$button) {
                $this->command->warn("Bouton \"$mainTitle\" non trouvé, sous-boutons ignorés.");
                continue;
            }

            foreach ($subButtons as $data) {
                $button->subButtons()->create($data);
            }

            $this->command->info("Sous-boutons créés pour \"$mainTitle\".");
        }
    }
}
