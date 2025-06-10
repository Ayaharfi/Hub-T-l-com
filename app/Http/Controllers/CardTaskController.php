<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\CardTask;  // Assure-toi d'importer le modèle CardTask
use Illuminate\Http\Request;

class CardTaskController extends Controller
{
    /**
     * Afficher la liste des cartes de tâches pour une tâche spécifique
     */
    public function index(Request $request)
{
    // Récupérer toutes les cartes depuis la base de données
    $cards = CardTask::all();  // Utilisation du modèle CardTask

    // Passer les données à la vue
    return view('cardTasks.index', compact('cards'));
}


    /**
     * Afficher le formulaire de création d'une nouvelle carte de tâche.
     */
    public function create(int $taskId)
    {
        // Afficher le formulaire de création
        return view('cardTasks.create', compact('taskId'));
    }

    /**
     * Enregistrer une nouvelle carte de tâche.
     */
    public function store(Request $request, int $taskId)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Récupérer la tâche
        $task = Task::findOrFail($taskId);

        // Créer une nouvelle carte de tâche
        $cardTask = new CardTask($validated);
        $task->cardTasks()->save($cardTask);  // Sauvegarder la carte de tâche liée à cette tâche

        // Rediriger après la création
        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Carte de tâche créée avec succès !');
    }

    /**
     * Afficher une carte de tâche spécifique.
     */
    public function show(int $taskId, int $cardTaskId)
    {
        // Récupérer la tâche et la carte de tâche spécifique
        $task = Task::findOrFail($taskId);
        $cardTask = $task->cardTasks()->findOrFail($cardTaskId);

        // Passer à la vue
        return view('cardTasks.show', compact('cardTask', 'task'));
    }

    /**
     * Afficher le formulaire d'édition pour une carte de tâche.
     */
    public function edit(int $taskId, int $cardTaskId)
    {
        // Récupérer la tâche et la carte de tâche pour l'édition
        $task = Task::findOrFail($taskId);
        $cardTask = $task->cardTasks()->findOrFail($cardTaskId);

        // Afficher le formulaire d'édition
        return view('cardTasks.edit', compact('cardTask', 'task'));
    }

    /**
     * Mettre à jour une carte de tâche.
     */
    public function update(Request $request, int $taskId, int $cardTaskId)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Récupérer la tâche et la carte de tâche à mettre à jour
        $task = Task::findOrFail($taskId);
        $cardTask = $task->cardTasks()->findOrFail($cardTaskId);

        // Mettre à jour les données de la carte
        $cardTask->update($validated);

        // Rediriger après la mise à jour
        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Carte de tâche mise à jour avec succès !');
    }

    /**
     * Supprimer une carte de tâche.
     */
    public function destroy(int $taskId, int $cardTaskId)
    {
        // Récupérer la tâche et la carte de tâche à supprimer
        $task = Task::findOrFail($taskId);
        $cardTask = $task->cardTasks()->findOrFail($cardTaskId);

        // Supprimer la carte de tâche
        $cardTask->delete();

        // Rediriger après suppression
        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Carte de tâche supprimée avec succès !');
    }
}
