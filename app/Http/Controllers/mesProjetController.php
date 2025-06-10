<?php

namespace App\Http\Controllers;

use App\Models\mesProjet;
use App\Models\Tache;
use Illuminate\Http\Request;


class mesProjetController extends Controller
{
   
    // Afficher tous les projets
    public function index()
    {
        $projets = mesProjet::with('taches')->get();
        return view('projets.index', compact('projets'));
    }
     // Formulaire de création
     public function create()
     {
         $projets = mesProjet::all();
 
         $membres = [];
         foreach ($projets as $projet) {
             $noms = array_map('trim', explode(',', $projet->membres));
             $membres = array_merge($membres, $noms);
         }
 
         // Supprimer les doublons
         $membres = array_unique($membres);
 
         // Passer $membres vers la vue projets.create
         return view('projets.create', compact('membres'));
     }
    // Enregistrer un nouveau projet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'progression' => 'nullable|integer|min:0|max:100',
            'membres' => 'nullable|string',
            'date' => 'nullable|date',
            'piece_jointe' => 'nullable|file|mimes:jpg,png,pdf,docx',
        ]);

        if ($request->hasFile('piece_jointe')) {
            $validated['piece_jointe'] = $request->file('piece_jointe')->store('pieces_jointes');
        }

        $projet = mesProjet::create($validated);

       // Sauvegarder les tâches envoyées
if ($request->has('taches_json')) {
    $taches = json_decode($request->taches_json, true);
    foreach ($taches as $t) {
        Tache::create([
            'mesprojet_id' => $projet->id,
            'nom' => $t['nom'],
            'est_complete' => $t['complete'],
        ]);
    }
}

        return redirect()->back()->with('success', 'Projet enregistré');
    }

    // API pour mettre à jour une tâche en Ajax
    public function updateTache(Request $request, Tache $tache)
    {
        $tache->update([
            'est_complete' => $request->est_complete
        ]);

        // Recalculer progression
        $projet = $tache->projet;
        $total = $projet->taches()->count();
        $completed = $projet->taches()->where('est_complete', true)->count();

        $projet->update([
            'progression' => $total ? round(($completed / $total) * 100) : 0
        ]);

        return response()->json(['progression' => $projet->progression]);
    }
    
}