<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Button;
use App\Models\SubButton;

use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function edit()
    {
        $buttons = Button::all();

        // Récupère dynamiquement les sections ayant des sous-boutons
        $sectionsWithSubbuttons = SubButton::select('section')
            ->distinct()
            ->pluck('section')
            ->map(function ($section) {
                return Str::slug($section); // ou juste $section si déjà propre
            })
            ->toArray();

        return view('admin.buttons', compact('buttons', 'sectionsWithSubbuttons'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'buttons' => 'required|array',
            'buttons.*.title' => 'required|string',
            'buttons.*.desc' => 'nullable|string',
            'buttons.*.icon' => 'required|string',
            'buttons.*.url' => 'required|string',
        ]);

        foreach ($validated['buttons'] as $index => $data) {
            $button = Button::find($index);

            if ($button) {
                // Ancienne section
                $oldSection = $button->section;

                // Nouvelle section basée sur le nouveau titre
                $newSection = Str::slug($data['title']);

                // Mise à jour du bouton
                $button->update([
                    'title' => $data['title'],
                    'desc' => $data['desc'],
                    'icon' => $data['icon'],
                    'url'   => $data['url'],
                    'section' => $newSection,
                ]);

                // Mise à jour des sous-boutons associés
                SubButton::where('button_id', $button->id)->update([
                    'section' => $newSection
                ]);
            }
        }

        return redirect()->route('admin.buttons.edit')->with('success', 'Mise à jour réussie !');
    }


    public function createDefaultButton()
    {
        Button::create([
            'title' => 'Nouveau bouton',
            'section' => 'nouveau-bouton',
            'desc' => 'Description par défaut',
            'icon' => '🔗',
            'url' => '/lien-par-defaut',
        ]);

        return redirect()->back()->with('success', 'Un nouveau bouton a été ajouté avec des valeurs par défaut.');
    }

    public function createDefaultSubButton(Request $request, $section)
    {

        $button = Button::where('section', $section)->first();

        if (!$button) {
        return redirect()->back()->with('error', 'Aucun bouton correspondant à cette section.');
        }

        SubButton::create([
            'button_id' => $button->id,
            'title' => 'Nouveau sous-bouton',
            'section' => $section,
            'desc' => 'Description par défaut',
            'icon' => '🔗',
            'url' => '/lien-par-defaut',
        ]);

        return redirect()->back()->with('success', 'Un nouveau sous-bouton a été ajouté avec des valeurs par défaut.');
    }

    public function destroy($id)
    {
        $button = Button::findOrFail($id);
        $button->delete();

        return redirect()->back()->with('success', 'Le bouton a été supprimé avec succès.');
    }

    public function destroySub(Request $request, $id)
    {
        $button = SubButton::findOrFail($id);
        $button->delete();

        return redirect()->back()->with('success', 'Le bouton a été supprimé avec succès.');
    }


}

