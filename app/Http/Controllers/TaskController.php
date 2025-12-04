<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Affiche toutes les tâches. (READ - Lecture)
     */
    public function index()
    {
        // Récupère toutes les tâches (triées par la plus récente)
        $tasks = Task::latest()->get();

        // Passe les tâches à la vue 'tasks.index'
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Enregistre une nouvelle tâche dans la base de données. (CREATE - Création)
     */
    public function store(Request $request)
    {
        // 1. Validation des données
        $request->validate([
            'title' => 'required|max:255',
        ]);

        // 2. Création de la tâche
        Task::create([
            'title' => $request->title,
            // 'completed' est par défaut à false dans la migration
        ]);

        // 3. Redirection vers la liste des tâches
        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée avec succès !');
    }

    /**
     * Met à jour l'état (complétée ou non) d'une tâche. (UPDATE - Mise à jour)
     * Utilise le Model Binding pour injecter directement l'objet Task.
     */
    public function update(Task $task)
    {
        // Bascule l'état 'completed'
        $task->completed = !$task->completed;
        $task->save();

        // Redirection
        return redirect()->route('tasks.index')->with('status', 'Tâche mise à jour !');
    }

    /**
     * Supprime une tâche de la base de données. (DELETE - Suppression)
     */
    public function destroy(Task $task)
    {
        // Suppression de l'objet Task
        $task->delete();

        // Redirection
        return redirect()->route('tasks.index')->with('status', 'Tâche supprimée !');
    }
}
