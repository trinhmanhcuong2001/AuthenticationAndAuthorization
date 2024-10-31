<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    public function index()
    {
        $this->authorize('is-admin', Task::class);

        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        if (!Gate::allows("is-admin")) {
            abort(403, 'Unauthorized');
        }
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->authorize('is-admin', Task::class);
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $task = Task::create($data);
        session()->flash('success', 'Thêm công việc thành công!');
        return redirect()->route('task.index');
    }

    public function edit(Task $task)
    {
        if (!Gate::allows("is-admin")) {
            abort(403, 'Unauthorized');
        }
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('is-admin', Task::class);

        $data = $request->all();
        $task->update($data);

        session()->flash('success', 'Cập nhật công việc thành công!');

        return redirect()->route('task.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('is-admin', Task::class);
        $task->delete();
        session()->flash('success', 'Xóa công việc thành công!');
        return redirect()->route('task.index');
    }
}
