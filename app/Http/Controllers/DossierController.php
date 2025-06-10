<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{
     public function index()
    {
        $dossiers = Dossier::all();
        return view('dossiers.index', compact('dossiers'));
    }

    public function create()
    {
        return view('dossiers.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $dossier = Dossier::create($validated);

    return response()->json($dossier, 201);
}

    public function show(Dossier $dossier)
    {
        return view('dossiers.show', compact('dossier'));
    }

    public function edit(Dossier $dossier)
    {
        return view('dossiers.edit', compact('dossier'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $dossier = Dossier::findOrFail($id);
    $dossier->update($validated);

    return response()->json($dossier);
}

    public function destroy(Dossier $dossier)
    {
        $dossier->delete();

        return redirect()->route('dossiers.index')
            ->with('success', 'Dossier supprimé avec succès.');
    }
}