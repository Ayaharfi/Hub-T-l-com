<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\SousDossier;
use Illuminate\Http\Request;

class SousDossierController extends Controller
{
    public function create(Dossier $dossier)
    {
        return view('sous_dossiers.create', compact('dossier'));
    }

    public function store(Request $request, Dossier $dossier)
    {
       $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'nom_user' => 'required|string|max:255',
        'mot_passe' => 'required|string|max:255',
        'code_ip' => 'required|string|max:255',
        'notes' => 'nullable|string',
        'dossier_id' => 'required|exists:dossiers,id',
    ]);

    $sousDossier = SousDossier::create($validated);


        return response()->json($sousDossier, 201);
    }

    public function edit(Dossier $dossier, SousDossier $sousDossier)
    {
        return view('sous_dossiers.edit', compact('dossier', 'sousDossier'));
    }

    public function update(Request $request, $id)
    {
       $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'nom_user' => 'required|string|max:255',
        'mot_passe' => 'required|string|max:255',
        'code_ip' => 'required|string|max:255',
        'notes' => 'nullable|string',
        'dossier_id' => 'required|exists:dossiers,id',
    ]);

    $sousDossier = SousDossier::findOrFail($id);
    $sousDossier->update($validated);

    return response()->json($sousDossier);
}

    public function destroy(Dossier $dossier, SousDossier $sousDossier)
    {
        $sousDossier->delete();

        return redirect()->route('dossiers.show', $dossier->id)
            ->with('success', 'Sous-dossier supprimé avec succès.');
    }
     public function show($id)
    {
        // Récupérer le sous-dossier par son ID, avec une gestion d'erreur
        try {
            $sousDossier = SousDossier::findOrFail($id);
            
            // Vérifier que toutes les données nécessaires sont présentes
            return response()->json([
                'id' => $sousDossier->id,
                'nom' => $sousDossier->nom,
                'nom_user' => $sousDossier->nom_user,
                'mot_passe' => $sousDossier->mot_passe,
                'code_ip' => $sousDossier->code_ip,
                'notes' => $sousDossier->notes,
                'dossier_id' => $sousDossier->dossier_id
            ]);
        } catch (\Exception $e) {
            // En cas d'erreur, renvoyer un message explicite
            return response()->json(['error' => 'Sous-dossier non trouvé'], 404);
        }
    }
     public function verifierCode(Request $request)
    {
        $sousDossier = SousDossier::find($request->id);

        if (!$sousDossier) {
            return response()->json(['success' => false, 'message' => 'Sous-dossier non trouvé.']);
        }

        if ($sousDossier->verification_code === $request->code) {
            return response()->json(['success' => true, 'data' => $sousDossier]);
        } else {
            return response()->json(['success' => false, 'message' => 'Code invalide.']);
        }
    }
}
