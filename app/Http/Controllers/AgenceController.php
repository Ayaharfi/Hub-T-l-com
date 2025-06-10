<?php

namespace App\Http\Controllers; // ✅ Toujours mettre le namespace au début !

use App\Models\Agence;
use Illuminate\Http\Request;
use App\Models\Utilisateur;


class AgenceController extends Controller
{
    public function index(Request $request)
    {
        $query = Agence::query();

        // Filtres dynamiques
        if ($request->filled('ville')) {
            $query->where('ville', $request->ville);
        }
        if ($request->filled('agence')) {
            $query->where('nom_agence', $request->agence);
        }
        if ($request->filled('customCDF')) {
            $query->where('cdf', $request->customCDF);
        }
        if ($request->filled('groupe')) {
            $query->where('groupe', 'like', '%' . $request->groupe . '%');
        }

        $agences = $query->get();

        $liste_villes = Agence::select('ville')->distinct()->pluck('ville');

        return view('agences.index', compact('agences', 'liste_villes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'cdf' => 'required|string|max:255',
        'nom_agence' => 'required|string|max:255',
        'type_agence' => 'required|string',
        'lignes' => 'required|integer',
        'utilisateurs' => 'required|integer',
        'noms_utilisateurs' => 'nullable|string|max:255',
        'role' => 'nullable|string|max:10',
        'plan_de_num' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'groupe' => 'nullable|string|max:255',
        'ville' => 'nullable|string|max:255',
        'region' => 'nullable|string|max:255',
        'code_verification' => 'nullable|string|max:255',
    ]);

         Agence::create($validated);

    return redirect()->back()->with('success', 'Agence ajoutée avec succès');
    }

    public function edit($id)
    {
        $agence = Agence::findOrFail($id);
        return view('edit_agence', compact('agence'));
    }

    public function update(Request $request, $id)
    {
        $agence = Agence::findOrFail($id);

        $validated = $request->validate([
            'nom_agence' => 'required',
            'type_agence' => 'nullable',
            'lignes' => 'nullable|integer',
            'utilisateurs' => 'nullable|integer',
            'noms_utilisateurs' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:10',
            'plan_de_num' => 'nullable',
            'type' => 'nullable|string|max:255',
            'groupe' => 'nullable',
            'ville' => 'nullable',
            'region' => 'nullable',
        ]);

        $agence->update($validated);

        return redirect()->back()->with('success', 'Agence mise à jour avec succès');
    }

    public function destroy($id)
    {
        Agence::destroy($id);
        return redirect()->route('agences.index')->with('success', 'Agence supprimée!');
    }
    public function show($agenceId)
    {
        // Fetch the agency
        $agence = Agence::findOrFail($agenceId);

        // Fetch users associated with this agency
        $utilisateurs = Utilisateur::where('agence_id', $agenceId)->get();

        // Return the view with agency and users data
        return view('agence.details', [
            'agence' => $agence,
            'utilisateurs' => $utilisateurs
        ]);
    }
    public function getUtilisateurs($id)
{
    $agence = Agence::with('utilisateurs')->findOrFail($id);

    $users = $agence->utilisateurs->map(function ($u) {
        return [
            'nom' => $u->nom,
            'role' => $u->role,
            'type_num' => $u->type_de_num,
        ];
    });

    return response()->json($users);
}
public function verifyCode(Request $request, $agenceId)
{
    $request->validate([
        'code' => 'required|string'
    ]);

    $agence = Agence::findOrFail($agenceId);
    
    if ($request->code === $agence->code_verification) {
        return response()->json(['success' => true]);
    }
    
    return response()->json([
        'success' => false, 
        'message' => 'Code incorrect'
    ], 422);
}

public function getData($agenceId)
{
    $agence = Agence::findOrFail($agenceId);
    return response()->json($agence);
}
}

