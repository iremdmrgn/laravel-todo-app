<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Tüm görevleri listeleme
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    // Yeni görev ekleme
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = false;
        $task->save();

        return redirect('/tasks');
    }

    // Görevi tamamlandı olarak işaretleme
    public function toggleComplete($id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = !$task->is_completed;
        $task->save();

        return redirect('/tasks');
    }

    // Görevi silme
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks');
    }
}
