<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    <h1>Todo App</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Başlık" required>
        <input type="text" name="description" placeholder="Açıklama">
        <button type="submit">Ekle</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">{{ $task->is_completed ? '✓' : '✗' }}</button>
                </form>
                {{ $task->title }} - {{ $task->description }}
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Sil</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
