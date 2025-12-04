<form method="POST" action="{{ route('tasks.update', $task) }}" style="display: inline;">
    @csrf
    @method('PUT') 
    <button type="submit">
        {{ $task->completed ? 'Annuler' : 'Terminer' }}
    </button>
</form>