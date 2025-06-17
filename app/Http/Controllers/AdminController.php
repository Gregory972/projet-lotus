<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Button;
use App\Models\SubButton;

class AdminController extends Controller
{
    public function edit()
    {
        $buttons = Button::all();
        return view('admin.buttons', compact('buttons'));
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
            // Si le bouton existe, on le met à jour, sinon on l’ignore
            Button::find($index)?->update($data);
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

    public function createDefaultSubButton($section)
    {
        SubButton::create([
            'button_id' => Button::where('section', $section)->first()->id,
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

    public function destroySub($id)
    {
        $button = SubButton::findOrFail($id);
        $button->delete();

        return redirect()->back()->with('success', 'Le bouton a été supprimé avec succès.');
    }


}

