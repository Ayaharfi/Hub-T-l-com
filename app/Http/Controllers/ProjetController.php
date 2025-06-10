<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
     public function index()
    {
        $projets = Projet::latest()->get();
        return view('projets.index', compact('projets'));
    }
    /**
     * Affiche le formulaire de création d'un projet
     */
    public function create()
    {
        return view('projets.create');
    }

    /**
     * Enregistre un nouveau projet dans la base de données
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'admin_nom' => 'required|string|max:255', // ✅ Ajouté
        'type' => 'required|in:normal,quotidienne',
        'description' => 'nullable|string',
        'code_admin' => 'required|string|min:6',
    ]);

    // Assurez-vous d'inclure tous les champs attendus dans la base de données
    $projet = Projet::create([
        'nom' => $validated['nom'],
        'admin_nom' => $validated['admin_nom'] ?? 'Non spécifié',
        'type' => $validated['type'],
        'description' => $validated['description'] ?? null,
        'code_admin' => $validated['code_admin'] ?? 'Non spécifié',
    ]);

    return redirect()->route('projets.details', $projet->id)
        ->with('success', 'Projet créé avec succès!');
}

    /**
     * Affiche les détails d'un projet
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.details', compact('projet'));
    }
}