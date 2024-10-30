<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $this->authorize("viewAny", Task::class);

        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $this->authorize('create', Task::class);
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->authorize('store', Task::class);
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $task = Task::create($data);
        session()->flash('success', 'Thêm công việc thành công!');
        return redirect()->route('task.index');
    }

    public function edit(Task $task)
    {
        $this->authorize('edit', arguments: $task);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $data = $request->all();
        $task->update($data);

        session()->flash('success', 'Cập nhật công việc thành công!');

        return redirect()->route('task.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();
        session()->flash('success', 'Xóa công việc thành công!');
        return redirect()->route('task.index');
    }
}
