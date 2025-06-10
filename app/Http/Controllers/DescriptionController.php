<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Task;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    // Enregistrer une description pour une tâche
    public function store(Request $request, $taskId)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        // Trouver la tâche par ID
        $task = Task::findOrFail($taskId);

        // Créer la description et l'associer à la tâche
        $description = $task->descriptions()->create([
            'description' => $request->description,
        ]);

        // Retourner la nouvelle description pour l'afficher sur la page
        return response()->json($description);
    }

    // Récupérer toutes les descriptions d'une tâche
    public function index($taskId)
    {
        // Récupérer toutes les descriptions d'une tâche spécifique
        $descriptions = Task::findOrFail($taskId)->descriptions;

        return response()->json($descriptions);
    }
}