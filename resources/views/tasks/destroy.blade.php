<form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>