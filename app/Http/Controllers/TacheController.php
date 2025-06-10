<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Tache;
use App\Models\MesProjet;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Enregistre une nouvelle tâche dans la base de données
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'statut' => 'required|in:à faire,en cours,terminé',
        'date_limite' => 'nullable|date',
        'responsable' => 'nullable|string|max:255',
        'mesprojet_id' => 'required|exists:mesprojets,id',
    ]);
 // Création de la tâche
        Tache::create($validated);

    return redirect()->route('projets.index')->with('success', 'Tâche créée avec succès.');
    }
    public function index()
{
    $projets = Mesprojet::with('taches')->get(); // Charger chaque projet avec ses tâches
    return view('projets.index', compact('projets'));
}
 // Méthode pour afficher la liste des tâches
    public function liste()
    {
        // Récupérer toutes les tâches depuis la base de données
           $taches = Tache::with('projet')->get(); // CHARGEMENT DE LA RELATION
        return view('taches.liste', compact('taches'));
    }
public function destroy($id)
{
    $tache = Tache::findOrFail($id);
    $tache->delete();

    return redirect()->back()->with('success', 'Tâche supprimée avec succès.');
}
public function verifierCodeModal($idTache, Request $request)
    {
        // Récupérer la tâche spécifique
        $tache = Tache::findOrFail($idTache);

        // Récupérer le code administrateur saisi
        $codeAdminSaisi = $request->input('id_admin');

        // Récupérer le projet auquel cette tâche est liée
        $projet = MesProjet::find($tache->mesprojet_id);

        // Vérifier si le projet existe
        if (!$projet) {
            return response()->json([
                'status' => 'error',
                'message' => 'Projet introuvable.'
            ]);
        }

        // Comparer le code administrateur saisi avec celui dans la base de données
        if ($codeAdminSaisi === $projet->code_admin) {
            // Si le code est correct, retourner un succès et l'ID de la tâche
            return response()->json([
                'status' => 'success',
                'tache_id' => $tache->id
            ]);
        } else {
            // Si le code est incorrect, retourner une erreur
            return response()->json([
                'status' => 'error',
                'message' => 'Le code administrateur est incorrect.'
            ]);
        }
    }
    public function update(Request $request, $id)
{
    // Validation des données
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'statut' => 'required|in:à faire,en cours,terminé',
        'date_limite' => 'nullable|date',
        'responsable' => 'nullable|string|max:255',
        'mesprojet_id' => 'required|exists:mesprojets,id',
    ]);

    // Récupération de la tâche
    $tache = Tache::findOrFail($id);

    // Mise à jour de la tâche
    $tache->update($validated);

    // Redirection avec message de succès
    return redirect()->route('taches.index')->with('success', 'Tâche mise à jour avec succès.');
}
}
