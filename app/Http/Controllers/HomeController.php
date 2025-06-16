<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Button;
use App\Models\SubButton;

class HomeController extends Controller
{
    public function index()
    {
        $buttons = Button::all();
        return view('home', compact('buttons'));
    }

    public function showInscriptions()
    {
        $button = Button::where('title', 'Inscriptions scolaires')->firstOrFail();
        $items = $button->subButtons; // relation définie dans le modèle Button

        return view('inscriptions', compact('items'));
    }
}
