<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\SubButton;
use Illuminate\Http\Request;

class SubButtonController extends Controller
{
    public function edit($section)
    {
        $subButtons = SubButton::where('section', $section)->get();
        return view('admin.subbuttons', compact('subButtons', 'section'));
    }

    public function update(Request $request, $section)
    {
        $subButtonsData = $request->input('subButtons');
        // dump($subButtonsData);

        if (!is_array($subButtonsData)) {
            return back()->with('error', 'Aucune donnée reçue.');
        }

        $button = Button::where('section', $section)->first();
        // dump($button);

        if (!$button) {
            return back()->with('error', 'Bouton parent non trouvé pour la section.');
        }

        $existingIds = [];

        foreach ($subButtonsData as $data) {
            // Si on a un id, on met à jour
            if (!empty($data['id'])) {
                $subButton = SubButton::find($data['id']);
                if ($subButton) {
                    $subButton->update([
                        'title' => $data['title'] ?? '',
                        'desc' => $data['desc'] ?? null,
                        'icon' => $data['icon'] ?? '',
                        'url' => $data['url'] ?? '',
                        'section' => $section,
                    ]);
                    $existingIds[] = $subButton->id;
                }
            } else {
                // Sinon, on en crée un nouveau
                $new = $button->subButtons()->create([
                    'title' => $data['title'] ?? '',
                    'desc' => $data['desc'] ?? null,
                    'icon' => $data['icon'] ?? '',
                    'url' => $data['url'] ?? '',
                    'section' => $section,
                ]);
                $existingIds[] = $new->id;
            }
        }

        // Supprimer les sous-boutons qui ne sont plus dans la liste
        // $button->subButtons()->whereNotIn('id', $existingIds)->delete();

        return redirect()->route('admin.subbuttons.edit', $section)
            ->with('success', 'Sous-boutons mis à jour avec succès.');
    }


}
