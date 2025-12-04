<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Liste de Tâches Laravel</title>
    <style>
        .completed { text-decoration: line-through; color: gray; }
    </style>
</head>
<body>

    <h1>Gestion des Tâches</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Nouvelle tâche..." required>
        <button type="submit">Ajouter</button>
    </form>

    <hr>

    @if ($tasks->count())
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>

                    <form method="POST" action="{{ route('tasks.update', $task) }}" style="display: inline;">
                        @csrf
                        @method('PUT') <button type="submit">
                            {{ $task->completed ? 'Annuler' : 'Terminer' }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display: inline;">
                        @csrf
                        @method('DELETE') <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune tâche à afficher. Commencez par en ajouter une !</p>
    @endif

</body>
</html>