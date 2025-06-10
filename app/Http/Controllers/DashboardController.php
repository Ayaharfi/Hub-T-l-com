<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Historique;
use App\Models\Membre;
use App\Models\Document;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Vérifier si l'utilisateur est admin (optionnel)
        if (!$user || !$user->is_admin) {
            return redirect()->route('login');
        }
        
        return view('admin.dashboard', [
            'user' => $user,
            'userName' => $user->name,
            'userEmail' => $user->email
        ]);
    }


    public function showProjet($id)
    {
        $projet = Projet::findOrFail($id);
        return "Page du projet : " . $projet->nom;
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'fichier' => 'required|file'
        ]);

        $path = $request->file('fichier')->store('documents', 'public');

        Document::create([
            'nom' => $request->nom,
            'fichier' => $path
        ]);

        return back();
    }

    public function storeNote(Request $request)
    {
        $request->validate(['contenu' => 'required']);
        Note::create(['contenu' => $request->contenu]);
        return back();
    }

    public function updateNote(Note $note)
    {
        $note->update(['termine' => true]);
        return back();
    }

    public function destroyNote(Note $note)
    {
        $note->delete();
        return back();
    }
}