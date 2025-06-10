<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments for a specific task.
     */
    public function index(int $taskId)
    {
        // Récupère les commentaires de la tâche spécifiée
        $task = Task::findOrFail($taskId);
        $comments = $task->comments; // Relation Eloquent

        return response()->json($comments);
    }

    /**
     * Show the form for creating a new comment for a specific task.
     */
    public function create(int $taskId)
    {
        // Tu peux renvoyer une vue pour ajouter un commentaire si nécessaire
        return view('comments.create', compact('taskId'));
    }

    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, Task $task)
    {
        $request->validate(['content' => 'required|string']);
    $comment = $task->comments()->create(['content' => $request->content]);
    return response()->json($comment);

        // Récupère la tâche et ajoute un commentaire
        $task = Task::findOrFail($taskId);
        $comment = new Comment($validated);
        $task->comments()->save($comment);  // Relation entre tâche et commentaire

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Commentaire ajouté avec succès !');
    }

    /**
     * Display the specified comment.
     */
    public function show(int $taskId, int $commentId)
    {
        // Récupère un commentaire spécifique d'une tâche
        $task = Task::findOrFail($taskId);
        $comment = $task->comments()->findOrFail($commentId);

        return view('comments.show', compact('comment', 'task'));
    }
public function fetch(Task $task)
{
    return response()->json($task->comments()->latest()->get());
}
    /**
     * Show the form for editing the specified comment.
     */
    public function edit(int $taskId, int $commentId)
    {
        // Récupère un commentaire spécifique d'une tâche
        $task = Task::findOrFail($taskId);
        $comment = $task->comments()->findOrFail($commentId);

        return view('comments.edit', compact('comment', 'task'));
    }

    /**
     * Update the specified comment in storage.
     */
    public function update(Request $request, int $taskId, int $commentId)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Récupère la tâche et le commentaire à modifier
        $task = Task::findOrFail($taskId);
        $comment = $task->comments()->findOrFail($commentId);

        $comment->update($validated);

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Commentaire mis à jour avec succès !');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(int $taskId, int $commentId)
    {
        // Récupère la tâche et le commentaire à supprimer
        $task = Task::findOrFail($taskId);
        $comment = $task->comments()->findOrFail($commentId);

        $comment->delete();

        return redirect()->route('tasks.show', ['id' => $taskId])->with('success', 'Commentaire supprimé.');
    }
}
