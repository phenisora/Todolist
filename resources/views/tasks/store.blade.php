<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Nouvelle tâche..." required>
    <button type="submit">Ajouter</button>
</form>