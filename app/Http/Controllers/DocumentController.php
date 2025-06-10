<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    // Afficher documents et formulaire
    public function index()
    {
        $documents = Document::all();
        $subjects = Subject::all();

        return view('documents.index', compact('documents', 'subjects'));
    }

    // Enregistrer document
    public function store(Request $request)
    {
        // Valider
        $request->validate([
            'subject' => 'required|string',
            'folder' => 'required|string',
            'files' => 'required|array',
            'files.*' => 'file|mimes:pdf,docx,xlsx,jpg,jpeg,png|max:10240',
        ]);

        // Nouveau sujet ?
        if ($request->input('subject') === 'other') {
            $request->validate([
                'new_subject_name' => 'required|string|max:255',
            ]);
            $subject = Subject::create(['name' => $request->input('new_subject_name')]);
        } else {
            $subject = Subject::where('name', $request->input('subject'))->first();
        }

        // Enregistrer fichiers
        foreach ($request->file('files') as $file) {
            $path = $file->store('documents', 'public'); // Stocker dans "public" (accessibles)

            Document::create([
                'name' => $file->getClientOriginalName(),
                'subject' => $subject->name,
                'folder' => $request->input('folder'),
                'path' => $path,
            ]);
        }

        return redirect()->route('documents.index')->with('success', 'Documents importés avec succès.');
    }

    // Visualiser (ouvrir dans navigateur)
    public function view($id)
    {
        $document = Document::findOrFail($id);

        return response()->file(storage_path('app/public/' . $document->path));
    }
    /**
     * Obtenir la taille du fichier de manière sécurisée.
     *
     * @param  string  $path
     * @return int
     */
    protected function getFileSize($path)
    {
        try {
            // Vérifier si le fichier existe
            if (!Storage::exists($path)) {
                Log::warning("File not found for size calculation: {$path}");
                return 0;
            }
            
            // Récupérer la taille du fichier
            return Storage::size($path);
        } catch (\Exception $e) {
            Log::error("Error retrieving file size for {$path}: " . $e->getMessage());
            return 0;
        }
    }
}

