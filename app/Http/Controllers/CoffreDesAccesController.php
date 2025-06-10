<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class CoffreDesAccesController extends Controller
{
    public function index()
    {
        // Charger seulement les dossiers racines + leurs sous-dossiers
        $dossiers = Dossier::with('sousDossiers')->whereNull('parent_id')->get();
        return view('coffre-des-acces.index', compact('dossiers'));
    }

    public function getServeurs($dossierId)
    {
        // Assurez-vous que le Dossier existe
        $dossier = Dossier::findOrFail($dossierId); // Utilisation de l'identifiant passé en paramètre

        // Récupérer les serveurs associés à ce dossier
        $servers = $dossier->servers;  // Assurez-vous que la relation "servers" est bien définie

        // Retourner les serveurs sous forme de réponse JSON
        return response()->json($servers);
    }
}
