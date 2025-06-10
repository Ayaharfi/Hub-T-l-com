<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParcVisioController extends Controller
{
    public function index()
    {
         // Exemple de dossiers fictifs
        $dossiers = [
            (object) ['id' => 1, 'nom' => 'Dossier 1'],
            (object) ['id' => 2, 'nom' => 'Dossier 2'],
            (object) ['id' => 3, 'nom' => 'Dossier 3'],
        ];
        return view('parc-visio.index');
    }
}
