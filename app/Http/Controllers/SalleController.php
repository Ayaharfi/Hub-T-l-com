<?php
namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalleController extends Controller
{
    public function index($category = null)
    {
        if ($category) {
            // Filtrer par catégorie
            $salles = Salle::where('category', $category)->get();
        } else {
            // Si aucune catégorie n’est fournie, on affiche tout
            $salles = Salle::all();
        }
    
        return view('salles.index', compact('salles', 'category'));
    }
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'idSalle' => 'required|integer|unique:salles,id',
        'nomSalle' => 'required|string|max:255',
        'ip' => 'required|ip',
        'codec' => 'required|string',
        'location' => 'required|string',
        'verification_code' => 'required|string',
        'category' => 'required|string'
    ]);

    // Création de la nouvelle salle
    $salle = new Salle();
    $salle->id =$request->idSalle;
    $salle->nom_salle = $request->nomSalle;
    $salle->verification_code = $request->verification_code;
    $salle->ip = $request->ip;
    $salle->codec = $request->codec;
    $salle->location = $request->location;
    $salle->category = $request->category;
    $salle->save();

    // Redirection ou retour avec succès
    return redirect()->route('salles.index', ['category' => $request->category])
                     ->with('success', 'Salle ajoutée avec succès.');
}
public function destroy($id)
{
    try {
        $salle = Salle::findOrFail($id);
        $salle->delete();
        return response()->json(['message' => 'Salle supprimée avec succès']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Impossible de supprimer la salle'], 500);
    }
}
public function verifyCode(Request $request, $id)
{
    $request->validate([
        'code' => 'required'
    ]);

    $salle = Salle::findOrFail($id);

    if ($request->input('code') == $salle->verification_code) {
        return response()->json([
            'success' => true,
            'salle' => [
                'id' => $salle->id,
                'nom_salle' => $salle->nom_salle,
                'ip' => $salle->ip,
                'codec' => $salle->codec,
                'location' => $salle->location,
                'verification_code' => $salle->verification_code // facultatif ici
            ]
        ]);
    }

    return response()->json(['success' => false], 403);
}

    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        return view('salles.edit', compact('salle'));
    }
      
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom_salle' => 'required|string|max:255',
                'ip' => 'required|string|max:255',
                'codec' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'verification_code' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            $salle = Salle::findOrFail($id);
            
            $salle->update([
                'nom_salle' => $request->nom_salle,
                'ip' => $request->ip,
                'codec' => $request->codec,
                'location' => $request->location,
                'verification_code' => $request->verification_code,
            ]);
            
            // Assurer que la réponse est bien en JSON
            return response()->json($salle, 200);
        } catch (\Exception $e) {
            // Retourner une réponse JSON avec l'erreur
            return response()->json(['message' => 'Erreur lors de la mise à jour: ' . $e->getMessage()], 500);
        }
    }
}

