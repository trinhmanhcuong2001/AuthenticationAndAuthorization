<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }


    public function edit(User $user, Task $task)
    {
        return $user->role == 'admin' || ($user->role == 'editor' && $user->id == $task->user_id);
    }

    public function update(User $user, Task $task)
    {
        return $user->role == 'admin' || ($user->role == 'editor' && $user->id == $task->user_id);
    }
}
