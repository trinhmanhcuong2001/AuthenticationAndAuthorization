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

    public function create(User $user)
    {
        return true;
    }

    public function store(User $user)
    {
        return true;
    }

    public function edit(User $user, Task $task)
    {
        return true;
    }

    public function update(User $user, Task $task)
    {
        return true;
    }


    public function delete(User $user, Task $task)
    {
        return true;
    }
}
