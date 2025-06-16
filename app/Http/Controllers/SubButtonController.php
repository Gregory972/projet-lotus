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

        if (!is_array($subButtonsData)) {
            return back()->with('error', 'Aucune donnée reçue.');
        }

        // Récupérer le bouton parent correspondant à la section
        $button = Button::where('title', 'LIKE', str_replace('-', ' ', $section))->first();

        if (!$button) {
            return back()->with('error', 'Bouton parent non trouvé pour la section.');
        }

        // Supprimer les anciens sous-boutons liés à ce bouton
        $button->subButtons()->delete();

        foreach ($subButtonsData as $data) {
            $button->subButtons()->create([
                'section' => $section,
                'title' => $data['title'] ?? '',
                'desc' => $data['desc'] ?? null,
                'icon' => $data['icon'] ?? '',
                'url' => $data['url'] ?? '',
            ]);
        }

        return redirect()->route('admin.subbuttons.edit', $section)
            ->with('success', 'Sous-boutons mis à jour avec succès.');
    }

}
