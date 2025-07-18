<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        return Post::with('user', 'comments')->get();
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json($post, 201);
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $post->load(['user', 'comments']);
    }

    public function update(Request $request, Post $post)
    {

        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($request->only(['title', 'body']));

        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json(null, 204);
    }
}
