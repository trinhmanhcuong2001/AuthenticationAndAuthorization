<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Task;
use App\Models\User;
use App\Policies\TaskPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('viewAny', function (User $user) {
            return in_array($user->role, ['admin', 'editor', 'user']);
        });

        Gate::define('view-create-task', function (User $user) {
            return in_array($user->role, ['admin', 'editor']);
        });

        Gate::define('create-task', function (User $user) {
            return in_array($user->role, ['admin', 'editor']);
        });

        Gate::define('view-edit-task', function (User $user, Task $task) {
            return ($user->role === 'editor' && $user->id === $task->user_id) || $user->role == 'admin';
        });

        Gate::define('update-task', function (User $user, $task) {
            return ($user->role === 'editor' && $user->id === $task->user_id) || $user->role == 'admin';
        });

        Gate::define('delete-task', function (User $user, $task) {
            return ($user->role === 'editor' && $user->id === $task->user_id) || $user->role == 'admin';
        });
    }
}
