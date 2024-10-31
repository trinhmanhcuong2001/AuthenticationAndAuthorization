<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
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
        return $user->hasRole(['admin', 'editor']);
    }

    public function update(User $user, Post $post)
    {
        // dd($user->id == $post->user_id);
        return $user->hasRole(['admin']) || ($user->hasRole(['editor']) && $user->id == $post->user_id);
    }

    public function delete(User $user, Post $post)
    {
        return $user->hasRole(['admin']) || ($user->hasRole(['editor']) && $user->id == $post->user_id);
    }
}
