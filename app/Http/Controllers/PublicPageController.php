<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Button;
use App\Models\SubButton;

class PublicPageController extends Controller
{
    public function show($slug)
    {
        $button = Button::where('url', '/' . $slug)->first();

        if (!$button) {
            abort(404); // ou une page de fallback stylée
        }

        // Récupération des sous-boutons éventuels
        $subButtons = $button->subButtons ?? [];

        return view('section', [
            'title' => $button->title,
            'desc' => $button->desc,
            'subButtons' => $subButtons,
        ]);
    }

}
