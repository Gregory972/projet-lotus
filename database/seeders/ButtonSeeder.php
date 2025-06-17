<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Button;

class ButtonSeeder extends Seeder
{
    public function run(): void
    {
        Button::create([
            'title' => 'Inscriptions scolaires',
            'section' => 'inscriptions-scolaires',
            'desc' => 'École, collège, lycée',
            'icon' => '🏫',
            'url' => '/inscriptions',
        ]);

        Button::create([
            'title' => 'Instruction en famille',
            'section' => 'instruction-en-famille',
            'desc' => 'Demande d’autorisation',
            'icon' => '🏠',
            'url' => 'https://www.ac-martinique.fr/instruction-en-famille-instruction-simple-ou-avec-le-cned-reglemente-122240',
        ]);

        Button::create([
            'title' => 'Élèves allophones',
            'section' => 'eleves-allophones',
            'desc' => 'Accueil et accompagnement',
            'icon' => '🌐',
            'url' => 'https://www.ac-martinique.fr/l-inscription-au-lycee-121458',
        ]);

        Button::create([
            'title' => 'Bourses et aides financières',
            'section' => 'bourses-et-aides-financieres',
            'desc' => 'Aides disponibles',
            'icon' => '💰',
            'url' => '/bourses',
        ]);

        Button::create([
            'title' => 'Examens et diplômes',
            'section' => 'examens-et-diplomes',
            'desc' => 'Calendriers, modalités',
            'icon' => '🎓',
            'url' => 'https://www.ac-martinique.fr/examens-et-diplomes-121876',
        ]);

        Button::create([
            'title' => 'Orientation et affectation',
            'section' => 'orientation-et-affectation',
            'desc' => 'Collège, lycée, etc.',
            'icon' => '🧭',
            'url' => '/orientations',
        ]);

        Button::create([
            'title' => 'Signalements',
            'section' => 'signalements',
            'desc' => null,
            'icon' => '⚠️',
            'url' => 'https://www.ac-martinique.fr/lutte-contre-le-harcelement-122146',
        ]);
    }
}
