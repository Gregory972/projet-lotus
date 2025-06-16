<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Button;

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
}

