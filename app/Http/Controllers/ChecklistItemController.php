<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    /**
     * Display a listing of the checklist items for a specific task.
     */
    public function index(int $taskId)
    {
        // Récupère les éléments de la check-list de la tâche spécifiée
        $task = Task::findOrFail($taskId);
        $checklistItems = $task->checklistItems; // Relation Eloquent

        return response()->json($checklistItems);
    }

    /**
     * Show the form for creating a new checklist item for a specific task.
     */
    public function create(int $taskId)
    {
        // Tu peux renvoyer une vue pour ajouter un élément de check-list
        return view('checklistItems.create', compact('taskId'));
    }

    /**
     * Store a newly created checklist item in storage.
     */
    public function store(Request $request, int $taskId)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'completed' => 'required|boolean',
        ]);

        // Récupère la tâche et crée un élément de check-list
        $task = Task::findOrFail($taskId);
        $checklistItem = new ChecklistItem($validated);
        $task->checklistItems()->save($checklistItem);  // Relation entre tâche et élément de check-list

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Élément de check-list ajouté avec succès !');
    }

    /**
     * Display the specified checklist item.
     */
    public function show(int $taskId, int $checklistItemId)
    {
        // Récupère un élément de check-list spécifique d'une tâche
        $task = Task::findOrFail($taskId);
        $checklistItem = $task->checklistItems()->findOrFail($checklistItemId);

        return view('checklistItems.show', compact('checklistItem', 'task'));
    }

    /**
     * Show the form for editing the specified checklist item.
     */
    public function edit(int $taskId, int $checklistItemId)
    {
        // Récupère un élément de check-list spécifique d'une tâche
        $task = Task::findOrFail($taskId);
        $checklistItem = $task->checklistItems()->findOrFail($checklistItemId);

        return view('checklistItems.edit', compact('checklistItem', 'task'));
    }

    /**
     * Update the specified checklist item in storage.
     */
    public function update(Request $request, int $taskId, int $checklistItemId)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'completed' => 'required|boolean',
        ]);

        // Récupère la tâche et l'élément de check-list à modifier
        $task = Task::findOrFail($taskId);
        $checklistItem = $task->checklistItems()->findOrFail($checklistItemId);

        $checklistItem->update($validated);

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Élément de check-list mis à jour avec succès !');
    }

    /**
     * Remove the specified checklist item from storage.
     */
    public function destroy(int $taskId, int $checklistItemId)
    {
        // Récupère la tâche et l'élément de check-list à supprimer
        $task = Task::findOrFail($taskId);
        $checklistItem = $task->checklistItems()->findOrFail($checklistItemId);

        $checklistItem->delete();

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Élément de check-list supprimé.');
    }
}
