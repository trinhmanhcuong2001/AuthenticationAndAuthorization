<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequet;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->hasRole(['admin']));
        $this->authorize("viewAny", Post::class);
        $posts = Post::all();

        return view("posts.index", [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view("posts.create");
    }

    public function store(CreatePostRequet $request)
    {
        $this->authorize('create', Post::class);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Post::create($data);

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->all());

        return redirect()->route('post.index');
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('post.index');
    }
}
